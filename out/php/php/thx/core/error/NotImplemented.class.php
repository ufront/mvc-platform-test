<?php

class thx_core_error_NotImplemented extends thx_core_Error {
	public function __construct($posInfo = null) { if(!php_Boot::$skip_constructor) {
		parent::__construct("method " . _hx_string_or_null($posInfo->className) . "." . _hx_string_or_null($posInfo->methodName) . "() needs to be implemented",null,$posInfo);
	}}
	function __toString() { return 'thx.core.error.NotImplemented'; }
}
