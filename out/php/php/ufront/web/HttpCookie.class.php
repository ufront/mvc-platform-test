<?php

class ufront_web_HttpCookie {
	public function __construct($name, $value, $expires = null, $domain = null, $path = null, $secure = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($secure === null) {
			$secure = false;
		}
		$this->name = $name;
		$this->set_value($value);
		$this->expires = $expires;
		$this->domain = $domain;
		$this->path = $path;
		$this->secure = $secure;
		$GLOBALS['%s']->pop();
	}}
	public $domain;
	public $expires;
	public $name;
	public $path;
	public $secure;
	public $value;
	public function setName($v) {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::setName");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $v) {
			throw new HException(new thx_error_NullArgument("v", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpCookie.hx", "lineNumber" => 36, "className" => "ufront.web.HttpCookie", "methodName" => "setName"))));
		}
		{
			$tmp = $this->name = $v;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_value($v) {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::set_value");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $v) {
			throw new HException(new thx_error_NullArgument("v", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpCookie.hx", "lineNumber" => 42, "className" => "ufront.web.HttpCookie", "methodName" => "set_value"))));
		}
		{
			$tmp = $this->value = $v;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null($this->name) . ": " . Std::string((isset($this->description) ? $this->description: array($this, "description")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function description() {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::description");
		$__hx__spos = $GLOBALS['%s']->length;
		$buf = new StringBuf();
		$buf->add($this->value);
		if($this->expires !== null) {
			ufront_web_HttpCookie::addPair($buf, "expires", Dates::format($this->expires, "%a, %d-%b-%Y %T %Z", null, null), null);
		}
		ufront_web_HttpCookie::addPair($buf, "domain", $this->domain, null);
		ufront_web_HttpCookie::addPair($buf, "path", $this->path, null);
		if($this->secure) {
			ufront_web_HttpCookie::addPair($buf, "secure", null, true);
		}
		{
			$tmp = $buf->b;
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
	static function addPair($buf, $name, $value = null, $allowNullValue = null) {
		$GLOBALS['%s']->push("ufront.web.HttpCookie::addPair");
		$__hx__spos = $GLOBALS['%s']->length;
		if($allowNullValue === null) {
			$allowNullValue = false;
		}
		if(!$allowNullValue && null === $value) {
			$GLOBALS['%s']->pop();
			return;
		}
		$buf->add("; ");
		$buf->add($name);
		if(null === $value) {
			$GLOBALS['%s']->pop();
			return;
		}
		$buf->add("=");
		$buf->add($value);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_value" => "set_value");
	function __toString() { return $this->toString(); }
}
