<?php

class tink_core__Signal_Signal_Impl_ {
	public function __construct(){}
	static function _new($f) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $f;
		}
		$GLOBALS['%s']->pop();
	}
	static function handle($this1, $handler) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::handle");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($this1, array($handler));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($this1, $f, $gather = null) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::map");
		$__hx__spos = $GLOBALS['%s']->length;
		if($gather === null) {
			$gather = true;
		}
		$ret = array(new _hx_lambda(array(&$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__0"), 'execute');
		if($gather) {
			$tmp = tink_core__Signal_Signal_Impl_::gather($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function flatMap($this1, $f, $gather = null) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::flatMap");
		$__hx__spos = $GLOBALS['%s']->length;
		if($gather === null) {
			$gather = true;
		}
		$ret = array(new _hx_lambda(array(&$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__1"), 'execute');
		if($gather) {
			$tmp = tink_core__Signal_Signal_Impl_::gather($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function filter($this1, $f, $gather = null) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::filter");
		$__hx__spos = $GLOBALS['%s']->length;
		if($gather === null) {
			$gather = true;
		}
		$ret = array(new _hx_lambda(array(&$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__2"), 'execute');
		if($gather) {
			$tmp = tink_core__Signal_Signal_Impl_::gather($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function join($this1, $other, $gather = null) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::join");
		$__hx__spos = $GLOBALS['%s']->length;
		if($gather === null) {
			$gather = true;
		}
		$ret = array(new _hx_lambda(array(&$gather, &$other, &$this1), "tink_core__Signal_Signal_Impl__3"), 'execute');
		if($gather) {
			$tmp = tink_core__Signal_Signal_Impl_::gather($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function next($this1) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::next");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = new tink_core_FutureTrigger();
		{
			$handler = tink_core__Callback_CallbackLink_Impl_::toCallback(call_user_func_array($this1, array((isset($ret->trigger) ? $ret->trigger: array($ret, "trigger")))));
			call_user_func_array($this1, array($handler));
		}
		{
			$tmp = $ret->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function noise($this1) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::noise");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Signal_Signal_Impl_::map($this1, array(new _hx_lambda(array(&$this1), "tink_core__Signal_Signal_Impl__4"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function gather($this1) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::gather");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = tink_core__Signal_Signal_Impl_::trigger();
		call_user_func_array($this1, array(array(new _hx_lambda(array(&$ret, &$this1), "tink_core__Signal_Signal_Impl__5"), 'execute')));
		{
			$tmp = tink_core__Signal_SignalTrigger_Impl_::asSignal($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function trigger() {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::trigger");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function ofClassical($add, $remove, $gather = null) {
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical");
		$__hx__spos = $GLOBALS['%s']->length;
		if($gather === null) {
			$gather = true;
		}
		$ret = array(new _hx_lambda(array(&$add, &$gather, &$remove), "tink_core__Signal_Signal_Impl__6"), 'execute');
		if($gather) {
			$tmp = tink_core__Signal_Signal_Impl_::gather($ret);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Signal.Signal_Impl_'; }
}
function tink_core__Signal_Signal_Impl__0(&$f, &$gather, &$this1, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::map@14");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($this1, array(array(new _hx_lambda(array(&$cb, &$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__7"), 'execute')));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__1(&$f, &$gather, &$this1, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::flatMap@21");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($this1, array(array(new _hx_lambda(array(&$cb, &$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__8"), 'execute')));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__2(&$f, &$gather, &$this1, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::filter@28");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($this1, array(array(new _hx_lambda(array(&$cb, &$f, &$gather, &$this1), "tink_core__Signal_Signal_Impl__9"), 'execute')));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__3(&$gather, &$other, &$this1, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::join@36");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Callback_CallbackLink_Impl_::fromMany((new _hx_array(array(call_user_func_array($this1, array($cb)), call_user_func_array($other, array($cb))))));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__4(&$this1, $_) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::noise@54");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core_Noise::$Noise;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__5(&$ret, &$this1, $x) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::gather@58");
		$__hx__spos2 = $GLOBALS['%s']->length;
		tink_core__Callback_CallbackList_Impl_::invoke($ret, $x);
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__6(&$add, &$gather, &$remove, $cb) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@66");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$f = array(new _hx_lambda(array(&$add, &$cb, &$gather, &$remove), "tink_core__Signal_Signal_Impl__10"), 'execute');
		call_user_func_array($add, array($f));
		{
			$tmp = tink_core__Signal_Signal_Impl__11($add, $cb, $f, $gather, $remove);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__7(&$cb, &$f, &$gather, &$this1, $result) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@14");
		$__hx__spos3 = $GLOBALS['%s']->length;
		$data = call_user_func_array($f, array($result));
		call_user_func_array($cb, array($data));
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__8(&$cb, &$f, &$gather, &$this1, $result) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@21");
		$__hx__spos3 = $GLOBALS['%s']->length;
		$this2 = call_user_func_array($f, array($result));
		call_user_func_array($this2, array($cb));
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__9(&$cb, &$f, &$gather, &$this1, $result) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@28");
		$__hx__spos3 = $GLOBALS['%s']->length;
		if(call_user_func_array($f, array($result))) {
			call_user_func_array($cb, array($result));
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__10(&$add, &$cb, &$gather, &$remove, $a) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@67");
		$__hx__spos3 = $GLOBALS['%s']->length;
		call_user_func_array($cb, array($a));
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Signal_Signal_Impl__11(&$add, &$cb, &$f, &$gather, &$remove) {
	{
		$f1 = $remove;
		$a1 = $f;
		return array(new _hx_lambda(array(&$a1, &$add, &$cb, &$f, &$f1, &$gather, &$remove), "tink_core__Signal_Signal_Impl__12"), 'execute');
	}
}
function tink_core__Signal_Signal_Impl__12(&$a1, &$add, &$cb, &$f, &$f1, &$gather, &$remove) {
	{
		$GLOBALS['%s']->push("tink.core._Signal.Signal_Impl_::ofClassical@69");
		$__hx__spos3 = $GLOBALS['%s']->length;
		call_user_func_array($f1, array($a1));
		$GLOBALS['%s']->pop();
	}
}
