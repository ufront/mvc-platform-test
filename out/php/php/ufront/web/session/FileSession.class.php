<?php

class ufront_web_session_FileSession implements ufront_web_session_UFHttpSessionState{
	public function __construct($context, $savePath = null, $sessionName = null, $expire = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if(null === $context) {
			throw new HException(new thx_error_NullArgument("context", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "FileSession.hx", "lineNumber" => 100, "className" => "ufront.web.session.FileSession", "methodName" => "new"))));
		}
		$this->context = $context;
		if($sessionName !== null) {
			$this->sessionName = $sessionName;
		} else {
			$this->sessionName = ufront_web_session_FileSession::$defaultSessionName;
		}
		if($this->expiry !== null && $this->expiry > 0) {
			$this->expiry = $this->expiry;
		} else {
			$this->expiry = ufront_web_session_FileSession::$defaultExpiry;
		}
		if($savePath === null) {
			$savePath = ufront_web_session_FileSession::$defaultSavePath;
		}
		$savePath = haxe_io_Path::addTrailingSlash($savePath);
		if(!StringTools::startsWith($savePath, "/")) {
			$savePath = _hx_string_or_null($context->get_contentDirectory()) . _hx_string_or_null($savePath);
		}
		$this->savePath = $savePath;
		$this->started = false;
		$this->commitFlag = false;
		$this->closeFlag = false;
		$this->regenerateFlag = false;
		$this->expiryFlag = false;
		$this->sessionData = null;
		$this->sessionID = null;
		$this->oldSessionID = null;
		$GLOBALS['%s']->pop();
	}}
	public $context;
	public $started;
	public $commitFlag;
	public $closeFlag;
	public $regenerateFlag;
	public $expiryFlag;
	public $sessionID;
	public $oldSessionID;
	public $sessionData;
	public $id;
	public $sessionName;
	public $expiry;
	public $savePath;
	public function setExpiry($e) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::setExpiry");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->expiry = $e;
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::init");
		$__hx__spos = $GLOBALS['%s']->length;
		$t = new tink_core_FutureTrigger();
		if(!$this->started) {
			ufront_sys_SysUtil::mkdir(haxe_io_Path::removeTrailingSlashes($this->savePath));
			$id = null;
			{
				if($this->sessionID === null) {
					$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_cookies(), $this->sessionName);
				}
				if($this->sessionID === null) {
					$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_params(), $this->sessionName);
				}
				$id = $this->sessionID;
			}
			$file = null;
			$fileData = null;
			if($id !== null) {
				if($id !== null) {
					if(!ufront_web_session_FileSession::$validID->match($id)) {
						throw new HException("Invalid session ID.");
					}
				}
				$file = "" . _hx_string_or_null($this->savePath) . _hx_string_or_null($id) . ".sess";
				if(!file_exists($file)) {
					$id = null;
				} else {
					try {
						$fileData = sys_io_File::getContent($file);
					}catch(Exception $__hx__e) {
						$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
						$e = $_ex_;
						{
							$GLOBALS['%e'] = (new _hx_array(array()));
							while($GLOBALS['%s']->length >= $__hx__spos) {
								$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
							}
							$GLOBALS['%s']->push($GLOBALS['%e'][0]);
							$fileData = null;
						}
					}
					if($fileData !== null) {
						try {
							$this->sessionData = haxe_Unserializer::run($fileData);
						}catch(Exception $__hx__e) {
							$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
							$e1 = $_ex_;
							{
								$GLOBALS['%e'] = (new _hx_array(array()));
								while($GLOBALS['%s']->length >= $__hx__spos) {
									$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
								}
								$GLOBALS['%s']->push($GLOBALS['%e'][0]);
								$fileData = null;
							}
						}
					}
					if($fileData === null) {
						$id = null;
						try {
							@unlink($file);
						}catch(Exception $__hx__e) {
							$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
							$e2 = $_ex_;
							{
								$GLOBALS['%e'] = (new _hx_array(array()));
								while($GLOBALS['%s']->length >= $__hx__spos) {
									$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
								}
								$GLOBALS['%s']->push($GLOBALS['%e'][0]);
							}
						}
					}
				}
			}
			if($id === null) {
				$this->sessionData = new haxe_ds_StringMap();
				$this->started = true;
				do {
					$id = Random::string(40, null);
					$file = _hx_string_or_null($this->savePath) . _hx_string_or_null($id) . ".sess";
				} while(file_exists($file));
				sys_io_File::saveContent($file, "");
				$expire = null;
				if($this->expiry === 0) {
					$expire = null;
				} else {
					$d = Date::now();
					$expire = Date::fromTime($d->getTime() + 1000.0 * $this->expiry);
				}
				$path = "/";
				$domain = null;
				$secure = false;
				$sessionCookie = new ufront_web_HttpCookie($this->sessionName, $id, $expire, $domain, $path, $secure);
				$this->context->response->setCookie($sessionCookie);
				$this->commit();
			}
			$this->sessionID = $id;
			$this->started = true;
			{
				$result = tink_core_Outcome::Success(tink_core_Noise::$Noise);
				if($t->{"list"} === null) {
					false;
				} else {
					$list = $t->{"list"};
					$t->{"list"} = null;
					$t->result = $result;
					tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
					tink_core__Callback_CallbackList_Impl_::clear($list);
					true;
				}
			}
		} else {
			$result1 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			if($t->{"list"} === null) {
				false;
			} else {
				$list1 = $t->{"list"};
				$t->{"list"} = null;
				$t->result = $result1;
				tink_core__Callback_CallbackList_Impl_::invoke($list1, $result1);
				tink_core__Callback_CallbackList_Impl_::clear($list1);
				true;
			}
		}
		{
			$tmp = $t->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function commit() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::commit");
		$__hx__spos = $GLOBALS['%s']->length;
		$t = new tink_core_FutureTrigger();
		$handled = false;
		if($this->regenerateFlag) {
			$handled = true;
			{
				$result = tink_core_Outcome::Failure("NotImplemented: use regenerated ID to rename file and update cookie");
				if($t->{"list"} === null) {
					false;
				} else {
					$list = $t->{"list"};
					$t->{"list"} = null;
					$t->result = $result;
					tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
					tink_core__Callback_CallbackList_Impl_::clear($list);
					true;
				}
			}
		}
		if($this->commitFlag && $this->sessionData !== null) {
			$handled = true;
			try {
				$filePath = "" . _hx_string_or_null($this->savePath) . _hx_string_or_null($this->sessionID) . ".sess";
				$content = haxe_Serializer::run($this->sessionData);
				sys_io_File::saveContent($filePath, $content);
				{
					$result1 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
					if($t->{"list"} === null) {
						false;
					} else {
						$list1 = $t->{"list"};
						$t->{"list"} = null;
						$t->result = $result1;
						tink_core__Callback_CallbackList_Impl_::invoke($list1, $result1);
						tink_core__Callback_CallbackList_Impl_::clear($list1);
						true;
					}
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
					$result2 = tink_core_Outcome::Failure("Unable to save session: " . Std::string($e));
					if($t->{"list"} === null) {
						false;
					} else {
						$list2 = $t->{"list"};
						$t->{"list"} = null;
						$t->result = $result2;
						tink_core__Callback_CallbackList_Impl_::invoke($list2, $result2);
						tink_core__Callback_CallbackList_Impl_::clear($list2);
						true;
					}
				}
			}
		}
		if($this->closeFlag) {
			$handled = true;
			{
				$result3 = tink_core_Outcome::Failure("NotImplemented: close the session, delete the file, expire the cookie");
				if($t->{"list"} === null) {
					false;
				} else {
					$list3 = $t->{"list"};
					$t->{"list"} = null;
					$t->result = $result3;
					tink_core__Callback_CallbackList_Impl_::invoke($list3, $result3);
					tink_core__Callback_CallbackList_Impl_::clear($list3);
					true;
				}
			}
		}
		if($this->expiryFlag) {
			$handled = true;
			{
				$result4 = tink_core_Outcome::Failure("NotImplemented: change expiry on cookie");
				if($t->{"list"} === null) {
					false;
				} else {
					$list4 = $t->{"list"};
					$t->{"list"} = null;
					$t->result = $result4;
					tink_core__Callback_CallbackList_Impl_::invoke($list4, $result4);
					tink_core__Callback_CallbackList_Impl_::clear($list4);
					true;
				}
			}
		}
		if(!$handled) {
			$result5 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			if($t->{"list"} === null) {
				false;
			} else {
				$list5 = $t->{"list"};
				$t->{"list"} = null;
				$t->result = $result5;
				tink_core__Callback_CallbackList_Impl_::invoke($list5, $result5);
				tink_core__Callback_CallbackList_Impl_::clear($list5);
				true;
			}
		}
		{
			$tmp = $t->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get($name) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::get");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		if($this->sessionData !== null) {
			$tmp = $this->sessionData->get($name);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function set($name, $value) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::set");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->init();
		if($this->sessionData !== null) {
			$this->sessionData->set($name, $value);
			$this->commitFlag = true;
		}
		$GLOBALS['%s']->pop();
	}
	public function exists($name) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!(ufront_web_session_FileSession_0($this, $name) !== null)) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		{
			$tmp = $this->sessionData !== null && $this->sessionData->exists($name);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function remove($name) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::remove");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		if($this->sessionData !== null) {
			$this->sessionData->remove($name);
			$this->commitFlag = true;
		}
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::clear");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->sessionData !== null && ufront_web_session_FileSession_1($this) !== null) {
			$this->sessionData = new haxe_ds_StringMap();
			$this->commitFlag = true;
		}
		$GLOBALS['%s']->pop();
	}
	public function triggerCommit() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::triggerCommit");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->commitFlag = true;
		$GLOBALS['%s']->pop();
	}
	public function regenerateID() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::regenerateID");
		$__hx__spos = $GLOBALS['%s']->length;
		$t = new tink_core_FutureTrigger();
		$this->oldSessionID = $this->sessionID;
		$this->sessionID = Random::string(40, null);
		$this->regenerateFlag = true;
		{
			$result = tink_core_Outcome::Success($this->sessionID);
			if($t->{"list"} === null) {
				false;
			} else {
				$list = $t->{"list"};
				$t->{"list"} = null;
				$t->result = $result;
				tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
				tink_core__Callback_CallbackList_Impl_::clear($list);
				true;
			}
		}
		{
			$tmp = $t->future;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isActive() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::isActive");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = ufront_web_session_FileSession_2($this) !== null;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_id() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::get_id");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->sessionID === null) {
			$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_cookies(), $this->sessionName);
		}
		if($this->sessionID === null) {
			$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_params(), $this->sessionName);
		}
		{
			$tmp = $this->sessionID;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function close() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::close");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->init();
		$this->sessionData = null;
		$this->closeFlag = true;
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::toString");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->sessionData !== null) {
			$tmp = $this->sessionData->toString();
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$GLOBALS['%s']->pop();
			return "{}";
		}
		$GLOBALS['%s']->pop();
	}
	public function getSessionFilePath($id) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::getSessionFilePath");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = "" . _hx_string_or_null($this->savePath) . _hx_string_or_null($id) . ".sess";
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function generateSessionID() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::generateSessionID");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = Random::string(40, null);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function checkStarted() {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::checkStarted");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
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
	static function getFactory($savePath = null, $sessionName = null, $expire = null) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::getFactory");
		$__hx__spos = $GLOBALS['%s']->length;
		if($expire === null) {
			$expire = 0;
		}
		if(ufront_web_session_FileSession::$_factory === null || ufront_web_session_FileSession::$_factory->savePath !== $savePath || ufront_web_session_FileSession::$_factory->sessionName !== $sessionName || ufront_web_session_FileSession::$_factory->expire !== $expire) {
			ufront_web_session_FileSession::$_factory = new ufront_web_session_FileSessionFactory($savePath, $sessionName, $expire);
		}
		{
			$tmp = ufront_web_session_FileSession::$_factory;
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $_factory;
	static $defaultSessionName = "UfrontSessionID";
	static $defaultSavePath = "sessions/";
	static $defaultExpiry = 0;
	static $validID;
	static function testValidId($id) {
		$GLOBALS['%s']->push("ufront.web.session.FileSession::testValidId");
		$__hx__spos = $GLOBALS['%s']->length;
		if($id !== null) {
			if(!ufront_web_session_FileSession::$validID->match($id)) {
				throw new HException("Invalid session ID.");
			}
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_id" => "get_id");
	function __toString() { return $this->toString(); }
}
ufront_web_session_FileSession::$validID = new EReg("^[a-zA-Z0-9]+\$", "");
function ufront_web_session_FileSession_0(&$__hx__this, &$name) {
	{
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_cookies(), $__hx__this->sessionName);
		}
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_params(), $__hx__this->sessionName);
		}
		return $__hx__this->sessionID;
	}
}
function ufront_web_session_FileSession_1(&$__hx__this) {
	{
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_cookies(), $__hx__this->sessionName);
		}
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_params(), $__hx__this->sessionName);
		}
		return $__hx__this->sessionID;
	}
}
function ufront_web_session_FileSession_2(&$__hx__this) {
	{
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_cookies(), $__hx__this->sessionName);
		}
		if($__hx__this->sessionID === null) {
			$__hx__this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($__hx__this->context->request->get_params(), $__hx__this->sessionName);
		}
		return $__hx__this->sessionID;
	}
}
