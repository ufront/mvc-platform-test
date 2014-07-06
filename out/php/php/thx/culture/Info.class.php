<?php

class thx_culture_Info {
	public function __construct(){}
	public $name;
	public $native;
	public $english;
	public $iso2;
	public $iso3;
	public $pluralRule;
	public function toString() {
		$GLOBALS['%s']->push("thx.culture.Info::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_or_null($this->native) . " (" . _hx_string_or_null($this->english) . ")";
			$GLOBALS['%s']->pop();
			return $tmp;
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
	function __toString() { return $this->toString(); }
}
