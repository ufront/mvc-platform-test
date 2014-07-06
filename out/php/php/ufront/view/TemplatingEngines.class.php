<?php

class ufront_view_TemplatingEngines {
	public function __construct(){}
	static $haxe;
	static function get_haxe() {
		$GLOBALS['%s']->push("ufront.view.TemplatingEngines::get_haxe");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_anonymous(array("factory" => array(new _hx_lambda(array(), "ufront_view_TemplatingEngines_0"), 'execute'), "type" => "haxe.Template", "extensions" => (new _hx_array(array("html", "tpl")))));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_haxe" => "get_haxe");
	function __toString() { return 'ufront.view.TemplatingEngines'; }
}
function ufront_view_TemplatingEngines_0($tplString) {
	{
		$GLOBALS['%s']->push("ufront.view.TemplatingEngines::get_haxe@33");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$t = new haxe_Template($tplString);
		{
			$tmp = array(new _hx_lambda(array(&$t, &$tplString), "ufront_view_TemplatingEngines_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_view_TemplatingEngines_1(&$t, &$tplString, $data) {
	{
		$GLOBALS['%s']->push("ufront.view.TemplatingEngines::get_haxe@35");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = $t->execute($data, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
