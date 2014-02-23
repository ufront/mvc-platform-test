<?php

class StringTools {
	public function __construct(){}
	static function startsWith($s, $start) {
		return strlen($s) >= strlen($start) && _hx_substr($s, 0, strlen($start)) === $start;
	}
	static function endsWith($s, $end) {
		$elen = strlen($end);
		$slen = strlen($s);
		return $slen >= $elen && _hx_substr($s, $slen - $elen, $elen) === $end;
	}
	static function isSpace($s, $pos) {
		$c = _hx_char_code_at($s, $pos);
		return $c >= 9 && $c <= 13 || $c === 32;
	}
	function __toString() { return 'StringTools'; }
}
