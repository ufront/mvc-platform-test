<?php

class CompileTimeClassList {
	public function __construct(){}
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	static $lists = null;
	static function get($id) {
		$GLOBALS['%s']->push("CompileTimeClassList::get");
		$__hx__spos = $GLOBALS['%s']->length;
		if(CompileTimeClassList::$lists === null) {
			CompileTimeClassList::initialise();
		}
		{
			$tmp = CompileTimeClassList::$lists->get($id);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTyped($id, $type) {
		$GLOBALS['%s']->push("CompileTimeClassList::getTyped");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = CompileTimeClassList::get($id);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function initialise() {
		$GLOBALS['%s']->push("CompileTimeClassList::initialise");
		$__hx__spos = $GLOBALS['%s']->length;
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
				$list = new HList();
				{
					$_g2 = 0;
					$_g3 = _hx_explode(",", $array[1]);
					while($_g2 < $_g3->length) {
						$typeName = $_g3[$_g2];
						++$_g2;
						$type = Type::resolveClass($typeName);
						if($type !== null) {
							$list->push($type);
						}
						unset($typeName,$type);
					}
					unset($_g3,$_g2);
				}
				CompileTimeClassList::$lists->set($listID, $list);
				unset($listID,$list,$item,$array);
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'CompileTimeClassList'; }
}
CompileTimeClassList::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("classLists" => (new _hx_array(array((new _hx_array(array("null,true,ufront.web.Controller", "testsite.Routes,ufront.web.DefaultController,ufront.web.TestController"))), (new _hx_array(array("null,true,ufront.api.UFApi", ""))))))))));
