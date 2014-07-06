<?php

class ufront_web_TestController extends ufront_web_Controller {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.TestController::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function home() {
		$GLOBALS['%s']->push("ufront.web.TestController::home");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "Home";
		}
		$GLOBALS['%s']->pop();
	}
	public function staff() {
		$GLOBALS['%s']->push("ufront.web.TestController::staff");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "Staff";
		}
		$GLOBALS['%s']->pop();
	}
	public function viewStaff($name) {
		$GLOBALS['%s']->push("ufront.web.TestController::viewStaff");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "Staff: " . _hx_string_or_null($name);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function contact() {
		$GLOBALS['%s']->push("ufront.web.TestController::contact");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "Contact <form method='POST' action='/contact/'><input type='submit'/></form>";
		}
		$GLOBALS['%s']->pop();
	}
	public function emailContact($args) {
		$GLOBALS['%s']->push("ufront.web.TestController::emailContact");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "Send email about " . _hx_string_or_null($args->subject);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function pageCatchAll($rest) {
		$GLOBALS['%s']->push("ufront.web.TestController::pageCatchAll");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new ufront_web_result_ContentResult($rest->join("/"), "text/html");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function voidReturn() {
		$GLOBALS['%s']->push("ufront.web.TestController::voidReturn");
		$__hx__spos = $GLOBALS['%s']->length;
		Sys::println("void return");
		$GLOBALS['%s']->pop();
	}
	public $d;
	public function execute_d() {
		$GLOBALS['%s']->push("ufront.web.TestController::execute_d");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->injector->instantiate(_hx_qtype("ufront.web.DefaultController"))->execute();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function execute() {
		$GLOBALS['%s']->push("ufront.web.TestController::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		$uriParts = $this->context->actionContext->get_uriParts();
		$params = $this->context->request->get_params();
		$method = $this->context->request->get_httpMethod();
		$this->context->actionContext->controller = $this;
		$this->context->actionContext->action = "execute";
		try {
			if(0 === $uriParts->length) {
				$this->context->actionContext->action = "home";
				$this->context->actionContext->args = (new _hx_array(array()));
				$this->context->actionContext->get_uriParts()->splice(0, 0);
				$wrappingRequired = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->home->wrapResult[0];
				$result = $this->wrapResult($this->home(), $wrappingRequired);
				$this->setContextActionResultWhenFinished($result);
				{
					$GLOBALS['%s']->pop();
					return $result;
				}
			} else {
				if(1 === $uriParts->length && $uriParts[0] === "staff.html") {
					$this->context->actionContext->action = "staff";
					$this->context->actionContext->args = (new _hx_array(array()));
					$this->context->actionContext->get_uriParts()->splice(0, 1);
					$wrappingRequired1 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->staff->wrapResult[0];
					$result1 = $this->wrapResult($this->staff(), $wrappingRequired1);
					$this->setContextActionResultWhenFinished($result1);
					{
						$GLOBALS['%s']->pop();
						return $result1;
					}
				} else {
					if(2 === $uriParts->length && $uriParts[0] === "staff" && strlen($uriParts[1]) > 0) {
						$name = $uriParts[1];
						$this->context->actionContext->action = "viewStaff";
						$this->context->actionContext->args = (new _hx_array(array($name)));
						$this->context->actionContext->get_uriParts()->splice(0, 2);
						$wrappingRequired2 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->viewStaff->wrapResult[0];
						$result2 = $this->wrapResult($this->viewStaff($name), $wrappingRequired2);
						$this->setContextActionResultWhenFinished($result2);
						{
							$GLOBALS['%s']->pop();
							return $result2;
						}
					} else {
						if(strtolower($method) === "get" && 1 === $uriParts->length && $uriParts[0] === "contact") {
							$this->context->actionContext->action = "contact";
							$this->context->actionContext->args = (new _hx_array(array()));
							$this->context->actionContext->get_uriParts()->splice(0, 1);
							$wrappingRequired3 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->contact->wrapResult[0];
							$result3 = $this->wrapResult($this->contact(), $wrappingRequired3);
							$this->setContextActionResultWhenFinished($result3);
							{
								$GLOBALS['%s']->pop();
								return $result3;
							}
						} else {
							if(strtolower($method) === "post" && 1 === $uriParts->length && $uriParts[0] === "contact") {
								if(!$params->exists("subject")) {
									throw new HException(new tink_core_TypedError(400, "Bad Request", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 570, "className" => "ufront.web.TestController", "methodName" => "execute"))));
								}
								$_param_tmp_subject = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "subject");
								$_param_tmp_amount = Std::parseInt(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "amount"));
								$args = _hx_anonymous(array("subject" => $_param_tmp_subject, "amount" => $_param_tmp_amount));
								$this->context->actionContext->action = "emailContact";
								$this->context->actionContext->args = (new _hx_array(array($args)));
								$this->context->actionContext->get_uriParts()->splice(0, 1);
								$wrappingRequired4 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->emailContact->wrapResult[0];
								$result4 = $this->wrapResult($this->emailContact($args), $wrappingRequired4);
								$this->setContextActionResultWhenFinished($result4);
								{
									$GLOBALS['%s']->pop();
									return $result4;
								}
							} else {
								if(1 <= $uriParts->length && $uriParts[0] === "pages") {
									$rest = $this->context->actionContext->get_uriParts();
									$this->context->actionContext->action = "pageCatchAll";
									$this->context->actionContext->args = (new _hx_array(array($rest)));
									$this->context->actionContext->get_uriParts()->splice(0, 1);
									$wrappingRequired5 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->pageCatchAll->wrapResult[0];
									$result5 = $this->wrapResult($this->pageCatchAll($rest), $wrappingRequired5);
									$this->setContextActionResultWhenFinished($result5);
									{
										$GLOBALS['%s']->pop();
										return $result5;
									}
								} else {
									if(1 === $uriParts->length && $uriParts[0] === "void") {
										$this->context->actionContext->action = "voidReturn";
										$this->context->actionContext->args = (new _hx_array(array()));
										$this->context->actionContext->get_uriParts()->splice(0, 1);
										$this->voidReturn();
										$result6 = $this->wrapResult(null, 0);
										$this->setContextActionResultWhenFinished($result6);
										{
											$GLOBALS['%s']->pop();
											return $result6;
										}
									} else {
										if(1 <= $uriParts->length && $uriParts[0] === "default") {
											$this->context->actionContext->action = "execute_d";
											$this->context->actionContext->args = (new _hx_array(array()));
											$this->context->actionContext->get_uriParts()->splice(0, 1);
											$wrappingRequired6 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->execute_d->wrapResult[0];
											$result7 = $this->wrapResult($this->execute_d(), $wrappingRequired6);
											$this->setContextActionResultWhenFinished($result7);
											{
												$GLOBALS['%s']->pop();
												return $result7;
											}
										}
									}
								}
							}
						}
					}
				}
			}
			throw new HException(ufront_web_HttpError::pageNotFound(_hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 431, "className" => "ufront.web.TestController", "methodName" => "execute"))));
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				{
					$tmp = ufront_core_Sync::httpError("Uncaught error while executing " . Std::string($this->context->actionContext->controller) . "." . _hx_string_or_null($this->context->actionContext->action) . "()", $e, _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 434, "className" => "ufront.web.TestController", "methodName" => "execute")));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
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
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	function __toString() { return 'ufront.web.TestController'; }
}
ufront_web_TestController::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("home" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "staff" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "viewStaff" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "contact" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "emailContact" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "pageCatchAll" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(3))))), "voidReturn" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "execute_d" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(0)))))))));
