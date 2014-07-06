<?php

class ufront_auth_YesBossAuthHandler implements ufront_auth_UFAuthHandler{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function isLoggedIn() {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::isLoggedIn");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function requireLogin() {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::requireLogin");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function isLoggedInAs($user) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::isLoggedInAs");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function requireLoginAs($user) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::requireLoginAs");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function hasPermission($permission) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::hasPermission");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasPermissions($permissions) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::hasPermissions");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function requirePermission($permission) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::requirePermission");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function requirePermissions($permissions) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::requirePermissions");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function getUserByID($id) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::getUserByID");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new ufront_auth_BossUser();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_currentUser() {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::get_currentUser");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new ufront_auth_BossUser();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_currentUser($u) {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::set_currentUser");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $u;
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
	static $_factory;
	static function getFactory() {
		$GLOBALS['%s']->push("ufront.auth.YesBossAuthHandler::getFactory");
		$__hx__spos = $GLOBALS['%s']->length;
		if(ufront_auth_YesBossAuthHandler::$_factory === null) {
			ufront_auth_YesBossAuthHandler::$_factory = new ufront_auth_YesBossFactory();
		}
		{
			$tmp = ufront_auth_YesBossAuthHandler::$_factory;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_currentUser" => "set_currentUser","get_currentUser" => "get_currentUser");
	function __toString() { return 'ufront.auth.YesBossAuthHandler'; }
}
