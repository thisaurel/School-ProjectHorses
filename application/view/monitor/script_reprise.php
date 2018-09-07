<?php

var_dump($_POST);

if (isset($_POST)) {
    if (isset($_POST['opt'], $_POST['cavalier'], $_POST['monture'])) {
        if (!empty($_POST['opt']) AND !empty($_POST['cavalier']) AND !empty($_POST['monture'])) {

            $opt = htmlspecialchars($_POST['opt']);
            $cavalier = htmlspecialchars($_POST['cavalier']);
            $monture = htmlspecialchars($_POST['monture']);
            $dates = htmlspecialchars($_SESSION['d']);

            $r = $db->query('SELECT * FROM cavalier WHERE numCavalier = ' . $cavalier)->fetchAll();
            foreach ($r as $i) {
                if($i->optionReprise == "Ticket" AND $i->nbtickets > 0){
                    $bn = $i->nbtickets;
                    $bn -= 1;
                    $dd = $db->query('UPDATE cavalier SET nbtickets = '.$bn.' WHERE numCavalier = '. $cavalier);
                }
            }

            try{
                $req = $db->query('INSERT INTO inscription_annuelle(numCavalier, numPlanning) VALUE(?, ?)', [$cavalier, $monture]);
            } catch (Exception $e){
                $_SESSION['flash']['info'] = "Erreur de doublon dans la base de données";
                header('Location: ' . URL . '/');
                die();
            }

            $fre = $db->query('INSERT INTO reprise(dateReprise, numPlanning) VALUE(?, ?)', [$dates, $opt]);

            $free = $db->lastInsertId();

            if (isset($_POST['ratt'])) {
                $ratt = htmlspecialchars($_POST['ratt']);
                $fdd = $db->query('INSERT INTO inscription_reprise(numReprise, numCavalier, numMonture, numMoniteur, rattrapage, absent) VALUE(?, ?, ?, ?, ?, ?)', [$free, $cavalier, $monture, $_SESSION["auth"]->num_moniteur, 1, 0]);
            } else {
                $fdd = $db->query('INSERT INTO inscription_reprise(numReprise, numCavalier, numMonture, numMoniteur, rattrapage, absent) VALUE(?, ?, ?, ?, ?, ?)', [$free, $cavalier, $monture, $_SESSION["auth"]->num_moniteur, 0, 0]);
            }

            $_SESSION['flash']['info'] = "Reprise ajoutée";
            header('Location: ' . URL . '/');

        } else {
            $_SESSION['flash']['info'] = "Une erreur est survenue 0x01";
            header('Location: ' . URL . '/');
        }
    } else {
        $_SESSION['flash']['info'] = "Une erreur est survenue 0x02";
        header('Location: ' . URL . '/');
    }
} else {
    $_SESSION['flash']['info'] = "Une erreur est survenue 0x03";
    header('Location: ' . URL . '/');
}