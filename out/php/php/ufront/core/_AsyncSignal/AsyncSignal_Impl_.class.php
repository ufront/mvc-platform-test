<?php

class ufront_core__AsyncSignal_AsyncSignal_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function handle($this1, $handler) {
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::handle");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_core__AsyncCallback_AsyncCallbackList_Impl_::add($this1, $handler);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function trigger($this1, $event) {
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::trigger");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_core__AsyncCallback_AsyncCallbackList_Impl_::invoke($this1, $event);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getLength($this1) {
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::getLength");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->length;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function dispatchChain($val, $chain, $showStopper = null) {
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::dispatchChain");
		$__hx__spos = $GLOBALS['%s']->length;
		$allDone = new tink_core_FutureTrigger();
		$chain = $chain->copy();
		$triggerNextSignal = null;
		{
			$triggerNextSignal1 = null;
			$triggerNextSignal1 = array(new _hx_lambda(array(&$allDone, &$chain, &$showStopper, &$triggerNextSignal, &$triggerNextSignal1, &$val), "ufront_core__AsyncSignal_AsyncSignal_Impl__0"), 'execute');
			$triggerNextSignal = $triggerNextSignal1;
		}
		$signal1 = $chain->shift();
		if($signal1 === null) {
			$result2 = ufront_core_AsyncCompletion::$Completed;
			if($allDone->{"list"} === null) {
				false;
			} else {
				$list3 = $allDone->{"list"};
				$allDone->{"list"} = null;
				$allDone->result = $result2;
				tink_core__Callback_CallbackList_Impl_::invoke($list3, $result2);
				tink_core__Callback_CallbackList_Impl_::clear($list3);
				true;
			}
		} else {
			call_user_func_array($triggerNextSignal, array($signal1));
		}
		{
			$tmp = $allDone->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.core._AsyncSignal.AsyncSignal_Impl_'; }
}
function ufront_core__AsyncSignal_AsyncSignal_Impl__0(&$allDone, &$chain, &$showStopper, &$triggerNextSignal, &$triggerNextSignal1, &$val, $signal) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::dispatchChain@39");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($showStopper !== null && call_user_func($showStopper)) {
			$result = ufront_core_AsyncCompletion::$Aborted;
			if($allDone->{"list"} === null) {
				false;
			} else {
				$list = $allDone->{"list"};
				$allDone->{"list"} = null;
				$allDone->result = $result;
				tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
				tink_core__Callback_CallbackList_Impl_::clear($list);
				true;
			}
		} else {
			$this1 = ufront_core__AsyncCallback_AsyncCallbackList_Impl_::invoke($signal, $val);
			call_user_func_array($this1, array(array(new _hx_lambda(array(&$allDone, &$chain, &$showStopper, &$signal, &$this1, &$triggerNextSignal, &$triggerNextSignal1, &$val), "ufront_core__AsyncSignal_AsyncSignal_Impl__1"), 'execute')));
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_core__AsyncSignal_AsyncSignal_Impl__1(&$allDone, &$chain, &$showStopper, &$signal, &$this1, &$triggerNextSignal, &$triggerNextSignal1, &$val, $resultFromCallbacks) {
	{
		$GLOBALS['%s']->push("ufront.core._AsyncSignal.AsyncSignal_Impl_::dispatchChain@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		switch($resultFromCallbacks->index) {
		case 0:{
			$signal = $chain->shift();
			if($signal === null) {
				$result1 = ufront_core_AsyncCompletion::$Completed;
				if($allDone->{"list"} === null) {
					false;
				} else {
					$list1 = $allDone->{"list"};
					$allDone->{"list"} = null;
					$allDone->result = $result1;
					tink_core__Callback_CallbackList_Impl_::invoke($list1, $result1);
					tink_core__Callback_CallbackList_Impl_::clear($list1);
					true;
				}
			} else {
				call_user_func_array($triggerNextSignal1, array($signal));
			}
		}break;
		default:{
			if($allDone->{"list"} === null) {
				false;
			} else {
				$list2 = $allDone->{"list"};
				$allDone->{"list"} = null;
				$allDone->result = $resultFromCallbacks;
				tink_core__Callback_CallbackList_Impl_::invoke($list2, $resultFromCallbacks);
				tink_core__Callback_CallbackList_Impl_::clear($list2);
				true;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
