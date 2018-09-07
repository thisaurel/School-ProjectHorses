<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Planning des cours pour chevaux</h1>


    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Lundi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Lundi"])->fetchAll();



            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Lundi</b></td>
            <td><b>Heures</b></td>
            <td><b>Niveaux</b></td>
            <td><b>Moniteurs</b></td>
        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Mardi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Mardi"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Mardi</b></td>
        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Mercredi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Mercredi"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Mercredi</b></td>

        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>


        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Jeudi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Jeudi"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Jeudi</b></td>

        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Vendredi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Vendredi"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Vendredi</b></td>

        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Samedi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Samedi"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Samedi</b></td>

        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["C", "Dimanche"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["C", "Dimanche"])->fetchAll();

            //var_dump($req);

            ?>
        <tr>
            <td rowspan="<?= $rc + 1 ?>"><b>Dimanche</b></td>

        </tr>

        <?php


        foreach ($req as $k) {
            ?>

            <tr>
                <td><?= $k->heure ?></td>
                <td><?= $k->libTypeReprise ?></td>
                <td><?= $k->prenomMoniteur . " " . $k->nomMoniteur ?></td>
            </tr>

            <?php
        }


        ?>

        </tr>

    </table>


</div>
