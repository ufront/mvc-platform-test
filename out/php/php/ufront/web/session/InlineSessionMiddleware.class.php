<?php

class ufront_web_session_InlineSessionMiddleware implements ufront_app_UFMiddleware{
	public function __construct() { 
	}
	public function requestIn($ctx) {
		if(ufront_web_session_InlineSessionMiddleware::$alwaysStart || $ctx->get_session()->isActive()) {
			return tink_core__Future_Future_Impl_::_map($ctx->get_session()->init(), array(new _hx_lambda(array(&$ctx), "ufront_web_session_InlineSessionMiddleware_0"), 'execute'));
		} else {
			return ufront_core_Sync::success();
		}
	}
	public function responseOut($ctx) {
		if($ctx->get_session()->isActive()) {
			return tink_core__Future_Future_Impl_::_map($ctx->get_session()->commit(), array(new _hx_lambda(array(&$ctx), "ufront_web_session_InlineSessionMiddleware_1"), 'execute'));
		} else {
			return ufront_core_Sync::success();
		}
	}
	static $alwaysStart;
	function __toString() { return 'ufront.web.session.InlineSessionMiddleware'; }
}
function ufront_web_session_InlineSessionMiddleware_0(&$ctx, $outcome) {
	{
		switch($outcome->index) {
		case 0:{
			$s = $outcome->params[0];
			return tink_core_Outcome::Success($s);
		}break;
		case 1:{
			$f = $outcome->params[0];
			return tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 38, "className" => "ufront.web.session.InlineSessionMiddleware", "methodName" => "requestIn"))));
		}break;
		}
	}
}
function ufront_web_session_InlineSessionMiddleware_1(&$ctx, $outcome) {
	{
		switch($outcome->index) {
		case 0:{
			$s = $outcome->params[0];
			return tink_core_Outcome::Success($s);
		}break;
		case 1:{
			$f = $outcome->params[0];
			return tink_core_Outcome::Failure(ufront_web_HttpError::internalServerError($f, null, _hx_anonymous(array("fileName" => "InlineSessionMiddleware.hx", "lineNumber" => 52, "className" => "ufront.web.session.InlineSessionMiddleware", "methodName" => "responseOut"))));
		}break;
		}
	}
}
