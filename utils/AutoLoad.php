<?php

spl_autoload_register(function ($class) {

    $rootDir = str_replace('/', DIRECTORY_SEPARATOR,  __DIR__ . "/../");

    $file = "$rootDir$class.php";

    if (file_exists($file)) {
        require_once $file;
    } else {

        echo "error file not exist @autoLoad <br>";
        echo "path:$file";
        die();
    }
});
