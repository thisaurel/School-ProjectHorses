<?php

if (isset($_POST['delhorse']) AND !empty($_POST['delhorse'])) {
    $id = htmlspecialchars($_POST['delhorse']);
    echo $id;

    $req = $db->query('DELETE FROM monture WHERE numMonture = ?', [$id]);
    //$_SESSION['flash']['success'] = "Le cheval a été supprimé";
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}