<?php

class minject_point_PropertyInjectionPoint extends minject_point_InjectionPoint {
	public function __construct($meta, $injector = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.PropertyInjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct($meta,null);
		$GLOBALS['%s']->pop();
	}}
	public $propertyName;
	public $propertyType;
	public $injectionName;
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.PropertyInjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$injectionConfig = $injector->getMapping(Type::resolveClass($this->propertyType), $this->injectionName);
		$injection = $injectionConfig->getResponse($injector);
		if($injection === null) {
			throw new HException("Injector is missing a rule to handle injection into property \"" . _hx_string_or_null($this->propertyName) . "\" of object \"" . Std::string($target) . "\". Target dependency: \"" . _hx_string_or_null($this->propertyType) . "\", named \"" . _hx_string_or_null($this->injectionName) . "\"");
		}
		Reflect::setProperty($target, $this->propertyName, $injection);
		{
			$GLOBALS['%s']->pop();
			return $target;
		}
		$GLOBALS['%s']->pop();
	}
	public function initializeInjection($meta) {
		$GLOBALS['%s']->push("minject.point.PropertyInjectionPoint::initializeInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->propertyType = $meta->type[0];
		$this->propertyName = $meta->name[0];
		if(_hx_field($meta, "inject") === null) {
			$this->injectionName = "";
		} else {
			$this->injectionName = $meta->inject[0];
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
	function __toString() { return 'minject.point.PropertyInjectionPoint'; }
}
