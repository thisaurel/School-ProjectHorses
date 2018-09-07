<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Planning des cours pour poneys</h1>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <?php

            $rc = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    WHERE p.jour = ?", ["P", "Lundi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Lundi"])->fetchAll();

            //var_dump($req);

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
    WHERE p.jour = ?", ["P", "Mardi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Mardi"])->fetchAll();

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
    WHERE p.jour = ?", ["P", "Mercredi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Mercredi"])->fetchAll();

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
    WHERE p.jour = ?", ["P", "Jeudi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Jeudi"])->fetchAll();

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
    WHERE p.jour = ?", ["P", "Vendredi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Vendredi"])->fetchAll();

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
    WHERE p.jour = ?", ["P", "Samedi"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Samedi"])->fetchAll();

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
    WHERE p.jour = ?", ["P", "Dimanche"])->rowCount();

            $req = $db->query("SELECT * FROM planning p
    INNER JOIN type_reprise tr ON tr.codeTypeMonture = ? AND p.codeTypeReprise = tr.codeTypeReprise
    INNER JOIN moniteur m ON m.numMoniteur = tr.numMoniteur
    WHERE p.jour = ?", ["P", "Dimanche"])->fetchAll();

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
