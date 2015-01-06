# Birmingham.IO Pair Programming

This repository is for the Birmingham.IO Pair Programming project. The project exists as a platform for programmers within the greater Birmingham area, to aid in their search for people to collaborate with.

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

Once this is finished, make a copy of the `.env.local.php.sample` file named `.env.local.php` and update it with the relevent settings (If you're a member of [Team Pair on GitHub](https://github.com/orgs/BirminghamIO/teams/team-pair), you can use the tokens listed as Homestead.)

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
