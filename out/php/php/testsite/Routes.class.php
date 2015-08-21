<?php

class testsite_Routes extends ufront_web_Controller {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function index() {
		return "Index";
	}
	public function queryString() {
		return $this->context->request->get_queryString();
	}
	public function postString() {
		return $this->context->request->get_postString();
	}
	public function query() {
		return $this->printMultiValueMap($this->context->request->get_query());
	}
	public function post() {
		return $this->printMultiValueMap($this->context->request->get_post());
	}
	public function cookies() {
		return $this->printMultiValueMap($this->context->request->get_cookies());
	}
	public function clientHeaders() {
		return $this->printMultiValueMap($this->context->request->get_clientHeaders());
	}
	public function printMultiValueMap($map) {
		$lines = (new _hx_array(array()));
		if(null == $map) throw new HException('null iterable');
		$__hx__it = $map->keys();
		while($__hx__it->hasNext()) {
			unset($key);
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
		return $this->context->request->get_hostName();
	}
	public function clientIP() {
		return $this->context->request->get_clientIP();
	}
	public function uri() {
		return $this->context->request->get_uri();
	}
	public function httpMethod() {
		return $this->context->request->get_httpMethod();
	}
	public function scriptDir() {
		return $this->context->request->get_scriptDirectory();
	}
	public function authorization() {
		$auth = $this->context->request->get_authorization();
		return _hx_string_or_null($auth->user) . ":" . _hx_string_or_null($auth->pass);
	}
	public function testResponse($status, $charset, $args = null) {
		if($args->language === null) {
			$args->language = "en-au";
		}
		if($args->contentType === null) {
			$args->contentType = "text/html";
		}
		if($args->content === null) {
			$args->content = "response content";
		}
		if($args->cookieName === null) {
			$args->cookieName = "sessionid";
		}
		if($args->cookieVal === null) {
			$args->cookieVal = "123456";
		}
		$this->context->response->status = $status;
		$this->context->response->charset = $charset;
		$this->context->response->set_contentType($args->contentType);
		$expiryDate = new Date(2015, 0, 1, 0, 0, 0);
		$c1 = new ufront_web_HttpCookie($args->cookieName, $args->cookieVal, $expiryDate, "/testresponse/", null, null, null);
		$this->context->response->setCookie($c1);
		$this->context->response->setHeader("X-Powered-By", "Ufront");
		$this->context->response->setHeader("Content-Language", $args->language);
		return haxe_Utf8::encode($args->content);
	}
	public function execute() {
		$uriParts = $this->context->actionContext->get_uriParts();
		$this->setBaseUri($uriParts);
		$params = $this->context->request->get_params();
		$method = $this->context->request->get_httpMethod();
		$this->context->actionContext->controller = $this;
		$this->context->actionContext->action = "execute";
		try {
			if(0 === $uriParts->length) {
				$this->context->actionContext->action = "index";
				$this->context->actionContext->args = (new _hx_array(array()));
				$this->context->actionContext->get_uriParts()->splice(0, 0);
				$wrappingRequired = null;
				{
					$i = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->index->wrapResult[0];
					$wrappingRequired = $i;
				}
				$result = $this->wrapResult($this->index(), $wrappingRequired);
				$this->setContextActionResultWhenFinished($result);
				return $result;
			} else {
				if(1 === $uriParts->length && $uriParts[0] === "querystring") {
					$this->context->actionContext->action = "queryString";
					$this->context->actionContext->args = (new _hx_array(array()));
					$this->context->actionContext->get_uriParts()->splice(0, 1);
					$wrappingRequired1 = null;
					{
						$i1 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->queryString->wrapResult[0];
						$wrappingRequired1 = $i1;
					}
					$result1 = $this->wrapResult($this->queryString(), $wrappingRequired1);
					$this->setContextActionResultWhenFinished($result1);
					return $result1;
				} else {
					if(1 === $uriParts->length && $uriParts[0] === "poststring") {
						$this->context->actionContext->action = "postString";
						$this->context->actionContext->args = (new _hx_array(array()));
						$this->context->actionContext->get_uriParts()->splice(0, 1);
						$wrappingRequired2 = null;
						{
							$i2 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->postString->wrapResult[0];
							$wrappingRequired2 = $i2;
						}
						$result2 = $this->wrapResult($this->postString(), $wrappingRequired2);
						$this->setContextActionResultWhenFinished($result2);
						return $result2;
					} else {
						if(1 === $uriParts->length && $uriParts[0] === "query") {
							$this->context->actionContext->action = "query";
							$this->context->actionContext->args = (new _hx_array(array()));
							$this->context->actionContext->get_uriParts()->splice(0, 1);
							$wrappingRequired3 = null;
							{
								$i3 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->query->wrapResult[0];
								$wrappingRequired3 = $i3;
							}
							$result3 = $this->wrapResult($this->query(), $wrappingRequired3);
							$this->setContextActionResultWhenFinished($result3);
							return $result3;
						} else {
							if(1 === $uriParts->length && $uriParts[0] === "post") {
								$this->context->actionContext->action = "post";
								$this->context->actionContext->args = (new _hx_array(array()));
								$this->context->actionContext->get_uriParts()->splice(0, 1);
								$wrappingRequired4 = null;
								{
									$i4 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->post->wrapResult[0];
									$wrappingRequired4 = $i4;
								}
								$result4 = $this->wrapResult($this->post(), $wrappingRequired4);
								$this->setContextActionResultWhenFinished($result4);
								return $result4;
							} else {
								if(1 === $uriParts->length && $uriParts[0] === "cookies") {
									$this->context->actionContext->action = "cookies";
									$this->context->actionContext->args = (new _hx_array(array()));
									$this->context->actionContext->get_uriParts()->splice(0, 1);
									$wrappingRequired5 = null;
									{
										$i5 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->cookies->wrapResult[0];
										$wrappingRequired5 = $i5;
									}
									$result5 = $this->wrapResult($this->cookies(), $wrappingRequired5);
									$this->setContextActionResultWhenFinished($result5);
									return $result5;
								} else {
									if(1 === $uriParts->length && $uriParts[0] === "clientheaders") {
										$this->context->actionContext->action = "clientHeaders";
										$this->context->actionContext->args = (new _hx_array(array()));
										$this->context->actionContext->get_uriParts()->splice(0, 1);
										$wrappingRequired6 = null;
										{
											$i6 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientHeaders->wrapResult[0];
											$wrappingRequired6 = $i6;
										}
										$result6 = $this->wrapResult($this->clientHeaders(), $wrappingRequired6);
										$this->setContextActionResultWhenFinished($result6);
										return $result6;
									} else {
										if(1 === $uriParts->length && $uriParts[0] === "hostname") {
											$this->context->actionContext->action = "hostname";
											$this->context->actionContext->args = (new _hx_array(array()));
											$this->context->actionContext->get_uriParts()->splice(0, 1);
											$wrappingRequired7 = null;
											{
												$i7 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->hostname->wrapResult[0];
												$wrappingRequired7 = $i7;
											}
											$result7 = $this->wrapResult($this->hostname(), $wrappingRequired7);
											$this->setContextActionResultWhenFinished($result7);
											return $result7;
										} else {
											if(1 === $uriParts->length && $uriParts[0] === "clientip") {
												$this->context->actionContext->action = "clientIP";
												$this->context->actionContext->args = (new _hx_array(array()));
												$this->context->actionContext->get_uriParts()->splice(0, 1);
												$wrappingRequired8 = null;
												{
													$i8 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientIP->wrapResult[0];
													$wrappingRequired8 = $i8;
												}
												$result8 = $this->wrapResult($this->clientIP(), $wrappingRequired8);
												$this->setContextActionResultWhenFinished($result8);
												return $result8;
											} else {
												if(1 <= $uriParts->length && $uriParts[0] === "uri") {
													$this->context->actionContext->action = "uri";
													$this->context->actionContext->args = (new _hx_array(array()));
													$this->context->actionContext->get_uriParts()->splice(0, 1);
													$wrappingRequired9 = null;
													{
														$i9 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->uri->wrapResult[0];
														$wrappingRequired9 = $i9;
													}
													$result9 = $this->wrapResult($this->uri(), $wrappingRequired9);
													$this->setContextActionResultWhenFinished($result9);
													return $result9;
												} else {
													if(1 === $uriParts->length && $uriParts[0] === "httpmethod") {
														$this->context->actionContext->action = "httpMethod";
														$this->context->actionContext->args = (new _hx_array(array()));
														$this->context->actionContext->get_uriParts()->splice(0, 1);
														$wrappingRequired10 = null;
														{
															$i10 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->httpMethod->wrapResult[0];
															$wrappingRequired10 = $i10;
														}
														$result10 = $this->wrapResult($this->httpMethod(), $wrappingRequired10);
														$this->setContextActionResultWhenFinished($result10);
														return $result10;
													} else {
														if(1 === $uriParts->length && $uriParts[0] === "scriptdirectory") {
															$this->context->actionContext->action = "scriptDir";
															$this->context->actionContext->args = (new _hx_array(array()));
															$this->context->actionContext->get_uriParts()->splice(0, 1);
															$wrappingRequired11 = null;
															{
																$i11 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->scriptDir->wrapResult[0];
																$wrappingRequired11 = $i11;
															}
															$result11 = $this->wrapResult($this->scriptDir(), $wrappingRequired11);
															$this->setContextActionResultWhenFinished($result11);
															return $result11;
														} else {
															if(1 === $uriParts->length && $uriParts[0] === "authorization") {
																$this->context->actionContext->action = "authorization";
																$this->context->actionContext->args = (new _hx_array(array()));
																$this->context->actionContext->get_uriParts()->splice(0, 1);
																$wrappingRequired12 = null;
																{
																	$i12 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->authorization->wrapResult[0];
																	$wrappingRequired12 = $i12;
																}
																$result12 = $this->wrapResult($this->authorization(), $wrappingRequired12);
																$this->setContextActionResultWhenFinished($result12);
																return $result12;
															} else {
																if(3 === $uriParts->length && $uriParts[0] === "testresponse" && strlen($uriParts[1]) > 0 && strlen($uriParts[2]) > 0) {
																	$status = Std::parseInt($uriParts[1]);
																	if($status === null) {
																		throw new HException(testsite_Routes_0($this, $method, $params, $status, $uriParts));
																	}
																	$charset = $uriParts[2];
																	$_param_tmp_language = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "language");
																	$_param_tmp_contentType = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "contentType");
																	$_param_tmp_content = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "content");
																	$_param_tmp_cookieName = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "cookieName");
																	$_param_tmp_cookieVal = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "cookieVal");
																	$args = _hx_anonymous(array("language" => $_param_tmp_language, "contentType" => $_param_tmp_contentType, "content" => $_param_tmp_content, "cookieName" => $_param_tmp_cookieName, "cookieVal" => $_param_tmp_cookieVal));
																	$this->context->actionContext->action = "testResponse";
																	$this->context->actionContext->args = (new _hx_array(array($status, $charset, $args)));
																	$this->context->actionContext->get_uriParts()->splice(0, 3);
																	$wrappingRequired13 = null;
																	{
																		$i13 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->testResponse->wrapResult[0];
																		$wrappingRequired13 = $i13;
																	}
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
			throw new HException(ufront_web_HttpError::pageNotFound(_hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 442, "className" => "testsite.Routes", "methodName" => "execute"))));
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return ufront_core_SurpriseTools::asSurpriseError($e, "Uncaught error while executing " . Std::string($this->context->actionContext->controller) . "." . _hx_string_or_null($this->context->actionContext->action) . "()", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 445, "className" => "testsite.Routes", "methodName" => "execute")));
			}
		}
	}
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	function __toString() { return 'testsite.Routes'; }
}
testsite_Routes::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("index" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "queryString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "postString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "query" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "post" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "cookies" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientHeaders" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "hostname" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientIP" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "uri" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "httpMethod" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "scriptDir" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "authorization" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "testResponse" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7)))))))));
function testsite_Routes_0(&$__hx__this, &$method, &$params, &$status, &$uriParts) {
	{
		$reason = "Could not parse parameter " . "status" . ":Int = " . _hx_string_or_null($uriParts[1]);
		$message = "Bad Request";
		if($reason !== null) {
			$message .= ": " . _hx_string_or_null($reason);
		}
		return new tink_core_TypedError(400, $message, _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 633, "className" => "testsite.Routes", "methodName" => "execute")));
	}
}
