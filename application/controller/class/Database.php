<?php
class Database{

    private $pdo;

    public function __construct($login, $password, $database_name, $host = 'localhost'){
        $v = phpversion();
        if ($v < 7.0) {
            echo '<style>html,body{margin: 0; padding: 0;}code{display:block;padding:12px;font-style:italic;color:#3f3f3f;background:#f5f5f5}code:before{content:\'Résultat du débogage : \A0\';font-weight:bolder;text-transform:uppercase;display:block;padding-bottom:10px}.error{display:block;padding:12px;font-style:italic;color:#fff;background:#c91d15}</style>';
            echo "<pre><code class='error'>";
            echo 'Vous utilisez une version de PHP trop ancienne ; veuillez utiliser la version de PHP > 7.0.1';
            echo "</pre></code>";
            echo "<img src='https://i.imgur.com/FzjTn9Y.png'></img>";
            echo "<br>";
            echo "<img src='https://i.imgur.com/SOGIWOP.png'></img>";
            echo "<br>";
            echo "Et sélectionner la version 7.1.3, puis redémarrer votre serveur Apache. Si vous n'avez pas cette version en sélection, vous devrez installer EasyPHP Devserver-17 pour l'obtenir.";
            die();
        }
        try {
            $this->pdo = new PDO("mysql:dbname=$database_name;host=$host", $login, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo '<style>html,body{margin: 0; padding: 0;}code{display:block;padding:12px;font-style:italic;color:#3f3f3f;background:#f5f5f5}code:before{content:\'Résultat du débogage : \A0\';font-weight:bolder;text-transform:uppercase;display:block;padding-bottom:10px}.error{display:block;padding:12px;font-style:italic;color:#fff;background:#c91d15}</style>';
            echo "<pre><code class='error'>";
            echo 'Il y\' a une erreur dans la connexion à la base de donnée. Vérifier le fichier : "/application/controller/class/App.php". Code d\'erreur : ' . '<b>' . $e->getMessage() . '</b>';
            echo "</pre></code>";
            echo "Le nom de la base de donnée à utiliser se nomme 'equestre_richeaurelien'. Veuillez saisir correctement le nom ; si vous avez renommé cette base de donnée, veuillez modifier le fichier '/application/controller/class/App.php'";
            echo "<img src='https://i.imgur.com/qdto2Nj.png' />";
            ini_set("log_errors", 1);
            ini_set("error_log", APP . 'logs/error.log');
            error_log("Database exception: " . $e->getMessage());
            die();
        }
    }

    /**
     * @param $query
     * @param bool|array $params
     * @return PDOStatement
     */
    public function query($query, $params = false){
        if($params){
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        }else{
            $req = $this->pdo->query($query);
        }
        return $req;
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

}
