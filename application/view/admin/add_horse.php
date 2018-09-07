  <?php

if($_POST){

  if(isset($_POST['name'], $_POST['sexe'], $_POST['poids'], $_POST['taille'], $_POST['fonction'], $_POST['photo'], $_POST['type'], $_POST['race'])){

    if(!empty($_POST['name']) && !empty($_POST['sexe']) && !empty($_POST['poids']) && !empty($_POST['taille']) && !empty($_POST['fonction']) && !empty($_POST['photo']) && !empty($_POST['type']) && !empty($_POST['race'])){

  Str::vdp();

  $name = htmlspecialchars($_POST['name']);
  $sexe = htmlspecialchars($_POST['sexe']);
  $poids = htmlspecialchars($_POST['poids']);
  $taille = htmlspecialchars($_POST['taille']);
  $race = htmlspecialchars($_POST['race']);
  $robe = htmlspecialchars($_POST['fonction']);
  $photo = htmlspecialchars($_POST['photo']);
  $type = htmlspecialchars($_POST['type']);



  $req = $db->query('INSERT INTO monture(nomMonture, sexe, poids, taille, race, robe, photoMonture, codeTypeMonture)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
  [$name, $sexe, $poids, $taille, $race, $robe, $photo, $type]);

  $_SESSION['flash']['success'] = "Le cheval a été ajouté";
  header('Location: '. $_SERVER['HTTP_REFERER']);


} else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x01";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}

  }else {
    $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x02";
    header('Location: '. $_SERVER['HTTP_REFERER']);
  }

}else {
  $_SESSION['flash']['danger'] = "Veuillez compléter tous les champs 0x02";
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
