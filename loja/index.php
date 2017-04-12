<?php

require_once 'vendor/autoload.php';
/*
  use \Slim\Slim;
  $app = new Slim();
 */
$app = new \Slim\Slim();

$app->get('/', function() {
    require_once 'view/index.php';
});

$app->get('/videos', function() {
    require_once 'view/videos.php';
});

$app->get('/shop', function() {
    require_once 'view/shop.php';
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});

$app->run();