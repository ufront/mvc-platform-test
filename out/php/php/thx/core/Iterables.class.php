<?php

class thx_core_Iterables {
	public function __construct(){}
	static function all($it, $predicate) {
		return thx_core_Iterators::all($it->iterator(), $predicate);
	}
	static function any($it, $predicate) {
		return thx_core_Iterators::any($it->iterator(), $predicate);
	}
	static function eachPair($it, $handler) {
		thx_core_Iterators::eachPair($it->iterator(), $handler);
		return;
	}
	static function filter($it, $predicate) {
		return thx_core_Iterators::filter($it->iterator(), $predicate);
	}
	static function find($it, $predicate) {
		return thx_core_Iterators::find($it->iterator(), $predicate);
	}
	static function first($it) {
		return thx_core_Iterators::first($it->iterator());
	}
	static function last($it) {
		return thx_core_Iterators::last($it->iterator());
	}
	static function isEmpty($it) {
		$it1 = $it->iterator();
		return !$it1->hasNext();
	}
	static function isIterable($v) {
		$fields = null;
		if(Reflect::isObject($v) && null === Type::getClass($v)) {
			$fields = Reflect::fields($v);
		} else {
			$fields = Type::getInstanceFields(Type::getClass($v));
		}
		if(!Lambda::has($fields, "iterator")) {
			return false;
		}
		return Reflect::isFunction(Reflect::field($v, "iterator"));
	}
	static function map($it, $f) {
		return thx_core_Iterators::map($it->iterator(), $f);
	}
	static function mapi($it, $f) {
		return thx_core_Iterators::mapi($it->iterator(), $f);
	}
	static function order($it, $sort) {
		return thx_core_Iterators::order($it->iterator(), $sort);
	}
	static function reduce($it, $callback, $initial) {
		return thx_core_Iterators::reduce($it->iterator(), $callback, $initial);
	}
	static function reducei($it, $callback, $initial) {
		return thx_core_Iterators::reducei($it->iterator(), $callback, $initial);
	}
	static function toArray($it) {
		return thx_core_Iterators::toArray($it->iterator());
	}
	function __toString() { return 'thx.core.Iterables'; }
}
