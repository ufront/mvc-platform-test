<?php

class Dynamics {
	public function __construct(){}
	static function format($v, $param = null, $params = null, $nullstring = null, $culture = null) {
		$GLOBALS['%s']->push("Dynamics::format");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Dynamics::formatf($param, $params, $nullstring, $culture), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $nullstring = null, $culture = null) {
		$GLOBALS['%s']->push("Dynamics::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		if($nullstring === null) {
			$nullstring = "null";
		}
		{
			$tmp = array(new _hx_lambda(array(&$culture, &$nullstring, &$param, &$params), "Dynamics_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Dynamics::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Dynamics::interpolatef($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Dynamics::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		$ta = Type::typeof($a);
		$tb = Type::typeof($b);
		if(!((Std::is($a, _hx_qtype("Float")) || Std::is($a, _hx_qtype("Int"))) && (Std::is($b, _hx_qtype("Float")) || Std::is($b, _hx_qtype("Int")))) && !Type::enumEq($ta, $tb)) {
			throw new HException(new thx_error_Error("arguments a ({0}) and b ({0}) have different types", (new _hx_array(array($a, $b))), null, _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 61, "className" => "Dynamics", "methodName" => "interpolatef"))));
		}
		switch($ta->index) {
		case 0:{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$equation, &$ta, &$tb), "Dynamics_1"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 1:{
			if(Std::is($b, _hx_qtype("Int"))) {
				$tmp = Ints::interpolatef($a, $b, $equation);
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$tmp = Floats::interpolatef($a, $b, $equation);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 2:{
			$tmp = Floats::interpolatef($a, $b, $equation);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 3:{
			$tmp = Bools::interpolatef($a, $b, $equation);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 4:{
			$tmp = Objects::interpolatef($a, $b, $equation);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 6:{
			$c = $ta->params[0];
			{
				$name = Type::getClassName($c);
				switch($name) {
				case "String":{
					$tmp = Strings::interpolatef($a, $b, $equation);
					$GLOBALS['%s']->pop();
					return $tmp;
				}break;
				case "Date":{
					$tmp = Dates::interpolatef($a, $b, $equation);
					$GLOBALS['%s']->pop();
					return $tmp;
				}break;
				default:{
					throw new HException(new thx_error_Error("cannot interpolate on instances of {0}", null, $name, _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 79, "className" => "Dynamics", "methodName" => "interpolatef"))));
				}break;
				}
			}
		}break;
		default:{
			throw new HException(new thx_error_Error("cannot interpolate on functions/enums/unknown", null, null, _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 81, "className" => "Dynamics", "methodName" => "interpolatef"))));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function string($v) {
		$GLOBALS['%s']->push("Dynamics::string");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 0:{
				$GLOBALS['%s']->pop();
				return "null";
			}break;
			case 1:{
				$tmp = Ints::format($v, null, null, null);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 2:{
				$tmp = Floats::format($v, null, null, null);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$tmp = Bools::format($v, null, null, null);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 4:{
				$keys = null;
				{
					$o = $v;
					$keys = Reflect::fields($o);
				}
				$result = (new _hx_array(array()));
				{
					$_g1 = 0;
					while($_g1 < $keys->length) {
						$key = $keys[$_g1];
						++$_g1;
						$result->push(_hx_string_or_null($key) . " : " . _hx_string_or_null(Dynamics::string(Reflect::field($v, $key))));
						unset($key);
					}
				}
				{
					$tmp = "{" . _hx_string_or_null($result->join(", ")) . "}";
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$name = Type::getClassName($c);
					switch($name) {
					case "Array":{
						$tmp = Arrays::string($v);
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					case "String":{
						$s = $v;
						if(_hx_index_of($s, "\"", null) < 0) {
							$tmp = "\"" . _hx_string_or_null($s) . "\"";
							$GLOBALS['%s']->pop();
							return $tmp;
						} else {
							if(_hx_index_of($s, "'", null) < 0) {
								$tmp = "'" . _hx_string_or_null($s) . "'";
								$GLOBALS['%s']->pop();
								return $tmp;
							} else {
								$tmp = "\"" . _hx_string_or_null(str_replace("\"", "\\\"", $s)) . "\"";
								$GLOBALS['%s']->pop();
								return $tmp;
							}
						}
					}break;
					case "Date":{
						$tmp = Dates::format($v, null, null, null);
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					default:{
						$tmp = Std::string($v);
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					}
				}
			}break;
			case 7:{
				$tmp = Enums::string($v);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 8:{
				$GLOBALS['%s']->pop();
				return "<unknown>";
			}break;
			case 5:{
				$GLOBALS['%s']->pop();
				return "<function>";
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Dynamics::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $a && null === $b) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		if(null === $a) {
			$GLOBALS['%s']->pop();
			return -1;
		}
		if(null === $b) {
			$GLOBALS['%s']->pop();
			return 1;
		}
		{
			$_g = Type::typeof($a);
			switch($_g->index) {
			case 1:case 2:{
				$a1 = $a;
				$b1 = $b;
				if($a1 < $b1) {
					$GLOBALS['%s']->pop();
					return -1;
				} else {
					if($a1 > $b1) {
						$GLOBALS['%s']->pop();
						return 1;
					} else {
						$GLOBALS['%s']->pop();
						return 0;
					}
				}
			}break;
			case 3:{
				$a2 = $a;
				$b2 = $b;
				if($a2 === $b2) {
					$GLOBALS['%s']->pop();
					return 0;
				} else {
					if($a2) {
						$GLOBALS['%s']->pop();
						return -1;
					} else {
						$GLOBALS['%s']->pop();
						return 1;
					}
				}
			}break;
			case 4:{
				$tmp = Objects::compare($a, $b);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$name = Type::getClassName($c);
					switch($name) {
					case "Array":{
						$tmp = Arrays::compare($a, $b);
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					case "String":{
						$tmp = Strings::compare($a, $b);
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					case "Date":{
						$a3 = $a;
						$b3 = $b;
						{
							$a4 = $a3->getTime();
							$b4 = $b3->getTime();
							if($a4 < $b4) {
								$GLOBALS['%s']->pop();
								return -1;
							} else {
								if($a4 > $b4) {
									$GLOBALS['%s']->pop();
									return 1;
								} else {
									$GLOBALS['%s']->pop();
									return 0;
								}
							}
						}
					}break;
					default:{
						$tmp = Strings::compare(Std::string($a), Std::string($b));
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					}
				}
			}break;
			case 7:{
				$tmp = Enums::compare($a, $b);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return 0;
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function comparef($sample) {
		$GLOBALS['%s']->push("Dynamics::comparef");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($sample);
			switch($_g->index) {
			case 1:case 2:{
				$tmp = (isset(Floats::$compare) ? Floats::$compare: array("Floats", "compare"));
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$tmp = (isset(Bools::$compare) ? Bools::$compare: array("Bools", "compare"));
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 4:{
				$tmp = (isset(Objects::$compare) ? Objects::$compare: array("Objects", "compare"));
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$name = Type::getClassName($c);
					switch($name) {
					case "Array":{
						$tmp = (isset(Arrays::$compare) ? Arrays::$compare: array("Arrays", "compare"));
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					case "String":{
						$tmp = (isset(Strings::$compare) ? Strings::$compare: array("Strings", "compare"));
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					case "Date":{
						$tmp = (isset(Dates::$compare) ? Dates::$compare: array("Dates", "compare"));
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					default:{
						$tmp = array(new _hx_lambda(array(&$_g, &$c, &$name, &$sample), "Dynamics_2"), 'execute');
						$GLOBALS['%s']->pop();
						return $tmp;
					}break;
					}
				}
			}break;
			case 7:{
				$tmp = (isset(Enums::$compare) ? Enums::$compare: array("Enums", "compare"));
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			default:{
				$tmp = (isset(Dynamics::$compare) ? Dynamics::$compare: array("Dynamics", "compare"));
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function hclone($v, $cloneInstances = null) {
		$GLOBALS['%s']->push("Dynamics::clone");
		$__hx__spos = $GLOBALS['%s']->length;
		if($cloneInstances === null) {
			$cloneInstances = false;
		}
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 0:{
				$GLOBALS['%s']->pop();
				return null;
			}break;
			case 1:case 2:case 3:case 7:case 8:case 5:{
				$GLOBALS['%s']->pop();
				return $v;
			}break;
			case 4:{
				$o = _hx_anonymous(array());
				Objects::copyTo($v, $o);
				{
					$GLOBALS['%s']->pop();
					return $o;
				}
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$name = Type::getClassName($c);
					switch($name) {
					case "Array":{
						$src = $v;
						$a = (new _hx_array(array()));
						{
							$_g1 = 0;
							while($_g1 < $src->length) {
								$i = $src[$_g1];
								++$_g1;
								$a->push(Dynamics::hclone($i, null));
								unset($i);
							}
						}
						{
							$GLOBALS['%s']->pop();
							return $a;
						}
					}break;
					case "String":case "Date":{
						$GLOBALS['%s']->pop();
						return $v;
					}break;
					default:{
						if($cloneInstances) {
							$o1 = Type::createEmptyInstance($c);
							{
								$_g11 = 0;
								$_g2 = Reflect::fields($v);
								while($_g11 < $_g2->length) {
									$field = $_g2[$_g11];
									++$_g11;
									$value = Dynamics::hclone(Reflect::field($v, $field), null);
									$o1->{$field} = $value;
									unset($value,$field);
								}
							}
							{
								$GLOBALS['%s']->pop();
								return $o1;
							}
						} else {
							$GLOBALS['%s']->pop();
							return $v;
						}
					}break;
					}
				}
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function same($a, $b) {
		$GLOBALS['%s']->push("Dynamics::same");
		$__hx__spos = $GLOBALS['%s']->length;
		$ta = Types::typeName($a);
		$tb = Types::typeName($b);
		if($ta !== $tb) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$_g = Type::typeof($a);
			switch($_g->index) {
			case 2:{
				$tmp = Floats::equals($a, $b, null);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 0:case 1:case 3:{
				$tmp = (is_object($_t = $a) && !($_t instanceof Enum) ? $_t === $b : $_t == $b);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 5:{
				$tmp = Reflect::compareMethods($a, $b);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 6:{
				$c = $_g->params[0];
				{
					$ca = Type::getClassName($c);
					$cb = Type::getClassName(Type::getClass($b));
					if($ca !== $cb) {
						$GLOBALS['%s']->pop();
						return false;
					}
					if(Std::is($a, _hx_qtype("String")) && (is_object($_t = $a) && !($_t instanceof Enum) ? $_t !== $b : $_t != $b)) {
						$GLOBALS['%s']->pop();
						return false;
					}
					if(Std::is($a, _hx_qtype("Array"))) {
						$aa = $a;
						$ab = $b;
						if($aa->length !== $ab->length) {
							$GLOBALS['%s']->pop();
							return false;
						}
						{
							$_g2 = 0;
							$_g1 = $aa->length;
							while($_g2 < $_g1) {
								$i = $_g2++;
								if(!Dynamics::same($aa[$i], $ab[$i])) {
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
					}
					if(Std::is($a, _hx_qtype("Date"))) {
						$tmp = _hx_equal($a->getTime(), $b->getTime());
						$GLOBALS['%s']->pop();
						return $tmp;
					}
					if(Std::is($a, _hx_qtype("_Map.Map_Impl_")) || Std::is($a, _hx_qtype("haxe.ds.StringMap")) || Std::is($a, _hx_qtype("haxe.ds.IntMap"))) {
						$ha = $a;
						$hb = $b;
						$ka = Iterators::harray($ha->keys());
						$kb = Iterators::harray($hb->keys());
						if($ka->length !== $kb->length) {
							$GLOBALS['%s']->pop();
							return false;
						}
						{
							$_g11 = 0;
							while($_g11 < $ka->length) {
								$key = $ka[$_g11];
								++$_g11;
								if(!$hb->exists($key) || !Dynamics::same($ha->get($key), $hb->get($key))) {
									$GLOBALS['%s']->pop();
									return false;
								}
								unset($key);
							}
						}
						{
							$GLOBALS['%s']->pop();
							return true;
						}
					}
					$t = false;
					if(($t = Iterators::isIterator($a)) || Iterables::isIterable($a)) {
						$va = null;
						if($t) {
							$va = Iterators::harray($a);
						} else {
							$va = Iterators::harray($a->iterator());
						}
						$vb = null;
						if($t) {
							$vb = Iterators::harray($b);
						} else {
							$vb = Iterators::harray($b->iterator());
						}
						if($va->length !== $vb->length) {
							$GLOBALS['%s']->pop();
							return false;
						}
						{
							$_g21 = 0;
							$_g12 = $va->length;
							while($_g21 < $_g12) {
								$i1 = $_g21++;
								if(!Dynamics::same($va[$i1], $vb[$i1])) {
									$GLOBALS['%s']->pop();
									return false;
								}
								unset($i1);
							}
						}
						{
							$GLOBALS['%s']->pop();
							return true;
						}
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
							if(!Dynamics::same($va1, $vb1)) {
								$GLOBALS['%s']->pop();
								return false;
							}
							unset($vb1,$va1,$field);
						}
					}
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}
			}break;
			case 7:{
				$e = $_g->params[0];
				{
					$ea = Type::getEnumName($e);
					$teb = Type::getEnum($b);
					$eb = Type::getEnumName($teb);
					if($ea !== $eb) {
						$GLOBALS['%s']->pop();
						return false;
					}
					if($a->index !== $b->index) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$pa = Type::enumParameters($a);
					$pb = Type::enumParameters($b);
					{
						$_g22 = 0;
						$_g14 = $pa->length;
						while($_g22 < $_g14) {
							$i2 = $_g22++;
							if(!Dynamics::same($pa[$i2], $pb[$i2])) {
								$GLOBALS['%s']->pop();
								return false;
							}
							unset($i2);
						}
					}
					{
						$GLOBALS['%s']->pop();
						return true;
					}
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
							$GLOBALS['%s']->pop();
							return false;
						}
						$va2 = Reflect::field($a, $field1);
						if(Reflect::isFunction($va2)) {
							continue;
						}
						$vb2 = Reflect::field($b, $field1);
						if(!Dynamics::same($va2, $vb2)) {
							$GLOBALS['%s']->pop();
							return false;
						}
						unset($vb2,$va2,$field1);
					}
				}
				if($fb->length > 0) {
					$GLOBALS['%s']->pop();
					return false;
				}
				$t1 = false;
				if(($t1 = Iterators::isIterator($a)) || Iterables::isIterable($a)) {
					if($t1 && !Iterators::isIterator($b)) {
						$GLOBALS['%s']->pop();
						return false;
					}
					if(!$t1 && !Iterables::isIterable($b)) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$aa1 = null;
					if($t1) {
						$aa1 = Iterators::harray($a);
					} else {
						$aa1 = Iterators::harray($a->iterator());
					}
					$ab1 = null;
					if($t1) {
						$ab1 = Iterators::harray($b);
					} else {
						$ab1 = Iterators::harray($b->iterator());
					}
					if($aa1->length !== $ab1->length) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$_g23 = 0;
						$_g16 = $aa1->length;
						while($_g23 < $_g16) {
							$i3 = $_g23++;
							if(!Dynamics::same($aa1[$i3], $ab1[$i3])) {
								$GLOBALS['%s']->pop();
								return false;
							}
							unset($i3);
						}
					}
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 8:{
				throw new HException("Unable to compare two unknown types");
			}break;
			}
		}
		throw new HException(new thx_error_Error("Unable to compare values: {0} and {1}", (new _hx_array(array($a, $b))), null, _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 370, "className" => "Dynamics", "methodName" => "same"))));
		$GLOBALS['%s']->pop();
	}
	static function number($v) {
		$GLOBALS['%s']->push("Dynamics::number");
		$__hx__spos = $GLOBALS['%s']->length;
		if(Std::is($v, _hx_qtype("Bool"))) {
			if(_hx_equal($v, true)) {
				$GLOBALS['%s']->pop();
				return 1;
			} else {
				$GLOBALS['%s']->pop();
				return 0;
			}
		} else {
			if(Std::is($v, _hx_qtype("Date"))) {
				$tmp = $v->getTime();
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				if(Std::is($v, _hx_qtype("String"))) {
					$tmp = Std::parseFloat($v);
					$GLOBALS['%s']->pop();
					return $tmp;
				} else {
					$tmp = Math::$NaN;
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Dynamics'; }
}
function Dynamics_0(&$culture, &$nullstring, &$param, &$params, $v) {
	{
		$GLOBALS['%s']->push("Dynamics::formatf@20");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$_g = Type::typeof($v);
			switch($_g->index) {
			case 0:{
				$GLOBALS['%s']->pop();
				return $nullstring;
			}break;
			case 1:{
				$tmp = Ints::format($v, $param, $params, $culture);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 2:{
				$tmp = Floats::format($v, $param, $params, $culture);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 3:{
				$tmp = Bools::format($v, $param, $params, $culture);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 6:{
				$c = $_g->params[0];
				if((is_object($_t = $c) && !($_t instanceof Enum) ? $_t === _hx_qtype("String") : $_t == _hx_qtype("String"))) {
					$tmp = Strings::formatOne($v, $param, $params, $culture);
					$GLOBALS['%s']->pop();
					return $tmp;
				} else {
					if((is_object($_t2 = $c) && !($_t2 instanceof Enum) ? $_t2 === _hx_qtype("Array") : $_t2 == _hx_qtype("Array"))) {
						$tmp = Arrays::format($v, $param, $params, $culture);
						$GLOBALS['%s']->pop();
						return $tmp;
					} else {
						if((is_object($_t3 = $c) && !($_t3 instanceof Enum) ? $_t3 === _hx_qtype("Date") : $_t3 == _hx_qtype("Date"))) {
							$tmp = Dates::format($v, $param, $params, $culture);
							$GLOBALS['%s']->pop();
							return $tmp;
						} else {
							$tmp = Objects::format($v, $param, $params, $culture);
							$GLOBALS['%s']->pop();
							return $tmp;
						}
					}
				}
			}break;
			case 4:{
				$tmp = Objects::format($v, $param, $params, $culture);
				$GLOBALS['%s']->pop();
				return $tmp;
			}break;
			case 5:{
				$GLOBALS['%s']->pop();
				return "function()";
			}break;
			default:{
				throw new HException(new thx_error_Error("Unsupported type format: {0}", null, Type::typeof($v), _hx_anonymous(array("fileName" => "Dynamics.hx", "lineNumber" => 46, "className" => "Dynamics", "methodName" => "formatf"))));
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
}
function Dynamics_1(&$a, &$b, &$equation, &$ta, &$tb, $_) {
	{
		$GLOBALS['%s']->push("Dynamics::interpolatef@64");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
}
function Dynamics_2(&$_g, &$c, &$name, &$sample, $a, $b) {
	{
		$GLOBALS['%s']->push("Dynamics::comparef@181");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Strings::compare(Std::string($a), Std::string($b));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
