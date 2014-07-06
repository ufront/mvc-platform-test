<?php

class ufront_app_UfrontApplication extends ufront_app_HttpApplication {
	public function __construct($optionsIn = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->configuration = ufront_web_DefaultUfrontConfiguration::get();
		Objects::merge($this->configuration, $optionsIn);
		$this->mvcHandler = new ufront_handler_MVCHandler();
		$this->remotingHandler = new ufront_handler_RemotingHandler();
		$this->mvcHandler->indexController = $this->configuration->indexController;
		if(null !== $this->configuration->remotingApi) {
			$this->remotingHandler->apis->push($this->configuration->remotingApi);
			$this;
		}
		if(null == $this->configuration->controllers) throw new HException('null iterable');
		$__hx__it = $this->configuration->controllers->iterator();
		while($__hx__it->hasNext()) {
			unset($controller);
			$controller = $__hx__it->next();
			$this->mvcHandler->injector->mapClass($controller, $controller, null);
		}
		if(null == $this->configuration->apis) throw new HException('null iterable');
		$__hx__it = $this->configuration->apis->iterator();
		while($__hx__it->hasNext()) {
			unset($api);
			$api = $__hx__it->next();
			$this->remotingHandler->injector->mapClass($api, $api, null);
			$this->mvcHandler->injector->mapClass($api, $api, null);
		}
		$this->addModule($this->requestMiddleware, null, $this->configuration->requestMiddleware);
		$this->addModule($this->requestHandlers, null, (new _hx_array(array($this->remotingHandler, $this->mvcHandler))));
		$this->addModule($this->responseMiddleware, null, $this->configuration->responseMiddleware);
		$this->addModule($this->errorHandlers, null, $this->configuration->errorHandlers);
		if(!$this->configuration->disableBrowserTrace) {
			{
				$logger = new ufront_log_BrowserConsoleLogger();
				$this->addModule($this->logHandlers, $logger, null);
			}
			{
				$logger1 = new ufront_log_RemotingLogger();
				$this->addModule($this->logHandlers, $logger1, null);
			}
		}
		if(null !== $this->configuration->logFile) {
			$logger2 = new ufront_log_FileLogger($this->configuration->logFile);
			$this->addModule($this->logHandlers, $logger2, null);
		}
		$path = trim($this->configuration->basePath, "/");
		if(strlen($path) > 0) {
			parent::addUrlFilter(new ufront_web_url_filter_DirectoryUrlFilter($path));
		}
		if($this->configuration->urlRewrite !== true) {
			parent::addUrlFilter(new ufront_web_url_filter_PathInfoUrlFilter(null, null));
		}
		$this->inject(_hx_qtype("ufront.web.session.UFSessionFactory"), $this->configuration->sessionFactory, null, null, null);
		$this->inject(_hx_qtype("ufront.auth.UFAuthFactory"), $this->configuration->authFactory, null, null, null);
		$this->viewEngine = $this->configuration->viewEngine;
		$GLOBALS['%s']->pop();
	}}
	public $configuration;
	public $mvcHandler;
	public $remotingHandler;
	public $viewEngine;
	public function execute($httpContext) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::execute");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $httpContext) {
			throw new HException(new thx_error_NullArgument("httpContext", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "UfrontApplication.hx", "lineNumber" => 161, "className" => "ufront.app.UfrontApplication", "methodName" => "execute"))));
		}
		if(ufront_app_UfrontApplication::$firstRun) {
			$this->initOnFirstExecute($httpContext);
		}
		{
			$tmp = parent::execute($httpContext);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function initOnFirstExecute($httpContext) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::initOnFirstExecute");
		$__hx__spos = $GLOBALS['%s']->length;
		ufront_app_UfrontApplication::$firstRun = false;
		$this->inject(_hx_qtype("String"), $httpContext->request->get_scriptDirectory(), null, null, "scriptDirectory");
		$this->inject(_hx_qtype("String"), $httpContext->get_contentDirectory(), null, null, "contentDirectory");
		if($this->viewEngine !== null) {
			$this->injector->injectInto($this->viewEngine);
			$this->inject(_hx_qtype("ufront.view.UFViewEngine"), $this->viewEngine, null, null, null);
		}
		$GLOBALS['%s']->pop();
	}
	public function loadApi($apiContext) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::loadApi");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->remotingHandler->apis->push($apiContext);
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function addTemplatingEngine($engine) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::addTemplatingEngine");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->viewEngine->engines->push($engine);
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function inject($cl, $val = null, $cl2 = null, $singleton = null, $named = null) {
		$GLOBALS['%s']->push("ufront.app.UfrontApplication::inject");
		$__hx__spos = $GLOBALS['%s']->length;
		if($singleton === null) {
			$singleton = false;
		}
		{
			$tmp = parent::inject($cl,$val,$cl2,$singleton,$named);
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
	static $firstRun = true;
	function __toString() { return 'ufront.app.UfrontApplication'; }
}
