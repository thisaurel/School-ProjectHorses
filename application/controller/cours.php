<?php

class Cours extends Controller
{
    public function index()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Planning des cours de chevaux";
        $_SESSION['meta_desc'] = "Visualisez le planning des cours de chevaux";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/cours/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function poneys()
    {
        $db = App::getDatabase();
        $_SESSION['meta_title'] = "Planning des cours de poneys";
        $_SESSION['meta_desc'] = "Visualisez le planning des cours de poneys";
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/cours/poneys.php';
        require APP . 'view/_templates/footer.php';
    }

}
