<?php

class ufront_core__AsyncCallback_AsyncCallbackList_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_length($this1) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::get_length");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->length;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function add($this1, $cb) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::add");
		$__hx__spos = $GLOBALS['%s']->length;
		$cell = null;
		if(ufront_core__AsyncCallback_AsyncCell::$pool->length > 0) {
			$cell = ufront_core__AsyncCallback_AsyncCell::$pool->pop();
		} else {
			$cell = new ufront_core__AsyncCallback_AsyncCell();
		}
		$cell->cb = $cb;
		$this1->push($cell);
		{
			$tmp = array(new _hx_lambda(array(&$cb, &$cell, &$this1), "ufront_core__AsyncCallback_AsyncCallbackList_Impl__0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function invoke($this1, $data) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::invoke");
		$__hx__spos = $GLOBALS['%s']->length;
		$futures = (new _hx_array(array()));
		try {
			$_g = 0;
			$_g1 = $this1->copy();
			while($_g < $_g1->length) {
				$cell = $_g1[$_g];
				++$_g;
				if($cell->cb !== null) {
					$futures->push($cell->cb($data));
				}
				unset($cell);
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				{
					$tmp = tink_core__Future_Future_Impl_::sync(ufront_core_AsyncCompletion::Error($e));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		{
			$tmp = tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$data, &$e, &$futures, &$this1), "ufront_core__AsyncCallback_AsyncCallbackList_Impl__1"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function clear($this1) {
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = $this1->splice(0, $this1->length);
		while($_g < $_g1->length) {
			$cell = $_g1[$_g];
			++$_g;
			$cell->cb = null;
			ufront_core__AsyncCallback_AsyncCell::$pool->push($cell);
			unset($cell);
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCallbackList_Impl_'; }
}
function ufront_core__AsyncCallback_AsyncCallbackList_Impl__0(&$cb, &$cell, &$this1) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::add@85");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($this1->remove($cell)) {
			$cell->cb = null;
			ufront_core__AsyncCallback_AsyncCell::$pool->push($cell);
		}
		$cell = null;
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncCallback_AsyncCallbackList_Impl__1(&$data, &$e, &$futures, &$this1, $results) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncCallback.AsyncCallbackList_Impl_::invoke@102");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$_g2 = 0;
			while($_g2 < $results->length) {
				$r = $results[$_g2];
				++$_g2;
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
