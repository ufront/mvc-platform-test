<?php

class ufront_web_url_filter_PathInfoUrlFilter implements ufront_web_url_filter_UFUrlFilter{
	public function __construct($frontScript = null, $useCleanRoot = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.url.filter.PathInfoUrlFilter::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($useCleanRoot === null) {
			$useCleanRoot = true;
		}
		if(null === $frontScript) {
			$frontScript = "index.php";
		}
		$this->frontScript = $frontScript;
		$this->useCleanRoot = $useCleanRoot;
		$GLOBALS['%s']->pop();
	}}
	public $frontScript;
	public $useCleanRoot;
	public function filterIn($url, $request) {
		$GLOBALS['%s']->push("ufront.web.url.filter.PathInfoUrlFilter::filterIn");
		$__hx__spos = $GLOBALS['%s']->length;
		if($url->segments[0] === $this->frontScript) {
			$url->segments->shift();
		}
		$GLOBALS['%s']->pop();
	}
	public function filterOut($url, $request) {
		$GLOBALS['%s']->push("ufront.web.url.filter.PathInfoUrlFilter::filterOut");
		$__hx__spos = $GLOBALS['%s']->length;
		if($url->isPhysical || $url->segments->length === 0 && $this->useCleanRoot) {
		} else {
			$url->segments->unshift($this->frontScript);
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
	function __toString() { return 'ufront.web.url.filter.PathInfoUrlFilter'; }
}
