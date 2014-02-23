<?php

class ufront_log_RemotingLogger implements ufront_app_UFLogHandler{
	public function __construct() {
		;
	}
	public $appMessages;
	public function log($httpContext, $appMessages) {
		if($httpContext->response->get_contentType() === "application/x-haxe-remoting") {
			$results = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $httpContext->messages;
				while($_g < $_g1->length) {
					$msg = $_g1[$_g];
					++$_g;
					$results->push($this->formatMessage($msg));
					unset($msg);
				}
			}
			if($results->length > 0) {
				$httpContext->response->write("\x0A" . _hx_string_or_null($results->join("\x0A")));
			}
		}
		return ufront_core_Sync::success();
	}
	public function formatMessage($m) {
		try {
			$m->msg = Std::string($m->msg);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$m->msg = "ERROR: unable to format message in RemotingLogger.formatMessage";
			}
		}
		if($m->pos->customParams !== null) {
			$m->pos->customParams = $m->pos->customParams->map(array(new _hx_lambda(array(&$e, &$m), "ufront_log_RemotingLogger_0"), 'execute'));
		}
		return "hxt" . _hx_string_or_null(haxe_Serializer::run($m));
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return 'ufront.log.RemotingLogger'; }
}
function ufront_log_RemotingLogger_0(&$e, &$m, $v) {
	{
		return Std::string($v);
	}
}
