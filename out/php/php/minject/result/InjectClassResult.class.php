<?php

class minject_result_InjectClassResult extends minject_result_InjectionResult {
	public function __construct($responseType) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.result.InjectClassResult::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->responseType = $responseType;
		$GLOBALS['%s']->pop();
	}}
	public $responseType;
	public function getResponse($injector) {
		$GLOBALS['%s']->push("minject.result.InjectClassResult::getResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $injector->instantiate($this->responseType);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("minject.result.InjectClassResult::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "class " . _hx_string_or_null(Type::getClassName($this->responseType));
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
