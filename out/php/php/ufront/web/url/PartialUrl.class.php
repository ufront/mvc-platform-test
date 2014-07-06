<?php

class ufront_web_url_PartialUrl {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.url.PartialUrl::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->segments = (new _hx_array(array()));
		$this->query = new thx_collection_HashList();
		$this->fragment = null;
		$GLOBALS['%s']->pop();
	}}
	public $segments;
	public $query;
	public $fragment;
	public function queryString() {
		$GLOBALS['%s']->push("ufront.web.url.PartialUrl::queryString");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = (new _hx_array(array()));
		if(null == $this->query) throw new HException('null iterable');
		$__hx__it = $this->query->keys();
		while($__hx__it->hasNext()) {
			unset($param);
			$param = $__hx__it->next();
			$item = $this->query->get($param);
			$params->push(_hx_string_or_null($param) . "=" . _hx_string_or_null((ufront_web_url_PartialUrl_0($this, $item, $param, $params))));
			unset($item);
		}
		{
			$tmp = $params->join("&");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.url.PartialUrl::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$url = "/" . _hx_string_or_null($this->segments->join("/"));
		$qs = $this->queryString();
		if(strlen($qs) > 0) {
			$url .= "?" . _hx_string_or_null($qs);
		}
		if(null !== $this->fragment) {
			$url .= "#" . _hx_string_or_null($this->fragment);
		}
		{
			$GLOBALS['%s']->pop();
			return $url;
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
	static function parse($url) {
		$GLOBALS['%s']->push("ufront.web.url.PartialUrl::parse");
		$__hx__spos = $GLOBALS['%s']->length;
		$u = new ufront_web_url_PartialUrl();
		ufront_web_url_PartialUrl::feed($u, $url);
		{
			$GLOBALS['%s']->pop();
			return $u;
		}
		$GLOBALS['%s']->pop();
	}
	static function feed($u, $url) {
		$GLOBALS['%s']->push("ufront.web.url.PartialUrl::feed");
		$__hx__spos = $GLOBALS['%s']->length;
		$parts = _hx_explode("#", $url);
		if($parts->length > 1) {
			$u->fragment = $parts[1];
		}
		$parts = _hx_explode("?", $parts[0]);
		if($parts->length > 1) {
			$pairs = _hx_explode("&", $parts[1]);
			{
				$_g = 0;
				while($_g < $pairs->length) {
					$s = $pairs[$_g];
					++$_g;
					$pair = _hx_explode("=", $s);
					$u->query->set($pair[0], _hx_anonymous(array("value" => $pair[1], "encoded" => true)));
					unset($s,$pair);
				}
			}
		}
		$segments = _hx_explode("/", $parts[0]);
		if($segments[0] === "") {
			$segments->shift();
		}
		if($segments->length === 1 && $segments[0] === "") {
			$segments->pop();
		}
		$u->segments = $segments;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return $this->toString(); }
}
function ufront_web_url_PartialUrl_0(&$__hx__this, &$item, &$param, &$params) {
	if($item->encoded) {
		return $item->value;
	} else {
		return rawurlencode($item->value);
	}
}
