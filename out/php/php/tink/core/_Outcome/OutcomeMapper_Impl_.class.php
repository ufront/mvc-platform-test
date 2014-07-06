<?php

class tink_core__Outcome_OutcomeMapper_Impl_ {
	public function __construct(){}
	static function _new($f) {
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_anonymous(array("f" => $f));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function apply($this1, $o) {
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::apply");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->f($o);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function withSameError($f) {
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::withSameError");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Outcome_OutcomeMapper_Impl_::_new(array(new _hx_lambda(array(&$f), "tink_core__Outcome_OutcomeMapper_Impl__0"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function withEitherError($f) {
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::withEitherError");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Outcome_OutcomeMapper_Impl_::_new(array(new _hx_lambda(array(&$f), "tink_core__Outcome_OutcomeMapper_Impl__1"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core._Outcome.OutcomeMapper_Impl_'; }
}
function tink_core__Outcome_OutcomeMapper_Impl__0(&$f, $o) {
	{
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::withSameError@88");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($o->index) {
		case 0:{
			$d = $o->params[0];
			{
				$tmp = call_user_func_array($f, array($d));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$f1 = $o->params[0];
			{
				$tmp = tink_core_Outcome::Failure($f1);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
function tink_core__Outcome_OutcomeMapper_Impl__1(&$f, $o) {
	{
		$GLOBALS['%s']->push("tink.core._Outcome.OutcomeMapper_Impl_::withEitherError@97");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($o->index) {
		case 0:{
			$d = $o->params[0];
			{
				$_g = call_user_func_array($f, array($d));
				switch($_g->index) {
				case 0:{
					$d1 = $_g->params[0];
					{
						$tmp = tink_core_Outcome::Success($d1);
						$GLOBALS['%s']->pop();
						return $tmp;
					}
				}break;
				case 1:{
					$f1 = $_g->params[0];
					{
						$tmp = tink_core_Outcome::Failure(tink_core_Either::Right($f1));
						$GLOBALS['%s']->pop();
						return $tmp;
					}
				}break;
				}
			}
		}break;
		case 1:{
			$f2 = $o->params[0];
			{
				$tmp = tink_core_Outcome::Failure(tink_core_Either::Left($f2));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
