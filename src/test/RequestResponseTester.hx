package test;

import sys.FileSystem;
import utest.Runner;
import utest.ui.Report;
using haxe.io.Path;

class RequestResponseTester {
	static function main() {
		runTests();
	}

	static function runTests() {
		var runner = new Runner();

		var args = Sys.args();
		var url = args[0];
		var scriptDir = args[1];

		var regex = ~/^(https?):\/\/([a-z0-9\.]+)(:[0-9]+)?(\/[a-z0-9_\/]*)$/;
		if ( args.length==2 && regex.match(url) ) {

			var protocol = regex.matched(1);
			var domain = regex.matched(2);
			var portStr = regex.matched(3);
			var dir = regex.matched(4).removeTrailingSlash();

			if ( portStr==null ) portStr = "";
			scriptDir = FileSystem.fullPath( scriptDir );

			var responseTest = new RequestResponseTest(protocol, domain, portStr, dir, scriptDir);
			runner.addCase( responseTest );

			Report.create(runner);
			runner.run();
		}
		else {
			Sys.println( "Usage: neko requestresponsetester.n http://localhost:2000/ufrontsite/ /home/user/ufrontsite/out/" );
		}
	}
}