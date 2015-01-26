<?php

class thx_core_ArrayInts {
	public function __construct(){}
	static function average($arr) {
		return thx_core_ArrayInts::sum($arr) / $arr->length;
	}
	static function max($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayInts_0"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayInts_1"), 'execute'));
			return $initial;
		}
	}
	static function min($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayInts_2"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayInts_3"), 'execute'));
			return $initial;
		}
	}
	static function resize($array, $length, $fill = null) {
		if($fill === null) {
			$fill = 0;
		}
		while($array->length < $length) {
			$array->push($fill);
		}
		$array->splice($length, $array->length - $length);
		return $array;
	}
	static function sum($arr) {
		$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayInts_4"), 'execute');
		$initial = 0;
		$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayInts_5"), 'execute'));
		return $initial;
	}
	function __toString() { return 'thx.core.ArrayInts'; }
}
function thx_core_ArrayInts_0(&$arr, $max, $v) {
	{
		if($v > $max) {
			return $v;
		} else {
			return $max;
		}
	}
}
function thx_core_ArrayInts_1(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
function thx_core_ArrayInts_2(&$arr, $min, $v) {
	{
		if($v < $min) {
			return $v;
		} else {
			return $min;
		}
	}
}
function thx_core_ArrayInts_3(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
function thx_core_ArrayInts_4(&$arr, $tot, $v) {
	{
		return $tot + $v;
	}
}
function thx_core_ArrayInts_5(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
