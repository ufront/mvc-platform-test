<?php

class minject_point_PostInjectionPoint extends minject_point_MethodInjectionPoint {
	public function __construct($field, $args, $order) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($field,$args);
		$this->order = $order;
	}}
	public $order;
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
	function __toString() { return 'minject.point.PostInjectionPoint'; }
}
