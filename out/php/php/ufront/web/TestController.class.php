<?php

class ufront_web_TestController extends ufront_web_Controller {
	public function __construct($context = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($context);
	}}
	public function home() {
		return "Home";
	}
	public function staff() {
		return "Staff";
	}
	public function viewStaff($name) {
		return "Staff: " . _hx_string_or_null($name);
	}
	public function contact() {
		return "Contact <form method='POST' action='/contact/'><input type='submit'/></form>";
	}
	public function emailContact($args) {
		return "Send email about " . _hx_string_or_null($args->subject);
	}
	public function pageCatchAll($rest) {
		return new ufront_web_result_ContentResult($rest->join("/"), "text/html");
	}
	public function voidReturn() {
		Sys::println("void return");
	}
	public $d;
	public function execute_d() {
		return _hx_deref(new ufront_web_DefaultController($this->context))->execute();
	}
	public function execute() {
		$uriParts = $this->context->get_uriParts();
		$params = $this->context->httpContext->request->get_params();
		$method = $this->context->httpContext->request->get_httpMethod();
		$this->context->controller = $this;
		$this->context->action = "execute";
		try {
			if(0 === $uriParts->length) {
				$this->context->action = "home";
				$this->context->args = (new _hx_array(array()));
				$this->context->get_uriParts()->splice(0, 0);
				$wrappingRequired = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->home->wrapResult[0];
				$result = $this->wrapResult($this->home(), $wrappingRequired);
				$this->setContextActionResultWhenFinished($result);
				return $result;
			} else {
				if(1 === $uriParts->length && $uriParts[0] === "staff.html") {
					$this->context->action = "staff";
					$this->context->args = (new _hx_array(array()));
					$this->context->get_uriParts()->splice(0, 1);
					$wrappingRequired1 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->staff->wrapResult[0];
					$result1 = $this->wrapResult($this->staff(), $wrappingRequired1);
					$this->setContextActionResultWhenFinished($result1);
					return $result1;
				} else {
					if(2 === $uriParts->length && $uriParts[0] === "staff" && strlen($uriParts[1]) > 0) {
						$name = $uriParts[1];
						$this->context->action = "viewStaff";
						$this->context->args = (new _hx_array(array($name)));
						$this->context->get_uriParts()->splice(0, 2);
						$wrappingRequired2 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->viewStaff->wrapResult[0];
						$result2 = $this->wrapResult($this->viewStaff($name), $wrappingRequired2);
						$this->setContextActionResultWhenFinished($result2);
						return $result2;
					} else {
						if(strtolower($method) === "get" && 1 === $uriParts->length && $uriParts[0] === "contact") {
							$this->context->action = "contact";
							$this->context->args = (new _hx_array(array()));
							$this->context->get_uriParts()->splice(0, 1);
							$wrappingRequired3 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->contact->wrapResult[0];
							$result3 = $this->wrapResult($this->contact(), $wrappingRequired3);
							$this->setContextActionResultWhenFinished($result3);
							return $result3;
						} else {
							if(strtolower($method) === "post" && 1 === $uriParts->length && $uriParts[0] === "contact") {
								if(!$params->exists("subject")) {
									throw new HException(new ufront_web_HttpError(400, "Bad Request", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 515, "className" => "ufront.web.TestController", "methodName" => "execute"))));
								}
								$_param_tmp_subject = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "subject");
								$_param_tmp_amount = Std::parseInt(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "amount"));
								if($_param_tmp_amount === null) {
									throw new HException(new ufront_web_HttpError(400, "Bad Request", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 567, "className" => "ufront.web.TestController", "methodName" => "execute"))));
								}
								$args = _hx_anonymous(array("subject" => $_param_tmp_subject, "amount" => $_param_tmp_amount));
								$this->context->action = "emailContact";
								$this->context->args = (new _hx_array(array($args)));
								$this->context->get_uriParts()->splice(0, 1);
								$wrappingRequired4 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->emailContact->wrapResult[0];
								$result4 = $this->wrapResult($this->emailContact($args), $wrappingRequired4);
								$this->setContextActionResultWhenFinished($result4);
								return $result4;
							} else {
								if(1 <= $uriParts->length && $uriParts[0] === "pages") {
									$rest = $this->context->get_uriParts();
									$this->context->action = "pageCatchAll";
									$this->context->args = (new _hx_array(array($rest)));
									$this->context->get_uriParts()->splice(0, 1);
									$wrappingRequired5 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->pageCatchAll->wrapResult[0];
									$result5 = $this->wrapResult($this->pageCatchAll($rest), $wrappingRequired5);
									$this->setContextActionResultWhenFinished($result5);
									return $result5;
								} else {
									if(1 === $uriParts->length && $uriParts[0] === "void") {
										$this->context->action = "voidReturn";
										$this->context->args = (new _hx_array(array()));
										$this->context->get_uriParts()->splice(0, 1);
										$this->voidReturn();
										$result6 = $this->wrapResult(null, 0);
										$this->setContextActionResultWhenFinished($result6);
										return $result6;
									} else {
										if(1 <= $uriParts->length && $uriParts[0] === "default") {
											$this->context->action = "execute_d";
											$this->context->args = (new _hx_array(array()));
											$this->context->get_uriParts()->splice(0, 1);
											$wrappingRequired6 = haxe_rtti_Meta::getFields(_hx_qtype("ufront.web.TestController"))->execute_d->wrapResult[0];
											$result7 = $this->wrapResult($this->execute_d(), $wrappingRequired6);
											$this->setContextActionResultWhenFinished($result7);
											return $result7;
										}
									}
								}
							}
						}
					}
				}
			}
			throw new HException(ufront_web_HttpError::pageNotFound(_hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 373, "className" => "ufront.web.TestController", "methodName" => "execute"))));
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return ufront_core_Sync::httpError("Uncaught error while executing " . Std::string($this->context->controller) . "." . _hx_string_or_null($this->context->action) . "()", $e, _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 376, "className" => "ufront.web.TestController", "methodName" => "execute")));
			}
		}
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
	static $__properties__ = array("set_context" => "set_context");
	function __toString() { return 'ufront.web.TestController'; }
}
ufront_web_TestController::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("home" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "staff" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "viewStaff" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "contact" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "emailContact" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "pageCatchAll" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(3))))), "voidReturn" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "execute_d" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(0)))))))));
