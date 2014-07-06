<?php

class Objects {
	public function __construct(){}
	static function field($o, $fieldname, $alt = null) {
		$GLOBALS['%s']->push("Objects::field");
		$__hx__spos = $GLOBALS['%s']->length;
		if(_hx_has_field($o, $fieldname)) {
			$tmp = Reflect::field($o, $fieldname);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $alt;
		}
		$GLOBALS['%s']->pop();
	}
	static function keys($o) {
		$GLOBALS['%s']->push("Objects::keys");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Reflect::fields($o);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function values($o) {
		$GLOBALS['%s']->push("Objects::values");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($o);
			while($_g < $_g1->length) {
				$key = $_g1[$_g];
				++$_g;
				$arr->push(Reflect::field($o, $key));
				unset($key);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function entries($o) {
		$GLOBALS['%s']->push("Objects::entries");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($o);
			while($_g < $_g1->length) {
				$key = $_g1[$_g];
				++$_g;
				$arr->push(_hx_anonymous(array("key" => $key, "value" => Reflect::field($o, $key))));
				unset($key);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function each($o, $handler) {
		$GLOBALS['%s']->push("Objects::each");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = Reflect::fields($o);
		while($_g < $_g1->length) {
			$key = $_g1[$_g];
			++$_g;
			call_user_func_array($handler, array($key, Reflect::field($o, $key)));
			unset($key);
		}
		$GLOBALS['%s']->pop();
	}
	static function map($o, $handler) {
		$GLOBALS['%s']->push("Objects::map");
		$__hx__spos = $GLOBALS['%s']->length;
		$results = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($o);
			while($_g < $_g1->length) {
				$key = $_g1[$_g];
				++$_g;
				$results->push(call_user_func_array($handler, array($key, Reflect::field($o, $key))));
				unset($key);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $results;
		}
		$GLOBALS['%s']->pop();
	}
	static function with($ob, $f) {
		$GLOBALS['%s']->push("Objects::with");
		$__hx__spos = $GLOBALS['%s']->length;
		call_user_func_array($f, array($ob));
		{
			$GLOBALS['%s']->pop();
			return $ob;
		}
		$GLOBALS['%s']->pop();
	}
	static function toHash($ob) {
		$GLOBALS['%s']->push("Objects::toHash");
		$__hx__spos = $GLOBALS['%s']->length;
		$Map = new haxe_ds_StringMap();
		{
			$tmp = Objects::copyToHash($ob, $Map);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copyToHash($ob, $Map) {
		$GLOBALS['%s']->push("Objects::copyToHash");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			$_g1 = Reflect::fields($ob);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$value = Reflect::field($ob, $field);
				$Map->set($field, $value);
				unset($value,$field);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $Map;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolate($v, $a, $b, $equation = null) {
		$GLOBALS['%s']->push("Objects::interpolate");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Objects::interpolatef($a, $b, $equation), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function interpolatef($a, $b, $equation = null) {
		$GLOBALS['%s']->push("Objects::interpolatef");
		$__hx__spos = $GLOBALS['%s']->length;
		$i = _hx_anonymous(array());
		$c = _hx_anonymous(array());
		$keys = Reflect::fields($a);
		{
			$_g = 0;
			while($_g < $keys->length) {
				$key = $keys[$_g];
				++$_g;
				if(_hx_has_field($b, $key)) {
					$va = Reflect::field($a, $key);
					{
						$value = Dynamics::interpolatef($va, Reflect::field($b, $key), null);
						$i->{$key} = $value;
						unset($value);
					}
					unset($va);
				} else {
					$value1 = Reflect::field($a, $key);
					$c->{$key} = $value1;
					unset($value1);
				}
				unset($key);
			}
		}
		$keys = Reflect::fields($b);
		{
			$_g1 = 0;
			while($_g1 < $keys->length) {
				$key1 = $keys[$_g1];
				++$_g1;
				if(!_hx_has_field($a, $key1)) {
					$value2 = Reflect::field($b, $key1);
					$c->{$key1} = $value2;
					unset($value2);
				}
				unset($key1);
			}
		}
		{
			$tmp = array(new _hx_lambda(array(&$a, &$b, &$c, &$equation, &$i, &$keys), "Objects_0"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copyTo($src, $dst) {
		$GLOBALS['%s']->push("Objects::copyTo");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			$_g1 = Reflect::fields($src);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$sv = Dynamics::hclone(Reflect::field($src, $field), null);
				$dv = Reflect::field($dst, $field);
				if(Reflect::isObject($sv) && null === Type::getClass($sv) && (Reflect::isObject($dv) && null === Type::getClass($dv))) {
					Objects::copyTo($sv, $dv);
				} else {
					$dst->{$field} = $sv;
				}
				unset($sv,$field,$dv);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $dst;
		}
		$GLOBALS['%s']->pop();
	}
	static function hclone($src) {
		$GLOBALS['%s']->push("Objects::clone");
		$__hx__spos = $GLOBALS['%s']->length;
		$dst = _hx_anonymous(array());
		{
			$tmp = Objects::copyTo($src, $dst);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function mergef($ob, $new_ob, $f) {
		$GLOBALS['%s']->push("Objects::mergef");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = Reflect::fields($new_ob);
		while($_g < $_g1->length) {
			$field = $_g1[$_g];
			++$_g;
			$new_val = Reflect::field($new_ob, $field);
			if(_hx_has_field($ob, $field)) {
				$old_val = Reflect::field($ob, $field);
				{
					$value = call_user_func_array($f, array($field, $old_val, $new_val));
					$ob->{$field} = $value;
					unset($value);
				}
				unset($old_val);
			} else {
				$ob->{$field} = $new_val;
			}
			unset($new_val,$field);
		}
		$GLOBALS['%s']->pop();
	}
	static function merge($ob, $new_ob) {
		$GLOBALS['%s']->push("Objects::merge");
		$__hx__spos = $GLOBALS['%s']->length;
		Objects::mergef($ob, $new_ob, array(new _hx_lambda(array(&$new_ob, &$ob), "Objects_1"), 'execute'));
		$GLOBALS['%s']->pop();
	}
	static function _flatten($src, $cum, $arr, $levels, $level) {
		$GLOBALS['%s']->push("Objects::_flatten");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = 0;
		$_g1 = Reflect::fields($src);
		while($_g < $_g1->length) {
			$field = $_g1[$_g];
			++$_g;
			$clone = Objects::hclone($cum);
			$v = Reflect::field($src, $field);
			$clone->fields->push($field);
			if(Reflect::isObject($v) && null === Type::getClass($v) && ($levels === 0 || $level + 1 < $levels)) {
				Objects::_flatten($v, $clone, $arr, $levels, $level + 1);
			} else {
				$clone->value = $v;
				$arr->push($clone);
			}
			unset($v,$field,$clone);
		}
		$GLOBALS['%s']->pop();
	}
	static function flatten($src, $levels = null) {
		$GLOBALS['%s']->push("Objects::flatten");
		$__hx__spos = $GLOBALS['%s']->length;
		if($levels === null) {
			$levels = 0;
		}
		$arr = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($src);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$v = Reflect::field($src, $field);
				if(Reflect::isObject($v) && null === Type::getClass($v) && $levels !== 1) {
					$item = _hx_anonymous(array("fields" => (new _hx_array(array($field))), "value" => null));
					Objects::_flatten($v, $item, $arr, $levels, 1);
					unset($item);
				} else {
					$arr->push(_hx_anonymous(array("fields" => (new _hx_array(array($field))), "value" => $v)));
				}
				unset($v,$field);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Objects::compare");
		$__hx__spos = $GLOBALS['%s']->length;
		$v = null;
		$fields = null;
		if(($v = Arrays::compare($fields = Reflect::fields($a), Reflect::fields($b))) !== 0) {
			$GLOBALS['%s']->pop();
			return $v;
		}
		{
			$_g = 0;
			while($_g < $fields->length) {
				$field = $fields[$_g];
				++$_g;
				if(($v = Dynamics::compare(Reflect::field($a, $field), Reflect::field($b, $field))) !== 0) {
					$GLOBALS['%s']->pop();
					return $v;
				}
				unset($field);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	static function addFields($o, $fields, $values) {
		$GLOBALS['%s']->push("Objects::addFields");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0;
			$_g = $fields->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				Objects::addField($o, $fields[$i], $values[$i]);
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $o;
		}
		$GLOBALS['%s']->pop();
	}
	static function addField($o, $field, $value) {
		$GLOBALS['%s']->push("Objects::addField");
		$__hx__spos = $GLOBALS['%s']->length;
		$o->{$field} = $value;
		{
			$GLOBALS['%s']->pop();
			return $o;
		}
		$GLOBALS['%s']->pop();
	}
	static function format($v, $param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Objects::format");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array(Objects::formatf($param, $params, $culture), array($v));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function formatf($param = null, $params = null, $culture = null) {
		$GLOBALS['%s']->push("Objects::formatf");
		$__hx__spos = $GLOBALS['%s']->length;
		$params = thx_culture_FormatParams::params($param, $params, "R");
		$format = $params->shift();
		switch($format) {
		case "O":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Objects_2"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "R":{
			$tmp = array(new _hx_lambda(array(&$culture, &$format, &$param, &$params), "Objects_3"), 'execute');
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		default:{
			throw new HException(new thx_error_Error("Unsupported number format: {0}", null, $format, _hx_anonymous(array("fileName" => "Objects.hx", "lineNumber" => 242, "className" => "Objects", "methodName" => "formatf"))));
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Objects'; }
}
function Objects_0(&$a, &$b, &$c, &$equation, &$i, &$keys, $t) {
	{
		$GLOBALS['%s']->push("Objects::interpolatef@102");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$_g2 = 0;
			$_g11 = Reflect::fields($i);
			while($_g2 < $_g11->length) {
				$k = $_g11[$_g2];
				++$_g2;
				$value3 = Reflect::callMethod($i, Reflect::field($i, $k), (new _hx_array(array($t))));
				$c->{$k} = $value3;
				unset($value3,$k);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $c;
		}
		$GLOBALS['%s']->pop();
	}
}
function Objects_1(&$new_ob, &$ob, $key, $old_v, $new_v) {
	{
		$GLOBALS['%s']->push("Objects::merge@150");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $new_v;
		}
		$GLOBALS['%s']->pop();
	}
}
function Objects_2(&$culture, &$format, &$param, &$params, $v) {
	{
		$GLOBALS['%s']->push("Objects::formatf@232");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = Std::string($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function Objects_3(&$culture, &$format, &$param, &$params, $v1) {
	{
		$GLOBALS['%s']->push("Objects::formatf@234");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$buf = (new _hx_array(array()));
		{
			$_g = 0;
			$_g1 = Reflect::fields($v1);
			while($_g < $_g1->length) {
				$field = $_g1[$_g];
				++$_g;
				$buf->push(_hx_string_or_null($field) . ":" . _hx_string_or_null(Dynamics::format(Reflect::field($v1, $field), null, null, null, $culture)));
				unset($field);
			}
		}
		{
			$tmp = "{" . _hx_string_or_null($buf->join(",")) . "}";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
