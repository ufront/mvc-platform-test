<?php

class ufront_auth_YesBossAuthHandler implements ufront_auth_UFAuthHandler{
	public function __construct() {
		;
	}
	public function isLoggedIn() {
		return true;
	}
	public function requireLogin() {
	}
	public function isLoggedInAs($user) {
		return true;
	}
	public function requireLoginAs($user) {
	}
	public function hasPermission($permission) {
		return true;
	}
	public function hasPermissions($permissions) {
		return true;
	}
	public function requirePermission($permission) {
	}
	public function requirePermissions($permissions) {
	}
	public function get_currentUser() {
		return null;
	}
	public function set_currentUser($u) {
		return $u;
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
		if(ufront_auth_YesBossAuthHandler::$_factory === null) {
			ufront_auth_YesBossAuthHandler::$_factory = new ufront_auth_YesBossFactory();
		}
		return ufront_auth_YesBossAuthHandler::$_factory;
	}
	static $__properties__ = array("set_currentUser" => "set_currentUser","get_currentUser" => "get_currentUser");
	function __toString() { return 'ufront.auth.YesBossAuthHandler'; }
}
