<?php
require_once '../controlers/connectControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se connecter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-8 col-md-4 m-auto">
                <div class="card" id="card_connect">
                    <div class="card-body">
                        <form action="" method="post" class="form-signin mt-4">
                            <img class="mb-3 mt-3 logo_img" src="../assets/img/logo.png" alt="logo img" width="90" height="90">

                            <?php if(isset($erreur)){?>
                              <div class="">
                                <p class="mb-2 mt-2 font-weight-normal text-center card-subtitle text-muted"><?= $erreur; ?></p>
                              </div>
                            <?php }?>

                            <label for="inputPseudo" class="sr-only">Pseudo</label>
                            <input type="text" name="inputPseudo" id="inputPseudo" class="form-control mb-2 mt-4" placeholder="Pseudo" autofocus value="<?= $pseudo = (isset($_POST['inputPseudo']))? $_POST['inputPseudo']: NULL;?>">

                            <label for="inputPassword" class="sr-only">Mot de Passe</label>
                            <input type="password" name="inputPassword" id="inputPassword" class="form-control mb-4" placeholder="Mot de Passe" autofocus>

                            <button class="btn btn-lg btn-light btn-block button_all" type="submit" name="submitConnection">Connexion</button>
                            <a class="btn btn-lg btn-light btn-block button_all" href="javascript:history.go(-1)">Retour</a>
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
