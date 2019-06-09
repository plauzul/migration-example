<?php
// Environments
putenv("DB_HOST=localhost");
putenv("DB_USERNAME=root");
putenv("DB_PASSWORD=");
putenv("DB_NAME=slim_test");
putenv("DB_CHARSET=utf8");
putenv("DB_DRIVER=Pdo_Mysql");
putenv("JWT_SECRET=5cfca96bee623");

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/../src/dependencies.php';
$dependencies($app);

// Register middleware
$middleware = require __DIR__ . '/../src/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

Zend_Db_Table::setDefaultAdapter($app->getContainer()['db']);

// Run app
$app->run();
