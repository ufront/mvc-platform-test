<?php

class minject_point_NoParamsConstructorInjectionPoint extends minject_point_InjectionPoint {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.NoParamsConstructorInjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct(null,null);
		$GLOBALS['%s']->pop();
	}}
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.NoParamsConstructorInjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = mcore_util_Types::createInstance($target, (new _hx_array(array())));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'minject.point.NoParamsConstructorInjectionPoint'; }
}
