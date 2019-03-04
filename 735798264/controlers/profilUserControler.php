<?php
require_once '../../models/databaseConnect.php';
require_once '../../models/user.php';

$user = new user();
//verifier que l'utilisateur est présent dans la base
if (isset($_GET['idUser'])) {
    //mettre en type int la valeur de $_GET
    $idUser = intval($_GET['idUser']);
    $user -> idUser = $idUser;
    $listOneUser = $user -> listOneUser();
    
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        if($user -> deleteUser()){
            header('location:../index.php');
        }
    }

    if(isset($_POST['inputSubmit'])){
        $user -> mail = $_POST['inputMail'];
        $user -> pseudo = $_POST['inputPseudo'];
        $user -> address = $_POST['inputAddress'];
        $user -> phone = $_POST['inputPhone'];
        $user -> idRole = $_POST['inputRole'];
        if($user -> updateUser()){
            header('location:profilUser.php?idUser='.$idUser);
        }
    }
    
} else {
    //redirection avec erreur
    header('location:../index.php?erreur="Page non trouvé"');
}
?>