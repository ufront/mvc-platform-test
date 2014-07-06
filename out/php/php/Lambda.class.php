<?php

class Lambda {
	public function __construct(){}
	static function harray($it) {
		$GLOBALS['%s']->push("Lambda::array");
		$__hx__spos = $GLOBALS['%s']->length;
		$a = new _hx_array(array());
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			unset($i);
			$i = $__hx__it->next();
			$a->push($i);
		}
		{
			$GLOBALS['%s']->pop();
			return $a;
		}
		$GLOBALS['%s']->pop();
	}
	static function has($it, $elt) {
		$GLOBALS['%s']->push("Lambda::has");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			unset($x);
			$x = $__hx__it->next();
			if((is_object($_t = $x) && !($_t instanceof Enum) ? $_t === $elt : $_t == $elt)) {
				$GLOBALS['%s']->pop();
				return true;
			}
			unset($_t);
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function indexOf($it, $v) {
		$GLOBALS['%s']->push("Lambda::indexOf");
		$__hx__spos = $GLOBALS['%s']->length;
		$i = 0;
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			unset($v2);
			$v2 = $__hx__it->next();
			if((is_object($_t = $v) && !($_t instanceof Enum) ? $_t === $v2 : $_t == $v2)) {
				$GLOBALS['%s']->pop();
				return $i;
			}
			$i++;
			unset($_t);
		}
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Lambda'; }
}
