package testsite;

import ufront.app.UfrontApplication;
import testsite.Routes;
import ufront.web.context.HttpContext;

class Server
{
	public static var ufrontApp:UfrontApplication;

	static function main() {
		#if (neko && cachemodule) neko.Web.cacheModule(run); #end
		run();
	}

	static function run() {
		if (ufrontApp==null) {
			ufrontApp = new UfrontApplication({
				indexController: Routes,
				logFile: 'log.txt',
				contentDirectory:'../uf-content/',
				basePath:
					#if (neko && cachemodule) "/neko_cache/"
					#elseif neko "/neko_nocache/"
					#elseif php "/php/"
					#elseif nodejs "/node/"
					#end 
			});
		}

		#if (neko || php)
			ufrontApp.execute( HttpContext.create() );
		#elseif nodejs
			ufrontApp.listen( 2987 );
		#end
	}
}