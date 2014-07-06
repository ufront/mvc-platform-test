<?php

class ufront_web_session_InlineSessionMiddleware implements ufront_app_UFMiddleware{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.session.InlineSessionMiddleware::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function requestIn($ctx) {
		$GLOBALS['%s']->push("ufront.web.session.InlineSessionMiddleware::requestIn");
		$__hx__spos = $GLOBALS['%s']->length;
		if(ufront_web_session_InlineSessionMiddleware::$alwaysStart || $ctx->get_session()->isActive()) {
			$tmp = tink_core__Future_Future_Impl_::_map($ctx->get_session()->init(), array(new _hx_lambda(array(&$ctx), "ufront_web_session_InlineSessionMiddleware_0"), 'execute'));
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
		$GLOBALS['%s']->push("ufront.web.session.InlineSessionMiddleware::responseOut");
		$__hx__spos = $GLOBALS['%s']->length;
		if($ctx->get_session()->isActive()) {
			$tmp = tink_core__Future_Future_Impl_::_map($ctx->get_session()->commit(), array(new _hx_lambda(array(&$ctx), "ufront_web_session_InlineSessionMiddleware_1"), 'execute'));
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
	function __toString() { return 'ufront.web.session.InlineSessionMiddleware'; }
}
function ufront_web_session_InlineSessionMiddleware_0(&$ctx, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.web.session.InlineSessionMiddleware::requestIn@36");
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
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 38, "className" => "ufront.web.session.InlineSessionMiddleware", "methodName" => "requestIn"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_session_InlineSessionMiddleware_1(&$ctx, $outcome) {
	{
		$GLOBALS['%s']->push("ufront.web.session.InlineSessionMiddleware::responseOut@50");
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
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 52, "className" => "ufront.web.session.InlineSessionMiddleware", "methodName" => "responseOut"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
