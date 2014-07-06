<?php

class haxe_ds_ObjectMap implements IMap{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->h = array();
		$this->hk = array();
		$GLOBALS['%s']->pop();
	}}
	public $h;
	public $hk;
	public function set($key, $value) {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::set");
		$__hx__spos = $GLOBALS['%s']->length;
		$id = haxe_ds_ObjectMap::getId($key);
		$this->h[$id] = $value;
		$this->hk[$id] = $key;
		$GLOBALS['%s']->pop();
	}
	public function get($key) {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::get");
		$__hx__spos = $GLOBALS['%s']->length;
		$id = haxe_ds_ObjectMap::getId($key);
		if(array_key_exists($id, $this->h)) {
			$tmp = $this->h[$id];
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function exists($key) {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array_key_exists(haxe_ds_ObjectMap::getId($key), $this->h);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function keys() {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::keys");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new _hx_array_iterator(array_values($this->hk));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
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
	static function getId($key) {
		$GLOBALS['%s']->push("haxe.ds.ObjectMap::getId");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = spl_object_hash($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.ds.ObjectMap'; }
}
