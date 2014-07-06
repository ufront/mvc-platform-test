<?php

class ufront_log_BrowserConsoleLogger implements ufront_app_UFLogHandler{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.log.BrowserConsoleLogger::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function log($ctx, $appMessages) {
		$GLOBALS['%s']->push("ufront.log.BrowserConsoleLogger::log");
		$__hx__spos = $GLOBALS['%s']->length;
		if($ctx->response->get_contentType() === "text/html") {
			$results = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $ctx->messages;
				while($_g < $_g1->length) {
					$msg = $_g1[$_g];
					++$_g;
					$results->push(ufront_log_BrowserConsoleLogger::formatMessage($msg));
					unset($msg);
				}
			}
			if($appMessages !== null) {
				$_g2 = 0;
				while($_g2 < $appMessages->length) {
					$msg1 = $appMessages[$_g2];
					++$_g2;
					$results->push(ufront_log_BrowserConsoleLogger::formatMessage($msg1));
					unset($msg1);
				}
			}
			if($results->length > 0) {
				$ctx->response->write("\x0A<script type=\"text/javascript\">\x0A" . _hx_string_or_null($results->join("\x0A")) . "\x0A</script>");
			}
		}
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatMessage($m) {
		$GLOBALS['%s']->push("ufront.log.BrowserConsoleLogger::formatMessage");
		$__hx__spos = $GLOBALS['%s']->length;
		$type = null;
		{
			$_g = $m->type;
			switch($_g->index) {
			case 0:{
				$type = "log";
			}break;
			case 1:{
				$type = "info";
			}break;
			case 2:{
				$type = "warn";
			}break;
			case 3:{
				$type = "error";
			}break;
			}
		}
		$extras = null;
		if(_hx_field($m, "pos") !== null && $m->pos->customParams !== null) {
			$extras = ", " . _hx_string_or_null($m->pos->customParams->join(", "));
		} else {
			$extras = "";
		}
		$msg = "" . _hx_string_or_null($m->pos->className) . "." . _hx_string_or_null($m->pos->methodName) . "(" . _hx_string_rec($m->pos->lineNumber, "") . "): " . Std::string($m->msg) . _hx_string_or_null($extras);
		{
			$tmp = "console." . _hx_string_or_null($type) . "(decodeURIComponent(\"" . _hx_string_or_null(rawurlencode($msg)) . "\"))";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.log.BrowserConsoleLogger'; }
}
