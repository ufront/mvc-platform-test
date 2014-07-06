<?php

class Math {
	public function __construct(){}
	static $PI;
	static $NaN;
	static $POSITIVE_INFINITY;
	static $NEGATIVE_INFINITY;
	static function abs($v) {
		$GLOBALS['%s']->push("Math::abs");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = abs($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function sin($v) {
		$GLOBALS['%s']->push("Math::sin");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = sin($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function cos($v) {
		$GLOBALS['%s']->push("Math::cos");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = cos($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function sqrt($v) {
		$GLOBALS['%s']->push("Math::sqrt");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = sqrt($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function round($v) {
		$GLOBALS['%s']->push("Math::round");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (int) floor($v + 0.5);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function floor($v) {
		$GLOBALS['%s']->push("Math::floor");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (int) floor($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function ceil($v) {
		$GLOBALS['%s']->push("Math::ceil");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (int) ceil($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function asin($v) {
		$GLOBALS['%s']->push("Math::asin");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = asin($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function pow($v, $exp) {
		$GLOBALS['%s']->push("Math::pow");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = pow($v, $exp);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function random() {
		$GLOBALS['%s']->push("Math::random");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = mt_rand() / mt_getrandmax();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isNaN($f) {
		$GLOBALS['%s']->push("Math::isNaN");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = is_nan($f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isFinite($f) {
		$GLOBALS['%s']->push("Math::isFinite");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = is_finite($f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Math'; }
}
{
	Math::$PI = M_PI;
	Math::$NaN = acos(1.01);
	Math::$NEGATIVE_INFINITY = log(0);
	Math::$POSITIVE_INFINITY = -Math::$NEGATIVE_INFINITY;
}
