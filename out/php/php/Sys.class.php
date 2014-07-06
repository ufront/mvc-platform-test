<?php

class Sys {
	public function __construct(){}
	static function hprint($v) {
		$GLOBALS['%s']->push("Sys::print");
		$__hx__spos = $GLOBALS['%s']->length;
		echo(Std::string($v));
		$GLOBALS['%s']->pop();
	}
	static function println($v) {
		$GLOBALS['%s']->push("Sys::println");
		$__hx__spos = $GLOBALS['%s']->length;
		Sys::hprint($v);
		Sys::hprint("\x0A");
		$GLOBALS['%s']->pop();
	}
	static function sleep($seconds) {
		$GLOBALS['%s']->push("Sys::sleep");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = usleep($seconds * 1000000);
			$GLOBALS['%s']->pop();
			$tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCwd() {
		$GLOBALS['%s']->push("Sys::getCwd");
		$__hx__spos = $GLOBALS['%s']->length;
		$cwd = getcwd();
		$l = _hx_substr($cwd, -1, null);
		{
			$tmp = _hx_string_or_null($cwd) . _hx_string_or_null(((($l === "/" || $l === "\\") ? "" : "/")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Sys'; }
}
