<?php

if(isset($_POST)){



	$error = [];

	$req = $db->query('SELECT email FROM users WHERE email = ?', [htmlspecialchars($_POST['email'])])->fetch();

	if(!empty($req)){

    $_SESSION['flash']['danger'] = 'Cette adresse mail est déjà utilisée';
    header('Location: '. $_SERVER['HTTP_REFERER']);
		die();

	}

	if(isset($_POST['fname']) AND empty($_POST['fname'])){
		$_SESSION['flash']['danger'] = 'Vous devez saisir votre prénom';
    header('Location: '. $_SERVER['HTTP_REFERER']);
		die();
	}

	if(isset($_POST['lname']) AND empty($_POST['lname'])){
		$_SESSION['flash']['danger'] = 'Vous devez saisir votre nom';
    header('Location: '. $_SERVER['HTTP_REFERER']);
		die();
	}

	if(isset($_POST['email']) AND empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

    $_SESSION['flash']['danger'] = 'Cette adresse mail ne répond pas aux critères d\'inscription';
    header('Location: '. $_SERVER['HTTP_REFERER']);
		die();

	}


	if(empty($_POST['password']) || $_POST['password'] != $_POST['cpassword'] || strlen($_POST['password']) < 8){

    $_SESSION['flash']['danger'] = 'Votre mot de passe doit faire plus de 8 caractères';
    header('Location: '. $_SERVER['HTTP_REFERER']);
		die();

	}

	if(empty($error)){

		$fname = htmlspecialchars($_POST['fname']);
		$lname = htmlspecialchars($_POST['lname']);

		$email = htmlspecialchars($_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$d = date('Y-m-d H:i:s');

		$ins = $db->query('INSERT INTO users(fname, lname, email, password, date_register) VALUES(?, ?, ?, ?, ?)', [$fname, $lname, $email, $password, $d]);

		$user_id = $db->lastInsertId();

		$sess = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();

		$_SESSION['auth'] = $sess;

		echo "success";

    $_SESSION['flash']['success'] = 'Inscription réussie !';

    header('Location: '. URL . 'utilisateur/compte');


	}



}
