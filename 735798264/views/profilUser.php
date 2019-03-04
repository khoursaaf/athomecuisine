<?php
session_start();
include '../controlers/profilUserControler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil de </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
  <h1>Profil n° <?= $listOneUser->idUser;?></h1>
  <h2>Profil de <?= $listOneUser->pseudo;?></h2>
  <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Mail</th>
                <th>Addresse</th>
                <th>Téléphone</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $listOneUser->pseudo; ?></td>
                <td><?= $listOneUser->mail; ?></td>
                <td><?= $listOneUser->address; ?></td>
                <td><?= $listOneUser->phone; ?></td>
                <td><?= $listOneUser->idRole; ?></td>
                <td><a href="profilUser.php?idUser=<?= $listOneUser->idUser; ?>&action=delete">Supprimer</a></td>
            </tr>
            <tr>
                <form action="" method="post">
                    <td><input type="text" name="inputPseudo" id="inputPseudo" value="<?= $listOneUser->pseudo;?>"></td>
                    <td><input type="text" name="inputMail" id="inputMail" value="<?= $listOneUser->mail;?>"></td>
                    <td><input type="text" name="inputAddress" id="inputAddress" value="<?= $listOneUser->address; ?>"></td>
                    <td><input type="phone" name="inputPhone" id="inputPhone" value="<?= $listOneUser->phone; ?>"></td>
                    <td><input type="number" name="inputRole" id="inputRole" min=1 max=3 value="<?= $listOneUser->idRole; ?>"></td>
                    <td><input type="submit" name="inputSubmit" value="Modifier"></td>
                </form>
            </tr>
        <?php ?>
        </tbody>
    </table>
</body>
</html>