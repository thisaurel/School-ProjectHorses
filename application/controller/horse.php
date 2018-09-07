<?php

class Horse extends Controller
{
    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Liste des chevaux";
        $_SESSION['meta_desc'] = "Liste des chevaux";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/horse/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function poneys()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Liste des poneys";
        $_SESSION['meta_desc'] = "Liste des poneys";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/horse/poneys.php';
        require APP . 'view/_templates/footer.php';
    }

    public function info()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Liste des poneys";
        $_SESSION['meta_desc'] = "Liste des poneys";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/horse/info.php';
        require APP . 'view/_templates/footer.php';
    }

}
