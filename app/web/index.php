<?php

//todo 判断PHP的版本是否合法

//todo 初始化系统市区

//加载路由
require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

//配置路由，将用户在浏览器请求的地址，转化为用户请求的控制器和方法
$app->map(['GET','POST'],'/{controller}/{action}/{params:.*}',function($request,$response,$args){
//    var_export($args);  /*array ( 'controller' => 'todo', 'action' => 'index', )*/
    runAction($args);
});

$app->map(['GET','POST'],'/{controller}/{action}',function($request,$response,$args){
    runAction($args);
});

$app->run();


function runAction($args)
{
    $controllerClass = '\app\controllers\\' . ucfirst($args['controller']) . 'Controller';
    $action = $args['action'];
    $params = isset($args['params']) ? explode('/',$args['params']) : [];

    if(!class_exists($controllerClass))
    {
        exit($controllerClass . ' Class not found !');
    }

    if(!method_exists($controllerClass,$action))
    {
        exit($action . ' Method not found !');
    }

    $controller = new $controllerClass();   //new某一个控制器的类
    if(isset($params))
    {
        $controller->$action(...$params);   //访问控制器类下的某一个带参数的方法
    }
    else
    {
        $controller->$action();  //访问控制器类下的某一个不带参数的方法
    }
}
