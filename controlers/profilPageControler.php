<?php
require_once "../models/databaseConnect.php";
require_once "../models/user.php";
require_once "../models/recipe.php";

if(isset($_SESSION['idUser'])){

    $idUser = $_SESSION['idUser'];
    $user = new user();
    $user->idUser = $idUser;
    $user = $user->listOneUser();
    $recipe = new recipe();
    $recipe->idUser = $idUser;
    $all = $recipe->listMyRecipe();

    if(isset($_GET['idRecipe'])){
        $idRecipe = intval($_GET['idRecipe']);
        $recipe->idRecipe = $idRecipe;
        if($recipe->deleteRecipe()){
            header('location:profilPage.php?message');
        } else {
            header('location:profilPage.php?error');
        }
    }
}
?>