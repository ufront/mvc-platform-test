<?php

class tink_core__Pair_Pair_Impl_ {
	public function __construct(){}
	static function _new($a, $b) {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new tink_core__Pair_Data($a, $b);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_a($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::get_a");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->a;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_b($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::get_b");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function toBool($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::toBool");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1 !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isNil($this1) {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::isNil");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1 === null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function nil() {
		$GLOBALS['%s']->push("tink.core._Pair.Pair_Impl_::nil");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_b" => "get_b","get_a" => "get_a");
	function __toString() { return 'tink.core._Pair.Pair_Impl_'; }
}
