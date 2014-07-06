<?php

class ufront_web_context_HttpRequest {
	public function __construct(){}
	public $params;
	public function get_params() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_params");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $this->params) {
			$this->params = ufront_core__MultiValueMap_MultiValueMap_Impl_::combine((new _hx_array(array($this->get_cookies(), $this->get_query(), $this->get_post()))));
		}
		{
			$tmp = $this->params;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $queryString;
	public function get_queryString() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_queryString");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 64, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_queryString"))));
		$GLOBALS['%s']->pop();
	}
	public $postString;
	public function get_postString() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_postString");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 72, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_postString"))));
		$GLOBALS['%s']->pop();
	}
	public $query;
	public function get_query() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_query");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 78, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_query"))));
		$GLOBALS['%s']->pop();
	}
	public $post;
	public function get_post() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_post");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 91, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_post"))));
		$GLOBALS['%s']->pop();
	}
	public $files;
	public function get_files() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_files");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $this->files) {
			$this->files = new haxe_ds_StringMap();
		}
		{
			$tmp = $this->files;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $cookies;
	public function get_cookies() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_cookies");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 110, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_cookies"))));
		$GLOBALS['%s']->pop();
	}
	public $hostName;
	public function get_hostName() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_hostName");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 116, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_hostName"))));
		$GLOBALS['%s']->pop();
	}
	public $clientIP;
	public function get_clientIP() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_clientIP");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 122, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_clientIP"))));
		$GLOBALS['%s']->pop();
	}
	public $uri;
	public function get_uri() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_uri");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 130, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_uri"))));
		$GLOBALS['%s']->pop();
	}
	public $clientHeaders;
	public function get_clientHeaders() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_clientHeaders");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 136, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_clientHeaders"))));
		$GLOBALS['%s']->pop();
	}
	public $userAgent;
	public function get_userAgent() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_userAgent");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->userAgent === null) {
			$this->userAgent = ufront_web_UserAgent::fromString(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "User-Agent"));
		}
		{
			$tmp = $this->userAgent;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $httpMethod;
	public function get_httpMethod() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_httpMethod");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 156, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_httpMethod"))));
		$GLOBALS['%s']->pop();
	}
	public $scriptDirectory;
	public function get_scriptDirectory() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_scriptDirectory");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 168, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_scriptDirectory"))));
		$GLOBALS['%s']->pop();
	}
	public $authorization;
	public function get_authorization() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::get_authorization");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 180, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_authorization"))));
		$GLOBALS['%s']->pop();
	}
	public function isMultipart() {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::isMultipart");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_web_context_HttpRequest_0($this) && StringTools::startsWith(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "Content-Type"), "multipart/form-data");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseMultipart($onPart = null, $onData = null, $onEndPart = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::parseMultipart");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException(new thx_error_AbstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 216, "className" => "ufront.web.context.HttpRequest", "methodName" => "parseMultipart"))));
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
		$GLOBALS['%s']->push("ufront.web.context.HttpRequest::create");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new php_ufront_web_context_HttpRequest();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_authorization" => "get_authorization","get_scriptDirectory" => "get_scriptDirectory","get_httpMethod" => "get_httpMethod","get_userAgent" => "get_userAgent","get_clientHeaders" => "get_clientHeaders","get_uri" => "get_uri","get_clientIP" => "get_clientIP","get_hostName" => "get_hostName","get_cookies" => "get_cookies","get_files" => "get_files","get_post" => "get_post","get_query" => "get_query","get_postString" => "get_postString","get_queryString" => "get_queryString","get_params" => "get_params");
	function __toString() { return 'ufront.web.context.HttpRequest'; }
}
function ufront_web_context_HttpRequest_0(&$__hx__this) {
	{
		$this1 = $__hx__this->get_clientHeaders();
		return $this1->exists("Content-Type");
	}
}
