<?php

class thx_core_Functions3 {
	public function __construct(){}
	static function memoize($callback, $resolver = null) {
		if(null === $resolver) {
			$resolver = array(new _hx_lambda(array(&$callback, &$resolver), "thx_core_Functions3_0"), 'execute');
		}
		$map = new haxe_ds_StringMap();
		return array(new _hx_lambda(array(&$callback, &$map, &$resolver), "thx_core_Functions3_1"), 'execute');
	}
	static function negate($callback) {
		return array(new _hx_lambda(array(&$callback), "thx_core_Functions3_2"), 'execute');
	}
	function __toString() { return 'thx.core.Functions3'; }
}
function thx_core_Functions3_0(&$callback, &$resolver, $v1, $v2, $v3) {
	{
		return "" . Std::string($v1) . ":" . Std::string($v2) . ":" . Std::string($v3);
	}
}
function thx_core_Functions3_1(&$callback, &$map, &$resolver, $v11, $v21, $v31) {
	{
		$key = call_user_func_array($resolver, array($v11, $v21, $v31));
		if($map->exists($key)) {
			return $map->get($key);
		}
		$result = call_user_func_array($callback, array($v11, $v21, $v31));
		$map->set($key, $result);
		return $result;
	}
}
function thx_core_Functions3_2(&$callback, $v1, $v2, $v3) {
	{
		return !call_user_func_array($callback, array($v1, $v2, $v3));
	}
}
