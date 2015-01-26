<?php

class minject_ClassMap implements IMap{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->map = new haxe_ds_StringMap();
	}}
	public $map;
	public function get($k) {
		$key = Type::getClassName($k);
		return $this->map->get($key);
	}
	public function set($k, $v) {
		$key = Type::getClassName($k);
		$this->map->set($key, $v);
	}
	public function exists($k) {
		$key = Type::getClassName($k);
		return $this->map->exists($key);
	}
	public function remove($k) {
		$key = Type::getClassName($k);
		return $this->map->remove($key);
	}
	public function keys() {
		return _hx_deref((minject_ClassMap_0($this)))->iterator();
	}
	public function iterator() {
		return $this->map->iterator();
	}
	public function toString() {
		return $this->map->toString();
	}
	public function getKey($k) {
		return Type::getClassName($k);
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return $this->toString(); }
}
function minject_ClassMap_0(&$__hx__this) {
	{
		$_g = (new _hx_array(array()));
		if(null == $__hx__this->map) throw new HException('null iterable');
		$__hx__it = $__hx__this->map->keys();
		while($__hx__it->hasNext()) {
			$k = $__hx__it->next();
			$_g->push(Type::resolveClass($k));
		}
		return $_g;
	}
}
