<?php

class mcore_exception_Exception {
	public function __construct($message = null, $cause = null, $info = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("mcore.exception.Exception::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($message === null) {
			$message = "";
		}
		$this->name = Type::getClassName(Type::getClass($this));
		$this->message = $message;
		$this->cause = $cause;
		$this->info = $info;
		$GLOBALS['%s']->pop();
	}}
	public $name;
	public function get_name() {
		$GLOBALS['%s']->push("mcore.exception.Exception::get_name");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->name;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $message;
	public function get_message() {
		$GLOBALS['%s']->push("mcore.exception.Exception::get_message");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->message;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $cause;
	public $info;
	public function toString() {
		$GLOBALS['%s']->push("mcore.exception.Exception::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$str = _hx_string_or_null($this->get_name()) . ": " . _hx_string_or_null($this->get_message());
		if(_hx_field($this, "info") !== null) {
			$str .= " at " . _hx_string_or_null($this->info->className) . "#" . _hx_string_or_null($this->info->methodName) . " (" . _hx_string_rec($this->info->lineNumber, "") . ")";
		}
		if(_hx_field($this, "cause") !== null) {
			$str .= "\x0A\x09 Caused by: " . _hx_string_or_null(mcore_exception_Exception::getStackTrace($this->cause));
		}
		{
			$GLOBALS['%s']->pop();
			return $str;
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
	static function getStackTrace($source) {
		$GLOBALS['%s']->push("mcore.exception.Exception::getStackTrace");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = "";
		if($s !== "") {
			$GLOBALS['%s']->pop();
			return $s;
		}
		$stack = haxe_CallStack::exceptionStack();
		while($stack->length > 0) {
			{
				$_g = $stack->shift();
				if($_g !== null) {
					switch($_g->index) {
					case 2:{
						$line = $_g->params[2];
						$file = $_g->params[1];
						$s .= "\x09at " . _hx_string_or_null($file) . " (" . _hx_string_rec($line, "") . ")\x0A";
					}break;
					case 3:{
						$method = $_g->params[1];
						$classname = $_g->params[0];
						$s .= "\x09at " . _hx_string_or_null($classname) . "#" . _hx_string_or_null($method) . "\x0A";
					}break;
					default:{
					}break;
					}
				} else {
				}
				unset($_g);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $s;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_message" => "get_message","get_name" => "get_name");
	function __toString() { return $this->toString(); }
}
