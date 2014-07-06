<?php

class thx_culture_FormatNumber {
	public function __construct(){}
	static function decimal($v, $decimals = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::decimal");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::crunch($v, $decimals, $culture->percent, $culture->number->patternNegative, $culture->number->patternPositive, $culture, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function percent($v, $decimals = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::percent");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::crunch($v, $decimals, $culture->percent, $culture->percent->patternNegative, $culture->percent->patternPositive, $culture, "%", $culture->symbolPercent);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function permille($v, $decimals = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::permille");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::crunch($v, $decimals, $culture->percent, $culture->percent->patternNegative, $culture->percent->patternPositive, $culture, "%", $culture->symbolPermille);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function currency($v, $symbol = null, $decimals = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::currency");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::crunch($v, $decimals, $culture->currency, $culture->currency->patternNegative, $culture->currency->patternPositive, $culture, "\$", thx_culture_FormatNumber_0($culture, $decimals, $symbol, $v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function int($v, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::int");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::decimal($v, 0, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function digits($v, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::digits");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::processDigits($v, $culture->digits);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function crunch($v, $decimals, $info, $negative, $positive, $culture, $symbol, $replace) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::crunch");
		$__hx__spos = $GLOBALS['%s']->length;
		if(Math::isNaN($v)) {
			$tmp = $culture->symbolNaN;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			if(!Math::isFinite($v)) {
				if($v === Math::$NEGATIVE_INFINITY) {
					$tmp = $culture->symbolNegInf;
					$GLOBALS['%s']->pop();
					return $tmp;
				} else {
					$tmp = $culture->symbolPosInf;
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$fv = thx_culture_FormatNumber::value($v, $info, thx_culture_FormatNumber_1($culture, $decimals, $info, $negative, $positive, $replace, $symbol, $v), $culture->digits);
		if($symbol !== null) {
			$s = null;
			{
				$s1 = null;
				if($v < 0) {
					$s1 = $negative;
				} else {
					$s1 = $positive;
				}
				$s = str_replace("n", $fv, $s1);
			}
			if($symbol === "") {
				$tmp = implode(str_split ($s), $replace);
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$tmp = str_replace($symbol, $replace, $s);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$s2 = null;
			if($v < 0) {
				$s2 = $negative;
			} else {
				$s2 = $positive;
			}
			{
				$tmp = str_replace("n", $fv, $s2);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function processDigits($s, $digits) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::processDigits");
		$__hx__spos = $GLOBALS['%s']->length;
		if($digits === null) {
			$GLOBALS['%s']->pop();
			return $s;
		}
		$o = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g = strlen($s);
			while($_g1 < $_g) {
				$i = $_g1++;
				$o->push($digits[Std::parseInt(_hx_substr($s, $i, 1))]);
				unset($i);
			}
		}
		{
			$tmp = $o->join("");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function value($v, $info, $decimals, $digits) {
		$GLOBALS['%s']->push("thx.culture.FormatNumber::value");
		$__hx__spos = $GLOBALS['%s']->length;
		$fv = "" . _hx_string_rec(Math::abs($v), "");
		$pos = _hx_index_of($fv, "E", null);
		if($pos > 0) {
			$e = Std::parseInt(_hx_substr($fv, $pos + 1, null));
			$ispos = true;
			if($e < 0) {
				$ispos = false;
				$e = -$e;
			}
			$s = null;
			{
				$s1 = _hx_substr($fv, 0, $pos);
				$s = str_replace(".", "", $s1);
			}
			if($ispos) {
				$l = $e + 1;
				if(strlen("0") === 0 || strlen($s) >= $l) {
					$fv = $s;
				} else {
					$fv = str_pad($s, Math::ceil(($l - strlen($s)) / strlen("0")) * strlen("0") + strlen($s), "0", STR_PAD_RIGHT);
				}
			} else {
				$fv = "0" . _hx_string_or_null((((strlen("0") === 0 || strlen(".") >= $e) ? "." : str_pad(".", Math::ceil(($e - strlen(".")) / strlen("0")) * strlen("0") + strlen("."), "0", STR_PAD_RIGHT)))) . _hx_string_or_null($s);
			}
		}
		$parts = _hx_explode(".", $fv);
		$temp = $parts[0];
		$intparts = (new _hx_array(array()));
		$group = 0;
		while(true) {
			if(strlen($temp) === 0) {
				break;
			}
			$len = $info->groups[$group];
			if(strlen($temp) <= $len) {
				$intparts->unshift(thx_culture_FormatNumber::processDigits($temp, $digits));
				break;
			}
			$intparts->unshift(thx_culture_FormatNumber::processDigits(_hx_substr($temp, -$len, null), $digits));
			$temp = _hx_substr($temp, 0, -$len);
			if($group < $info->groups->length - 1) {
				$group++;
			}
			unset($len);
		}
		$intpart = $intparts->join($info->groupsSeparator);
		if($decimals > 0) {
			$decpart = null;
			if($parts->length === 1) {
				if(strlen("0") === 0 || strlen("") >= $decimals) {
					$decpart = "";
				} else {
					$decpart = str_pad("", Math::ceil(($decimals - strlen("")) / strlen("0")) * strlen("0") + strlen(""), "0", STR_PAD_LEFT);
				}
			} else {
				if(strlen($parts[1]) > $decimals) {
					$decpart = _hx_substr($parts[1], 0, $decimals);
				} else {
					$s2 = $parts[1];
					if(strlen("0") === 0 || strlen($s2) >= $decimals) {
						$decpart = $s2;
					} else {
						$decpart = str_pad($s2, Math::ceil(($decimals - strlen($s2)) / strlen("0")) * strlen("0") + strlen($s2), "0", STR_PAD_RIGHT);
					}
				}
			}
			{
				$tmp = _hx_string_or_null($intpart) . _hx_string_or_null($info->decimalsSeparator) . _hx_string_or_null(thx_culture_FormatNumber::processDigits($decpart, $digits));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$GLOBALS['%s']->pop();
			return $intpart;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'thx.culture.FormatNumber'; }
}
function thx_culture_FormatNumber_0(&$culture, &$decimals, &$symbol, &$v) {
	if($symbol === null) {
		return $culture->currencySymbol;
	} else {
		return $symbol;
	}
}
function thx_culture_FormatNumber_1(&$culture, &$decimals, &$info, &$negative, &$positive, &$replace, &$symbol, &$v) {
	if($decimals === null) {
		return $info->decimals;
	} else {
		if($decimals < 0) {
			return 0;
		} else {
			return $decimals;
		}
	}
}
