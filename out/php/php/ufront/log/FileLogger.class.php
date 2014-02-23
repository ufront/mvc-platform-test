<?php

class ufront_log_FileLogger implements ufront_app_UFInitRequired, ufront_app_UFLogHandler{
	public function __construct($path) {
		if(!php_Boot::$skip_constructor) {
		$this->path = $path;
	}}
	public $path;
	public $file;
	public function init($app) {
		return ufront_core_Sync::success();
	}
	public function dispose($app) {
		$this->path = null;
		if($this->file !== null) {
			$this->file->close();
			$this->file = null;
		}
		return ufront_core_Sync::success();
	}
	public function log($context, $appMessages) {
		if($this->file === null) {
			$this->file = sys_io_File::append(_hx_string_or_null($context->get_contentDirectory()) . _hx_string_or_null($this->path), null);
		}
		$req = $context->request;
		$res = $context->response;
		$sessionID = null;
		if($context->_session !== null) {
			$sessionID = " with session [" . _hx_string_or_null($context->get_session()->getID()) . "]";
		} else {
			$sessionID = "";
		}
		$this->file->writeString("" . Std::string(Date::now()) . " [" . _hx_string_or_null($req->get_httpMethod()) . "] [" . _hx_string_or_null($req->get_uri()) . "] from [" . _hx_string_or_null($req->get_clientIP()) . "]" . _hx_string_or_null($sessionID) . ", response: [" . _hx_string_rec($res->status, "") . " " . _hx_string_or_null($res->get_contentType()) . "]\x0A");
		{
			$_g = 0;
			$_g1 = $context->messages;
			while($_g < $_g1->length) {
				$msg = $_g1[$_g];
				++$_g;
				$this->file->writeString(ufront_log_FileLogger::format($msg));
				unset($msg);
			}
		}
		if($appMessages !== null) {
			$_g2 = 0;
			while($_g2 < $appMessages->length) {
				$msg1 = $appMessages[$_g2];
				++$_g2;
				$this->file->writeString(ufront_log_FileLogger::format($msg1));
				unset($msg1);
			}
		}
		$this->file->flush();
		return ufront_core_Sync::success();
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
	static $REMOVENL;
	static function format($msg) {
		$text = ufront_log_FileLogger::$REMOVENL->replace(Dynamics::string($msg->msg), "\\n");
		$type = Type::enumConstructor($msg->type);
		$pos = $msg->pos;
		return "\x09[" . _hx_string_or_null($type) . "] " . _hx_string_or_null($pos->className) . "." . _hx_string_or_null($pos->methodName) . "(" . _hx_string_rec($pos->lineNumber, "") . "): " . _hx_string_or_null($text) . "\x0A";
	}
	function __toString() { return 'ufront.log.FileLogger'; }
}
ufront_log_FileLogger::$REMOVENL = new EReg("[\x0A\x0D]", "g");
