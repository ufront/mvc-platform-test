<?php

class tink_core__Pair_MPair_Impl_ {
	public function __construct(){}
	static function _new($a, $b) {
		$GLOBALS['%s']->push("tink.core._Pair.MPair_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core__Pair_Data($a, $b);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_a($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.MPair_Impl_::get_a");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->a;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_b($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.MPair_Impl_::get_b");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set_a($this1, $v) {
		$GLOBALS['%s']->push("tink.core._Pair.MPair_Impl_::set_a");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->a = $v;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set_b($this1, $v) {
		$GLOBALS['%s']->push("tink.core._Pair.MPair_Impl_::set_b");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->b = $v;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_b" => "set_b","get_b" => "get_b","set_a" => "set_a","get_a" => "get_a");
	function __toString() { return 'tink.core._Pair.MPair_Impl_'; }
}
