<?php

class ufront_view__TemplateData_TemplateData_Impl_ {
	public function __construct(){}
	static function _new($obj) {
		return $obj;
	}
	static function toObject($this1) {
		return $this1;
	}
	static function toMap($this1) {
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
		return $ret;
	}
	static function get($this1, $key) {
		return Reflect::field($this1, $key);
	}
	static function set($this1, $key, $val) {
		$this1->{$key} = $val;
		return $this1;
	}
	static function setMap($this1, $d) {
		if(null == $d) throw new HException('null iterable');
		$__hx__it = $d->keys();
		while($__hx__it->hasNext()) {
			$k = $__hx__it->next();
			$val = $d->get($k);
			$this2 = ufront_view__TemplateData_TemplateData_Impl_::toObject($this1);
			$this2->{$k} = $val;
			$this2;
			unset($val,$this2);
		}
		return $this1;
	}
	static function setObject($this1, $d) {
		{
			$_g = 0;
			$_g1 = Reflect::fields($d);
			while($_g < $_g1->length) {
				$k = $_g1[$_g];
				++$_g;
				$val = Reflect::field($d, $k);
				$this2 = ufront_view__TemplateData_TemplateData_Impl_::toObject($this1);
				$this2->{$k} = $val;
				$this2;
				unset($val,$this2,$k);
			}
		}
		return $this1;
	}
	static function fromObject($d) {
		return $d;
	}
	static function fromMap($d) {
		$m = _hx_anonymous(array());
		ufront_view__TemplateData_TemplateData_Impl_::setMap(ufront_view__TemplateData_TemplateData_Impl_::toObject($m), $d);
		return $m;
	}
	static function fromMany($datas) {
		$m = _hx_anonymous(array());
		if(null == $datas) throw new HException('null iterable');
		$__hx__it = $datas->iterator();
		while($__hx__it->hasNext()) {
			$d = $__hx__it->next();
			ufront_view__TemplateData_TemplateData_Impl_::setObject(ufront_view__TemplateData_TemplateData_Impl_::toObject($m), ufront_view__TemplateData_TemplateData_Impl_::toObject(ufront_view__TemplateData_TemplateData_Impl_::toObject($d)));
		}
		return $m;
	}
	function __toString() { return 'ufront.view._TemplateData.TemplateData_Impl_'; }
}
