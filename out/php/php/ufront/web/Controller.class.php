<?php

class ufront_web_Controller {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.Controller::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $context;
	public function execute() {
		$GLOBALS['%s']->push("ufront.web.Controller::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError("Field execute() in ufront.web.Controller is an abstract method, please override it in " . _hx_string_or_null($this->toString()) . " ", null, _hx_anonymous(array("fileName" => "Controller.hx", "lineNumber" => 108, "className" => "ufront.web.Controller", "methodName" => "execute")))));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.Controller::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Type::getClassName(Type::getClass($this));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function ufTrace($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.Controller::ufTrace");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->context->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
		$GLOBALS['%s']->pop();
	}
	public function ufLog($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.Controller::ufLog");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->context->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Log)));
		$GLOBALS['%s']->pop();
	}
	public function ufWarn($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.Controller::ufWarn");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->context->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Warning)));
		$GLOBALS['%s']->pop();
	}
	public function ufError($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.Controller::ufError");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->context->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Error)));
		$GLOBALS['%s']->pop();
	}
	public function wrapResult($result, $wrappingRequired) {
		$GLOBALS['%s']->push("ufront.web.Controller::wrapResult");
		$__hx__spos = $GLOBALS['%s']->length;
		if($result === null) {
			$actionResult = new ufront_web_result_EmptyResult(true);
			{
				$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success($actionResult));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
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
			{
				$GLOBALS['%s']->pop();
				return $finalResult;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function wrapInFuture($result) {
		$GLOBALS['%s']->push("ufront.web.Controller::wrapInFuture");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::sync($result);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function wrapInOutcome($future) {
		$GLOBALS['%s']->push("ufront.web.Controller::wrapInOutcome");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::map($future, array(new _hx_lambda(array(&$future), "ufront_web_Controller_0"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function wrapResultOrError($surprise) {
		$GLOBALS['%s']->push("ufront.web.Controller::wrapResultOrError");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::map($surprise, array(new _hx_lambda(array(&$surprise), "ufront_web_Controller_1"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setContextActionResultWhenFinished($result) {
		$GLOBALS['%s']->push("ufront.web.Controller::setContextActionResultWhenFinished");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		call_user_func_array($result, array(array(new _hx_lambda(array(&$_g, &$result), "ufront_web_Controller_2"), 'execute')));
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
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	function __toString() { return $this->toString(); }
}
ufront_web_Controller::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("context" => _hx_anonymous(array("name" => (new _hx_array(array("context"))), "type" => (new _hx_array(array("ufront.web.context.HttpContext"))), "inject" => null))))));
function ufront_web_Controller_0(&$future, $result) {
	{
		$GLOBALS['%s']->push("ufront.web.Controller::wrapInOutcome@178");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core_Outcome::Success($result);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_Controller_1(&$surprise, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.web.Controller::wrapResultOrError@184");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$result = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Success(ufront_web_result_ActionResult::wrap($result));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$error = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::wrap($error, null, _hx_anonymous(array("fileName" => "Controller.hx", "lineNumber" => 186, "className" => "ufront.web.Controller", "methodName" => "wrapResultOrError"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_Controller_2(&$_g, &$result, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.web.Controller::setContextActionResultWhenFinished@193");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$ar = $outcome->params[0];
			$_g->context->actionContext->actionResult = $ar;
		}break;
		default:{
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
