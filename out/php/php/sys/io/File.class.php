<?php

class sys_io_File {
	public function __construct(){}
	static function getContent($path) {
		$GLOBALS['%s']->push("sys.io.File::getContent");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = file_get_contents($path);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBytes($path) {
		$GLOBALS['%s']->push("sys.io.File::getBytes");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = haxe_io_Bytes::ofString(sys_io_File::getContent($path));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function saveContent($path, $content) {
		$GLOBALS['%s']->push("sys.io.File::saveContent");
		$__hx__spos = $GLOBALS['%s']->length;
		file_put_contents($path, $content);
		$GLOBALS['%s']->pop();
	}
	static function saveBytes($path, $bytes) {
		$GLOBALS['%s']->push("sys.io.File::saveBytes");
		$__hx__spos = $GLOBALS['%s']->length;
		$f = sys_io_File::write($path, null);
		$f->write($bytes);
		$f->close();
		$GLOBALS['%s']->pop();
	}
	static function read($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::read");
		$__hx__spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$tmp = new sys_io_FileInput(fopen($path, (($binary) ? "rb" : "r")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function write($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::write");
		$__hx__spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$tmp = new sys_io_FileOutput(fopen($path, (($binary) ? "wb" : "w")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function append($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::append");
		$__hx__spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$tmp = new sys_io_FileOutput(fopen($path, (($binary) ? "ab" : "a")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copy($srcPath, $dstPath) {
		$GLOBALS['%s']->push("sys.io.File::copy");
		$__hx__spos = $GLOBALS['%s']->length;
		copy($srcPath, $dstPath);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.io.File'; }
}
