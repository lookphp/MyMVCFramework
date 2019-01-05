<?php

//todo 判断PHP的版本是否合法

//todo 初始化系统市区

//加载路由
require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'user';
$config['db']['pass']   = 'password';
$config['db']['dbname'] = 'exampleapp';

$app = new \Slim\App(['settings' => $config]);

$app->get('/',function(){
    echo 'hello';
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->getBody()->write("Hello, " . $args['name']);
});

$app->get('/todo/index',function($request,$response,$args){
    $todo = new \app\controllers\TodoController();
    $todo->index();
});

$app->run();
