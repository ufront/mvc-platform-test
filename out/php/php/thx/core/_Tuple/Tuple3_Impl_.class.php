<?php

class thx_core__Tuple_Tuple3_Impl_ {
	public function __construct(){}
	static function _new($_0, $_1, $_2) {
		return _hx_anonymous(array("_0" => $_0, "_1" => $_1, "_2" => $_2));
	}
	static function flip($this1) {
		return _hx_anonymous(array("_0" => $this1->_2, "_1" => $this1->_1, "_2" => $this1->_0));
	}
	static function dropLeft($this1) {
		return _hx_anonymous(array("_0" => $this1->_1, "_1" => $this1->_2));
	}
	static function dropRight($this1) {
		return _hx_anonymous(array("_0" => $this1->_0, "_1" => $this1->_1));
	}
	static function with($this1, $v) {
		return _hx_anonymous(array("_0" => $this1->_0, "_1" => $this1->_1, "_2" => $this1->_2, "_3" => $v));
	}
	static function toString($this1) {
		return "Tuple3(" . Std::string($this1->_0) . "," . Std::string($this1->_1) . "," . Std::string($this1->_2) . ")";
	}
	function __toString() { return 'thx.core._Tuple.Tuple3_Impl_'; }
}
