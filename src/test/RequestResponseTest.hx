package test;

import haxe.Http;
import haxe.PosInfos;
import haxe.Timer;
import sys.io.File;
import sys.net.Host;
import utest.Assert;
using haxe.io.Path;
using StringTools;

class RequestResponseTest {

	var protocol:String;
	var server:String;
	var portStr:Null<String>;
	var baseUrl:String;
	var scriptDir:String;

	public function new( protocol, server, portStr, baseUrl, scriptDir ) {
		this.protocol = protocol;
		this.server = server;
		this.portStr = portStr;
		this.baseUrl = baseUrl;
		this.scriptDir = scriptDir;
	}

	function base() {
		return '$protocol://$server$portStr$baseUrl';
	}

	//
	// Public tests
	//

	public function testIndex() {
		var h = new Http( base()+'/' );
		assertResponseEquals( "Index", h );
	}

	public function testQueryString() {
		var h = new Http( base()+'/querystring?query' );
		assertResponseEquals( "query", h );

		var h = new Http( base()+'/querystring?J%C3%A5%C2%A7%C3%B4%C5%86' );
		assertResponseEquals( "J%C3%A5%C2%A7%C3%B4%C5%86", h );

		var h = new Http( base()+'/querystring?a=1&b=2&b=3' );
		assertResponseEquals( "a=1&b=2&b=3", h );

		var h = new Http( base()+'/querystring?name[]=Kevin%26Jason&name[]=Theo' );
		assertResponseEquals( "name[]=Kevin%26Jason&name[]=Theo", h );

		var h = new Http( base()+'/querystring?includeshash#nohash' );
		assertResponseEquals( "includeshash", h );

		var h = new Http( base()+'/querystring' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		assertResponse( function(data) {
			Assert.isTrue( data.indexOf('game=football')>-1 );
			Assert.isTrue( data.indexOf('game=baseball')>-1 );
			Assert.isTrue( data.indexOf('drink=coffee')>-1 );
		}, h );
	}

	public function testPostString() {
		var h = new Http( base()+'/poststring?query' );
		assertResponseEquals( "", h, false );

		var h = new Http( base()+'/poststring' );
		assertResponseEquals( "", h, true );

		// Test ampersands in a parameter value
		var h = new Http( base()+'/poststring' );
		h.addParameter( 'drink', 'bourbon&coke' );
		h.addParameter( 'drink', 'coffee' );
		assertResponseEquals( "drink=coffee&drink=bourbon%26coke", h, true );

		var h = new Http( base()+'/poststring?drink=cola' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		assertResponse( function(data) {
			Assert.isTrue( data.indexOf('game=football')>-1 );
			Assert.isTrue( data.indexOf('game=baseball')>-1 );
			Assert.isTrue( data.indexOf('drink=coffee')>-1 );
			Assert.isFalse( data.indexOf('drink=cola')>-1 );
		}, h, true );

		var h = new Http( base()+'/poststring' );
		h.setPostData( "{see}" );
		assertResponseEquals( "{see}", h, true );
	}

	public function testQuery() {
		var h = new Http( base()+'/query?a=1&b=2&b=3' );
		assertResponseEquals( "a=1\nb=2,3", h );

		var h = new Http( base()+'/query?page=home#nohash' );
		assertResponseEquals( "page=home", h );

		var h = new Http( base()+'/query?name[]=Kevin%26Jason&name[]=Theo' );
		assertResponseEquals( "name=Kevin&Jason,Theo", h );

		var h = new Http( base()+'/query' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		var expected = 'drink=coffee\ngame=baseball,football';
		assertResponseEquals( expected, h );
	}

	public function testPost() {

		var h = new Http( base()+'/post?a=1&b=2&b=3' );
		assertResponseEquals( "", h, true );

		var h = new Http( base()+'/post' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		var expected = 'drink=coffee\ngame=baseball,football';
		assertResponseEquals( expected, h, true );

		// Test UTF8 characters
		var h = new Http( base()+'/post' );
		h.setParameter( 'name', 'Jå§ôņ' );
		assertResponseEquals( "name=Jå§ôņ", h, true );

		// Test ampersands in a parameter value
		var h = new Http( base()+'/post' );
		h.addParameter( 'drink', 'coffee' );
		h.addParameter( 'drink', 'bourbon&coke' );
		assertResponse( function(response) {
			// The order these post variables come through seems undefined.
			// I'm not sure if the issue is our Neko HTTP engine, or the servers, or ufront.
			// For now I'm leaving the order as "unspecified".
			Assert.isTrue( response.startsWith("drink=") );
			var values = response.substr( 6 ).split(",");
			Assert.isTrue( values.indexOf("coffee")>-1 );
			Assert.isTrue( values.indexOf("bourbon&coke")>-1 );
		}, h, true );

		// Test multipart data
		var h = new Http( base()+'/post' );
		h.setParameter( "group", "Team Winner" );
		h.setParameter( "names[]", "Larry" );
		h.addParameter( "names[]", "çhåŗļîê" );
		var filename = "test.json";
		var fileInput = File.read( filename );
		var size = sys.FileSystem.stat( filename ).size;
		h.fileTransfer( "upload", "data.json", fileInput, size, "application/json" );
		var expected = 'group=Team Winner\nnames=Larry,çhåŗļîê\nupload=data.json';
		assertResponseEquals( expected, h, true );

		// TODO: test the contents of the uploaded file are correct.
	}

	public function testCookies() {
		var h = new Http( base()+'/cookies' );
		h.addHeader( "Cookie", "SessionID=12345; Name=Jason; Age=26" );
		var expected = "Age=26\nName=Jason\nSessionID=12345";
		assertResponseEquals( expected, h );
	}

	public function testClientHeaders() {
		var h = new Http( base()+'/clientheaders' );
		h.setHeader( "User-Agent", "Ufront Request Tester" );
		h.addHeader( "Accept", "text/html" );
		h.addHeader( "Accept", "application/xhtml+xml" );
		h.addHeader( "Accept", "application/xml" );
		var expected = 'Accept=application/xhtml+xml,application/xml,text/html';
		expected += '\n' + 'Host=$server';
		expected += '\n' + 'User-Agent=Ufront Request Tester';
		assertResponseEquals( expected, h );
	}

	public function testHostname() {
		var h = new Http( base()+'/hostname' );
		assertResponse( function(data) {
			var host = new Host( data );
			var hostFromBaseUrl = ~/^https?:\/\/([a-z_.]+)[:\/]/;
			if ( hostFromBaseUrl.match(base()) ) {
				Assert.equals( hostFromBaseUrl.matched(1), host.reverse() );
			}
			else Assert.fail( 'Hostname $data was not a valid hostname' );
		}, h);
	}

	public function testClientIP() {
		var h = new Http( base()+'/clientip' );
		assertResponse( function(data) {
			var ipRegex = ~/^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$/;
			Assert.isTrue( ipRegex.match(data), 'Invalid IP address $data' );
		}, h, true );
	}

	public function testUri() {
		var h1 = new Http( base()+'/uri/' );
		assertResponseEquals( baseUrl+"/uri/", h1 );

		var h2 = new Http( base()+'/uri/somesuch.html' );
		assertResponseEquals( baseUrl+"/uri/somesuch.html", h2 );

		var h3 = new Http( base()+'/uri/this?that#there' );
		assertResponseEquals( baseUrl+"/uri/this", h3 );

		var h4 = new Http( base()+'/uri/J%C3%A5%C2%A7%C3%B4%C5%86' );
		assertResponseEquals( baseUrl+"/uri/Jå§ôņ", h4 );
	}

	public function testHttpMethod() {
		var h = new Http( base()+'/httpmethod' );
		assertResponseEquals( "GET", h, false );

		var h = new Http( base()+'/httpmethod' );
		assertResponseEquals( "POST", h, true );
	}

	public function testScriptDirectory() {
		var h = new Http( base()+'/scriptdirectory' );
		assertResponseEquals( scriptDir.addTrailingSlash(), h );
	}

	public function testAuth() {
		var h = new Http( base()+'/authorization' );
		h.setHeader( "Authorization", "Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==" );
		assertResponseEquals( "Aladdin:open sesame", h, true );
	}

	public function testResponse() {
		var h = new Http( base()+'/testresponse/200/utf-8' );
		assertResponseDetails( h, {
			status: 200,
			poweredBy: "Ufront",
			contentType: "text/html",
			charSet: "utf-8",
			content: "response content",
			language: "en-au",
			cookieName: "sessionid",
			cookieVal: "123456"
		});

		var data = {
			status: 201,
			poweredBy: "Ufront",
			contentType: "text/plain",
			charSet: "ucs-2",
			content: "some plain text",
			language: "en-gb",
			cookieName: "sessionid",
			cookieVal: "123456"
		}
		var h = new Http( base()+'/testresponse/${data.status}/${data.charSet}' );
		h.setParameter( "language", data.language );
		h.setParameter( "contentType", data.contentType );
		h.setParameter( "content", data.content );
		h.setParameter( "cookieName", data.cookieName );
		h.setParameter( "cookieVal", data.cookieVal );

		assertResponseDetails( h, data );
	}

	//
	// Private helper methods
	//

	function assertResponse( test:String->Void, http:Http, ?post=false, ?msg:String, ?pos:PosInfos ) {
		var responseData:String = null;
		var async = Assert.createAsync(function() {
			test( responseData );
		});
		http.onData = function(data) {
			responseData = data;
			async();
		};
		http.onError = function(data:String) {
			Assert.fail( 'Error with Http request @ ${http.url}: '+data, pos );
			trace ('Error with HTTP Request @ ${http.url}');
			trace (http.responseData);
		}
		http.request( post );
	}

	function assertResponseDetails( http:Http, expected:{ status:Int, poweredBy:String, contentType:String, charSet:String, content:String, language:String, cookieName:String, cookieVal:String } ) {
		var responseData:String = null;
		var status:Null<Int> = null;
		var async = Assert.createAsync(function() {
			Assert.equals( expected.status, status );
			Assert.equals( expected.poweredBy, http.responseHeaders.get("X-Powered-By") );
			Assert.equals( '${expected.contentType}; charset=${expected.charSet}', http.responseHeaders.get("Content-Type") );
			Assert.equals( expected.language, http.responseHeaders.get("Content-Language") );
			Assert.equals( '${expected.content.length}', http.responseHeaders.get("Content-Length") );
			Assert.equals( expected.content, responseData );

			// Displaying a semicolon at the end is optional and differs between platforms
			var cookieHeader = http.responseHeaders.get("Set-Cookie");
			Assert.isTrue( cookieHeader.startsWith('${expected.cookieName}=${expected.cookieVal}; ') );
			Assert.isTrue( cookieHeader.indexOf('expires=Thu, 01-Jan-2015 00:00:00 GMT;')>-1 );
			Assert.isTrue( cookieHeader.indexOf('; domain=/testresponse/')>-1 );
		});
		http.onStatus = function(s) {
			status = s;
		}
		http.onData = function(data) {
			responseData = data;
			async();
		};
		http.onError = function(data:String) {
			responseData = data;
			async();
		}
		http.request();
	}

	function assertResponseEquals( expectedResponse:String, http:Http, ?post=false, ?msg:String, ?pos:PosInfos ) {
		assertResponse( function(response) {
			Assert.equals( StringTools.trim(expectedResponse), response, msg, pos );
		}, http, post, msg, pos );
	}
}
