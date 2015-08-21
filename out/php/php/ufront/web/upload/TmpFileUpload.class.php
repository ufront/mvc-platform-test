<?php

class ufront_web_upload_TmpFileUpload implements ufront_web_upload_UFFileUpload{
	public function __construct($tmpFileName, $postName, $originalFileName, $size) {
		if(!php_Boot::$skip_constructor) {
		$this->postName = $postName;
		$this->originalFileName = haxe_io_Path::withoutDirectory($originalFileName);
		$this->size = $size;
		$this->tmpFileName = $tmpFileName;
	}}
	public $postName;
	public $originalFileName;
	public $size;
	public $tmpFileName;
	public function getBytes() {
		try {
			{
				$data = tink_core_Outcome::Success(sys_io_File::getBytes($this->tmpFileName));
				return tink_core__Future_Future_Impl_::sync($data);
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				{
					$data1 = tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during TmpFileUpload.getBytes()", $e, _hx_anonymous(array("fileName" => "TmpFileUpload.hx", "lineNumber" => 66, "className" => "ufront.web.upload.TmpFileUpload", "methodName" => "getBytes"))));
					return tink_core__Future_Future_Impl_::sync($data1);
				}
			}
		}
	}
	public function getString() {
		try {
			{
				$data = tink_core_Outcome::Success(sys_io_File::getContent($this->tmpFileName));
				return tink_core__Future_Future_Impl_::sync($data);
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				{
					$data1 = tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during TmpFileUpload.getString()", $e, _hx_anonymous(array("fileName" => "TmpFileUpload.hx", "lineNumber" => 80, "className" => "ufront.web.upload.TmpFileUpload", "methodName" => "getString"))));
					return tink_core__Future_Future_Impl_::sync($data1);
				}
			}
		}
	}
	public function writeToFile($newFilePath) {
		try {
			sys_io_File::copy($this->tmpFileName, $newFilePath);
			return ufront_core_SurpriseTools::success();
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				{
					$data = tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during TmpFileUpload.writeToFile()", $e, _hx_anonymous(array("fileName" => "TmpFileUpload.hx", "lineNumber" => 95, "className" => "ufront.web.upload.TmpFileUpload", "methodName" => "writeToFile"))));
					return tink_core__Future_Future_Impl_::sync($data);
				}
			}
		}
	}
	public function process($onData, $partSize = null) {
		try {
			if($partSize === null) {
				$partSize = 8192;
			}
			$doneTrigger = new tink_core_FutureTrigger();
			$fh = sys_io_File::read($this->tmpFileName, null);
			$pos = 0;
			$readNext = null;
			{
				$readNext1 = null;
				$readNext1 = array(new _hx_lambda(array(&$doneTrigger, &$fh, &$onData, &$partSize, &$pos, &$readNext, &$readNext1), "ufront_web_upload_TmpFileUpload_0"), 'execute');
				$readNext = $readNext1;
			}
			call_user_func($readNext);
			return $doneTrigger->future;
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e1 = $_ex_;
			{
				{
					$data = tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during TmpFileUpload.process()", $e1, _hx_anonymous(array("fileName" => "TmpFileUpload.hx", "lineNumber" => 148, "className" => "ufront.web.upload.TmpFileUpload", "methodName" => "process"))));
					return tink_core__Future_Future_Impl_::sync($data);
				}
			}
		}
	}
	public function deleteTemporaryFile() {
		try {
			@unlink($this->tmpFileName);
			return tink_core_Outcome::Success(tink_core_Noise::$Noise);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during TmpFileUpload.deleteTmpFile()", $e, _hx_anonymous(array("fileName" => "TmpFileUpload.hx", "lineNumber" => 165, "className" => "ufront.web.upload.TmpFileUpload", "methodName" => "deleteTemporaryFile"))));
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
	function __toString() { return 'ufront.web.upload.TmpFileUpload'; }
}
function ufront_web_upload_TmpFileUpload_0(&$doneTrigger, &$fh, &$onData, &$partSize, &$pos, &$readNext, &$readNext1) {
	{
		$final = false;
		$bytes = null;
		try {
			$bytes = $fh->read($partSize);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			if(($e = $_ex_) instanceof haxe_io_Eof){
				$final = true;
				$bytes = $fh->readAll($partSize);
			} else throw $__hx__e;;
		}
		call_user_func_array($onData, array($bytes, $pos, $bytes->length));
		if($final === false) {
			$pos += $partSize;
			call_user_func($readNext1);
		} else {
			$result = tink_core_Outcome::Success(tink_core_Noise::$Noise);
			if($doneTrigger->{"list"} === null) {
				false;
			} else {
				$list = $doneTrigger->{"list"};
				$doneTrigger->{"list"} = null;
				$doneTrigger->result = $result;
				tink_core__Callback_CallbackList_Impl_::invoke($list, $result);
				tink_core__Callback_CallbackList_Impl_::clear($list);
				true;
			}
		}
	}
}
