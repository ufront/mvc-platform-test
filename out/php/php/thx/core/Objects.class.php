<?php

class thx_core_Objects {
	public function __construct(){}
	static function isEmpty($o) {
		return Reflect::fields($o)->length === 0;
	}
	static function exists($o, $name) {
		return _hx_has_field($o, $name);
	}
	static function fields($o) {
		return Reflect::fields($o);
	}
	static function merge($to, $from, $replacef = null) {
		if(null === $replacef) {
			$replacef = array(new _hx_lambda(array(&$from, &$replacef, &$to), "thx_core_Objects_0"), 'execute');
		}
		{
			$_g = 0;
			$_g1 = Reflect::fields($from);
			while($_g < $_g1->length) {
				$field1 = $_g1[$_g];
				++$_g;
				$newv1 = Reflect::field($from, $field1);
				if(_hx_has_field($to, $field1)) {
					$value = call_user_func_array($replacef, array($field1, Reflect::field($to, $field1), $newv1));
					$to->{$field1} = $value;
					unset($value);
				} else {
					$to->{$field1} = $newv1;
				}
				unset($newv1,$field1);
			}
		}
		return $to;
	}
	static function copyTo($src, $dst, $cloneInstances = null) {
		if($cloneInstances === null) {
			$cloneInstances = false;
		}
		{
			$_g = 0;
			$_g1 = Reflect::fields($src);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$sv = thx_core_Dynamics::hclone(Reflect::field($src, $field), $cloneInstances);
				$dv = Reflect::field($dst, $field);
				if(Reflect::isObject($sv) && null === Type::getClass($sv) && (Reflect::isObject($dv) && null === Type::getClass($dv))) {
					thx_core_Objects::copyTo($sv, $dv, null);
				} else {
					$dst->{$field} = $sv;
				}
				unset($sv,$field,$dv);
			}
		}
		return $dst;
	}
	static function hclone($src, $cloneInstances = null) {
		if($cloneInstances === null) {
			$cloneInstances = false;
		}
		return thx_core_Dynamics::hclone($src, $cloneInstances);
	}
	static function objectToMap($o) {
		$array = thx_core_Objects::tuples($o);
		$callback = array(new _hx_lambda(array(&$array, &$o), "thx_core_Objects_1"), 'execute');
		$initial = new haxe_ds_StringMap();
		$array->map(array(new _hx_lambda(array(&$array, &$callback, &$initial, &$o), "thx_core_Objects_2"), 'execute'));
		return $initial;
	}
	static function size($o) {
		return Reflect::fields($o)->length;
	}
	static function values($o) {
		return Reflect::fields($o)->map(array(new _hx_lambda(array(&$o), "thx_core_Objects_3"), 'execute'));
	}
	static function tuples($o) {
		return Reflect::fields($o)->map(array(new _hx_lambda(array(&$o), "thx_core_Objects_4"), 'execute'));
	}
	function __toString() { return 'thx.core.Objects'; }
}
function thx_core_Objects_0(&$from, &$replacef, &$to, $field, $oldv, $newv) {
	{
		return $newv;
	}
}
function thx_core_Objects_1(&$array, &$o, $map, $t) {
	{
		{
			$value = $t->_1;
			$map->set($t->_0, $value);
		}
		return $map;
	}
}
function thx_core_Objects_2(&$array, &$callback, &$initial, &$o, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
function thx_core_Objects_3(&$o, $key) {
	{
		return Reflect::field($o, $key);
	}
}
function thx_core_Objects_4(&$o, $key) {
	{
		$_1 = Reflect::field($o, $key);
		return _hx_anonymous(array("_0" => $key, "_1" => $_1));
	}
}
