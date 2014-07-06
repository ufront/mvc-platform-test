<?php

class thx_culture_Culture extends thx_culture_Info {
	public $language;
	public $date;
	public $englishCurrency;
	public $nativeCurrency;
	public $currencySymbol;
	public $currencyIso;
	public $englishRegion;
	public $nativeRegion;
	public $isMetric;
	public $digits;
	public $signNeg;
	public $signPos;
	public $symbolNaN;
	public $symbolPercent;
	public $symbolPermille;
	public $symbolNegInf;
	public $symbolPosInf;
	public $number;
	public $currency;
	public $percent;
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
	static $cultures;
	static function get_cultures() {
		$GLOBALS['%s']->push("thx.culture.Culture::get_cultures");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === thx_culture_Culture::$cultures) {
			thx_culture_Culture::$cultures = new haxe_ds_StringMap();
		}
		{
			$tmp = thx_culture_Culture::$cultures;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get($name) {
		$GLOBALS['%s']->push("thx.culture.Culture::get");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1 = thx_culture_Culture::get_cultures();
		$key = strtolower($name);
		{
			$tmp = $this1->get($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function names() {
		$GLOBALS['%s']->push("thx.culture.Culture::names");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1 = thx_culture_Culture::get_cultures();
		{
			$tmp = $this1->keys();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function exists($culture) {
		$GLOBALS['%s']->push("thx.culture.Culture::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1 = thx_culture_Culture::get_cultures();
		$key = strtolower($culture);
		{
			$tmp = $this1->exists($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $_defaultCulture;
	static function get_defaultCulture() {
		$GLOBALS['%s']->push("thx.culture.Culture::get_defaultCulture");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === thx_culture_Culture::$_defaultCulture) {
			$tmp = thx_cultures_EnUS::get_culture();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = thx_culture_Culture::$_defaultCulture;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set_defaultCulture($culture) {
		$GLOBALS['%s']->push("thx.culture.Culture::set_defaultCulture");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = thx_culture_Culture::$_defaultCulture = $culture;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function add($culture) {
		$GLOBALS['%s']->push("thx.culture.Culture::add");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === thx_culture_Culture::$_defaultCulture) {
			thx_culture_Culture::$_defaultCulture = $culture;
		}
		$name = strtolower($culture->name);
		if(!thx_culture_Culture_0($culture, $name)) {
			$this2 = thx_culture_Culture::get_cultures();
			$this2->set($name, $culture);
		}
		$GLOBALS['%s']->pop();
	}
	static function loadAll() {
		$GLOBALS['%s']->push("thx.culture.Culture::loadAll");
		$__hx__spos = $GLOBALS['%s']->length;
		$dir = _hx_string_or_null(Sys::getCwd()) . "lib/thx/cultures/";
		{
			$_g = 0;
			$_g1 = sys_FileSystem::readDirectory($dir);
			while($_g < $_g1->length) {
				$file = $_g1[$_g];
				++$_g;
				require_once(_hx_string_or_null($dir) . _hx_string_or_null($file));
				unset($file);
			}
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_defaultCulture" => "set_defaultCulture","get_defaultCulture" => "get_defaultCulture","get_cultures" => "get_cultures");
	function __toString() { return 'thx.culture.Culture'; }
}
function thx_culture_Culture_0(&$culture, &$name) {
	{
		$this1 = thx_culture_Culture::get_cultures();
		return $this1->exists($name);
	}
}
