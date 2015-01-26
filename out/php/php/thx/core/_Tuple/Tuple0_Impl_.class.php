<?php

class thx_core__Tuple_Tuple0_Impl_ {
	public function __construct(){}
	static function _new() {
		return thx_core_Nil::$nil;
	}
	static function with($this1, $v) {
		return $v;
	}
	static function toString($this1) {
		return "Tuple0()";
	}
	static function toNil($this1) {
		return $this1;
	}
	static function nilToTuple($v) {
		return thx_core_Nil::$nil;
	}
	function __toString() { return 'thx.core._Tuple.Tuple0_Impl_'; }
}
