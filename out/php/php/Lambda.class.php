<?php

class Lambda {
	public function __construct(){}
	static function harray($it) {
		$a = new _hx_array(array());
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			$i = $__hx__it->next();
			$a->push($i);
		}
		return $a;
	}
	static function has($it, $elt) {
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			$x = $__hx__it->next();
			if((is_object($_t = $x) && !($_t instanceof Enum) ? $_t === $elt : $_t == $elt)) {
				return true;
			}
			unset($_t);
		}
		return false;
	}
	static function indexOf($it, $v) {
		$i = 0;
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			$v2 = $__hx__it->next();
			if((is_object($_t = $v) && !($_t instanceof Enum) ? $_t === $v2 : $_t == $v2)) {
				return $i;
			}
			$i++;
			unset($_t);
		}
		return -1;
	}
	function __toString() { return 'Lambda'; }
}
