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

//配置路由，将用户在浏览器请求的地址，转化为用户请求的控制器和方法
$app->map(['GET','POST'],'/{controller}/{action}',function($request,$response,$args){
    //var_export($args);  /*array ( 'controller' => 'todo', 'action' => 'index', )*/

    $controllerClass = '\app\controllers\\' . ucfirst($args['controller']) . 'Controller';
    $action = $args['action'];

    if(!class_exists($controllerClass))
    {
        exit($controllerClass . ' Class not found !');
    }

    if(!method_exists($controllerClass,$action))
    {
        exit($action . ' Method not found !');
    }
    else
    {
        $controller = new $controllerClass();   //new某一个控制器的类
        $controller->$action();                 //访问控制器类下的某一个方法
    }
});

$app->run();
