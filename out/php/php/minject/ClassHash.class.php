<?php

class minject_ClassHash {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.ClassHash::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->hash = new haxe_ds_StringMap();
		$GLOBALS['%s']->pop();
	}}
	public $hash;
	public function set($key, $value) {
		$GLOBALS['%s']->push("minject.ClassHash::set");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->hash->set(Type::getClassName($key), $value);
		$GLOBALS['%s']->pop();
	}
	public function get($key) {
		$GLOBALS['%s']->push("minject.ClassHash::get");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->hash->get(Type::getClassName($key));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function exists($key) {
		$GLOBALS['%s']->push("minject.ClassHash::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->hash->exists(Type::getClassName($key));
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
	function __toString() { return 'minject.ClassHash'; }
}
