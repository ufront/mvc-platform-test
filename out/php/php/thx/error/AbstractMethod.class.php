<?php

class thx_error_AbstractMethod extends thx_error_Error {
	public function __construct($posInfo = null) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("thx.error.AbstractMethod::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct("method {0}.{1}() is abstract",(new _hx_array(array($posInfo->className, $posInfo->methodName))),$posInfo,_hx_anonymous(array("fileName" => "AbstractMethod.hx", "lineNumber" => 14, "className" => "thx.error.AbstractMethod", "methodName" => "new")));
		$GLOBALS['%s']->pop();
	}}
	function __toString() { return 'thx.error.AbstractMethod'; }
}
