<?php

class ufront_web_upload_TmpFileUploadMiddleware implements ufront_app_UFMiddleware{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->files = (new _hx_array(array()));
		$GLOBALS['%s']->pop();
	}}
	public $files;
	public function requestIn($ctx) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::requestIn");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g = $this;
		if(strtolower($ctx->request->get_httpMethod()) === "post" && $ctx->request->isMultipart()) {
			$file = null;
			$postName = null;
			$origFileName = null;
			$size = 0;
			$tmpFilePath = null;
			$dateStr = Dates::format(Date::now(), "%Y%m%d-%H%M", null, null);
			$dir = _hx_string_or_null($ctx->get_contentDirectory()) . _hx_string_or_null(haxe_io_Path::addTrailingSlash(ufront_web_upload_TmpFileUploadMiddleware::$subDir));
			ufront_sys_SysUtil::mkdir($dir);
			$onPart = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_0"), 'execute');
			$onData = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_1"), 'execute');
			$onEndPart = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_2"), 'execute');
			{
				$tmp = tink_core__Future_Future_Impl_::map($ctx->request->parseMultipart($onPart, $onData, $onEndPart), array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onEndPart, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_3"), 'execute'), null);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		} else {
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function responseOut($ctx) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::responseOut");
		$__hx__spos = $GLOBALS['%s']->length;
		if(strtolower($ctx->request->get_httpMethod()) === "post" && $ctx->request->isMultipart()) {
			$errors = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $this->files;
				while($_g < $_g1->length) {
					$f = $_g1[$_g];
					++$_g;
					{
						$_g2 = $f->deleteTemporaryFile();
						switch($_g2->index) {
						case 1:{
							$e = $_g2->params[0];
							$errors->push($e);
						}break;
						default:{
						}break;
						}
						unset($_g2);
					}
					unset($f);
				}
			}
			if($errors->length > 0) {
				$tmp = ufront_core_Sync::httpError("Failed to delete one or more temporary upload files", $errors, _hx_anonymous(array("fileName" => "TmpFileUploadMiddleware.hx", "lineNumber" => 127, "className" => "ufront.web.upload.TmpFileUploadMiddleware", "methodName" => "responseOut")));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}
		{
			$tmp = ufront_core_Sync::success();
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
	static $subDir = "uf-upload-tmp";
	function __toString() { return 'ufront.web.upload.TmpFileUploadMiddleware'; }
}
function ufront_web_upload_TmpFileUploadMiddleware_0(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$origFileName, &$postName, &$size, &$tmpFilePath, $pName, $fName) {
	{
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::requestIn@66");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$postName = $pName;
		$origFileName = $fName;
		$size = 0;
		while($file === null) {
			$tmpFilePath = _hx_string_or_null($dir) . _hx_string_or_null($dateStr) . "-" . _hx_string_or_null(Random::string(10, null)) . ".tmp";
			if(!file_exists($tmpFilePath)) {
				$file = sys_io_File::write($tmpFilePath, null);
			}
		}
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_1(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath, $bytes, $pos, $len) {
	{
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::requestIn@83");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$size += $len;
		$file->writeBytes($bytes, $pos, $len);
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_2(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath) {
	{
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::requestIn@89");
		$__hx__spos2 = $GLOBALS['%s']->length;
		if($file !== null) {
			$file->close();
			$tmpFile = new ufront_web_upload_TmpFileUploadSync($tmpFilePath, $postName, $origFileName, $size);
			ufront_core__MultiValueMap_MultiValueMap_Impl_::add($ctx->request->get_files(), $postName, $tmpFile);
			$_g->files->push($tmpFile);
		}
		{
			$tmp = ufront_core_Sync::success();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_3(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onEndPart, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath, $result) {
	{
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadMiddleware::requestIn@101");
		$__hx__spos2 = $GLOBALS['%s']->length;
		switch($result->index) {
		case 0:{
			$s = $result->params[0];
			{
				$tmp = tink_core_Outcome::Success($s);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 1:{
			$f = $result->params[0];
			{
				$tmp = tink_core_Outcome::Failure(ufront_web_HttpError::wrap($f, null, _hx_anonymous(array("fileName" => "TmpFileUploadMiddleware.hx", "lineNumber" => 104, "className" => "ufront.web.upload.TmpFileUploadMiddleware", "methodName" => "requestIn"))));
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
}
