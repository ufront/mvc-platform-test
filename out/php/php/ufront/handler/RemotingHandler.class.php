<?php

class ufront_handler_RemotingHandler implements ufront_app_UFInitRequired, ufront_app_UFRequestHandler{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->apis = new HList();
		$this->injector = new minject_Injector();
		$this->injector->mapValue(_hx_qtype("minject.Injector"), $this->injector, null);
		$GLOBALS['%s']->pop();
	}}
	public $injector;
	public $apis;
	public function loadApi($UFApiContext) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::loadApi");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->apis->push($UFApiContext);
		$GLOBALS['%s']->pop();
	}
	public function init($app) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::init");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector->set_parentInjector($app->injector);
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispose($app) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::dispose");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector = null;
		$this->apis = null;
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function handleRequest($httpContext) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::handleRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		$doneTrigger = new tink_core_FutureTrigger();
		if(ufront_handler_RemotingHandler_0($this, $doneTrigger, $httpContext)) {
			$actionContext = new ufront_web_context_ActionContext($httpContext);
			$requestInjector = $this->injector->createChildInjector();
			$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthHandler"), $httpContext->get_auth(), null);
			$requestInjector->mapValue(_hx_qtype("ufront.log.MessageList"), new ufront_log_MessageList($httpContext->messages, null), null);
			$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthUser"), ((null !== $httpContext->get_auth()) ? $httpContext->get_auth()->get_currentUser() : null), null);
			$requestInjector->mapValue(_hx_qtype("String"), $httpContext->get_contentDirectory(), "contentDirectory");
			$requestInjector->mapValue(_hx_qtype("String"), ((null !== $httpContext->_session) ? $httpContext->_session->get_id() : null), "sessionID");
			$requestInjector->mapValue(_hx_qtype("String"), ((null !== $httpContext->get_auth() && null !== $httpContext->get_auth()->get_currentUser()) ? $httpContext->get_auth()->get_currentUser()->get_userID() : null), "currentUserID");
			$requestInjector->mapValue(Type::getClass($httpContext->get_auth()), $httpContext->get_auth(), null);
			$httpContext->injector = $this->injector;
			$context = new haxe_remoting_Context();
			if(null == $this->apis) throw new HException('null iterable');
			$__hx__it = $this->apis->iterator();
			while($__hx__it->hasNext()) {
				unset($api);
				$api = $__hx__it->next();
				$apiContext = $requestInjector->instantiate($api);
				{
					$_g = 0;
					$_g1 = Reflect::fields($apiContext);
					while($_g < $_g1->length) {
						$fieldName = $_g1[$_g];
						++$_g;
						$o = Reflect::field($apiContext, $fieldName);
						if(Reflect::isObject($o)) {
							$context->addObject($fieldName, $o, null);
						}
						unset($o,$fieldName);
					}
					unset($_g1,$_g);
				}
				unset($apiContext);
			}
			$r = $httpContext->response;
			$remotingResponse = null;
			try {
				$params = $httpContext->request->get_params();
				if(!$params->exists("__x")) {
					throw new HException("Remoting call did not have parameter `__x` which describes which API call to make.  Aborting");
				}
				$remotingResponse = $this->processRequest(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($params, "__x"), $context, $actionContext);
				$r->setOk();
			}catch(Exception $__hx__e) {
				$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
				$e = $_ex_;
				{
					$GLOBALS['%e'] = (new _hx_array(array()));
					while($GLOBALS['%s']->length >= $__hx__spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					$remotingResponse = $this->remotingError($e, $httpContext);
					$r->setInternalError();
				}
			}
			$r->set_contentType("application/x-haxe-remoting");
			$r->clearContent();
			$r->write($remotingResponse);
			$httpContext->completion |= 1 << ufront_web_context_RequestCompletion::$CRequestHandlersComplete->index;
			{
				$result = tink_core_Outcome::Success(tink_core_Noise::$Noise);
				if($doneTrigger->{"list"} === null) {
					false;
				} else {
					$list = $doneTrigger->{"list"};
					$doneTrigger->{"list"} = null;
					$doneTrigger->result = $result;
					tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
					tink_core__Callback_CallbackList_Impl_::clear($list);
					true;
				}
			}
		} else {
			$result1 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			if($doneTrigger->{"list"} === null) {
				false;
			} else {
				$list1 = $doneTrigger->{"list"};
				$doneTrigger->{"list"} = null;
				$doneTrigger->result = $result1;
				tink_core__Callback_CallbackList_Impl_::invoke($list1, $result1);
				tink_core__Callback_CallbackList_Impl_::clear($list1);
				true;
			}
		}
		{
			$tmp = $doneTrigger->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function processRequest($requestData, $ctx, $actionContext) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::processRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		$u = new haxe_Unserializer($requestData);
		$path = $u->unserialize();
		$args = $u->unserialize();
		$className = $path->copy();
		$actionContext->handler = $this;
		$actionContext->action = $path[$path->length - 1];
		$actionContext->controller = $ctx->objects->get($actionContext->action);
		$actionContext->args = $args;
		$data = $ctx->call($path, $args);
		$s = new haxe_Serializer();
		$s->serialize($data);
		{
			$tmp = "hxr" . _hx_string_or_null($s->toString());
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function remotingError($e, $httpContext) {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::remotingError");
		$__hx__spos = $GLOBALS['%s']->length;
		$httpContext->messages->push(_hx_anonymous(array("msg" => $e, "pos" => _hx_anonymous(array("fileName" => "RemotingHandler.hx", "lineNumber" => 161, "className" => "ufront.handler.RemotingHandler", "methodName" => "remotingError")), "type" => ufront_log_MessageType::$Error)));
		$s = new haxe_Serializer();
		$s->serializeException($e);
		$serializedException = "hxe" . _hx_string_or_null($s->toString());
		$exceptionStack = haxe_CallStack::toString(haxe_CallStack::exceptionStack());
		$serializedStack = "hxs" . _hx_string_or_null(haxe_Serializer::run($exceptionStack));
		{
			$tmp = _hx_string_or_null($serializedStack) . "\x0A" . _hx_string_or_null($serializedException);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.handler.RemotingHandler::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "ufront.handler.RemotingHandler";
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
function ufront_handler_RemotingHandler_0(&$__hx__this, &$doneTrigger, &$httpContext) {
	{
		$this1 = $httpContext->request->get_clientHeaders();
		return $this1->exists("X-Haxe-Remoting");
	}
}
