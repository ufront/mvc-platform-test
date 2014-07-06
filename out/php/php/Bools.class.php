<?php

class Bools {
	public function __construct(){}
	static function format($v, $param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Bools::format");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Bools::formatf($param, $params, $culture), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Bools::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "B");
		$format = $params->shift();
		switch($format) {
		case "B":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Bools_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "N":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Bools_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "R":{
			if($params->length !== 2) {
				throw new HException("bool format R requires 2 parameters");
			}
			{
				$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Bools_2"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		default:{
			throw new HException("Unsupported bool format: " . _hx_string_or_null($format));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Bools::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Bools::interpolatef($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Bools::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a === $b) {
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation), "Bools_3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$f = Floats::interpolatef(0, 1, $equation);
			{
				$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$f), "Bools_4"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function canParse($s) {
		$GLOBALS['%s']->push("Bools::canParse");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = strtolower($s);
		{
			$tmp = $s === "true" || $s === "false";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function parse($s) {
		$GLOBALS['%s']->push("Bools::parse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = strtolower($s) === "true";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Bools::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a === $b) {
			$GLOBALS['%s']->pop();
			return 0;
		} else {
			if($a) {
				$GLOBALS['%s']->pop();
				return -1;
			} else {
				$GLOBALS['%s']->pop();
				return 1;
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Bools'; }
}
function Bools_0(&$culture, &$format, &$param, &$params, $v) {
	{
		$GLOBALS['%s']->push("Bools::formatf@23");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($v) {
			$GLOBALS['%s']->pop();
			return "true";
		} else {
			$GLOBALS['%s']->pop();
			return "false";
		}
		$GLOBALS['%s']->pop();
	}
}
function Bools_1(&$culture, &$format, &$param, &$params, $v1) {
	{
		$GLOBALS['%s']->push("Bools::formatf@25");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($v1) {
			$GLOBALS['%s']->pop();
			return "1";
		} else {
			$GLOBALS['%s']->pop();
			return "0";
		}
		$GLOBALS['%s']->pop();
	}
}
function Bools_2(&$culture, &$format, &$param, &$params, $v2) {
	{
		$GLOBALS['%s']->push("Bools::formatf@29");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($v2) {
			$tmp = $params[0];
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = $params[1];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Bools_3(&$a, &$b, &$equation, $_) {
	{
		$GLOBALS['%s']->push("Bools::interpolatef@43");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $a;
		}
		$GLOBALS['%s']->pop();
	}
}
function Bools_4(&$a, &$b, &$equation, &$f, $v) {
	{
		$GLOBALS['%s']->push("Bools::interpolatef@47");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if(call_user_func_array($f, array($v)) < 0.5) {
			$GLOBALS['%s']->pop();
			return $a;
		} else {
			$GLOBALS['%s']->pop();
			return $b;
		}
		$GLOBALS['%s']->pop();
	}
}
