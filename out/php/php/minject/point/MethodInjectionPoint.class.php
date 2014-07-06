<?php

class minject_point_MethodInjectionPoint extends minject_point_InjectionPoint {
	public function __construct($meta, $injector = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.point.MethodInjectionPoint::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->requiredParameters = 0;
		parent::__construct($meta,$injector);
		$GLOBALS['%s']->pop();
	}}
	public $methodName;
	public $_parameterInjectionConfigs;
	public $requiredParameters;
	public function applyInjection($target, $injector) {
		$GLOBALS['%s']->push("minject.point.MethodInjectionPoint::applyInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$parameters = $this->gatherParameterValues($target, $injector);
		$method = Reflect::field($target, $this->methodName);
		mcore_util_Reflection::callMethod($target, $method, $parameters);
		{
			$GLOBALS['%s']->pop();
			return $target;
		}
		$GLOBALS['%s']->pop();
	}
	public function initializeInjection($meta) {
		$GLOBALS['%s']->push("minject.point.MethodInjectionPoint::initializeInjection");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->methodName = $meta->name[0];
		$this->gatherParameters($meta);
		$GLOBALS['%s']->pop();
	}
	public function gatherParameters($meta) {
		$GLOBALS['%s']->push("minject.point.MethodInjectionPoint::gatherParameters");
		$__hx__spos = $GLOBALS['%s']->length;
		$nameArgs = $meta->inject;
		$args = $meta->args;
		if($nameArgs === null) {
			$nameArgs = (new _hx_array(array()));
		}
		$this->_parameterInjectionConfigs = (new _hx_array(array()));
		$i = 0;
		{
			$_g = 0;
			while($_g < $args->length) {
				$arg = $args[$_g];
				++$_g;
				$injectionName = "";
				if($i < $nameArgs->length) {
					$injectionName = $nameArgs[$i];
				}
				$parameterTypeName = $arg->type;
				if($arg->opt) {
					if($parameterTypeName === "Dynamic") {
						throw new HException("Error in method definition of injectee. Required parameters can't have non class type.");
					}
				} else {
					$this->requiredParameters++;
				}
				$this->_parameterInjectionConfigs->push(new minject_point_ParameterInjectionConfig($parameterTypeName, $injectionName));
				$i++;
				unset($parameterTypeName,$injectionName,$arg);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function gatherParameterValues($target, $injector) {
		$GLOBALS['%s']->push("minject.point.MethodInjectionPoint::gatherParameterValues");
		$__hx__spos = $GLOBALS['%s']->length;
		$parameters = (new _hx_array(array()));
		$length = $this->_parameterInjectionConfigs->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$parameterConfig = $this->_parameterInjectionConfigs[$i];
				$config = $injector->getMapping(Type::resolveClass($parameterConfig->typeName), $parameterConfig->injectionName);
				$injection = $config->getResponse($injector);
				if($injection === null) {
					if($i >= $this->requiredParameters) {
						break;
					}
					throw new HException("Injector is missing a rule to handle injection into target " . _hx_string_or_null(Type::getClassName(Type::getClass($target))) . ". Target dependency: " . _hx_string_or_null(Type::getClassName($config->request)) . ", method: " . _hx_string_or_null($this->methodName) . ", parameter: " . _hx_string_rec(($i + 1), "") . ", named: " . _hx_string_or_null($parameterConfig->injectionName));
				}
				$parameters[$i] = $injection;
				unset($parameterConfig,$injection,$i,$config);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $parameters;
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
	function __toString() { return 'minject.point.MethodInjectionPoint'; }
}
