<?php

class mcore_exception_ArgumentException extends mcore_exception_Exception {
	public function __construct($message = null, $cause = null, $info = null) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("mcore.exception.ArgumentException::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($message === null) {
			$message = "";
		}
		parent::__construct($message,$cause,$info);
		$GLOBALS['%s']->pop();
	}}
	static $__properties__ = array("get_message" => "get_message","get_name" => "get_name");
	function __toString() { return 'mcore.exception.ArgumentException'; }
}
