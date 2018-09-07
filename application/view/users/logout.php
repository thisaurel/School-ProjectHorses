<?php

$_SESSION['auth'] = "";
unset($_SESSION['auth']);
$_SESSION['flash']['info'] = "Vous avez été déconnecté";
header('Location: '. URL . '/');
