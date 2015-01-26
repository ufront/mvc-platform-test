<?php

class thx_core_Types {
	public function __construct(){}
	static function isAnonymousObject($v) {
		return Reflect::isObject($v) && null === Type::getClass($v);
	}
	static function isPrimitive($v) {
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 1:case 2:case 3:{
				return true;
			}break;
			case 0:case 5:case 7:case 4:case 8:{
				return false;
			}break;
			case 6:{
				$c = $_g->params[0];
				return Type::getClassName($c) === "String";
			}break;
			}
		}
	}
	static function hasSuperClass($cls, $sup) {
		while(null !== $cls) {
			if($cls === $sup) {
				return true;
			}
			$cls = Type::getSuperClass($cls);
		}
		return false;
	}
	static function sameType($a, $b) {
		return thx_core_Types::typeToString(Type::typeof($a)) === thx_core_Types::typeToString(Type::typeof($b));
	}
	static function typeInheritance($type) {
		switch($type->index) {
		case 1:{
			return (new _hx_array(array("Int")));
		}break;
		case 2:{
			return (new _hx_array(array("Float")));
		}break;
		case 3:{
			return (new _hx_array(array("Bool")));
		}break;
		case 4:{
			return (new _hx_array(array("{}")));
		}break;
		case 5:{
			return (new _hx_array(array("Function")));
		}break;
		case 6:{
			$c = $type->params[0];
			{
				$classes = (new _hx_array(array()));
				while(null !== $c) {
					$classes->push($c);
					$c = Type::getSuperClass($c);
				}
				return $classes->map((isset(Type::$getClassName) ? Type::$getClassName: array("Type", "getClassName")));
			}
		}break;
		case 7:{
			$e = $type->params[0];
			return (new _hx_array(array(Type::getEnumName($e))));
		}break;
		default:{
			throw new HException("invalid type " . Std::string($type));
		}break;
		}
	}
	static function typeToString($type) {
		switch($type->index) {
		case 0:{
			return "Null";
		}break;
		case 1:{
			return "Int";
		}break;
		case 2:{
			return "Float";
		}break;
		case 3:{
			return "Bool";
		}break;
		case 4:{
			return "{}";
		}break;
		case 5:{
			return "Function";
		}break;
		case 6:{
			$c = $type->params[0];
			return Type::getClassName($c);
		}break;
		case 7:{
			$e = $type->params[0];
			return Type::getEnumName($e);
		}break;
		default:{
			throw new HException("invalid type " . Std::string($type));
		}break;
		}
	}
	static function valueTypeInheritance($value) {
		return thx_core_Types::typeInheritance(Type::typeof($value));
	}
	static function valueTypeToString($value) {
		return thx_core_Types::typeToString(Type::typeof($value));
	}
	function __toString() { return 'thx.core.Types'; }
}
