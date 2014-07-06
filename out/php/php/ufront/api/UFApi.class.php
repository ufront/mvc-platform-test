<?php

class ufront_api_UFApi {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.api.UFApi::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $auth;
	public $messages;
	public function ufTrace($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.api.UFApi::ufTrace");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
		$GLOBALS['%s']->pop();
	}
	public function ufLog($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.api.UFApi::ufLog");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Log)));
		$GLOBALS['%s']->pop();
	}
	public function ufWarn($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.api.UFApi::ufWarn");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Warning)));
		$GLOBALS['%s']->pop();
	}
	public function ufError($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.api.UFApi::ufError");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Error)));
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.api.UFApi::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Type::getClassName(Type::getClass($this));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
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
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	function __toString() { return $this->toString(); }
}
ufront_api_UFApi::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("auth" => _hx_anonymous(array("name" => (new _hx_array(array("auth"))), "type" => (new _hx_array(array("ufront.auth.UFAuthHandler"))), "inject" => null)), "messages" => _hx_anonymous(array("name" => (new _hx_array(array("messages"))), "type" => (new _hx_array(array("ufront.log.MessageList"))), "inject" => null))))));
