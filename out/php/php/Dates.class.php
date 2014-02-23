<?php

class Dates {
	public function __construct(){}
	static function format($d, $param = null, $params = null, $culture = null) {
		return call_user_func_array(Dates::formatf($param, $params, $culture), array($d));
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$params = thx_culture_FormatParams::params($param, $params, "D");
		$format = $params->shift();
		switch($format) {
		case "D":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_0"), 'execute');
		}break;
		case "DS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_1"), 'execute');
		}break;
		case "DST":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_2"), 'execute');
		}break;
		case "DSTS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_3"), 'execute');
		}break;
		case "DTS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_4"), 'execute');
		}break;
		case "Y":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_5"), 'execute');
		}break;
		case "YM":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_6"), 'execute');
		}break;
		case "M":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_7"), 'execute');
		}break;
		case "MN":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_8"), 'execute');
		}break;
		case "MS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_9"), 'execute');
		}break;
		case "MD":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_10"), 'execute');
		}break;
		case "MDS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_11"), 'execute');
		}break;
		case "WD":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_12"), 'execute');
		}break;
		case "WDN":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_13"), 'execute');
		}break;
		case "WDS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_14"), 'execute');
		}break;
		case "R":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_15"), 'execute');
		}break;
		case "DT":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_16"), 'execute');
		}break;
		case "U":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_17"), 'execute');
		}break;
		case "S":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_18"), 'execute');
		}break;
		case "T":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_19"), 'execute');
		}break;
		case "TS":{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_20"), 'execute');
		}break;
		case "C":{
			$f = $params[0];
			if(null === $f) {
				return array(new _hx_lambda(array(&$culture, &$f, &$format, &$param, &$params), "Dates_21"), 'execute');
			} else {
				return array(new _hx_lambda(array(&$culture, &$f, &$format, &$param, &$params), "Dates_22"), 'execute');
			}
		}break;
		default:{
			return array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_23"), 'execute');
		}break;
		}
	}
	static function interpolate($f, $a, $b, $equation = null) {
		return call_user_func_array(Dates::interpolatef($a, $b, $equation), array($f));
	}
	static function interpolatef($a, $b, $equation = null) {
		$f = Floats::interpolatef($a->getTime(), $b->getTime(), $equation);
		return array(new _hx_lambda(array(&$a, &$b, &$equation, &$f), "Dates_24"), 'execute');
	}
	static function snap($time, $period, $mode = null) {
		if($mode === null) {
			$mode = 0;
		}
		if($mode < 0) {
			switch($period) {
			case "second":{
				return Math::floor($time / 1000.0) * 1000.0;
			}break;
			case "minute":{
				return Math::floor($time / 60000.0) * 60000.0;
			}break;
			case "hour":{
				return Math::floor($time / 3600000.0) * 3600000.0;
			}break;
			case "day":{
				$d = Date::fromTime($time);
				return _hx_deref(new Date($d->getFullYear(), $d->getMonth(), $d->getDate(), 0, 0, 0))->getTime();
			}break;
			case "week":{
				return Math::floor($time / 604800000.) * 604800000.;
			}break;
			case "month":{
				$d1 = Date::fromTime($time);
				return _hx_deref(new Date($d1->getFullYear(), $d1->getMonth(), 1, 0, 0, 0))->getTime();
			}break;
			case "year":{
				$d2 = Date::fromTime($time);
				return _hx_deref(new Date($d2->getFullYear(), 0, 1, 0, 0, 0))->getTime();
			}break;
			default:{
				return 0;
			}break;
			}
		} else {
			if($mode > 0) {
				switch($period) {
				case "second":{
					return Math::ceil($time / 1000.0) * 1000.0;
				}break;
				case "minute":{
					return Math::ceil($time / 60000.0) * 60000.0;
				}break;
				case "hour":{
					return Math::ceil($time / 3600000.0) * 3600000.0;
				}break;
				case "day":{
					$d3 = Date::fromTime($time);
					return _hx_deref(new Date($d3->getFullYear(), $d3->getMonth(), $d3->getDate() + 1, 0, 0, 0))->getTime();
				}break;
				case "week":{
					return Math::ceil($time / 604800000.) * 604800000.;
				}break;
				case "month":{
					$d4 = Date::fromTime($time);
					return _hx_deref(new Date($d4->getFullYear(), $d4->getMonth() + 1, 1, 0, 0, 0))->getTime();
				}break;
				case "year":{
					$d5 = Date::fromTime($time);
					return _hx_deref(new Date($d5->getFullYear() + 1, 0, 1, 0, 0, 0))->getTime();
				}break;
				default:{
					return 0;
				}break;
				}
			} else {
				switch($period) {
				case "second":{
					return Math::round($time / 1000.0) * 1000.0;
				}break;
				case "minute":{
					return Math::round($time / 60000.0) * 60000.0;
				}break;
				case "hour":{
					return Math::round($time / 3600000.0) * 3600000.0;
				}break;
				case "day":{
					$d6 = Date::fromTime($time);
					$mod = null;
					if($d6->getHours() >= 12) {
						$mod = 1;
					} else {
						$mod = 0;
					}
					return _hx_deref(new Date($d6->getFullYear(), $d6->getMonth(), $d6->getDate() + $mod, 0, 0, 0))->getTime();
				}break;
				case "week":{
					return Math::round($time / 604800000.) * 604800000.;
				}break;
				case "month":{
					$d7 = Date::fromTime($time);
					$mod1 = null;
					if($d7->getDate() > Math::round(DateTools::getMonthDays($d7) / 2)) {
						$mod1 = 1;
					} else {
						$mod1 = 0;
					}
					return _hx_deref(new Date($d7->getFullYear(), $d7->getMonth() + $mod1, 1, 0, 0, 0))->getTime();
				}break;
				case "year":{
					$d8 = Date::fromTime($time);
					$mod2 = null;
					if($time > _hx_deref(new Date($d8->getFullYear(), 6, 2, 0, 0, 0))->getTime()) {
						$mod2 = 1;
					} else {
						$mod2 = 0;
					}
					return _hx_deref(new Date($d8->getFullYear() + $mod2, 0, 1, 0, 0, 0))->getTime();
				}break;
				default:{
					return 0;
				}break;
				}
			}
		}
	}
	static function snapToWeekDay($time, $day, $mode = null, $firstDayOfWk = null) {
		if($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		if($mode === null) {
			$mode = 0;
		}
		$d = Date::fromTime($time)->getDay();
		$s = thx_culture_FormatDate::weekDayNumFromName($day, null, null);
		if($s === -1) {
			throw new HException(new thx_error_Error("unknown week day '{0}'", null, $day, _hx_anonymous(array("fileName" => "Dates.hx", "lineNumber" => 255, "className" => "Dates", "methodName" => "snapToWeekDay"))));
		}
		if($mode < 0) {
			if($s > $d) {
				$s = $s - 7;
			}
			return $time - ($d - $s) * 24 * 60 * 60 * 1000;
		} else {
			if($mode > 0) {
				if($s < $d) {
					$s = $s + 7;
				}
				return $time + ($s - $d) * 24 * 60 * 60 * 1000;
			} else {
				if($s < $firstDayOfWk) {
					$s = $s + 7;
				}
				if($d < $firstDayOfWk) {
					$d = $d + 7;
				}
				return $time + ($s - $d) * 24 * 60 * 60 * 1000;
			}
		}
	}
	static function isLeapYear($year) {
		if(_hx_mod($year, 4) !== 0) {
			return false;
		}
		if(_hx_mod($year, 100) === 0) {
			return _hx_mod($year, 400) === 0;
		}
		return true;
	}
	static function isInLeapYear($d) {
		return Dates::isLeapYear($d->getFullYear());
	}
	static function numDaysInMonth($month, $year) {
		switch($month) {
		case 0:case 2:case 4:case 6:case 7:case 9:case 11:{
			return 31;
		}break;
		case 3:case 5:case 8:case 10:{
			return 30;
		}break;
		case 1:{
			if(Dates::isLeapYear($year)) {
				return 29;
			} else {
				return 28;
			}
		}break;
		default:{
			throw new HException(new thx_error_Error("Invalid month '{0}'.  Month should be a number, Jan=0, Dec=11", null, $month, _hx_anonymous(array("fileName" => "Dates.hx", "lineNumber" => 323, "className" => "Dates", "methodName" => "numDaysInMonth"))));
			return 0;
		}break;
		}
	}
	static function numDaysInThisMonth($d) {
		return Dates::numDaysInMonth($d->getMonth(), $d->getFullYear());
	}
	static function deltaSec($d, $numSec) {
		return Date::fromTime($d->getTime() + $numSec * 1000);
	}
	static function deltaMin($d, $numMin) {
		return Date::fromTime($d->getTime() + $numMin * 60 * 1000);
	}
	static function deltaHour($d, $numHrs) {
		return Date::fromTime($d->getTime() + $numHrs * 60 * 60 * 1000);
	}
	static function deltaDay($d, $numDays) {
		return Date::fromTime($d->getTime() + $numDays * 24 * 60 * 60 * 1000);
	}
	static function deltaWeek($d, $numWks) {
		return Date::fromTime($d->getTime() + $numWks * 7 * 24 * 60 * 60 * 1000);
	}
	static function deltaMonth($d, $numMonths) {
		$newM = $d->getMonth() + $numMonths;
		$newY = $d->getFullYear();
		while($newM > 11) {
			$newM = $newM - 12;
			$newY++;
		}
		while($newM < 0) {
			$newM = $newM + 12;
			$newY--;
		}
		return new Date($newY, $newM, $d->getDate(), $d->getHours(), $d->getMinutes(), $d->getSeconds());
	}
	static function deltaYear($d, $numYrs) {
		$newY = $d->getFullYear() + $numYrs;
		return new Date($newY, $d->getMonth(), $d->getDate(), $d->getHours(), $d->getMinutes(), $d->getSeconds());
	}
	static function prevYear($d) {
		return Dates::deltaYear($d, -1);
	}
	static function nextYear($d) {
		return Dates::deltaYear($d, 1);
	}
	static function prevMonth($d) {
		return Dates::deltaMonth($d, -1);
	}
	static function nextMonth($d) {
		return Dates::deltaMonth($d, 1);
	}
	static function prevWeek($d) {
		return Date::fromTime($d->getTime() + -604800000);
	}
	static function nextWeek($d) {
		return Date::fromTime($d->getTime() + 604800000);
	}
	static function prevDay($d) {
		return Date::fromTime($d->getTime() + -86400000);
	}
	static function nextDay($d) {
		return Date::fromTime($d->getTime() + 86400000);
	}
	static $_reparse;
	static function canParse($s) {
		return Dates::$_reparse->match($s);
	}
	static function parse($s) {
		$parts = _hx_explode(".", $s);
		$date = Date::fromString(Dates_25($parts, $s));
		if($parts->length > 1) {
			$date = Date::fromTime($date->getTime() + Std::parseInt($parts[1]));
		}
		return $date;
	}
	static function compare($a, $b) {
		$b1 = $b->getTime();
		$a1 = $a->getTime();
		if($a1 < $b1) {
			return -1;
		} else {
			if($a1 > $b1) {
				return 1;
			} else {
				return 0;
			}
		}
	}
	function __toString() { return 'Dates'; }
}
Dates::$_reparse = new EReg("^\\d{4}-\\d\\d-\\d\\d(( |T)\\d\\d:\\d\\d(:\\d\\d(\\.\\d{1,3})?)?)?Z?\$", "");
function Dates_0(&$culture, &$format, &$param, &$params, $d) {
	{
		return thx_culture_FormatDate::date($d, $culture);
	}
}
function Dates_1(&$culture, &$format, &$param, &$params, $d1) {
	{
		return thx_culture_FormatDate::dateShort($d1, $culture);
	}
}
function Dates_2(&$culture, &$format, &$param, &$params, $d2) {
	{
		return _hx_string_or_null(thx_culture_FormatDate::dateShort($d2, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::time($d2, $culture));
	}
}
function Dates_3(&$culture, &$format, &$param, &$params, $d3) {
	{
		return _hx_string_or_null(thx_culture_FormatDate::dateShort($d3, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d3, $culture));
	}
}
function Dates_4(&$culture, &$format, &$param, &$params, $d4) {
	{
		return _hx_string_or_null(thx_culture_FormatDate::date($d4, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d4, $culture));
	}
}
function Dates_5(&$culture, &$format, &$param, &$params, $d5) {
	{
		return thx_culture_FormatDate::year($d5, $culture);
	}
}
function Dates_6(&$culture, &$format, &$param, &$params, $d6) {
	{
		return thx_culture_FormatDate::yearMonth($d6, $culture);
	}
}
function Dates_7(&$culture, &$format, &$param, &$params, $d7) {
	{
		return thx_culture_FormatDate::month($d7, $culture);
	}
}
function Dates_8(&$culture, &$format, &$param, &$params, $d8) {
	{
		return thx_culture_FormatDate::monthName($d8, $culture);
	}
}
function Dates_9(&$culture, &$format, &$param, &$params, $d9) {
	{
		return thx_culture_FormatDate::monthNameShort($d9, $culture);
	}
}
function Dates_10(&$culture, &$format, &$param, &$params, $d10) {
	{
		return thx_culture_FormatDate::monthDay($d10, $culture);
	}
}
function Dates_11(&$culture, &$format, &$param, &$params, $d11) {
	{
		return thx_culture_FormatDate::monthDayShort($d11, $culture);
	}
}
function Dates_12(&$culture, &$format, &$param, &$params, $d12) {
	{
		return thx_culture_FormatDate::weekDay($d12, $culture);
	}
}
function Dates_13(&$culture, &$format, &$param, &$params, $d13) {
	{
		return thx_culture_FormatDate::weekDayName($d13, $culture);
	}
}
function Dates_14(&$culture, &$format, &$param, &$params, $d14) {
	{
		return thx_culture_FormatDate::weekDayNameShort($d14, $culture);
	}
}
function Dates_15(&$culture, &$format, &$param, &$params, $d15) {
	{
		return thx_culture_FormatDate::dateRfc($d15, $culture);
	}
}
function Dates_16(&$culture, &$format, &$param, &$params, $d16) {
	{
		return thx_culture_FormatDate::dateTime($d16, $culture);
	}
}
function Dates_17(&$culture, &$format, &$param, &$params, $d17) {
	{
		return thx_culture_FormatDate::universal($d17, $culture);
	}
}
function Dates_18(&$culture, &$format, &$param, &$params, $d18) {
	{
		return thx_culture_FormatDate::sortable($d18, $culture);
	}
}
function Dates_19(&$culture, &$format, &$param, &$params, $d19) {
	{
		return thx_culture_FormatDate::time($d19, $culture);
	}
}
function Dates_20(&$culture, &$format, &$param, &$params, $d20) {
	{
		return thx_culture_FormatDate::timeShort($d20, $culture);
	}
}
function Dates_21(&$culture, &$f, &$format, &$param, &$params, $d21) {
	{
		return thx_culture_FormatDate::date($d21, $culture);
	}
}
function Dates_22(&$culture, &$f, &$format, &$param, &$params, $d22) {
	{
		return thx_culture_FormatDate::format($d22, $f, $culture, Dates_26($culture, $d22, $f, $format, $param, $params));
	}
}
function Dates_23(&$culture, &$format, &$param, &$params, $d23) {
	{
		return thx_culture_FormatDate::format($d23, $format, $culture, Dates_27($culture, $d23, $format, $param, $params));
	}
}
function Dates_24(&$a, &$b, &$equation, &$f, $v) {
	{
		return Date::fromTime(call_user_func_array($f, array($v)));
	}
}
function Dates_25(&$parts, &$s) {
	{
		$s1 = $parts[0];
		return str_replace("T", " ", $s1);
	}
}
function Dates_26(&$culture, &$d22, &$f, &$format, &$param, &$params) {
	if($params[1] !== null) {
		return $params[1] === "true";
	} else {
		return true;
	}
}
function Dates_27(&$culture, &$d23, &$format, &$param, &$params) {
	if($params[0] !== null) {
		return $params[0] === "true";
	} else {
		return true;
	}
}
