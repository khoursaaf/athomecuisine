<?php
require_once "../models/databaseConnect.php";
require_once "../models/step.php";

$step = new step();

if (isset($_GET['idRecipe'])) {
    $idRecipe = intval($_GET['idRecipe']);
    $step -> idRecipe = $idRecipe;
    $listStep = $step -> listStep();
    if (isset($_POST['inputStep']) && !empty($_POST['inputStep'])) {
        $stepRecipe = htmlspecialchars($_POST['inputStep']);
        $step -> step = $stepRecipe ;
        if($step -> addStep()){
            echo 'ok';
        } else {
            echo 'erreur';
        }
    }
}
?>