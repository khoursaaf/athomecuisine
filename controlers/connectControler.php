<?php
require_once "../models/databaseConnect.php";
require_once "../models/user.php";

if (isset($_POST['submitConnection'])) {

    $userConnect = new user();

    if (isset($_POST['inputPseudo']) && !empty($_POST['inputPseudo'])) {

        if (isset($_POST['inputPassword']) && !empty($_POST['inputPassword'])) {

            $pseudo = htmlentities($_POST['inputPseudo']);
            $password = $_POST['inputPassword'];
            $userConnect -> pseudo = $pseudo; 
            $result = $userConnect->connectUser();
            var_dump($result);
            die();
            if ($result && password_verify($password, $result->password)) {
                session_start();
                $_SESSION['idRole'] = $result->idRole;
                $_SESSION['idUser'] = $result->idUser;
                header('location: ../index.php');
            } else {
                $erreur = 'Mauvais identifiant ou mot de passe.';
            }

        } else {
            $erreur = 'Remplir mot de passe';
        }

    } else {
       $erreur = 'Remplir pseudo';
    }

}





