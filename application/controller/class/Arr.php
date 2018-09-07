<?php

class Arr{

  static function readArr($array = [], $type = NULL){
    if($type != NULL):
      foreach ($array as $key):
        print($key->$type);
      endforeach;
    else:
      foreach ($array as $key):
        print($key);
      endforeach;
    endif;
  }

  static function stockArrInVar($array = [], $type = NULL){
    if($type != NULL):
      foreach ($array as $key):
        return $key->$type;
      endforeach;
    else:
      foreach ($array as $key):
        return $key;
      endforeach;
    endif;
  }

}
