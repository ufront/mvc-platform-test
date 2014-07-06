<?php

class ufront_web_DefaultUfrontConfiguration {
	public function __construct(){}
	static function get() {
		$GLOBALS['%s']->push("ufront.web.DefaultUfrontConfiguration::get");
		$__hx__spos = $GLOBALS['%s']->length;
		$inlineSession = new ufront_middleware_InlineSessionMiddleware();
		$uploadMiddleware = new ufront_web_upload_TmpFileUploadMiddleware();
		{
			$tmp = _hx_anonymous(array("indexController" => _hx_qtype("ufront.web.DefaultController"), "remotingApi" => null, "urlRewrite" => true, "basePath" => "/", "contentDirectory" => "uf-content", "logFile" => null, "disableBrowserTrace" => false, "controllers" => CompileTimeClassList::get("null,true,ufront.web.Controller"), "apis" => CompileTimeClassList::get("null,true,ufront.api.UFApi"), "viewEngine" => new ufront_view_FileViewEngine(null, null, null), "sessionFactory" => ufront_web_session_FileSession::getFactory("sessions", null, 0), "requestMiddleware" => (new _hx_array(array($uploadMiddleware, $inlineSession))), "responseMiddleware" => (new _hx_array(array($inlineSession, $uploadMiddleware))), "errorHandlers" => (new _hx_array(array(new ufront_handler_ErrorPageHandler()))), "authFactory" => ufront_auth_YesBossAuthHandler::getFactory()));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'ufront.web.DefaultUfrontConfiguration'; }
}
