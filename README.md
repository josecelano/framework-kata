# Framework kata

## Goal

1. Build a framework from scratch. A DDD friendly framework.
2. Have a skeleton framework for web app katas that requires no third-party packages.
3. Proof of concept for PHP components like JS components (React & Vue).

Regarding goal 3, I have always wondered why frontend template libraries have evolved to use classes and backend template libraries (at least in PHP) continue using plan php files (directly PHP or compiled templates).

I think I could be useful to have classes because we could:
* Test templates easily.
* Identify easily template data dependencies.
* Avoid runtime errors when templates receive wrong data types.
* Increase templates re-usability. You can use your components with different frameworks.
* Increase usability. Templates could load their data, avoiding controller bottleneck.

There are some frameworks (like Laravel) that have "view composers" but I think there are not reusable for different projects and there are no easy to use. And they do not allow to pass data from the view to the class, I mean the component class can not receive data from the parent template.

## Install

```
git@github.com:josecelano/framework-kata.git
cd framework-kata
mysql -h "localhost" -u "root" "-pXXXXXXXX" < database/database.sql
composer install
```

* Initialize your database setting in file: `./app/database.php`

## Run

Server:

```
cd public
php -S localhost:8000 server.php
```

Unit tests:

```
composer run test
```

Acceptance tests:  
```
composer run acceptance
```

## Console commands

Create user:
```
php -f ./app/console.php create-user "username" "email" "passwrod"
php -f ./app/console.php create-user "josecelano" "josecelano@gmail.com" "1234"
```

## TODO

* Testing.
* Use decorator pattern instead of inheritance for components that extend other components (A, Alert, Page, ...)