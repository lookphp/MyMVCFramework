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
        $model->title = $_POST['title'];
        $model->status = false;
        $result = $model->save();
        if($result){
            return $this->redirect('todo/index');
        }
    }

    public function edit($id)
    {
        $model = Todo::byId($id);
        $model->status = true;
        $result = $model->save();
        if($result){
            return $this->redirect('todo/index');
        }
    }

    public function delete($id)
    {
        $model = Todo::byId($id);
        $result = $model->delete($id);
        if($result){
            return $this->redirect('todo/index');
        }
    }

    public function init()
    {
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(Todo::schema(),'todo');
        echo 'migrator done !';
    }
}