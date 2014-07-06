<?php

class ufront_view_FileViewEngine extends ufront_view_UFViewEngine {
	public function __construct($path = null, $isPathAbsolute = null, $cachingEnabled = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("ufront.view.FileViewEngine::new");
		$__hx__spos = $GLOBALS['%s']->length;
		if($cachingEnabled === null) {
			$cachingEnabled = true;
		}
		if($isPathAbsolute === null) {
			$isPathAbsolute = false;
		}
		if($path === null) {
			$path = "view";
		}
		parent::__construct($cachingEnabled);
		$this->path = $path;
		$this->isPathAbsolute = $isPathAbsolute;
		$GLOBALS['%s']->pop();
	}}
	public $scriptDir;
	public $path;
	public $isPathAbsolute;
	public $viewDirectory;
	public function get_viewDirectory() {
		$GLOBALS['%s']->push("ufront.view.FileViewEngine::get_viewDirectory");
		$__hx__spos = $GLOBALS['%s']->length;
		if($this->isPathAbsolute) {
			$tmp = haxe_io_Path::addTrailingSlash($this->path);
			$GLOBALS['%s']->pop();
			return $tmp;
		} else {
			$tmp = _hx_string_or_null($this->scriptDir) . _hx_string_or_null(haxe_io_Path::addTrailingSlash($this->path));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTemplateString($viewRelativePath) {
		$GLOBALS['%s']->push("ufront.view.FileViewEngine::getTemplateString");
		$__hx__spos = $GLOBALS['%s']->length;
		$fullPath = _hx_string_or_null($this->get_viewDirectory()) . _hx_string_or_null($viewRelativePath);
		try {
			if(file_exists($fullPath)) {
				$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(haxe_ds_Option::Some(sys_io_File::getContent($fullPath))));
				$GLOBALS['%s']->pop();
				return $tmp;
			} else {
				$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(haxe_ds_Option::$None));
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
					$tmp = tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(tink_core_TypedError::withData(null, "Failed to load template " . _hx_string_or_null($viewRelativePath), $e, _hx_anonymous(array("fileName" => "FileViewEngine.hx", "lineNumber" => 60, "className" => "ufront.view.FileViewEngine", "methodName" => "getTemplateString")))));
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
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	static $__properties__ = array("get_viewDirectory" => "get_viewDirectory");
	function __toString() { return 'ufront.view.FileViewEngine'; }
}
ufront_view_FileViewEngine::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("scriptDir" => _hx_anonymous(array("name" => (new _hx_array(array("scriptDir"))), "type" => (new _hx_array(array("String"))), "inject" => (new _hx_array(array("scriptDirectory")))))))));
