<?php

// Example of what your Autoloader might need to look like
class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
            $file = __DIR__ . '/../../' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
            return false;
        });
    }
}