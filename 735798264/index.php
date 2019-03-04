<?php
session_start();
if (isset($_SESSION['idRole']) && $_SESSION['idRole'] == 1) {
include 'controlers/adminControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- link bootstrap 4.3 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Administration</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row py-5">
        <?php foreach($all as $value){?>
            <div class="col-3">
                <div class="card p-2">
                    <p>Pseudo : <?= $value -> pseudo; ?></p>
                    <p>Email : <?= $value -> mail; ; ?></p>
                    <p>Téléphone : <?= $value->phone ; ?></p>
                    <p>Adresse : <?= $value->address ; ?></p>
                    <p>Rôle : <?= $value->idRole ; ?></p>
                    <a href="views/profilUser.php?idUser=<?= $value->idUser; ?>" class="btn btn-primary">+ de détail</a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php } ?>