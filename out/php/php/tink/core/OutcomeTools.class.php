<?php

class tink_core_OutcomeTools {
	public function __construct(){}
	static function sure($outcome) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::sure");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$data = $outcome->params[0];
			{
				$GLOBALS['%s']->pop();
				return $data;
			}
		}break;
		case 1:{
			$failure = $outcome->params[0];
			if(Std::is($failure, _hx_qtype("tink.core.TypedError"))) {
				$tmp = $failure->throwSelf();
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				throw new HException($failure);
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function toOption($outcome) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::toOption");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$data = $outcome->params[0];
			{
				$tmp = haxe_ds_Option::Some($data);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$tmp = haxe_ds_Option::$None;
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function toOutcome($option, $pos = null) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::toOutcome");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($option->index) {
		case 0:{
			$value = $option->params[0];
			{
				$tmp = tink_core_Outcome::Success($value);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$tmp = tink_core_Outcome::Failure(new tink_core_TypedError(404, "Some value expected but none found in " . _hx_string_or_null($pos->fileName) . "@line " . _hx_string_rec($pos->lineNumber, ""), _hx_anonymous(array("fileName" => "Outcome.hx", "lineNumber" => 37, "className" => "tink.core.OutcomeTools", "methodName" => "toOutcome"))));
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function orUse($outcome, $fallback) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::orUse");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$data = $outcome->params[0];
			{
				$GLOBALS['%s']->pop();
				return $data;
			}
		}break;
		case 1:{
			$GLOBALS['%s']->pop();
			return $fallback;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function orTry($outcome, $fallback) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::orTry");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$GLOBALS['%s']->pop();
			return $outcome;
		}break;
		case 1:{
			$GLOBALS['%s']->pop();
			return $fallback;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function equals($outcome, $to) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::equals");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$data = $outcome->params[0];
			{
				$tmp = (is_object($_t = $data) && !($_t instanceof Enum) ? $_t === $to : $_t == $to);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($outcome, $transform) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::map");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$a = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Success(call_user_func_array($transform, array($a)));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$f = $outcome->params[0];
			{
				$tmp = tink_core_Outcome::Failure($f);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function isSuccess($outcome) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::isSuccess");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($outcome->index) {
		case 0:{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function flatMap($o, $mapper) {
		$GLOBALS['%s']->push("tink.core.OutcomeTools::flatMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Outcome_OutcomeMapper_Impl_::apply($mapper, $o);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'tink.core.OutcomeTools'; }
}
