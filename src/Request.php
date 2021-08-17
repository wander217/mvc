<?php

namespace MVC;

class Request
{
    public $url;

    public function __construct()
    {
        //Lưu request
        $this->url = $_SERVER['REQUEST_URI'];
    }
}