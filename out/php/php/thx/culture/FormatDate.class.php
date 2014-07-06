<?php

class thx_culture_FormatDate {
	public function __construct(){}
	static function format($date, $pattern, $culture = null, $leadingspace = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::format");
		$__hx__spos = $GLOBALS['%s']->length;
		if($leadingspace === null) {
			$leadingspace = true;
		}
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		$pos = 0;
		$len = strlen($pattern);
		$buf = new StringBuf();
		$info = $culture->date;
		while($pos < $len) {
			$c = _hx_char_at($pattern, $pos);
			if($c !== "%") {
				$buf->add($c);
				$pos++;
				continue;
			}
			$pos++;
			$c = _hx_char_at($pattern, $pos);
			switch($c) {
			case "a":{
				$buf->add($info->abbrDays[$date->getDay()]);
			}break;
			case "A":{
				$buf->add($info->days[$date->getDay()]);
			}break;
			case "b":case "h":{
				$buf->add($info->abbrMonths[$date->getMonth()]);
			}break;
			case "B":{
				$buf->add($info->months[$date->getMonth()]);
			}break;
			case "c":{
				$buf->add(thx_culture_FormatDate::dateTime($date, $culture));
			}break;
			case "C":{
				$buf->add(thx_culture_FormatNumber::digits("" . _hx_string_rec(Math::floor($date->getFullYear() / 100), ""), $culture));
			}break;
			case "d":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_0($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "D":{
				$buf->add(thx_culture_FormatDate::format($date, "%m/%d/%y", $culture, null));
			}break;
			case "e":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_1($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "f":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_2($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "G":{
				throw new HException("Not Implemented Yet");
			}break;
			case "g":{
				throw new HException("Not Implemented Yet");
			}break;
			case "H":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_3($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "i":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_4($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "I":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_5($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "j":{
				throw new HException("Not Implemented Yet");
			}break;
			case "k":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_6($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "l":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_7($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "m":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_8($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "M":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_9($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "n":{
				$buf->add("\x0A");
			}break;
			case "p":{
				$buf->add(thx_culture_FormatDate_10($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos));
			}break;
			case "P":{
				$buf->add(strtolower((thx_culture_FormatDate_11($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos))));
			}break;
			case "q":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_12($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "r":{
				$buf->add(thx_culture_FormatDate::format($date, "%I:%M:%S %p", $culture, null));
			}break;
			case "R":{
				$buf->add(thx_culture_FormatDate::format($date, "%H:%M", $culture, null));
			}break;
			case "s":{
				$buf->add("" . _hx_string_rec(Std::int($date->getTime() / 1000), ""));
			}break;
			case "S":{
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_13($buf, $c, $culture, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "t":{
				$buf->add("\x09");
			}break;
			case "T":{
				$buf->add(thx_culture_FormatDate::format($date, "%H:%M:%S", $culture, null));
			}break;
			case "u":{
				$d = $date->getDay();
				$buf->add(thx_culture_FormatNumber::digits(thx_culture_FormatDate_14($buf, $c, $culture, $d, $date, $info, $leadingspace, $len, $pattern, $pos), $culture));
			}break;
			case "U":{
				throw new HException("Not Implemented Yet");
			}break;
			case "V":{
				throw new HException("Not Implemented Yet");
			}break;
			case "w":{
				$buf->add(thx_culture_FormatNumber::digits("" . _hx_string_rec($date->getDay(), ""), $culture));
			}break;
			case "W":{
				throw new HException("Not Implemented Yet");
			}break;
			case "x":{
				$buf->add(thx_culture_FormatDate::date($date, $culture));
			}break;
			case "X":{
				$buf->add(thx_culture_FormatDate::time($date, $culture));
			}break;
			case "y":{
				$buf->add(thx_culture_FormatNumber::digits(_hx_substr(("" . _hx_string_rec($date->getFullYear(), "")), -2, null), $culture));
			}break;
			case "Y":{
				$buf->add(thx_culture_FormatNumber::digits("" . _hx_string_rec($date->getFullYear(), ""), $culture));
			}break;
			case "z":{
				$buf->add("+0000");
			}break;
			case "Z":{
				$buf->add("GMT");
			}break;
			case "%":{
				$buf->add("%");
			}break;
			default:{
				$buf->add("%" . _hx_string_or_null($c));
			}break;
			}
			$pos++;
			unset($c);
		}
		{
			$tmp = $buf->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMHours($date) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::getMHours");
		$__hx__spos = $GLOBALS['%s']->length;
		$v = $date->getHours();
		if($v > 12) {
			$tmp = $v - 12;
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	static function yearMonth($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::yearMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternYearMonth, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function monthDay($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::monthDay");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternMonthDay, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function monthDayShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::monthDayShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, "%b %d", $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateYMD($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateYMD");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, "%Y-%m-%d", $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function date($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::date");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternDate, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternDateShort, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateShortTime($d, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateShortTime");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::dateShort($d, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::time($d, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateShortTimeShort($d, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateShortTimeShort");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::dateShort($d, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateTimeShort($d, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateTimeShort");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::date($d, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateRfc($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateRfc");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternDateRfc, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateTime($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::dateTime");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternDateTime, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function universal($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::universal");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternUniversal, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function sortable($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::sortable");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternSortable, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function time($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::time");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternTime, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function timeShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::timeShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatDate::format($date, $culture->date->patternTimeShort, $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function hourShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::hourShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		if(null === $culture->date->am) {
			$tmp = thx_culture_FormatDate::format($date, "%H", $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = thx_culture_FormatDate::format($date, "%l %p", $culture, false);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function year($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::year");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::digits("" . _hx_string_rec($date->getFullYear(), ""), $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function month($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::month");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::digits("" . _hx_string_rec(($date->getMonth() + 1), ""), $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function monthName($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::monthName");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = $culture->date->months[$date->getMonth()];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function monthNameShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::monthNameShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = $culture->date->abbrMonths[$date->getMonth()];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDay($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDay");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = thx_culture_FormatNumber::digits("" . _hx_string_rec(($date->getDay() + $culture->date->firstWeekDay), ""), $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDayName($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayName");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = $culture->date->days[$date->getDay()];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDayNameShort($date, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayNameShort");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		{
			$tmp = $culture->date->abbrDays[$date->getDay()];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDayNameFromNum($weekDayNum, $firstDayOfWk = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayNameFromNum");
		$__hx__spos = $GLOBALS['%s']->length;
		if($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		$firstDayOfWk = Ints::wrap($firstDayOfWk, 0, 6);
		$nameIndex = Ints::wrap($weekDayNum + $firstDayOfWk, 0, 6);
		{
			$tmp = $culture->date->days[$nameIndex];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDayShortNameFromNum($weekDayNum, $firstDayOfWk = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayShortNameFromNum");
		$__hx__spos = $GLOBALS['%s']->length;
		if($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		$firstDayOfWk = Ints::wrap($firstDayOfWk, 0, 6);
		$nameIndex = Ints::wrap($weekDayNum + $firstDayOfWk, 0, 6);
		{
			$tmp = $culture->date->abbrDays[$nameIndex];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function weekDayNumFromName($weekDayName, $firstDayOfWk = null, $culture = null) {
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayNumFromName");
		$__hx__spos = $GLOBALS['%s']->length;
		if($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		if(null === $culture) {
			$culture = thx_culture_Culture::get_defaultCulture();
		}
		if($weekDayName !== null) {
			$weekDayName = strtolower($weekDayName);
		} else {
			$weekDayName = "";
		}
		$dayNames = $culture->date->days->map(array(new _hx_lambda(array(&$culture, &$firstDayOfWk, &$weekDayName), "thx_culture_FormatDate_15"), 'execute'));
		$abbrDayNames = $culture->date->abbrDays->map(array(new _hx_lambda(array(&$culture, &$dayNames, &$firstDayOfWk, &$weekDayName), "thx_culture_FormatDate_16"), 'execute'));
		$index = Lambda::indexOf($dayNames, $weekDayName);
		if($index === -1) {
			$index = Lambda::indexOf($abbrDayNames, $weekDayName);
		}
		if($index !== -1) {
			$firstDayOfWk = Ints::wrap($firstDayOfWk, 0, 6);
			$index = Ints::wrap($index - $firstDayOfWk, 0, 6);
		}
		{
			$GLOBALS['%s']->pop();
			return $index;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'thx.culture.FormatDate'; }
}
function thx_culture_FormatDate_0(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s = "" . _hx_string_rec($date->getDate(), "");
		if(strlen("0") === 0 || strlen($s) >= 2) {
			return $s;
		} else {
			return str_pad($s, Math::ceil((2 - strlen($s)) / strlen("0")) * strlen("0") + strlen($s), "0", STR_PAD_LEFT);
		}
		unset($s);
	}
}
function thx_culture_FormatDate_1(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s1 = "" . _hx_string_rec($date->getDate(), "");
		if(strlen(" ") === 0 || strlen($s1) >= 2) {
			return $s1;
		} else {
			return str_pad($s1, Math::ceil((2 - strlen($s1)) / strlen(" ")) * strlen(" ") + strlen($s1), " ", STR_PAD_LEFT);
		}
		unset($s1);
	} else {
		return "" . _hx_string_rec($date->getDate(), "");
	}
}
function thx_culture_FormatDate_2(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s2 = "" . _hx_string_rec(($date->getMonth() + 1), "");
		if(strlen(" ") === 0 || strlen($s2) >= 2) {
			return $s2;
		} else {
			return str_pad($s2, Math::ceil((2 - strlen($s2)) / strlen(" ")) * strlen(" ") + strlen($s2), " ", STR_PAD_LEFT);
		}
		unset($s2);
	} else {
		return "" . _hx_string_rec(($date->getMonth() + 1), "");
	}
}
function thx_culture_FormatDate_3(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s3 = "" . _hx_string_rec($date->getHours(), "");
		if(strlen("0") === 0 || strlen($s3) >= 2) {
			return $s3;
		} else {
			return str_pad($s3, Math::ceil((2 - strlen($s3)) / strlen("0")) * strlen("0") + strlen($s3), "0", STR_PAD_LEFT);
		}
		unset($s3);
	}
}
function thx_culture_FormatDate_4(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s4 = "" . _hx_string_rec($date->getMinutes(), "");
		if(strlen(" ") === 0 || strlen($s4) >= 2) {
			return $s4;
		} else {
			return str_pad($s4, Math::ceil((2 - strlen($s4)) / strlen(" ")) * strlen(" ") + strlen($s4), " ", STR_PAD_LEFT);
		}
		unset($s4);
	} else {
		return "" . _hx_string_rec($date->getMinutes(), "");
	}
}
function thx_culture_FormatDate_5(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s5 = "" . _hx_string_rec(thx_culture_FormatDate::getMHours($date), "");
		if(strlen("0") === 0 || strlen($s5) >= 2) {
			return $s5;
		} else {
			return str_pad($s5, Math::ceil((2 - strlen($s5)) / strlen("0")) * strlen("0") + strlen($s5), "0", STR_PAD_LEFT);
		}
		unset($s5);
	}
}
function thx_culture_FormatDate_6(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s6 = "" . _hx_string_rec($date->getHours(), "");
		if(strlen(" ") === 0 || strlen($s6) >= 2) {
			return $s6;
		} else {
			return str_pad($s6, Math::ceil((2 - strlen($s6)) / strlen(" ")) * strlen(" ") + strlen($s6), " ", STR_PAD_LEFT);
		}
		unset($s6);
	} else {
		return "" . _hx_string_rec($date->getHours(), "");
	}
}
function thx_culture_FormatDate_7(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s7 = "" . _hx_string_rec(thx_culture_FormatDate::getMHours($date), "");
		if(strlen(" ") === 0 || strlen($s7) >= 2) {
			return $s7;
		} else {
			return str_pad($s7, Math::ceil((2 - strlen($s7)) / strlen(" ")) * strlen(" ") + strlen($s7), " ", STR_PAD_LEFT);
		}
		unset($s7);
	} else {
		return "" . _hx_string_rec(thx_culture_FormatDate::getMHours($date), "");
	}
}
function thx_culture_FormatDate_8(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s8 = "" . _hx_string_rec(($date->getMonth() + 1), "");
		if(strlen("0") === 0 || strlen($s8) >= 2) {
			return $s8;
		} else {
			return str_pad($s8, Math::ceil((2 - strlen($s8)) / strlen("0")) * strlen("0") + strlen($s8), "0", STR_PAD_LEFT);
		}
		unset($s8);
	}
}
function thx_culture_FormatDate_9(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s9 = "" . _hx_string_rec($date->getMinutes(), "");
		if(strlen("0") === 0 || strlen($s9) >= 2) {
			return $s9;
		} else {
			return str_pad($s9, Math::ceil((2 - strlen($s9)) / strlen("0")) * strlen("0") + strlen($s9), "0", STR_PAD_LEFT);
		}
		unset($s9);
	}
}
function thx_culture_FormatDate_10(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($date->getHours() > 11) {
		return $info->pm;
	} else {
		return $info->am;
	}
}
function thx_culture_FormatDate_11(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($date->getHours() > 11) {
		return $info->pm;
	} else {
		return $info->am;
	}
}
function thx_culture_FormatDate_12(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($leadingspace) {
		$s10 = "" . _hx_string_rec($date->getSeconds(), "");
		if(strlen(" ") === 0 || strlen($s10) >= 2) {
			return $s10;
		} else {
			return str_pad($s10, Math::ceil((2 - strlen($s10)) / strlen(" ")) * strlen(" ") + strlen($s10), " ", STR_PAD_LEFT);
		}
		unset($s10);
	} else {
		return "" . _hx_string_rec($date->getSeconds(), "");
	}
}
function thx_culture_FormatDate_13(&$buf, &$c, &$culture, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	{
		$s11 = "" . _hx_string_rec($date->getSeconds(), "");
		if(strlen("0") === 0 || strlen($s11) >= 2) {
			return $s11;
		} else {
			return str_pad($s11, Math::ceil((2 - strlen($s11)) / strlen("0")) * strlen("0") + strlen($s11), "0", STR_PAD_LEFT);
		}
		unset($s11);
	}
}
function thx_culture_FormatDate_14(&$buf, &$c, &$culture, &$d, &$date, &$info, &$leadingspace, &$len, &$pattern, &$pos) {
	if($d === 0) {
		return "7";
	} else {
		return "" . _hx_string_rec($d, "");
	}
}
function thx_culture_FormatDate_15(&$culture, &$firstDayOfWk, &$weekDayName, $d) {
	{
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayNumFromName@363");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = strtolower($d);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function thx_culture_FormatDate_16(&$culture, &$dayNames, &$firstDayOfWk, &$weekDayName, $d1) {
	{
		$GLOBALS['%s']->push("thx.culture.FormatDate::weekDayNumFromName@364");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = strtolower($d1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
