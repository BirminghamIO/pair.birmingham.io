## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

# Birmingham.IO Pair Programming

Birmingham.IO Pair Programming is an open source project for programmer from Birmingham, which looking for someone to cooperation.

## Run project on your local environment

if you wanna take a part in this project, you'll need to do some steps at the begining:

1. Clone repository to your computer with Git.

2. Run command:
```bash
$ composer update
```
in project directory to install required libraries. If you aren't familiar with composer you cen meet it [here](https://getcomposer.org/doc/00-intro.md).

3. Create virtual host called 'pair-programming.loc' for project-directory/public folder. It's required to working with official Pari Programming OAuth authorisation keys.

4. Edit local.env file and set your MySQL username, password and table. Next ask admin for keys to OAuth API and set it too.

5. Run command:
```bash
$ php artisan migrate
```
and next:
```bash
$ php artisan db:seed
```
in project directory.

That's it! Everything should working well. If you will have any problems, just let us know on [this forum](https://talk.birmingham.io/t/birmingham-io-hosted-pair-programming-page/257/26).