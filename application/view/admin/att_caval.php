<?php

if(isset($_POST['horse'], $_POST['cavalier'])){
  if(!empty($_POST['horse']) && !empty($_POST['cavalier'])){

    $h = htmlspecialchars($_POST['horse']);
    $c = htmlspecialchars($_POST['cavalier']);

    $hh = $db->query('SELECT * FROM monture WHERE numMonture = ?', [$h])->fetchAll();

    foreach ($hh as $key) {
      $codeh = $key->codeTypeMonture;
    }

    $cc = $db->query('SELECT * FROM cavalier WHERE numCavalier = ?', [$c])->fetchAll();

    foreach ($cc as $key) {
      $codec = $key->codeTypeMonture;
    }

    if($codec != $codeh){

      $_SESSION['flash']['danger'] = "Ce cavalier ne peut prendre une monture dont il n'a pas le droit";
      header('Location: '. $_SERVER['HTTP_REFERER']);

    } else {

      $req = $db->query('UPDATE monture SET numCavalier = ? WHERE numMonture = ?', [$c, $h]);
      $_SESSION['flash']['success'] = "Le cheval a été attribué";
      header('Location: '. $_SERVER['HTTP_REFERER']);

    }


  } else {
    $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs";
    header('Location: '. $_SERVER['HTTP_REFERER']);
  }

} else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
