<?php

class minject_InjecteeSet {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->map = new haxe_ds_WeakMap();
	}}
	public $map;
	public function add($value) {
		$this->map->set($value, true);
	}
	public function contains($value) {
		return $this->map->exists($value);
	}
	public function remove($value) {
		$this->map->remove($value);
	}
	public function delete($value) {
		$this->remove($value);
	}
	public function iterator() {
		return $this->map->iterator();
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
	function __toString() { return 'minject.InjecteeSet'; }
}
