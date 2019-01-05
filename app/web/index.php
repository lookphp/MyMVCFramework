<?php

//todo 判断PHP的版本是否合法

//todo 初始化系统市区

//加载路由
require '../../vendor/autoload.php';

$app = new Slim\App();

$app->get('/',function(){
    echo 'hello';
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->getBody()->write("Hello, " . $args['name']);
});

$app->run();
