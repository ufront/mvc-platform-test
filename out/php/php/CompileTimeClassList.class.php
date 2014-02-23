<?php

class CompileTimeClassList {
	public function __construct(){}
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	static $lists = null;
	static function get($id) {
		if(CompileTimeClassList::$lists === null) {
			CompileTimeClassList::initialise();
		}
		return CompileTimeClassList::$lists->get($id);
	}
	static function initialise() {
		CompileTimeClassList::$lists = new haxe_ds_StringMap();
		$m = haxe_rtti_Meta::getType(_hx_qtype("CompileTimeClassList"));
		if($m->classLists !== null) {
			$_g = 0;
			$_g1 = $m->classLists;
			while($_g < $_g1->length) {
				$item = $_g1[$_g];
				++$_g;
				$array = $item;
				$listID = $array[0];
				$classes = _hx_string_call($item[1], "split", array(","))->map(array(new _hx_lambda(array(&$_g, &$_g1, &$array, &$item, &$listID, &$m), "CompileTimeClassList_0"), 'execute'));
				CompileTimeClassList::$lists->set($listID, $classes);
				unset($listID,$item,$classes,$array);
			}
		}
	}
	function __toString() { return 'CompileTimeClassList'; }
}
CompileTimeClassList::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("classLists" => (new _hx_array(array((new _hx_array(array("null,true,ufront.web.Controller", "testsite.Routes,ufront.web.DefaultController,ufront.web.TestController"))), (new _hx_array(array("null,true,ufront.api.UFApi", ""))))))))));
function CompileTimeClassList_0(&$_g, &$_g1, &$array, &$item, &$listID, &$m, $typeName) {
	{
		return Type::resolveClass($typeName);
	}
}
