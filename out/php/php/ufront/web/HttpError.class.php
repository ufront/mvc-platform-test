<?php

class ufront_web_HttpError extends tink_core_Error {
	public function __construct($code, $message, $pos = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($message,$pos);
		$this->code = $code;
	}}
	public $code;
	public function toString() {
		return "" . _hx_string_rec($this->code, "") . " Error: " . _hx_string_or_null($this->message);
	}
	public function printPos() {
		return parent::printPos();
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
	static function wrap($e, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "Internal Server Error";
		}
		if(Std::is($e, _hx_qtype("ufront.web.HttpError"))) {
			return $e;
		} else {
			if(Std::is($e, _hx_qtype("tink.core.Error"))) {
				return ufront_web_HttpError::internalServerError($e->message, $e->data, $e->pos);
			} else {
				return ufront_web_HttpError::internalServerError($msg, $e, $pos);
			}
		}
	}
	static function badRequest($pos = null) {
		return new ufront_web_HttpError(400, "Bad Request", $pos);
	}
	static function internalServerError($msg = null, $inner = null, $pos = null) {
		if($msg === null) {
			$msg = "Internal Server Error";
		}
		$e = new ufront_web_HttpError(500, $msg, $pos);
		$e->data = $inner;
		return $e;
	}
	static function methodNotAllowed($pos = null) {
		return new ufront_web_HttpError(405, "Method Not Allowed", $pos);
	}
	static function pageNotFound($pos = null) {
		return new ufront_web_HttpError(404, "Page Not Found", $pos);
	}
	static function unauthorized($pos = null) {
		return new ufront_web_HttpError(401, "Unauthorized Access", $pos);
	}
	static function unprocessableEntity($pos = null) {
		return new ufront_web_HttpError(422, "Unprocessable Entity", $pos);
	}
	static function fakePosition($obj, $method, $args = null) {
		return _hx_anonymous(array("methodName" => $method, "lineNumber" => -1, "fileName" => "", "customParams" => (($args !== null) ? $args : (new _hx_array(array()))), "className" => Type::getClassName(Type::getClass($obj))));
	}
	function __toString() { return $this->toString(); }
}
