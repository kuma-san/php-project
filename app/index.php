<?php
require 'vendor/autoload.php';
include_once 'conf/config.php';
include_once 'conf/orm.php';

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');
$app->response->header('Access-Control-Allow-Origin', '*');
$app->config(array(
   'debug' =>  true,
   'templates.path' => './templates'
));

$app->notFound(function () use ($app) {
    $app->render('404.html');
});

$app->error(function (\Exception $e) use ($app) {
    $app->render('500.html');
});

include_once 'model/ticket.php';
include_once 'model/push.php';
include_once 'model/user.php';
include_once 'model/analysis.php';
include_once 'model/boot.php';
include_once 'model/email.php';
include_once 'model/message.php';

/*
$app->options('/:path+', function() use ($app) {
});
*/

$app->get('/', function() use ($app) {
   $app->halt(200, 'yes, you are at root');
});

$app->get('/api/v1/', function() use ($app) {
   $app->halt(200, "yes, you are at api v1 root");
});

$app->get('/path/phpinfo', function () use ($app){
        phpinfo();
        exit;
});

$app->run();
