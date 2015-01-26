<?php

class thx_core_Arrays {
	public function __construct(){}
	static function after($array, $element) {
		return $array->slice($array->indexOf($element, null) + 1, null);
	}
	static function all($arr, $predicate) {
		{
			$_g = 0;
			while($_g < $arr->length) {
				$item = $arr[$_g];
				++$_g;
				if(!call_user_func_array($predicate, array($item))) {
					return false;
				}
				unset($item);
			}
		}
		return true;
	}
	static function any($arr, $predicate) {
		{
			$_g = 0;
			while($_g < $arr->length) {
				$item = $arr[$_g];
				++$_g;
				if(call_user_func_array($predicate, array($item))) {
					return true;
				}
				unset($item);
			}
		}
		return false;
	}
	static function at($arr, $indexes) {
		return $indexes->map(array(new _hx_lambda(array(&$arr, &$indexes), "thx_core_Arrays_0"), 'execute'));
	}
	static function before($array, $element) {
		return $array->slice(0, $array->indexOf($element, null));
	}
	static function compact($arr) {
		return $arr->filter(array(new _hx_lambda(array(&$arr), "thx_core_Arrays_1"), 'execute'));
	}
	static function contains($array, $element, $eq = null) {
		if(null === $eq) {
			return $array->indexOf($element, null) >= 0;
		} else {
			{
				$_g1 = 0;
				$_g = $array->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(call_user_func_array($eq, array($array[$i], $element))) {
						return true;
					}
					unset($i);
				}
			}
			return false;
		}
	}
	static function cross($a, $b) {
		$r = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $a->length) {
				$va = $a[$_g];
				++$_g;
				$_g1 = 0;
				while($_g1 < $b->length) {
					$vb = $b[$_g1];
					++$_g1;
					$r->push((new _hx_array(array($va, $vb))));
					unset($vb);
				}
				unset($va,$_g1);
			}
		}
		return $r;
	}
	static function crossMulti($array) {
		$acopy = $array->copy();
		$result = $acopy->shift()->map(array(new _hx_lambda(array(&$acopy, &$array), "thx_core_Arrays_2"), 'execute'));
		while($acopy->length > 0) {
			$array1 = $acopy->shift();
			$tresult = $result;
			$result = (new _hx_array(array()));
			{
				$_g = 0;
				while($_g < $array1->length) {
					$v1 = $array1[$_g];
					++$_g;
					{
						$_g1 = 0;
						while($_g1 < $tresult->length) {
							$ar = $tresult[$_g1];
							++$_g1;
							$t = $ar->copy();
							$t->push($v1);
							$result->push($t);
							unset($t,$ar);
						}
						unset($_g1);
					}
					unset($v1);
				}
				unset($_g);
			}
			unset($tresult,$array1);
		}
		return $result;
	}
	static function eachPair($array, $callback) {
		$_g1 = 0;
		$_g = $array->length;
		while($_g1 < $_g) {
			$i = $_g1++;
			$_g3 = $i;
			$_g2 = $array->length;
			while($_g3 < $_g2) {
				$j = $_g3++;
				if(!call_user_func_array($callback, array($array[$i], $array[$j]))) {
					return;
				}
				unset($j);
			}
			unset($i,$_g3,$_g2);
		}
	}
	static function equals($a, $b, $equality = null) {
		if($a === null || $b === null || $a->length !== $b->length) {
			return false;
		}
		if(null === $equality) {
			$equality = (isset(thx_core_Functions::$equality) ? thx_core_Functions::$equality: array("thx_core_Functions", "equality"));
		}
		{
			$_g1 = 0;
			$_g = $a->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(!call_user_func_array($equality, array($a[$i], $b[$i]))) {
					return false;
				}
				unset($i);
			}
		}
		return true;
	}
	static function extract($a, $predicate) {
		{
			$_g1 = 0;
			$_g = $a->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(call_user_func_array($predicate, array($a[$i]))) {
					return _hx_array_get($a->splice($i, 1), 0);
				}
				unset($i);
			}
		}
		return null;
	}
	static function find($array, $predicate) {
		{
			$_g = 0;
			while($_g < $array->length) {
				$item = $array[$_g];
				++$_g;
				if(call_user_func_array($predicate, array($item))) {
					return $item;
				}
				unset($item);
			}
		}
		return null;
	}
	static function findLast($array, $predicate) {
		$len = $array->length;
		$j = null;
		{
			$_g = 0;
			while($_g < $len) {
				$i = $_g++;
				$j = $len - $i - 1;
				if(call_user_func_array($predicate, array($array[$j]))) {
					return $array[$j];
				}
				unset($i);
			}
		}
		return null;
	}
	static function first($array) {
		return $array[0];
	}
	static function flatMap($array, $callback) {
		return thx_core_Arrays::flatten($array->map($callback));
	}
	static function flatten($array) {
		$callback = array(new _hx_lambda(array(&$array), "thx_core_Arrays_3"), 'execute');
		$initial = (new _hx_array(array()));
		$array->map(array(new _hx_lambda(array(&$array, &$callback, &$initial), "thx_core_Arrays_4"), 'execute'));
		return $initial;
	}
	static function from($array, $element) {
		return $array->slice($array->indexOf($element, null), null);
	}
	static function head($array) {
		return $array[0];
	}
	static function ifEmpty($value, $alt) {
		if(null !== $value && 0 !== $value->length) {
			return $value;
		} else {
			return $alt;
		}
	}
	static function initial($array) {
		return $array->slice(0, $array->length - 1);
	}
	static function isEmpty($array) {
		return $array->length === 0;
	}
	static function last($array) {
		return $array[$array->length - 1];
	}
	static function mapi($array, $callback) {
		$r = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g = $array->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$r->push(call_user_func_array($callback, array($array[$i], $i)));
				unset($i);
			}
		}
		return $r;
	}
	static function mapRight($array, $callback) {
		$i = $array->length;
		$result = (new _hx_array(array()));
		while(--$i >= 0) {
			$result->push(call_user_func_array($callback, array($array[$i])));
		}
		return $result;
	}
	static function order($array, $sort) {
		$n = $array->copy();
		$n->sort($sort);
		return $n;
	}
	static function pull($array, $toRemove, $equality = null) {
		$_g = 0;
		while($_g < $toRemove->length) {
			$item = $toRemove[$_g];
			++$_g;
			thx_core_Arrays::removeAll($array, $item, $equality);
			unset($item);
		}
	}
	static function pushIf($array, $condition, $value) {
		if($condition) {
			$array->push($value);
		}
		return $array;
	}
	static function reduce($array, $callback, $initial) {
		$array->map(array(new _hx_lambda(array(&$array, &$callback, &$initial), "thx_core_Arrays_5"), 'execute'));
		return $initial;
	}
	static function resize($array, $length, $fill) {
		while($array->length < $length) {
			$array->push($fill);
		}
		$array->splice($length, $array->length - $length);
		return $array;
	}
	static function reducei($array, $callback, $initial) {
		thx_core_Arrays::mapi($array, array(new _hx_lambda(array(&$array, &$callback, &$initial), "thx_core_Arrays_6"), 'execute'));
		return $initial;
	}
	static function reduceRight($array, $callback, $initial) {
		$i = $array->length;
		while(--$i >= 0) {
			$initial = call_user_func_array($callback, array($initial, $array[$i]));
		}
		return $initial;
	}
	static function removeAll($array, $element, $equality = null) {
		if(null === $equality) {
			$equality = (isset(thx_core_Functions::$equality) ? thx_core_Functions::$equality: array("thx_core_Functions", "equality"));
		}
		$i = $array->length;
		while(--$i >= 0) {
			if(call_user_func_array($equality, array($array[$i], $element))) {
				$array->splice($i, 1);
			}
		}
	}
	static function rest($array) {
		return $array->slice(1, null);
	}
	static function sample($array, $n) {
		{
			$b = $array->length;
			if($n < $b) {
				$n = $n;
			} else {
				$n = $b;
			}
		}
		$copy = $array->copy();
		$result = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $n) {
				$i = $_g++;
				$result->push(_hx_array_get($copy->splice(Std::random($copy->length), 1), 0));
				unset($i);
			}
		}
		return $result;
	}
	static function sampleOne($array) {
		return $array[Std::random($array->length)];
	}
	static function shuffle($a) {
		$t = thx_core_Ints::range($a->length, null, null);
		$array = (new _hx_array(array()));
		while($t->length > 0) {
			$pos = Std::random($t->length);
			$index = $t[$pos];
			$t->splice($pos, 1);
			$array->push($a[$index]);
			unset($pos,$index);
		}
		return $array;
	}
	static function take($arr, $n) {
		return $arr->slice(0, $n);
	}
	static function takeLast($arr, $n) {
		return $arr->slice($arr->length - $n, null);
	}
	static function rotate($arr) {
		$result = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g = _hx_array_get($arr, 0)->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$row = (new _hx_array(array()));
				$result->push($row);
				{
					$_g3 = 0;
					$_g2 = $arr->length;
					while($_g3 < $_g2) {
						$j = $_g3++;
						$row->push($arr[$j][$i]);
						unset($j);
					}
					unset($_g3,$_g2);
				}
				unset($row,$i);
			}
		}
		return $result;
	}
	static function zip($array1, $array2) {
		$length = null;
		{
			$a = $array1->length;
			$b = $array2->length;
			if($a < $b) {
				$length = $a;
			} else {
				$length = $b;
			}
		}
		$array = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$array->push(_hx_anonymous(array("_0" => $array1[$i], "_1" => $array2[$i])));
				unset($i);
			}
		}
		return $array;
	}
	static function zip3($array1, $array2, $array3) {
		$length = thx_core_ArrayInts::min((new _hx_array(array($array1->length, $array2->length, $array3->length))));
		$array = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$array->push(_hx_anonymous(array("_0" => $array1[$i], "_1" => $array2[$i], "_2" => $array3[$i])));
				unset($i);
			}
		}
		return $array;
	}
	static function zip4($array1, $array2, $array3, $array4) {
		$length = thx_core_ArrayInts::min((new _hx_array(array($array1->length, $array2->length, $array3->length, $array4->length))));
		$array = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$array->push(_hx_anonymous(array("_0" => $array1[$i], "_1" => $array2[$i], "_2" => $array3[$i], "_3" => $array4[$i])));
				unset($i);
			}
		}
		return $array;
	}
	static function zip5($array1, $array2, $array3, $array4, $array5) {
		$length = thx_core_ArrayInts::min((new _hx_array(array($array1->length, $array2->length, $array3->length, $array4->length, $array5->length))));
		$array = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$array->push(_hx_anonymous(array("_0" => $array1[$i], "_1" => $array2[$i], "_2" => $array3[$i], "_3" => $array4[$i], "_4" => $array5[$i])));
				unset($i);
			}
		}
		return $array;
	}
	static function unzip($array) {
		$a1 = (new _hx_array(array()));
		$a2 = (new _hx_array(array()));
		$array->map(array(new _hx_lambda(array(&$a1, &$a2, &$array), "thx_core_Arrays_7"), 'execute'));
		return _hx_anonymous(array("_0" => $a1, "_1" => $a2));
	}
	static function unzip3($array) {
		$a1 = (new _hx_array(array()));
		$a2 = (new _hx_array(array()));
		$a3 = (new _hx_array(array()));
		$array->map(array(new _hx_lambda(array(&$a1, &$a2, &$a3, &$array), "thx_core_Arrays_8"), 'execute'));
		return _hx_anonymous(array("_0" => $a1, "_1" => $a2, "_2" => $a3));
	}
	static function unzip4($array) {
		$a1 = (new _hx_array(array()));
		$a2 = (new _hx_array(array()));
		$a3 = (new _hx_array(array()));
		$a4 = (new _hx_array(array()));
		$array->map(array(new _hx_lambda(array(&$a1, &$a2, &$a3, &$a4, &$array), "thx_core_Arrays_9"), 'execute'));
		return _hx_anonymous(array("_0" => $a1, "_1" => $a2, "_2" => $a3, "_3" => $a4));
	}
	static function unzip5($array) {
		$a1 = (new _hx_array(array()));
		$a2 = (new _hx_array(array()));
		$a3 = (new _hx_array(array()));
		$a4 = (new _hx_array(array()));
		$a5 = (new _hx_array(array()));
		$array->map(array(new _hx_lambda(array(&$a1, &$a2, &$a3, &$a4, &$a5, &$array), "thx_core_Arrays_10"), 'execute'));
		return _hx_anonymous(array("_0" => $a1, "_1" => $a2, "_2" => $a3, "_3" => $a4, "_4" => $a5));
	}
	function __toString() { return 'thx.core.Arrays'; }
}
function thx_core_Arrays_0(&$arr, &$indexes, $i) {
	{
		return $arr[$i];
	}
}
function thx_core_Arrays_1(&$arr, $v) {
	{
		return null !== $v;
	}
}
function thx_core_Arrays_2(&$acopy, &$array, $v) {
	{
		return (new _hx_array(array($v)));
	}
}
function thx_core_Arrays_3(&$array, $acc, $item) {
	{
		return $acc->concat($item);
	}
}
function thx_core_Arrays_4(&$array, &$callback, &$initial, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
function thx_core_Arrays_5(&$array, &$callback, &$initial, $v) {
	{
		$initial = call_user_func_array($callback, array($initial, $v));
	}
}
function thx_core_Arrays_6(&$array, &$callback, &$initial, $v, $i) {
	{
		$initial = call_user_func_array($callback, array($initial, $v, $i));
	}
}
function thx_core_Arrays_7(&$a1, &$a2, &$array, $t) {
	{
		$a1->push($t->_0);
		$a2->push($t->_1);
	}
}
function thx_core_Arrays_8(&$a1, &$a2, &$a3, &$array, $t) {
	{
		$a1->push($t->_0);
		$a2->push($t->_1);
		$a3->push($t->_2);
	}
}
function thx_core_Arrays_9(&$a1, &$a2, &$a3, &$a4, &$array, $t) {
	{
		$a1->push($t->_0);
		$a2->push($t->_1);
		$a3->push($t->_2);
		$a4->push($t->_3);
	}
}
function thx_core_Arrays_10(&$a1, &$a2, &$a3, &$a4, &$a5, &$array, $t) {
	{
		$a1->push($t->_0);
		$a2->push($t->_1);
		$a3->push($t->_2);
		$a4->push($t->_3);
		$a5->push($t->_4);
	}
}
