<?php

class ufront_core_AsyncCompletion extends Enum {
	public static $Aborted;
	public static $Completed;
	public static function Error($e) { return new ufront_core_AsyncCompletion("Error", 1, array($e)); }
	public static $__constructors = array(2 => 'Aborted', 0 => 'Completed', 1 => 'Error');
	}
ufront_core_AsyncCompletion::$Aborted = new ufront_core_AsyncCompletion("Aborted", 2);
ufront_core_AsyncCompletion::$Completed = new ufront_core_AsyncCompletion("Completed", 0);
