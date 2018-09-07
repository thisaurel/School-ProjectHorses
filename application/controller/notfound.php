<?php

class NotFound extends Controller
{
    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Erreur 404";
        $_SESSION['meta_desc'] = "Erreur 404";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
