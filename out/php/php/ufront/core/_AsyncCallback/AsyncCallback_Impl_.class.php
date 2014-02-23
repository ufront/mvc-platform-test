<?php

class ufront_core__AsyncCallback_AsyncCallback_Impl_ {
	public function __construct(){}
	static function _new($f) {
		return $f;
	}
	static function invoke($this1, $data) {
		return call_user_func_array($this1, array($data));
	}
	static function fromSync($f) {
		return array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__0"), 'execute');
	}
	static function fromNiladic($f) {
		return array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__1"), 'execute');
	}
	static function fromNiladicSync($f) {
		return array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__2"), 'execute');
	}
	static function fromMany($callbacks) {
		return array(new _hx_lambda(array(&$callbacks), "ufront_core__AsyncCallback_AsyncCallback_Impl__3"), 'execute');
	}
	static $COMPLETED;
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCallback_Impl_'; }
}
ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED = tink_core__Future_Future_Impl_::sync(ufront_core_AsyncCompletion::$Completed);
function ufront_core__AsyncCallback_AsyncCallback_Impl__0(&$f, $v) {
	{
		call_user_func_array($f, array($v));
		return ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED;
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__1(&$f, $v) {
	{
		return call_user_func($f);
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__2(&$f, $v) {
	{
		call_user_func($f);
		return ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED;
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__3(&$callbacks, $v) {
	{
		$futures = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $callbacks->length) {
				$callback = $callbacks[$_g];
				++$_g;
				$futures->push(call_user_func_array($callback, array($v)));
				unset($callback);
			}
		}
		return tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$callbacks, &$futures, &$v), "ufront_core__AsyncCallback_AsyncCallback_Impl__4"), 'execute'), null);
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__4(&$callbacks, &$futures, &$v, $results) {
	{
		{
			$_g1 = 0;
			while($_g1 < $results->length) {
				$r = $results[$_g1];
				++$_g1;
				if(!Type::enumEq($r, ufront_core_AsyncCompletion::$Completed)) {
					return $r;
				}
				unset($r);
			}
		}
		return ufront_core_AsyncCompletion::$Completed;
	}
}
