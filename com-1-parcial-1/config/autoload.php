<?php

namespace Config;
spl_autoload_register(function($classPath)
{
    $class = dirname(__DIR__) ."/" . str_replace("\\", "/", $classPath)  . ".php";
    
    require_once($class);
});