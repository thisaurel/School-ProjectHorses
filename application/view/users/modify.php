<?php


if((isset($_POST['apassword']) AND !empty($_POST['apassword'])) AND password_verify($_POST['apassword'], $_SESSION['auth']->password)){


  if(isset($_POST['fname']) AND !empty($_POST['fname']) AND $_POST['fname'] != $_SESSION['auth']->fname) {

        $newfname = htmlspecialchars($_POST['fname']);
        $insertmail = $db->query("UPDATE users SET fname = ? WHERE id = ?", [$newfname, $_SESSION['auth']->id]);

        $_SESSION['flash']['info'] = "Vos informations ont été modifiés";
        $_SESSION['auth']->fname = $newfname;
        header("Location: ".$_SERVER['HTTP_REFERER']);

  }


  if(isset($_POST['lname']) AND !empty($_POST['lname']) AND $_POST['lname'] != $_SESSION['auth']->lname) {

        $newlname = htmlspecialchars($_POST['lname']);
        $insertmail = $db->query("UPDATE users SET lname = ? WHERE id = ?", [$newlname, $_SESSION['auth']->id]);

        $_SESSION['flash']['info'] = "Vos informations ont été modifiés";
        $_SESSION['auth']->lname = $newlname;
        header("Location: ".$_SERVER['HTTP_REFERER']);

  }



if(isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] != $_SESSION['auth']->email) {

      $newmail = htmlspecialchars($_POST['email']);
      $insertmail = $db->query("UPDATE users SET email = ? WHERE id = ?", [$newmail, $_SESSION['auth']->id]);

      $_SESSION['flash']['info'] = "Vos informations ont été modifiés";
      $_SESSION['auth']->email = $newmail;
      header("Location: ".$_SERVER['HTTP_REFERER']);

}

if(isset($_POST['password']) AND !empty($_POST['password']) AND isset($_POST['cpassword']) AND !empty($_POST['cpassword'])) {
  $mdp1 = $_POST['password'];
  $mdp2 = $_POST['cpassword'];
  if($mdp1 == $mdp2) {

    $password= password_hash($mdp1, PASSWORD_BCRYPT);

     $insertmdp = $db->query("UPDATE users SET password = ? WHERE id = ?", [$password, $_SESSION['auth']->id]);

     $_SESSION['flash']['info'] = "Vos informations ont été modifiés";
     $_SESSION['auth']->password = $password;


  	 header("Location: ".$_SERVER['HTTP_REFERER']);

  } else {

     $_SESSION['flash']['danger'] = 'Les nouveaux mot de passe ne sont pas identiques';
  	 header("Location: ".$_SERVER['HTTP_REFERER']);

  }
}

} else {

  $_SESSION['flash']['danger'] = 'Votre mot de passe actuel est incorrect';
  	 header("Location: ".$_SERVER['HTTP_REFERER']);

}
