<?php

class minject__Injector_InjecteeSet {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject._Injector.InjecteeSet::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->store = new mdata_Dictionary(true);
		$GLOBALS['%s']->pop();
	}}
	public $store;
	public function add($value) {
		$GLOBALS['%s']->push("minject._Injector.InjecteeSet::add");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->store->set($value, true);
		$GLOBALS['%s']->pop();
	}
	public function contains($value) {
		$GLOBALS['%s']->push("minject._Injector.InjecteeSet::contains");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->store->exists($value);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function delete($value) {
		$GLOBALS['%s']->push("minject._Injector.InjecteeSet::delete");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->store->delete($value);
		$GLOBALS['%s']->pop();
	}
	public function iterator() {
		$GLOBALS['%s']->push("minject._Injector.InjecteeSet::iterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->store->iterator();
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
	function __toString() { return 'minject._Injector.InjecteeSet'; }
}
