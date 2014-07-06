<?php

class thx_culture_Language extends thx_culture_Info {
	static $languages;
	static function get_languages() {
		$GLOBALS['%s']->push("thx.culture.Language::get_languages");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === thx_culture_Language::$languages) {
			thx_culture_Language::$languages = new haxe_ds_StringMap();
		}
		{
			$tmp = thx_culture_Language::$languages;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get($name) {
		$GLOBALS['%s']->push("thx.culture.Language::get");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1 = thx_culture_Language::get_languages();
		$key = strtolower($name);
		{
			$tmp = $this1->get($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function names() {
		$GLOBALS['%s']->push("thx.culture.Language::names");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1 = thx_culture_Language::get_languages();
		{
			$tmp = $this1->keys();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function add($language) {
		$GLOBALS['%s']->push("thx.culture.Language::add");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!thx_culture_Language_0($language)) {
			$this2 = thx_culture_Language::get_languages();
			$this2->set($language->iso2, $language);
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_languages" => "get_languages");
	function __toString() { return 'thx.culture.Language'; }
}
function thx_culture_Language_0(&$language) {
	{
		$this1 = thx_culture_Language::get_languages();
		return $this1->exists($language->iso2);
	}
}
