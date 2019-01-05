<?php
/**
 * Created by PhpStorm.
 * User: liuxingwang
 * Date: 2019/1/5
 * Time: 15:57
 */

namespace app\controllers;

use Pheasant;

class BaseController
{
    private $config;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();
    }

    private function loadConfig()
    {
        $this->config = require '../config/base.php';
    }

    private function initDb()
    {
        Pheasant::setup($this->config['dsn']);
    }
}