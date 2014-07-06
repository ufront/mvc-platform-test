<?php

class tink_core__Ref_Ref_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("tink.core._Ref.Ref_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Ref_Ref_Impl__0();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_value($this1) {
		$GLOBALS['%s']->push("tink.core._Ref.Ref_Impl_::get_value");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1[0];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set_value($this1, $param) {
		$GLOBALS['%s']->push("tink.core._Ref.Ref_Impl_::set_value");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1[0] = $param;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function toString($this1) {
		$GLOBALS['%s']->push("tink.core._Ref.Ref_Impl_::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "@[" . Std::string($this1[0]) . "]";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function to($v) {
		$GLOBALS['%s']->push("tink.core._Ref.Ref_Impl_::to");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = null;
		$ret = tink_core__Ref_Ref_Impl__1($ret, $v);
		$ret[0] = $v;
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_value" => "set_value","get_value" => "get_value");
	function __toString() { return 'tink.core._Ref.Ref_Impl_'; }
}
function tink_core__Ref_Ref_Impl__0() {
	{
		$this1 = null;
		$this1 = (new _hx_array(array()));
		$this1->length = 1;
		return $this1;
	}
}
function tink_core__Ref_Ref_Impl__1(&$ret, &$v) {
	{
		$this1 = null;
		$this1 = (new _hx_array(array()));
		$this1->length = 1;
		return $this1;
	}
}
