# MeMBook

***
A Symfony project created on November 4, 2016, 1:39 pm.

***

## Setting

1. Then pull the project on your system.
2. You have to install *_Composer_* on your system. [Composer Page](https://getcomposer.org/)
3. At the root directory's project where is your `composer.json` file, make a `composer install` command.
4. You have to install *_Postgresql_*. [Postgresql Page](https://www.postgresql.org/)
5. Don't forget to uncomment `extension=pdo.so` and `extension=php_pdo_pgsql.so` inside `php.ini`
6. Then you have to setting the `app/config/parameters.yml` to your Postgresql database.
7. And now setting the `app/config/config.yml` with the code below.
8. Then use `php bin/console doctrine:database:create`.
9. And `php bin/console doctrine:schema:create`
10. Then you can start the server with `php bin/console server:start`

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
