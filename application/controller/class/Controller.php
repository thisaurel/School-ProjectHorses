<?php

class Controller
{

    function __construct($message = null, $code = 0)
    {
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

        function ErrorHandler($err_no, $err_msg)
        {
            echo "<pre><code class='error'>";
            if (isset($err_no) AND !empty($err_no)):
                echo 'An error occured : ' . 'Number of exception : ' . $err_no . '. Code: ' . $err_msg;
            else:
                echo 'An error occured : ' . $err_msg;
            endif;
            ini_set("log_errors", 1);
            ini_set("error_log", APP . 'logs/error.log');
            error_log( "Number of exception: " . $err_no . '. Code ERROR : ' . $err_msg);
            echo "</pre></code>";
            die();
        }
        set_error_handler('ErrorHandler');
    }

}