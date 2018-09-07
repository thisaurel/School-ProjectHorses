<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <div class="notification is-info">
        La gestion des cavaliers est tout juste en phase de conception. Seule la suppression fonctionne.
    </div>
    <h1 class="title is-1">Gestion des cavaliers</h1>
    <?php

    $req = $db->query('SELECT * FROM cavalier ORDER BY cavalier.numCavalier')->fetchAll();

    ?>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Inscription</td>
            <td>Type de cours</td>
            <td>Image</td>
            <td>Chevaux/Poneys</td>
            <td>Modifier</td>
        </tr>
        <tr>
            <?php

$r = $db->query('
SELECT 
c.nomCavalier,
c.prenomCavalier, 
c.nbtickets,
c.optionReprise,
c.nbtickets,
c.codeTypeMonture AS ctm,
m.nomMonture,
m.photoMonture 
FROM cavalier c
INNER JOIN monture m ON m.numCavalier = c.numCavalier
');
            foreach ($r as $item) {
                ?>
                <tr>
                        <td><?= $item->nomCavalier ?></td>
                        <td><?= $item->prenomCavalier ?></td>
                        <td><?= $item->optionReprise ?> / <?= $item->nbtickets ?> tickets</td>
                        <td><?= $item->ctm == "P" ? "Poney" : "Cheval" ?></td>
                        <td><?= $item->nomMonture != NULL ? "<img width='100px' src='" . URL . "pic/" . $item->photoMonture . "'</img>'" : "Aucune photo" ?></td>
                        <td><?= $item->nomMonture != NULL ? $item->nomMonture : "Aucun cheval" ?></td>
                        <td><a href="mo">Modifier</a></td>
                </tr>
                <?php
            }
            ?>
    </table>
    <hr>
    <h1 class="title is-1">Liste des cavaliers cheval</h1>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Modifier</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
        <tr>
            <?php

            $r = $db->query('
    SELECT * FROM cavalier WHERE cavalier.codeTypeMonture = "C"
');
            foreach ($r as $item) {
            ?>
        <tr>
            <td><?= $item->nomCavalier ?></td>
            <td><?= $item->prenomCavalier ?></td>
            <td><?= $item->optionReprise ?> / <?= $item->nbtickets ?> tickets</td>
            <td><a href="">Modifier</a></td>
            <td><a href="<?= URL ?>gest/deletecav?id=<?= $item->numCavalier ?>">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </table>

    <hr>
    <h1 class="title is-1">Liste des cavaliers poney</h1>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Modifier</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
        <tr>
            <?php

            $r = $db->query('
    SELECT * FROM cavalier WHERE cavalier.codeTypeMonture = "P"
');
            foreach ($r as $item) {
            ?>
        <tr>
            <td><?= $item->nomCavalier ?></td>
            <td><?= $item->prenomCavalier ?></td>
            <td><?= $item->optionReprise ?> / <?= $item->nbtickets ?> tickets</td>
            <td><a href="">Modifier</a></td>
            <td><a href="<?= URL ?>gest/deletecav?id=<?= $item->numCavalier ?>">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </table>

</div>

