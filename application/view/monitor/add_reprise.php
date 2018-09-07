<?php

if (!isset($_POST['optradio'])) {
    $_SESSION['flash']['danger'] = 'Veuillez choisir une reprise';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

if (!isset($_POST['jour'])) {
    $_SESSION['flash']['danger'] = 'Veuillez choisir une reprise';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

if (!isset($_POST['lib'])) {
    $_SESSION['flash']['danger'] = 'Veuillez choisir une reprise';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

if (!isset($_POST['codeT'])) {
    $_SESSION['flash']['danger'] = 'Veuillez choisir une reprise';
    echo "<script type='text/javascript'>document.location.replace('" . URL . "/');</script>";
    die();
}

$day = htmlspecialchars($_POST['jour']);
$lib = htmlspecialchars($_POST['lib']);
$codeT = htmlspecialchars($_POST['codeT']);
$opt = htmlspecialchars($_POST['optradio']);

?>
<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Reprise <?= $lib ?> du <?= $_SESSION['d'] ?></h1>
    <form method="post" action="script_reprise">

        <div class="field" style="display: none;">
            <input type="text" name="opt" value="<?= $opt ?>"/>
        </div>

        <div class="field">
            <label class="label">Cavalier</label>
            <div class="select">
                <select name="cavalier" id="cavalier">
                    <?php
                    $req = $db->query('SELECT * FROM cavalier WHERE codeTypeMonture = ?', [$codeT])->fetchAll();
                    foreach ($req as $item) {
                        echo '<option value="' . $item->numCavalier . '">' . $item->nomCavalier . " " . $item->prenomCavalier . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Monture</label>
            <div class="select">
                <select name="monture" id="monture">
                    <?php
                    $req = $db->query('SELECT * FROM monture WHERE codeTypeMonture = ?', [$codeT])->fetchAll();
                    foreach ($req as $item) {
                        echo '<option value="' . $item->numMonture . '">' . $item->nomMonture . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Rattrapage</label>
            <input type="checkbox" name="ratt">
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Inscription reprise</button>
            </div>
        </div>

    </form>
    <br><br><br><br><br><br><br><br>
</div>
