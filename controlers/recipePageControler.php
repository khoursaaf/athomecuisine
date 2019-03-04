<?php 
require_once "../models/databaseConnect.php";
require_once "../models/recipe.php";
require_once "../models/step.php";
require_once "../models/ingredient.php";

if(isset($_GET['idRecipe'])){
    $recipe = new recipe();
    $recipe->idRecipe = intval($_GET['idRecipe']);
    $recipeByID = $recipe->recipeByIdRecipe();

    $ingredient = new ingredient();
    $ingredient->idRecipe = intval($_GET['idRecipe']);
    $listIngredients = $ingredient->listIngredients();

    $step = new step();
    $step->idRecipe = intval($_GET['idRecipe']);
    $listStep = $step->listStep();

} else {
    header('location:../index.php');
}