<?php 
session_start();
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    require_once '../controlers/profilPageControler.php';
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
    <div class="container-fluid py-4" id="container_1">
        <div class="row">
            <div class="offset-md-1 col-md-2">
                <img class="img-fluid m-auto" src="../assets\img\avatar.png" alt="" width="120" height="140">
            </div>
            <div class="col-sm-4 col-md-5 ml-2 mt-2">
                <p>Bonjour <?= $user->pseudo;?></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni ipsa odio, delectus distinctio doloribus neque voluptatum consequuntur sint dolor reprehenderit laudantium, debitis dolorem, provident dicta labore quibusdam nostrum dolore incidunt!</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md ml-2 mt-2">
                <a href="../index.php" class="btn btn-primary col-sm col-md-3 mt-2">Accueil</a>
                <a href="updateProfil.php" class="btn btn-primary col-sm col-md-3 mt-2">Modifier mon profil</a>
                <a href="recipe.php" class="btn btn-primary col-sm col-md-3 mt-2">Ajouter une nouvelle recette</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row p-4">
        <?php foreach($all as $value){?>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="../assets/img/logo.png" aria-label="Placeholder: Thumbnail"><title><?= $value -> name; ?></title><rect width="100%" height="100%" fill="#55595c"/>
                <div class="card-body">
                    <p class="card-text"><?= $value -> description; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="recipePage.php?idRecipe=<?= $value->idRecipe;?>" class="btn btn-sm btn-outline-secondary">+ de détail</a>
                            <a href="updateRecipe.php?idRecipe=<?= $value->idRecipe; ?>&&idUser=<?= $idUser;?>" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            <a href="profilPage.php?idRecipe=<?= $value->idRecipe; ?>" class="btn btn-sm btn-outline-secondary">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php }?>
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
} else {
    header('location:../index.php');
}?>