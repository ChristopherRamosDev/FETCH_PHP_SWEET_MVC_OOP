<?php

function autoload($classname){
    require_once 'Controller/' . $classname . 'Controller.php';
}

spl_autoload_register('autoload');