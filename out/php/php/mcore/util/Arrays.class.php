<?php

class mcore_util_Arrays {
	public function __construct(){}
	static function toString($source) {
		$GLOBALS['%s']->push("mcore.util.Arrays::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $source->join(",");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function shuffle($source) {
		$GLOBALS['%s']->push("mcore.util.Arrays::shuffle");
		$__hx__spos = $GLOBALS['%s']->length;
		$copy = $source->copy();
		$shuffled = (new _hx_array(array()));
		while($copy->length > 0) {
			$shuffled->push(_hx_array_get($copy->splice(Std::random($copy->length), 1), 0));
		}
		{
			$GLOBALS['%s']->pop();
			return $shuffled;
		}
		$GLOBALS['%s']->pop();
	}
	static function lastItem($source) {
		$GLOBALS['%s']->push("mcore.util.Arrays::lastItem");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $source[$source->length - 1];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'mcore.util.Arrays'; }
}
