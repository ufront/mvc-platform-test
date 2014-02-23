<?php

class ufront_web_context_ActionContext {
	public function __construct($httpContext, $controller = null, $action = null, $args = null) {
		if(!php_Boot::$skip_constructor) {
		if(null === $httpContext) {
			throw new HException(new thx_error_NullArgument("httpContext", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "ActionContext.hx", "lineNumber" => 56, "className" => "ufront.web.context.ActionContext", "methodName" => "new"))));
		}
		$this->httpContext = $httpContext;
		$this->controller = $controller;
		$this->action = $action;
		$this->args = $args;
		$httpContext->actionContext = $this;
	}}
	public $httpContext;
	public $request;
	public $response;
	public $session;
	public $auth;
	public $controller;
	public $action;
	public $args;
	public $actionResult;
	public $uriParts;
	public function get_request() {
		return $this->httpContext->request;
	}
	public function get_response() {
		return $this->httpContext->response;
	}
	public function get_session() {
		return $this->httpContext->get_session();
	}
	public function get_auth() {
		return $this->httpContext->get_auth();
	}
	public function get_uriParts() {
		if($this->uriParts === null) {
			$this->uriParts = _hx_explode("/", $this->httpContext->getRequestUri());
			if($this->uriParts->length > 0 && $this->uriParts[0] === "") {
				$this->uriParts->shift();
			}
			if($this->uriParts->length > 0 && $this->uriParts[$this->uriParts->length - 1] === "") {
				$this->uriParts->pop();
			}
		}
		return $this->uriParts;
	}
	public function toString() {
		return "ActionContext(" . Std::string($this->controller) . ", " . _hx_string_or_null($this->action) . ", " . Std::string($this->args) . ")";
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
	static $__properties__ = array("get_uriParts" => "get_uriParts","get_auth" => "get_auth","get_session" => "get_session","get_response" => "get_response","get_request" => "get_request");
	function __toString() { return $this->toString(); }
}
