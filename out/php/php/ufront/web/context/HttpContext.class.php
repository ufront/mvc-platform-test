<?php

class ufront_web_context_HttpContext {
	public function __construct($injector, $request, $response, $session = null, $auth = null, $urlFilters = null, $relativeContentDir = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($relativeContentDir === null) {
			$relativeContentDir = "uf-content";
		}
		if(null === $injector) {
			throw new HException(new thx_error_NullArgument("injector", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 67, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
		}
		if(null === $response) {
			throw new HException(new thx_error_NullArgument("response", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 68, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
		}
		if(null === $request) {
			throw new HException(new thx_error_NullArgument("request", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpContext.hx", "lineNumber" => 69, "className" => "ufront.web.context.HttpContext", "methodName" => "new"))));
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
		$this->relativeContentDir = $relativeContentDir;
		try {
			$this->sessionFactory = $injector->getInstance(_hx_qtype("ufront.web.session.UFSessionFactory"), null);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
			}
		}
		try {
			$this->authFactory = $injector->getInstance(_hx_qtype("ufront.auth.UFAuthFactory"), null);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e1 = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
			}
		}
		$this->messages = (new _hx_array(array()));
		$this->completion = 0;
		$GLOBALS['%s']->pop();
	}}
	public $injector;
	public $request;
	public $response;
	public $session;
	public $sessionID;
	public $auth;
	public $currentUser;
	public $currentUserID;
	public $actionContext;
	public $completion;
	public $urlFilters;
	public $sessionFactory;
	public $authFactory;
	public $_requestUri;
	public function getRequestUri() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::getRequestUri");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $this->_requestUri) {
			$url = ufront_web_url_PartialUrl::parse($this->request->get_uri());
			if(null == $this->urlFilters) throw new HException('null iterable');
			$__hx__it = $this->urlFilters->iterator();
			while($__hx__it->hasNext()) {
				unset($filter);
				$filter = $__hx__it->next();
				$filter->filterIn($url, $this->request);
			}
			$this->_requestUri = $url->toString();
		}
		{
			$tmp = $this->_requestUri;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function generateUri($uri) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::generateUri");
		$__hx__spos = $GLOBALS['%s']->length;
		$uriOut = ufront_web_url_VirtualUrl::parse($uri);
		$filters = $this->urlFilters;
		$i = $filters->length - 1;
		while($i >= 0) {
			_hx_array_get($filters, $i--)->filterOut($uriOut, $this->request);
		}
		{
			$tmp = $uriOut->toString();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setUrlFilters($filters) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::setUrlFilters");
		$__hx__spos = $GLOBALS['%s']->length;
		if($filters !== null) {
			$this->urlFilters = $filters;
		} else {
			$this->urlFilters = (new _hx_array(array()));
		}
		$this->_requestUri = null;
		$GLOBALS['%s']->pop();
	}
	public $contentDirectory;
	public $relativeContentDir;
	public $_contentDir;
	public function get_contentDirectory() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_contentDirectory");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->_contentDir === null) {
			if($this->request->get_scriptDirectory() !== null) {
				$this->_contentDir = _hx_string_or_null(haxe_io_Path::addTrailingSlash($this->request->get_scriptDirectory())) . _hx_string_or_null(haxe_io_Path::addTrailingSlash($this->relativeContentDir));
			} else {
				$this->_contentDir = haxe_io_Path::addTrailingSlash($this->relativeContentDir);
			}
			$this->_contentDir = haxe_io_Path::normalize($this->_contentDir);
		}
		{
			$tmp = $this->_contentDir;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function commitSession() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::commitSession");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->_session !== null) {
			$tmp = $this->_session->commit();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(tink_core_Noise::$Noise));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSessionActive() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::isSessionActive");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->_session !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function ufTrace($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::ufTrace");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Trace)));
		$GLOBALS['%s']->pop();
	}
	public function ufLog($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::ufLog");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Log)));
		$GLOBALS['%s']->pop();
	}
	public function ufWarn($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::ufWarn");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Warning)));
		$GLOBALS['%s']->pop();
	}
	public function ufError($msg, $pos = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::ufError");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->messages->push(_hx_anonymous(array("msg" => $msg, "pos" => $pos, "type" => ufront_log_MessageType::$Error)));
		$GLOBALS['%s']->pop();
	}
	public $messages;
	public $_session;
	public function get_session() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_session");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $this->_session && $this->sessionFactory !== null) {
			$this->_session = $this->sessionFactory->create($this);
		}
		{
			$tmp = $this->_session;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $_auth;
	public function get_auth() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_auth");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $this->_auth && $this->authFactory !== null && $this->get_session() !== null) {
			$this->_auth = $this->authFactory->create($this);
		}
		{
			$tmp = $this->_auth;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_sessionID() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_sessionID");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $this->_session) {
			$tmp = $this->_session->get_id();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_currentUser() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_currentUser");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $this->get_auth()) {
			$tmp = $this->get_auth()->get_currentUser();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_currentUserID() {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::get_currentUserID");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null !== $this->get_auth() && null !== $this->get_auth()->get_currentUser()) {
			$tmp = $this->get_auth()->get_currentUser()->get_userID();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
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
	static function create($injector = null, $request = null, $response = null, $session = null, $auth = null, $urlFilters = null, $relativeContentDir = null) {
		$GLOBALS['%s']->push("ufront.web.context.HttpContext::create");
		$__hx__spos = $GLOBALS['%s']->length;
		if($relativeContentDir === null) {
			$relativeContentDir = "uf-content";
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
		{
			$tmp = new ufront_web_context_HttpContext($injector, $request, $response, $session, $auth, $urlFilters, $relativeContentDir);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_contentDirectory" => "get_contentDirectory","get_currentUserID" => "get_currentUserID","get_currentUser" => "get_currentUser","get_auth" => "get_auth","get_sessionID" => "get_sessionID","get_session" => "get_session");
	function __toString() { return 'ufront.web.context.HttpContext'; }
}
