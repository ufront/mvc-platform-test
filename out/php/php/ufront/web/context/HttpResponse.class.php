<?php

class ufront_web_context_HttpResponse {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->clear();
		$this->_flushed = false;
		$GLOBALS['%s']->pop();
	}}
	public $charset;
	public $status;
	public $_buff;
	public $_headers;
	public $_cookies;
	public $_flushed;
	public function preventFlush() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::preventFlush");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_flushed = true;
		$GLOBALS['%s']->pop();
	}
	public function flush() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::flush");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_NotImplemented(_hx_anonymous(array("fileName" => "HttpResponse.hx", "lineNumber" => 108, "className" => "ufront.web.context.HttpResponse", "methodName" => "flush"))));
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->clearCookies();
		$this->clearHeaders();
		$this->clearContent();
		$this->set_contentType(null);
		$this->charset = "utf-8";
		$this->status = 200;
		$GLOBALS['%s']->pop();
	}
	public function clearCookies() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::clearCookies");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_cookies = new haxe_ds_StringMap();
		$GLOBALS['%s']->pop();
	}
	public function clearContent() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::clearContent");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_buff = new StringBuf();
		$GLOBALS['%s']->pop();
	}
	public function clearHeaders() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::clearHeaders");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_headers = new thx_collection_HashList();
		$GLOBALS['%s']->pop();
	}
	public function write($s) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::write");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $s) {
			$this->_buff->add($s);
		}
		$GLOBALS['%s']->pop();
	}
	public function writeChar($c) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::writeChar");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_buff->b .= _hx_string_or_null(chr($c));
		$GLOBALS['%s']->pop();
	}
	public function writeBytes($b, $pos, $len) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::writeBytes");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_buff->add($b->getString($pos, $len));
		$GLOBALS['%s']->pop();
	}
	public function setHeader($name, $value) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setHeader");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $name) {
			throw new HException(new thx_error_NullArgument("name", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpResponse.hx", "lineNumber" => 169, "className" => "ufront.web.context.HttpResponse", "methodName" => "setHeader"))));
		}
		if(null === $value) {
			throw new HException(new thx_error_NullArgument("value", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpResponse.hx", "lineNumber" => 170, "className" => "ufront.web.context.HttpResponse", "methodName" => "setHeader"))));
		}
		$this->_headers->set($name, $value);
		$GLOBALS['%s']->pop();
	}
	public function setCookie($cookie) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setCookie");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_cookies->set($cookie->name, $cookie);
		$GLOBALS['%s']->pop();
	}
	public function getBuffer() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::getBuffer");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_buff->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getCookies() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::getCookies");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_cookies;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getHeaders() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::getHeaders");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_headers;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function redirect($url) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::redirect");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 302;
		$this->set_redirectLocation($url);
		$GLOBALS['%s']->pop();
	}
	public function setOk() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setOk");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 200;
		$GLOBALS['%s']->pop();
	}
	public function setUnauthorized() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setUnauthorized");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 401;
		$GLOBALS['%s']->pop();
	}
	public function requireAuthentication($message) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::requireAuthentication");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->setUnauthorized();
		$this->setHeader("WWW-Authenticate", "Basic realm=\"" . _hx_string_or_null($message) . "\"");
		$GLOBALS['%s']->pop();
	}
	public function setNotFound() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setNotFound");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 404;
		$GLOBALS['%s']->pop();
	}
	public function setInternalError() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::setInternalError");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 500;
		$GLOBALS['%s']->pop();
	}
	public function permanentRedirect($url) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::permanentRedirect");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->status = 301;
		$this->set_redirectLocation($url);
		$GLOBALS['%s']->pop();
	}
	public function isRedirect() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::isRedirect");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Math::floor($this->status / 100) === 3;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPermanentRedirect() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::isPermanentRedirect");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->status === 301;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_contentType() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::get_contentType");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_headers->get("Content-type");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_contentType($v) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::set_contentType");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $v) {
			$this->_headers->set("Content-type", "text/html");
		} else {
			$this->_headers->set("Content-type", $v);
		}
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_redirectLocation() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::get_redirectLocation");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_headers->get("Location");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_redirectLocation($v) {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::set_redirectLocation");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $v) {
			$this->_headers->remove("Location");
		} else {
			$this->_headers->set("Location", $v);
		}
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	static function create() {
		$GLOBALS['%s']->push("ufront.web.context.HttpResponse::create");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new php_ufront_web_context_HttpResponse();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $CONTENT_TYPE = "Content-type";
	static $LOCATION = "Location";
	static $DEFAULT_CONTENT_TYPE = "text/html";
	static $DEFAULT_CHARSET = "utf-8";
	static $DEFAULT_STATUS = 200;
	static $MOVED_PERMANENTLY = 301;
	static $FOUND = 302;
	static $UNAUTHORIZED = 401;
	static $NOT_FOUND = 404;
	static $INTERNAL_SERVER_ERROR = 500;
	static $__properties__ = array("set_redirectLocation" => "set_redirectLocation","get_redirectLocation" => "get_redirectLocation","set_contentType" => "set_contentType","get_contentType" => "get_contentType");
	function __toString() { return 'ufront.web.context.HttpResponse'; }
}
