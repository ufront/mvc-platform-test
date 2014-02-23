<?php

class Sys {
	public function __construct(){}
	static function hprint($v) {
		echo(Std::string($v));
	}
	static function println($v) {
		Sys::hprint($v);
		Sys::hprint("\x0A");
	}
	static function getCwd() {
		$cwd = getcwd();
		$l = _hx_substr($cwd, -1, null);
		return _hx_string_or_null($cwd) . _hx_string_or_null(((($l === "/" || $l === "\\") ? "" : "/")));
	}
	function __toString() { return 'Sys'; }
}
