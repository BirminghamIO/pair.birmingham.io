**This project has been archived, and is no longer being actively developed.**

# Birmingham.IO Pair Programming

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/BirminghamIO/pair.birmingham.io?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

This repository is for the Birmingham.IO Pair Programming project. The project exists as a platform for programmers within the greater Birmingham area, to aid in their search for people to collaborate with.

## Setting up the Application on GitHub

In order for the site to let users login via GitHub, you have to create an application on GitHub for it to hook into.

To do this visit [Register new application](https://github.com/settings/applications/new) on GitHub and complete with the following settings:

- **Application name:** *whatever you want*
- **Homepage URL:** `http://pair.birmingham.io.192.168.10.10.xip.io/`
- **Application description:** *whatever you want*
- **Authorisation callback URL:** `http://pair.birmingham.io.192.168.10.10.xip.io/github/connect`

Once you've saved this, you'll be given a client ID and a client secret, make a note of these as you'll need them later.

## Running the site via Homestead

It is recommended that you use [Laravel Homestead](http://laravel.com/docs/4.2/homestead) for development, to ensure a level playing field, and eliminate phrases such as "it works on my machine". (If you've not already, install Homestead now).

To start with you need to clone this repo into an accessible directory on your computer, then update the `~/.homestead/Homestead.yaml` file with the relevant folder, site and database settings. It should look something like this:

```
folders:
    - map: ~/Workspace/pair.birmingham.io
      to: /home/vagrant/pair.birmingham.io

sites:
    - map: pair.birmingham.io.192.168.10.10.xip.io
      to: /home/vagrant/pair.birmingham.io/public

databases:
    - pair
```

(We're using [xip.io](http://xip.io/) for the site's url, to allow for URLs like: `pair.birmingham.io.192.168.10.10.xip.io` to be used with the minimum of fuss and without having to edit the hosts file.)

After starting Homestead and SSH'ing into the server, navigate to the `~/pair.birmingham.io` and run:
```bash
$ composer update
```
(If you aren't familiar with it, you can [learn more about Composer here](https://getcomposer.org/doc/00-intro.md).)

Once this is finished, make a copy of the `.env.local.php.sample` file named `.env.local.php` and update it with the relevent settings.

Run command:
```bash
$ php artisan migrate
```
and next:
```bash
$ php artisan db:seed
```

And that's it! Everything should working. Visit http://pair.birmingham.io.192.168.10.10.xip.io using your browser and marvel at what you've accomplished.

If you will have any problems, feel free to ask!
