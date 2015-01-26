<?php

class thx_core_Dynamics {
	public function __construct(){}
	static function equals($a, $b) {
		if(!thx_core_Types::sameType($a, $b)) {
			return false;
		}
		if((is_object($_t = $a) && !($_t instanceof Enum) ? $_t === $b : $_t == $b)) {
			return true;
		}
		{
			$_g = Type::typeof($a);
			switch($_g->index) {
			case 2:case 0:case 1:case 3:{
				return false;
			}break;
			case 5:{
				return Reflect::compareMethods($a, $b);
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$ca = Type::getClassName($c);
					$cb = Type::getClassName(Type::getClass($b));
					if($ca !== $cb) {
						return false;
					}
					if(Std::is($a, _hx_qtype("String"))) {
						return false;
					}
					if(Std::is($a, _hx_qtype("Array"))) {
						$aa = $a;
						$ab = $b;
						if($aa->length !== $ab->length) {
							return false;
						}
						{
							$_g2 = 0;
							$_g1 = $aa->length;
							while($_g2 < $_g1) {
								$i = $_g2++;
								if(!thx_core_Dynamics::equals($aa[$i], $ab[$i])) {
									return false;
								}
								unset($i);
							}
						}
						return true;
					}
					if(Std::is($a, _hx_qtype("Date"))) {
						return _hx_equal($a->getTime(), $b->getTime());
					}
					if(Std::is($a, _hx_qtype("IMap"))) {
						$ha = $a;
						$hb = $b;
						$ka = thx_core_Iterators::toArray($ha->keys());
						$kb = thx_core_Iterators::toArray($hb->keys());
						if($ka->length !== $kb->length) {
							return false;
						}
						{
							$_g11 = 0;
							while($_g11 < $ka->length) {
								$key = $ka[$_g11];
								++$_g11;
								if(!$hb->exists($key) || !thx_core_Dynamics::equals($ha->get($key), $hb->get($key))) {
									return false;
								}
								unset($key);
							}
						}
						return true;
					}
					$t = false;
					if(($t = thx_core_Iterators::isIterator($a)) || thx_core_Iterables::isIterable($a)) {
						$va = null;
						if($t) {
							$va = thx_core_Iterators::toArray($a);
						} else {
							$va = thx_core_Iterators::toArray($a->iterator());
						}
						$vb = null;
						if($t) {
							$vb = thx_core_Iterators::toArray($b);
						} else {
							$vb = thx_core_Iterators::toArray($b->iterator());
						}
						if($va->length !== $vb->length) {
							return false;
						}
						{
							$_g21 = 0;
							$_g12 = $va->length;
							while($_g21 < $_g12) {
								$i1 = $_g21++;
								if(!thx_core_Dynamics::equals($va[$i1], $vb[$i1])) {
									return false;
								}
								unset($i1);
							}
						}
						return true;
					}
					$f = null;
					if(_hx_has_field($a, "equals") && Reflect::isFunction($f = Reflect::field($a, "equals"))) {
						return Reflect::callMethod($a, $f, (new _hx_array(array($b))));
					}
					$fields = Type::getInstanceFields(Type::getClass($a));
					{
						$_g13 = 0;
						while($_g13 < $fields->length) {
							$field = $fields[$_g13];
							++$_g13;
							$va1 = Reflect::field($a, $field);
							if(Reflect::isFunction($va1)) {
								continue;
							}
							$vb1 = Reflect::field($b, $field);
							if(!thx_core_Dynamics::equals($va1, $vb1)) {
								return false;
							}
							unset($vb1,$va1,$field);
						}
					}
					return true;
				}
			}break;
			case 7:{
				$e = $_g->params[0];
				{
					$ea = Type::getEnumName($e);
					$teb = Type::getEnum($b);
					$eb = Type::getEnumName($teb);
					if($ea !== $eb) {
						return false;
					}
					if($a->index !== $b->index) {
						return false;
					}
					$pa = Type::enumParameters($a);
					$pb = Type::enumParameters($b);
					{
						$_g22 = 0;
						$_g14 = $pa->length;
						while($_g22 < $_g14) {
							$i2 = $_g22++;
							if(!thx_core_Dynamics::equals($pa[$i2], $pb[$i2])) {
								return false;
							}
							unset($i2);
						}
					}
					return true;
				}
			}break;
			case 4:{
				$fa = Reflect::fields($a);
				$fb = Reflect::fields($b);
				{
					$_g15 = 0;
					while($_g15 < $fa->length) {
						$field1 = $fa[$_g15];
						++$_g15;
						$fb->remove($field1);
						if(!_hx_has_field($b, $field1)) {
							return false;
						}
						$va2 = Reflect::field($a, $field1);
						if(Reflect::isFunction($va2)) {
							continue;
						}
						$vb2 = Reflect::field($b, $field1);
						if(!thx_core_Dynamics::equals($va2, $vb2)) {
							return false;
						}
						unset($vb2,$va2,$field1);
					}
				}
				if($fb->length > 0) {
					return false;
				}
				$t1 = false;
				if(($t1 = thx_core_Iterators::isIterator($a)) || thx_core_Iterables::isIterable($a)) {
					if($t1 && !thx_core_Iterators::isIterator($b)) {
						return false;
					}
					if(!$t1 && !thx_core_Iterables::isIterable($b)) {
						return false;
					}
					$aa1 = null;
					if($t1) {
						$aa1 = thx_core_Iterators::toArray($a);
					} else {
						$aa1 = thx_core_Iterators::toArray($a->iterator());
					}
					$ab1 = null;
					if($t1) {
						$ab1 = thx_core_Iterators::toArray($b);
					} else {
						$ab1 = thx_core_Iterators::toArray($b->iterator());
					}
					if($aa1->length !== $ab1->length) {
						return false;
					}
					{
						$_g23 = 0;
						$_g16 = $aa1->length;
						while($_g23 < $_g16) {
							$i3 = $_g23++;
							if(!thx_core_Dynamics::equals($aa1[$i3], $ab1[$i3])) {
								return false;
							}
							unset($i3);
						}
					}
					return true;
				}
				return true;
			}break;
			case 8:{
				throw new HException("Unable to compare two unknown types");
			}break;
			}
		}
		throw new HException(new thx_core_Error("Unable to compare values: " . Std::string($a) . " and " . Std::string($b), null, _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 151, "className" => "thx.core.Dynamics", "methodName" => "equals"))));
	}
	static function hclone($v, $cloneInstances = null) {
		if($cloneInstances === null) {
			$cloneInstances = false;
		}
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 0:{
				return null;
			}break;
			case 1:case 2:case 3:case 7:case 8:case 5:{
				return $v;
			}break;
			case 4:{
				return thx_core_Objects::copyTo($v, _hx_anonymous(array()), null);
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$name = Type::getClassName($c);
					switch($name) {
					case "Array":{
						return $v->map(array(new _hx_lambda(array(&$_g, &$c, &$cloneInstances, &$name, &$v), "thx_core_Dynamics_0"), 'execute'));
					}break;
					case "String":case "Date":{
						return $v;
					}break;
					default:{
						if($cloneInstances) {
							$o = Type::createEmptyInstance($c);
							{
								$_g1 = 0;
								$_g2 = Type::getInstanceFields($c);
								while($_g1 < $_g2->length) {
									$field = $_g2[$_g1];
									++$_g1;
									$value = thx_core_Dynamics::hclone(Reflect::field($v, $field), $cloneInstances);
									$o->{$field} = $value;
									unset($value,$field);
								}
							}
							return $o;
						} else {
							return $v;
						}
					}break;
					}
				}
			}break;
			}
		}
	}
	function __toString() { return 'thx.core.Dynamics'; }
}
function thx_core_Dynamics_0(&$_g, &$c, &$cloneInstances, &$name, &$v, $v1) {
	{
		return thx_core_Dynamics::hclone($v1, $cloneInstances);
	}
}
