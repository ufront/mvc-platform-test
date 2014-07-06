<?php

class ufront_web_context_ActionContext {
	public function __construct($httpContext) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.context.ActionContext::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $httpContext) {
			throw new HException(new thx_error_NullArgument("httpContext", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "ActionContext.hx", "lineNumber" => 51, "className" => "ufront.web.context.ActionContext", "methodName" => "new"))));
		}
		$this->httpContext = $httpContext;
		$httpContext->actionContext = $this;
		$GLOBALS['%s']->pop();
	}}
	public $httpContext;
	public $handler;
	public $controller;
	public $action;
	public $args;
	public $actionResult;
	public $uriParts;
	public function get_uriParts() {
		$GLOBALS['%s']->push("ufront.web.context.ActionContext::get_uriParts");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->uriParts === null) {
			$this->uriParts = _hx_explode("/", $this->httpContext->getRequestUri());
			if($this->uriParts->length > 0 && $this->uriParts[0] === "") {
				$this->uriParts->shift();
			}
			if($this->uriParts->length > 0 && $this->uriParts[$this->uriParts->length - 1] === "") {
				$this->uriParts->pop();
			}
		}
		{
			$tmp = $this->uriParts;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.context.ActionContext::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "ActionContext(" . Std::string($this->controller) . ", " . _hx_string_or_null($this->action) . ", " . Std::string($this->args) . ")";
			$GLOBALS['%s']->pop();
			return $tmp;
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
	static $__properties__ = array("get_uriParts" => "get_uriParts");
	function __toString() { return $this->toString(); }
}
