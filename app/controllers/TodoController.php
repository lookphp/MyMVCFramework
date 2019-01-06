<?php
/**
 * Created by PhpStorm.
 * User: liuxingwang
 * Date: 2019/1/5
 * Time: 15:57
 */

namespace app\controllers;

use app\models\Todo;

class TodoController extends BaseController
{
    public function index()
    {
        $model = Todo::all();
        $this->render('todo/index',['todos'=>$model]);
    }

    public function create()
    {
        $model = new Todo();
        $model->title = '第三条todo';
        $model->status = 0;
        $result = $model->save();
        if($result){
            echo 'saved successfully';
        }
    }

    public function edit($id)
    {
        $model = Todo::byId($id);
        $model->title = '第一条todo被edit修改了';
        $result = $model->save();
        if($result){
            echo 'edit successfully';
        }
    }

    public function delete($id)
    {
        $model = Todo::byId($id);
        $result = $model->delete($id);
        if($result){
            echo 'delete successfully';
        }
    }

    public function init()
    {
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(Todo::schema(),'todo');
        echo 'migrator done !';
    }
}