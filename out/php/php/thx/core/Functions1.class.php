<?php

class thx_core_Functions1 {
	public function __construct(){}
	static function compose($fa, $fb) {
		return array(new _hx_lambda(array(&$fa, &$fb), "thx_core_Functions1_0"), 'execute');
	}
	static function join($fa, $fb) {
		return array(new _hx_lambda(array(&$fa, &$fb), "thx_core_Functions1_1"), 'execute');
	}
	static function memoize($callback, $resolver = null) {
		if(null === $resolver) {
			$resolver = array(new _hx_lambda(array(&$callback, &$resolver), "thx_core_Functions1_2"), 'execute');
		}
		$map = new haxe_ds_StringMap();
		return array(new _hx_lambda(array(&$callback, &$map, &$resolver), "thx_core_Functions1_3"), 'execute');
	}
	static function negate($callback) {
		return array(new _hx_lambda(array(&$callback), "thx_core_Functions1_4"), 'execute');
	}
	static function noop($_) {
	}
	static function times($n, $callback) {
		return array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions1_5"), 'execute');
	}
	static function timesi($n, $callback) {
		return array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions1_6"), 'execute');
	}
	static function swapArguments($callback) {
		return array(new _hx_lambda(array(&$callback), "thx_core_Functions1_7"), 'execute');
	}
	function __toString() { return 'thx.core.Functions1'; }
}
function thx_core_Functions1_0(&$fa, &$fb, $v) {
	{
		return call_user_func_array($fa, array(call_user_func_array($fb, array($v))));
	}
}
function thx_core_Functions1_1(&$fa, &$fb, $v) {
	{
		call_user_func_array($fa, array($v));
		call_user_func_array($fb, array($v));
	}
}
function thx_core_Functions1_2(&$callback, &$resolver, $v) {
	{
		return "" . Std::string($v);
	}
}
function thx_core_Functions1_3(&$callback, &$map, &$resolver, $v1) {
	{
		$key = call_user_func_array($resolver, array($v1));
		if($map->exists($key)) {
			return $map->get($key);
		}
		$result = call_user_func_array($callback, array($v1));
		$map->set($key, $result);
		return $result;
	}
}
function thx_core_Functions1_4(&$callback, $v) {
	{
		return !call_user_func_array($callback, array($v));
	}
}
function thx_core_Functions1_5(&$callback, &$n, $value) {
	{
		return thx_core_Ints::range($n, null, null)->map(array(new _hx_lambda(array(&$callback, &$n, &$value), "thx_core_Functions1_8"), 'execute'));
	}
}
function thx_core_Functions1_6(&$callback, &$n, $value) {
	{
		return thx_core_Ints::range($n, null, null)->map(array(new _hx_lambda(array(&$callback, &$n, &$value), "thx_core_Functions1_9"), 'execute'));
	}
}
function thx_core_Functions1_7(&$callback, $a2, $a1) {
	{
		return call_user_func_array($callback, array($a1, $a2));
	}
}
function thx_core_Functions1_8(&$callback, &$n, &$value, $_) {
	{
		return call_user_func_array($callback, array($value));
	}
}
function thx_core_Functions1_9(&$callback, &$n, &$value, $i) {
	{
		return call_user_func_array($callback, array($value, $i));
	}
}
