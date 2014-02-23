<?php

class ufront_core__AsyncSignal_AsyncSignal_Impl_ {
	public function __construct(){}
	static function _new() {
		return (new _hx_array(array()));
	}
	static function handle($this1, $handler) {
		return ufront_core__AsyncCallback_AsyncCallbackList_Impl_::add($this1, $handler);
	}
	static function trigger($this1, $event) {
		return ufront_core__AsyncCallback_AsyncCallbackList_Impl_::invoke($this1, $event);
	}
	static function getLength($this1) {
		return $this1->length;
	}
	static function dispatchChain($val, $chain, $showStopper = null) {
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
		return $allDone->future;
	}
	function __toString() { return 'ufront.core._AsyncSignal.AsyncSignal_Impl_'; }
}
function ufront_core__AsyncSignal_AsyncSignal_Impl__0(&$allDone, &$chain, &$showStopper, &$triggerNextSignal, &$triggerNextSignal1, &$val, $signal) {
	{
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
	}
}
function ufront_core__AsyncSignal_AsyncSignal_Impl__1(&$allDone, &$chain, &$showStopper, &$signal, &$this1, &$triggerNextSignal, &$triggerNextSignal1, &$val, $resultFromCallbacks) {
	{
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
	}
}
