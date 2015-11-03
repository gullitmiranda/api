# CONTRIBUTING

Contenttic and related modules (of which this is one) are open source and licensed
as [BSD-3-Clause](http://opensource.org/licenses/BSD-3-Clause). Contributions
are welcome in the form of issue reports and pull requests.

All pull requests should include unit tests when applicable, and should follow
our coding standards (more on these below); failure to do so may result in
rejection of the pull request.

## REPORTING POTENTIAL SECURITY ISSUES

If you have encountered a potential security vulnerability in any Contenttic
module, please report it to us at [leandrolugaresi92@gmail.com](mailto:leandrolugaresi92@gmail.com).
We will work with you to verify the vulnerability and patch it.

When reporting issues, please provide the following information:

- Module(s) affected
- A description indicating how to reproduce the issue
- A summary of the security vulnerability and impact

We request that you contact us via the email address above and give the project
contributors a chance to resolve the vulnerability and issue a new release prior
to any public exposure; this helps protect Contenttic users, and provides them
with a chance to upgrade and/or update in order to protect their applications.

## RUNNING TESTS

First, use [Composer](https://getcomposer.org) to install all dependencies:

```console
$ composer install
```

To run tests, use the PHPUnit executable installed by Composer:

```console
$ ./vendor/bin/phpunit
```

## CODING STANDARDS

While Contenttic uses Zend Framework 2 coding standards, in practice, we check
standards using [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) (which is
installed via Composer with other dependencies). To check for CS issues:

```console
$ ./vendor/bin/php-cs-fixer fix . --dry-run
```

This will report CS issues. Alternately, you can have the tool fix them for you
by omitting the `--dry-run` switch:

```console
$ ./vendor/bin/php-cs-fixer fix .
```
