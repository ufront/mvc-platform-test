<?php

class ufront_core__AsyncCallback_AsyncCell {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCell::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $cb;
	public function free() {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCell::free");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->cb = null;
		ufront_core__AsyncCallback_AsyncCell::$pool->push($this);
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
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCell::get");
		$__hx__spos = $GLOBALS['%s']->length;
		if(ufront_core__AsyncCallback_AsyncCell::$pool->length > 0) {
			$tmp = ufront_core__AsyncCallback_AsyncCell::$pool->pop();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = new ufront_core__AsyncCallback_AsyncCell();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCell'; }
}
ufront_core__AsyncCallback_AsyncCell::$pool = (new _hx_array(array()));
