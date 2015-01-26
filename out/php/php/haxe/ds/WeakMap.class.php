<?php

class haxe_ds_WeakMap implements IMap{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		throw new HException("Not implemented for this platform");
	}}
	public function set($key, $value) {
	}
	public function get($key) {
		return null;
	}
	public function exists($key) {
		return false;
	}
	public function remove($key) {
		return false;
	}
	public function keys() {
		return null;
	}
	public function iterator() {
		return null;
	}
	function __toString() { return 'haxe.ds.WeakMap'; }
}
