<?php
if(isset($_GET['idRecipe'])){
    require_once '../controlers/recipePageControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recette <?= $recipeByID->name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p><?= $recipeByID->name?></p>
    <p>Description : <?= $recipeByID->description?></p>
    <p>Difficulté : <?= $recipeByID->difficulty?></p>
    <p>Prix : <?= $recipeByID->price?></p>
    <?php ?>
    <?php ?>
    <?php if(isset($listIngredients)){?>
    <fieldset>
    <legend>Ingredients</legend>
    <?php foreach ($listIngredients as $value) {?>
        <p><?= $value->ingredients?></p>
    <?php }?>
    </fieldset>
    <?php }?>
    <?php if(isset($listStep)){?>
    <br>
    <fieldset>
    <legend>Etapes</legend>
    <?php foreach ($listStep as $value) {?>
        <p><?= $value->step?></p>
    <?php }?>
    </fieldset>
    <?php }?>
</body>
</html>
<?php
}
?>