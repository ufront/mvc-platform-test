package test;

import haxe.Http;
import haxe.PosInfos;
import haxe.Timer;
import sys.net.Host;
import utest.Assert;
using haxe.io.Path;

class RequestTest {

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
		trace( base()+'/' );
		assertResponseEquals( "Index", h );
	}

	public function testQueryString() {
		var h = new Http( base()+'/querystring?query' );
		trace( base()+'/querystring?query' );
		assertResponseEquals( "query", h );

		var h = new Http( base()+'/querystring?a=1&b=2&b=3' );
		trace( base()+'/querystring?a=1&b=2&b=3' );
		assertResponseEquals( "a=1&b=2&b=3", h );

		var h = new Http( base()+'/querystring?includeshash#nohash' );
		trace( base()+'/querystring?includeshash#nohash' );
		assertResponseEquals( "includeshash", h );

		var h = new Http( base()+'/querystring' );
		trace( base()+'/querystring' );
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
		trace( base()+'/poststring?query' );
		assertResponseEquals( "", h, false );

		var h = new Http( base()+'/poststring' );
		trace( base()+'/poststring' );
		assertResponseEquals( "", h, true );

		var h = new Http( base()+'/poststring?drink=cola' );
		trace( base()+'/poststring?drink=cola' );
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
		trace( base()+'/poststring' );
		h.setPostData( "{see}" );
		assertResponseEquals( "{see}", h, true );
	}

	public function testQuery() {
		var h = new Http( base()+'/query?a=1&b=2&b=3' );
		trace( base()+'/query?a=1&b=2&b=3' );
		assertResponseEquals( "a=1\nb=2,3", h );

		var h = new Http( base()+'/query?page=home#nohash' );
		trace( base()+'/query?page=home#nohash' );
		assertResponseEquals( "page=home", h );

		var h = new Http( base()+'/query' );
		trace( base()+'/query' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		var expected = 'drink=coffee\ngame=baseball,football';
		assertResponseEquals( expected, h );
	}

	public function testPost() {

		var h = new Http( base()+'/post?a=1&b=2&b=3' );
		trace( base()+'/post?a=1&b=2&b=3' );
		assertResponseEquals( "", h, true );

		var h = new Http( base()+'/post' );
		trace( base()+'/post' );
		h.setParameter( 'drink', 'coffee' );
		h.addParameter( 'game', 'football' );
		h.addParameter( 'game', 'baseball' );
		var expected = 'drink=coffee\ngame=baseball,football';
		assertResponseEquals( expected, h, true );

		// Test multipart data
		var h = new Http( base()+'/post' );
		trace( base()+'/post' );
		h.setPostData( CompileTime.readFile('test/SamplePostData.txt') );
		h.setHeader( "Content-Type", "multipart/form-data" );
		h.setHeader( "boundary", "AaB03x" );
		var expected = 'age=43,name=Larry';
		assertResponseEquals( expected, h, true );
	}

	public function testCookies() {
		var h = new Http( base()+'/cookies' );
		trace( base()+'/cookies' );
		h.addHeader( "Cookie", "SessionID=12345; Name=Jason; Age=26" );
		var expected = "Age=26\nName=Jason\nSessionID=12345";
		assertResponseEquals( expected, h );
	}

	public function testClientHeaders() {
		var h = new Http( base()+'/clientheaders' );
		trace( base()+'/clientheaders' );
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
		trace( base()+'/hostname' );
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
		trace( base()+'/clientip' );
		assertResponse( function(data) {
			var ipRegex = ~/^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$/;
			Assert.isTrue( ipRegex.match(data), 'Invalid IP address $data' );
		}, h, true );
	}

	public function testUri() {
		var h1 = new Http( base()+'/uri/' );
		trace( base()+'/uri/' );
		assertResponseEquals( baseUrl+"/uri/", h1 );

		var h2 = new Http( base()+'/uri/somesuch.html' );
		trace( base()+'/uri/somesuch.html' );
		assertResponseEquals( baseUrl+"/uri/somesuch.html", h2 );

		var h3 = new Http( base()+'/uri/this?that#there' );
		trace( base()+'/uri/this?that#there' );
		assertResponseEquals( baseUrl+"/uri/this", h3 );
	}

	public function testHttpMethod() {
		var h = new Http( base()+'/httpmethod' );
		trace( base()+'/httpmethod' );
		assertResponseEquals( "GET", h, false );

		var h = new Http( base()+'/httpmethod' );
		trace( base()+'/httpmethod' );
		assertResponseEquals( "POST", h, true );
	}

	public function testScriptDirectory() {
		var h = new Http( base()+'/scriptdirectory' );
		trace( base()+'/scriptdirectory' );
		assertResponseEquals( scriptDir.addTrailingSlash(), h );
	}

	public function testAuth() {
		var h = new Http( base()+'/authorization' );
		trace( base()+'/authorization' );
		h.setHeader( "Authorization", "Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==" );
		assertResponseEquals( "Aladdin:open sesame", h, true );
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
			Assert.fail( 'Error with Http request: '+data, pos );
			trace ('Error with HTTP Request');
			trace (http.responseData);
		}
		http.request( post );
	}

	function assertResponseEquals( expectedResponse:String, http:Http, ?post=false, ?msg:String, ?pos:PosInfos ) {
		assertResponse( function(response) {
			Assert.equals( StringTools.trim(expectedResponse), response, msg, pos );
		}, http, post, msg, pos );
	}
}