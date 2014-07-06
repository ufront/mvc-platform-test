<?php

class Iterables {
	public function __construct(){}
	static function count($it) {
		$GLOBALS['%s']->push("Iterables::count");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::count($it->iterator());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function indexOf($it, $v = null, $f = null) {
		$GLOBALS['%s']->push("Iterables::indexOf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::indexOf($it->iterator(), $v, $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function contains($it, $v = null, $f = null) {
		$GLOBALS['%s']->push("Iterables::contains");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::contains($it->iterator(), $v, $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function harray($it) {
		$GLOBALS['%s']->push("Iterables::array");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::harray($it->iterator());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function join($it, $glue = null) {
		$GLOBALS['%s']->push("Iterables::join");
		$__hx__spos = $GLOBALS['%s']->length;
		if($glue === null) {
			$glue = ", ";
		}
		$it1 = $it->iterator();
		{
			$tmp = Iterators::harray($it1)->join($glue);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($it, $f) {
		$GLOBALS['%s']->push("Iterables::map");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::map($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function each($it, $f) {
		$GLOBALS['%s']->push("Iterables::each");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::each($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			$tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	static function filter($it, $f) {
		$GLOBALS['%s']->push("Iterables::filter");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::filter($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function reduce($it, $f, $initialValue) {
		$GLOBALS['%s']->push("Iterables::reduce");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::reduce($it->iterator(), $f, $initialValue);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function random($it) {
		$GLOBALS['%s']->push("Iterables::random");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Arrays::random(Iterators::harray($it->iterator()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function any($it, $f) {
		$GLOBALS['%s']->push("Iterables::any");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::any($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function all($it, $f) {
		$GLOBALS['%s']->push("Iterables::all");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::all($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function last($it) {
		$GLOBALS['%s']->push("Iterables::last");
		$__hx__spos = $GLOBALS['%s']->length;
		$it1 = $it->iterator();
		$o = null;
		while($it1->hasNext()) {
			$o = $it1->next();
		}
		{
			$GLOBALS['%s']->pop();
			return $o;
		}
		$GLOBALS['%s']->pop();
	}
	static function lastf($it, $f) {
		$GLOBALS['%s']->push("Iterables::lastf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::lastf($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function first($it) {
		$GLOBALS['%s']->push("Iterables::first");
		$__hx__spos = $GLOBALS['%s']->length;
		$it1 = $it->iterator();
		{
			$tmp = $it1->next();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function firstf($it, $f) {
		$GLOBALS['%s']->push("Iterables::firstf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::firstf($it->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function order($it, $f = null) {
		$GLOBALS['%s']->push("Iterables::order");
		$__hx__spos = $GLOBALS['%s']->length;
		$it1 = $it->iterator();
		{
			$arr = Iterators::harray($it1);
			$arr->sort(Iterables_0($arr, $f, $it, $it1));
			{
				$GLOBALS['%s']->pop();
				return $arr;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function isIterable($v) {
		$GLOBALS['%s']->push("Iterables::isIterable");
		$__hx__spos = $GLOBALS['%s']->length;
		$fields = null;
		if(Reflect::isObject($v) && null === Type::getClass($v)) {
			$fields = Reflect::fields($v);
		} else {
			$fields = Type::getInstanceFields(Type::getClass($v));
		}
		if(!Lambda::has($fields, "iterator")) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$tmp = Reflect::isFunction(Reflect::field($v, "iterator"));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Iterables'; }
}
function Iterables_0(&$arr, &$f, &$it, &$it1) {
	if(null === $f) {
		return (isset(Dynamics::$compare) ? Dynamics::$compare: array("Dynamics", "compare"));
	} else {
		return $f;
	}
}
