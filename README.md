This repository provides a basic Ufront project that can be used to test that ufront's HttpRequest and HttpResponse objects behave reliable across different platforms.  Once these are known to be working for a platform, all other tests can be set up to use mock request and response objects for easier testing.

### Current Status

Supported:


Needs Testing:

* Neko (nekotools server)
* Neko (mod_neko)
* Neko (mod_tora)
* PHP (apache)

Support Planned:

* NodeJS
* Browser JS (emulate Http requests using Browser's pushstate functionality)