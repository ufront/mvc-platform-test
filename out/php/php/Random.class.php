<?php

class Random {
	public function __construct(){}
	static function bool() {
		$GLOBALS['%s']->push("Random::bool");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Math::random() < 0.5;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function int($from, $to) {
		$GLOBALS['%s']->push("Random::int");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $from + Math::floor(($to - $from + 1) * Math::random());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function float($from, $to) {
		$GLOBALS['%s']->push("Random::float");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $from + ($to - $from) * Math::random();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string($length, $charactersToUse = null) {
		$GLOBALS['%s']->push("Random::string");
		$__hx__spos = $GLOBALS['%s']->length;
		if($charactersToUse === null) {
			$charactersToUse = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		$str = "";
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$str .= _hx_string_or_null(_hx_char_at($charactersToUse, Math::floor((strlen($charactersToUse) - 1 + 1) * Math::random())));
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $str;
		}
		$GLOBALS['%s']->pop();
	}
	static function date($earliest, $latest) {
		$GLOBALS['%s']->push("Random::date");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Date::fromTime(Random_0($earliest, $latest));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromArray($arr) {
		$GLOBALS['%s']->push("Random::fromArray");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr !== null && $arr->length > 0) {
			$tmp = $arr[Math::floor(($arr->length - 1 + 1) * Math::random())];
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function shuffle($arr) {
		$GLOBALS['%s']->push("Random::shuffle");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr !== null) {
			$_g1 = 0;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$j = Math::floor(($arr->length - 1 + 1) * Math::random());
				$a = $arr[$i];
				$b = $arr[$j];
				$arr[$i] = $b;
				$arr[$j] = $a;
				unset($j,$i,$b,$a);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromIterable($it) {
		$GLOBALS['%s']->push("Random::fromIterable");
		$__hx__spos = $GLOBALS['%s']->length;
		if($it !== null) {
			$arr = Lambda::harray($it);
			if($arr !== null && $arr->length > 0) {
				$tmp = $arr[Math::floor(($arr->length - 1 + 1) * Math::random())];
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$GLOBALS['%s']->pop();
				return null;
			}
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function enumConstructor($e) {
		$GLOBALS['%s']->push("Random::enumConstructor");
		$__hx__spos = $GLOBALS['%s']->length;
		if($e !== null) {
			$arr = Type::allEnums($e);
			if($arr !== null && $arr->length > 0) {
				$tmp = $arr[Math::floor(($arr->length - 1 + 1) * Math::random())];
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$GLOBALS['%s']->pop();
				return null;
			}
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Random'; }
}
function Random_0(&$earliest, &$latest) {
	{
		$from = $earliest->getTime();
		$to = $latest->getTime();
		return $from + ($to - $from) * Math::random();
	}
}
