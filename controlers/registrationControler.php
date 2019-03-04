<?php
require_once "../models/databaseConnect.php";
require_once "../models/user.php";
$regexPseudo = '#^[\w.-]{5,65}$#';
//verifie si la valeur $_POST['inputSubmit'] est definie
if (isset($_POST['inputSubmit'])){
    //instancie un nouvel objet
    $userCreate = new user();
    //verification que les input envoyé ne sont pas vides
    if (!empty($_POST['inputPseudo']) && !empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        /*htmlspecialchars convertit les caractères spéciaux en entités HTML et strlen calcule la taille d'une chaîne
        * si la taile du pseudo est < 65 et que la regex est true,
        * on hydrate l'attribut de notre objet avec la valeur de l'input
        */
        $pseudoCreateUser = htmlspecialchars($_POST['inputPseudo']);
        $pseudoCreateUserLenght = strlen($pseudoCreateUser);
        if ($pseudoCreateUserLenght <= 65 && preg_match($regexPseudo, $pseudoCreateUser)) {
            $userCreate -> pseudo = $pseudoCreateUser;
            /* fait appel à la méthode pseudoUnique() qui vérifie si le pseudo est déja présent dans la base de données
            */
            $pseudoUnique = $userCreate -> pseudoUnique();
            if ($pseudoUnique == 0) {
              $mailCreateUser = htmlspecialchars($_POST['inputEmail']);
               if (filter_var($mailCreateUser, FILTER_VALIDATE_EMAIL)) {
                $userCreate -> mail = $mailCreateUser;
                $mailUnique = $userCreate -> mailUnique();
                if ($mailUnique == 0) {
                    $passwordCreateUser = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT);
                    $userCreate -> password = $passwordCreateUser;
                    if ($userCreate -> addUser()) {
                        header('location:connection.php');
                    } else {
                       $erreur = 'Une erreur s\'est produite, veuillez ressayer dans quelques instant';
                    }
                } else {
                    $erreur = 'L\'adresse mail est indisponible!';
                }
               } else {
                    $erreur = 'Vérifier adresse mail!';
               }
            } else {
                $erreur = 'Pseudo déjà utilisé!';
            }
        } else {
            $erreur = 'Pseudo incorrect!';
        }
    } else {
       $erreur = 'Tous les champs doivent être remplis!';
    }
}






