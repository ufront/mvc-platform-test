<?php

class minject_point_ConstructorInjectionPoint extends minject_point_MethodInjectionPoint {
	public function __construct($meta, $forClass, $injector = null) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.ConstructorInjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct($meta,$injector);
		$GLOBALS['%s']->pop();
	}}
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.ConstructorInjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$ofClass = $target;
		$withArgs = $this->gatherParameterValues($target, $injector);
		{
			$tmp = mcore_util_Types::createInstance($ofClass, $withArgs);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function initializeInjection($meta) {
		$GLOBALS['%s']->push("minject.point.ConstructorInjectionPoint::initializeInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->methodName = "new";
		$this->gatherParameters($meta);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'minject.point.ConstructorInjectionPoint'; }
}
