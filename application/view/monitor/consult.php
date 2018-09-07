<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Consulter les reprises</h1>
    <form action="" method="get">
        <div class="columns">
            <div class="column">
                <input class="input" name="d1" type="date"
                       value="<?php if (isset($_GET['d1']) AND !empty($_GET['d1'])) {
                           if (isset($_GET['d2']) AND !empty($_GET['d2'])) {
                               echo $_GET['d1'];
                           }
                       } ?>">
            </div>
            <div class="column">
                <input class="input" name="d2" type="date"
                       value="<?php if (isset($_GET['d1']) AND !empty($_GET['d1'])) {
                           if (isset($_GET['d2']) AND !empty($_GET['d2'])) {
                               echo $_GET['d2'];
                           }
                       } ?>">
            </div>
            <div class="column">
                <input class="button" type="submit" value="Rechercher">
            </div>
        </div>
    </form>
    <br><br>
    <?php

    $nM = $_SESSION['auth']->num_moniteur;

    if (!isset($_GET['d1']) AND !isset($_GET['d2'])) {
        $req = $db->query('
SELECT * FROM inscription_reprise ir
INNER JOIN users u ON u.num_moniteur = ir.numMoniteur
INNER JOIN reprise r ON ir.numReprise = r.numReprise
INNER JOIN cavalier c ON ir.numCavalier = c.numCavalier
INNER JOIN monture m ON ir.numMonture = m.numMonture
AND ir.numMoniteur = ' . $nM)->fetchAll();

        $reqC = $db->query('
SELECT * FROM inscription_reprise ir
INNER JOIN users u ON u.num_moniteur = ir.numMoniteur
INNER JOIN reprise r ON ir.numReprise = r.numReprise
INNER JOIN cavalier c ON ir.numCavalier = c.numCavalier
INNER JOIN monture m ON ir.numMonture = m.numMonture
AND ir.numMoniteur = ' . $nM)->rowCount();
        echo "<h4 class=\"title is-4\">" . $reqC . " Résultat(s)</h4>";
        foreach ($req as $item) {
            ?>
            <div class="box">
                <article class="media">
                    <div class="media-left">
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Reprise avec <?= $item->nomCavalier ?> <?= $item->prenomCavalier ?>
                                    le <?= $item->dateReprise ?></strong>
                                <small></small>
                                <br>
                                Le/La jeune <?= $item->nomCavalier ?> <?= $item->prenomCavalier ?> aura cours avec la
                                monture nommé <b>"<?= $item->nomMonture ?>"</b><br>
                                Informations sur le cavalier
                                : <?php echo $item->optionReprise == null ? "<b>Aucune option</b>" : "Option de reprise : <b>" . $item->optionReprise . "</b>" ?>
                                | Nombre de tickets : <b><?= $item->nbtickets ?></b>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <?php
        }
    } else if (isset($_GET['d1']) AND isset($_GET['d2'])) {

        $d1 = htmlspecialchars(($_GET['d1']));
        $d2 = htmlspecialchars(($_GET['d2']));
        $req = $db->query('
SELECT * FROM inscription_reprise ir
INNER JOIN users u ON u.num_moniteur = ir.numMoniteur
INNER JOIN reprise r ON ir.numReprise = r.numReprise
INNER JOIN cavalier c ON ir.numCavalier = c.numCavalier
INNER JOIN monture m ON ir.numMonture = m.numMonture
WHERE r.dateReprise BETWEEN "' . $d1 . '" AND "' . $d2 . '"
AND ir.numMoniteur = ' . $nM)->fetchAll();

        $reqC = $db->query('
SELECT * FROM inscription_reprise ir
INNER JOIN users u ON u.num_moniteur = ir.numMoniteur
INNER JOIN reprise r ON ir.numReprise = r.numReprise
INNER JOIN cavalier c ON ir.numCavalier = c.numCavalier
INNER JOIN monture m ON ir.numMonture = m.numMonture
WHERE r.dateReprise BETWEEN "' . $d1 . '" AND "' . $d2 . '"
AND ir.numMoniteur = ' . $nM)->rowCount();
        echo "<h4 class=\"title is-4\">" . $reqC . " Résultat(s)</h4>";
        foreach ($req as $item) {
            ?>
            <div class="box">
                <article class="media">
                    <div class="media-left">
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Reprise avec <?= $item->nomCavalier ?> <?= $item->prenomCavalier ?>
                                    le <?= $item->dateReprise ?></strong>
                                <small></small>
                                <br>
                                Le/La jeune <?= $item->nomCavalier ?> <?= $item->prenomCavalier ?> aura cours avec la
                                monture nommé <b>"<?= $item->nomMonture ?>"</b><br>
                                Informations sur le cavalier
                                : <?php echo $item->optionReprise == null ? "<b>Aucune option</b>" : "Option de reprise : <b>" . $item->optionReprise . "</b>" ?>
                                | Nombre de tickets : <b><?= $item->nbtickets ?></b>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <?php
        }
    }

    ?>


    <br><br><br><br><br><br><br><br>
</div>