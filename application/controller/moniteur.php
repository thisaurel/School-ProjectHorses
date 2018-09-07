<?php

class moniteur extends Controller
{

    public function __construct() {
        if(!isset($_SESSION['auth']->num_moniteur) or $_SESSION['auth']->num_moniteur == null) {
            $_SESSION['flash']['danger'] = "Vous n'êtes pas autorisé à accéder à cette page !";
            header('Location: '. URL . '/');
            die();
        }
    }

    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Gestion des reprises";
        $_SESSION['meta_desc'] = "Gestion des reprises";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/monitor/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function vue_reprise()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Vue de la reprise";
        $_SESSION['meta_desc'] = "Vue de la reprise";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/monitor/reprise.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ajouter_reprise()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Vue de la reprise";
        $_SESSION['meta_desc'] = "Vue de la reprise";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/monitor/add_reprise.php';
        require APP . 'view/_templates/footer.php';
    }

    public function consulter_reprise()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Consulter les reprise";
        $_SESSION['meta_desc'] = "Consulter les reprise";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/monitor/consult.php';
        require APP . 'view/_templates/footer.php';
    }

    public function script_reprise()
    {
        $db = App::getDatabase();
        require APP . 'view/monitor/script_reprise.php';
    }

}