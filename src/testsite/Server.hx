package testsite;

import ufront.app.UfrontApplication;
import testsite.Routes;

class Server 
{
	public static var ufrontApp:UfrontApplication;

	static function main() {
		#if (neko && cachemodule) neko.Web.cacheModule(run); #end

		run();
	}

	static var _inited:Bool;
	static function run() {
		if (!_inited) {

			// Set up the dispatcher and routing
			ufrontApp = new UfrontApplication({
				indexController: Routes,
				logFile: 'log.txt',
				basePath:
					#if (neko && cachemodule) "/neko_cache/"
					#elseif neko "/neko_nocache/"
					#elseif php "/php/"
					#end 
			});
			
			_inited = true;
		}
		ufrontApp.execute();
	}
}