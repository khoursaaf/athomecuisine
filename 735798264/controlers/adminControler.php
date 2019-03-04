<?php 
require_once '../models/databaseConnect.php';
require_once '../models/user.php';

$admin = new user();
$all = $admin -> listAllUser();
if(isset($_GET['idUser'])){
    $idUser = intval($_GET['idUser']);
    $admin -> idUser = $idUser;
    if($admin -> deleteUser()){
        header('location:index.php');
    } else {
        header('location:index.php');
    }
}
?>