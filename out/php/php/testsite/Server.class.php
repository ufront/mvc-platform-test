<?php

class testsite_Server {
	public function __construct(){}
	static $ufrontApp;
	static function main() {
		$GLOBALS['%s']->push("testsite.Server::main");
		$__hx__spos = $GLOBALS['%s']->length;
		testsite_Server::run();
		$GLOBALS['%s']->pop();
	}
	static function run() {
		$GLOBALS['%s']->push("testsite.Server::run");
		$__hx__spos = $GLOBALS['%s']->length;
		if(testsite_Server::$ufrontApp === null) {
			testsite_Server::$ufrontApp = new ufront_app_UfrontApplication(_hx_anonymous(array("indexController" => _hx_qtype("testsite.Routes"), "logFile" => "log.txt", "contentDirectory" => "../uf-content/", "basePath" => "/php/")));
		}
		testsite_Server::$ufrontApp->execute(ufront_web_context_HttpContext::create(null, null, null, null, null, null, null));
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'testsite.Server'; }
}
