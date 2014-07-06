<?php

class tink_core_Error {
	public function __construct($message, $pos = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("tink.core.Error::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->message = $message;
		$this->pos = $pos;
		$GLOBALS['%s']->pop();
	}}
	public $message;
	public $data;
	public $pos;
	public function printPos() {
		$GLOBALS['%s']->push("tink.core.Error::printPos");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null($this->pos->className) . "." . _hx_string_or_null($this->pos->methodName) . ":" . _hx_string_rec($this->pos->lineNumber, "");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("tink.core.Error::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = "Error: " . _hx_string_or_null($this->message);
		if(_hx_field($this, "pos") !== null) {
			$ret .= " " . _hx_string_or_null($this->printPos());
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function throwSelf() {
		$GLOBALS['%s']->push("tink.core.Error::throwSelf");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException($this);
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
	static function withData($message, $data, $pos = null) {
		$GLOBALS['%s']->push("tink.core.Error::withData");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = new tink_core_Error($message, $pos);
		$ret->data = $data;
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return $this->toString(); }
}
