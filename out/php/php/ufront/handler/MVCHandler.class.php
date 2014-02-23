<?php

class ufront_handler_MVCHandler implements ufront_app_UFInitRequired, ufront_app_UFRequestHandler{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->injector = new minject_Injector();
		$this->injector->mapValue(_hx_qtype("minject.Injector"), $this->injector, null);
	}}
	public $injector;
	public $indexController;
	public function init($application) {
		$this->injector->set_parentInjector($application->injector);
		return ufront_core_Sync::success();
	}
	public function dispose($app) {
		$this->injector = null;
		return ufront_core_Sync::success();
	}
	public function handleRequest($ctx) {
		$_g = $this;
		return tink_core__Future_Future_Impl_::_tryFailingFlatMap($this->processRequest($ctx), array(new _hx_lambda(array(&$_g, &$ctx), "ufront_handler_MVCHandler_0"), 'execute'));
	}
	public function setupRequestInjector($context) {
		$requestInjector = $this->injector->createChildInjector();
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpContext"), $context, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpRequest"), $context->request, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.HttpResponse"), $context->response, null);
		$requestInjector->mapValue(_hx_qtype("ufront.web.session.UFHttpSessionState"), $context->get_session(), null);
		$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthHandler"), $context->get_auth(), null);
		if($context->get_auth() !== null) {
			$requestInjector->mapValue(_hx_qtype("ufront.auth.UFAuthUser"), $context->get_auth()->get_currentUser(), null);
		}
		$requestInjector->mapValue(_hx_qtype("ufront.web.context.ActionContext"), $context->actionContext, null);
		$requestInjector->mapValue(_hx_qtype("Array"), $context->messages, "messages");
		$requestInjector->mapValue(_hx_qtype("String"), $context->get_contentDirectory(), "contentDirectory");
		$requestInjector->mapValue(_hx_qtype("String"), $context->request->get_scriptDirectory(), "scriptDirectory");
		$requestInjector->mapValue(Type::getClass($context->get_session()), $context->get_session(), null);
		$requestInjector->mapValue(Type::getClass($context->get_auth()), $context->get_auth(), null);
		$context->injector = $requestInjector;
		return $requestInjector;
	}
	public function processRequest($context) {
		$actionContext = new ufront_web_context_ActionContext($context, null, null, null);
		$this->setupRequestInjector($context);
		try {
			$controller = Type::createInstance($this->indexController, (new _hx_array(array($actionContext))));
			$resultFuture = tink_core__Future_Future_Impl_::_tryMap($controller->execute(), array(new _hx_lambda(array(&$actionContext, &$context, &$controller), "ufront_handler_MVCHandler_1"), 'execute'));
			return $resultFuture;
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$p = null;
				{
					$args = $context->actionContext->args;
					$p = _hx_anonymous(array("methodName" => $context->actionContext->action, "lineNumber" => -1, "fileName" => "", "customParams" => (($args !== null) ? $args : (new _hx_array(array()))), "className" => Type::getClassName(Type::getClass($context->actionContext->controller))));
				}
				return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::wrap($e, null, $p)));
			}
		}
	}
	public function executeResult($context) {
		try {
			return $context->actionContext->actionResult->executeResult($context->actionContext);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$p = null;
				{
					$args = (new _hx_array(array("actionContext")));
					$p = _hx_anonymous(array("methodName" => "executeResult", "lineNumber" => -1, "fileName" => "", "customParams" => (($args !== null) ? $args : (new _hx_array(array()))), "className" => Type::getClassName(Type::getClass($context->actionContext))));
				}
				return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::wrap($e, null, _hx_anonymous(array("fileName" => "MVCHandler.hx", "lineNumber" => 130, "className" => "ufront.handler.MVCHandler", "methodName" => "executeResult")))));
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
	function __toString() { return 'ufront.handler.MVCHandler'; }
}
function ufront_handler_MVCHandler_0(&$_g, &$ctx, $r) {
	{
		return $_g->executeResult($ctx);
	}
}
function ufront_handler_MVCHandler_1(&$actionContext, &$context, &$controller, $result) {
	{
		$context->actionContext->actionResult = $result;
		return tink_core_Noise::$Noise;
	}
}
