This repository provides a basic Ufront project that can be used to test that ufront's HttpRequest and HttpResponse objects behave reliably across different platforms.  Once these are known to be working for a platform, all other tests can be set up to use mock request and response objects for easier testing.

### Current Status

__Supported Platforms__:

* Neko (mod_neko) ^1
* Neko (mod_tora) ^1
* Nekotools ^2 ^3
* PHP (apache) ^1

Known Issues:

1. `request.parseMultipart` is currently not supported.  Support will be added soon.
2. Nekotools sever does not support multipart handling, and we currently do not provide a fallback.
3. Nekotools server does not allow changing the "ContentType" header, charset encoding, or "Content-Length" headers for requests.

__Possible Future Platforms__:

* NodeJS
* Browser JS (emulate Http requests using Browser's pushstate functionality)

### Example usage

Set up the sites and run them

```
haxe requestresponsetester.hxml
cd out/neko_nocache/
nekotools server -rewrite
```

Run the tests:

```
haxe requestresponsetester.hxml
neko out/requestresponsetester.n http://localhost:2000/ out/neko_nocache/
```

### Example apache config

```
<VirtualHost uftest.dev:80>
	ServerAdmin webmaster@localhost

	DocumentRoot /home/user/workspace/ufront/platformtest/out/

	<Directory /home/user/workspace/ufront/platformtest/out/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log

	LogLevel warn
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Combined with the `.htaccess` files in the `out/` directories, this will enable you to test each of the apache-based platforms.

See `runscripts` for example usage with this setup.