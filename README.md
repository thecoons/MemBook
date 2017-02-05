# MeMBook

***
A **Symfony** project created on *November 4, 2016, 1:39 pm*.
## BARTHELEMY Antonin
## CHOQUET Brett
## Du Yu

***

## Installation

1. Pull the project on your system.
2. You have to install *_Composer_* on your system. [Composer Page](https://getcomposer.org/).
3. Install *_php-xml_* on your system.
4. You have to install *_Postgresql_*. [Postgresql Page](https://www.postgresql.org/). You should be able to login and create a manage databases.
5. Install (*_php-pgsql_*) on your system.
6. At the root directory, where is your `composer.json` file, make a `composer install` command.
7. Don't forget to uncomment `extension=pdo.so` and `extension=php_pdo_pgsql.so` inside `php.ini`
8. Then you have to setting the `app/config/parameters.yml` to your Postgresql database.
9. And now edit the `app/config/config.yml` with the code below.

### From demo database
10. Use `php bin/console doctrine:database:create`.
11. Use the `membook.dump` file to import a sample demonstration database, with `psql symfony_membook < membook.dump `. More instructions [here](https://www.postgresql.org/docs/9.1/static/backup-dump.html).
12. Then you can start the server with `php bin/console server:start`
13. Create a new user from the website and start using it.

### With empty database
10. Use `php bin/console doctrine:database:create`.
11. Use `php bin/console doctrine:schema:update --force`
12. Then you can start the server with `php bin/console server:start`
13. Create a new user from the website and start using it.

```yaml
#app/config/parameters.yml
parameters:
    database_host: 127.0.0.1
    database_port: 5432
    database_name: symfony_membook
    database_user: your_user_name
    database_password: your_db_password

```

```yaml
# app/config/config.yml
# Doctrine Configuration
doctrine:
    dbal:
        driver:   pdo_pgsql
        host:     "%database_host%"
        port:     "%database_port%"
        dbname:   "%database_name%"
        user:     "%database_user%"
        password: "%database_password%"
        charset:  UTF8
```

## Utilisation
You need to register to be able to log in.
Once registered, you will me logged in and you will be able to click on the menu (next to logo website) add start adding memes.
You can also look at your memes with your meme book.

