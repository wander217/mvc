<?php

namespace MVC\Core;

class Controller
{
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        //Nối mảng d với var
        $this->vars = array_merge($this->vars, $d);
    }

    //Load view
    function render($filename)
    {
        extract($this->vars);
        ob_start();
        $class_name = str_replace('MVC\Controllers', '', get_class($this));
        $view_folder = str_replace('Controller', '', $class_name);
        $view_folder =  str_replace("\\","",$view_folder);
        require(BASE_PATH . "/src/Views/" . $view_folder . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(BASE_PATH . "src/Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }

}