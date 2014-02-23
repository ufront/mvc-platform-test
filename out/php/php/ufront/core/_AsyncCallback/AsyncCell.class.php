<?php

class ufront_core__AsyncCallback_AsyncCell {
	public function __construct() {
		;
	}
	public $cb;
	public function free() {
		$this->cb = null;
		ufront_core__AsyncCallback_AsyncCell::$pool->push($this);
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
		if(ufront_core__AsyncCallback_AsyncCell::$pool->length > 0) {
			return ufront_core__AsyncCallback_AsyncCell::$pool->pop();
		} else {
			return new ufront_core__AsyncCallback_AsyncCell();
		}
	}
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCell'; }
}
ufront_core__AsyncCallback_AsyncCell::$pool = (new _hx_array(array()));
