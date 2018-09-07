<?php

class Str{

    static function random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    static function println($str){
      print($str);
      print("<br />");
    }

    static function vds(){
      var_dump($_SESSION);
    }

    static function vdg(){
      var_dump($_GET);
    }

    static function vdp(){
      var_dump($_POST);
    }

}
