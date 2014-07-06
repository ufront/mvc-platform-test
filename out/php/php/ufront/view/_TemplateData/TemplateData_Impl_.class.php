<?php

class ufront_view__TemplateData_TemplateData_Impl_ {
	public function __construct(){}
	static function _new($obj = null) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::_new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($obj !== null) {
			$GLOBALS['%s']->pop();
			return $obj;
		} else {
			$tmp = _hx_anonymous(array());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function toObject($this1) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::toObject");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $this1;
		}
		$GLOBALS['%s']->pop();
	}
	static function toMap($this1) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::toMap");
		$__hx__spos = $GLOBALS['%s']->length;
		$ret = new haxe_ds_StringMap();
		{
			$_g = 0;
			$_g1 = Reflect::fields($this1);
			while($_g < $_g1->length) {
				$k = $_g1[$_g];
				++$_g;
				$v = Reflect::field($this1, $k);
				$ret->set($k, $v);
				$v;
				unset($v,$k);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function toStringMap($this1) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::toStringMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_view__TemplateData_TemplateData_Impl_::toMap($this1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get($this1, $key) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::get");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Reflect::field($this1, $key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function set($this1, $key, $val) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::set");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1->{$key} = $val;
		{
			$tmp = (($this1 !== null) ? $this1 : _hx_anonymous(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function array_set($this1, $key, $val) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::array_set");
		$__hx__spos = $GLOBALS['%s']->length;
		$this1->{$key} = $val;
		{
			$GLOBALS['%s']->pop();
			return $val;
		}
		$GLOBALS['%s']->pop();
	}
	static function setMap($this1, $map) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::setMap");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null == $map) throw new HException('null iterable');
		$__hx__it = $map->keys();
		while($__hx__it->hasNext()) {
			unset($k);
			$k = $__hx__it->next();
			ufront_view__TemplateData_TemplateData_Impl_::set($this1, $k, $map->get($k));
		}
		{
			$tmp = (($this1 !== null) ? $this1 : _hx_anonymous(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function setObject($this1, $d) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::setObject");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			$_g1 = Reflect::fields($d);
			while($_g < $_g1->length) {
				$k = $_g1[$_g];
				++$_g;
				ufront_view__TemplateData_TemplateData_Impl_::set($this1, $k, Reflect::field($d, $k));
				unset($k);
			}
		}
		{
			$tmp = (($this1 !== null) ? $this1 : _hx_anonymous(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromMap($d) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::fromMap");
		$__hx__spos = $GLOBALS['%s']->length;
		$m = null;
		{
			$obj = _hx_anonymous(array());
			if($obj !== null) {
				$m = $obj;
			} else {
				$m = _hx_anonymous(array());
			}
		}
		ufront_view__TemplateData_TemplateData_Impl_::setMap($m, $d);
		{
			$GLOBALS['%s']->pop();
			return $m;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromStringMap($d) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::fromStringMap");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_view__TemplateData_TemplateData_Impl_::fromMap($d);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromMany($dataSets) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::fromMany");
		$__hx__spos = $GLOBALS['%s']->length;
		$combined = null;
		{
			$obj = _hx_anonymous(array());
			if($obj !== null) {
				$combined = $obj;
			} else {
				$combined = _hx_anonymous(array());
			}
		}
		if(null == $dataSets) throw new HException('null iterable');
		$__hx__it = $dataSets->iterator();
		while($__hx__it->hasNext()) {
			unset($d);
			$d = $__hx__it->next();
			if(Std::is($d, _hx_qtype("haxe.ds.StringMap"))) {
				$map = $d;
				ufront_view__TemplateData_TemplateData_Impl_::setMap($combined, $map);
				unset($map);
			} else {
				$obj1 = $d;
				ufront_view__TemplateData_TemplateData_Impl_::setObject($combined, $obj1);
				unset($obj1);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $combined;
		}
		$GLOBALS['%s']->pop();
	}
	static function fromObject($d) {
		$GLOBALS['%s']->push("ufront.view._TemplateData.TemplateData_Impl_::fromObject");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = (($d !== null) ? $d : _hx_anonymous(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.view._TemplateData.TemplateData_Impl_'; }
}
