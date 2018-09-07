<?php

if (!$_POST) {
    $_SESSION['flash']['danger'] = 'Veuillez compléter le formulaire';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

if (!isset($_POST['date']) || isset($_POST['date']) AND empty($_POST['date'])) {
    $_SESSION['flash']['danger'] = 'Veuillez saisir une date';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

if (!isset($_POST['optradio']) || isset($_POST['optradio']) AND empty($_POST['optradio'])) {
    $_SESSION['flash']['danger'] = 'Veuillez sélectionner le type de monture';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}


?>

<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Vue de la reprise</h1>

    <?php


    $jour = date('N', strtotime($_POST['date']));
    $tabJour = array(1 => "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    $jour = $tabJour[$jour];
    $j = $jour;
    $r = $_POST['optradio'];
    $_SESSION['d'] = $_POST['date'];

    $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", array($r, $j))->fetchAll();

    ?>
    <form action="<?= URL ?>moniteur/ajouter_reprise" method="post">
        <?php

        echo '<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
   <tr>
       <td>Jour</td>
       <td>Heure</td>
       <td>Cours</td>
       <td>Niveau</td>
       <td> </td>
   </tr>
  ';

        foreach ($rc as $item) {
            echo '<tr>
       <td><input class="input" name="jour" value="' . $item->jour . '" /></td>
       <td>' . $item->heure . '</td>
       <td><input readonly="readonly" class="input" name="codeT" value="' . $item->codeTypeMonture . '" /></td>
       <td><input readonly="readonly" class="input" name="lib" value="' . $item->libTypeReprise . '" /></td>
       <td><label readonly="readonly" class="checkbox-inline"><input type="radio" value="' . $item->numPlanning . '" name="optradio"></label></td>
</td>
   </tr>';
        }

        echo '</table>';
        ?>
        <hr>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Ajouter cavalier</button>
            </div>
        </div>
    </form>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

