<?php

class haxe_Utf8 {
	public function __construct(){}
	static function encode($s) {
		return utf8_encode($s);
	}
	function __toString() { return 'haxe.Utf8'; }
}
