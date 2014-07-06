<?php

class ufront_web_Dispatch extends haxe_web_Dispatch {
	public function __construct($url, $params, $method = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.Dispatch::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct($url,$params);
		$this->onProcessDispatchRequestTrigger = tink_core__Signal_Signal_Impl_::trigger();
		$this->onProcessDispatchRequest = tink_core__Signal_SignalTrigger_Impl_::asSignal($this->onProcessDispatchRequestTrigger);
		if($method !== null) {
			$this->method = strtolower($method);
		} else {
			$this->method = null;
		}
		$this->controller = null;
		$this->action = null;
		$this->arguments = null;
		$GLOBALS['%s']->pop();
	}}
	public $method;
	public $controller;
	public $action;
	public $arguments;
	public $onProcessDispatchRequest;
	public $onProcessDispatchRequestTrigger;
	public function resolveNames($name) {
		$GLOBALS['%s']->push("ufront.web.Dispatch::resolveNames");
		$__hx__spos = $GLOBALS['%s']->length;
		$arr = (new _hx_array(array()));
		if($this->method !== null) {
			$arr->push(_hx_string_or_null($this->method) . "_" . _hx_string_or_null($name));
		}
		$arr->push($name);
		{
			$GLOBALS['%s']->pop();
			return $arr;
		}
		$GLOBALS['%s']->pop();
	}
	public function processDispatchRequest($cfg) {
		$GLOBALS['%s']->push("ufront.web.Dispatch::processDispatchRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		$partName = $this->parts->shift();
		if($partName === null || $partName === "") {
			$partName = "default";
		}
		$names = $this->resolveNames("do" . _hx_string_or_null($partName));
		$this->cfg = $cfg;
		$name = null;
		$r = null;
		{
			$_g = 0;
			while($_g < $names->length) {
				$n = $names[$_g];
				++$_g;
				{
					$_g1 = 0;
					$_g2 = Reflect::fields($cfg->rules);
					while($_g1 < $_g2->length) {
						$fieldName = $_g2[$_g1];
						++$_g1;
						$lcName = strtolower($fieldName);
						if($lcName === strtolower($n)) {
							$r = Reflect::field($cfg->rules, $fieldName);
							$name = $fieldName;
							break;
						}
						unset($lcName,$fieldName);
					}
					unset($_g2,$_g1);
				}
				if($name !== null) {
					break;
				}
				unset($n);
			}
		}
		if($r === null) {
			$r = Reflect::field($cfg->rules, "doDefault");
			if($r === null) {
				throw new HException(haxe_web_DispatchError::DENotFound($name));
			}
			$this->parts->unshift($partName);
			$name = "doDefault";
		}
		$args = (new _hx_array(array()));
		$this->subDispatch = false;
		$this->loop($args, $r);
		if($this->parts->length > 0 && !$this->subDispatch) {
			if($this->parts->length === 1 && $this->parts[$this->parts->length - 1] === "") {
				$this->parts->pop();
			} else {
				throw new HException(haxe_web_DispatchError::$DETooManyValues);
			}
		}
		$this->controller = $cfg->obj;
		$this->action = $name;
		$this->arguments = $args;
		tink_core__Callback_CallbackList_Impl_::invoke($this->onProcessDispatchRequestTrigger, null);
		$GLOBALS['%s']->pop();
	}
	public function executeDispatchRequest() {
		$GLOBALS['%s']->push("ufront.web.Dispatch::executeDispatchRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		if(_hx_field($this, "controller") === null || $this->action === null || $this->arguments === null) {
			throw new HException(haxe_web_DispatchError::$DEMissing);
		}
		$actionMethod = Reflect::field($this->controller, $this->action);
		{
			$tmp = Reflect::callMethod($this->controller, $actionMethod, $this->arguments);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function runtimeDispatch($cfg) {
		$GLOBALS['%s']->push("ufront.web.Dispatch::runtimeDispatch");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->runtimeReturnDispatch($cfg);
		$GLOBALS['%s']->pop();
	}
	public function runtimeReturnDispatch($cfg) {
		$GLOBALS['%s']->push("ufront.web.Dispatch::runtimeReturnDispatch");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->processDispatchRequest($cfg);
		try {
			{
				$tmp = $this->executeDispatchRequest();
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			if(($e = $_ex_) instanceof haxe_web_Redirect){
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				$this->processDispatchRequest($cfg);
				{
					$tmp = $this->executeDispatchRequest();
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			} else throw $__hx__e;;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.Dispatch::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Type::getClassName(Type::getClass($this));
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
