Contenttic CMS API
==============================

One API-first content management system for static site generators

Core ideas
----------
### API-first

This enables developers to manage content with code via an API and makes it possible for non-technical writers to manage content with an [web app](https://github.com/contenttic/editor).

### Free content

We don't take your data and lock it up, you put it in one Storage Provider so you have access to it anytime, anywhere.
We will support:
- Github
- Bitbucket
- Dropbox
- Copy
- AWS-S3

### Content for Static Site Generators

We will save and get the data using adapters for this Site Generators:

- Jekkyl
- Hugo

To support another static site generator you just have to provide one adapter following the interfaces.

Requirements
------------

Please see the [composer.json](composer.json) file.

Installation
------------

### Via Git (clone)

First, clone the repository:

```bash
git clone https://github.com/contenttic/api.git # optionally, specify the directory in which to clone
cd path/to/install
```

At this point, you need to use [Composer](https://getcomposer.org/) to install
dependencies. Assuming you already have Composer:

```bash
composer.phar install
```

### All methods

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points the DocumentRoot to the
  `public/` directory of the project
- Fire up the built-in web server in PHP (5.4.8+) (**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
cd path/to/install
php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
```

### NOTE ABOUT USING APACHE

Apache forbids the character sequences `%2F` and `%5C` in URI paths. However, the Apigility Admin
API uses these characters for a number of service endpoints. As such, if you wish to use the
Admin UI and/or Admin API with Apache, you will need to configure your Apache vhost/project to
allow encoded slashes:

```apache
AllowEncodedSlashes On
```

This change will need to be made in your server's vhost file (it cannot be added to `.htaccess`).

### NOTE ABOUT DISPLAY_ERRORS

The `display_errors` `php.ini` setting is useful in development to understand what warnings,
notices, and error conditions are affecting your application. However, they cause problems for APIs:
APIs are typically a specific serialization format, and error reporting is usually in either plain
text, or, with extensions like XDebug, in HTML. This breaks the response payload, making it unusable
by clients.

For this reason, we recommend disabling `display_errors` when using the Apigility admin interface.
This can be done using the `-ddisplay_errors=0` flag when using the built-in PHP web server, or you
can set it in your virtual host or server definition. If you disable it, make sure you have
reasonable error log settings in place. For the built-in PHP web server, errors will be reported in
the console itself; otherwise, ensure you have an error log file specified in your configuration.

`display_errors` should *never* be enabled in production, regardless.


### AZK

If you develop or deploy using [azk app](http://www.azk.io/), we provide the azkfile.js and the `Run project` button to quickly and safely run the project on your local machine.

### Docker

If you develop or deploy using Docker, we provide both development and production configuration for
you.

#### Development

Prepare your development environment using [docker compose](https://docs.docker.com/compose/install/):
```bash
cd api

docker-compose build
```

Start the development environment:
```bash
docker-compose up
```
Access your editor from `http://localhost:8080/` or `http://<boot2docker ip>:8080/` if on Windows or Mac.

#### Production

Use the included [Dockerfile](https://docs.docker.com/reference/builder/) to build an [Apache](http://httpd.apache.org/) container:
```bash
docker build -t apighost .
```

Test your container:
```bash
docker run -it -p "80:80" apighost
```
