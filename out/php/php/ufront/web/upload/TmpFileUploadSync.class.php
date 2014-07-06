<?php

class ufront_web_upload_TmpFileUploadSync implements ufront_web_upload_FileUpload{
	public function __construct($tmpFileName, $postName, $originalFileName, $size) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->postName = $postName;
		$this->originalFileName = haxe_io_Path::withoutDirectory($originalFileName);
		$this->size = $size;
		$this->tmpFileName = $tmpFileName;
		$GLOBALS['%s']->pop();
	}}
	public $postName;
	public $originalFileName;
	public $size;
	public $tmpFileName;
	public function getBytes() {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::getBytes");
		$__hx__spos = $GLOBALS['%s']->length;
		try {
			{
				$tmp = ufront_core_Sync::of(tink_core_Outcome::Success(sys_io_File::getBytes($this->tmpFileName)));
				$GLOBALS['%s']->pop();
				return $tmp;
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
				{
					$tmp = ufront_core_Sync::of(tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during SyncFileUpload.getBytes()", $e, _hx_anonymous(array("fileName" => "TmpFileUploadSync.hx", "lineNumber" => 63, "className" => "ufront.web.upload.TmpFileUploadSync", "methodName" => "getBytes")))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getString() {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::getString");
		$__hx__spos = $GLOBALS['%s']->length;
		try {
			{
				$tmp = ufront_core_Sync::of(tink_core_Outcome::Success(sys_io_File::getContent($this->tmpFileName)));
				$GLOBALS['%s']->pop();
				return $tmp;
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
				{
					$tmp = ufront_core_Sync::of(tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during SyncFileUpload.getString()", $e, _hx_anonymous(array("fileName" => "TmpFileUploadSync.hx", "lineNumber" => 79, "className" => "ufront.web.upload.TmpFileUploadSync", "methodName" => "getString")))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function writeToFile($newFilePath) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::writeToFile");
		$__hx__spos = $GLOBALS['%s']->length;
		try {
			sys_io_File::copy($this->tmpFileName, $newFilePath);
			{
				$tmp = ufront_core_Sync::success();
				$GLOBALS['%s']->pop();
				return $tmp;
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
				{
					$tmp = ufront_core_Sync::of(tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during SyncFileUpload.writeToFile()", $e, _hx_anonymous(array("fileName" => "TmpFileUploadSync.hx", "lineNumber" => 96, "className" => "ufront.web.upload.TmpFileUploadSync", "methodName" => "writeToFile")))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function process($onData, $partSize = null) {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::process");
		$__hx__spos = $GLOBALS['%s']->length;
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
				$readNext1 = array(new _hx_lambda(array(&$doneTrigger, &$fh, &$onData, &$partSize, &$pos, &$readNext, &$readNext1), "ufront_web_upload_TmpFileUploadSync_0"), 'execute');
				$readNext = $readNext1;
			}
			call_user_func($readNext);
			{
				$tmp = $doneTrigger->future;
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e1 = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				{
					$tmp = ufront_core_Sync::of(tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during SyncFileUpload.process()", $e1, _hx_anonymous(array("fileName" => "TmpFileUploadSync.hx", "lineNumber" => 149, "className" => "ufront.web.upload.TmpFileUploadSync", "methodName" => "process")))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function deleteTemporaryFile() {
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::deleteTemporaryFile");
		$__hx__spos = $GLOBALS['%s']->length;
		try {
			@unlink($this->tmpFileName);
			{
				$tmp = tink_core_Outcome::Success(tink_core_Noise::$Noise);
				$GLOBALS['%s']->pop();
				return $tmp;
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
				{
					$tmp = tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Error during SyncFileUpload.deleteTmpFile()", $e, _hx_anonymous(array("fileName" => "TmpFileUploadSync.hx", "lineNumber" => 166, "className" => "ufront.web.upload.TmpFileUploadSync", "methodName" => "deleteTemporaryFile"))));
					$GLOBALS['%s']->pop();
					return $tmp;
				}
			}
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
	function __toString() { return 'ufront.web.upload.TmpFileUploadSync'; }
}
function ufront_web_upload_TmpFileUploadSync_0(&$doneTrigger, &$fh, &$onData, &$partSize, &$pos, &$readNext, &$readNext1) {
	{
		$GLOBALS['%s']->push("ufront.web.upload.TmpFileUploadSync::process@125");
		$__hx__spos2 = $GLOBALS['%s']->length;
		$final = false;
		$bytes = null;
		try {
			$bytes = $fh->read($partSize);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			if(($e = $_ex_) instanceof haxe_io_Eof){
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos2) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
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
		$GLOBALS['%s']->pop();
	}
}
