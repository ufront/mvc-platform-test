<?php

class Iterators {
	public function __construct(){}
	static function count($it) {
		$GLOBALS['%s']->push("Iterators::count");
		$__hx__spos = $GLOBALS['%s']->length;
		$i = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($_);
			$_ = $__hx__it->next();
			$i++;
		}
		{
			$GLOBALS['%s']->pop();
			return $i;
		}
		$GLOBALS['%s']->pop();
	}
	static function indexOf($it, $v = null, $f = null) {
		$GLOBALS['%s']->push("Iterators::indexOf");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $f) {
			$f = array(new _hx_lambda(array(&$f, &$it, &$v), "Iterators_0"), 'execute');
		}
		$c = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($i);
			$i = $__hx__it->next();
			if(call_user_func_array($f, array($i))) {
				$GLOBALS['%s']->pop();
				return $c;
			} else {
				$c++;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	static function contains($it, $v = null, $f = null) {
		$GLOBALS['%s']->push("Iterators::contains");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $f) {
			$f = array(new _hx_lambda(array(&$f, &$it, &$v), "Iterators_1"), 'execute');
		}
		$c = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($i);
			$i = $__hx__it->next();
			if(call_user_func_array($f, array($i))) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function harray($it) {
		$GLOBALS['%s']->push("Iterators::array");
		$__hx__spos = $GLOBALS['%s']->length;
		$result = (new _hx_array(array()));
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($v);
			$v = $__hx__it->next();
			$result->push($v);
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function join($it, $glue = null) {
		$GLOBALS['%s']->push("Iterators::join");
		$__hx__spos = $GLOBALS['%s']->length;
		if($glue === null) {
			$glue = ", ";
		}
		{
			$tmp = Iterators::harray($it)->join($glue);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($it, $f) {
		$GLOBALS['%s']->push("Iterators::map");
		$__hx__spos = $GLOBALS['%s']->length;
		$result = (new _hx_array(array()));
		$i = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($v);
			$v = $__hx__it->next();
			$result->push(call_user_func_array($f, array($v, $i++)));
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function each($it, $f) {
		$GLOBALS['%s']->push("Iterators::each");
		$__hx__spos = $GLOBALS['%s']->length;
		$i = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($o);
			$o = $__hx__it->next();
			call_user_func_array($f, array($o, $i++));
		}
		$GLOBALS['%s']->pop();
	}
	static function filter($it, $f) {
		$GLOBALS['%s']->push("Iterators::filter");
		$__hx__spos = $GLOBALS['%s']->length;
		$result = (new _hx_array(array()));
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($i);
			$i = $__hx__it->next();
			if(call_user_func_array($f, array($i))) {
				$result->push($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function reduce($it, $f, $initialValue) {
		$GLOBALS['%s']->push("Iterators::reduce");
		$__hx__spos = $GLOBALS['%s']->length;
		$accumulator = $initialValue;
		$i = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($o);
			$o = $__hx__it->next();
			$accumulator = call_user_func_array($f, array($accumulator, $o, $i++));
		}
		{
			$GLOBALS['%s']->pop();
			return $accumulator;
		}
		$GLOBALS['%s']->pop();
	}
	static function random($it) {
		$GLOBALS['%s']->push("Iterators::random");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Arrays::random(Iterators::harray($it));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function any($it, $f) {
		$GLOBALS['%s']->push("Iterators::any");
		$__hx__spos = $GLOBALS['%s']->length;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($v);
			$v = $__hx__it->next();
			if(call_user_func_array($f, array($v))) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function all($it, $f) {
		$GLOBALS['%s']->push("Iterators::all");
		$__hx__spos = $GLOBALS['%s']->length;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($v);
			$v = $__hx__it->next();
			if(!call_user_func_array($f, array($v))) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static function last($it) {
		$GLOBALS['%s']->push("Iterators::last");
		$__hx__spos = $GLOBALS['%s']->length;
		$o = null;
		while($it->hasNext()) {
			$o = $it->next();
		}
		{
			$GLOBALS['%s']->pop();
			return $o;
		}
		$GLOBALS['%s']->pop();
	}
	static function lastf($it, $f) {
		$GLOBALS['%s']->push("Iterators::lastf");
		$__hx__spos = $GLOBALS['%s']->length;
		$rev = Iterators::harray($it);
		$rev->reverse();
		{
			$tmp = Arrays::lastf($rev, $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function first($it) {
		$GLOBALS['%s']->push("Iterators::first");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $it->next();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function firstf($it, $f) {
		$GLOBALS['%s']->push("Iterators::firstf");
		$__hx__spos = $GLOBALS['%s']->length;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($v);
			$v = $__hx__it->next();
			if(call_user_func_array($f, array($v))) {
				$GLOBALS['%s']->pop();
				return $v;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function order($it, $f = null) {
		$GLOBALS['%s']->push("Iterators::order");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr = Iterators::harray($it);
		$arr->sort(Iterators_2($arr, $f, $it));
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function isIterator($v) {
		$GLOBALS['%s']->push("Iterators::isIterator");
		$__hx__spos = $GLOBALS['%s']->length;
		$fields = null;
		if(Reflect::isObject($v) && null === Type::getClass($v)) {
			$fields = Reflect::fields($v);
		} else {
			$fields = Type::getInstanceFields(Type::getClass($v));
		}
		if(!Lambda::has($fields, "next") || !Lambda::has($fields, "hasNext")) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$tmp = Reflect::isFunction(Reflect::field($v, "next")) && Reflect::isFunction(Reflect::field($v, "hasNext"));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Iterators'; }
}
function Iterators_0(&$f, &$it, &$v, $v2) {
	{
		$GLOBALS['%s']->push("Iterators::indexOf@21");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = (is_object($_t = $v) && !($_t instanceof Enum) ? $_t === $v2 : $_t == $v2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Iterators_1(&$f, &$it, &$v, $v2) {
	{
		$GLOBALS['%s']->push("Iterators::contains@34");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = (is_object($_t = $v) && !($_t instanceof Enum) ? $_t === $v2 : $_t == $v2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Iterators_2(&$arr, &$f, &$it) {
	if(null === $f) {
		return (isset(Dynamics::$compare) ? Dynamics::$compare: array("Dynamics", "compare"));
	} else {
		return $f;
	}
}
