<?php

class thx_core_ArrayStrings {
	public function __construct(){}
	static function compact($arr) {
		return $arr->filter(array(new _hx_lambda(array(&$arr), "thx_core_ArrayStrings_0"), 'execute'));
	}
	static function max($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayStrings_1"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayStrings_2"), 'execute'));
			return $initial;
		}
	}
	static function min($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayStrings_3"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayStrings_4"), 'execute'));
			return $initial;
		}
	}
	function __toString() { return 'thx.core.ArrayStrings'; }
}
function thx_core_ArrayStrings_0(&$arr, $v) {
	{
		return !thx_core_Strings::isEmpty($v);
	}
}
function thx_core_ArrayStrings_1(&$arr, $max, $v) {
	{
		if($v > $max) {
			return $v;
		} else {
			return $max;
		}
	}
}
function thx_core_ArrayStrings_2(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
function thx_core_ArrayStrings_3(&$arr, $min, $v) {
	{
		if($v < $min) {
			return $v;
		} else {
			return $min;
		}
	}
}
function thx_core_ArrayStrings_4(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
