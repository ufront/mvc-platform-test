<?php

class thx_core_Strings {
	public function __construct(){}
	static function after($value, $searchFor) {
		$pos = _hx_index_of($value, $searchFor, null);
		if($pos < 0) {
			return "";
		} else {
			return _hx_substring($value, $pos + strlen($searchFor), null);
		}
	}
	static function capitalize($s) {
		return _hx_string_or_null(strtoupper(_hx_substring($s, 0, 1))) . _hx_string_or_null(_hx_substring($s, 1, null));
	}
	static function capitalizeWords($value, $whiteSpaceOnly = null) {
		if($whiteSpaceOnly === null) {
			$whiteSpaceOnly = false;
		}
		if($whiteSpaceOnly) {
			return ucwords($value);
		} else {
			return thx_core_Strings::$UCWORDS->map(_hx_string_or_null(strtoupper(_hx_substring($value, 0, 1))) . _hx_string_or_null(_hx_substring($value, 1, null)), (isset(thx_core_Strings::$upperMatch) ? thx_core_Strings::$upperMatch: array("thx_core_Strings", "upperMatch")));
		}
	}
	static function collapse($value) {
		return thx_core_Strings::$WSG->replace(trim($value), " ");
	}
	static function compare($a, $b) {
		if($a < $b) {
			return -1;
		} else {
			if($a > $b) {
				return 1;
			} else {
				return 0;
			}
		}
	}
	static function contains($s, $test) {
		return _hx_index_of($s, $test, null) >= 0;
	}
	static function dasherize($s) {
		return str_replace("_", "-", $s);
	}
	static function ellipsis($s, $maxlen = null, $symbol = null) {
		if($symbol === null) {
			$symbol = "...";
		}
		if($maxlen === null) {
			$maxlen = 20;
		}
		if(strlen($s) > $maxlen) {
			return _hx_string_or_null(_hx_substring($s, 0, thx_core_Strings_0($maxlen, $s, $symbol))) . _hx_string_or_null($symbol);
		} else {
			return $s;
		}
	}
	static function filter($s, $predicate) {
		return _hx_explode("", $s)->filter($predicate)->join("");
	}
	static function filterCharcode($s, $predicate) {
		return thx_core_Strings::map($s, array(new _hx_lambda(array(&$predicate, &$s), "thx_core_Strings_1"), 'execute'))->filter($predicate)->map(array(new _hx_lambda(array(&$predicate, &$s), "thx_core_Strings_2"), 'execute'))->join("");
	}
	static function from($value, $searchFor) {
		$pos = _hx_index_of($value, $searchFor, null);
		if($pos < 0) {
			return "";
		} else {
			return _hx_substring($value, $pos, null);
		}
	}
	static function humanize($s) {
		$s1 = thx_core_Strings::underscore($s);
		return str_replace("_", " ", $s1);
	}
	static function isAlphaNum($value) {
		return ctype_alnum($value);
	}
	static function isLowerCase($value) {
		return strtolower($value) === $value;
	}
	static function isUpperCase($value) {
		return strtoupper($value) === $value;
	}
	static function ifEmpty($value, $alt) {
		if(null !== $value && "" !== $value) {
			return $value;
		} else {
			return $alt;
		}
	}
	static function isDigitsOnly($value) {
		return ctype_digit($value);
	}
	static function isEmpty($value) {
		return $value === null || $value === "";
	}
	static function iterator($s) {
		return _hx_explode("", $s)->iterator();
	}
	static function map($value, $callback) {
		return _hx_explode("", $value)->map($callback);
	}
	static function remove($value, $toremove) {
		if($toremove === "") {
			return implode(str_split ($value), "");
		} else {
			return str_replace($toremove, "", $value);
		}
	}
	static function removeAfter($value, $toremove) {
		if(StringTools::endsWith($value, $toremove)) {
			return _hx_substring($value, 0, strlen($value) - strlen($toremove));
		} else {
			return $value;
		}
	}
	static function removeBefore($value, $toremove) {
		if(StringTools::startsWith($value, $toremove)) {
			return _hx_substring($value, strlen($toremove), null);
		} else {
			return $value;
		}
	}
	static function repeat($s, $times) {
		return _hx_deref((thx_core_Strings_3($s, $times)))->join("");
	}
	static function reverse($s) {
		$arr = _hx_explode("", $s);
		$arr->reverse();
		return $arr->join("");
	}
	static function stripTags($s) {
		return strip_tags($s);
	}
	static function surround($s, $left, $right = null) {
		return "" . _hx_string_or_null($left) . _hx_string_or_null($s) . _hx_string_or_null((((null === $right) ? $left : $right)));
	}
	static function toArray($s) {
		return _hx_explode("", $s);
	}
	static function toCharcodeArray($s) {
		return thx_core_Strings::map($s, array(new _hx_lambda(array(&$s), "thx_core_Strings_4"), 'execute'));
	}
	static function toChunks($s, $len) {
		$chunks = (new _hx_array(array()));
		while(strlen($s) > 0) {
			$chunks->push(_hx_substring($s, 0, $len));
			$s = _hx_substring($s, $len, null);
		}
		return $chunks;
	}
	static function trimChars($value, $charlist) {
		return trim($value, $charlist);
	}
	static function trimCharsLeft($value, $charlist) {
		return ltrim($value, $charlist);
	}
	static function trimCharsRight($value, $charlist) {
		return rtrim($value, $charlist);
	}
	static function underscore($s) {
		$s = _hx_deref(new EReg("::", "g"))->replace($s, "/");
		$s = _hx_deref(new EReg("([A-Z]+)([A-Z][a-z])", "g"))->replace($s, "\$1_\$2");
		$s = _hx_deref(new EReg("([a-z\\d])([A-Z])", "g"))->replace($s, "\$1_\$2");
		$s = _hx_deref(new EReg("-", "g"))->replace($s, "_");
		return strtolower($s);
	}
	static function upTo($value, $searchFor) {
		$pos = _hx_index_of($value, $searchFor, null);
		if($pos < 0) {
			return $value;
		} else {
			return _hx_substring($value, 0, $pos);
		}
	}
	static function wrapColumns($s, $columns = null, $indent = null, $newline = null) {
		if($newline === null) {
			$newline = "\x0A";
		}
		if($indent === null) {
			$indent = "";
		}
		if($columns === null) {
			$columns = 78;
		}
		return thx_core_Strings::$SPLIT_LINES->split($s)->map(array(new _hx_lambda(array(&$columns, &$indent, &$newline, &$s), "thx_core_Strings_5"), 'execute'))->join($newline);
	}
	static function upperMatch($re) {
		return strtoupper($re->matched(0));
	}
	static function wrapLine($s, $columns, $indent, $newline) {
		$parts = (new _hx_array(array()));
		$pos = 0;
		$len = strlen($s);
		$ilen = strlen($indent);
		$columns -= $ilen;
		while(true) {
			if($pos + $columns >= $len - $ilen) {
				$parts->push(_hx_substring($s, $pos, null));
				break;
			}
			$i = 0;
			while(!StringTools::isSpace($s, $pos + $columns - $i) && $i < $columns) {
				$i++;
			}
			if($i === $columns) {
				$i = 0;
				while(!StringTools::isSpace($s, $pos + $columns + $i) && $pos + $columns + $i < $len) {
					$i++;
				}
				$parts->push(_hx_substring($s, $pos, $pos + $columns + $i));
				$pos += $columns + $i + 1;
			} else {
				$parts->push(_hx_substring($s, $pos, $pos + $columns - $i));
				$pos += $columns - $i + 1;
			}
			unset($i);
		}
		return _hx_string_or_null($indent) . _hx_string_or_null($parts->join(_hx_string_or_null($newline) . _hx_string_or_null($indent)));
	}
	static $UCWORDS;
	static $WSG;
	static $SPLIT_LINES;
	function __toString() { return 'thx.core.Strings'; }
}
thx_core_Strings::$UCWORDS = new EReg("[^a-zA-Z]([a-z])", "g");
thx_core_Strings::$WSG = new EReg("\\s+", "g");
thx_core_Strings::$SPLIT_LINES = new EReg("\x0D\x0A|\x0A\x0D|\x0A|\x0D", "g");
function thx_core_Strings_0(&$maxlen, &$s, &$symbol) {
	if(strlen($symbol) > $maxlen - strlen($symbol)) {
		return strlen($symbol);
	} else {
		return $maxlen - strlen($symbol);
	}
}
function thx_core_Strings_1(&$predicate, &$s, $s1) {
	{
		return _hx_char_code_at($s1, 0);
	}
}
function thx_core_Strings_2(&$predicate, &$s, $i) {
	{
		return chr($i);
	}
}
function thx_core_Strings_3(&$s, &$times) {
	{
		$_g = (new _hx_array(array()));
		{
			$_g1 = 0;
			while($_g1 < $times) {
				$i = $_g1++;
				$_g->push($s);
				unset($i);
			}
		}
		return $_g;
	}
}
function thx_core_Strings_4(&$s, $s1) {
	{
		return _hx_char_code_at($s1, 0);
	}
}
function thx_core_Strings_5(&$columns, &$indent, &$newline, &$s, $part) {
	{
		return thx_core_Strings::wrapLine(thx_core_Strings_6($columns, $indent, $newline, $part, $s), $columns, $indent, $newline);
	}
}
function thx_core_Strings_6(&$columns, &$indent, &$newline, &$part, &$s) {
	{
		$s1 = thx_core_Strings::$WSG->replace($part, " ");
		return trim($s1);
	}
}
