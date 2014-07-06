<?php

class ufront_web_result_ContentResult extends ufront_web_result_ActionResult {
	public function __construct($content = null, $contentType = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.result.ContentResult::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->content = $content;
		$this->contentType = $contentType;
		$GLOBALS['%s']->pop();
	}}
	public $content;
	public $contentType;
	public function executeResult($actionContext) {
		$GLOBALS['%s']->push("ufront.web.result.ContentResult::executeResult");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $this->contentType) {
			$actionContext->httpContext->response->set_contentType($this->contentType);
		}
		$actionContext->httpContext->response->write($this->content);
		{
			$tmp = ufront_core_Sync::success();
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
	function __toString() { return 'ufront.web.result.ContentResult'; }
}
