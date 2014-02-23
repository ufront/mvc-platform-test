<?php

class php_ufront_web_context_HttpRequest extends ufront_web_context_HttpRequest {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->_parsed = false;
	}}
	public function get_queryString() {
		if(null === $this->queryString) {
			$this->queryString = $_SERVER["QUERY_STRING"];
		}
		return $this->queryString;
	}
	public function get_postString() {
		if($this->get_httpMethod() === "GET") {
			return "";
		}
		if(null === $this->postString) {
			if(isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
				$this->postString = $GLOBALS["HTTP_RAW_POST_DATA"];
			} else {
				$this->postString = file_get_contents("php://input");
			}
			if(null === $this->postString) {
				$this->postString = "";
			}
		}
		return $this->postString;
	}
	public $_parsed;
	public function parseMultipart($onPart = null, $onData = null, $onEndPart = null) {
		if($this->_parsed) {
			throw new HException(new tink_core_Error("parseMultipart() can only been called once", _hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 63, "className" => "php.ufront.web.context.HttpRequest", "methodName" => "parseMultipart"))));
		}
		$this->_parsed = true;
		$post = $this->get_post();
		if(isset($_FILES)) {
			$parts = new _hx_array(array_keys($_FILES));
			$errors = (new _hx_array(array()));
			$allPartFutures = (new _hx_array(array()));
			if($onPart === null) {
				$onPart = array(new _hx_lambda(array(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post), "php_ufront_web_context_HttpRequest_0"), 'execute');
			}
			if($onData === null) {
				$onData = array(new _hx_lambda(array(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post), "php_ufront_web_context_HttpRequest_1"), 'execute');
			}
			if($onEndPart === null) {
				$onEndPart = array(new _hx_lambda(array(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post), "php_ufront_web_context_HttpRequest_2"), 'execute');
			}
			{
				$_g = 0;
				while($_g < $parts->length) {
					$part = $parts[$_g];
					++$_g;
					$info = $_FILES[$part];
					$file = $info["name"];
					$tmp = $info["tmp_name"];
					$name = urldecode($part);
					if($tmp === "") {
						continue;
					}
					$err = $info["error"];
					if($err > 0) {
						switch($err) {
						case 1:{
							$maxSize = ini_get("upload_max_filesize");
							$errors->push("The uploaded file exceeds the max size of " . _hx_string_or_null($maxSize));
						}break;
						case 2:{
							$maxSize1 = ini_get("post_max_size");
							$errors->push("The uploaded file exceeds the max file size directive specified in the HTML form (max is " . _hx_string_or_null($maxSize1) . ")");
						}break;
						case 3:{
							$errors->push("The uploaded file was only partially uploaded");
						}break;
						case 4:{
						}break;
						case 6:{
							$errors->push("Missing a temporary folder");
						}break;
						case 7:{
							$errors->push("Failed to write file to disk");
						}break;
						case 8:{
							$errors->push("File upload stopped by extension");
						}break;
						}
						continue;
					}
					$fileResource = null;
					$bsize = 8192;
					$currentPos = 0;
					$partFinishedTrigger = new tink_core_FutureTrigger();
					$allPartFutures->push($partFinishedTrigger->future);
					$processResult = array(new _hx_lambda(array(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$tmp), "php_ufront_web_context_HttpRequest_3"), 'execute');
					$readNextPart = null;
					{
						$readNextPart1 = null;
						$readNextPart1 = array(new _hx_lambda(array(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$tmp), "php_ufront_web_context_HttpRequest_4"), 'execute');
						$readNextPart = $readNextPart1;
						unset($readNextPart1);
					}
					call_user_func_array($processResult, array(call_user_func_array($onPart, array($name, $file)), array(new _hx_lambda(array(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$tmp), "php_ufront_web_context_HttpRequest_5"), 'execute')));
					unset($tmp,$readNextPart,$processResult,$partFinishedTrigger,$part,$name,$info,$fileResource,$file,$err,$currentPos,$bsize);
				}
			}
			return tink_core__Future_Future_Impl_::map(tink_core__Future_Future_Impl_::ofMany($allPartFutures, null), array(new _hx_lambda(array(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post), "php_ufront_web_context_HttpRequest_6"), 'execute'), null);
		} else {
			return ufront_core_Sync::of(tink_core_Outcome::Success(tink_core_Noise::$Noise));
		}
	}
	public function get_query() {
		if(null === $this->query) {
			$this->query = php_ufront_web_context_HttpRequest::getHashFromString($this->get_queryString());
		}
		return $this->query;
	}
	public function get_post() {
		if($this->get_httpMethod() === "GET") {
			return new haxe_ds_StringMap();
		}
		if(null === $this->post) {
			if("multipart/form-data" === ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "ContentType")) {
				$this->post = new haxe_ds_StringMap();
				if(isset($_POST)) {
					$postNames = new _hx_array(call_user_func_array($__call, array("array_keys", $_POST)));
					{
						$_g = 0;
						while($_g < $postNames->length) {
							$name = $postNames[$_g];
							++$_g;
							$val = $_POST[$name];
							if(is_array($val)) {
								$h = php_Lib::hashOfAssociativeArray($val);
								if(null == $h) throw new HException('null iterable');
								$__hx__it = $h->keys();
								while($__hx__it->hasNext()) {
									$k = $__hx__it->next();
									if(is_string($val)) {
										ufront_core__MultiValueMap_MultiValueMap_Impl_::add($this->post, $k, $h->get($k));
									}
								}
								unset($h);
							} else {
								if(is_string($val)) {
									ufront_core__MultiValueMap_MultiValueMap_Impl_::add($this->post, $name, $val);
								}
							}
							unset($val,$name);
						}
					}
				}
			} else {
				$this->post = php_ufront_web_context_HttpRequest::getHashFromString($this->get_postString());
			}
			if(isset($_FILES)) {
				$parts = new _hx_array(array_keys($_FILES));
				{
					$_g1 = 0;
					while($_g1 < $parts->length) {
						$part = $parts[$_g1];
						++$_g1;
						$file = $_FILES[$part]['name'];
						$name1 = StringTools::urldecode($part);
						ufront_core__MultiValueMap_MultiValueMap_Impl_::add($this->post, $name1, $file);
						unset($part,$name1,$file);
					}
				}
			}
		}
		return $this->post;
	}
	public function get_cookies() {
		if(null === $this->cookies) {
			$this->cookies = new haxe_ds_StringMap();
			$h = php_Lib::hashOfAssociativeArray($_COOKIE);
			if(null == $h) throw new HException('null iterable');
			$__hx__it = $h->keys();
			while($__hx__it->hasNext()) {
				$k = $__hx__it->next();
				ufront_core__MultiValueMap_MultiValueMap_Impl_::add($this->cookies, $k, $h->get($k));
			}
		}
		return $this->cookies;
	}
	public function get_userAgent() {
		if(null === $this->userAgent) {
			$this->userAgent = ufront_web_UserAgent::fromString(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "User-Agent"));
		}
		return $this->userAgent;
	}
	public function get_hostName() {
		if(null === $this->hostName) {
			$this->hostName = $_SERVER['SERVER_NAME'];
		}
		return $this->hostName;
	}
	public function get_clientIP() {
		if(null === $this->clientIP) {
			$this->clientIP = $_SERVER['REMOTE_ADDR'];
		}
		return $this->clientIP;
	}
	public function get_uri() {
		if(null === $this->uri) {
			$s = $_SERVER['REQUEST_URI'];
			$this->uri = _hx_array_get(_hx_explode("?", $s), 0);
		}
		return $this->uri;
	}
	public function get_clientHeaders() {
		if(null === $this->clientHeaders) {
			$this->clientHeaders = new haxe_ds_StringMap();
			$h = php_Lib::hashOfAssociativeArray($_SERVER);
			if(null == $h) throw new HException('null iterable');
			$__hx__it = $h->keys();
			while($__hx__it->hasNext()) {
				$k = $__hx__it->next();
				if(_hx_substr($k, 0, 5) === "HTTP_") {
					$headerName = Strings::ucwords(php_ufront_web_context_HttpRequest_7($this, $h, $k));
					$headerValues = $h->get($k);
					{
						$_g = 0;
						$_g1 = _hx_explode(",", $headerValues);
						while($_g < $_g1->length) {
							$val = $_g1[$_g];
							++$_g;
							ufront_core__MultiValueMap_MultiValueMap_Impl_::add($this->clientHeaders, $headerName, trim($val));
							unset($val);
						}
						unset($_g1,$_g);
					}
					unset($headerValues,$headerName);
				}
			}
			if($h->exists("CONTENT_TYPE")) {
				ufront_core__MultiValueMap_MultiValueMap_Impl_::set($this->clientHeaders, "Content-Type", $h->get("CONTENT_TYPE"));
			}
		}
		return $this->clientHeaders;
	}
	public function get_httpMethod() {
		if(null === $this->httpMethod) {
			if(isset($_SERVER['REQUEST_METHOD'])) {
				$this->httpMethod = $_SERVER['REQUEST_METHOD'];
			}
			if(null === $this->httpMethod) {
				$this->httpMethod = "";
			}
		}
		return $this->httpMethod;
	}
	public function get_scriptDirectory() {
		if(null === $this->scriptDirectory) {
			$this->scriptDirectory = _hx_string_or_null(dirname($_SERVER['SCRIPT_FILENAME'])) . "/";
		}
		return $this->scriptDirectory;
	}
	public function get_authorization() {
		if(null === _hx_field($this, "authorization")) {
			$this->authorization = _hx_anonymous(array("user" => null, "pass" => null));
			if(isset($_SERVER['PHP_AUTH_USER'])) {
				$this->authorization->user = $_SERVER['PHP_AUTH_USER'];
				$this->authorization->pass = $_SERVER['PHP_AUTH_PW'];
			}
		}
		return $this->authorization;
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
	static function encodeName($s) {
		$s1 = rawurlencode($s);
		return str_replace(".", "%2E", $s1);
	}
	static $paramPattern;
	static function getHashFromString($s) {
		$qm = new haxe_ds_StringMap();
		{
			$_g = 0;
			$_g1 = _hx_explode("&", $s);
			while($_g < $_g1->length) {
				$part = $_g1[$_g];
				++$_g;
				if(!php_ufront_web_context_HttpRequest::$paramPattern->match($part)) {
					continue;
				}
				ufront_core__MultiValueMap_MultiValueMap_Impl_::add($qm, php_ufront_web_context_HttpRequest_8($_g, $_g1, $part, $qm, $s), php_ufront_web_context_HttpRequest_9($_g, $_g1, $part, $qm, $s));
				unset($part);
			}
		}
		return $qm;
	}
	static function getHashFrom($a) {
		if(get_magic_quotes_gpc()) {
			reset($a); while(list($k, $v) = each($a)) $a[$k] = stripslashes((string)$v);
		}
		return php_Lib::hashOfAssociativeArray($a);
	}
	static $__properties__ = array("get_authorization" => "get_authorization","get_scriptDirectory" => "get_scriptDirectory","get_httpMethod" => "get_httpMethod","get_userAgent" => "get_userAgent","get_clientHeaders" => "get_clientHeaders","get_uri" => "get_uri","get_clientIP" => "get_clientIP","get_hostName" => "get_hostName","get_cookies" => "get_cookies","get_files" => "get_files","get_post" => "get_post","get_query" => "get_query","get_postString" => "get_postString","get_queryString" => "get_queryString","get_params" => "get_params");
	function __toString() { return 'php.ufront.web.context.HttpRequest'; }
}
php_ufront_web_context_HttpRequest::$paramPattern = new EReg("^([^=]+)=(.*?)\$", "");
function php_ufront_web_context_HttpRequest_0(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post, $_, $_1) {
	{
		return ufront_core_Sync::of(tink_core_Outcome::Success(tink_core_Noise::$Noise));
	}
}
function php_ufront_web_context_HttpRequest_1(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post, $_2, $_3, $_4) {
	{
		return ufront_core_Sync::of(tink_core_Outcome::Success(tink_core_Noise::$Noise));
	}
}
function php_ufront_web_context_HttpRequest_2(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post) {
	{
		return ufront_core_Sync::of(tink_core_Outcome::Success(tink_core_Noise::$Noise));
	}
}
function php_ufront_web_context_HttpRequest_3(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$tmp, $surprise, $andThen) {
	{
		call_user_func_array($surprise, array(array(new _hx_lambda(array(&$_g, &$allPartFutures, &$andThen, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$surprise, &$tmp), "php_ufront_web_context_HttpRequest_10"), 'execute')));
	}
}
function php_ufront_web_context_HttpRequest_4(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$tmp) {
	{
		if(false === feof($fileResource)) {
			$buf = fread($fileResource, $bsize);
			$size = strlen($buf);
			call_user_func_array($processResult, array(call_user_func_array($onData, array(haxe_io_Bytes::ofString($buf), $currentPos, $size)), array(new _hx_lambda(array(&$_g, &$allPartFutures, &$bsize, &$buf, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$size, &$tmp), "php_ufront_web_context_HttpRequest_11"), 'execute')));
			$currentPos += $size;
		} else {
			fclose($fileResource);
			call_user_func_array($processResult, array(call_user_func($onEndPart), array(new _hx_lambda(array(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$tmp), "php_ufront_web_context_HttpRequest_12"), 'execute')));
		}
	}
}
function php_ufront_web_context_HttpRequest_5(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$tmp) {
	{
		$fileResource = fopen($tmp, "r");
		call_user_func($readNextPart);
	}
}
function php_ufront_web_context_HttpRequest_6(&$allPartFutures, &$errors, &$onData, &$onEndPart, &$onPart, &$parts, &$post, $_5) {
	{
		if($errors->length === 0) {
			return tink_core_Outcome::Success(tink_core_Noise::$Noise);
		} else {
			return tink_core_Outcome::Failure(tink_core_Error::withData("Error parsing multipart request data", $errors, _hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 151, "className" => "php.ufront.web.context.HttpRequest", "methodName" => "parseMultipart"))));
		}
	}
}
function php_ufront_web_context_HttpRequest_7(&$__hx__this, &$h, &$k) {
	{
		$s = strtolower(_hx_substr($k, 5, null));
		return str_replace("_", "-", $s);
	}
}
function php_ufront_web_context_HttpRequest_8(&$_g, &$_g1, &$part, &$qm, &$s) {
	{
		$s1 = php_ufront_web_context_HttpRequest::$paramPattern->matched(1);
		return urldecode($s1);
	}
}
function php_ufront_web_context_HttpRequest_9(&$_g, &$_g1, &$part, &$qm, &$s) {
	{
		$s2 = php_ufront_web_context_HttpRequest::$paramPattern->matched(2);
		return urldecode($s2);
	}
}
function php_ufront_web_context_HttpRequest_10(&$_g, &$allPartFutures, &$andThen, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$surprise, &$tmp, $outcome) {
	{
		switch($outcome->index) {
		case 0:{
			$err1 = $outcome->params[0];
			call_user_func($andThen);
		}break;
		case 1:{
			$err2 = $outcome->params[0];
			{
				$errors->push($err2->toString());
				try {
					fclose($fileResource);
				}catch(Exception $__hx__e) {
					$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
					$e = $_ex_;
					{
						$errors->push("Failed to close upload tmp file: " . Std::string($e));
					}
				}
				try {
					unlink($tmp);
				}catch(Exception $__hx__e) {
					$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
					$e1 = $_ex_;
					{
						$errors->push("Failed to delete upload tmp file: " . Std::string($e1));
					}
				}
				if($partFinishedTrigger->{"list"} === null) {
					false;
				} else {
					$list = $partFinishedTrigger->{"list"};
					$partFinishedTrigger->{"list"} = null;
					$partFinishedTrigger->result = $outcome;
					tink_core__Callback_CallbackList_Impl_::invoke($list, $outcome);
					tink_core__Callback_CallbackList_Impl_::clear($list);
					true;
				}
			}
		}break;
		}
	}
}
function php_ufront_web_context_HttpRequest_11(&$_g, &$allPartFutures, &$bsize, &$buf, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$size, &$tmp) {
	{
		call_user_func($readNextPart1);
	}
}
function php_ufront_web_context_HttpRequest_12(&$_g, &$allPartFutures, &$bsize, &$currentPos, &$err, &$errors, &$file, &$fileResource, &$info, &$name, &$onData, &$onEndPart, &$onPart, &$part, &$partFinishedTrigger, &$parts, &$post, &$processResult, &$readNextPart, &$readNextPart1, &$tmp) {
	{
		unlink($tmp);
	}
}
