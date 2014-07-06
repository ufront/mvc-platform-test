<?php

class ufront_app_HttpApplication {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		$this->injector = new minject_Injector();
		$this->injector->mapValue(_hx_qtype("minject.Injector"), $this->injector, null);
		$this->requestMiddleware = (new _hx_array(array()));
		$this->requestHandlers = (new _hx_array(array()));
		$this->responseMiddleware = (new _hx_array(array()));
		$this->logHandlers = (new _hx_array(array()));
		$this->errorHandlers = (new _hx_array(array()));
		$this->urlFilters = (new _hx_array(array()));
		$this->messages = (new _hx_array(array()));
		haxe_Log::$trace = array(new _hx_lambda(array(&$_g), "ufront_app_HttpApplication_0"), 'execute');
		$GLOBALS['%s']->pop();
	}}
	public $injector;
	public $requestMiddleware;
	public $requestHandlers;
	public $responseMiddleware;
	public $logHandlers;
	public $errorHandlers;
	public $urlFilters;
	public $messages;
	public $modulesReady;
	public $currentModule;
	public function inject($cl, $val = null, $cl2 = null, $singleton = null, $named = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::inject");
		$__hx__spos = $GLOBALS['%s']->length;
		if($singleton === null) {
			$singleton = false;
		}
		if($val !== null) {
			$this->injector->mapValue($cl, $val, $named);
		} else {
			if($cl2 === null) {
				$cl2 = $cl;
			}
			if($singleton) {
				$this->injector->mapSingleton($cl, $named);
			} else {
				$this->injector->mapClass($cl, $cl2, $named);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::init");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->modulesReady === null) {
			$futures = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $this->getModulesThatRequireInit();
				while($_g < $_g1->length) {
					$module = $_g1[$_g];
					++$_g;
					$futures->push($module->init($this));
					unset($module);
				}
			}
			$this->modulesReady = tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$futures), "ufront_app_HttpApplication_1"), 'execute'), null);
		}
		{
			$tmp = $this->modulesReady;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::dispose");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		$futures = (new _hx_array(array()));
		{
			$_g1 = 0;
			$_g11 = $this->getModulesThatRequireInit();
			while($_g1 < $_g11->length) {
				$module = $_g11[$_g1];
				++$_g1;
				$futures->push($module->dispose($this));
				unset($module);
			}
		}
		{
			$tmp = tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($futures, null), array(new _hx_lambda(array(&$_g, &$futures), "ufront_app_HttpApplication_2"), 'execute'), null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getModulesThatRequireInit() {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::getModulesThatRequireInit");
		$__hx__spos = $GLOBALS['%s']->length;
		$moduleSets = (new _hx_array(array($this->requestMiddleware, $this->requestHandlers, $this->responseMiddleware, $this->logHandlers, $this->errorHandlers)));
		$modules = (new _hx_array(array()));
		{
			$_g = 0;
			while($_g < $moduleSets->length) {
				$set = $moduleSets[$_g];
				++$_g;
				$_g1 = 0;
				while($_g1 < $set->length) {
					$module = $set[$_g1];
					++$_g1;
					if(Std::is($module, _hx_qtype("ufront.app.UFInitRequired"))) {
						$modules->push($module);
					}
					unset($module);
				}
				unset($set,$_g1);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $modules;
		}
		$GLOBALS['%s']->pop();
	}
	public function addRequestMiddleware($middlewareItem = null, $middleware = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addRequestMiddleware");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->addModule($this->requestMiddleware, $middlewareItem, $middleware);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addRequestHandler($handler = null, $handlers = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addRequestHandler");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->addModule($this->requestHandlers, $handler, $handlers);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addErrorHandler($handler = null, $handlers = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addErrorHandler");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->addModule($this->errorHandlers, $handler, $handlers);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addResponseMiddleware($middlewareItem = null, $middleware = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addResponseMiddleware");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->addModule($this->responseMiddleware, $middlewareItem, $middleware);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addLogHandler($logger = null, $loggers = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addLogHandler");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->addModule($this->logHandlers, $logger, $loggers);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addModule($modulesArr, $newModule = null, $newModules = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addModule");
		$__hx__spos = $GLOBALS['%s']->length;
		if($newModule !== null) {
			$this->injector->injectInto($newModule);
			$modulesArr->push($newModule);
		}
		if($newModules !== null) {
			if(null == $newModules) throw new HException('null iterable');
			$__hx__it = $newModules->iterator();
			while($__hx__it->hasNext()) {
				unset($newModule1);
				$newModule1 = $__hx__it->next();
				$this->injector->injectInto($newModule1);
				$modulesArr->push($newModule1);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function execute($httpContext) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		$httpContext->setUrlFilters($this->urlFilters);
		$reqMidModules = $this->requestMiddleware->map(array(new _hx_lambda(array(&$_g, &$httpContext), "ufront_app_HttpApplication_3"), 'execute'));
		$reqHandModules = $this->requestHandlers->map(array(new _hx_lambda(array(&$_g, &$httpContext, &$reqMidModules), "ufront_app_HttpApplication_4"), 'execute'));
		$resMidModules = $this->responseMiddleware->map(array(new _hx_lambda(array(&$_g, &$httpContext, &$reqHandModules, &$reqMidModules), "ufront_app_HttpApplication_5"), 'execute'));
		$logHandModules = $this->logHandlers->map(array(new _hx_lambda(array(&$_g, &$httpContext, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_6"), 'execute'));
		$allDone = tink_core__Future_Future_Impl_::_tryFailingFlatMap($this->init(), array(new _hx_lambda(array(&$_g, &$httpContext, &$logHandModules, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_7"), 'execute'));
		call_user_func_array($allDone, array(array(new _hx_lambda(array(&$_g, &$allDone, &$httpContext, &$logHandModules, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_8"), 'execute')));
		if((($httpContext->completion & 1 << ufront_web_context_RequestCompletion::$CFlushComplete->index) !== 0) === false) {
			$msg = "Async callbacks never completed for URI " . _hx_string_or_null($httpContext->getRequestUri()) . ":  " . _hx_string_or_null(("The last active module was " . _hx_string_or_null($this->currentModule->className) . "." . _hx_string_or_null($this->currentModule->methodName) . "(" . _hx_string_or_null($this->currentModule->customParams->join(", ")) . ")"));
			throw new HException($msg);
		}
		{
			$GLOBALS['%s']->pop();
			return $allDone;
		}
		$GLOBALS['%s']->pop();
	}
	public function executeModules($modules, $ctx, $flag = null) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::executeModules");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		$done = new tink_core_FutureTrigger();
		$runNext = null;
		{
			$runNext1 = null;
			$runNext1 = array(new _hx_lambda(array(&$_g, &$ctx, &$done, &$flag, &$modules, &$runNext, &$runNext1), "ufront_app_HttpApplication_9"), 'execute');
			$runNext = $runNext1;
		}
		call_user_func($runNext);
		{
			$tmp = $done->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function handleError($err, $ctx, $doneTrigger) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		if(!(($ctx->completion & 1 << ufront_web_context_RequestCompletion::$CErrorHandlersComplete->index) !== 0)) {
			$errHandlerModules = $this->errorHandlers->map(array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err), "ufront_app_HttpApplication_10"), 'execute'));
			$resMidModules = $this->responseMiddleware->map(array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules), "ufront_app_HttpApplication_11"), 'execute'));
			$logHandModules = $this->logHandlers->map(array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$resMidModules), "ufront_app_HttpApplication_12"), 'execute'));
			$allDone = tink_core__Future_Future_Impl_::_tryFailingFlatMap(tink_core__Future_Future_Impl_::_tryFailingFlatMap($this->executeModules($errHandlerModules, $ctx, ufront_web_context_RequestCompletion::$CErrorHandlersComplete), array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$resMidModules), "ufront_app_HttpApplication_13"), 'execute')), array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$resMidModules), "ufront_app_HttpApplication_14"), 'execute'));
			{
				$callback = null;
				{
					$f3 = null;
					{
						$f4 = (isset($doneTrigger->trigger) ? $doneTrigger->trigger: array($doneTrigger, "trigger"));
						$a13 = tink_core_Outcome::Failure($err);
						$f3 = array(new _hx_lambda(array(&$_g, &$a13, &$allDone, &$callback, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f3, &$f4, &$logHandModules, &$resMidModules), "ufront_app_HttpApplication_15"), 'execute');
					}
					$callback = array(new _hx_lambda(array(&$_g, &$allDone, &$callback, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f3, &$logHandModules, &$resMidModules), "ufront_app_HttpApplication_16"), 'execute');
				}
				call_user_func_array($allDone, array($callback));
			}
		} else {
			$msg = "You had an error after your error handler had already run.  Last active module: " . Std::string($this->currentModule) . ".";
			throw new HException("" . _hx_string_or_null($msg) . "  " . Std::string($err) . ". Error data: " . Std::string($err->data));
		}
		$GLOBALS['%s']->pop();
	}
	public function flush($ctx) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::flush");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!(($ctx->completion & 1 << ufront_web_context_RequestCompletion::$CFlushComplete->index) !== 0)) {
			$ctx->response->flush();
			$ctx->completion |= 1 << ufront_web_context_RequestCompletion::$CFlushComplete->index;
		}
		{
			$tmp = tink_core_Noise::$Noise;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addUrlFilter($filter) {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::addUrlFilter");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $filter) {
			throw new HException(new thx_error_NullArgument("filter", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpApplication.hx", "lineNumber" => 445, "className" => "ufront.app.HttpApplication", "methodName" => "addUrlFilter"))));
		}
		$this->urlFilters->push($filter);
		$GLOBALS['%s']->pop();
	}
	public function clearUrlFilters() {
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->urlFilters = (new _hx_array(array()));
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
	function __toString() { return 'ufront.app.HttpApplication'; }
}
function ufront_app_HttpApplication_0(&$_g, $msg, $pos) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::new@140");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$_g->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_1(&$futures, $outcomes) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::init@183");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$_g2 = 0;
			while($_g2 < $outcomes->length) {
				$o = $outcomes[$_g2];
				++$_g2;
				switch($o->index) {
				case 1:{
					$err = $o->params[0];
					{
						$tmp = tink_core_Outcome::Failure($err);
						$GLOBALS['%s']->pop();
						return $tmp;
					}
				}break;
				case 0:{
				}break;
				}
				unset($o);
			}
		}
		{
			$tmp = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_2(&$_g, &$futures, $outcomes) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::dispose@203");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$_g->modulesReady = null;
		{
			$_g12 = 0;
			while($_g12 < $outcomes->length) {
				$o = $outcomes[$_g12];
				++$_g12;
				switch($o->index) {
				case 1:{
					$GLOBALS['%s']->pop();
					return $o;
				}break;
				case 0:{
				}break;
				}
				unset($o);
			}
		}
		{
			$tmp = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_3(&$_g, &$httpContext, $m) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b = _hx_anonymous(array("methodName" => "requestIn", "lineNumber" => -1, "fileName" => "", "customParams" => (new _hx_array(array())), "className" => Type::getClassName(Type::getClass($m))));
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_17($__hx__this, $_g, $b, $httpContext, $m), $b);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_4(&$_g, &$httpContext, &$reqMidModules, $m1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b1 = _hx_anonymous(array("methodName" => "handleRequest", "lineNumber" => -1, "fileName" => "", "customParams" => (new _hx_array(array())), "className" => Type::getClassName(Type::getClass($m1))));
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_18($__hx__this, $_g, $b1, $httpContext, $m1, $reqMidModules), $b1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_5(&$_g, &$httpContext, &$reqHandModules, &$reqMidModules, $m2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b2 = _hx_anonymous(array("methodName" => "responseOut", "lineNumber" => -1, "fileName" => "", "customParams" => (new _hx_array(array())), "className" => Type::getClassName(Type::getClass($m2))));
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_19($__hx__this, $_g, $b2, $httpContext, $m2, $reqHandModules, $reqMidModules), $b2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_6(&$_g, &$httpContext, &$reqHandModules, &$reqMidModules, &$resMidModules, $m3) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b3 = null;
		{
			$args = (new _hx_array(array("{HttpContext}", _hx_anonymous(array("pos" => _hx_anonymous(array("fileName" => "/home/jason/workspace/ufront/mvc/src/ufront/app/HttpApplication.hx", "lineNumber" => 292, "className" => "")), "expr" => haxe_macro_ExprDef::EConst(haxe_macro_Constant::CIdent("messages")))))));
			$b3 = _hx_anonymous(array("methodName" => "log", "lineNumber" => -1, "fileName" => "", "customParams" => $args, "className" => Type::getClassName(Type::getClass($m3))));
		}
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_20($__hx__this, $_g, $b3, $httpContext, $m3, $reqHandModules, $reqMidModules, $resMidModules), $b3);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_7(&$_g, &$httpContext, &$logHandModules, &$reqHandModules, &$reqMidModules, &$resMidModules, $n) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@299");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryFailingFlatMap($_g->executeModules($reqMidModules, $httpContext, ufront_web_context_RequestCompletion::$CRequestMiddlewareComplete), array(new _hx_lambda(array(&$_g, &$httpContext, &$logHandModules, &$n, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_21"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_8(&$_g, &$allDone, &$httpContext, &$logHandModules, &$reqHandModules, &$reqMidModules, &$resMidModules, $r) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::execute@307");
		$__hx__spos2 = $GLOBALS['%s']->length;
		null;
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_9(&$_g, &$ctx, &$done, &$flag, &$modules, &$runNext, &$runNext1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::executeModules@339");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$m = $modules->shift();
		if($flag !== null && ($ctx->completion & 1 << $flag->index) !== 0) {
			$result = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			if($done->{"list"} === null) {
				false;
			} else {
				$list = $done->{"list"};
				$done->{"list"} = null;
				$done->result = $result;
				tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
				tink_core__Callback_CallbackList_Impl_::clear($list);
				true;
			}
		} else {
			if($m === null) {
				if($flag !== null) {
					$ctx->completion |= 1 << $flag->index;
				}
				{
					$result1 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
					if($done->{"list"} === null) {
						false;
					} else {
						$list1 = $done->{"list"};
						$done->{"list"} = null;
						$done->result = $result1;
						tink_core__Callback_CallbackList_Impl_::invoke($list1, $result1);
						tink_core__Callback_CallbackList_Impl_::clear($list1);
						true;
					}
				}
			} else {
				$moduleCb = (isset($m->a) ? $m->a: array($m, "a"));
				$_g->currentModule = $m->b;
				$moduleResult = null;
				try {
					$moduleResult = call_user_func_array($moduleCb, array($ctx));
				}catch(Exception $__hx__e) {
					$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
					$e = $_ex_;
					{
						$GLOBALS['%e'] = (new _hx_array(array()));
						while($GLOBALS['%s']->length >= $__hx__spos2) {
							$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
						}
						$GLOBALS['%s']->push($GLOBALS['%e'][0]);
						{
							$msg = "Caught error " . Std::string($e) . " while executing module " . _hx_string_or_null($_g->currentModule->className) . "." . _hx_string_or_null($_g->currentModule->methodName) . " in HttpApplication.executeModules()";
							$ctx->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => _hx_anonymous(array("fileName" => "HttpApplication.hx", "lineNumber" => 355, "className" => "ufront.app.HttpApplication", "methodName" => "executeModules")), "type" => ufront_log_MessageType::$Log)));
						}
						$moduleResult = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(ufront_web_HttpError::wrap($e, null, $_g->currentModule)));
					}
				}
				call_user_func_array($moduleResult, array(array(new _hx_lambda(array(&$_g, &$ctx, &$done, &$e, &$flag, &$m, &$moduleCb, &$moduleResult, &$modules, &$runNext, &$runNext1), "ufront_app_HttpApplication_22"), 'execute')));
			}
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_10(&$_g, &$ctx, &$doneTrigger, &$err, $m) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b = null;
		{
			$args = (new _hx_array(array(_hx_anonymous(array("pos" => _hx_anonymous(array("fileName" => "/home/jason/workspace/ufront/mvc/src/ufront/app/HttpApplication.hx", "lineNumber" => 379, "className" => "")), "expr" => haxe_macro_ExprDef::EConst(haxe_macro_Constant::CIdent("err")))))));
			$b = _hx_anonymous(array("methodName" => "handleError", "lineNumber" => -1, "fileName" => "", "customParams" => $args, "className" => Type::getClassName(Type::getClass($m))));
		}
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_23($__hx__this, $_g, $b, $ctx, $doneTrigger, $err, $m), $b);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_11(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, $m1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b1 = _hx_anonymous(array("methodName" => "responseOut", "lineNumber" => -1, "fileName" => "", "customParams" => (new _hx_array(array())), "className" => Type::getClassName(Type::getClass($m1))));
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_24($__hx__this, $_g, $b1, $ctx, $doneTrigger, $err, $errHandlerModules, $m1), $b1);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_12(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$resMidModules, $m2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@45");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$b2 = null;
		{
			$args1 = (new _hx_array(array("{HttpContext}", _hx_anonymous(array("pos" => _hx_anonymous(array("fileName" => "/home/jason/workspace/ufront/mvc/src/ufront/app/HttpApplication.hx", "lineNumber" => 381, "className" => "")), "expr" => haxe_macro_ExprDef::EConst(haxe_macro_Constant::CIdent("messages")))))));
			$b2 = _hx_anonymous(array("methodName" => "log", "lineNumber" => -1, "fileName" => "", "customParams" => $args1, "className" => Type::getClassName(Type::getClass($m2))));
		}
		{
			$tmp = new tink_core__Pair_Data(ufront_app_HttpApplication_25($__hx__this, $_g, $b2, $ctx, $doneTrigger, $err, $errHandlerModules, $m2, $resMidModules), $b2);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_13(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$resMidModules, $n) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@385");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$ctx->completion |= 1 << ufront_web_context_RequestCompletion::$CRequestHandlersComplete->index;
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_14(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$resMidModules, $n1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@390");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryFailingFlatMap($_g->executeModules($resMidModules, $ctx, ufront_web_context_RequestCompletion::$CResponseMiddlewareComplete), array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$n1, &$resMidModules), "ufront_app_HttpApplication_26"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_15(&$_g, &$a13, &$allDone, &$callback, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f3, &$f4, &$logHandModules, &$resMidModules) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@394");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f4, array($a13));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_16(&$_g, &$allDone, &$callback, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f3, &$logHandModules, &$resMidModules, $r) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::handleError@394");
		$__hx__spos2 = $GLOBALS['%s']->length;
		call_user_func($f3);
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_17(&$__hx__this, &$_g, &$b, &$httpContext, &$m) {
	{
		$f = (isset($m->requestIn) ? $m->requestIn: array($m, "requestIn"));
		return array(new _hx_lambda(array(&$_g, &$b, &$f, &$httpContext, &$m), "ufront_app_HttpApplication_27"), 'execute');
	}
}
function ufront_app_HttpApplication_18(&$__hx__this, &$_g, &$b1, &$httpContext, &$m1, &$reqMidModules) {
	{
		$f1 = (isset($m1->handleRequest) ? $m1->handleRequest: array($m1, "handleRequest"));
		return array(new _hx_lambda(array(&$_g, &$b1, &$f1, &$httpContext, &$m1, &$reqMidModules), "ufront_app_HttpApplication_28"), 'execute');
	}
}
function ufront_app_HttpApplication_19(&$__hx__this, &$_g, &$b2, &$httpContext, &$m2, &$reqHandModules, &$reqMidModules) {
	{
		$f2 = (isset($m2->responseOut) ? $m2->responseOut: array($m2, "responseOut"));
		return array(new _hx_lambda(array(&$_g, &$b2, &$f2, &$httpContext, &$m2, &$reqHandModules, &$reqMidModules), "ufront_app_HttpApplication_29"), 'execute');
	}
}
function ufront_app_HttpApplication_20(&$__hx__this, &$_g, &$b3, &$httpContext, &$m3, &$reqHandModules, &$reqMidModules, &$resMidModules) {
	{
		$f3 = (isset($m3->log) ? $m3->log: array($m3, "log"));
		$a2 = $_g->messages;
		return array(new _hx_lambda(array(&$_g, &$a2, &$b3, &$f3, &$httpContext, &$m3, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_30"), 'execute');
	}
}
function ufront_app_HttpApplication_21(&$_g, &$httpContext, &$logHandModules, &$n, &$reqHandModules, &$reqMidModules, &$resMidModules, $n1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@300");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryFailingFlatMap($_g->executeModules($reqHandModules, $httpContext, ufront_web_context_RequestCompletion::$CRequestHandlersComplete), array(new _hx_lambda(array(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_31"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_22(&$_g, &$ctx, &$done, &$e, &$flag, &$m, &$moduleCb, &$moduleResult, &$modules, &$runNext, &$runNext1, $result2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@359");
		$__hx__spos3 = $GLOBALS['%s']->length;
		switch($result2->index) {
		case 0:{
			call_user_func($runNext1);
		}break;
		case 1:{
			$e1 = $result2->params[0];
			$_g->handleError($e1, $ctx, $done);
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_23(&$__hx__this, &$_g, &$b, &$ctx, &$doneTrigger, &$err, &$m) {
	{
		$f = (isset($m->handleError) ? $m->handleError: array($m, "handleError"));
		$a1 = $err;
		return array(new _hx_lambda(array(&$_g, &$a1, &$b, &$ctx, &$doneTrigger, &$err, &$f, &$m), "ufront_app_HttpApplication_32"), 'execute');
	}
}
function ufront_app_HttpApplication_24(&$__hx__this, &$_g, &$b1, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$m1) {
	{
		$f1 = (isset($m1->responseOut) ? $m1->responseOut: array($m1, "responseOut"));
		return array(new _hx_lambda(array(&$_g, &$b1, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f1, &$m1), "ufront_app_HttpApplication_33"), 'execute');
	}
}
function ufront_app_HttpApplication_25(&$__hx__this, &$_g, &$b2, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$m2, &$resMidModules) {
	{
		$f2 = (isset($m2->log) ? $m2->log: array($m2, "log"));
		$a21 = $_g->messages;
		return array(new _hx_lambda(array(&$_g, &$a21, &$b2, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f2, &$m2, &$resMidModules), "ufront_app_HttpApplication_34"), 'execute');
	}
}
function ufront_app_HttpApplication_26(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$n1, &$resMidModules, $n2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@391");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryMap($_g->executeModules($logHandModules, $ctx, ufront_web_context_RequestCompletion::$CLogHandlersComplete), array(new _hx_lambda(array(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$n1, &$n2, &$resMidModules), "ufront_app_HttpApplication_35"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_27(&$_g, &$b, &$f, &$httpContext, &$m, $a1) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($a1));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_28(&$_g, &$b1, &$f1, &$httpContext, &$m1, &$reqMidModules, $a11) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f1, array($a11));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_29(&$_g, &$b2, &$f2, &$httpContext, &$m2, &$reqHandModules, &$reqMidModules, $a12) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f2, array($a12));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_30(&$_g, &$a2, &$b3, &$f3, &$httpContext, &$m3, &$reqHandModules, &$reqMidModules, &$resMidModules, $a13) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f3, array($a13, $a2));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_31(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$reqHandModules, &$reqMidModules, &$resMidModules, $n2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@301");
		$__hx__spos4 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryFailingFlatMap($_g->executeModules($resMidModules, $httpContext, ufront_web_context_RequestCompletion::$CResponseMiddlewareComplete), array(new _hx_lambda(array(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$n2, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_36"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_32(&$_g, &$a1, &$b, &$ctx, &$doneTrigger, &$err, &$f, &$m, $a2) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f, array($a1, $a2));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_33(&$_g, &$b1, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f1, &$m1, $a11) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f1, array($a11));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_34(&$_g, &$a21, &$b2, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$f2, &$m2, &$resMidModules, $a12) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@43");
		$__hx__spos3 = $GLOBALS['%s']->length;
		{
			$tmp = call_user_func_array($f2, array($a12, $a21));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_35(&$_g, &$ctx, &$doneTrigger, &$err, &$errHandlerModules, &$logHandModules, &$n1, &$n2, &$resMidModules, $n3) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@392");
		$__hx__spos4 = $GLOBALS['%s']->length;
		{
			$tmp = $_g->flush($ctx);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_36(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$n2, &$reqHandModules, &$reqMidModules, &$resMidModules, $n3) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@302");
		$__hx__spos5 = $GLOBALS['%s']->length;
		{
			$tmp = tink_core__Future_Future_Impl_::_tryMap($_g->executeModules($logHandModules, $httpContext, ufront_web_context_RequestCompletion::$CLogHandlersComplete), array(new _hx_lambda(array(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$n2, &$n3, &$reqHandModules, &$reqMidModules, &$resMidModules), "ufront_app_HttpApplication_37"), 'execute'));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_app_HttpApplication_37(&$_g, &$httpContext, &$logHandModules, &$n, &$n1, &$n2, &$n3, &$reqHandModules, &$reqMidModules, &$resMidModules, $n4) {
	{
		$GLOBALS['%s']->push("ufront.app.HttpApplication::clearUrlFilters@303");
		$__hx__spos6 = $GLOBALS['%s']->length;
		{
			$tmp = $_g->flush($httpContext);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
