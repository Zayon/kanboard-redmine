# kanboard-redmine
Import Redmine issues in Kanboard

Author
------

- Pablo Godinez

License
-------

- MIT

Requirements
------------

- Kanboard >= 1.0.37

Installation
------------

- Clone this repository into the folder `plugins/Redmine`
- run `composer install` inside `plugins/Redmine` folder

Note: Plugin folder is case-sensitive.


Configuration
-------------

Configure Redmine URL in Config Integrations (?controller=ConfigController&action=integrations)

Then, each member has to add his own API key in his profile

Usage
-----

To import a new Redmine Issue, you have to select the external task provider first.
When you create a new task, on the right, select the external provider.

Then you only need to provide issue number (with or without '#')

Use of Makefile (for devs only)
----------------------
```
make build #build locally
make run   #run locally, you will be prompted for a local port
make logs  #get the logs from the running container
make enter #enter the running container
make clean #kill and remove the running container when you are through testing
```
