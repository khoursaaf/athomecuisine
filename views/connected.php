<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>At'home Cuisine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    if(isset($_SESSION['idRole'])){
        if ($_SESSION['idRole'] == 3){ ?>
           <a href="../controlers/destroySessionControler.php">Deco</a>
           <a href="recipe.php">Ajouter recette</a>
           <a href="../index.php">Index</a>

        <?php
        }elseif ($_SESSION['idRole'] == 2){ ?>
            <a href="../controlers/destroySessionControler.php">Deco</a>
            <a href="recipe.php">Ajouter recette</a>
            <a href="../index.php">Index</a>
        <?php
        }elseif ($_SESSION['idRole'] == 1){ ?>
            <a href="../controlers/destroySessionControler.php">Deco</a>
            <a href="recipe.php">Ajouter recette</a>
            <a href="../index.php">Index</a>
        <?php
        }else{
            header('location:connect.php');
        }
    }
    ?>
</body>
</html>