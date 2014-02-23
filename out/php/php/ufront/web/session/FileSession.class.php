<?php

class ufront_web_session_FileSession implements ufront_web_session_UFHttpSessionState{
	public function __construct($context, $savePath = null, $sessionName = null, $expire = null) {
		if(!php_Boot::$skip_constructor) {
		if(null === $context) {
			throw new HException(new thx_error_NullArgument("context", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "FileSession.hx", "lineNumber" => 94, "className" => "ufront.web.session.FileSession", "methodName" => "new"))));
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
	public $sessionName;
	public $expiry;
	public $savePath;
	public function setExpiry($e) {
		$this->expiry = $e;
	}
	public function init() {
		$t = new tink_core_FutureTrigger();
		if(!$this->started) {
			if(ufront_web_session_FileSession_0($this, $t)) {
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
					$path1 = "/";
					$domain = null;
					$secure = false;
					$sessionCookie = new ufront_web_HttpCookie($this->sessionName, $id, $expire, $domain, $path1, $secure);
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
				$result1 = tink_core_Outcome::Failure("Neko session savepath not found: " . _hx_string_or_null(_hx_substr($this->savePath, 0, -1)));
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
		} else {
			$result2 = tink_core_Outcome::Success(tink_core_Noise::$Noise);
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
		return $t->future;
	}
	public function commit() {
		$t = new tink_core_FutureTrigger();
		$handled = false;
		if($this->commitFlag && $this->sessionData !== null) {
			$handled = true;
			try {
				$filePath = "" . _hx_string_or_null($this->savePath) . _hx_string_or_null($this->sessionID) . ".sess";
				$content = haxe_Serializer::run($this->sessionData);
				sys_io_File::saveContent($filePath, $content);
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
			}catch(Exception $__hx__e) {
				$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
				$e = $_ex_;
				{
					$result1 = tink_core_Outcome::Failure("Unable to save session: " . Std::string($e));
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
			}
		}
		if($this->closeFlag) {
			$handled = true;
			{
				$result2 = tink_core_Outcome::Failure("NotImplemented: close the session, delete the file, expire the cookie");
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
		if($this->regenerateFlag) {
			$handled = true;
			{
				$result3 = tink_core_Outcome::Failure("NotImplemented: use regenerated ID to rename file and update cookie");
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
		return $t->future;
	}
	public function get($name) {
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		return $this->sessionData->get($name);
	}
	public function set($name, $value) {
		$this->init();
		$this->sessionData->set($name, $value);
		$this->commitFlag = true;
	}
	public function exists($name) {
		if(!(ufront_web_session_FileSession_1($this, $name) !== null)) {
			return false;
		}
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		return $this->sessionData->exists($name);
	}
	public function remove($name) {
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
		}
		$this->sessionData->remove($name);
		$this->commitFlag = true;
	}
	public function clear() {
		if($this->sessionData !== null && ufront_web_session_FileSession_2($this) !== null) {
			$this->sessionData = new haxe_ds_StringMap();
			$this->commitFlag = true;
		}
	}
	public function triggerCommit() {
		$this->commitFlag = true;
	}
	public function regenerateID() {
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
		return $t->future;
	}
	public function isActive() {
		return ufront_web_session_FileSession_3($this) !== null;
	}
	public function getID() {
		if($this->sessionID === null) {
			$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_cookies(), $this->sessionName);
		}
		if($this->sessionID === null) {
			$this->sessionID = ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->context->request->get_params(), $this->sessionName);
		}
		return $this->sessionID;
	}
	public function close() {
		$this->init();
		$this->sessionData = null;
		$this->sessionID = null;
		$this->closeFlag = true;
		$this->commitFlag = true;
	}
	public function getSessionFilePath($id) {
		return "" . _hx_string_or_null($this->savePath) . _hx_string_or_null($id) . ".sess";
	}
	public function generateSessionID() {
		return Random::string(40, null);
	}
	public function checkStarted() {
		if(!$this->started) {
			throw new HException("Trying to access session data before calling init()");
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
	static function getFactory($savePath = null, $sessionName = null, $expire = null) {
		if($expire === null) {
			$expire = 0;
		}
		if(ufront_web_session_FileSession::$_factory === null || ufront_web_session_FileSession::$_factory->savePath !== $savePath || ufront_web_session_FileSession::$_factory->sessionName !== $sessionName || ufront_web_session_FileSession::$_factory->expire !== $expire) {
			ufront_web_session_FileSession::$_factory = new ufront_web_session_FileSessionFactory($savePath, $sessionName, $expire);
		}
		return ufront_web_session_FileSession::$_factory;
	}
	static $_factory;
	static $defaultSessionName = "UfrontSessionID";
	static $defaultSavePath = "sessions/";
	static $defaultExpiry = 0;
	static $validID;
	static function testValidId($id) {
		if($id !== null) {
			if(!ufront_web_session_FileSession::$validID->match($id)) {
				throw new HException("Invalid session ID.");
			}
		}
	}
	function __toString() { return 'ufront.web.session.FileSession'; }
}
ufront_web_session_FileSession::$validID = new EReg("^[a-zA-Z0-9]+\$", "");
function ufront_web_session_FileSession_0(&$__hx__this, &$t) {
	{
		$path = _hx_substr($__hx__this->savePath, 0, -1);
		return file_exists($path);
	}
}
function ufront_web_session_FileSession_1(&$__hx__this, &$name) {
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
function ufront_web_session_FileSession_3(&$__hx__this) {
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
