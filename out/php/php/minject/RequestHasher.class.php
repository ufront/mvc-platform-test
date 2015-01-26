<?php

class minject_RequestHasher {
	public function __construct(){}
	static function resolveRequest($forClass, $named = null) {
		if($named === null) {
			$named = "";
		}
		return "" . _hx_string_or_null(minject_RequestHasher::getClassName($forClass)) . "#" . _hx_string_or_null($named);
	}
	static function getClassName($forClass) {
		if($forClass === null) {
			return "Dynamic";
		} else {
			return Type::getClassName($forClass);
		}
	}
	function __toString() { return 'minject.RequestHasher'; }
}
