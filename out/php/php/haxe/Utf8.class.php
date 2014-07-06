<?php

class haxe_Utf8 {
	public function __construct(){}
	static function encode($s) {
		$GLOBALS['%s']->push("haxe.Utf8::encode");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = utf8_encode($s);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.Utf8'; }
}
