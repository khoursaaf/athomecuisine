<?php 
session_start();
require_once 'controlers/indexControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <!-- link bootstrap 4.3 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- link fa icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- link css local -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- debut sidenav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container-fluid">
            <div class="row">
                <img class="mb-3 mt-3 logo_img" src="assets/img/logo.png" alt="logo img" width="90" height="90">
            </div>
            <div class="row m-auto">
            <?php ?>
            <?php if(isset($_SESSION['idUser'])){?>
                <a href="views\profilPage.php" class="btn btn-light col-12 mb-2">Mon Profil</a>

            <?php if(isset($_SESSION['idRole']) && $_SESSION['idRole'] == 1){?>
                <a href="735798264/index.php" class="btn btn-light col-12 mb-2">Page d'Administration</a>

            <?php }?>
                <a href="controlers/destroySessionControler.php" class="btn btn-light col-12 mb-2">Deconnexion</a>
                
            <?php
            } else{?>
                <div class="col-sm mt-4">
                    <a href="views\connection.php" class="btn btn-light col-12 mt-4 mb-2">Se connecter</a>
                    <a href="views/registration.php" class="btn btn-light col-12">S'inscrire</a>
                </div>
            <?php }?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col ml-4 mt-4">
                <!-- icon ouverture sidenav -->
                <span onclick="openNav()"><i class="fas fa-bars fa-2x"></i></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <img class="" id="img_frontPage" src="assets/img/logo.png" alt="logo athomecuisine">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-9 m-auto">
                <p class="text-center py-4 h5">At'home cuisine est une plate-forme qui recense les recettes créées par vous et pour vous.<br>Si une recette vous intéresse mais vous ne savez pas comment la faire, pas de soucis!<br>Prenez un rendez-vous avec le créateur de la recette pour qu'il puisse vous montrer comment faire!
                </p>
            </div>
            <div class="col-sm-12 d-flex justify-content-center mt-4">
                <a class="btn btn-light col-sm-3" href="#recipeList" >Commencer</a>
            </div>
        </div>
        <div class="row" id="recipeList">
        <div class="container-fluid">
        <div class="row p-4 mt-4 mb-4">
            <?php foreach ($listAll as $value) { ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 ">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/logo.png" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"/>
                    <div class="card-body">
                        <p class="card-title h5"><?= $value->recipe;?></p>
                        <p class="card-text"><?= $value->description;?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="views/recipePage.php?idRecipe=<?= $value->idRecipe;?>" class="btn btn-sm btn-outline-secondary">+ de details</a>
                            </div>
                        <small class="text-muted"><?= 'Par '.$value->pseudo;?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    </div>
    </div>
    <!-- début script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- link js local -->
    <script src="assets/js/script.js"></script>
</body>
</html>
