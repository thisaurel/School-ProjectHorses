<?php

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){

	$user = $db->query('SELECT * FROM users WHERE email = ?', [$_POST['email']])->fetch();

	$error = [];

	if(empty($user)){

		$error = "Erreur 1";
    $_SESSION['flash']['danger'] = "Les identifiants saisis sont incorrects";
    header('Location: '. $_SERVER['HTTP_REFERER']);

	}
	if(empty($error)){
		if(password_verify($_POST['password'], $user->password)){
			$_SESSION['flash']['success'] = "Vous êtes connecté";
			$_SESSION['auth'] = $user;
			header('Location: '. URL . 'utilisateur/compte');

		} else {

      $_SESSION['flash']['danger'] = "Les identifiants saisis sont incorrects";
      header('Location: '. $_SERVER['HTTP_REFERER']);

		}

	} else {

	}

}
