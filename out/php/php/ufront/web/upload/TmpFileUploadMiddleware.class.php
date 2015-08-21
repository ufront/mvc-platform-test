<?php

class ufront_web_upload_TmpFileUploadMiddleware implements ufront_app_UFMiddleware{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->files = (new _hx_array(array()));
	}}
	public $files;
	public function requestIn($ctx) {
		$_g = $this;
		if(strtolower($ctx->request->get_httpMethod()) === "post" && $ctx->request->isMultipart()) {
			$file = null;
			$postName = null;
			$origFileName = null;
			$size = 0;
			$tmpFilePath = null;
			$dateStr = DateTools::format(Date::now(), "%Y%m%d-%H%M");
			$dir = _hx_string_or_null($ctx->get_contentDirectory()) . _hx_string_or_null(haxe_io_Path::addTrailingSlash(ufront_web_upload_TmpFileUploadMiddleware::$subDir));
			{
				$path = haxe_io_Path::removeTrailingSlashes($dir);
				$path1 = haxe_io_Path::addTrailingSlash($path);
				$_p = null;
				$parts = (new _hx_array(array()));
				while($path1 !== ($_p = haxe_io_Path::directory($path1))) {
					$parts->unshift($path1);
					$path1 = $_p;
				}
				{
					$_g1 = 0;
					while($_g1 < $parts->length) {
						$part = $parts[$_g1];
						++$_g1;
						if(_hx_char_code_at($part, strlen($part) - 1) !== 58 && !file_exists($part)) {
							@mkdir($part, 493);
						}
						unset($part);
					}
				}
			}
			$onPart = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_0"), 'execute');
			$onData = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_1"), 'execute');
			$onEndPart = array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_2"), 'execute');
			return tink_core__Future_Future_Impl_::map($ctx->request->parseMultipart($onPart, $onData, $onEndPart), array(new _hx_lambda(array(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onEndPart, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath), "ufront_web_upload_TmpFileUploadMiddleware_3"), 'execute'), null);
		} else {
			return ufront_core_SurpriseTools::success();
		}
	}
	public function responseOut($ctx) {
		if(strtolower($ctx->request->get_httpMethod()) === "post" && $ctx->request->isMultipart()) {
			$_g = 0;
			$_g1 = $this->files;
			while($_g < $_g1->length) {
				$f = $_g1[$_g];
				++$_g;
				{
					$_g2 = $f->deleteTemporaryFile();
					switch($_g2->index) {
					case 1:{
						$e = _hx_deref($_g2)->params[0];
						$ctx->messages->push(_hx_anonymous(array("msg" => $e, "pos" => _hx_anonymous(array("fileName" => "TmpFileUploadMiddleware.hx", "lineNumber" => 120, "className" => "ufront.web.upload.TmpFileUploadMiddleware", "methodName" => "responseOut")), "type" => ufront_log_MessageType::$MError)));
					}break;
					default:{}break;
					}
					unset($_g2);
				}
				unset($f);
			}
		}
		return ufront_core_SurpriseTools::success();
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
		$postName = $pName;
		$origFileName = $fName;
		$size = 0;
		while($file === null) {
			$tmpFilePath = _hx_string_or_null($dir) . _hx_string_or_null($dateStr) . "-" . _hx_string_or_null(ufront_core_Uuid::create()) . ".tmp";
			if(!file_exists($tmpFilePath)) {
				$file = sys_io_File::write($tmpFilePath, null);
			}
		}
		return ufront_core_SurpriseTools::success();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_1(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath, $bytes, $pos, $len) {
	{
		$size += $len;
		$file->writeBytes($bytes, $pos, $len);
		return ufront_core_SurpriseTools::success();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_2(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath) {
	{
		if($file !== null) {
			$file->close();
			$file = null;
			$tmpFile = new ufront_web_upload_TmpFileUpload($tmpFilePath, $postName, $origFileName, $size);
			ufront_core__MultiValueMap_MultiValueMap_Impl_::add($ctx->request->get_files(), $postName, $tmpFile);
			$_g->files->push($tmpFile);
		}
		return ufront_core_SurpriseTools::success();
	}
}
function ufront_web_upload_TmpFileUploadMiddleware_3(&$_g, &$ctx, &$dateStr, &$dir, &$file, &$onData, &$onEndPart, &$onPart, &$origFileName, &$postName, &$size, &$tmpFilePath, $result) {
	{
		switch($result->index) {
		case 0:{
			$s = _hx_deref($result)->params[0];
			return tink_core_Outcome::Success($s);
		}break;
		case 1:{
			$f = _hx_deref($result)->params[0];
			return tink_core_Outcome::Failure(ufront_web_HttpError::wrap($f, null, _hx_anonymous(array("fileName" => "TmpFileUploadMiddleware.hx", "lineNumber" => 101, "className" => "ufront.web.upload.TmpFileUploadMiddleware", "methodName" => "requestIn"))));
		}break;
		}
	}
}
