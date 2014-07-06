<?php

class Arrays {
	public function __construct(){}
	static function addIf($arr, $condition = null, $value) {
		$GLOBALS['%s']->push("Arrays::addIf");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $condition) {
			if($condition) {
				$arr->push($value);
			}
		} else {
			if(null !== $value) {
				$arr->push($value);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function add($arr, $value) {
		$GLOBALS['%s']->push("Arrays::add");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr->push($value);
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function delete($arr, $value) {
		$GLOBALS['%s']->push("Arrays::delete");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr->remove($value);
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function removef($arr, $f) {
		$GLOBALS['%s']->push("Arrays::removef");
		$__hx__spos = $GLOBALS['%s']->length;
		$index = -1;
		{
			$_g1 = 0;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(call_user_func_array($f, array($arr[$i]))) {
					$index = $i;
					break;
				}
				unset($i);
			}
		}
		if($index < 0) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$arr->splice($index, 1);
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static function deletef($arr, $f) {
		$GLOBALS['%s']->push("Arrays::deletef");
		$__hx__spos = $GLOBALS['%s']->length;
		Arrays::removef($arr, $f);
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function filter($arr, $f) {
		$GLOBALS['%s']->push("Arrays::filter");
		$__hx__spos = $GLOBALS['%s']->length;
		$result = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $arr->length) {
				$i = $arr[$_g];
				++$_g;
				if(call_user_func_array($f, array($i))) {
					$result->push($i);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function min($arr, $f = null) {
		$GLOBALS['%s']->push("Arrays::min");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if(null === $f) {
			$a = $arr[0];
			$p = 0;
			$comp = Dynamics::comparef($a);
			{
				$_g1 = 1;
				$_g = $arr->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(call_user_func_array($comp, array($a, $arr[$i])) > 0) {
						$a = $arr[$p = $i];
					}
					unset($i);
				}
			}
			{
				$tmp = $arr[$p];
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$a1 = call_user_func_array($f, array($arr[0]));
			$p1 = 0;
			$b = null;
			{
				$_g11 = 1;
				$_g2 = $arr->length;
				while($_g11 < $_g2) {
					$i1 = $_g11++;
					if($a1 > ($b = call_user_func_array($f, array($arr[$i1])))) {
						$a1 = $b;
						$p1 = $i1;
					}
					unset($i1);
				}
			}
			{
				$tmp = $arr[$p1];
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function floatMin($arr, $f) {
		$GLOBALS['%s']->push("Arrays::floatMin");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$tmp = Math::$NaN;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$a = call_user_func_array($f, array($arr[0]));
		$b = null;
		{
			$_g1 = 1;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($a > ($b = call_user_func_array($f, array($arr[$i])))) {
					$a = $b;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $a;
		}
		$GLOBALS['%s']->pop();
	}
	static function bounds($arr, $f = null) {
		$GLOBALS['%s']->push("Arrays::bounds");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if(null === $f) {
			$a = $arr[0];
			$p = 0;
			$b = $arr[0];
			$q = 0;
			{
				$_g1 = 1;
				$_g = $arr->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$comp = Dynamics::comparef($a);
					if(call_user_func_array($comp, array($a, $arr[$i])) > 0) {
						$a = $arr[$p = $i];
					}
					if(call_user_func_array($comp, array($b, $arr[$i])) < 0) {
						$b = $arr[$q = $i];
					}
					unset($i,$comp);
				}
			}
			{
				$tmp = (new _hx_array(array($arr[$p], $arr[$q])));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$a1 = call_user_func_array($f, array($arr[0]));
			$p1 = 0;
			$b1 = null;
			$c = call_user_func_array($f, array($arr[0]));
			$q1 = 0;
			$d = null;
			{
				$_g11 = 1;
				$_g2 = $arr->length;
				while($_g11 < $_g2) {
					$i1 = $_g11++;
					if($a1 > ($b1 = call_user_func_array($f, array($arr[$i1])))) {
						$a1 = $b1;
						$p1 = $i1;
					}
					unset($i1);
				}
			}
			{
				$_g12 = 1;
				$_g3 = $arr->length;
				while($_g12 < $_g3) {
					$i2 = $_g12++;
					if($c < ($d = call_user_func_array($f, array($arr[$i2])))) {
						$c = $d;
						$q1 = $i2;
					}
					unset($i2);
				}
			}
			{
				$tmp = (new _hx_array(array($arr[$p1], $arr[$q1])));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function boundsFloat($arr, $f) {
		$GLOBALS['%s']->push("Arrays::boundsFloat");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$a = call_user_func_array($f, array($arr[0]));
		$b = null;
		$c = call_user_func_array($f, array($arr[0]));
		$d = null;
		{
			$_g1 = 1;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($a > ($b = call_user_func_array($f, array($arr[$i])))) {
					$a = $b;
				}
				if($c < ($d = call_user_func_array($f, array($arr[$i])))) {
					$c = $d;
				}
				unset($i);
			}
		}
		{
			$tmp = (new _hx_array(array($a, $c)));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function max($arr, $f = null) {
		$GLOBALS['%s']->push("Arrays::max");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if(null === $f) {
			$a = $arr[0];
			$p = 0;
			$comp = Dynamics::comparef($a);
			{
				$_g1 = 1;
				$_g = $arr->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(call_user_func_array($comp, array($a, $arr[$i])) < 0) {
						$a = $arr[$p = $i];
					}
					unset($i);
				}
			}
			{
				$tmp = $arr[$p];
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$a1 = call_user_func_array($f, array($arr[0]));
			$p1 = 0;
			$b = null;
			{
				$_g11 = 1;
				$_g2 = $arr->length;
				while($_g11 < $_g2) {
					$i1 = $_g11++;
					if($a1 < ($b = call_user_func_array($f, array($arr[$i1])))) {
						$a1 = $b;
						$p1 = $i1;
					}
					unset($i1);
				}
			}
			{
				$tmp = $arr[$p1];
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function floatMax($arr, $f) {
		$GLOBALS['%s']->push("Arrays::floatMax");
		$__hx__spos = $GLOBALS['%s']->length;
		if($arr->length === 0) {
			$tmp = Math::$NaN;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$a = call_user_func_array($f, array($arr[0]));
		$b = null;
		{
			$_g1 = 1;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($a < ($b = call_user_func_array($f, array($arr[$i])))) {
					$a = $b;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $a;
		}
		$GLOBALS['%s']->pop();
	}
	static function flatten($arr) {
		$GLOBALS['%s']->push("Arrays::flatten");
		$__hx__spos = $GLOBALS['%s']->length;
		$r = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $arr->length) {
				$v = $arr[$_g];
				++$_g;
				$r = $r->concat($v);
				unset($v);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $r;
		}
		$GLOBALS['%s']->pop();
	}
	static function map($arr, $f) {
		$GLOBALS['%s']->push("Arrays::map");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::map($arr->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function reduce($arr, $f, $initialValue) {
		$GLOBALS['%s']->push("Arrays::reduce");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::reduce($arr->iterator(), $f, $initialValue);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function order($arr, $f = null) {
		$GLOBALS['%s']->push("Arrays::order");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr->sort(Arrays_0($arr, $f));
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function orderMultiple($arr, $f = null, $rest) {
		$GLOBALS['%s']->push("Arrays::orderMultiple");
		$__hx__spos = $GLOBALS['%s']->length;
		$swap = true;
		$t = null;
		$rest->remove($arr);
		while($swap) {
			$swap = false;
			{
				$_g1 = 0;
				$_g = $arr->length - 1;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(call_user_func_array($f, array($arr[$i], $arr[$i + 1])) > 0) {
						$swap = true;
						$t = $arr[$i];
						$arr[$i] = $arr[$i + 1];
						$arr[$i + 1] = $t;
						{
							$_g2 = 0;
							while($_g2 < $rest->length) {
								$a = $rest[$_g2];
								++$_g2;
								$t = $a[$i];
								$a[$i] = $a[$i + 1];
								$a[$i + 1] = $t;
								unset($a);
							}
							unset($_g2);
						}
					}
					unset($i);
				}
				unset($_g1,$_g);
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function split($arr, $f = null) {
		$GLOBALS['%s']->push("Arrays::split");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $f) {
			$f = array(new _hx_lambda(array(&$arr, &$f), "Arrays_1"), 'execute');
		}
		$arrays = (new _hx_array(array()));
		$i = -1;
		$values = (new _hx_array(array()));
		$value = null;
		{
			$_g1 = 0;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				if(call_user_func_array($f, array($value = $arr[$i1], $i1))) {
					$values = (new _hx_array(array()));
				} else {
					if($values->length === 0) {
						$arrays->push($values);
					}
					$values->push($value);
				}
				unset($i1);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arrays;
		}
		$GLOBALS['%s']->pop();
	}
	static function exists($arr, $value = null, $f = null) {
		$GLOBALS['%s']->push("Arrays::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $f) {
			$_g = 0;
			while($_g < $arr->length) {
				$v = $arr[$_g];
				++$_g;
				if(call_user_func_array($f, array($v))) {
					$GLOBALS['%s']->pop();
					return true;
				}
				unset($v);
			}
		} else {
			$_g1 = 0;
			while($_g1 < $arr->length) {
				$v1 = $arr[$_g1];
				++$_g1;
				if((is_object($_t = $v1) && !($_t instanceof Enum) ? $_t === $value : $_t == $value)) {
					$GLOBALS['%s']->pop();
					return true;
				}
				unset($v1,$_t);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function format($v, $param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Arrays::format");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "J");
		$format = $params->shift();
		switch($format) {
		case "J":{
			if($v->length === 0) {
				$empty = null;
				if(null === $params[1]) {
					$empty = "[]";
				} else {
					$empty = $params[1];
				}
				{
					$GLOBALS['%s']->pop();
					return $empty;
				}
			}
			$sep = null;
			if(null === $params[2]) {
				$sep = ", ";
			} else {
				$sep = $params[2];
			}
			$max = null;
			if($params[3] === null) {
				$max = null;
			} else {
				if("" === $params[3]) {
					$max = null;
				} else {
					$max = Std::parseInt($params[3]);
				}
			}
			if(null !== $max && $max < $v->length) {
				$elipsis = null;
				if(null === $params[4]) {
					$elipsis = " ...";
				} else {
					$elipsis = $params[4];
				}
				{
					$tmp = _hx_string_or_null(_hx_deref((Arrays_2($culture, $elipsis, $format, $max, $param, $params, $sep, $v)))->join($sep)) . _hx_string_or_null($elipsis);
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			} else {
				$tmp = Iterators::map($v->iterator(), array(new _hx_lambda(array(&$culture, &$format, &$max, &$param, &$params, &$sep, &$v), "Arrays_3"), 'execute'))->join($sep);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case "C":{
			$tmp = Ints::format($v->length, "I", (new _hx_array(array())), $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		default:{
			throw new HException("Unsupported array format: " . _hx_string_or_null($format));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Arrays::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "J");
		$format = $params->shift();
		switch($format) {
		case "J":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Arrays_4"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "C":{
			$f = Ints::formatf("I", (new _hx_array(array())), $culture);
			{
				$tmp = array(new _hx_lambda(array(&$culture, &$f, &$format, &$param, &$params), "Arrays_5"), 'execute');
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		default:{
			throw new HException("Unsupported array format: " . _hx_string_or_null($format));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Arrays::interpolatef($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		$functions = (new _hx_array(array()));
		$i = 0;
		$min = null;
		{
			$a1 = $a->length;
			$b1 = $b->length;
			if($a1 < $b1) {
				$min = $a1;
			} else {
				$min = $b1;
			}
		}
		while($i < $min) {
			if($a[$i] === $b[$i]) {
				$v = $b[$i];
				$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v), "Arrays_6"), 'execute'));
				unset($v);
			} else {
				$functions->push(Floats::interpolatef($a[$i], $b[$i], $equation));
			}
			$i++;
		}
		while($i < $b->length) {
			$v1 = $b[$i];
			$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1), "Arrays_7"), 'execute'));
			$i++;
			unset($v1);
		}
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min), "Arrays_8"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolateStrings($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolateStrings");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Arrays::interpolateStringsf($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolateStringsf($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolateStringsf");
		$__hx__spos = $GLOBALS['%s']->length;
		$functions = (new _hx_array(array()));
		$i = 0;
		$min = null;
		{
			$a1 = $a->length;
			$b1 = $b->length;
			if($a1 < $b1) {
				$min = $a1;
			} else {
				$min = $b1;
			}
		}
		while($i < $min) {
			if($a[$i] === $b[$i]) {
				$v = $b[$i];
				$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v), "Arrays_9"), 'execute'));
				unset($v);
			} else {
				$functions->push(Strings::interpolatef($a[$i], $b[$i], $equation));
			}
			$i++;
		}
		while($i < $b->length) {
			$v1 = $b[$i];
			$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1), "Arrays_10"), 'execute'));
			$i++;
			unset($v1);
		}
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min), "Arrays_11"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolateInts($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolateInts");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Arrays::interpolateIntsf($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolateIntsf($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Arrays::interpolateIntsf");
		$__hx__spos = $GLOBALS['%s']->length;
		$functions = (new _hx_array(array()));
		$i = 0;
		$min = null;
		{
			$a1 = $a->length;
			$b1 = $b->length;
			if($a1 < $b1) {
				$min = $a1;
			} else {
				$min = $b1;
			}
		}
		while($i < $min) {
			if($a[$i] === $b[$i]) {
				$v = $b[$i];
				$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v), "Arrays_12"), 'execute'));
				unset($v);
			} else {
				$functions->push(Ints::interpolatef($a[$i], $b[$i], $equation));
			}
			$i++;
		}
		while($i < $b->length) {
			$v1 = $b[$i];
			$functions->push(array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1), "Arrays_13"), 'execute'));
			$i++;
			unset($v1);
		}
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min), "Arrays_14"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function indexOf($arr, $el) {
		$GLOBALS['%s']->push("Arrays::indexOf");
		$__hx__spos = $GLOBALS['%s']->length;
		$len = $arr->length;
		{
			$_g = 0;
			while($_g < $len) {
				$i = $_g++;
				if((is_object($_t = $arr[$i]) && !($_t instanceof Enum) ? $_t === $el : $_t == $el)) {
					$GLOBALS['%s']->pop();
					return $i;
				}
				unset($i,$_t);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	static function every($arr, $f) {
		$GLOBALS['%s']->push("Arrays::every");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(!call_user_func_array($f, array($arr[$i], $i))) {
					$GLOBALS['%s']->pop();
					return false;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static function each($arr, $f) {
		$GLOBALS['%s']->push("Arrays::each");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g1 = 0;
		$_g = $arr->length;
		while($_g1 < $_g) {
			$i = $_g1++;
			call_user_func_array($f, array($arr[$i], $i));
			unset($i);
		}
		$GLOBALS['%s']->pop();
	}
	static function any($arr, $f) {
		$GLOBALS['%s']->push("Arrays::any");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::any($arr->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function all($arr, $f) {
		$GLOBALS['%s']->push("Arrays::all");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::all($arr->iterator(), $f);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function random($arr) {
		$GLOBALS['%s']->push("Arrays::random");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $arr[Std::random($arr->length)];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string($arr) {
		$GLOBALS['%s']->push("Arrays::string");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "[" . _hx_string_or_null(Iterators::map($arr->iterator(), array(new _hx_lambda(array(&$arr), "Arrays_15"), 'execute'))->join(", ")) . "]";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function last($arr) {
		$GLOBALS['%s']->push("Arrays::last");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $arr[$arr->length - 1];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function lastf($arr, $f) {
		$GLOBALS['%s']->push("Arrays::lastf");
		$__hx__spos = $GLOBALS['%s']->length;
		$i = $arr->length;
		while(--$i >= 0) {
			if(call_user_func_array($f, array($arr[$i]))) {
				$tmp = $arr[$i];
				$GLOBALS['%s']->pop();
				return $tmp;
				unset($tmp);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function first($arr) {
		$GLOBALS['%s']->push("Arrays::first");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $arr[0];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function firstf($arr, $f) {
		$GLOBALS['%s']->push("Arrays::firstf");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			while($_g < $arr->length) {
				$v = $arr[$_g];
				++$_g;
				if(call_user_func_array($f, array($v))) {
					$GLOBALS['%s']->pop();
					return $v;
				}
				unset($v);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function bisect($a, $x, $lo = null, $hi = null) {
		$GLOBALS['%s']->push("Arrays::bisect");
		$__hx__spos = $GLOBALS['%s']->length;
		if($lo === null) {
			$lo = 0;
		}
		{
			$tmp = Arrays::bisectRight($a, $x, $lo, $hi);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function bisectRight($a, $x, $lo = null, $hi = null) {
		$GLOBALS['%s']->push("Arrays::bisectRight");
		$__hx__spos = $GLOBALS['%s']->length;
		if($lo === null) {
			$lo = 0;
		}
		if(null === $hi) {
			$hi = $a->length;
		}
		while($lo < $hi) {
			$mid = $lo + $hi >> 1;
			if($x < $a[$mid]) {
				$hi = $mid;
			} else {
				$lo = $mid + 1;
			}
			unset($mid);
		}
		{
			$GLOBALS['%s']->pop();
			return $lo;
		}
		$GLOBALS['%s']->pop();
	}
	static function bisectLeft($a, $x, $lo = null, $hi = null) {
		$GLOBALS['%s']->push("Arrays::bisectLeft");
		$__hx__spos = $GLOBALS['%s']->length;
		if($lo === null) {
			$lo = 0;
		}
		if(null === $hi) {
			$hi = $a->length;
		}
		while($lo < $hi) {
			$mid = $lo + $hi >> 1;
			if($a->a[$mid] < $x) {
				$lo = $mid + 1;
			} else {
				$hi = $mid;
			}
			unset($mid);
		}
		{
			$GLOBALS['%s']->pop();
			return $lo;
		}
		$GLOBALS['%s']->pop();
	}
	static function nearest($a, $x, $f) {
		$GLOBALS['%s']->push("Arrays::nearest");
		$__hx__spos = $GLOBALS['%s']->length;
		$delta = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g = $a->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$delta->push(_hx_anonymous(array("i" => $i, "v" => Math::abs(call_user_func_array($f, array($a[$i])) - $x))));
				unset($i);
			}
		}
		$delta->sort(array(new _hx_lambda(array(&$a, &$delta, &$f, &$x), "Arrays_16"), 'execute'));
		{
			$tmp = $a[_hx_array_get($delta, 0)->i];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Arrays::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		$v = null;
		if(($v = $a->length - $b->length) !== 0) {
			$GLOBALS['%s']->pop();
			return $v;
		}
		{
			$_g1 = 0;
			$_g = $a->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(($v = Dynamics::compare($a[$i], $b[$i])) !== 0) {
					$GLOBALS['%s']->pop();
					return $v;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	static function product($a) {
		$GLOBALS['%s']->push("Arrays::product");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a->length === 0) {
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$arr = $a->copy();
		$result = (new _hx_array(array()));
		$temp = null;
		{
			$_g = 0;
			$_g1 = $arr[0];
			while($_g < $_g1->length) {
				$value = $_g1[$_g];
				++$_g;
				$result->push((new _hx_array(array($value))));
				unset($value);
			}
		}
		{
			$_g11 = 1;
			$_g2 = $arr->length;
			while($_g11 < $_g2) {
				$i = $_g11++;
				$temp = (new _hx_array(array()));
				{
					$_g21 = 0;
					while($_g21 < $result->length) {
						$acc = $result[$_g21];
						++$_g21;
						$_g3 = 0;
						$_g4 = $arr[$i];
						while($_g3 < $_g4->length) {
							$value1 = $_g4[$_g3];
							++$_g3;
							$temp->push($acc->copy()->concat((new _hx_array(array($value1)))));
							unset($value1);
						}
						unset($acc,$_g4,$_g3);
					}
					unset($_g21);
				}
				$result = $temp;
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function rotate($a) {
		$GLOBALS['%s']->push("Arrays::rotate");
		$__hx__spos = $GLOBALS['%s']->length;
		if($a->length === 0) {
			$tmp = (new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$result = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g = _hx_array_get($a, 0)->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$result[$i] = (new _hx_array(array()));
				unset($i);
			}
		}
		{
			$_g11 = 0;
			$_g2 = $a->length;
			while($_g11 < $_g2) {
				$j = $_g11++;
				$_g3 = 0;
				$_g21 = _hx_array_get($a, 0)->length;
				while($_g3 < $_g21) {
					$i1 = $_g3++;
					$result[$i1][$j] = $a[$j][$i1];
					unset($i1);
				}
				unset($j,$_g3,$_g21);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function shuffle($a) {
		$GLOBALS['%s']->push("Arrays::shuffle");
		$__hx__spos = $GLOBALS['%s']->length;
		$t = Ints::range($a->length, null, null);
		$arr = (new _hx_array(array()));
		while($t->length > 0) {
			$pos = Std::random($t->length);
			$index = $t[$pos];
			$t->splice($pos, 1);
			$arr->push($a[$index]);
			unset($pos,$index);
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function scanf($arr, $weightf, $incremental = null) {
		$GLOBALS['%s']->push("Arrays::scanf");
		$__hx__spos = $GLOBALS['%s']->length;
		if($incremental === null) {
			$incremental = true;
		}
		$tot = 0.0;
		$weights = (new _hx_array(array()));
		if($incremental) {
			$_g1 = 0;
			$_g = $arr->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$weights[$i] = $tot += call_user_func_array($weightf, array($arr[$i], $i));
				unset($i);
			}
		} else {
			{
				$_g11 = 0;
				$_g2 = $arr->length;
				while($_g11 < $_g2) {
					$i1 = $_g11++;
					$weights[$i1] = call_user_func_array($weightf, array($arr[$i1], $i1));
					unset($i1);
				}
			}
			$tot = $weights[$weights->length - 1];
		}
		$scan = null;
		{
			$scan1 = null;
			$scan1 = array(new _hx_lambda(array(&$arr, &$incremental, &$scan, &$scan1, &$tot, &$weightf, &$weights), "Arrays_17"), 'execute');
			$scan = $scan1;
		}
		{
			$tmp = array(new _hx_lambda(array(&$arr, &$incremental, &$scan, &$tot, &$weightf, &$weights), "Arrays_18"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Arrays'; }
}
function Arrays_0(&$arr, &$f) {
	if(null === $f) {
		return (isset(Dynamics::$compare) ? Dynamics::$compare: array("Dynamics", "compare"));
	} else {
		return $f;
	}
}
function Arrays_1(&$arr, &$f, $v, $_) {
	{
		$GLOBALS['%s']->push("Arrays::split@221");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $v === null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_2(&$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v) {
	{
		$arr = $v->copy()->splice(0, $max);
		return Iterators::map($arr->iterator(), array(new _hx_lambda(array(&$arr, &$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v), "Arrays_19"), 'execute'));
	}
}
function Arrays_3(&$culture, &$format, &$max, &$param, &$params, &$sep, &$v, $d1, $i1) {
	{
		$GLOBALS['%s']->push("Arrays::format@273");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Dynamics::format($d1, $params[0], null, null, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_4(&$culture, &$format, &$param, &$params, $v) {
	{
		$GLOBALS['%s']->push("Arrays::formatf@288");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($v->length === 0) {
			$empty = null;
			if(null === $params[1]) {
				$empty = "[]";
			} else {
				$empty = $params[1];
			}
			{
				$GLOBALS['%s']->pop();
				return $empty;
			}
		}
		$sep = null;
		if(null === $params[2]) {
			$sep = ", ";
		} else {
			$sep = $params[2];
		}
		$max = null;
		if($params[3] === null) {
			$max = null;
		} else {
			if("" === $params[3]) {
				$max = null;
			} else {
				$max = Std::parseInt($params[3]);
			}
		}
		if(null !== $max && $max < $v->length) {
			$elipsis = null;
			if(null === $params[4]) {
				$elipsis = " ...";
			} else {
				$elipsis = $params[4];
			}
			{
				$tmp = _hx_string_or_null(_hx_deref((Arrays_20($culture, $elipsis, $format, $max, $param, $params, $sep, $v)))->join($sep)) . _hx_string_or_null($elipsis);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$tmp = Iterators::map($v->iterator(), array(new _hx_lambda(array(&$culture, &$format, &$max, &$param, &$params, &$sep, &$v), "Arrays_21"), 'execute'))->join($sep);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_5(&$culture, &$f, &$format, &$param, &$params, $v1) {
	{
		$GLOBALS['%s']->push("Arrays::formatf@307");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($v1->length));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_6(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v, $_) {
	{
		$GLOBALS['%s']->push("Arrays::interpolatef@329");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_7(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1, $_1) {
	{
		$GLOBALS['%s']->push("Arrays::interpolatef@337");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v1;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_8(&$a, &$b, &$equation, &$functions, &$i, &$min, $t) {
	{
		$GLOBALS['%s']->push("Arrays::interpolatef@340");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::map($functions->iterator(), array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t), "Arrays_22"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_9(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v, $_) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateStringsf@359");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_10(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1, $_1) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateStringsf@367");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v1;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_11(&$a, &$b, &$equation, &$functions, &$i, &$min, $t) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateStringsf@370");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::map($functions->iterator(), array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t), "Arrays_23"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_12(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v, $_) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateIntsf@389");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_13(&$a, &$b, &$equation, &$functions, &$i, &$min, &$v1, $_1) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateIntsf@397");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $v1;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_14(&$a, &$b, &$equation, &$functions, &$i, &$min, $t) {
	{
		$GLOBALS['%s']->push("Arrays::interpolateIntsf@400");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Iterators::map($functions->iterator(), array(new _hx_lambda(array(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t), "Arrays_24"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_15(&$arr, $v, $_) {
	{
		$GLOBALS['%s']->push("Arrays::string@455");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Dynamics::string($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_16(&$a, &$delta, &$f, &$x, $a1, $b) {
	{
		$GLOBALS['%s']->push("Arrays::nearest@525");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$a2 = $a1->v;
		$b1 = $b->v;
		if($a2 < $b1) {
			$GLOBALS['%s']->pop();
			return -1;
		} else {
			if($a2 > $b1) {
				$GLOBALS['%s']->pop();
				return 1;
			} else {
				$GLOBALS['%s']->pop();
				return 0;
			}
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_17(&$arr, &$incremental, &$scan, &$scan1, &$tot, &$weightf, &$weights, $v, $start, $end) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@610");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($start === $end) {
			$tmp = $arr[$start];
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$mid = Math::floor(($end - $start) / 2) + $start;
		$value = $weights[$mid];
		if($v < $value) {
			$tmp = call_user_func_array($scan1, array($v, $start, $mid));
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = call_user_func_array($scan1, array($v, $mid + 1, $end));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_18(&$arr, &$incremental, &$scan, &$tot, &$weightf, &$weights, $v1) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@622");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($v1 < 0 || $v1 > $tot) {
			$GLOBALS['%s']->pop();
			return null;
		}
		{
			$tmp = call_user_func_array($scan, array($v1, 0, $weights->length - 1));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_19(&$arr, &$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v, $d, $i) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@271");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Dynamics::format($d, $params[0], null, null, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_20(&$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v) {
	{
		$arr = $v->copy()->splice(0, $max);
		return Iterators::map($arr->iterator(), array(new _hx_lambda(array(&$arr, &$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v), "Arrays_25"), 'execute'));
	}
}
function Arrays_21(&$culture, &$format, &$max, &$param, &$params, &$sep, &$v, $d1, $i1) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@303");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = Dynamics::format($d1, $params[0], null, null, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_22(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t, $f, $_2) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@340");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($t));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_23(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t, $f, $_2) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@370");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($t));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_24(&$a, &$b, &$equation, &$functions, &$i, &$min, &$t, $f, $_2) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@400");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($t));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Arrays_25(&$arr, &$culture, &$elipsis, &$format, &$max, &$param, &$params, &$sep, &$v, $d, $i) {
	{
		$GLOBALS['%s']->push("Arrays::scanf@301");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = Dynamics::format($d, $params[0], null, null, $culture);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
