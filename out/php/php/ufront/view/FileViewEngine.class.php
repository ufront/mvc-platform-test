<?php

class ufront_view_FileViewEngine extends ufront_view_UFViewEngine {
	public function __construct($path = null, $cachingEnabled = null) {
		if(!php_Boot::$skip_constructor) {
		if($cachingEnabled === null) {
			$cachingEnabled = true;
		}
		if($path === null) {
			$path = "view";
		}
		parent::__construct($cachingEnabled);
		$this->path = $path;
	}}
	public $contentDir;
	public $path;
	public $viewDirectory;
	public function get_viewDirectory() {
		return _hx_string_or_null($this->contentDir) . _hx_string_or_null($this->path) . "/";
	}
	public function getTemplateString($path) {
		$fullPath = _hx_string_or_null($this->get_viewDirectory()) . _hx_string_or_null($path);
		try {
			if(file_exists($fullPath)) {
				return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(haxe_ds_Option::Some(sys_io_File::getContent($fullPath))));
			} else {
				return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Success(haxe_ds_Option::$None));
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				return tink_core__Future_Future_Impl_::sync(tink_core_Outcome::Failure(tink_core_Error::withData("Failed to load template " . _hx_string_or_null($path), $e, _hx_anonymous(array("fileName" => "FileViewEngine.hx", "lineNumber" => 38, "className" => "ufront.view.FileViewEngine", "methodName" => "getTemplateString")))));
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
	static function __meta__() { $args = func_get_args(); return call_user_func_array(self::$__meta__, $args); }
	static $__meta__;
	static $__properties__ = array("get_viewDirectory" => "get_viewDirectory");
	function __toString() { return 'ufront.view.FileViewEngine'; }
}
ufront_view_FileViewEngine::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("contentDir" => _hx_anonymous(array("name" => (new _hx_array(array("contentDir"))), "type" => (new _hx_array(array("String"))), "inject" => (new _hx_array(array("contentDirectory")))))))));
