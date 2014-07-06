<?php

class minject_result_InjectionResult {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.result.InjectionResult::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function getResponse($injector) {
		$GLOBALS['%s']->push("minject.result.InjectionResult::getResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("minject.result.InjectionResult::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "";
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return $this->toString(); }
}
