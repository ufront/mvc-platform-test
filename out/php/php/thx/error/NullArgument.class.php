<?php

class thx_error_NullArgument extends thx_error_Error {
	public function __construct($argumentName, $message = null, $posInfo = null) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("thx.error.NullArgument::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $message) {
			$message = "invalid null or empty argument '{0}' for method {1}.{2}()";
		}
		parent::__construct($message,(new _hx_array(array($argumentName, $posInfo->className, $posInfo->methodName))),$posInfo,_hx_anonymous(array("fileName" => "NullArgument.hx", "lineNumber" => 16, "className" => "thx.error.NullArgument", "methodName" => "new")));
		$GLOBALS['%s']->pop();
	}}
	function __toString() { return 'thx.error.NullArgument'; }
}
