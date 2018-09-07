<?php

class gest extends Controller
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
        $_SESSION['meta_title'] = "Gestion des cavaliers";
        $_SESSION['meta_desc'] = "Liste des cavaliers du centre équestre";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/gest/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function deletecav()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Supprimer un cavalier";
        $_SESSION['meta_desc'] = "";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/gest/deletecav.php';
        require APP . 'view/_templates/footer.php';
    }

    public function modifcav()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Modifier un cavalier";
        $_SESSION['meta_desc'] = "";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/gest/modifcav.php';
        require APP . 'view/_templates/footer.php';
    }

}