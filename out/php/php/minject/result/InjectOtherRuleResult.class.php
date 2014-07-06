<?php

class minject_result_InjectOtherRuleResult extends minject_result_InjectionResult {
	public function __construct($rule) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.result.InjectOtherRuleResult::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->rule = $rule;
		$GLOBALS['%s']->pop();
	}}
	public $rule;
	public function getResponse($injector) {
		$GLOBALS['%s']->push("minject.result.InjectOtherRuleResult::getResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->rule->getResponse($injector);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("minject.result.InjectOtherRuleResult::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->rule->toString();
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
