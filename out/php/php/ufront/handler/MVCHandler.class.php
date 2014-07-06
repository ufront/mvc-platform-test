<?php

class ufront_handler_MVCHandler implements ufront_app_UFInitRequired, ufront_app_UFRequestHandler{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector = new minject_Injector();
		$this->injector->mapValue(_hx_qtype("minject.Injector"), $this->injector, null);
		$GLOBALS['%s']->pop();
	}}
	public $injector;
	public $indexController;
	public function init($application) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::init");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector->set_parentInjector($application->injector);
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispose($app) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::dispose");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->injector = null;
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function handleRequest($ctx) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::handleRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryFailingFlatMap($this->processRequest($ctx), array(new _hx_lambda(array(&$_g, &$ctx), "ufront_handler_MVCHandler_0"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setupRequestInjector($context) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::setupRequestInjector");
		$__hx__spos = $GLOBALS['%s']->length;
		$requestInjector = $this->injector->createChildInjector();
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpContext"), $context, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpRequest"), $context->request, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpResponse"), $context->response, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.session.UFHttpSessionState"), $context->get_session(), null);
		$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthHandler"), $context->get_auth(), null);
		$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthUser"), ((null !== $context->get_auth()) ? $context->get_auth()->get_currentUser() : null), null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.ActionContext"), $context->actionContext, null);
		$requestInjector->mapValue(_hx_qtype("ufront.log.MessageList"), new ufront_log_MessageList($context->messages, null), null);
		$requestInjector->mapValue(_hx_qtype("String"), $context->get_contentDirectory(), "contentDirectory");
		$requestInjector->mapValue(_hx_qtype("String"), $context->request->get_scriptDirectory(), "scriptDirectory");
		$requestInjector->mapValue(_hx_qtype("String"), ((null !== $context->_session) ? $context->_session->get_id() : null), "sessionID");
		$requestInjector->mapValue(_hx_qtype("String"), ((null !== $context->get_auth() && null !== $context->get_auth()->get_currentUser()) ? $context->get_auth()->get_currentUser()->get_userID() : null), "currentUserID");
		if($context->get_session() !== null) {
			$requestInjector->mapValue(Type::getClass($context->get_session()), $context->get_session(), null);
		}
		if($context->get_auth() !== null) {
			$requestInjector->mapValue(Type::getClass($context->get_auth()), $context->get_auth(), null);
		}
		$context->injector = $requestInjector;
		{
			$GLOBALS['%s']->pop();
			return $requestInjector;
		}
		$GLOBALS['%s']->pop();
	}
	public function processRequest($context) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::processRequest");
		$__hx__spos = $GLOBALS['%s']->length;
		$actionContext = new ufront_web_context_ActionContext($context);
		$this->setupRequestInjector($context);
		$actionContext->handler = $this;
		$controller = $context->injector->instantiate($this->indexController);
		$resultFuture = tink_core__Future_Future_Impl_::_tryMap($controller->execute(), array(new _hx_lambda(array(&$actionContext, &$context, &$controller), "ufront_handler_MVCHandler_1"), 'execute'));
		{
			$GLOBALS['%s']->pop();
			return $resultFuture;
		}
		$GLOBALS['%s']->pop();
	}
	public function executeResult($context) {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::executeResult");
		$__hx__spos = $GLOBALS['%s']->length;
		try {
			{
				$tmp = $context->actionContext->actionResult->executeResult($context->actionContext);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				$p_methodName = "executeResult";
				$p_lineNumber = -1;
				$p_fileName = "";
				$p_customParams = (new _hx_array(array("actionContext")));
				$p_className = Type::getClassName(Type::getClass($context->actionContext));
				{
					$msg = "Caught error in DispatchHandler.executeAction while executing " . _hx_string_or_null($p_className) . "." . _hx_string_or_null($p_methodName) . "(" . _hx_string_or_null($p_customParams->join(",")) . ")";
					$context->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => _hx_anonymous(array("fileName" => "MVCHandler.hx", "lineNumber" => 124, "className" => "ufront.handler.MVCHandler", "methodName" => "executeResult")), "type" => ufront_log_MessageType::$Error)));
				}
				{
					$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::wrap($e, null, _hx_anonymous(array("fileName" => "MVCHandler.hx", "lineNumber" => 125, "className" => "ufront.handler.MVCHandler", "methodName" => "executeResult")))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "ufront.handler.MVCHandler";
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
function ufront_handler_MVCHandler_0(&$_g, &$ctx, $r) {
	{
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::handleRequest@70");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $_g->executeResult($ctx);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_handler_MVCHandler_1(&$actionContext, &$context, &$controller, $result) {
	{
		$GLOBALS['%s']->push("ufront.handler.MVCHandler::processRequest@110");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$context->actionContext->actionResult = $result;
		{
			$tmp = tink_core_Noise::$Noise;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
