<?php

class tink_core__Callback_CallbackLink_Impl_ {
	public function __construct(){}
	static function _new($link) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $link;
		}
		$GLOBALS['%s']->pop();
	}
	static function dissolve($this1) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::dissolve");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this1 !== null) {
			call_user_func($this1);
		}
		$GLOBALS['%s']->pop();
	}
	static function toCallback($this1) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::toCallback");
		$__hx__spos = $GLOBALS['%s']->length;
		$f = $this1;
		{
			$tmp = array(new _hx_lambda(array(&$f, &$this1), "tink_core__Callback_CallbackLink_Impl__0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromFunction($f) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::fromFunction");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $f;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromMany($callbacks) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::fromMany");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$callbacks), "tink_core__Callback_CallbackLink_Impl__1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Callback.CallbackLink_Impl_'; }
}
function tink_core__Callback_CallbackLink_Impl__0(&$f, &$this1, $r) {
	{
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::toCallback@32");
		$__hx__spos2 = $GLOBALS['%s']->length;
		call_user_func($f);
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Callback_CallbackLink_Impl__1(&$callbacks) {
	{
		$GLOBALS['%s']->push("tink.core._Callback.CallbackLink_Impl_::fromMany@38");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$_g = 0;
		while($_g < $callbacks->length) {
			$cb = $callbacks[$_g];
			++$_g;
			if($cb !== null) {
				call_user_func($cb);
			}
			unset($cb);
		}
		$GLOBALS['%s']->pop();
	}
}
