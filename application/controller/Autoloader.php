<?php

/**
 * Class Autoloader pour charger toutes les classes
 */
class Autoloader{

    static function load(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){
        require 'class/' . $class . '.php';
    }

}
