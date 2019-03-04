<?php
require_once "../models/databaseConnect.php";
require_once "../models/user.php";

if(isset($_SESSION['idUser'])){
    $regexPseudo = '#^[\w.-]{5,65}$#';
    $error = 0;
    $idUser = intval($_SESSION['idUser']);
    $user = new user();
    $user -> idUser = $idUser;
    $listOneUser = $user -> listOneUser();
    
    if(isset($_POST['submitUpdate'])){

        $pseudoUpdateUser = htmlspecialchars($_POST['inputPseudo']);
        $pseudoUpdateUserLenght = strlen($pseudoUpdateUser);
        if($pseudoUpdateUserLenght <= 65 && preg_match($regexPseudo, $pseudoUpdateUser)){
            $pseudoUnique = $user->pseudoUnique();
            if($pseudoUnique == 0){
            $user -> pseudo = $_POST['inputPseudo'];
            } else {
                $error = 1;
            }
        } else {
            $error = 1;
        }
        $mailUpdate = htmlspecialchars($_POST['inputEmail']);
        if (filter_var($mailUpdate, FILTER_VALIDATE_EMAIL)) {
            $user-> mail = $mailUpdate;
        } else {
            $error = 1; 
        }
        $user -> address = htmlspecialchars($_POST['inputAddress']);
        $user -> phone = htmlspecialchars($_POST['inputPhone']);

        if($error == 1){
           $errorMessage = 'Vérifier informations';
        } else {
            if($user->updateUser()){
                header('location:updateProfil.php');
            }
        }
    } elseif(isset($_POST['cancel'])){
        header('location:profilPage.php');
    }

    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        if($user -> deleteUser()){
            session_unset();
            session_destroy();
            header('location:../index.php');
        }
    }
    
} else {
    header('location:../index.php');
}

?>