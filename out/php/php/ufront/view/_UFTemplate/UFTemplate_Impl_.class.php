<?php

class ufront_view__UFTemplate_UFTemplate_Impl_ {
	public function __construct(){}
	static function _new($cb) {
		$GLOBALS['%s']->push("ufront.view._UFTemplate.UFTemplate_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $cb;
		}
		$GLOBALS['%s']->pop();
	}
	static function execute($this1, $data) {
		$GLOBALS['%s']->push("ufront.view._UFTemplate.UFTemplate_Impl_::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		$cb = $this1;
		{
			$tmp = call_user_func_array($cb, array($data));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.view._UFTemplate.UFTemplate_Impl_'; }
}
