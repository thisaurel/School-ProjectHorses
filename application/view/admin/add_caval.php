<?php

if($_POST){

if(isset($_POST['fname'], $_POST['lname'], $_POST['reprise'], $_POST['ticket'], $_POST['type'])){

  Str::vdp();

if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['type'])){


  $fname = htmlspecialchars($_POST['fname']);
  $lname = strtoupper(htmlspecialchars($_POST['lname']));
  $reprise = htmlspecialchars($_POST['reprise']);
  $ticket = htmlspecialchars($_POST['ticket']);
  $type = htmlspecialchars($_POST['type']);


  if($reprise == ""){
    $reprise = NULL;
  }

  $req = $db->query('INSERT INTO cavalier(nomCavalier, prenomCavalier, optionReprise, nbtickets, codeTypeMonture)
  VALUES (?, ?, ?, ?, ?)',
  [$lname, $fname, $reprise, $ticket, $type]);


$_SESSION['flash']['success'] = "Le cavalier a été ajouté";
header('Location: '. $_SERVER['HTTP_REFERER']);


} else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x01";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}

} else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x02";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}


}else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x03";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
