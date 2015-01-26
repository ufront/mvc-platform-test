<?php

class thx_core_Ints {
	public function __construct(){}
	static $pattern_parse;
	static function abs($v) {
		if($v < 0) {
			return -$v;
		} else {
			return $v;
		}
	}
	static function canParse($s) {
		return thx_core_Ints::$pattern_parse->match($s);
	}
	static function clamp($v, $min, $max) {
		if($v < $min) {
			return $min;
		} else {
			if($v > $max) {
				return $max;
			} else {
				return $v;
			}
		}
	}
	static function clampSym($v, $max) {
		$min = -$max;
		if($v < $min) {
			return $min;
		} else {
			if($v > $max) {
				return $max;
			} else {
				return $v;
			}
		}
	}
	static function compare($a, $b) {
		return $a - $b;
	}
	static function interpolate($f, $a, $b) {
		return Math::round($a + ($b - $a) * $f);
	}
	static function isEven($v) {
		return _hx_mod($v, 2) === 0;
	}
	static function isOdd($v) {
		return _hx_mod($v, 2) !== 0;
	}
	static function max($a, $b) {
		if($a > $b) {
			return $a;
		} else {
			return $b;
		}
	}
	static function min($a, $b) {
		if($a < $b) {
			return $a;
		} else {
			return $b;
		}
	}
	static function parse($s, $base = null) {
		if($base !== null && ($base < 2 || $base > strlen(thx_core_Ints::$BASE))) {
			throw new HException("invalid base " . _hx_string_rec($base, "") . ", it must be between 2 and " . _hx_string_rec(strlen(thx_core_Ints::$BASE), ""));
		}
		$negative = null;
		if(StringTools::startsWith($s, "+")) {
			$s = _hx_substring($s, 1, null);
			$negative = false;
		} else {
			if(StringTools::startsWith($s, "-")) {
				$s = _hx_substring($s, 1, null);
				$negative = true;
			} else {
				$negative = false;
			}
		}
		if(strlen($s) === 0) {
			return null;
		}
		$s = strtolower(trim($s));
		if(StringTools::startsWith($s, "0x")) {
			if(null !== $base && 16 !== $base) {
				return null;
			}
			$base = 16;
			$s = _hx_substring($s, 2, null);
		} else {
			if(null === $base) {
				$base = 10;
			}
		}
		try {
			return ((($negative) ? -1 : 1)) * thx_core_Ints_0($base, $negative, $s);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return null;
			}
		}
	}
	static function random($min = null, $max) {
		if($min === null) {
			$min = 0;
		}
		return Std::random($max + 1) + $min;
	}
	static function range($start, $stop = null, $step = null) {
		if($step === null) {
			$step = 1;
		}
		if(null === $stop) {
			$stop = $start;
			$start = 0;
		}
		if(($stop - $start) / $step === Math::$POSITIVE_INFINITY) {
			throw new HException("infinite range");
		}
		$range = (new _hx_array(array()));
		$i = -1;
		$j = null;
		if($step < 0) {
			while(($j = $start + $step * ++$i) > $stop) {
				$range->push($j);
			}
		} else {
			while(($j = $start + $step * ++$i) < $stop) {
				$range->push($j);
			}
		}
		return $range;
	}
	static $BASE = "0123456789abcdefghijklmnopqrstuvwxyz";
	static function toString($value, $base) {
		if($base < 2 || $base > strlen(thx_core_Ints::$BASE)) {
			throw new HException("invalid base " . _hx_string_rec($base, "") . ", it must be between 2 and " . _hx_string_rec(strlen(thx_core_Ints::$BASE), ""));
		}
		if($base === 10 || $value === 0) {
			return "" . _hx_string_rec($value, "");
		}
		$buf = "";
		$abs = null;
		if($value < 0) {
			$abs = -$value;
		} else {
			$abs = $value;
		}
		while($abs > 0) {
			$buf = _hx_string_or_null(_hx_char_at(thx_core_Ints::$BASE, _hx_mod($abs, $base))) . _hx_string_or_null($buf);
			$abs = Std::int($abs / $base);
		}
		return _hx_string_or_null(((($value < 0) ? "-" : ""))) . _hx_string_or_null($buf);
	}
	static function sign($value) {
		if($value < 0) {
			return -1;
		} else {
			return 1;
		}
	}
	static function wrapCircular($v, $max) {
		$v = _hx_mod($v, $max);
		if($v < 0) {
			$v += $max;
		}
		return $v;
	}
	function __toString() { return 'thx.core.Ints'; }
}
thx_core_Ints::$pattern_parse = new EReg("^[+-]?(\\d+|0x[0-9A-F]+)\$", "i");
function thx_core_Ints_0(&$base, &$negative, &$s) {
	{
		$array = _hx_explode("", $s);
		$callback = array(new _hx_lambda(array(&$array, &$base, &$negative, &$s), "thx_core_Ints_1"), 'execute');
		$initial = 0;
		$array->map(array(new _hx_lambda(array(&$array, &$base, &$callback, &$initial, &$negative, &$s), "thx_core_Ints_2"), 'execute'));
		return $initial;
	}
}
function thx_core_Ints_1(&$array, &$base, &$negative, &$s, $acc, $c) {
	{
		$i = _hx_index_of(thx_core_Ints::$BASE, $c, null);
		if($i < 0 || $i >= $base) {
			throw new HException("invalid");
		}
		return $acc * $base + $i;
	}
}
function thx_core_Ints_2(&$array, &$base, &$callback, &$initial, &$negative, &$s, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
