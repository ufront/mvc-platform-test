<?php

class ufront_core_Sync {
	public function __construct(){}
	static function success() {
		$GLOBALS['%s']->push("ufront.core.Sync::success");
		$__hx__spos = $GLOBALS['%s']->length;
		if(ufront_core_Sync::$s === null) {
			ufront_core_Sync::$s = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(tink_core_Noise::$Noise));
		}
		{
			$tmp = ufront_core_Sync::$s;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $s;
	static function httpError($msg = null, $err = null, $p = null) {
		$GLOBALS['%s']->push("ufront.core.Sync::httpError");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::wrap($err, $msg, $p)));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function of($v) {
		$GLOBALS['%s']->push("ufront.core.Sync::of");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::sync($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.core.Sync'; }
}
