<?php

class ufront_auth_YesBossFactory implements ufront_auth_UFAuthFactory{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.auth.YesBossFactory::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function create($context) {
		$GLOBALS['%s']->push("ufront.auth.YesBossFactory::create");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new ufront_auth_YesBossAuthHandler();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.auth.YesBossFactory'; }
}
