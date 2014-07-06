<?php

class Dates {
	public function __construct(){}
	static function format($d, $param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Dates::format");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Dates::formatf($param, $params, $culture), array($d));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Dates::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "D");
		$format = $params->shift();
		switch($format) {
		case "D":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "DS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "DST":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_2"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "DSTS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "DTS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_4"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "Y":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_5"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "YM":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_6"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "M":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_7"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "MN":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_8"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "MS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_9"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "MD":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_10"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "MDS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_11"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "WD":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_12"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "WDN":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_13"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "WDS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_14"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "R":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_15"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "DT":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_16"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "U":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_17"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "S":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_18"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "T":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_19"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "TS":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_20"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "C":{
			$f = $params[0];
			if(null === $f) {
				$tmp = array(new _hx_lambda(array(&$culture, &$f, &$format, &$param, &$params), "Dates_21"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$tmp = array(new _hx_lambda(array(&$culture, &$f, &$format, &$param, &$params), "Dates_22"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		default:{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Dates_23"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($f, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Dates::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Dates::interpolatef($a, $b, $equation), array($f));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Dates::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		$f = Floats::interpolatef($a->getTime(), $b->getTime(), $equation);
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$f), "Dates_24"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function snap($time, $period, $mode = null) {
		$GLOBALS['%s']->push("Dates::snap");
		$__hx__spos = $GLOBALS['%s']->length;
		if($mode === null) {
			$mode = SnapMode::$Round;
		}
		switch($mode->index) {
		case 1:{
			switch($period->index) {
			case 0:{
				$tmp = Math::floor($time / 1000.0) * 1000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 1:{
				$tmp = Math::floor($time / 60000.0) * 60000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 2:{
				$tmp = Math::floor($time / 3600000.0) * 3600000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$d = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d->getFullYear(), $d->getMonth(), $d->getDate(), 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 4:{
				$tmp = Math::floor($time / 604800000.) * 604800000.;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 5:{
				$d1 = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d1->getFullYear(), $d1->getMonth(), 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 6:{
				$d2 = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d2->getFullYear(), 0, 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			}
		}break;
		case 0:{
			switch($period->index) {
			case 0:{
				$tmp = Math::ceil($time / 1000.0) * 1000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 1:{
				$tmp = Math::ceil($time / 60000.0) * 60000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 2:{
				$tmp = Math::ceil($time / 3600000.0) * 3600000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$d3 = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d3->getFullYear(), $d3->getMonth(), $d3->getDate() + 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 4:{
				$tmp = Math::ceil($time / 604800000.) * 604800000.;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 5:{
				$d4 = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d4->getFullYear(), $d4->getMonth() + 1, 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 6:{
				$d5 = Date::fromTime($time);
				{
					$tmp = _hx_deref(new Date($d5->getFullYear() + 1, 0, 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			}
		}break;
		case 2:{
			switch($period->index) {
			case 0:{
				$tmp = Math::round($time / 1000.0) * 1000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 1:{
				$tmp = Math::round($time / 60000.0) * 60000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 2:{
				$tmp = Math::round($time / 3600000.0) * 3600000.0;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$d6 = Date::fromTime($time);
				$mod = null;
				if($d6->getHours() >= 12) {
					$mod = 1;
				} else {
					$mod = 0;
				}
				{
					$tmp = _hx_deref(new Date($d6->getFullYear(), $d6->getMonth(), $d6->getDate() + $mod, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 4:{
				$tmp = Math::round($time / 604800000.) * 604800000.;
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 5:{
				$d7 = Date::fromTime($time);
				$mod1 = null;
				if($d7->getDate() > Math::round(DateTools::getMonthDays($d7) / 2)) {
					$mod1 = 1;
				} else {
					$mod1 = 0;
				}
				{
					$tmp = _hx_deref(new Date($d7->getFullYear(), $d7->getMonth() + $mod1, 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 6:{
				$d8 = Date::fromTime($time);
				$mod2 = null;
				if($time > _hx_deref(new Date($d8->getFullYear(), 6, 2, 0, 0, 0))->getTime()) {
					$mod2 = 1;
				} else {
					$mod2 = 0;
				}
				{
					$tmp = _hx_deref(new Date($d8->getFullYear() + $mod2, 0, 1, 0, 0, 0))->getTime();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function snapToWeekDay($time, $day, $snapMode = null, $firstDayOfWk = null) {
		$GLOBALS['%s']->push("Dates::snapToWeekDay");
		$__hx__spos = $GLOBALS['%s']->length;
		if($snapMode === null) {
			$snapMode = SnapMode::$Round;
		}
		if($firstDayOfWk === null) {
			$firstDayOfWk = 0;
		}
		$d = Date::fromTime($time)->getDay();
		$s = $day;
		if($s === -1) {
			throw new HException(new thx_error_Error("unknown week day '{0}'", null, $day, _hx_anonymous(array("fileName" => "Dates.hx", "lineNumber" => 251, "className" => "Dates", "methodName" => "snapToWeekDay"))));
		}
		switch($snapMode->index) {
		case 1:{
			if($s > $d) {
				$s = $s - 7;
			}
			{
				$tmp = $time - ($d - $s) * 24 * 60 * 60 * 1000;
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 0:{
			if($s < $d) {
				$s = $s + 7;
			}
			{
				$tmp = $time + ($s - $d) * 24 * 60 * 60 * 1000;
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 2:{
			if($s < $firstDayOfWk) {
				$s = $s + 7;
			}
			if($d < $firstDayOfWk) {
				$d = $d + 7;
			}
			{
				$tmp = $time + ($s - $d) * 24 * 60 * 60 * 1000;
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function isLeapYear($year) {
		$GLOBALS['%s']->push("Dates::isLeapYear");
		$__hx__spos = $GLOBALS['%s']->length;
		if(_hx_mod($year, 4) !== 0) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if(_hx_mod($year, 100) === 0) {
			$tmp = _hx_mod($year, 400) === 0;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static function isInLeapYear($d) {
		$GLOBALS['%s']->push("Dates::isInLeapYear");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::isLeapYear($d->getFullYear());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function numDaysInMonth($month, $year) {
		$GLOBALS['%s']->push("Dates::numDaysInMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($month) {
		case 0:case 2:case 4:case 6:case 7:case 9:case 11:{
			$GLOBALS['%s']->pop();
			return 31;
		}break;
		case 3:case 5:case 8:case 10:{
			$GLOBALS['%s']->pop();
			return 30;
		}break;
		case 1:{
			if(Dates::isLeapYear($year)) {
				$GLOBALS['%s']->pop();
				return 29;
			} else {
				$GLOBALS['%s']->pop();
				return 28;
			}
		}break;
		default:{
			throw new HException(new thx_error_Error("Invalid month '{0}'.  Month should be a number, Jan=0, Dec=11", null, $month, _hx_anonymous(array("fileName" => "Dates.hx", "lineNumber" => 316, "className" => "Dates", "methodName" => "numDaysInMonth"))));
			{
				$GLOBALS['%s']->pop();
				return 0;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function numDaysInThisMonth($d) {
		$GLOBALS['%s']->push("Dates::numDaysInThisMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::numDaysInMonth($d->getMonth(), $d->getFullYear());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dateBasedDelta($d, $yearDelta = null, $monthDelta = null, $dayDelta = null, $hourDelta = null, $minDelta = null, $secDelta = null, $msDelta = null) {
		$GLOBALS['%s']->push("Dates::dateBasedDelta");
		$__hx__spos = $GLOBALS['%s']->length;
		if($msDelta === null) {
			$msDelta = 0;
		}
		if($secDelta === null) {
			$secDelta = 0;
		}
		if($minDelta === null) {
			$minDelta = 0;
		}
		if($hourDelta === null) {
			$hourDelta = 0;
		}
		if($dayDelta === null) {
			$dayDelta = 0;
		}
		if($monthDelta === null) {
			$monthDelta = 0;
		}
		if($yearDelta === null) {
			$yearDelta = 0;
		}
		$year = $d->getFullYear() + $yearDelta;
		$month = $d->getMonth() + $monthDelta;
		$day = $d->getDate() + $dayDelta;
		$hour = $d->getHours() + $hourDelta;
		$min = $d->getMinutes() + $minDelta;
		$sec = $d->getSeconds() + $secDelta;
		while($sec > 60) {
			$sec -= 60;
			$min++;
		}
		while($min > 60) {
			$min -= 60;
			$hour++;
		}
		while($hour > 23) {
			$hour -= 24;
			$day++;
		}
		while($hour > 23) {
			$hour -= 24;
			$day++;
		}
		$daysInMonth = Dates::numDaysInMonth($month, $year);
		while($day > $daysInMonth || $month > 11) {
			if($day > $daysInMonth) {
				$day -= $daysInMonth;
				$month++;
			}
			if($month > 11) {
				$month -= 12;
				$year++;
			}
			$daysInMonth = Dates::numDaysInMonth($month, $year);
		}
		$d1 = new Date($year, $month, $day, $hour, $min, $sec);
		{
			$tmp = Date::fromTime($d1->getTime() + $msDelta);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaSec($d, $numSec) {
		$GLOBALS['%s']->push("Dates::deltaSec");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Date::fromTime($d->getTime() + $numSec * 1000);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaMin($d, $numMin) {
		$GLOBALS['%s']->push("Dates::deltaMin");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Date::fromTime($d->getTime() + $numMin * 60 * 1000);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaHour($d, $numHrs) {
		$GLOBALS['%s']->push("Dates::deltaHour");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Date::fromTime($d->getTime() + $numHrs * 60 * 60 * 1000);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaDay($d, $numDays) {
		$GLOBALS['%s']->push("Dates::deltaDay");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, $numDays, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaWeek($d, $numWks) {
		$GLOBALS['%s']->push("Dates::deltaWeek");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, $numWks * 7, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaMonth($d, $numMonths) {
		$GLOBALS['%s']->push("Dates::deltaMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, $numMonths, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function deltaYear($d, $numYrs) {
		$GLOBALS['%s']->push("Dates::deltaYear");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, $numYrs, null, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function prevYear($d) {
		$GLOBALS['%s']->push("Dates::prevYear");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, -1, null, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function nextYear($d) {
		$GLOBALS['%s']->push("Dates::nextYear");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 1, null, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function prevMonth($d) {
		$GLOBALS['%s']->push("Dates::prevMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, -1, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function nextMonth($d) {
		$GLOBALS['%s']->push("Dates::nextMonth");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 1, null, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function prevWeek($d) {
		$GLOBALS['%s']->push("Dates::prevWeek");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, -7, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function nextWeek($d) {
		$GLOBALS['%s']->push("Dates::nextWeek");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, 7, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function prevDay($d) {
		$GLOBALS['%s']->push("Dates::prevDay");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, -1, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function nextDay($d) {
		$GLOBALS['%s']->push("Dates::nextDay");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::dateBasedDelta($d, 0, 0, 1, null, null, null, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $_reparse;
	static function canParse($s) {
		$GLOBALS['%s']->push("Dates::canParse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Dates::$_reparse->match($s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function parse($s) {
		$GLOBALS['%s']->push("Dates::parse");
		$__hx__spos = $GLOBALS['%s']->length;
		$parts = _hx_explode(".", $s);
		$date = Date::fromString(Dates_25($parts, $s));
		if($parts->length > 1) {
			$date = Date::fromTime($date->getTime() + Std::parseInt($parts[1]));
		}
		{
			$GLOBALS['%s']->pop();
			return $date;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Dates::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		$a1 = $a->getTime();
		$b1 = $b->getTime();
		if($a1 < $b1) {
			$GLOBALS['%s']->pop();
			return -1;
		} else {
			if($a1 > $b1) {
				$GLOBALS['%s']->pop();
				return 1;
			} else {
				$GLOBALS['%s']->pop();
				return 0;
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Dates'; }
}
Dates::$_reparse = new EReg("^\\d{4}-\\d\\d-\\d\\d(( |T)\\d\\d:\\d\\d(:\\d\\d(\\.\\d{1,3})?)?)?Z?\$", "");
function Dates_0(&$culture, &$format, &$param, &$params, $d) {
	{
		$GLOBALS['%s']->push("Dates::formatf@81");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::date($d, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_1(&$culture, &$format, &$param, &$params, $d1) {
	{
		$GLOBALS['%s']->push("Dates::formatf@83");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::dateShort($d1, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_2(&$culture, &$format, &$param, &$params, $d2) {
	{
		$GLOBALS['%s']->push("Dates::formatf@85");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::dateShort($d2, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::time($d2, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_3(&$culture, &$format, &$param, &$params, $d3) {
	{
		$GLOBALS['%s']->push("Dates::formatf@87");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::dateShort($d3, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d3, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_4(&$culture, &$format, &$param, &$params, $d4) {
	{
		$GLOBALS['%s']->push("Dates::formatf@89");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null(thx_culture_FormatDate::date($d4, $culture)) . " " . _hx_string_or_null(thx_culture_FormatDate::timeShort($d4, $culture));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_5(&$culture, &$format, &$param, &$params, $d5) {
	{
		$GLOBALS['%s']->push("Dates::formatf@91");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::year($d5, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_6(&$culture, &$format, &$param, &$params, $d6) {
	{
		$GLOBALS['%s']->push("Dates::formatf@93");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::yearMonth($d6, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_7(&$culture, &$format, &$param, &$params, $d7) {
	{
		$GLOBALS['%s']->push("Dates::formatf@95");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::month($d7, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_8(&$culture, &$format, &$param, &$params, $d8) {
	{
		$GLOBALS['%s']->push("Dates::formatf@97");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::monthName($d8, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_9(&$culture, &$format, &$param, &$params, $d9) {
	{
		$GLOBALS['%s']->push("Dates::formatf@99");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::monthNameShort($d9, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_10(&$culture, &$format, &$param, &$params, $d10) {
	{
		$GLOBALS['%s']->push("Dates::formatf@101");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::monthDay($d10, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_11(&$culture, &$format, &$param, &$params, $d11) {
	{
		$GLOBALS['%s']->push("Dates::formatf@103");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::monthDayShort($d11, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_12(&$culture, &$format, &$param, &$params, $d12) {
	{
		$GLOBALS['%s']->push("Dates::formatf@105");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::weekDay($d12, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_13(&$culture, &$format, &$param, &$params, $d13) {
	{
		$GLOBALS['%s']->push("Dates::formatf@107");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::weekDayName($d13, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_14(&$culture, &$format, &$param, &$params, $d14) {
	{
		$GLOBALS['%s']->push("Dates::formatf@109");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::weekDayNameShort($d14, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_15(&$culture, &$format, &$param, &$params, $d15) {
	{
		$GLOBALS['%s']->push("Dates::formatf@111");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::dateRfc($d15, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_16(&$culture, &$format, &$param, &$params, $d16) {
	{
		$GLOBALS['%s']->push("Dates::formatf@113");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::dateTime($d16, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_17(&$culture, &$format, &$param, &$params, $d17) {
	{
		$GLOBALS['%s']->push("Dates::formatf@115");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::universal($d17, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_18(&$culture, &$format, &$param, &$params, $d18) {
	{
		$GLOBALS['%s']->push("Dates::formatf@117");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::sortable($d18, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_19(&$culture, &$format, &$param, &$params, $d19) {
	{
		$GLOBALS['%s']->push("Dates::formatf@119");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::time($d19, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_20(&$culture, &$format, &$param, &$params, $d20) {
	{
		$GLOBALS['%s']->push("Dates::formatf@121");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::timeShort($d20, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_21(&$culture, &$f, &$format, &$param, &$params, $d21) {
	{
		$GLOBALS['%s']->push("Dates::formatf@125");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::date($d21, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_22(&$culture, &$f, &$format, &$param, &$params, $d22) {
	{
		$GLOBALS['%s']->push("Dates::formatf@127");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::format($d22, $f, $culture, Dates_26($culture, $d22, $f, $format, $param, $params));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_23(&$culture, &$format, &$param, &$params, $d23) {
	{
		$GLOBALS['%s']->push("Dates::formatf@130");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_FormatDate::format($d23, $format, $culture, Dates_27($culture, $d23, $format, $param, $params));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dates_24(&$a, &$b, &$equation, &$f, $v) {
	{
		$GLOBALS['%s']->push("Dates::interpolatef@142");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Date::fromTime(call_user_func_array($f, array($v)));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
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
