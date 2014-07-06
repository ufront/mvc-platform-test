<?php

class ufront_middleware_InlineSessionMiddleware implements ufront_app_UFMiddleware{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.middleware.InlineSessionMiddleware::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function requestIn($ctx) {
		$GLOBALS['%s']->push("ufront.middleware.InlineSessionMiddleware::requestIn");
		$__hx__spos = $GLOBALS['%s']->length;
		if(ufront_middleware_InlineSessionMiddleware::$alwaysStart && $ctx->get_session() !== null || $ctx->_session !== null) {
			$tmp = tink_core__Future_Future_Impl_::_map($ctx->get_session()->init(), array(new _hx_lambda(array(&$ctx), "ufront_middleware_InlineSessionMiddleware_0"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function responseOut($ctx) {
		$GLOBALS['%s']->push("ufront.middleware.InlineSessionMiddleware::responseOut");
		$__hx__spos = $GLOBALS['%s']->length;
		if($ctx->_session !== null) {
			$tmp = tink_core__Future_Future_Impl_::_map($ctx->get_session()->commit(), array(new _hx_lambda(array(&$ctx), "ufront_middleware_InlineSessionMiddleware_1"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $alwaysStart;
	function __toString() { return 'ufront.middleware.InlineSessionMiddleware'; }
}
function ufront_middleware_InlineSessionMiddleware_0(&$ctx, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.middleware.InlineSessionMiddleware::requestIn@35");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$s = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Success($s);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$f = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 37, "className" => "ufront.middleware.InlineSessionMiddleware", "methodName" => "requestIn"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_middleware_InlineSessionMiddleware_1(&$ctx, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.middleware.InlineSessionMiddleware::responseOut@50");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$s = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Success($s);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$f = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 52, "className" => "ufront.middleware.InlineSessionMiddleware", "methodName" => "responseOut"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
