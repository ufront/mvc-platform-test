<?php

class DynamicsT {
	public function __construct(){}
	static function toHash($ob) {
		$GLOBALS['%s']->push("DynamicsT::toHash");
		$__hx__spos = $GLOBALS['%s']->length;
		$Map = new haxe_ds_StringMap();
		{
			$tmp = DynamicsT::copyToHash($ob, $Map);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copyToHash($ob, $hash) {
		$GLOBALS['%s']->push("DynamicsT::copyToHash");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			$_g1 = Reflect::fields($ob);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$value = Reflect::field($ob, $field);
				$hash->set($field, $value);
				unset($value,$field);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $hash;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'DynamicsT'; }
}
