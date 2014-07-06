<?php

class thx_collection_HashList {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("thx.collection.HashList::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->length = 0;
		$this->__keys = (new _hx_array(array()));
		$this->__hash = new haxe_ds_StringMap();
		$GLOBALS['%s']->pop();
	}}
	public $length;
	public function set($key, $value) {
		$GLOBALS['%s']->push("thx.collection.HashList::set");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!$this->__hash->exists($key)) {
			$this->__keys->push($key);
			$this->length++;
		}
		$this->__hash->set($key, $value);
		$GLOBALS['%s']->pop();
	}
	public function setAt($index, $key, $value) {
		$GLOBALS['%s']->push("thx.collection.HashList::setAt");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->remove($key);
		$this->__keys->insert($index, $key);
		$this->__hash->set($key, $value);
		$this->length++;
		$GLOBALS['%s']->pop();
	}
	public function get($key) {
		$GLOBALS['%s']->push("thx.collection.HashList::get");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->__hash->get($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAt($index) {
		$GLOBALS['%s']->push("thx.collection.HashList::getAt");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->__hash->get($this->__keys[$index]);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function indexOf($key) {
		$GLOBALS['%s']->push("thx.collection.HashList::indexOf");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!$this->__hash->exists($key)) {
			$GLOBALS['%s']->pop();
			return -1;
		}
		{
			$_g1 = 0;
			$_g = $this->__keys->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($this->__keys[$i] === $key) {
					$GLOBALS['%s']->pop();
					return $i;
				}
				unset($i);
			}
		}
		throw new HException("this should never happen");
		$GLOBALS['%s']->pop();
	}
	public function exists($key) {
		$GLOBALS['%s']->push("thx.collection.HashList::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->__hash->exists($key);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function remove($key) {
		$GLOBALS['%s']->push("thx.collection.HashList::remove");
		$__hx__spos = $GLOBALS['%s']->length;
		$item = $this->__hash->get($key);
		if($item === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$this->__hash->remove($key);
		$this->__keys->remove($key);
		$this->length--;
		{
			$GLOBALS['%s']->pop();
			return $item;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeAt($index) {
		$GLOBALS['%s']->push("thx.collection.HashList::removeAt");
		$__hx__spos = $GLOBALS['%s']->length;
		$key = $this->__keys[$index];
		if($key === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$item = $this->__hash->get($key);
		$this->__hash->remove($key);
		$this->__keys->remove($key);
		$this->length--;
		{
			$GLOBALS['%s']->pop();
			return $item;
		}
		$GLOBALS['%s']->pop();
	}
	public function keyAt($index) {
		$GLOBALS['%s']->push("thx.collection.HashList::keyAt");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->__keys[$index];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function keys() {
		$GLOBALS['%s']->push("thx.collection.HashList::keys");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->__keys->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function iterator() {
		$GLOBALS['%s']->push("thx.collection.HashList::iterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->harray()->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("thx.collection.HashList::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->__hash = new haxe_ds_StringMap();
		$this->__keys = (new _hx_array(array()));
		$this->length = 0;
		$GLOBALS['%s']->pop();
	}
	public function harray() {
		$GLOBALS['%s']->push("thx.collection.HashList::array");
		$__hx__spos = $GLOBALS['%s']->length;
		$values = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = $this->__keys;
			while($_g < $_g1->length) {
				$k = $_g1[$_g];
				++$_g;
				$values->push($this->__hash->get($k));
				unset($k);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $values;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("thx.collection.HashList::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$s = new StringBuf();
		$s->add("{");
		$it = $this->keys();
		$__hx__it = $it;
		while($__hx__it->hasNext()) {
			unset($i);
			$i = $__hx__it->next();
			$s->add($i);
			$s->add(" => ");
			$s->add(Std::string($this->get($i)));
			if($it->hasNext()) {
				$s->add(", ");
			}
		}
		$s->add("}");
		{
			$tmp = $s->b;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $__keys;
	public $__hash;
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
