<?php

class ufront_web_HttpError {
	public function __construct(){}
	static function wrap($e, $msg = null, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::wrap");
		$__hx__spos = $GLOBALS['%s']->length;
		if($msg === null) {
			$msg = "Internal Server Error";
		}
		if(Std::is($e, _hx_qtype("tink.core.TypedError"))) {
			$tmp = $e;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = tink_core_TypedError::withData(500, $msg, $e, $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function badRequest($pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::badRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core_TypedError(400, "Bad Request", $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function internalServerError($msg = null, $inner = null, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::internalServerError");
		$__hx__spos = $GLOBALS['%s']->length;
		if($msg === null) {
			$msg = "Internal Server Error";
		}
		{
			$tmp = tink_core_TypedError::withData(500, $msg, $inner, $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function methodNotAllowed($pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::methodNotAllowed");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core_TypedError(405, "Method Not Allowed", $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function pageNotFound($pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::pageNotFound");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core_TypedError(404, "Page Not Found", $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function unauthorized($pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::unauthorized");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core_TypedError(401, "Unauthorized Access", $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function unprocessableEntity($pos = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::unprocessableEntity");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core_TypedError(422, "Unprocessable Entity", $pos);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fakePosition($obj, $method, $args = null) {
		$GLOBALS['%s']->push("ufront.web.HttpError::fakePosition");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_anonymous(array("methodName" => $method, "lineNumber" => -1, "fileName" => "", "customParams" => $args, "className" => Type::getClassName(Type::getClass($obj))));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.web.HttpError'; }
}
