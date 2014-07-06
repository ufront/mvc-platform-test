<?php

class minject_Injector {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.Injector::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injectionConfigs = new haxe_ds_StringMap();
		$this->injecteeDescriptions = new minject_ClassHash();
		$this->attendedToInjectees = new minject__Injector_InjecteeSet();
		$GLOBALS['%s']->pop();
	}}
	public $attendedToInjectees;
	public $parentInjector;
	public $injectionConfigs;
	public $injecteeDescriptions;
	public function mapValue($whenAskedFor, $useValue, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::mapValue");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$config = $this->getMapping($whenAskedFor, $named);
		$config->setResult(new minject_result_InjectValueResult($useValue));
		{
			$GLOBALS['%s']->pop();
			return $config;
		}
		$GLOBALS['%s']->pop();
	}
	public function mapClass($whenAskedFor, $instantiateClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::mapClass");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$config = $this->getMapping($whenAskedFor, $named);
		$config->setResult(new minject_result_InjectClassResult($instantiateClass));
		{
			$GLOBALS['%s']->pop();
			return $config;
		}
		$GLOBALS['%s']->pop();
	}
	public function mapSingleton($whenAskedFor, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::mapSingleton");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		{
			$tmp = $this->mapSingletonOf($whenAskedFor, $whenAskedFor, $named);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function mapSingletonOf($whenAskedFor, $useSingletonOf, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::mapSingletonOf");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$config = $this->getMapping($whenAskedFor, $named);
		$config->setResult(new minject_result_InjectSingletonResult($useSingletonOf));
		{
			$GLOBALS['%s']->pop();
			return $config;
		}
		$GLOBALS['%s']->pop();
	}
	public function mapRule($whenAskedFor, $useRule, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::mapRule");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$config = $this->getMapping($whenAskedFor, $named);
		$config->setResult(new minject_result_InjectOtherRuleResult($useRule));
		{
			$GLOBALS['%s']->pop();
			return $useRule;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMapping($forClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::getMapping");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$requestName = _hx_string_or_null($this->getClassName($forClass)) . "#" . _hx_string_or_null($named);
		if($this->injectionConfigs->exists($requestName)) {
			$tmp = $this->injectionConfigs->get($requestName);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$config = new minject_InjectionConfig($forClass, $named);
		$this->injectionConfigs->set($requestName, $config);
		{
			$GLOBALS['%s']->pop();
			return $config;
		}
		$GLOBALS['%s']->pop();
	}
	public function injectInto($target) {
		$GLOBALS['%s']->push("minject.Injector::injectInto");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->attendedToInjectees->contains($target)) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->attendedToInjectees->add($target);
		$targetClass = Type::getClass($target);
		$injecteeDescription = null;
		if($this->injecteeDescriptions->exists($targetClass)) {
			$injecteeDescription = $this->injecteeDescriptions->get($targetClass);
		} else {
			$injecteeDescription = $this->getInjectionPoints($targetClass);
		}
		if($injecteeDescription === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$injectionPoints = $injecteeDescription->injectionPoints;
		$length = $injectionPoints->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$injectionPoint = $injectionPoints[$i];
				$injectionPoint->applyInjection($target, $this);
				unset($injectionPoint,$i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function construct($theClass) {
		$GLOBALS['%s']->push("minject.Injector::construct");
		$__hx__spos = $GLOBALS['%s']->length;
		$injecteeDescription = null;
		if($this->injecteeDescriptions->exists($theClass)) {
			$injecteeDescription = $this->injecteeDescriptions->get($theClass);
		} else {
			$injecteeDescription = $this->getInjectionPoints($theClass);
		}
		$injectionPoint = $injecteeDescription->ctor;
		{
			$tmp = $injectionPoint->applyInjection($theClass, $this);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function instantiate($theClass) {
		$GLOBALS['%s']->push("minject.Injector::instantiate");
		$__hx__spos = $GLOBALS['%s']->length;
		$instance = $this->construct($theClass);
		$this->injectInto($instance);
		{
			$GLOBALS['%s']->pop();
			return $instance;
		}
		$GLOBALS['%s']->pop();
	}
	public function unmap($theClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::unmap");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$mapping = $this->getConfigurationForRequest($theClass, $named, null);
		if($mapping === null) {
			throw new HException("Error while removing an injector mapping: No mapping defined for class " . _hx_string_or_null($this->getClassName($theClass)) . ", named \"" . _hx_string_or_null($named) . "\"");
		}
		$mapping->setResult(null);
		$GLOBALS['%s']->pop();
	}
	public function hasMapping($forClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::hasMapping");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$mapping = $this->getConfigurationForRequest($forClass, $named, null);
		if($mapping === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$tmp = $mapping->hasResponse($this);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInstance($ofClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::getInstance");
		$__hx__spos = $GLOBALS['%s']->length;
		if($named === null) {
			$named = "";
		}
		$mapping = $this->getConfigurationForRequest($ofClass, $named, null);
		if($mapping === null || !$mapping->hasResponse($this)) {
			throw new HException("Error while getting mapping response: No mapping defined for class " . _hx_string_or_null($this->getClassName($ofClass)) . ", named \"" . _hx_string_or_null($named) . "\"");
		}
		{
			$tmp = $mapping->getResponse($this);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function createChildInjector() {
		$GLOBALS['%s']->push("minject.Injector::createChildInjector");
		$__hx__spos = $GLOBALS['%s']->length;
		$injector = new minject_Injector();
		$injector->set_parentInjector($this);
		{
			$GLOBALS['%s']->pop();
			return $injector;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAncestorMapping($forClass, $named = null) {
		$GLOBALS['%s']->push("minject.Injector::getAncestorMapping");
		$__hx__spos = $GLOBALS['%s']->length;
		$parent = $this->parentInjector;
		while($parent !== null) {
			$parentConfig = $parent->getConfigurationForRequest($forClass, $named, false);
			if($parentConfig !== null && $parentConfig->hasOwnResponse()) {
				$GLOBALS['%s']->pop();
				return $parentConfig;
			}
			$parent = $parent->parentInjector;
			unset($parentConfig);
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInjectionPoints($forClass) {
		$GLOBALS['%s']->push("minject.Injector::getInjectionPoints");
		$__hx__spos = $GLOBALS['%s']->length;
		$typeMeta = haxe_rtti_Meta::getType($forClass);
		if($typeMeta !== null && _hx_has_field($typeMeta, "interface")) {
			throw new HException("Interfaces can't be used as instantiatable classes.");
		}
		$fieldsMeta = $this->getFields($forClass);
		$ctorInjectionPoint = null;
		$injectionPoints = (new _hx_array(array()));
		$postConstructMethodPoints = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($fieldsMeta);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$fieldMeta = Reflect::field($fieldsMeta, $field);
				$inject = _hx_has_field($fieldMeta, "inject");
				$post = _hx_has_field($fieldMeta, "post");
				$type = Reflect::field($fieldMeta, "type");
				$args = Reflect::field($fieldMeta, "args");
				if($field === "_") {
					if(_hx_len($args) > 0) {
						$ctorInjectionPoint = new minject_point_ConstructorInjectionPoint($fieldMeta, $forClass, $this);
					}
				} else {
					if(_hx_has_field($fieldMeta, "args")) {
						if($inject) {
							$injectionPoint = new minject_point_MethodInjectionPoint($fieldMeta, $this);
							$injectionPoints->push($injectionPoint);
							unset($injectionPoint);
						} else {
							if($post) {
								$injectionPoint1 = new minject_point_PostConstructInjectionPoint($fieldMeta, $this);
								$postConstructMethodPoints->push($injectionPoint1);
								unset($injectionPoint1);
							}
						}
					} else {
						if($type !== null) {
							$injectionPoint2 = new minject_point_PropertyInjectionPoint($fieldMeta, $this);
							$injectionPoints->push($injectionPoint2);
							unset($injectionPoint2);
						}
					}
				}
				unset($type,$post,$inject,$fieldMeta,$field,$args);
			}
		}
		if($postConstructMethodPoints->length > 0) {
			$postConstructMethodPoints->sort(array(new _hx_lambda(array(&$ctorInjectionPoint, &$fieldsMeta, &$forClass, &$injectionPoints, &$postConstructMethodPoints, &$typeMeta), "minject_Injector_0"), 'execute'));
			{
				$_g2 = 0;
				while($_g2 < $postConstructMethodPoints->length) {
					$point = $postConstructMethodPoints[$_g2];
					++$_g2;
					$injectionPoints->push($point);
					unset($point);
				}
			}
		}
		if($ctorInjectionPoint === null) {
			$ctorInjectionPoint = new minject_point_NoParamsConstructorInjectionPoint();
		}
		$injecteeDescription = new minject_InjecteeDescription($ctorInjectionPoint, $injectionPoints);
		$this->injecteeDescriptions->set($forClass, $injecteeDescription);
		{
			$GLOBALS['%s']->pop();
			return $injecteeDescription;
		}
		$GLOBALS['%s']->pop();
	}
	public function getConfigurationForRequest($forClass, $named, $traverseAncestors = null) {
		$GLOBALS['%s']->push("minject.Injector::getConfigurationForRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		if($traverseAncestors === null) {
			$traverseAncestors = true;
		}
		$requestName = _hx_string_or_null($this->getClassName($forClass)) . "#" . _hx_string_or_null($named);
		if(!$this->injectionConfigs->exists($requestName)) {
			if($traverseAncestors && $this->parentInjector !== null && $this->parentInjector->hasMapping($forClass, $named)) {
				$tmp = $this->getAncestorMapping($forClass, $named);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		{
			$tmp = $this->injectionConfigs->get($requestName);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_parentInjector($value) {
		$GLOBALS['%s']->push("minject.Injector::set_parentInjector");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->parentInjector !== null && $value === null) {
			$this->attendedToInjectees = new minject__Injector_InjecteeSet();
		}
		$this->parentInjector = $value;
		if($this->parentInjector !== null) {
			$this->attendedToInjectees = $this->parentInjector->attendedToInjectees;
		}
		{
			$tmp = $this->parentInjector;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getClassName($forClass) {
		$GLOBALS['%s']->push("minject.Injector::getClassName");
		$__hx__spos = $GLOBALS['%s']->length;
		if($forClass === null) {
			$GLOBALS['%s']->pop();
			return "Dynamic";
		} else {
			$tmp = Type::getClassName($forClass);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFields($type) {
		$GLOBALS['%s']->push("minject.Injector::getFields");
		$__hx__spos = $GLOBALS['%s']->length;
		$meta = _hx_anonymous(array());
		while($type !== null) {
			$typeMeta = haxe_rtti_Meta::getFields($type);
			{
				$_g = 0;
				$_g1 = Reflect::fields($typeMeta);
				while($_g < $_g1->length) {
					$field = $_g1[$_g];
					++$_g;
					{
						$value = Reflect::field($typeMeta, $field);
						$meta->{$field} = $value;
						unset($value);
					}
					unset($field);
				}
				unset($_g1,$_g);
			}
			$type = Type::getSuperClass($type);
			unset($typeMeta);
		}
		{
			$GLOBALS['%s']->pop();
			return $meta;
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
	static $__properties__ = array("set_parentInjector" => "set_parentInjector");
	function __toString() { return 'minject.Injector'; }
}
function minject_Injector_0(&$ctorInjectionPoint, &$fieldsMeta, &$forClass, &$injectionPoints, &$postConstructMethodPoints, &$typeMeta, $a, $b) {
	{
		$GLOBALS['%s']->push("minject.Injector::getInjectionPoints@407");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $a->order - $b->order;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
