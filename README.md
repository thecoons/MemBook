# MeMBook

***
A **Symfony** project created on *November 4, 2016, 1:39 pm*.
## BARTHELEMY Antonin
## CHOQUET Brett

***

## Setting

1. Pull the project on your system.
2. You have to install *_Composer_* on your system. [Composer Page](https://getcomposer.org/).
3. Install *_php-xml_* on your system.
4. You have to install *_Postgresql_*. [Postgresql Page](https://www.postgresql.org/). You should be able to login and create a database.
5. Install (*_php-pgsql_*) on your system.
5. At the root directory, where is your `composer.json` file, make a `composer install` command.
6. Don't forget to uncomment `extension=pdo.so` and `extension=php_pdo_pgsql.so` inside `php.ini`
7. Then you have to setting the `app/config/parameters.yml` to your Postgresql database.
8. And now edit the `app/config/config.yml` with the code below.
9. Then use `php bin/console doctrine:database:create`.
10. And `php bin/console doctrine:schema:create`
11. Then you can start the server with `php bin/console server:start`

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
