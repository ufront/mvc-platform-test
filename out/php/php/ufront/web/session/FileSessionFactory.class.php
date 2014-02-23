<?php

class ufront_web_session_FileSessionFactory implements ufront_web_session_UFSessionFactory{
	public function __construct($savePath = null, $sessionName = null, $expire = null) {
		if(!php_Boot::$skip_constructor) {
		if($expire === null) {
			$expire = 0;
		}
		$this->savePath = $savePath;
		$this->sessionName = $sessionName;
		$this->expire = $expire;
	}}
	public $savePath;
	public $sessionName;
	public $expire;
	public function create($context) {
		return new ufront_web_session_FileSession($context, $this->savePath, $this->sessionName, $this->expire);
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
	function __toString() { return 'ufront.web.session.FileSessionFactory'; }
}
