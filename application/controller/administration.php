<?php

class Administration extends Controller
{

    public function __construct() {
      if(!isset($_SESSION['auth']) || (isset($_SESSION['auth']) AND $_SESSION['auth']->role == NULL)){
        $_SESSION['flash']['danger'] = "Vous n'êtes pas autorisé à accéder à cette page !";
        header('Location: '. URL . '/');
        die();
      }
    }

    public function index()
    {
          $db = App::getDatabase();
          $_SESSION['meta_title'] = "Panel administrateur";
          $_SESSION['meta_desc'] = "Administrer le site ici";
          require APP . 'view/_templates/header.php';
          require APP . 'view/_templates/navbar.php';
          require APP . 'view/admin/index.php';
          require APP . 'view/_templates/footer.php';
    }

    public function modifier()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Modifier un cheval";
        $_SESSION['meta_desc'] = "Modifier un cheval ici";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/admin/modhorse.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add(){
      $db = App::getDatabase();
      require APP . 'view/admin/add_user.php';
    }

    public function addhorse(){
      $db = App::getDatabase();
      require APP . 'view/admin/add_horse.php';
    }

    public function addcaval(){
      $db = App::getDatabase();
      require APP . 'view/admin/add_caval.php';
    }

    public function attcaval(){
      $db = App::getDatabase();
      require APP . 'view/admin/att_caval.php';
    }

    public function delhorse(){
        $db = App::getDatabase();
        require APP . 'view/admin/del_horse.php';
    }

    public function modhorse()
    {
        $db = App::getDatabase();
        require APP . 'view/admin/mod_horse.php';
    }


}
