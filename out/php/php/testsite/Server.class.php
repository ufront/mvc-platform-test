<?php

class testsite_Server {
	public function __construct(){}
	static $ufrontApp;
	static function main() {
		testsite_Server::run();
	}
	static $_inited;
	static function run() {
		if(!testsite_Server::$_inited) {
			testsite_Server::$ufrontApp = new ufront_app_UfrontApplication(_hx_anonymous(array("indexController" => _hx_qtype("testsite.Routes"), "logFile" => "log.txt", "basePath" => "/php/")));
			testsite_Server::$_inited = true;
		}
		testsite_Server::$ufrontApp->execute(null);
	}
	function __toString() { return 'testsite.Server'; }
}
