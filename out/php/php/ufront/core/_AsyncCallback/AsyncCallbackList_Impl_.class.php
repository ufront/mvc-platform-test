<?php

class ufront_core__AsyncCallback_AsyncCallbackList_Impl_ {
	public function __construct(){}
	static function _new() {
		return (new _hx_array(array()));
	}
	static function get_length($this1) {
		return $this1->length;
	}
	static function add($this1, $cb) {
		$cell = null;
		if(ufront_core__AsyncCallback_AsyncCell::$pool->length > 0) {
			$cell = ufront_core__AsyncCallback_AsyncCell::$pool->pop();
		} else {
			$cell = new ufront_core__AsyncCallback_AsyncCell();
		}
		$cell->cb = $cb;
		$this1->push($cell);
		return array(new _hx_lambda(array(&$cb, &$cell, &$this1), "ufront_core__AsyncCallback_AsyncCallbackList_Impl__0"), 'execute');
	}
	static function invoke($this1, $data) {
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
				return tink_core__Future_Future_Impl_::sync(ufront_core_AsyncCompletion::Error($e));
			}
		}
		return tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$data, &$e, &$futures, &$this1), "ufront_core__AsyncCallback_AsyncCallbackList_Impl__1"), 'execute'), null);
	}
	static function clear($this1) {
		$_g = 0;
		$_g1 = $this1->splice(0, $this1->length);
		while($_g < $_g1->length) {
			$cell = $_g1[$_g];
			++$_g;
			$cell->cb = null;
			ufront_core__AsyncCallback_AsyncCell::$pool->push($cell);
			unset($cell);
		}
	}
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'ufront.core._AsyncCallback.AsyncCallbackList_Impl_'; }
}
function ufront_core__AsyncCallback_AsyncCallbackList_Impl__0(&$cb, &$cell, &$this1) {
	{
		if($this1->remove($cell)) {
			$cell->cb = null;
			ufront_core__AsyncCallback_AsyncCell::$pool->push($cell);
		}
		$cell = null;
	}
}
function ufront_core__AsyncCallback_AsyncCallbackList_Impl__1(&$data, &$e, &$futures, &$this1, $results) {
	{
		{
			$_g2 = 0;
			while($_g2 < $results->length) {
				$r = $results[$_g2];
				++$_g2;
				if(!Type::enumEq($r, ufront_core_AsyncCompletion::$Completed)) {
					return $r;
				}
				unset($r);
			}
		}
		return ufront_core_AsyncCompletion::$Completed;
	}
}
