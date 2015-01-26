<?php

class thx_core_Error {
	public function __construct($message, $stack = null, $pos = null) {
		if(!php_Boot::$skip_constructor) {
		$this->message = $message;
		if(null === $stack) {
			try {
				$stack = haxe_CallStack::exceptionStack();
			}catch(Exception $__hx__e) {
				$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
				$e = $_ex_;
				{
					$stack = (new _hx_array(array()));
				}
			}
			if($stack->length === 0) {
				try {
					$stack = haxe_CallStack::callStack();
				}catch(Exception $__hx__e) {
					$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
					$e1 = $_ex_;
					{
						$stack = (new _hx_array(array()));
					}
				}
			}
		}
		$this->stackItems = $stack;
		$this->pos = $pos;
	}}
	public $message;
	public $pos;
	public $stackItems;
	public function toString() {
		return _hx_string_or_null($this->message) . "\x0Afrom: " . _hx_string_or_null($this->pos->className) . "." . _hx_string_or_null($this->pos->methodName) . "() at " . _hx_string_rec($this->pos->lineNumber, "") . "\x0A\x0A" . _hx_string_or_null(haxe_CallStack::toString($this->stackItems));
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
	static function fromDynamic($err, $pos = null) {
		if(Std::is($err, _hx_qtype("thx.core.Error"))) {
			return $err;
		}
		return new thx_core_Error("" . Std::string($err), null, $pos);
	}
	function __toString() { return $this->toString(); }
}
