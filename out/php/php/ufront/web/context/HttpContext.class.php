<?php

class ufront_web_context_HttpContext {
	public function __construct($injector, $request, $response, $session = null, $auth = null, $urlFilters = null, $contentDir = null) {
		if(!php_Boot::$skip_constructor) {
		if($contentDir === null) {
			$contentDir = "uf-content";
		}
		if(null === $injector) {
			throw new HException(new thx_error_NullArgument("injector", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 57, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
		}
		if(null === $response) {
			throw new HException(new thx_error_NullArgument("response", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 58, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
		}
		if(null === $request) {
			throw new HException(new thx_error_NullArgument("request", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 59, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
		}
		$this->injector = $injector;
		$this->request = $request;
		$this->response = $response;
		$this->_session = $session;
		$this->_auth = $auth;
		if($urlFilters !== null) {
			$this->urlFilters = $urlFilters;
		} else {
			$this->urlFilters = (new _hx_array(array()));
		}
		$this->contentDir = $contentDir;
		$this->sessionFactory = $injector->getInstance(_hx_qtype("ufront.web.session.UFSessionFactory"), null);
		$this->authFactory = $injector->getInstance(_hx_qtype("ufront.auth.UFAuthFactory"), null);
		$this->messages = (new _hx_array(array()));
		$this->completion = 0;
	}}
	public $injector;
	public $request;
	public $response;
	public $session;
	public $auth;
	public $actionContext;
	public $completion;
	public $urlFilters;
	public $sessionFactory;
	public $authFactory;
	public $_requestUri;
	public function getRequestUri() {
		if(null === $this->_requestUri) {
			$url = ufront_web_url_PartialUrl::parse($this->request->get_uri());
			if(null == $this->urlFilters) throw new HException('null iterable');
			$__hx__it = $this->urlFilters->iterator();
			while($__hx__it->hasNext()) {
				$filter = $__hx__it->next();
				$filter->filterIn($url, $this->request);
			}
			$this->_requestUri = $url->toString();
		}
		return $this->_requestUri;
	}
	public function generateUri($uri) {
		$uriOut = ufront_web_url_VirtualUrl::parse($uri);
		$filters = $this->urlFilters;
		$i = $filters->length - 1;
		while($i >= 0) {
			_hx_array_get($filters, $i--)->filterOut($uriOut, $this->request);
		}
		return $uriOut->toString();
	}
	public function setUrlFilters($filters) {
		if($filters !== null) {
			$this->urlFilters = $filters;
		} else {
			$this->urlFilters = (new _hx_array(array()));
		}
		$this->_requestUri = null;
	}
	public $contentDirectory;
	public $contentDir;
	public function get_contentDirectory() {
		return _hx_string_or_null(haxe_io_Path::addTrailingSlash($this->request->get_scriptDirectory())) . _hx_string_or_null(haxe_io_Path::addTrailingSlash($this->contentDir));
	}
	public function commitSession() {
		if($this->_session !== null) {
			return $this->_session->commit();
		} else {
			return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(tink_core_Noise::$Noise));
		}
	}
	public function isSessionActive() {
		return $this->_session !== null;
	}
	public function ufTrace($msg, $pos = null) {
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
	}
	public function ufLog($msg, $pos = null) {
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Log)));
	}
	public function ufWarn($msg, $pos = null) {
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Warning)));
	}
	public function ufError($msg, $pos = null) {
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Error)));
	}
	public $messages;
	public $_session;
	public function get_session() {
		if(null === $this->_session && $this->sessionFactory !== null) {
			$this->_session = $this->sessionFactory->create($this);
		}
		return $this->_session;
	}
	public $_auth;
	public function get_auth() {
		if(null === $this->_auth && $this->authFactory !== null && $this->get_session() !== null) {
			$this->_auth = $this->authFactory->create($this);
		}
		return $this->_auth;
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
	static function create($injector = null, $request = null, $response = null, $session = null, $auth = null, $urlFilters = null, $contentDir = null) {
		if($contentDir === null) {
			$contentDir = "uf-content";
		}
		if(null === $injector) {
			$injector = new minject_Injector();
		}
		if(null === $request) {
			$request = ufront_web_context_HttpRequest::create();
		}
		if(null === $response) {
			$response = ufront_web_context_HttpResponse::create();
		}
		return new ufront_web_context_HttpContext($injector, $request, $response, $session, $auth, $urlFilters, $contentDir);
	}
	static $__properties__ = array("get_contentDirectory" => "get_contentDirectory","get_auth" => "get_auth","get_session" => "get_session");
	function __toString() { return 'ufront.web.context.HttpContext'; }
}
