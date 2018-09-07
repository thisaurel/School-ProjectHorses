<?php

$get = htmlspecialchars($_GET['id']);

$req = $db->query('SELECT * FROM monture WHERE numMonture = ?', [$get])->fetchAll();

?>
<div class="container is-fullhd">
  <?php Session::displayFlash(); ?>
  <h1 class="title is-1">Informations sur la monture</h1>

  <?php

  foreach($req as $c):

  $cvl = $db->query('SELECT numCavalier, nomCavalier, prenomCavalier FROM cavalier WHERE numCavalier = ?', [$c->numCavalier])->fetchAll();

    $txt = "Cette monture appartient au centre équestre";
    foreach ($cvl as $key) {
      if(!empty($key->prenomCavalier)):
        $txt = "Propriétaire: " . $key->nomCavalier . " " . $key->prenomCavalier;
      else:
        $txt = "Cette monture appartient au centre équestre";
      endif;
    }

if($c->sexe == 'F'):
  $sxe = "Femelle";
else:
  $sxe = "Mâle";
endif;

  echo '

  <div class="card" style="width: 400px;">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="'.URL.'pic/'.$c->photoMonture.'" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p style="overflow-y: hidden;" class="title is-4">'.$c->nomMonture.'</p>
      </div>
    </div>

    <div class="content">
      Sexe : '. $sxe .'<br />
      Poids : '.$c->poids.' kg<br />
      Taille : '.$c->taille.' cm<br />
      Race : '.$c->race.'<br />
      Robe : '.$c->robe.'<br />
    </div>
  </div>
</div>

<div class="card" style="width: 400px;">
<div class="card-content">
  <div class="content">
  '.$txt.'
  </div>
</div>
</div>

  ';
  endforeach;

  ?>

  <hr>
</div>
