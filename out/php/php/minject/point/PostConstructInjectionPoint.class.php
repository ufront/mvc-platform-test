<?php

class minject_point_PostConstructInjectionPoint extends minject_point_InjectionPoint {
	public function __construct($meta, $injector = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.PostConstructInjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->order = 0;
		parent::__construct($meta,$injector);
		$GLOBALS['%s']->pop();
	}}
	public $order;
	public $methodName;
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.PostConstructInjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		mcore_util_Reflection::callMethod($target, Reflect::field($target, $this->methodName), (new _hx_array(array())));
		{
			$GLOBALS['%s']->pop();
			return $target;
		}
		$GLOBALS['%s']->pop();
	}
	public function initializeInjection($meta) {
		$GLOBALS['%s']->push("minject.point.PostConstructInjectionPoint::initializeInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->methodName = $meta->name[0];
		if(_hx_field($meta, "post") !== null) {
			$this->order = $meta->post[0];
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
	function __toString() { return 'minject.point.PostConstructInjectionPoint'; }
}
