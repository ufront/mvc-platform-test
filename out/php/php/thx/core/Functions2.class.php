<?php

class thx_core_Functions2 {
	public function __construct(){}
	static function memoize($callback, $resolver = null) {
		if(null === $resolver) {
			$resolver = array(new _hx_lambda(array(&$callback, &$resolver), "thx_core_Functions2_0"), 'execute');
		}
		$map = new haxe_ds_StringMap();
		return array(new _hx_lambda(array(&$callback, &$map, &$resolver), "thx_core_Functions2_1"), 'execute');
	}
	static function negate($callback) {
		return array(new _hx_lambda(array(&$callback), "thx_core_Functions2_2"), 'execute');
	}
	function __toString() { return 'thx.core.Functions2'; }
}
function thx_core_Functions2_0(&$callback, &$resolver, $v1, $v2) {
	{
		return "" . Std::string($v1) . ":" . Std::string($v2);
	}
}
function thx_core_Functions2_1(&$callback, &$map, &$resolver, $v11, $v21) {
	{
		$key = call_user_func_array($resolver, array($v11, $v21));
		if($map->exists($key)) {
			return $map->get($key);
		}
		$result = call_user_func_array($callback, array($v11, $v21));
		$map->set($key, $result);
		return $result;
	}
}
function thx_core_Functions2_2(&$callback, $v1, $v2) {
	{
		return !call_user_func_array($callback, array($v1, $v2));
	}
}
