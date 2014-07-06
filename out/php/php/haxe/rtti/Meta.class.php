<?php

class haxe_rtti_Meta {
	public function __construct(){}
	static function getType($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getType");
		$__hx__spos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		if($meta === null || _hx_field($meta, "obj") === null) {
			$tmp = _hx_anonymous(array());
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = $meta->obj;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFields($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getFields");
		$__hx__spos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		if($meta === null || _hx_field($meta, "fields") === null) {
			$tmp = _hx_anonymous(array());
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = $meta->fields;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.rtti.Meta'; }
}