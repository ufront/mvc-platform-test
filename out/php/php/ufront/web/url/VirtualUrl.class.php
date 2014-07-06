<?php

class ufront_web_url_VirtualUrl extends ufront_web_url_PartialUrl {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.url.VirtualUrl::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->isPhysical = false;
		$GLOBALS['%s']->pop();
	}}
	public $isPhysical;
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
	static function parse($url) {
		$GLOBALS['%s']->push("ufront.web.url.VirtualUrl::parse");
		$__hx__spos = $GLOBALS['%s']->length;
		$u = new ufront_web_url_VirtualUrl();
		ufront_web_url_VirtualUrl::feed($u, $url);
		{
			$GLOBALS['%s']->pop();
			return $u;
		}
		$GLOBALS['%s']->pop();
	}
	static function feed($u, $url) {
		$GLOBALS['%s']->push("ufront.web.url.VirtualUrl::feed");
		$__hx__spos = $GLOBALS['%s']->length;
		ufront_web_url_PartialUrl::feed($u, $url);
		if($u->segments[0] === "~") {
			$u->segments->shift();
			if($u->segments->length === 1 && $u->segments[0] === "") {
				$u->segments->pop();
			}
			$u->isPhysical = true;
		} else {
			$u->isPhysical = false;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.web.url.VirtualUrl'; }
}
