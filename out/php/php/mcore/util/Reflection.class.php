<?php

class mcore_util_Reflection {
	public function __construct(){}
	static function setProperty($object, $property, $value) {
		$GLOBALS['%s']->push("mcore.util.Reflection::setProperty");
		$__hx__spos = $GLOBALS['%s']->length;
		Reflect::setProperty($object, $property, $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	static function hasProperty($object, $property) {
		$GLOBALS['%s']->push("mcore.util.Reflection::hasProperty");
		$__hx__spos = $GLOBALS['%s']->length;
		$properties = Type::getInstanceFields(Type::getClass($object));
		{
			$tmp = Lambda::has($properties, $property);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFields($object) {
		$GLOBALS['%s']->push("mcore.util.Reflection::getFields");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($object);
			switch($_g->index) {
			case 6:{
				$c = $_g->params[0];
				{
					$tmp = Type::getInstanceFields($c);
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			default:{
				$tmp = Reflect::fields($object);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function here($info = null) {
		$GLOBALS['%s']->push("mcore.util.Reflection::here");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $info;
		}
		$GLOBALS['%s']->pop();
	}
	static function callMethod($o, $func, $args = null) {
		$GLOBALS['%s']->push("mcore.util.Reflection::callMethod");
		$__hx__spos = $GLOBALS['%s']->length;
		if($args === null) {
			$args = (new _hx_array(array()));
		}
		try {
			{
				$tmp = Reflect::callMethod($o, $func, $args);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException(new mcore_exception_Exception("Error calling method " . _hx_string_or_null(Type::getClassName(Type::getClass($o))) . "." . Std::string($func) . "(" . _hx_string_or_null($args->toString()) . ")", $e, _hx_anonymous(array("fileName" => "Reflection.hx", "lineNumber" => 111, "className" => "mcore.util.Reflection", "methodName" => "callMethod"))));
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'mcore.util.Reflection'; }
}
