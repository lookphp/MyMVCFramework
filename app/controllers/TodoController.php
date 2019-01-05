<?php
/**
 * Created by PhpStorm.
 * User: liuxingwang
 * Date: 2019/1/5
 * Time: 15:57
 */

namespace app\controllers;


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
}