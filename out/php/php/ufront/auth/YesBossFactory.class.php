<?php

class ufront_auth_YesBossFactory implements ufront_auth_UFAuthFactory{
	public function __construct() { 
	}
	public function create($context) {
		return new ufront_auth_YesBossAuthHandler();
	}
	function __toString() { return 'ufront.auth.YesBossFactory'; }
}
