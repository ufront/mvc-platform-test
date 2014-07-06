<?php

class ufront_log_RemotingLogger implements ufront_app_UFLogHandler{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.log.RemotingLogger::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function log($httpContext, $appMessages) {
		$GLOBALS['%s']->push("ufront.log.RemotingLogger::log");
		$__hx__spos = $GLOBALS['%s']->length;
		if($httpContext->response->get_contentType() === "application/x-haxe-remoting") {
			$results = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $httpContext->messages;
				while($_g < $_g1->length) {
					$msg = $_g1[$_g];
					++$_g;
					$results->push(ufront_log_RemotingLogger::formatMessage($msg));
					unset($msg);
				}
			}
			if($appMessages !== null) {
				$_g2 = 0;
				while($_g2 < $appMessages->length) {
					$msg1 = $appMessages[$_g2];
					++$_g2;
					$results->push(ufront_log_RemotingLogger::formatMessage($msg1));
					unset($msg1);
				}
			}
			if($results->length > 0) {
				$httpContext->response->write("\x0A" . _hx_string_or_null($results->join("\x0A")));
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
		$GLOBALS['%s']->push("ufront.log.RemotingLogger::formatMessage");
		$__hx__spos = $GLOBALS['%s']->length;
		$m->msg = "" . Std::string($m->msg);
		if($m->pos->customParams !== null) {
			$_g = (new _hx_array(array()));
			{
				$_g1 = 0;
				$_g2 = $m->pos->customParams;
				while($_g1 < $_g2->length) {
					$p = $_g2[$_g1];
					++$_g1;
					$_g->push("" . Std::string($p));
					unset($p);
				}
			}
			$m->pos->customParams = $_g;
		}
		{
			$tmp = "hxt" . _hx_string_or_null(haxe_Serializer::run($m));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.log.RemotingLogger'; }
}
