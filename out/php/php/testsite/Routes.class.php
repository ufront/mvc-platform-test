<?php

class testsite_Routes extends ufront_web_Controller {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("testsite.Routes::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function index() {
		$GLOBALS['%s']->push("testsite.Routes::index");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "Index";
		}
		$GLOBALS['%s']->pop();
	}
	public function queryString() {
		$GLOBALS['%s']->push("testsite.Routes::queryString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_queryString();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function postString() {
		$GLOBALS['%s']->push("testsite.Routes::postString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_postString();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function query() {
		$GLOBALS['%s']->push("testsite.Routes::query");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->context->messages->push(_hx_anonymous(array("msg" => "Yo! Does trace work on node?", "pos" => _hx_anonymous(array("fileName" => "Routes.hx", "lineNumber" => 22, "className" => "testsite.Routes", "methodName" => "query")), "type" => ufront_log_MessageType::$Trace)));
		{
			$tmp = $this->printMultiValueMap($this->context->request->get_query());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function post() {
		$GLOBALS['%s']->push("testsite.Routes::post");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->printMultiValueMap($this->context->request->get_post());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function cookies() {
		$GLOBALS['%s']->push("testsite.Routes::cookies");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->printMultiValueMap($this->context->request->get_cookies());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clientHeaders() {
		$GLOBALS['%s']->push("testsite.Routes::clientHeaders");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->printMultiValueMap($this->context->request->get_clientHeaders());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function printMultiValueMap($map) {
		$GLOBALS['%s']->push("testsite.Routes::printMultiValueMap");
		$__hx__spos = $GLOBALS['%s']->length;
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
		{
			$tmp = $lines->join("\x0A");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function hostname() {
		$GLOBALS['%s']->push("testsite.Routes::hostname");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_hostName();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clientIP() {
		$GLOBALS['%s']->push("testsite.Routes::clientIP");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_clientIP();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function uri() {
		$GLOBALS['%s']->push("testsite.Routes::uri");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_uri();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function httpMethod() {
		$GLOBALS['%s']->push("testsite.Routes::httpMethod");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_httpMethod();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function scriptDir() {
		$GLOBALS['%s']->push("testsite.Routes::scriptDir");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->context->request->get_scriptDirectory();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function authorization() {
		$GLOBALS['%s']->push("testsite.Routes::authorization");
		$__hx__spos = $GLOBALS['%s']->length;
		$auth = $this->context->request->get_authorization();
		{
			$tmp = _hx_string_or_null($auth->user) . ":" . _hx_string_or_null($auth->pass);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function testResponse($status, $charset, $args = null) {
		$GLOBALS['%s']->push("testsite.Routes::testResponse");
		$__hx__spos = $GLOBALS['%s']->length;
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
		$c1 = new ufront_web_HttpCookie($args->cookieName, $args->cookieVal, $expiryDate, "/testresponse/", null, null);
		$this->context->response->setCookie($c1);
		$this->context->response->setHeader("X-Powered-By", "Ufront");
		$this->context->response->setHeader("Content-Language", $args->language);
		{
			$tmp = haxe_Utf8::encode($args->content);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function execute() {
		$GLOBALS['%s']->push("testsite.Routes::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		$uriParts = $this->context->actionContext->get_uriParts();
		$params = $this->context->request->get_params();
		$method = $this->context->request->get_httpMethod();
		$this->context->actionContext->controller = $this;
		$this->context->actionContext->action = "execute";
		try {
			if(0 === $uriParts->length) {
				$this->context->actionContext->action = "index";
				$this->context->actionContext->args = (new _hx_array(array()));
				$this->context->actionContext->get_uriParts()->splice(0, 0);
				$wrappingRequired = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->index->wrapResult[0];
				$result = $this->wrapResult($this->index(), $wrappingRequired);
				$this->setContextActionResultWhenFinished($result);
				{
					$GLOBALS['%s']->pop();
					return $result;
				}
			} else {
				if(1 === $uriParts->length && $uriParts[0] === "querystring") {
					$this->context->actionContext->action = "queryString";
					$this->context->actionContext->args = (new _hx_array(array()));
					$this->context->actionContext->get_uriParts()->splice(0, 1);
					$wrappingRequired1 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->queryString->wrapResult[0];
					$result1 = $this->wrapResult($this->queryString(), $wrappingRequired1);
					$this->setContextActionResultWhenFinished($result1);
					{
						$GLOBALS['%s']->pop();
						return $result1;
					}
				} else {
					if(1 === $uriParts->length && $uriParts[0] === "poststring") {
						$this->context->actionContext->action = "postString";
						$this->context->actionContext->args = (new _hx_array(array()));
						$this->context->actionContext->get_uriParts()->splice(0, 1);
						$wrappingRequired2 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->postString->wrapResult[0];
						$result2 = $this->wrapResult($this->postString(), $wrappingRequired2);
						$this->setContextActionResultWhenFinished($result2);
						{
							$GLOBALS['%s']->pop();
							return $result2;
						}
					} else {
						if(1 === $uriParts->length && $uriParts[0] === "query") {
							$this->context->actionContext->action = "query";
							$this->context->actionContext->args = (new _hx_array(array()));
							$this->context->actionContext->get_uriParts()->splice(0, 1);
							$wrappingRequired3 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->query->wrapResult[0];
							$result3 = $this->wrapResult($this->query(), $wrappingRequired3);
							$this->setContextActionResultWhenFinished($result3);
							{
								$GLOBALS['%s']->pop();
								return $result3;
							}
						} else {
							if(1 === $uriParts->length && $uriParts[0] === "post") {
								$this->context->actionContext->action = "post";
								$this->context->actionContext->args = (new _hx_array(array()));
								$this->context->actionContext->get_uriParts()->splice(0, 1);
								$wrappingRequired4 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->post->wrapResult[0];
								$result4 = $this->wrapResult($this->post(), $wrappingRequired4);
								$this->setContextActionResultWhenFinished($result4);
								{
									$GLOBALS['%s']->pop();
									return $result4;
								}
							} else {
								if(1 === $uriParts->length && $uriParts[0] === "cookies") {
									$this->context->actionContext->action = "cookies";
									$this->context->actionContext->args = (new _hx_array(array()));
									$this->context->actionContext->get_uriParts()->splice(0, 1);
									$wrappingRequired5 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->cookies->wrapResult[0];
									$result5 = $this->wrapResult($this->cookies(), $wrappingRequired5);
									$this->setContextActionResultWhenFinished($result5);
									{
										$GLOBALS['%s']->pop();
										return $result5;
									}
								} else {
									if(1 === $uriParts->length && $uriParts[0] === "clientheaders") {
										$this->context->actionContext->action = "clientHeaders";
										$this->context->actionContext->args = (new _hx_array(array()));
										$this->context->actionContext->get_uriParts()->splice(0, 1);
										$wrappingRequired6 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientHeaders->wrapResult[0];
										$result6 = $this->wrapResult($this->clientHeaders(), $wrappingRequired6);
										$this->setContextActionResultWhenFinished($result6);
										{
											$GLOBALS['%s']->pop();
											return $result6;
										}
									} else {
										if(1 === $uriParts->length && $uriParts[0] === "hostname") {
											$this->context->actionContext->action = "hostname";
											$this->context->actionContext->args = (new _hx_array(array()));
											$this->context->actionContext->get_uriParts()->splice(0, 1);
											$wrappingRequired7 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->hostname->wrapResult[0];
											$result7 = $this->wrapResult($this->hostname(), $wrappingRequired7);
											$this->setContextActionResultWhenFinished($result7);
											{
												$GLOBALS['%s']->pop();
												return $result7;
											}
										} else {
											if(1 === $uriParts->length && $uriParts[0] === "clientip") {
												$this->context->actionContext->action = "clientIP";
												$this->context->actionContext->args = (new _hx_array(array()));
												$this->context->actionContext->get_uriParts()->splice(0, 1);
												$wrappingRequired8 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->clientIP->wrapResult[0];
												$result8 = $this->wrapResult($this->clientIP(), $wrappingRequired8);
												$this->setContextActionResultWhenFinished($result8);
												{
													$GLOBALS['%s']->pop();
													return $result8;
												}
											} else {
												if(1 <= $uriParts->length && $uriParts[0] === "uri") {
													$this->context->actionContext->action = "uri";
													$this->context->actionContext->args = (new _hx_array(array()));
													$this->context->actionContext->get_uriParts()->splice(0, 1);
													$wrappingRequired9 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->uri->wrapResult[0];
													$result9 = $this->wrapResult($this->uri(), $wrappingRequired9);
													$this->setContextActionResultWhenFinished($result9);
													{
														$GLOBALS['%s']->pop();
														return $result9;
													}
												} else {
													if(1 === $uriParts->length && $uriParts[0] === "httpmethod") {
														$this->context->actionContext->action = "httpMethod";
														$this->context->actionContext->args = (new _hx_array(array()));
														$this->context->actionContext->get_uriParts()->splice(0, 1);
														$wrappingRequired10 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->httpMethod->wrapResult[0];
														$result10 = $this->wrapResult($this->httpMethod(), $wrappingRequired10);
														$this->setContextActionResultWhenFinished($result10);
														{
															$GLOBALS['%s']->pop();
															return $result10;
														}
													} else {
														if(1 === $uriParts->length && $uriParts[0] === "scriptdirectory") {
															$this->context->actionContext->action = "scriptDir";
															$this->context->actionContext->args = (new _hx_array(array()));
															$this->context->actionContext->get_uriParts()->splice(0, 1);
															$wrappingRequired11 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->scriptDir->wrapResult[0];
															$result11 = $this->wrapResult($this->scriptDir(), $wrappingRequired11);
															$this->setContextActionResultWhenFinished($result11);
															{
																$GLOBALS['%s']->pop();
																return $result11;
															}
														} else {
															if(1 === $uriParts->length && $uriParts[0] === "authorization") {
																$this->context->actionContext->action = "authorization";
																$this->context->actionContext->args = (new _hx_array(array()));
																$this->context->actionContext->get_uriParts()->splice(0, 1);
																$wrappingRequired12 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->authorization->wrapResult[0];
																$result12 = $this->wrapResult($this->authorization(), $wrappingRequired12);
																$this->setContextActionResultWhenFinished($result12);
																{
																	$GLOBALS['%s']->pop();
																	return $result12;
																}
															} else {
																if(3 === $uriParts->length && $uriParts[0] === "testresponse" && strlen($uriParts[1]) > 0 && strlen($uriParts[2]) > 0) {
																	$status = Std::parseInt($uriParts[1]);
																	if($status === null) {
																		throw new HException(new tink_core_TypedError(400, "Bad Request", _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 622, "className" => "testsite.Routes", "methodName" => "execute"))));
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
																	$wrappingRequired13 = haxe_rtti_Meta::getFields(_hx_qtype("testsite.Routes"))->testResponse->wrapResult[0];
																	$result13 = $this->wrapResult($this->testResponse($status, $charset, $args), $wrappingRequired13);
																	$this->setContextActionResultWhenFinished($result13);
																	{
																		$GLOBALS['%s']->pop();
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
			}
			throw new HException(ufront_web_HttpError::pageNotFound(_hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 431, "className" => "testsite.Routes", "methodName" => "execute"))));
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
					$tmp = ufront_core_Sync::httpError("Uncaught error while executing " . Std::string($this->context->actionContext->controller) . "." . _hx_string_or_null($this->context->actionContext->action) . "()", $e, _hx_anonymous(array("fileName" => "ControllerMacros.hx", "lineNumber" => 434, "className" => "testsite.Routes", "methodName" => "execute")));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	function __toString() { return 'testsite.Routes'; }
}
testsite_Routes::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("index" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "queryString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "postString" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "query" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "post" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "cookies" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientHeaders" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "hostname" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "clientIP" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "uri" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "httpMethod" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "scriptDir" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "authorization" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7))))), "testResponse" => _hx_anonymous(array("wrapResult" => (new _hx_array(array(7)))))))));
