<?php

class tink_core__Lazy_Lazy_Impl_ {
	public function __construct(){}
	static function _new($r) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $r;
		}
		$GLOBALS['%s']->pop();
	}
	static function get($this1) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::get");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func($this1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function ofFunc($f) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::ofFunc");
		$__hx__spos = $GLOBALS['%s']->length;
		$result = null;
		$busy = false;
		{
			$tmp = array(new _hx_lambda(array(&$busy, &$f, &$result), "tink_core__Lazy_Lazy_Impl__0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($this1, $f) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::map");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Lazy_Lazy_Impl_::ofFunc(array(new _hx_lambda(array(&$f, &$this1), "tink_core__Lazy_Lazy_Impl__1"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function flatMap($this1, $f) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::flatMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Lazy_Lazy_Impl_::ofFunc(array(new _hx_lambda(array(&$f, &$this1), "tink_core__Lazy_Lazy_Impl__2"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function ofConst($c) {
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::ofConst");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$c), "tink_core__Lazy_Lazy_Impl__3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Lazy.Lazy_Impl_'; }
}
function tink_core__Lazy_Lazy_Impl__0(&$busy, &$f, &$result) {
	{
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::ofFunc@13");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($busy) {
			throw new HException(new tink_core_TypedError(null, "circular lazyness", _hx_anonymous(array("fileName" => "Lazy.hx", "lineNumber" => 14, "className" => "tink.core._Lazy.Lazy_Impl_", "methodName" => "ofFunc"))));
		}
		if($f !== null) {
			$busy = true;
			$result = call_user_func($f);
			$f = null;
			$busy = false;
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Lazy_Lazy_Impl__1(&$f, &$this1) {
	{
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::map@26");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array(call_user_func($this1)));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Lazy_Lazy_Impl__2(&$f, &$this1) {
	{
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::flatMap@29");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$this2 = call_user_func_array($f, array(call_user_func($this1)));
		{
			$tmp = call_user_func($this2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Lazy_Lazy_Impl__3(&$c) {
	{
		$GLOBALS['%s']->push("tink.core._Lazy.Lazy_Impl_::ofConst@32");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $c;
		}
		$GLOBALS['%s']->pop();
	}
}
