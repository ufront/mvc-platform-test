<?php

class minject_InjectionConfig {
	public function __construct($request, $injectionName) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("minject.InjectionConfig::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->request = $request;
		$this->injectionName = $injectionName;
		$GLOBALS['%s']->pop();
	}}
	public $request;
	public $injectionName;
	public $injector;
	public $result;
	public function getResponse($injector) {
		$GLOBALS['%s']->push("minject.InjectionConfig::getResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->injector !== null) {
			$injector = $this->injector;
		}
		if($this->result !== null) {
			$tmp = $this->result->getResponse($injector);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$parentConfig = $injector->getAncestorMapping($this->request, $this->injectionName);
		if($parentConfig !== null) {
			$tmp = $parentConfig->getResponse($injector);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasResponse($injector) {
		$GLOBALS['%s']->push("minject.InjectionConfig::hasResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->result !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasOwnResponse() {
		$GLOBALS['%s']->push("minject.InjectionConfig::hasOwnResponse");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->result !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setResult($result) {
		$GLOBALS['%s']->push("minject.InjectionConfig::setResult");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->result !== null && $result !== null) {
			haxe_Log::trace("Warning: Injector contains " . Std::string($this) . "." . "\x0AAttempting to overwrite this with mapping for [" . Std::string($result) . "]." . "\x0AIf you have overwritten this mapping intentionally " . "you can use \"injector.unmap()\" prior to your replacement " . "mapping in order to avoid seeing this message.", _hx_anonymous(array("fileName" => "InjectionConfig.hx", "lineNumber" => 74, "className" => "minject.InjectionConfig", "methodName" => "setResult")));
		}
		$this->result = $result;
		$GLOBALS['%s']->pop();
	}
	public function setInjector($injector) {
		$GLOBALS['%s']->push("minject.InjectionConfig::setInjector");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector = $injector;
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("minject.InjectionConfig::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		$named = null;
		if($this->injectionName !== null && $this->injectionName !== "") {
			$named = " named \"" . _hx_string_or_null($this->injectionName) . "\" and";
		} else {
			$named = "";
		}
		{
			$tmp = "rule: [" . _hx_string_or_null(Type::getClassName($this->request)) . "]" . _hx_string_or_null($named) . " mapped to [" . Std::string($this->result) . "]";
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
