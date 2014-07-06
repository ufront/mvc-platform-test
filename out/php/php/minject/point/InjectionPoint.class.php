<?php

class minject_point_InjectionPoint {
	public function __construct($meta, $injector) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.InjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->initializeInjection($meta);
		$GLOBALS['%s']->pop();
	}}
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.InjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $target;
		}
		$GLOBALS['%s']->pop();
	}
	public function initializeInjection($meta) {
		$GLOBALS['%s']->push("minject.point.InjectionPoint::initializeInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'minject.point.InjectionPoint'; }
}
