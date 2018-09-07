<div class="container is-fullhd">
  <?php Session::displayFlash(); ?>
  <h1 class="title is-1">Liste des chevaux</h1>

  <?php

  $req = $db->query('SELECT * FROM monture WHERE codeTypeMonture = ?', ["C"])->fetchAll();

  foreach($req as $c):

  echo '

  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="'.URL.'pic/'.$c->photoMonture.'">
      </p>
    </figure>
    <div class="media-content">
      <div class="content">
        <a href="'.URL.'horse/info?id='.$c->numMonture.'"<p>
          <strong>'.$c->nomMonture.'</strong>
          </p></a>
      </div>
    </div>
  </article>

  ';
  endforeach;

  ?>




  <hr>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
