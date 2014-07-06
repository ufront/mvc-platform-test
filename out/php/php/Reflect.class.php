<?php

class Reflect {
	public function __construct(){}
	static function field($o, $field) {
		$GLOBALS['%s']->push("Reflect::field");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_field($o, $field);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function setProperty($o, $field, $value) {
		$GLOBALS['%s']->push("Reflect::setProperty");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $o) {
			$GLOBALS['%s']->pop();
			null;
			return;
		}
		$cls = null;
		if(Std::is($o, _hx_qtype("Class"))) {
			$cls = $o->__tname__;
		} else {
			$cls = get_class($o);
		}
		$cls_vars = get_class_vars($cls);
		if(isset($cls_vars['__properties__']) && isset($cls_vars['__properties__']['set_'.$field]) && ($field = $cls_vars['__properties__']['set_'.$field])) {
			$tmp = $o->$field($value);
			$GLOBALS['%s']->pop();
			$tmp;
			return;
		} else {
			$tmp = $o->$field = $value;
			$GLOBALS['%s']->pop();
			$tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	static function callMethod($o, $func, $args) {
		$GLOBALS['%s']->push("Reflect::callMethod");
		$__hx__spos = $GLOBALS['%s']->length;
		if(is_string($o) && !is_array($func)) {
			$tmp = call_user_func_array(Reflect::field($o, $func), $args->a);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		{
			$tmp = call_user_func_array(((is_callable($func)) ? $func : array($o, $func)), ((null === $args) ? array() : $args->a));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fields($o) {
		$GLOBALS['%s']->push("Reflect::fields");
		$__hx__spos = $GLOBALS['%s']->length;
		if($o === null) {
			$tmp = new _hx_array(array());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		if($o instanceof _hx_array) {
			$tmp = new _hx_array(array('concat','copy','insert','iterator','length','join','pop','push','remove','reverse','shift','slice','sort','splice','toString','unshift'));
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			if(is_string($o)) {
				$tmp = new _hx_array(array('charAt','charCodeAt','indexOf','lastIndexOf','length','split','substr','toLowerCase','toString','toUpperCase'));
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$tmp = new _hx_array(_hx_get_object_vars($o));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function isFunction($f) {
		$GLOBALS['%s']->push("Reflect::isFunction");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (is_array($f) && is_callable($f)) || _hx_is_lambda($f) || is_array($f) && Reflect_0($f) && $f[1] !== "length";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Reflect::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		if((is_object($_t = $a) && !($_t instanceof Enum) ? $_t === $b : $_t == $b)) {
			$GLOBALS['%s']->pop();
			return 0;
		} else {
			if($a > $b) {
				$GLOBALS['%s']->pop();
				return 1;
			} else {
				$GLOBALS['%s']->pop();
				return -1;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function compareMethods($f1, $f2) {
		$GLOBALS['%s']->push("Reflect::compareMethods");
		$__hx__spos = $GLOBALS['%s']->length;
		if(is_array($f1) && is_array($f1)) {
			$tmp = $f1[0] === $f2[0] && $f1[1] == $f2[1];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		if(is_string($f1) && is_string($f2)) {
			$tmp = _hx_equal($f1, $f2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function isObject($v) {
		$GLOBALS['%s']->push("Reflect::isObject");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if(is_object($v)) {
			$tmp = $v instanceof _hx_anonymous || Type::getClass($v) !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		{
			$tmp = is_string($v) && !_hx_is_lambda($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Reflect'; }
}
function Reflect_0(&$f) {
	{
		$o = $f[0];
		$field = $f[1];
		return _hx_has_field($o, $field);
	}
}
