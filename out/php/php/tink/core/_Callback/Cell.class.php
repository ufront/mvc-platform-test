<?php

class tink_core__Callback_Cell {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("tink.core._Callback.Cell::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $cb;
	public function free() {
		$GLOBALS['%s']->push("tink.core._Callback.Cell::free");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->cb = null;
		tink_core__Callback_Cell::$pool->push($this);
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
	static $pool;
	static function get() {
		$GLOBALS['%s']->push("tink.core._Callback.Cell::get");
		$__hx__spos = $GLOBALS['%s']->length;
		if(tink_core__Callback_Cell::$pool->length > 0) {
			$tmp = tink_core__Callback_Cell::$pool->pop();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = new tink_core__Callback_Cell();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Callback.Cell'; }
}
tink_core__Callback_Cell::$pool = (new _hx_array(array()));
