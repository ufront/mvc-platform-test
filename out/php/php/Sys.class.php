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
	static function sleep($seconds) {
		usleep($seconds * 1000000);
		return;
	}
	function __toString() { return 'Sys'; }
}
