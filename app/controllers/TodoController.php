<?php
/**
 * Created by PhpStorm.
 * User: liuxingwang
 * Date: 2019/1/5
 * Time: 15:57
 */

namespace app\controllers;

use Pheasant;
use app\models\TodoModel;

class TodoController extends BaseController
{
    public function index()
    {
        echo 'hello index';
    }

    public function create()
    {

    }

    public function edit($id)
    {
        echo $id;
    }

    public function delete($id)
    {
        echo $id;
    }

    public function init()
    {
        global $dsnconfig;
        Pheasant::setup($dsnconfig['dsn']);
        $migrator = new Pheasant\Migrate\Migrator();
        $migrator->initialize(TodoModel::schema(),'todo');
        echo 'migrator done !';
    }
}