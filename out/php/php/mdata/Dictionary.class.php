<?php

class mdata_Dictionary {
	public function __construct($weakKeys = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("mdata.Dictionary::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($weakKeys === null) {
			$weakKeys = false;
		}
		$this->weakKeys = $weakKeys;
		$this->clear();
		$GLOBALS['%s']->pop();
	}}
	public $_keys;
	public $_values;
	public $weakKeys;
	public function set($key, $value) {
		$GLOBALS['%s']->push("mdata.Dictionary::set");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			$_g = $this->_keys->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if((is_object($_t = $this->_keys[$i]) && !($_t instanceof Enum) ? $_t === $key : $_t == $key)) {
					$this->_keys[$i] = $key;
					$this->_values[$i] = $value;
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
				unset($i,$_t);
			}
		}
		$this->_keys->push($key);
		$this->_values->push($value);
		$GLOBALS['%s']->pop();
	}
	public function get($key) {
		$GLOBALS['%s']->push("mdata.Dictionary::get");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			$_g = $this->_keys->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if((is_object($_t = $this->_keys[$i]) && !($_t instanceof Enum) ? $_t === $key : $_t == $key)) {
					$tmp = $this->_values[$i];
					$GLOBALS['%s']->pop();
					return $tmp;
					unset($tmp);
				}
				unset($i,$_t);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function remove($key) {
		$GLOBALS['%s']->push("mdata.Dictionary::remove");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			$_g = $this->_keys->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if((is_object($_t = $this->_keys[$i]) && !($_t instanceof Enum) ? $_t === $key : $_t == $key)) {
					$this->_keys->splice($i, 1);
					$this->_values->splice($i, 1);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}
				unset($i,$_t);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function delete($key) {
		$GLOBALS['%s']->push("mdata.Dictionary::delete");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->remove($key);
		$GLOBALS['%s']->pop();
	}
	public function exists($key) {
		$GLOBALS['%s']->push("mdata.Dictionary::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			$_g1 = $this->_keys;
			while($_g < $_g1->length) {
				$k = $_g1[$_g];
				++$_g;
				if((is_object($_t = $k) && !($_t instanceof Enum) ? $_t === $key : $_t == $key)) {
					$GLOBALS['%s']->pop();
					return true;
				}
				unset($k,$_t);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("mdata.Dictionary::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->_keys = (new _hx_array(array()));
		$this->_values = (new _hx_array(array()));
		$GLOBALS['%s']->pop();
	}
	public function keys() {
		$GLOBALS['%s']->push("mdata.Dictionary::keys");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_keys->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function iterator() {
		$GLOBALS['%s']->push("mdata.Dictionary::iterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_values->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("mdata.Dictionary::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = "{";
		if(null == $this) throw new HException('null iterable');
		$__hx__it = $this->keys();
		while($__hx__it->hasNext()) {
			unset($key);
			$key = $__hx__it->next();
			$value = $this->get($key);
			$k = null;
			if(Std::is($key, _hx_qtype("Array"))) {
				$k = "[" . _hx_string_or_null($key->join(",")) . "]";
			} else {
				$k = Std::string($key);
			}
			$v = null;
			if(Std::is($value, _hx_qtype("Array"))) {
				$v = "[" . _hx_string_or_null($value->join(",")) . "]";
			} else {
				$v = Std::string($value);
			}
			$s .= _hx_string_or_null($k) . " => " . _hx_string_or_null($v) . ", ";
			unset($value,$v,$k);
		}
		if(strlen($s) > 2) {
			$s = _hx_substr($s, 0, strlen($s) - 2);
		}
		{
			$tmp = _hx_string_or_null($s) . "}";
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
