<?php

class minject_result_InjectValueResult extends minject_result_InjectionResult {
	public function __construct($value) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.result.InjectValueResult::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->value = $value;
		$GLOBALS['%s']->pop();
	}}
	public $value;
	public function getResponse($injector) {
		$GLOBALS['%s']->push("minject.result.InjectValueResult::getResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->value;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("minject.result.InjectValueResult::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "instance of " . _hx_string_or_null(Type::getClassName(Type::getClass($this->value)));
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
	function __toString() { return $this->toString(); }
}
