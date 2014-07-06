<?php

class Enums {
	public function __construct(){}
	static function string($e) {
		$GLOBALS['%s']->push("Enums::string");
		$__hx__spos = $GLOBALS['%s']->length;
		$cons = Type::enumConstructor($e);
		$params = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Type::enumParameters($e);
			while($_g < $_g1->length) {
				$param = $_g1[$_g];
				++$_g;
				$params->push(Dynamics::string($param));
				unset($param);
			}
		}
		{
			$tmp = _hx_string_or_null($cons) . _hx_string_or_null((Enums_0($cons, $e, $params)));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Enums::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		$v = null;
		if(($v = Enums_1($a, $b, $v) - Enums_2($a, $b, $v)) !== 0) {
			$GLOBALS['%s']->pop();
			return $v;
		}
		{
			$tmp = Arrays::compare(Type::enumParameters($a), Type::enumParameters($b));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Enums'; }
}
function Enums_0(&$cons, &$e, &$params) {
	if($params->length === 0) {
		return "";
	} else {
		return "(" . _hx_string_or_null($params->join(", ")) . ")";
	}
}
function Enums_1(&$a, &$b, &$v) {
	{
		$e = $a;
		return $e->index;
	}
}
function Enums_2(&$a, &$b, &$v) {
	{
		$e1 = $b;
		return $e1->index;
	}
}
