<?php

class thx_core__Tuple_Tuple2_Impl_ {
	public function __construct(){}
	static function _new($_0, $_1) {
		return _hx_anonymous(array("_0" => $_0, "_1" => $_1));
	}
	static function get_left($this1) {
		return $this1->_0;
	}
	static function get_right($this1) {
		return $this1->_1;
	}
	static function flip($this1) {
		return _hx_anonymous(array("_0" => $this1->_1, "_1" => $this1->_0));
	}
	static function dropLeft($this1) {
		return $this1->_1;
	}
	static function dropRight($this1) {
		return $this1->_0;
	}
	static function with($this1, $v) {
		return _hx_anonymous(array("_0" => $this1->_0, "_1" => $this1->_1, "_2" => $v));
	}
	static function toString($this1) {
		return "Tuple2(" . Std::string($this1->_0) . "," . Std::string($this1->_1) . ")";
	}
	static $__properties__ = array("get_right" => "get_right","get_left" => "get_left");
	function __toString() { return 'thx.core._Tuple.Tuple2_Impl_'; }
}
