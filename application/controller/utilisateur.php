<?php

class Utilisateur extends Controller
{
    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Connexion";
        $_SESSION['meta_desc'] = "Connectez-vous !";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/users/connexion.php';
        require APP . 'view/_templates/footer.php';
    }

    public function connexion()
    {
        if(isset($_SESSION['auth']) AND !empty($_SESSION['auth'])):
          $_SESSION['flash']['info'] = "Vous êtes déjà connecté !";
          header('Location: '. URL . '/');
        else:
          $db = App::getDatabase();
          $_SESSION['meta_title'] = "Connexion";
          $_SESSION['meta_desc'] = "Connectez-vous !";
          require APP . 'view/_templates/header.php';
          require APP . 'view/_templates/navbar.php';
          require APP . 'view/users/connexion.php';
          require APP . 'view/_templates/footer.php';
        endif;
    }

    public function inscription()
    {
        if(isset($_SESSION['auth']) AND !empty($_SESSION['auth'])):
          $_SESSION['flash']['info'] = "Vous êtes déjà connecté !";
          header('Location: '. URL . '/');
        else:
          $db = App::getDatabase();
          $_SESSION['meta_title'] = "Inscription";
          $_SESSION['meta_desc'] = "Inscrivez-vous !";
          require APP . 'view/_templates/header.php';
          require APP . 'view/_templates/navbar.php';
          require APP . 'view/users/inscription.php';
          require APP . 'view/_templates/footer.php';
        endif;
    }

    public function compte()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Mon compte";
        $_SESSION['meta_desc'] = "Inscrivez-vous !";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/users/account.php';
        require APP . 'view/_templates/footer.php';
    }


    public function register(){
      $db = App::getDatabase();
      require APP . 'view/users/register.php';
    }

    public function login(){
      $db = App::getDatabase();
      require APP . 'view/users/login.php';
    }

    public function modify(){
      $db = App::getDatabase();
      require APP . 'view/users/modify.php';
    }

    public function delete(){
      $db = App::getDatabase();
      require APP . 'view/users/delete.php';
    }

    public function deconnexion(){
      $db = App::getDatabase();
      require APP . 'view/users/logout.php';
    }

}
