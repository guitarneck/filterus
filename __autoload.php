<?php
spl_autoload_register(function ($name) {
    if ( strpos($name,'Filterus') !== false ) 
    {
        $path = __DIR__ . str_replace('Filterus','/lib/Filterus',$name) .'.php';
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        include $path;
    }
});