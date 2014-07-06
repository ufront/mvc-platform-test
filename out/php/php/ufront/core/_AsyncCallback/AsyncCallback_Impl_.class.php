<?php

class ufront_core__AsyncCallback_AsyncCallback_Impl_ {
	public function __construct(){}
	static function _new($f) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $f;
		}
		$GLOBALS['%s']->pop();
	}
	static function invoke($this1, $data) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::invoke");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($this1, array($data));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromSync($f) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromSync");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromNiladic($f) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromNiladic");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromNiladicSync($f) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromNiladicSync");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$f), "ufront_core__AsyncCallback_AsyncCallback_Impl__2"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromMany($callbacks) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromMany");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = array(new _hx_lambda(array(&$callbacks), "ufront_core__AsyncCallback_AsyncCallback_Impl__3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $COMPLETED;
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCallback_Impl_'; }
}
ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED = tink_core__Future_Future_Impl_::sync(ufront_core_AsyncCompletion::$Completed);
function ufront_core__AsyncCallback_AsyncCallback_Impl__0(&$f, $v) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromSync@23");
		$__hx__spos2 = $GLOBALS['%s']->length;
		call_user_func_array($f, array($v));
		{
			$tmp = ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__1(&$f, $v) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromNiladic@26");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func($f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__2(&$f, $v) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromNiladicSync@29");
		$__hx__spos2 = $GLOBALS['%s']->length;
		call_user_func($f);
		{
			$tmp = ufront_core__AsyncCallback_AsyncCallback_Impl_::$COMPLETED;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__3(&$callbacks, $v) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromMany@33");
		$__hx__spos2 = $GLOBALS['%s']->length;
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
		{
			$tmp = tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$callbacks, &$futures, &$v), "ufront_core__AsyncCallback_AsyncCallback_Impl__4"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncCallback_AsyncCallback_Impl__4(&$callbacks, &$futures, &$v, $results) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallback_Impl_::fromMany@37");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			while($_g1 < $results->length) {
				$r = $results[$_g1];
				++$_g1;
				if(!Type::enumEq($r, ufront_core_AsyncCompletion::$Completed)) {
					$GLOBALS['%s']->pop();
					return $r;
				}
				unset($r);
			}
		}
		{
			$tmp = ufront_core_AsyncCompletion::$Completed;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
