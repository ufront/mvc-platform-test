<?php

class php_ufront_web_context_HttpResponse extends ufront_web_context_HttpResponse {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("php.ufront.web.context.HttpResponse::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function flush() {
		$GLOBALS['%s']->push("php.ufront.web.context.HttpResponse::flush");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->_flushed) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->_flushed = true;
		$k = null;
		$v = null;
		header("X-Powered-By: ufront", true);
		header("HTTP/1.1 " . _hx_string_or_null(php_ufront_web_context_HttpResponse::statusDescription($this->status)), true, $this->status);
		try {
			if(null == $this->_cookies) throw new HException('null iterable');
			$__hx__it = $this->_cookies->iterator();
			while($__hx__it->hasNext()) {
				unset($cookie);
				$cookie = $__hx__it->next();
				$expire = null;
				if($cookie->expires === null) {
					$expire = 0;
				} else {
					$expire = $cookie->expires->getTime() / 1000;
				}
				setcookie($cookie->name, $cookie->value, $expire, $cookie->path, $cookie->domain, $cookie->secure);
				unset($expire);
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException(new thx_error_Error("you can't set the cookie, output already sent", null, null, _hx_anonymous(array("fileName" => "HttpResponse.hx", "lineNumber" => 33, "className" => "php.ufront.web.context.HttpResponse", "methodName" => "flush"))));
			}
		}
		try {
			if(null == $this->_headers) throw new HException('null iterable');
			$__hx__it = $this->_headers->keys();
			while($__hx__it->hasNext()) {
				unset($key);
				$key = $__hx__it->next();
				$k = $key;
				$v = $this->_headers->get($key);
				if($k === "Content-type" && null !== $this->charset && StringTools::startsWith($v, "text/")) {
					$v .= "; charset=" . _hx_string_or_null($this->charset);
				}
				header(php_ufront_web_context_HttpResponse_0($this, $e, $k, $key, $v), true);
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e1 = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException(new thx_error_Error("invalid header: '{0}: {1}' or output already sent", (new _hx_array(array($k, $v))), null, _hx_anonymous(array("fileName" => "HttpResponse.hx", "lineNumber" => 50, "className" => "php.ufront.web.context.HttpResponse", "methodName" => "flush"))));
			}
		}
		php_Lib::hprint($this->_buff->b);
		$GLOBALS['%s']->pop();
	}
	static function statusDescription($r) {
		$GLOBALS['%s']->push("php.ufront.web.context.HttpResponse::statusDescription");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($r) {
		case 100:{
			$GLOBALS['%s']->pop();
			return "100 Continue";
		}break;
		case 101:{
			$GLOBALS['%s']->pop();
			return "101 Switching Protocols";
		}break;
		case 200:{
			$GLOBALS['%s']->pop();
			return "200 Continue";
		}break;
		case 201:{
			$GLOBALS['%s']->pop();
			return "201 Created";
		}break;
		case 202:{
			$GLOBALS['%s']->pop();
			return "202 Accepted";
		}break;
		case 203:{
			$GLOBALS['%s']->pop();
			return "203 Non-Authoritative Information";
		}break;
		case 204:{
			$GLOBALS['%s']->pop();
			return "204 No Content";
		}break;
		case 205:{
			$GLOBALS['%s']->pop();
			return "205 Reset Content";
		}break;
		case 206:{
			$GLOBALS['%s']->pop();
			return "206 Partial Content";
		}break;
		case 300:{
			$GLOBALS['%s']->pop();
			return "300 Multiple Choices";
		}break;
		case 301:{
			$GLOBALS['%s']->pop();
			return "301 Moved Permanently";
		}break;
		case 302:{
			$GLOBALS['%s']->pop();
			return "302 Found";
		}break;
		case 303:{
			$GLOBALS['%s']->pop();
			return "303 See Other";
		}break;
		case 304:{
			$GLOBALS['%s']->pop();
			return "304 Not Modified";
		}break;
		case 305:{
			$GLOBALS['%s']->pop();
			return "305 Use Proxy";
		}break;
		case 307:{
			$GLOBALS['%s']->pop();
			return "307 Temporary Redirect";
		}break;
		case 400:{
			$GLOBALS['%s']->pop();
			return "400 Bad Request";
		}break;
		case 401:{
			$GLOBALS['%s']->pop();
			return "401 Unauthorized";
		}break;
		case 402:{
			$GLOBALS['%s']->pop();
			return "402 Payment Required";
		}break;
		case 403:{
			$GLOBALS['%s']->pop();
			return "403 Forbidden";
		}break;
		case 404:{
			$GLOBALS['%s']->pop();
			return "404 Not Found";
		}break;
		case 405:{
			$GLOBALS['%s']->pop();
			return "405 Method Not Allowed";
		}break;
		case 406:{
			$GLOBALS['%s']->pop();
			return "406 Not Acceptable";
		}break;
		case 407:{
			$GLOBALS['%s']->pop();
			return "407 Proxy Authentication Required";
		}break;
		case 408:{
			$GLOBALS['%s']->pop();
			return "408 Request Timeout";
		}break;
		case 409:{
			$GLOBALS['%s']->pop();
			return "409 Conflict";
		}break;
		case 410:{
			$GLOBALS['%s']->pop();
			return "410 Gone";
		}break;
		case 411:{
			$GLOBALS['%s']->pop();
			return "411 Length Required";
		}break;
		case 412:{
			$GLOBALS['%s']->pop();
			return "412 Precondition Failed";
		}break;
		case 413:{
			$GLOBALS['%s']->pop();
			return "413 Request Entity Too Large";
		}break;
		case 414:{
			$GLOBALS['%s']->pop();
			return "414 Request-URI Too Long";
		}break;
		case 415:{
			$GLOBALS['%s']->pop();
			return "415 Unsupported Media Type";
		}break;
		case 416:{
			$GLOBALS['%s']->pop();
			return "416 Requested Range Not Satisfiable";
		}break;
		case 417:{
			$GLOBALS['%s']->pop();
			return "417 Expectation Failed";
		}break;
		case 500:{
			$GLOBALS['%s']->pop();
			return "500 Internal Server Error";
		}break;
		case 501:{
			$GLOBALS['%s']->pop();
			return "501 Not Implemented";
		}break;
		case 502:{
			$GLOBALS['%s']->pop();
			return "502 Bad Gateway";
		}break;
		case 503:{
			$GLOBALS['%s']->pop();
			return "503 Service Unavailable";
		}break;
		case 504:{
			$GLOBALS['%s']->pop();
			return "504 Gateway Timeout";
		}break;
		case 505:{
			$GLOBALS['%s']->pop();
			return "505 HTTP Version Not Supported";
		}break;
		default:{
			$tmp = Std::string($r);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_redirectLocation" => "set_redirectLocation","get_redirectLocation" => "get_redirectLocation","set_contentType" => "set_contentType","get_contentType" => "get_contentType");
	function __toString() { return 'php.ufront.web.context.HttpResponse'; }
}
function php_ufront_web_context_HttpResponse_0(&$__hx__this, &$e, &$k, &$key, &$v) {
	if($v === null) {
		return $key;
	} else {
		return _hx_string_or_null($key) . ": " . _hx_string_or_null($v);
	}
}
