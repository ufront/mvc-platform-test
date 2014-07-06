<?php

class tink_core__Signal_SignalTrigger_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("tink.core._Signal.SignalTrigger_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function trigger($this1, $event) {
		$GLOBALS['%s']->push("tink.core._Signal.SignalTrigger_Impl_::trigger");
		$__hx__spos = $GLOBALS['%s']->length;
		tink_core__Callback_CallbackList_Impl_::invoke($this1, $event);
		$GLOBALS['%s']->pop();
	}
	static function getLength($this1) {
		$GLOBALS['%s']->push("tink.core._Signal.SignalTrigger_Impl_::getLength");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->length;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function asSignal($this1) {
		$GLOBALS['%s']->push("tink.core._Signal.SignalTrigger_Impl_::asSignal");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Signal_SignalTrigger_Impl__0($this1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Signal.SignalTrigger_Impl_'; }
}
function tink_core__Signal_SignalTrigger_Impl__0(&$this1) {
	{
		$_e = $this1;
		return array(new _hx_lambda(array(&$_e, &$this1), "tink_core__Signal_SignalTrigger_Impl__1"), 'execute');
	}
}
function tink_core__Signal_SignalTrigger_Impl__1(&$_e, &$this1, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.SignalTrigger_Impl_::asSignal@85");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Callback_CallbackList_Impl_::add($_e, $cb);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
