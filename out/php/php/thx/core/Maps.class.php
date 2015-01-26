<?php

class thx_core_Maps {
	public function __construct(){}
	static function tuples($map) {
		return thx_core_Iterators::map($map->keys(), array(new _hx_lambda(array(&$map), "thx_core_Maps_0"), 'execute'));
	}
	static function mapToObject($map) {
		$array = thx_core_Maps::tuples($map);
		$callback = array(new _hx_lambda(array(&$array, &$map), "thx_core_Maps_1"), 'execute');
		$initial = _hx_anonymous(array());
		$array->map(array(new _hx_lambda(array(&$array, &$callback, &$initial, &$map), "thx_core_Maps_2"), 'execute'));
		return $initial;
	}
	static function isMap($v) {
		return Std::is($v, _hx_qtype("IMap"));
	}
	function __toString() { return 'thx.core.Maps'; }
}
function thx_core_Maps_0(&$map, $key) {
	{
		$_1 = $map->get($key);
		return _hx_anonymous(array("_0" => $key, "_1" => $_1));
	}
}
function thx_core_Maps_1(&$array, &$map, $o, $t) {
	{
		$o->{$t->_0} = $t->_1;
		return $o;
	}
}
function thx_core_Maps_2(&$array, &$callback, &$initial, &$map, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
