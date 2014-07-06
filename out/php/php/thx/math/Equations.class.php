<?php

class thx_math_Equations {
	public function __construct(){}
	static function linear($v) {
		$GLOBALS['%s']->push("thx.math.Equations::linear");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	static function polynomial($t, $e) {
		$GLOBALS['%s']->push("thx.math.Equations::polynomial");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Math::pow($t, $e);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function quadratic($t) {
		$GLOBALS['%s']->push("thx.math.Equations::quadratic");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = thx_math_Equations::polynomial($t, 2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function cubic($t) {
		$GLOBALS['%s']->push("thx.math.Equations::cubic");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = thx_math_Equations::polynomial($t, 3);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function sin($t) {
		$GLOBALS['%s']->push("thx.math.Equations::sin");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = 1 - Math::cos($t * Math::$PI / 2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function exponential($t) {
		$GLOBALS['%s']->push("thx.math.Equations::exponential");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!_hx_equal($t, 0)) {
			$tmp = Math::pow(2, 10 * ($t - 1)) - 1e-3;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	static function circle($t) {
		$GLOBALS['%s']->push("thx.math.Equations::circle");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = 1 - Math::sqrt(1 - $t * $t);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function elastic($t, $a = null, $p = null) {
		$GLOBALS['%s']->push("thx.math.Equations::elastic");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = null;
		if(null === $p) {
			$p = 0.45;
		}
		if(null === $a) {
			$a = 1;
			$s = $p / 4;
		} else {
			$s = $p / (2 * Math::$PI) / Math::asin(1 / $a);
		}
		{
			$tmp = 1 + $a * Math::pow(2, 10 * -$t) * Math::sin(($t - $s) * 2 * Math::$PI / $p);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function elasticf($a = null, $p = null) {
		$GLOBALS['%s']->push("thx.math.Equations::elasticf");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = null;
		if(null === $p) {
			$p = 0.45;
		}
		if(null === $a) {
			$a = 1;
			$s = $p / 4;
		} else {
			$s = $p / (2 * Math::$PI) / Math::asin(1 / $a);
		}
		{
			$tmp = array(new _hx_lambda(array(&$a, &$p, &$s), "thx_math_Equations_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function back($t, $s = null) {
		$GLOBALS['%s']->push("thx.math.Equations::back");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $s) {
			$s = 1.70158;
		}
		{
			$tmp = $t * $t * (($s + 1) * $t - $s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function backf($s = null) {
		$GLOBALS['%s']->push("thx.math.Equations::backf");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $s) {
			$s = 1.70158;
		}
		{
			$tmp = array(new _hx_lambda(array(&$s), "thx_math_Equations_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function bounce($t) {
		$GLOBALS['%s']->push("thx.math.Equations::bounce");
		$__hx__spos = $GLOBALS['%s']->length;
		if($t < 0.363636363636363646) {
			$tmp = 7.5625 * $t * $t;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			if($t < 0.727272727272727293) {
				$tmp = 7.5625 * ($t -= 0.545454545454545414) * $t + .75;
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				if($t < 0.909090909090909061) {
					$tmp = 7.5625 * ($t -= 0.818181818181818232) * $t + .9375;
					$GLOBALS['%s']->pop();
					return $tmp;
				} else {
					$tmp = 7.5625 * ($t -= 0.954545454545454586) * $t + .984375;
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function polynomialf($e) {
		$GLOBALS['%s']->push("thx.math.Equations::polynomialf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$e), "thx_math_Equations_2"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'thx.math.Equations'; }
}
function thx_math_Equations_0(&$a, &$p, &$s, $t) {
	{
		$GLOBALS['%s']->push("thx.math.Equations::elasticf@70");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = 1 + $a * Math::pow(2, 10 * -$t) * Math::sin(($t - $s) * 2 * Math::$PI / $p);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function thx_math_Equations_1(&$s, $t) {
	{
		$GLOBALS['%s']->push("thx.math.Equations::backf@83");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $t * $t * (($s + 1) * $t - $s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function thx_math_Equations_2(&$e, $t) {
	{
		$GLOBALS['%s']->push("thx.math.Equations::polynomialf@96");
		$__hx__spos2 = $GLOBALS['%s']->length;
		thx_math_Equations::polynomial($t, $e);
		$GLOBALS['%s']->pop();
	}
}
