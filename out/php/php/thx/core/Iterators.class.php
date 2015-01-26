<?php

class thx_core_Iterators {
	public function __construct(){}
	static function all($it, $predicate) {
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$item = $__hx__it->next();
			if(!call_user_func_array($predicate, array($item))) {
				return false;
			}
		}
		return true;
	}
	static function any($it, $predicate) {
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$item = $__hx__it->next();
			if(call_user_func_array($predicate, array($item))) {
				return true;
			}
		}
		return false;
	}
	static function eachPair($it, $handler) {
		thx_core_Arrays::eachPair(thx_core_Iterators::toArray($it), $handler);
	}
	static function filter($it, $predicate) {
		return thx_core_Iterators::reduce($it, array(new _hx_lambda(array(&$it, &$predicate), "thx_core_Iterators_0"), 'execute'), (new _hx_array(array())));
	}
	static function find($it, $f) {
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$item = $__hx__it->next();
			if(call_user_func_array($f, array($item))) {
				return $item;
			}
		}
		return null;
	}
	static function first($it) {
		if($it->hasNext()) {
			return $it->next();
		} else {
			return null;
		}
	}
	static function isEmpty($it) {
		return !$it->hasNext();
	}
	static function isIterator($v) {
		$fields = null;
		if(Reflect::isObject($v) && null === Type::getClass($v)) {
			$fields = Reflect::fields($v);
		} else {
			$fields = Type::getInstanceFields(Type::getClass($v));
		}
		if(!Lambda::has($fields, "next") || !Lambda::has($fields, "hasNext")) {
			return false;
		}
		return Reflect::isFunction(Reflect::field($v, "next")) && Reflect::isFunction(Reflect::field($v, "hasNext"));
	}
	static function last($it) {
		$buf = null;
		while($it->hasNext()) {
			$buf = $it->next();
		}
		return $buf;
	}
	static function map($it, $f) {
		$acc = (new _hx_array(array()));
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$v = $__hx__it->next();
			$acc->push(call_user_func_array($f, array($v)));
		}
		return $acc;
	}
	static function mapi($it, $f) {
		$acc = (new _hx_array(array()));
		$i = 0;
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$v = $__hx__it->next();
			$acc->push(call_user_func_array($f, array($v, $i++)));
		}
		return $acc;
	}
	static function order($it, $sort) {
		$n = thx_core_Iterators::toArray($it);
		$n->sort($sort);
		return $n;
	}
	static function reduce($it, $callback, $initial) {
		thx_core_Iterators::map($it, array(new _hx_lambda(array(&$callback, &$initial, &$it), "thx_core_Iterators_1"), 'execute'));
		return $initial;
	}
	static function reducei($it, $callback, $initial) {
		thx_core_Iterators::mapi($it, array(new _hx_lambda(array(&$callback, &$initial, &$it), "thx_core_Iterators_2"), 'execute'));
		return $initial;
	}
	static function toArray($it) {
		$items = (new _hx_array(array()));
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			$item = $__hx__it->next();
			$items->push($item);
		}
		return $items;
	}
	function __toString() { return 'thx.core.Iterators'; }
}
function thx_core_Iterators_0(&$it, &$predicate, $acc, $item) {
	{
		if(call_user_func_array($predicate, array($item))) {
			$acc->push($item);
		}
		return $acc;
	}
}
function thx_core_Iterators_1(&$callback, &$initial, &$it, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
function thx_core_Iterators_2(&$callback, &$initial, &$it, $v, $i) {
	{
		$initial = call_user_func_array($callback, array($initial, $v, $i));
	}
}
