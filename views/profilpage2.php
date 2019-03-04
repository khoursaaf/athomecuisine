<?php 
session_start();
require_once '../controlers/updateProfilControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier mon profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                                <p class="mb-2 mt-2 font-weight-normal text-center card-subtitle text-muted"><?= $erreur; ?></p>
                            <?php }?>
                            <label for="inputPseudo" class="mt-3">Pseudo</label>
                                <input type="text" name="inputPseudo" id="inputPseudo" class="form-control mb-2 mt-4" value="<?= $listOneUser->pseudo;?>" autofocus>
                            <label for="inputEmail" class="mt-3">E-mail</label>
                                <input type="email" name="inputEmail" id="inputEmail" class="form-control mb-2" value="<?= $listOneUser->mail;?>" autofocus>
                            <label for="inputAddress" class="mt-3"></label>
                                <input type="text" name="inputAddress" id="inputAddress" class="form-control mb-2 mt-4" value="<?= $listOneUser->address;?>" autofocus>
                            <label for="inputPhone" class="mt-3"></label>
                                <input type="text" name="inputPhone" id="inputPhone" class="form-control mb-2 mt-4" value="<?= $listOneUser->phone;?>" autofocus>
                            <button class="btn btn-lg btn-light btn-block button_all" type="submit" name="submitConnection">Connexion</button>
                            <a class="btn btn-lg btn-light btn-block button_all" href="javascript:history.go(-1)">Retour</a>
                            <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="bg-danger">
                <a href="updateProfil.php?action=delete" class="btn btn-danger btn-block button_all">Supprimer mon compte</a>
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