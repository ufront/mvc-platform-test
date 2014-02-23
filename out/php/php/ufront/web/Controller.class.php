<?php

class ufront_web_Controller {
	public function __construct($context = null) {
		if(!php_Boot::$skip_constructor) {
		if($context !== null) {
			$this->set_context($context);
		}
	}}
	public $context;
	public function execute() {
		return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError("Field execute() in ufront.web.Controller is an abstract method, please override it in " . _hx_string_or_null($this->toString()) . " ", null, _hx_anonymous(array("fileName" => "Controller.hx", "lineNumber" => 111, "className" => "ufront.web.Controller", "methodName" => "execute")))));
	}
	public function set_context($c) {
		if($c !== null) {
			$c->httpContext->injector->injectInto($this);
		}
		return $this->context = $c;
	}
	public function toString() {
		return Type::getClassName(Type::getClass($this));
	}
	public function ufTrace($msg, $pos = null) {
		$this->context->httpContext->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
	}
	public function ufLog($msg, $pos = null) {
		$this->context->httpContext->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Log)));
	}
	public function ufWarn($msg, $pos = null) {
		$this->context->httpContext->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Warning)));
	}
	public function ufError($msg, $pos = null) {
		$this->context->httpContext->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Error)));
	}
	public function wrapResult($result, $wrappingRequired) {
		if($result === null) {
			$actionResult = new ufront_web_result_EmptyResult(true);
			return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success($actionResult));
		} else {
			$future = null;
			if(($wrappingRequired & 1 << ufront_web_WrapRequired::$WRFuture->index) !== 0) {
				$future = $this->wrapInFuture($result);
			} else {
				$future = $result;
			}
			$surprise = null;
			if(($wrappingRequired & 1 << ufront_web_WrapRequired::$WROutcome->index) !== 0) {
				$surprise = $this->wrapInOutcome($future);
			} else {
				$surprise = $future;
			}
			$finalResult = null;
			if(($wrappingRequired & 1 << ufront_web_WrapRequired::$WRResultOrError->index) !== 0) {
				$finalResult = $this->wrapResultOrError($surprise);
			} else {
				$finalResult = $surprise;
			}
			return $finalResult;
		}
	}
	public function wrapInFuture($result) {
		return tink_core__Future_Future_Impl_::sync($result);
	}
	public function wrapInOutcome($future) {
		return tink_core__Future_Future_Impl_::map($future, array(new _hx_lambda(array(&$future), "ufront_web_Controller_0"), 'execute'), null);
	}
	public function wrapResultOrError($surprise) {
		return tink_core__Future_Future_Impl_::map($surprise, array(new _hx_lambda(array(&$surprise), "ufront_web_Controller_1"), 'execute'), null);
	}
	public function setContextActionResultWhenFinished($result) {
		$_g = $this;
		call_user_func_array($result, array(array(new _hx_lambda(array(&$_g, &$result), "ufront_web_Controller_2"), 'execute')));
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
	static $__properties__ = array("set_context" => "set_context");
	function __toString() { return $this->toString(); }
}
function ufront_web_Controller_0(&$future, $result) {
	{
		return tink_core_Outcome::Success($result);
	}
}
function ufront_web_Controller_1(&$surprise, $outcome) {
	{
		switch($outcome->index) {
		case 0:{
			$result = $outcome->params[0];
			return tink_core_Outcome::Success(ufront_web_result_ActionResult::wrap($result));
		}break;
		case 1:{
			$error = $outcome->params[0];
			return tink_core_Outcome::Failure(ufront_web_HttpError::wrap($error, null, _hx_anonymous(array("fileName" => "Controller.hx", "lineNumber" => 194, "className" => "ufront.web.Controller", "methodName" => "wrapResultOrError"))));
		}break;
		}
	}
}
function ufront_web_Controller_2(&$_g, &$result, $outcome) {
	{
		switch($outcome->index) {
		case 0:{
			$ar = $outcome->params[0];
			$_g->context->actionResult = $ar;
		}break;
		default:{
		}break;
		}
	}
}
