<?php

class DateTools {
	public function __construct(){}
	static $DAYS_OF_MONTH;
	static function getMonthDays($d) {
		$GLOBALS['%s']->push("DateTools::getMonthDays");
		$__hx__spos = $GLOBALS['%s']->length;
		$month = $d->getMonth();
		$year = $d->getFullYear();
		if($month !== 1) {
			$tmp = DateTools::$DAYS_OF_MONTH[$month];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$isB = _hx_mod($year, 4) === 0 && _hx_mod($year, 100) !== 0 || _hx_mod($year, 400) === 0;
		if($isB) {
			$GLOBALS['%s']->pop();
			return 29;
		} else {
			$GLOBALS['%s']->pop();
			return 28;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'DateTools'; }
}
DateTools::$DAYS_OF_MONTH = (new _hx_array(array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)));
