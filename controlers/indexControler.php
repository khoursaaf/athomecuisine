<?php
require_once "models/databaseConnect.php";
require_once "models/user.php";

$user = new user();
$listAll = $user->listAll();
?>