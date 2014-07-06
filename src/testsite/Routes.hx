package testsite;

import haxe.Utf8;
import ufront.core.MultiValueMap;
import ufront.web.Controller;
import ufront.web.HttpCookie;
import ufront.web.result.EmptyResult;

class Routes extends Controller {

	@:route("/") 
	public function index():String return "Index";

	@:route("/querystring") 
	public function queryString() return context.request.queryString;

	@:route("/poststring") 
	public function postString() return context.request.postString;

	@:route("/query")
	public function query() {
		return printMultiValueMap( context.request.query );
	}

	@:route("/post")
	public function post() {
		return printMultiValueMap( context.request.post );
	}

	@:route("/cookies")
	public function cookies() {
		return printMultiValueMap( context.request.cookies );
	}

	@:route("/clientheaders")
	public function clientHeaders() {
		return printMultiValueMap( context.request.clientHeaders );
	}

	function printMultiValueMap( map:MultiValueMap<String> ) {
		var lines = [];
		for ( key in map.keys() ) {
			var line = '$key=';
			var values = map.getAll( key );
			values.sort( Reflect.compare );
			line += values.join(",");
			lines.push( line );
		}
		lines.sort( Reflect.compare );
		return lines.join("\n");
	}

	@:route("/hostname")
	public function hostname() return context.request.hostName;

	@:route("/clientip")
	public function clientIP() return context.request.clientIP;

	@:route("/uri/*")
	public function uri() return context.request.uri;

	@:route("/httpmethod")
	public function httpMethod() return context.request.httpMethod;

	@:route("/scriptdirectory")
	public function scriptDir() return context.request.scriptDirectory;

	@:route("/authorization")
	public function authorization() {
		var auth = context.request.authorization;
		return auth.user+":"+auth.pass;
	}

	// Remaining request functionality to check:

	// userAgent
	// multipart - params
	// multipart - callback

	@:route("/testresponse/$status/$charset")
	public function testResponse( status:Int, charset:String, ?args:{ language:String, contentType:String, content:String, cookieName:String, cookieVal:String } ) {
		
		if ( args.language==null ) args.language = "en-au";
		if ( args.contentType==null ) args.contentType = "text/html";
		if ( args.content==null ) args.content = "response content";
		if ( args.cookieName==null ) args.cookieName = "sessionid";
		if ( args.cookieVal==null ) args.cookieVal = "123456";

		context.response.status = status;
		context.response.charset = charset;
		context.response.contentType = args.contentType;

		var expiryDate = new Date(2015,00,01,0,0,0);
		var c1 = new HttpCookie( args.cookieName, args.cookieVal, expiryDate, '/testresponse/' );
		context.response.setCookie( c1 );
		
		// haxe.Http can only show one HTTP header of each name,
		// but it is best to output each cookie on a different header line.
		// Therefore, we can only test one cookie at a time, sadly.

		context.response.setHeader( "X-Powered-By", "Ufront" );
		context.response.setHeader( "Content-Language", args.language );

		return Utf8.encode( args.content );
	}
}