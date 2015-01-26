<?php

class testsite_Server {
	public function __construct(){}
	static $ufrontApp;
	static function main() {
		testsite_Server::run();
	}
	static function run() {
		if(testsite_Server::$ufrontApp === null) {
			testsite_Server::$ufrontApp = new ufront_app_UfrontApplication(_hx_anonymous(array("indexController" => _hx_qtype("testsite.Routes"), "logFile" => "log.txt", "contentDirectory" => "../uf-content/", "authImplementation" => _hx_qtype("ufront.auth.NobodyAuthHandler"), "sessionImplementation" => _hx_qtype("ufront.web.session.VoidSession"), "basePath" => "/php/")));
		}
		testsite_Server::$ufrontApp->executeRequest();
	}
	function __toString() { return 'testsite.Server'; }
}
