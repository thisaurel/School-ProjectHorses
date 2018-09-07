<?php

Str::vds();

$del = $db->query('DELETE FROM users WHERE id = ?', [$_SESSION['auth']->id]);

$_SESSION['auth'] = "";
unset($_SESSION['auth']);
$_SESSION['flash']['info'] = "Vous avez été déconnecté";
$_SESSION['flash']['info'] = "Votre compte a été supprimé";
header('Location: '. URL . '/');
