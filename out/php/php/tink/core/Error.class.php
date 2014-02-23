<?php

class tink_core_Error {
	public function __construct($message, $pos = null) {
		if(!php_Boot::$skip_constructor) {
		$this->message = $message;
		$this->pos = $pos;
	}}
	public $message;
	public $data;
	public $pos;
	public function printPos() {
		return _hx_string_or_null($this->pos->className) . "." . _hx_string_or_null($this->pos->methodName) . ":" . _hx_string_rec($this->pos->lineNumber, "");
	}
	public function toString() {
		$ret = "Error: " . _hx_string_or_null($this->message);
		if(_hx_field($this, "pos") !== null) {
			$ret .= " " . _hx_string_or_null($this->printPos());
		}
		return $ret;
	}
	public function throwSelf() {
		throw new HException($this);
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
	static function withData($message, $data, $pos = null) {
		$ret = new tink_core_Error($message, $pos);
		$ret->data = $data;
		return $ret;
	}
	function __toString() { return $this->toString(); }
}
