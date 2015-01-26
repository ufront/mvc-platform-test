<?php

class thx_core_Functions {
	public function __construct(){}
	static function constant($v) {
		return array(new _hx_lambda(array(&$v), "thx_core_Functions_0"), 'execute');
	}
	static function equality($a, $b) {
		return (is_object($_t = $a) && !($_t instanceof Enum) ? $_t === $b : $_t == $b);
	}
	static function identity($value) {
		return $value;
	}
	static function noop() {
	}
	function __toString() { return 'thx.core.Functions'; }
}
function thx_core_Functions_0(&$v) {
	{
		return $v;
	}
}
