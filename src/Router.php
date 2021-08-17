<?php

namespace MVC;

class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url === '/mvc/')
        {
            $request->controller = 'tasks';
            $request->action = 'index';
            $request->params = [];
        }
        else
        {
            //Cắt url thành các phần nhỏ url /root/controller/action/params
            // -> [url,root,controller,action,params]
            $explode_url = explode('/',$url);
            //Lấy phần tử [controller,action,params]
            $explode_url = array_slice($explode_url,2);
            //Do controller phải bắt đầu bằng chữ hoa, các chữ còn lại thường nên validate
            $request->controller = ucfirst(strtolower($explode_url[0]));
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url,2);
        }
    }
}