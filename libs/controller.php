<?php

class Controller
{
    public $view;

    function __construct()
    {
        /* echo "ola desde controller"; */
         $this->view = new View(); 
    }

    function loadModel($model)
    {

        /*  $url =  'Model/' . $model . 'Model.php';
        if (file_exists($url)) {
            require_once $url;
             esto quiere decir que lo que le pase como $model . 'Model'; 
            sera la clase a la que accedere
            $modelName = $model . 'Model';
            $this->model = new $modelName;
           
        } */
    }
}
