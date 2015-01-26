<?php

class thx_core_Functions0 {
	public function __construct(){}
	static function after($callback, $n) {
		return array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions0_0"), 'execute');
	}
	static function join($fa, $fb) {
		return array(new _hx_lambda(array(&$fa, &$fb), "thx_core_Functions0_1"), 'execute');
	}
	static function once($f) {
		return array(new _hx_lambda(array(&$f), "thx_core_Functions0_2"), 'execute');
	}
	static function negate($callback) {
		return array(new _hx_lambda(array(&$callback), "thx_core_Functions0_3"), 'execute');
	}
	static function times($n, $callback) {
		return array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions0_4"), 'execute');
	}
	static function timesi($n, $callback) {
		return array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions0_5"), 'execute');
	}
	function __toString() { return 'thx.core.Functions0'; }
}
function thx_core_Functions0_0(&$callback, &$n) {
	{
		if(--$n === 0) {
			call_user_func($callback);
		}
	}
}
function thx_core_Functions0_1(&$fa, &$fb) {
	{
		call_user_func($fa);
		call_user_func($fb);
	}
}
function thx_core_Functions0_2(&$f) {
	{
		$t = $f;
		$f = (isset(thx_core_Functions::$noop) ? thx_core_Functions::$noop: array("thx_core_Functions", "noop"));
		call_user_func($t);
	}
}
function thx_core_Functions0_3(&$callback) {
	{
		return !call_user_func($callback);
	}
}
function thx_core_Functions0_4(&$callback, &$n) {
	{
		return thx_core_Ints::range($n, null, null)->map(array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions0_6"), 'execute'));
	}
}
function thx_core_Functions0_5(&$callback, &$n) {
	{
		return thx_core_Ints::range($n, null, null)->map(array(new _hx_lambda(array(&$callback, &$n), "thx_core_Functions0_7"), 'execute'));
	}
}
function thx_core_Functions0_6(&$callback, &$n, $_) {
	{
		return call_user_func($callback);
	}
}
function thx_core_Functions0_7(&$callback, &$n, $i) {
	{
		return call_user_func_array($callback, array($i));
	}
}
