<?php
session_start();
if(isset($_SESSION['idUser'])){
    require_once '../controlers/updateRecipeControler.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 m-auto">
                <div class="card" >
                    <div class="card-body">
                        <form action="" method="post" class="form-signin mt-4">
                            <label for="inputRecipeName" class="">Nom de la recette</label>
                            <input type="text" id="inputRecipeName" name="inputRecipeName" class="form-control mb-2" value="<?= $recipeByID->name;?>" required autofocus>
                            <label for="inputRecipeDescription" class="mt-3">Petite description</label>
                            <textarea name="inputRecipeDescription" id="inputRecipeDescription" cols="30" rows="3" class="form-control mb-4"><?= $recipeByID->description;?></textarea>
                            <div class="form-row">
                                <label for="inputRecipeDifficulty">Difficulté de la recette</label>
                                <input type="number" class="form-control mb-2" name="inputRecipeDifficulty" id="inputRecipeDifficulty" min="0" max="5" step="any" value="<?= $recipeByID->difficulty;?>">
                                <label for="inputRecipePrice">Prix de la recette</label>
                                <input type="number" class="form-control mb-2" name="inputRecipePrice" id="inputRecipePrice" min="0" step="any" value="<?= $recipeByID->price;?>">
                            </div>
                            <button class="btn btn-lg btn-light btn-block button_all mt-3 mb-3" type="submit" name="updateRecipe">Modifier</button>
                        </form>
                        <form action="" method="post" class="form-signin mt-4">
                            <label for="inputIngredient" class="mt-2">Ingredients</label>
                            <?php
                            if(isset($listIngredients)){
                                foreach ($listIngredients as $value) {
                            ?>
                            <p><?= $value->ingredients;?></p>
                            <hr>
                            <?php
                                }
                            }
                            ?>
                        </form>
                        <form action="" method="post" class="form-signin mt-4">
                            <label for="inputStep" class="mt-2">Etapes</label>
                            <?php
                            if(isset($listStep)){
                                foreach ($listStep as $value) {
                            ?>
                            <p class="mt-2" ><?= $value->step;?></p>
                            <hr>
                            <?php
                                }
                            }
                            ?>
                            <button class="btn btn-lg btn-light btn-block button_all mt-4" name="inputCancel">Annuler</button>
                            <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- début script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
<?php
}
?>