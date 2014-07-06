<?php

class ufront_web_result_ActionResult {
	public function __construct(){}
	public function executeResult($actionContext) {
		$GLOBALS['%s']->push("ufront.web.result.ActionResult::executeResult");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function wrap($resultValue) {
		$GLOBALS['%s']->push("ufront.web.result.ActionResult::wrap");
		$__hx__spos = $GLOBALS['%s']->length;
		if($resultValue === null) {
			$tmp = new ufront_web_result_EmptyResult(null);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$actionResultValue = Types::has($resultValue, _hx_qtype("ufront.web.result.ActionResult"));
			if($actionResultValue === null) {
				$actionResultValue = new ufront_web_result_ContentResult(Std::string($resultValue), null);
			}
			{
				$GLOBALS['%s']->pop();
				return $actionResultValue;
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.web.result.ActionResult'; }
}
