<?php

class ufront_log_MessageList {
	public function __construct($messages = null, $onMessage = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.log.MessageList::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages = $messages;
		$this->onMessage = $onMessage;
		$GLOBALS['%s']->pop();
	}}
	public $messages;
	public $onMessage;
	public function push($m) {
		$GLOBALS['%s']->push("ufront.log.MessageList::push");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->messages !== null) {
			$this->messages->push($m);
		}
		if($this->onMessage !== null) {
			$this->onMessage($m);
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
	function __toString() { return 'ufront.log.MessageList'; }
}
