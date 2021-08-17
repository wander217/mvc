<?php

namespace MVC;

use MVC\Request;
use MVC\Router;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        //Lấy url
        $this->request = new Request();
        //Chuyển url thành đối tượng request
        Router::parse($this->request->url, $this->request);

        //Load controller tương ứng với url
        $controller = $this->loadController();

        //Gọi hàm có tên lưu trong action tương ứng với controller
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";

        //Trả về controller đúng định dạng namespace của psr-4
        //(MVC\Controller\AbcController)
        $controller = "MVC\Controllers\\" . ucfirst($name);
        return new $controller;
    }
}