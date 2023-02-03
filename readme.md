# Simplest setup to get started with PHP and PDO

### Installation

1. Install PHP
2. Install sqlite3 (probably already installed)
3. Install PDO Sqlite extension for you php version

### Web server

PHP has a built-in web server. 
```
php -S localhost:8080
```
will serve the current directory on that url.

#### Other web root directory

```
php -S localhost:8080 -t public
```

#### URL rewriting

For rewrite rules, you can point the command to a specific router file:
```
php -S localhost:8080 -t public router.php
```

This router.php is found at the php.net website:
```
<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    include __DIR__ . '/index.php';
}
```
