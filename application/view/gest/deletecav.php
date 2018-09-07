<?php

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $req = $db->query('DELETE FROM cavalier WHERE numCavalier = ?', [$id]);
    $_SESSION['flash']['success'] = "Cavalier supprimé";
    header('Location: '. $_SERVER['HTTP_REFERER']);

}
