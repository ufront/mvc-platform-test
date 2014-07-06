<?php

class ufront_core__MultiValueMap_MultiValueMap_Impl_ {
	public function __construct(){}
	static function _new() {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new haxe_ds_StringMap();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function keys($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::keys");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->keys();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function exists($this1, $name) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->exists($name);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function iterator($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::iterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_deref((ufront_core__MultiValueMap_MultiValueMap_Impl__0($this1)))->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get($this1, $name) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::get");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this1->exists($name)) {
			$arr = $this1->get($name);
			{
				$tmp = $arr[$arr->length - 1];
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function getAll($this1, $name) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::getAll");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this1->exists($name)) {
			$tmp = $this1->get($name);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set($this1, $name, $value) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::set");
		$__hx__spos = $GLOBALS['%s']->length;
		if($value !== null) {
			if(StringTools::endsWith($name, "[]")) {
				$name = _hx_substr($name, 0, strlen($name) - 2);
			} else {
				$name = $name;
			}
			$this1->set($name, (new _hx_array(array($value))));
		}
		$GLOBALS['%s']->pop();
	}
	static function add($this1, $name, $value) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::add");
		$__hx__spos = $GLOBALS['%s']->length;
		if($value !== null) {
			if($name !== null) {
				if(StringTools::endsWith($name, "[]")) {
					$name = _hx_substr($name, 0, strlen($name) - 2);
				} else {
					$name = $name;
				}
			} else {
				$name = "";
			}
			if($this1->exists($name)) {
				$this1->get($name)->push($value);
			} else {
				$this1->set($name, (new _hx_array(array($value))));
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function remove($this1, $key) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::remove");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this1->remove($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function hclone($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::clone");
		$__hx__spos = $GLOBALS['%s']->length;
		$newMap = new haxe_ds_StringMap();
		if(null == $this1) throw new HException('null iterable');
		$__hx__it = $this1->keys();
		while($__hx__it->hasNext()) {
			unset($k);
			$k = $__hx__it->next();
			$_g = 0;
			$_g1 = $this1->get($k);
			while($_g < $_g1->length) {
				$v = $_g1[$_g];
				++$_g;
				ufront_core__MultiValueMap_MultiValueMap_Impl_::add($newMap, $k, $v);
				unset($v);
			}
			unset($_g1,$_g);
		}
		{
			$GLOBALS['%s']->pop();
			return $newMap;
		}
		$GLOBALS['%s']->pop();
	}
	static function toString($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$sb = new StringBuf();
		$sb->add("[");
		if(null == $this1) throw new HException('null iterable');
		$__hx__it = $this1->keys();
		while($__hx__it->hasNext()) {
			unset($key);
			$key = $__hx__it->next();
			$sb->add("\x0A\x09" . _hx_string_or_null($key) . " = [");
			$sb->add(ufront_core__MultiValueMap_MultiValueMap_Impl_::getAll($this1, $key)->join(", "));
			$sb->add("]");
		}
		if(strlen($sb->b) > 1) {
			$sb->add("\x0A");
		}
		$sb->add("]");
		{
			$tmp = $sb->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function stripArrayFromName($this1, $name) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::stripArrayFromName");
		$__hx__spos = $GLOBALS['%s']->length;
		if(StringTools::endsWith($name, "[]")) {
			$tmp = _hx_substr($name, 0, strlen($name) - 2);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $name;
		}
		$GLOBALS['%s']->pop();
	}
	static function toStringMap($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::toStringMap");
		$__hx__spos = $GLOBALS['%s']->length;
		$sm = new haxe_ds_StringMap();
		if(null == $this1) throw new HException('null iterable');
		$__hx__it = $this1->keys();
		while($__hx__it->hasNext()) {
			unset($key);
			$key = $__hx__it->next();
			$sm->set($key, ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this1, $key));
		}
		{
			$GLOBALS['%s']->pop();
			return $sm;
		}
		$GLOBALS['%s']->pop();
	}
	static function toMap($this1) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::toMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_core__MultiValueMap_MultiValueMap_Impl_::toStringMap($this1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromStringMap($stringMap) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::fromStringMap");
		$__hx__spos = $GLOBALS['%s']->length;
		$qm = new haxe_ds_StringMap();
		if($stringMap !== null) {
			if(null == $stringMap) throw new HException('null iterable');
			$__hx__it = $stringMap->keys();
			while($__hx__it->hasNext()) {
				unset($key);
				$key = $__hx__it->next();
				ufront_core__MultiValueMap_MultiValueMap_Impl_::set($qm, $key, $stringMap->get($key));
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $qm;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromMap($map) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::fromMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_core__MultiValueMap_MultiValueMap_Impl_::fromStringMap($map);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function combine($maps) {
		$GLOBALS['%s']->push("ufront.core._MultiValueMap.MultiValueMap_Impl_::combine");
		$__hx__spos = $GLOBALS['%s']->length;
		$qm = new haxe_ds_StringMap();
		{
			$_g = 0;
			while($_g < $maps->length) {
				$map = $maps[$_g];
				++$_g;
				if(null == $map) throw new HException('null iterable');
				$__hx__it = $map->keys();
				while($__hx__it->hasNext()) {
					unset($key);
					$key = $__hx__it->next();
					$_g1 = 0;
					$_g2 = ufront_core__MultiValueMap_MultiValueMap_Impl_::getAll($map, $key);
					while($_g1 < $_g2->length) {
						$val = $_g2[$_g1];
						++$_g1;
						ufront_core__MultiValueMap_MultiValueMap_Impl_::add($qm, $key, $val);
						unset($val);
					}
					unset($_g2,$_g1);
				}
				unset($map);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $qm;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.core._MultiValueMap.MultiValueMap_Impl_'; }
}
function ufront_core__MultiValueMap_MultiValueMap_Impl__0(&$this1) {
	{
		$_g = (new _hx_array(array()));
		if(null == $this1) throw new HException('null iterable');
		$__hx__it = $this1->iterator();
		while($__hx__it->hasNext()) {
			unset($arr);
			$arr = $__hx__it->next();
			$_g1 = 0;
			while($_g1 < $arr->length) {
				$v = $arr[$_g1];
				++$_g1;
				$_g->push($v);
				unset($v);
			}
			unset($_g1);
		}
		return $_g;
	}
}
