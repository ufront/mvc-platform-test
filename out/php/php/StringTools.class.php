<?php

class StringTools {
	public function __construct(){}
	static function startsWith($s, $start) {
		$GLOBALS['%s']->push("StringTools::startsWith");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = strlen($s) >= strlen($start) && _hx_substr($s, 0, strlen($start)) === $start;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function endsWith($s, $end) {
		$GLOBALS['%s']->push("StringTools::endsWith");
		$__hx__spos = $GLOBALS['%s']->length;
		$elen = strlen($end);
		$slen = strlen($s);
		{
			$tmp = $slen >= $elen && _hx_substr($s, $slen - $elen, $elen) === $end;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isSpace($s, $pos) {
		$GLOBALS['%s']->push("StringTools::isSpace");
		$__hx__spos = $GLOBALS['%s']->length;
		$c = _hx_char_code_at($s, $pos);
		{
			$tmp = $c >= 9 && $c <= 13 || $c === 32;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'StringTools'; }
}
