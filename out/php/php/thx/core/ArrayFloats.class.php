<?php

class thx_core_ArrayFloats {
	public function __construct(){}
	static function average($arr) {
		return thx_core_ArrayFloats::sum($arr) / $arr->length;
	}
	static function compact($arr) {
		return $arr->filter(array(new _hx_lambda(array(&$arr), "thx_core_ArrayFloats_0"), 'execute'));
	}
	static function max($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayFloats_1"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayFloats_2"), 'execute'));
			return $initial;
		}
	}
	static function min($arr) {
		if($arr->length === 0) {
			return null;
		} else {
			$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayFloats_3"), 'execute');
			$initial = $arr[0];
			$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayFloats_4"), 'execute'));
			return $initial;
		}
	}
	static function resize($array, $length, $fill = null) {
		if($fill === null) {
			$fill = 0.0;
		}
		while($array->length < $length) {
			$array->push($fill);
		}
		$array->splice($length, $array->length - $length);
		return $array;
	}
	static function sum($arr) {
		$callback = array(new _hx_lambda(array(&$arr), "thx_core_ArrayFloats_5"), 'execute');
		$initial = 0.0;
		$arr->map(array(new _hx_lambda(array(&$arr, &$callback, &$initial), "thx_core_ArrayFloats_6"), 'execute'));
		return $initial;
	}
	function __toString() { return 'thx.core.ArrayFloats'; }
}
function thx_core_ArrayFloats_0(&$arr, $v) {
	{
		return null !== $v && Math::isFinite($v);
	}
}
function thx_core_ArrayFloats_1(&$arr, $max, $v) {
	{
		if($v > $max) {
			return $v;
		} else {
			return $max;
		}
	}
}
function thx_core_ArrayFloats_2(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
function thx_core_ArrayFloats_3(&$arr, $min, $v) {
	{
		if($v < $min) {
			return $v;
		} else {
			return $min;
		}
	}
}
function thx_core_ArrayFloats_4(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
function thx_core_ArrayFloats_5(&$arr, $tot, $v) {
	{
		return $tot + $v;
	}
}
function thx_core_ArrayFloats_6(&$arr, &$callback, &$initial, $v1) {
	{
		$initial = call_user_func_array($callback, array($initial, $v1));
	}
}
