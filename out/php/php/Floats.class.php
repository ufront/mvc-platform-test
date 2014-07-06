<?php

class Floats {
	public function __construct(){}
	static function normalize($v) {
		$GLOBALS['%s']->push("Floats::normalize");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v < 0.0) {
			$GLOBALS['%s']->pop();
			return 0.0;
		} else {
			if($v > 1.0) {
				$GLOBALS['%s']->pop();
				return 1.0;
			} else {
				$GLOBALS['%s']->pop();
				return $v;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function clamp($v, $min, $max) {
		$GLOBALS['%s']->push("Floats::clamp");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v < $min) {
			$GLOBALS['%s']->pop();
			return $min;
		} else {
			if($v > $max) {
				$GLOBALS['%s']->pop();
				return $max;
			} else {
				$GLOBALS['%s']->pop();
				return $v;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function clampSym($v, $max) {
		$GLOBALS['%s']->push("Floats::clampSym");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v < -$max) {
			$tmp = -$max;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			if($v > $max) {
				$GLOBALS['%s']->pop();
				return $max;
			} else {
				$GLOBALS['%s']->pop();
				return $v;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function range($start, $stop = null, $step = null, $inclusive = null) {
		$GLOBALS['%s']->push("Floats::range");
		$__hx__spos = $GLOBALS['%s']->length;
		if($inclusive === null) {
			$inclusive = false;
		}
		if($step === null) {
			$step = 1.0;
		}
		if(null === $stop) {
			$stop = $start;
			$start = 0.0;
		}
		if(($stop - $start) / $step === Math::$POSITIVE_INFINITY) {
			throw new HException(new thx_error_Error("infinite range", null, null, _hx_anonymous(array("fileName" => "Floats.hx", "lineNumber" => 50, "className" => "Floats", "methodName" => "range"))));
		}
		$range = (new _hx_array(array()));
		$i = -1.0;
		$j = null;
		if($inclusive) {
			if($step < 0) {
				while(($j = $start + $step * ++$i) >= $stop) {
					$range->push($j);
				}
			} else {
				while(($j = $start + $step * ++$i) <= $stop) {
					$range->push($j);
				}
			}
		} else {
			if($step < 0) {
				while(($j = $start + $step * ++$i) > $stop) {
					$range->push($j);
				}
			} else {
				while(($j = $start + $step * ++$i) < $stop) {
					$range->push($j);
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $range;
		}
		$GLOBALS['%s']->pop();
	}
	static function sign($v) {
		$GLOBALS['%s']->push("Floats::sign");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v < 0) {
			$GLOBALS['%s']->pop();
			return -1;
		} else {
			$GLOBALS['%s']->pop();
			return 1;
		}
		$GLOBALS['%s']->pop();
	}
	static function abs($a) {
		$GLOBALS['%s']->push("Floats::abs");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a < 0) {
			$tmp = -$a;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $a;
		}
		$GLOBALS['%s']->pop();
	}
	static function min($a, $b) {
		$GLOBALS['%s']->push("Floats::min");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a < $b) {
			$GLOBALS['%s']->pop();
			return $a;
		} else {
			$GLOBALS['%s']->pop();
			return $b;
		}
		$GLOBALS['%s']->pop();
	}
	static function max($a, $b) {
		$GLOBALS['%s']->push("Floats::max");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a > $b) {
			$GLOBALS['%s']->pop();
			return $a;
		} else {
			$GLOBALS['%s']->pop();
			return $b;
		}
		$GLOBALS['%s']->pop();
	}
	static function wrap($v, $min, $max) {
		$GLOBALS['%s']->push("Floats::wrap");
		$__hx__spos = $GLOBALS['%s']->length;
		$range = $max - $min + 1;
		if($v < $min) {
			$v += $range * (($min - $v) / $range + 1);
		}
		{
			$tmp = $min + _hx_mod(($v - $min), $range);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function circularWrap($v, $max) {
		$GLOBALS['%s']->push("Floats::circularWrap");
		$__hx__spos = $GLOBALS['%s']->length;
		$v = _hx_mod($v, $max);
		if($v < 0) {
			$v += $max;
		}
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($f, $a = null, $b = null, $equation = null) {
		$GLOBALS['%s']->push("Floats::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		if($b === null) {
			$b = 1.0;
		}
		if($a === null) {
			$a = 0.0;
		}
		if(null === $equation) {
			$equation = (isset(thx_math_Equations::$linear) ? thx_math_Equations::$linear: array("thx_math_Equations", "linear"));
		}
		{
			$tmp = $a + call_user_func_array($equation, array($f)) * ($b - $a);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a = null, $b = null, $equation = null) {
		$GLOBALS['%s']->push("Floats::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		if($b === null) {
			$b = 1.0;
		}
		if($a === null) {
			$a = 0.0;
		}
		if(null === $equation) {
			$equation = (isset(thx_math_Equations::$linear) ? thx_math_Equations::$linear: array("thx_math_Equations", "linear"));
		}
		$d = $b - $a;
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$d, &$equation), "Floats_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolateClampf($min, $max, $equation = null) {
		$GLOBALS['%s']->push("Floats::interpolateClampf");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $equation) {
			$equation = (isset(thx_math_Equations::$linear) ? thx_math_Equations::$linear: array("thx_math_Equations", "linear"));
		}
		{
			$tmp = array(new _hx_lambda(array(&$equation, &$max, &$min), "Floats_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function format($v, $param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Floats::format");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Floats::formatf($param, $params, $culture), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Floats::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "D");
		$format = $params->shift();
		$decimals = null;
		if($params->length > 0) {
			$decimals = Std::parseInt($params[0]);
		} else {
			$decimals = null;
		}
		switch($format) {
		case "D":{
			$tmp = array(new _hx_lambda(array(&$culture, &$decimals, &$format, &$param, &$params), "Floats_2"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "I":{
			$tmp = array(new _hx_lambda(array(&$culture, &$decimals, &$format, &$param, &$params), "Floats_3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "C":{
			$s = null;
			if($params->length > 1) {
				$s = $params[1];
			} else {
				$s = null;
			}
			{
				$tmp = array(new _hx_lambda(array(&$culture, &$decimals, &$format, &$param, &$params, &$s), "Floats_4"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case "P":{
			$tmp = array(new _hx_lambda(array(&$culture, &$decimals, &$format, &$param, &$params), "Floats_5"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "M":{
			$tmp = array(new _hx_lambda(array(&$culture, &$decimals, &$format, &$param, &$params), "Floats_6"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		default:{
			throw new HException(new thx_error_Error("Unsupported number format: {0}", null, $format, _hx_anonymous(array("fileName" => "Floats.hx", "lineNumber" => 152, "className" => "Floats", "methodName" => "formatf"))));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static $_reparse;
	static $_reparseStrict;
	static function canParse($s, $strict = null) {
		$GLOBALS['%s']->push("Floats::canParse");
		$__hx__spos = $GLOBALS['%s']->length;
		if($strict === null) {
			$strict = false;
		}
		if($strict) {
			$tmp = Floats::$_reparseStrict->match($s);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = Floats::$_reparse->match($s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function parse($s) {
		$GLOBALS['%s']->push("Floats::parse");
		$__hx__spos = $GLOBALS['%s']->length;
		if(_hx_substr($s, 0, 1) === "+") {
			$s = _hx_substr($s, 1, null);
		}
		{
			$tmp = Std::parseFloat($s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Floats::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a < $b) {
			$GLOBALS['%s']->pop();
			return -1;
		} else {
			if($a > $b) {
				$GLOBALS['%s']->pop();
				return 1;
			} else {
				$GLOBALS['%s']->pop();
				return 0;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function isNumeric($v) {
		$GLOBALS['%s']->push("Floats::isNumeric");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Std::is($v, _hx_qtype("Float")) || Std::is($v, _hx_qtype("Int"));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function equals($a, $b, $approx = null) {
		$GLOBALS['%s']->push("Floats::equals");
		$__hx__spos = $GLOBALS['%s']->length;
		if($approx === null) {
			$approx = 1e-5;
		}
		if(Math::isNaN($a)) {
			$tmp = Math::isNaN($b);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			if(Math::isNaN($b)) {
				$GLOBALS['%s']->pop();
				return false;
			} else {
				if(!Math::isFinite($a) && !Math::isFinite($b)) {
					$tmp = (is_object($_t = ($a > 0)) && !($_t instanceof Enum) ? $_t === $b > 0 : $_t == $b > 0);
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		{
			$tmp = Math::abs($b - $a) < $approx;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function uninterpolatef($a, $b) {
		$GLOBALS['%s']->push("Floats::uninterpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		$b = 1 / ($b - $a);
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b), "Floats_7"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function uninterpolateClampf($a, $b) {
		$GLOBALS['%s']->push("Floats::uninterpolateClampf");
		$__hx__spos = $GLOBALS['%s']->length;
		$b = 1 / ($b - $a);
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b), "Floats_8"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function round($number, $precision = null) {
		$GLOBALS['%s']->push("Floats::round");
		$__hx__spos = $GLOBALS['%s']->length;
		if($precision === null) {
			$precision = 2;
		}
		$number *= Math::pow(10, $precision);
		{
			$tmp = Math::round($number) / Math::pow(10, $precision);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Floats'; }
}
Floats::$_reparse = new EReg("^[+\\-]?(?:0|[1-9]\\d*)(?:\\.\\d*)?(?:[eE][+\\-]?\\d+)?", "");
Floats::$_reparseStrict = new EReg("^[+\\-]?(?:0|[1-9]\\d*)(?:\\.\\d*)?(?:[eE][+\\-]?\\d+)?\$", "");
function Floats_0(&$a, &$b, &$d, &$equation, $f) {
	{
		$GLOBALS['%s']->push("Floats::interpolatef@113");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $a + call_user_func_array($equation, array($f)) * $d;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_1(&$equation, &$max, &$min, $a, $b) {
	{
		$GLOBALS['%s']->push("Floats::interpolateClampf@121");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$d = $b - $a;
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$d, &$equation, &$max, &$min), "Floats_9"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_2(&$culture, &$decimals, &$format, &$param, &$params, $v) {
	{
		$GLOBALS['%s']->push("Floats::formatf@141");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatNumber::decimal($v, $decimals, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_3(&$culture, &$decimals, &$format, &$param, &$params, $v1) {
	{
		$GLOBALS['%s']->push("Floats::formatf@143");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatNumber::int($v1, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_4(&$culture, &$decimals, &$format, &$param, &$params, &$s, $v2) {
	{
		$GLOBALS['%s']->push("Floats::formatf@146");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatNumber::currency($v2, $s, $decimals, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_5(&$culture, &$decimals, &$format, &$param, &$params, $v3) {
	{
		$GLOBALS['%s']->push("Floats::formatf@148");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatNumber::percent($v3, $decimals, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_6(&$culture, &$decimals, &$format, &$param, &$params, $v4) {
	{
		$GLOBALS['%s']->push("Floats::formatf@150");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatNumber::permille($v4, $decimals, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_7(&$a, &$b, $x) {
	{
		$GLOBALS['%s']->push("Floats::uninterpolatef@197");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = ($x - $a) * $b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_8(&$a, &$b, $x) {
	{
		$GLOBALS['%s']->push("Floats::uninterpolateClampf@203");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Floats::clamp(($x - $a) * $b, 0.0, 1.0);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Floats_9(&$a, &$b, &$d, &$equation, &$max, &$min, $f) {
	{
		$GLOBALS['%s']->push("Floats::round@124");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = $a + call_user_func_array($equation, array(Floats::clamp($f, $min, $max))) * $d;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
