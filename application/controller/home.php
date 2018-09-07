<?php

class Home extends Controller
{
    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Accueil";
        $_SESSION['meta_desc'] = "A vos chevaux ! Retrouvez ici toute nos meilleures bêtes d'élevage !";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
