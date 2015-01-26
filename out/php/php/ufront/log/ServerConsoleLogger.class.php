<?php

class ufront_log_ServerConsoleLogger implements ufront_app_UFLogHandler{
	public function __construct() { 
	}
	public function log($ctx, $appMessages) {
		{
			$_g = 0;
			$_g1 = $ctx->messages;
			while($_g < $_g1->length) {
				$msg = $_g1[$_g];
				++$_g;
				ufront_log_ServerConsoleLogger::logMessage($msg);
				unset($msg);
			}
		}
		if($appMessages !== null) {
			$_g2 = 0;
			while($_g2 < $appMessages->length) {
				$msg1 = $appMessages[$_g2];
				++$_g2;
				ufront_log_ServerConsoleLogger::logMessage($msg1);
				unset($msg1);
			}
		}
		return ufront_core_Sync::success();
	}
	static function logMessage($m) {
		$extras = null;
		if(_hx_field($m, "pos") !== null && $m->pos->customParams !== null) {
			$extras = ", " . _hx_string_or_null($m->pos->customParams->join(", "));
		} else {
			$extras = "";
		}
		$message = "" . Std::string($m->type) . ": " . _hx_string_or_null($m->pos->className) . "." . _hx_string_or_null($m->pos->methodName) . "(" . _hx_string_rec($m->pos->lineNumber, "") . "): " . Std::string($m->msg) . _hx_string_or_null($extras);
		error_log($message);
	}
	function __toString() { return 'ufront.log.ServerConsoleLogger'; }
}
