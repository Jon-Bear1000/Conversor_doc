<?php

    spl_autoload_register(function($class){
        require_once $_SERVER['DOCUMENT_ROOT'] .'/conversor_doc/class/'. $class .'.php'; 
    });
    
?>