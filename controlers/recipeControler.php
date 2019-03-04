<?php
require_once "../models/databaseConnect.php";
require_once "../models/recipe.php";
require_once "../models/step.php";
require_once "../models/ingredient.php";

//teste la présence de la superglobale et si elle n'est pas vide
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    //recupère la valeur entière de idUser
    $idUser = intval($_SESSION['idUser']);

    if(isset($_POST['SubmitRecipe'])){
        //initialisation d'un objet recipe
        $recipe = new recipe();
        //on assigne la valeur de idUser a l'idUser de notre objet
        $recipe->idUser = $idUser;
        //verifie que les deux input ne sont pas vide puis on les purge
        if(!empty($_POST['inputRecipeName']) || !empty($_POST['inputRecipeDescription'])){
            $name = htmlspecialchars($_POST['inputRecipeName']);
            $description = htmlspecialchars($_POST['inputRecipeDescription']);
            $difficulty = intval($_POST['inputRecipeDifficulty']);
            $price = $_POST['inputRecipePrice'];
            //verification du type des varriable 
            if(settype($name, "string") && settype($description, "string") && settype($difficulty, "integer") && settype($price, "integer")){
                $recipe->name = $name;
                $recipe->description = $description;
                $recipe->difficulty = $difficulty;
                $recipe->price = $price;
                //si la méthode retourne true redirection vers la page suivante avec l'id de la recette
                if($recipe->addRecipe()){
                    $idRecipe = $recipe->lastId();
                    header('location:recipe.php?action=addIngredient&idRecipe='.$idRecipe);
                } else {
                    //sinon renvoie avec une erreur
                    $error = 'Une erreur s\'est produite, ressayer plus tard.';
                }
            } else {
                header('location:profilPage.php');
            }
        }
    } elseif(isset($_POST['inputCancel'])){
        header('location:profilPage.php');
    }

    if (isset($_GET['action']) && $_GET['action'] == 'addIngredient' && isset($_GET['idRecipe'])){
        $ingredient = new ingredient();
        $ingredient->idRecipe = intval($_GET['idRecipe']);
        $listIngredients = $ingredient->listIngredients();
        
        if(isset($_POST['submitIngredient'])){
            //verifie que l'input ne sont pas vide puis on le purge
            if(!empty($_POST['inputIngredient'])){
                $ingredientInput = htmlspecialchars($_POST['inputIngredient']);
                if(settype($ingredientInput, "string")){
                    $ingredient->ingredients = $ingredientInput;
                    if ($ingredient->addIngredient()) {
                        header('refresh:0.1');
                    } else {
                        $error = 'Une erreur s\'est produite, ressayer plus tard.';
                    }
                } else {
                    header('location:profilPage.php'); 
                }
            }
        } elseif(isset($_POST['submitStep'])){
            header('location:recipe.php?action=addStep&idRecipe='.$_GET['idRecipe']);
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'addStep' && isset($_GET['idRecipe'])){
        $step = new step();
        $step->idRecipe = intval($_GET['idRecipe']);
        $listStep = $step->listStep();
        if(isset($_POST['submitStep'])){
            if(!empty($_POST['inputStep'])){
                $stepInput = htmlspecialchars($_POST['inputStep']);
                if(settype($stepInput, "string")){
                    $step->step = $stepInput;
                    if ($step->addStep()) {
                        //le paramètre refresh permet de raffraichir la page 
                        header('refresh:0.1');
                    } else {
                        $error = 'Une erreur s\'est produite, ressayer plus tard.';
                    }
                } else {
                    header('location:profilPage.php');  
                } 
            }
        } elseif(isset($_POST['finishRecipe'])){
            header('location:profilPage.php');
        }
    }
    //sinon redirection vers la page d'accueil
} else {
    header('location:../index.php');
}
