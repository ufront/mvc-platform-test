<?php

class mcore_util_Types {
	public function __construct(){}
	static function isSubClassOf($object, $type) {
		$GLOBALS['%s']->push("mcore.util.Types::isSubClassOf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Std::is($object, $type) && !_hx_equal(Type::getClass($object), $type);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function createInstance($forClass, $args = null) {
		$GLOBALS['%s']->push("mcore.util.Types::createInstance");
		$__hx__spos = $GLOBALS['%s']->length;
		if($args === null) {
			$args = (new _hx_array(array()));
		}
		try {
			{
				$tmp = Type::createInstance($forClass, $args);
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
				throw new HException(new mcore_exception_Exception("Error creating instance of " . _hx_string_or_null(Type::getClassName($forClass)) . "(" . _hx_string_or_null($args->toString()) . ")", $e, _hx_anonymous(array("fileName" => "Types.hx", "lineNumber" => 65, "className" => "mcore.util.Types", "methodName" => "createInstance"))));
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'mcore.util.Types'; }
}
