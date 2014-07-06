<?php

class tink_core__Callback_CallbackList_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_length($this1) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::get_length");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->length;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function add($this1, $cb) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::add");
		$__hx__spos = $GLOBALS['%s']->length;
		$cell = null;
		if(tink_core__Callback_Cell::$pool->length > 0) {
			$cell = tink_core__Callback_Cell::$pool->pop();
		} else {
			$cell = new tink_core__Callback_Cell();
		}
		$cell->cb = $cb;
		$this1->push($cell);
		{
			$tmp = array(new _hx_lambda(array(&$cb, &$cell, &$this1), "tink_core__Callback_CallbackList_Impl__0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function invoke($this1, $data) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::invoke");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = $this1->copy();
		while($_g < $_g1->length) {
			$cell = $_g1[$_g];
			++$_g;
			if($cell->cb !== null) {
				$cell->cb($data);
			}
			unset($cell);
		}
		$GLOBALS['%s']->pop();
	}
	static function clear($this1) {
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = $this1->splice(0, $this1->length);
		while($_g < $_g1->length) {
			$cell = $_g1[$_g];
			++$_g;
			$cell->cb = null;
			tink_core__Callback_Cell::$pool->push($cell);
			unset($cell);
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'tink.core._Callback.CallbackList_Impl_'; }
}
function tink_core__Callback_CallbackList_Impl__0(&$cb, &$cell, &$this1) {
	{
		$GLOBALS['%s']->push("tink.core._Callback.CallbackList_Impl_::add@74");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($this1->remove($cell)) {
			$cell->cb = null;
			tink_core__Callback_Cell::$pool->push($cell);
		}
		$cell = null;
		$GLOBALS['%s']->pop();
	}
}
