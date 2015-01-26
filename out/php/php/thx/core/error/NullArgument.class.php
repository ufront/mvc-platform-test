<?php

class thx_core_error_NullArgument extends thx_core_Error {
	public function __construct($message, $posInfo = null) { if(!php_Boot::$skip_constructor) {
		parent::__construct($message,null,$posInfo);
	}}
	function __toString() { return 'thx.core.error.NullArgument'; }
}
