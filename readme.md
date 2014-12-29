# Birmingham.IO Pair Programming

Birmingham.IO Pair Programming is a project of platform for programmers from Birmingham, which are looking for someone to cooperation.

## Run project on your local environment

if you wanna take a part in this project, you'll need to do some steps at the begining:

Clone repository to your computer.

Open terminal, go to project directory and run:
```bash
$ composer update
```
If you aren't familiar with Composer you can meet it [here](https://getcomposer.org/doc/00-intro.md).

Create virtual host called `pair-programming.loc` for projects `/public` folder. It's required to working with official Pair Programming OAuth authorisation keys.

Create `.env.local.php` file within the project root and paste there: 
```php
<?php

return array(
    'MYSQL_USERNAME' => '',
    'MYSQL_PASSWORD' => '',
    'OAUTH_GITHUB_CLIENT_ID' => '',
    'OAUTH_GITHUB_CLIENT_SECRET' => '',
);
```
Set your MySQL settings and next ask us for keys to OAuth API.

Create MySQL database named `pair-programming`.

Run command:
```bash
$ php artisan migrate
```
and next:
```bash
$ php artisan db:seed
```

That's it! Everything should working well. If you will have any problems, feel free to ask!