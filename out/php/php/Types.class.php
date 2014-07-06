<?php

class Types {
	public function __construct(){}
	static function className($o) {
		$GLOBALS['%s']->push("Types::className");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_explode(".", Type::getClassName(Type::getClass($o)))->pop();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fullName($o) {
		$GLOBALS['%s']->push("Types::fullName");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Type::getClassName(Type::getClass($o));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function typeName($o) {
		$GLOBALS['%s']->push("Types::typeName");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($o);
			switch($_g->index) {
			case 0:{
				$GLOBALS['%s']->pop();
				return "null";
			}break;
			case 1:{
				$GLOBALS['%s']->pop();
				return "Int";
			}break;
			case 2:{
				$GLOBALS['%s']->pop();
				return "Float";
			}break;
			case 3:{
				$GLOBALS['%s']->pop();
				return "Bool";
			}break;
			case 5:{
				$GLOBALS['%s']->pop();
				return "function";
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$tmp = Type::getClassName($c);
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 7:{
				$e = $_g->params[0];
				{
					$tmp = Type::getEnumName($e);
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 4:{
				$GLOBALS['%s']->pop();
				return "Object";
			}break;
			case 8:{
				$GLOBALS['%s']->pop();
				return "Unknown";
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function hasSuperClass($type, $sup) {
		$GLOBALS['%s']->push("Types::hasSuperClass");
		$__hx__spos = $GLOBALS['%s']->length;
		while(null !== $type) {
			if($type === $sup) {
				$GLOBALS['%s']->pop();
				return true;
			}
			$type = Type::getSuperClass($type);
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function isAnonymous($v) {
		$GLOBALS['%s']->push("Types::isAnonymous");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Reflect::isObject($v) && null === Type::getClass($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function has($value, $type) {
		$GLOBALS['%s']->push("Types::as");
		$__hx__spos = $GLOBALS['%s']->length;
		if(Std::is($value, $type)) {
			$tmp = $value;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function ifIs($value, $type, $handler) {
		$GLOBALS['%s']->push("Types::ifIs");
		$__hx__spos = $GLOBALS['%s']->length;
		if(Std::is($value, $type)) {
			call_user_func_array($handler, array($value));
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	static function of($type, $value) {
		$GLOBALS['%s']->push("Types::of");
		$__hx__spos = $GLOBALS['%s']->length;
		if(Std::is($value, $type)) {
			$tmp = $value;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function sameType($a, $b) {
		$GLOBALS['%s']->push("Types::sameType");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $a && $b === null) {
			$GLOBALS['%s']->pop();
			return true;
		}
		if(null === $a || $b === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$tb = Type::typeof($b);
		switch($tb->index) {
		case 6:{
			$c = $tb->params[0];
			{
				$tmp = Std::is($a, $c);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 7:{
			$e = $tb->params[0];
			{
				$tmp = Std::is($a, $e);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		default:{
			$tmp = Type::typeof($a) === $tb;
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function isPrimitive($v) {
		$GLOBALS['%s']->push("Types::isPrimitive");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 0:case 1:case 2:case 3:{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 5:case 7:case 4:case 8:{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$tmp = Type::getClassName($c) === "String";
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Types'; }
}
