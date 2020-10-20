<?php

namespace app;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Events\StatementPrepared;

class Init
{
    protected $controller;
    protected $action;
    protected $route;

    public function run()
    {
        $this->dispatchRoute();
        if (Auth::verify($this->route)) {
            $this->loadOrm();
            $this->sendRequest();
        } else {
            echo json(['code' => 0, 'msg' => "55m76ZmG5ZCO5YaN5pON5L2c"]);
        }
    }

    public function loadOrm()
    {
        global $_G;
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $_G['config']['db'][1]['dbhost'],
            'database' => $_G['config']['db'][1]['dbname'],
            'username' => $_G['config']['db'][1]['dbuser'],
            'password' => $_G['config']['db'][1]['dbpw'],
            'charset' => $_G['config']['db'][1]['dbcharset'],
            'prefix' => $_G['config']['db'][1]['tablepre'],
        ]);
        $event = new Dispatcher(new Container);
        $capsule->setEventDispatcher($event);
        $capsule->setAsGlobal();
        //$capsule->bootEloquent();
        $event->listen(StatementPrepared::class, function ($event) {
            $event->statement->setFetchMode(\PDO::FETCH_ASSOC);
        });
    }

    public function dispatchRoute()
    {
        $pathInfo = param('s') ?: 'Index/index';
        $path = ltrim($pathInfo, '/');
        $path = explode('/', strtolower($path));
        $path = array_merge($path, array('', ''));
        $this->controller = $path[0] != '' ? ucfirst($path[0]) : 'Index';
        $this->action = $path[1] != '' ? $path[1] : 'index';
        $this->route = $this->controller . '.' . $this->action;
    }

    public function sendRequest()
    {
        $mod = $_GET['mod'] ?: 'app';
        if (!file_exists(APP_PATH . '/api/' . $mod)) {
            $mod = 'app';
        }
        if ($mod == 'app') {
            if (!file_exists(APP_PATH . '/app/controller/' . $this->controller . '.php')) {
                echo tpl_msg('now') . $this->controller . tpl_msg('noin');
                return;
            }
            $namespace = 'app\\controller\\' . $this->controller;
        } else {
            if (!file_exists(APP_PATH . '/api/' . $mod . '/controller/' . $this->controller . '.php')) {
                echo tpl_msg('now') . $this->controller . tpl_msg('noin');
                return;
            }
            $namespace = 'api\\' . $mod . '\\controller\\' . $this->controller;
        }
        $controller = new $namespace();
        $action = $this->action;
        if (!method_exists($controller, $action)) {
            echo tpl_msg('now') . $this->controller . '>' . $this->action . tpl_msg('noin');
            return;
        }
        $ret = $controller->$action();
        echo $ret ?: '';
    }
}
