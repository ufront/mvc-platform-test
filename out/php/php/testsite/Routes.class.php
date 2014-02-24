<?php

class testsite_Routes extends ufront_web_Controller {
	public function __construct($context = null) { if(!php_Boot::$skip_constructor) {
		parent::__construct($context);
	}}
	public function index() {
		return "Index";
	}
	public function queryString() {
		return $this->context->httpContext->request->get_queryString();
	}
	public function postString() {
		return $this->context->httpContext->request->get_postString();
	}
	public function query() {
		return $this->printMultiValueMap($this->context->httpContext->request->get_query());
	}
	public function post() {
		return $this->printMultiValueMap($this->context->httpContext->request->get_post());
	}
	public function cookies() {
		return $this->printMultiValueMap($this->context->httpContext->request->get_cookies());
	}
	public function clientHeaders() {
		return $this->printMultiValueMap($this->context->httpContext->request->get_clientHeaders());
	}
	public function printMultiValueMap($map) {
		$lines = (new _hx_array(array()));
		if(null == $map) throw new HException('null iterable');
		$__hx__it = $map->keys();
		while($__hx__it->hasNext()) {
			$key = $__hx__it->next();
			$line = "" . _hx_string_or_null($key) . "=";
			$values = ufront_core__MultiValueMap_MultiValueMap_Impl_::getAll($map, $key);
			$values->sort((isset(Reflect::$compare) ? Reflect::$compare: array("Reflect", "compare")));
			$line .= _hx_string_or_null($values->join(","));
			$lines->push($line);
			unset($values,$line);
		}
		$lines->sort((isset(Reflect::$compare) ? Reflect::$compare: array("Reflect", "compare")));
		return $lines->join("\x0A");
	}
	public function hostname() {
		return $this->context->httpContext->request->get_hostName();
	}
	public function clientIP() {
		return $this->context->httpContext->request->get_clientIP();
	}
	public function uri() {
		return $this->context->httpContext->request->get_uri();
	}
	public function httpMethod() {
		return $this->context->httpContext->request->get_httpMethod();
	}
	public function scriptDir() {
		return $this->context->httpContext->request->get_scriptDirectory();
	}
	public function authorization() {
		$auth = $this->context->httpContext->request->get_authorization();
		return _hx_string_or_null($auth->user) . ":" . _hx_string_or_null($auth->pass);
	}
	public function testResponse($status, $charset, $args = null) {
		if($args->language === null) {
			$args->language = "en-au";
		}
		if($args->sessionID === null) {
			$args->sessionID = "123456";
		}
		if($args->testGroup === null) {
			$args->testGroup = "group a";
		}
		if($args->contentType === null) {
			$args->contentType = "text/html";
		}
		if($args->content === null) {
			$args->content = "response content";
		}
		$this->context->httpContext->response->status = $status;
		$this->context->httpContext->response->charset = $charset;
		$this->context->httpContext->response->set_contentType($args->contentType);
		$expiryDate = new Date(2015, 0, 1, 0, 0, 0);
		$c1 = new ufront_web_HttpCookie("sessionid", $args->sessionID, $expiryDate, "/testresponse/", null, null);
		$this->context->httpContext->response->setCookie($c1);
		$this->context->httpContext->response->setHeader("X-Powered-By", "Ufront");
		$this->context->httpContext->response->setHeader("Content-Language", $args->language);
		return haxe_Utf8::encode($args->content);
	}
	public function execute() {
		$uriParts = $this->context->get_uriParts();
		$params = $this->context->httpContext->request->get_params();
		$method = $this->context->httpContext->request->get_httpMethod();
		$this->context->controller = $this;
		$this->context->action = "execute";
		try {
			if(0 === $uriParts->length) {
				$this->context->action = "index";
				$this->context->args = (new _hx_array(array()));
				$this->context->get_uriParts()->splice(0, 0);
				$wrappingRequired = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->index->wrapResult[0];
				$result = $this->wrapResult($this->index(), $wrappingRequired);
				$this->setContextActionResultWhenFinished($result);
				return $result;
			} else {
				if(1 === $uriParts->length && $uriParts[0] === "querystring") {
					$this->context->action = "queryString";
					$this->context->args = (new _hx_array(array()));
					$this->context->get_uriParts()->splice(0, 1);
					$wrappingRequired1 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->queryString->wrapResult[0];
					$result1 = $this->wrapResult($this->queryString(), $wrappingRequired1);
					$this->setContextActionResultWhenFinished($result1);
					return $result1;
				} else {
					if(1 === $uriParts->length && $uriParts[0] === "poststring") {
						$this->context->action = "postString";
						$this->context->args = (new _hx_array(array()));
						$this->context->get_uriParts()->splice(0, 1);
						$wrappingRequired2 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->postString->wrapResult[0];
						$result2 = $this->wrapResult($this->postString(), $wrappingRequired2);
						$this->setContextActionResultWhenFinished($result2);
						return $result2;
					} else {
						if(1 === $uriParts->length && $uriParts[0] === "query") {
							$this->context->action = "query";
							$this->context->args = (new _hx_array(array()));
							$this->context->get_uriParts()->splice(0, 1);
							$wrappingRequired3 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->query->wrapResult[0];
							$result3 = $this->wrapResult($this->query(), $wrappingRequired3);
							$this->setContextActionResultWhenFinished($result3);
							return $result3;
						} else {
							if(1 === $uriParts->length && $uriParts[0] === "post") {
								$this->context->action = "post";
								$this->context->args = (new _hx_array(array()));
								$this->context->get_uriParts()->splice(0, 1);
								$wrappingRequired4 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->post->wrapResult[0];
								$result4 = $this->wrapResult($this->post(), $wrappingRequired4);
								$this->setContextActionResultWhenFinished($result4);
								return $result4;
							} else {
								if(1 === $uriParts->length && $uriParts[0] === "cookies") {
									$this->context->action = "cookies";
									$this->context->args = (new _hx_array(array()));
									$this->context->get_uriParts()->splice(0, 1);
									$wrappingRequired5 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->cookies->wrapResult[0];
									$result5 = $this->wrapResult($this->cookies(), $wrappingRequired5);
									$this->setContextActionResultWhenFinished($result5);
									return $result5;
								} else {
									if(1 === $uriParts->length && $uriParts[0] === "clientheaders") {
										$this->context->action = "clientHeaders";
										$this->context->args = (new _hx_array(array()));
										$this->context->get_uriParts()->splice(0, 1);
										$wrappingRequired6 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientHeaders->wrapResult[0];
										$result6 = $this->wrapResult($this->clientHeaders(), $wrappingRequired6);
										$this->setContextActionResultWhenFinished($result6);
										return $result6;
									} else {
										if(1 === $uriParts->length && $uriParts[0] === "hostname") {
											$this->context->action = "hostname";
											$this->context->args = (new _hx_array(array()));
											$this->context->get_uriParts()->splice(0, 1);
											$wrappingRequired7 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->hostname->wrapResult[0];
											$result7 = $this->wrapResult($this->hostname(), $wrappingRequired7);
											$this->setContextActionResultWhenFinished($result7);
											return $result7;
										} else {
											if(1 === $uriParts->length && $uriParts[0] === "clientip") {
												$this->context->action = "clientIP";
												$this->context->args = (new _hx_array(array()));
												$this->context->get_uriParts()->splice(0, 1);
												$wrappingRequired8 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientIP->wrapResult[0];
												$result8 = $this->wrapResult($this->clientIP(), $wrappingRequired8);
												$this->setContextActionResultWhenFinished($result8);
												return $result8;
											} else {
												if(1 <= $uriParts->length && $uriParts[0] === "uri") {
													$this->context->action = "uri";
													$this->context->args = (new _hx_array(array()));
													$this->context->get_uriParts()->splice(0, 1);
													$wrappingRequired9 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->uri->wrapResult[0];
													$result9 = $this->wrapResult($this->uri(), $wrappingRequired9);
													$this->setContextActionResultWhenFinished($result9);
													return $result9;
												} else {
													if(1 === $uriParts->length && $uriParts[0] === "httpmethod") {
														$this->context->action = "httpMethod";
														$this->context->args = (new _hx_array(array()));
														$this->context->get_uriParts()->splice(0, 1);
														$wrappingRequired10 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->httpMethod->wrapResult[0];
														$result10 = $this->wrapResult($this->httpMethod(), $wrappingRequired10);
														$this->setContextActionResultWhenFinished($result10);
														return $result10;
													} else {
														if(1 === $uriParts->length && $uriParts[0] === "scriptdirectory") {
															$this->context->action = "scriptDir";
															$this->context->args = (new _hx_array(array()));
															$this->context->get_uriParts()->splice(0, 1);
															$wrappingRequired11 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->scriptDir->wrapResult[0];
															$result11 = $this->wrapResult($this->scriptDir(), $wrappingRequired11);
															$this->setContextActionResultWhenFinished($result11);
															return $result11;
														} else {
															if(1 === $uriParts->length && $uriParts[0] === "authorization") {
																$this->context->action = "authorization";
																$this->context->args = (new _hx_array(array()));
																$this->context->get_uriParts()->splice(0, 1);
																$wrappingRequired12 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->authorization->wrapResult[0];
																$result12 = $this->wrapResult($this->authorization(), $wrappingRequired12);
																$this->setContextActionResultWhenFinished($result12);
																return $result12;
															} else {
																if(3 === $uriParts->length && $uriParts[0] === "testresponse" && strlen($uriParts[1]) > 0 && strlen($uriParts[2]) > 0) {
																	$status = Std::parseInt($uriParts[1]);
																	if($status === null) {
																		throw new HException(new ufront_web_HttpError(400, "Bad Request", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 567, "className" => "testsite.Routes", "methodName" => "execute"))));
																	}
																	$charset = $uriParts[2];
																	$_param_tmp_sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "sessionID");
																	$_param_tmp_testGroup = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "testGroup");
																	$_param_tmp_language = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "language");
																	$_param_tmp_contentType = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "contentType");
																	$_param_tmp_content = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "content");
																	$args = _hx_anonymous(array("sessionID" => $_param_tmp_sessionID, "testGroup" => $_param_tmp_testGroup, "language" => $_param_tmp_language, "contentType" => $_param_tmp_contentType, "content" => $_param_tmp_content));
																	$this->context->action = "testResponse";
																	$this->context->args = (new _hx_array(array($status, $charset, $args)));
																	$this->context->get_uriParts()->splice(0, 3);
																	$wrappingRequired13 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->testResponse->wrapResult[0];
																	$result13 = $this->wrapResult($this->testResponse($status, $charset, $args), $wrappingRequired13);
																	$this->setContextActionResultWhenFinished($result13);
																	return $result13;
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
			throw new HException(ufront_web_HttpError::pageNotFound(_hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 373, "className" => "testsite.Routes", "methodName" => "execute"))));
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return ufront_core_Sync::httpError("Uncaught error while executing " . Std::string($this->context->controller) . "." . _hx_string_or_null($this->context->action) . "()", $e, _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 376, "className" => "testsite.Routes", "methodName" => "execute")));
			}
		}
	}
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	static $__properties__ = array("set_context" => "set_context");
	function __toString() { return 'testsite.Routes'; }
}
testsite_Routes::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("index" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "queryString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "postString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "query" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "post" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "cookies" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientHeaders" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "hostname" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientIP" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "uri" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "httpMethod" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "scriptDir" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "authorization" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "testResponse" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7)))))))));
