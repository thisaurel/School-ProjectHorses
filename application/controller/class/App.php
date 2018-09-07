<?php
class App{

    static $db = null;

    static function getDatabase(){
        if(!self::$db){
            self::$db = new Database('root', '', 'equestre_richeaurelien'); //nom_d_utilisateur, mot_de_passe, nom_de_la_base
        }
        return self::$db;
    }

}
