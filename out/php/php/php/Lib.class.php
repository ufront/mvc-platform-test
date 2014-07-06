<?php

class php_Lib {
	public function __construct(){}
	static function hprint($v) {
		$GLOBALS['%s']->push("php.Lib::print");
		$__hx__spos = $GLOBALS['%s']->length;
		echo(Std::string($v));
		$GLOBALS['%s']->pop();
	}
	static function hashOfAssociativeArray($arr) {
		$GLOBALS['%s']->push("php.Lib::hashOfAssociativeArray");
		$__hx__spos = $GLOBALS['%s']->length;
		$h = new haxe_ds_StringMap();
		$h->h = $arr;
		{
			$GLOBALS['%s']->pop();
			return $h;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'php.Lib'; }
}
