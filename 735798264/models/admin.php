<?php 
class admin extends database {

    public $idUser;
    public $dRole;
    public $idRecipe;

    public $pseudo;
    public $mail;
    public $address;
    public $phone;

    public function __construct() {
        parent::__construct();
    }

    //Méthode pour la table User

    //affiche tous les utilisateur
    public function listAll(){
        $query = $this -> db -> query("SELECT * FROM `users`");
        $all = $query -> fetchAll(PDO::FETCH_OBJ);
        return $all;
    }
    //  affiche un utilisateur par grâce a son idUser
    public function listOneUser(){
        $prepare = $this -> db -> prepare("SELECT * FROM `users` WHERE idUser = :idUser");
        $prepare -> bindValue(':idUser', $this -> idUser, PDO::PARAM_INT);
        if($prepare -> execute()){
        $listOneUser = $prepare -> fetch();
        return $listOneUser;
        } else {
            return false;
        }
    }
    //  affiche tout les utilisateurs avec un role defini
    public function listUser(){
        $prepare = $this -> db -> prepare("SELECT * FROM `users` WHERE idRole = :idRole");
        $prepare->bindValue(':idRole', $this->idRole, PDO::PARAM_INT);
        if($prepare->execute){
            $listUser = $prepare -> fetchAll(PDO::FETCH_OBJ);
            return $listUser;
        }
    }
    // suppresion d'un utilisateur grâce à son id
    public function deleteUser(){
        $prepare = $this -> db -> prepare("DELETE FROM `users` WHERE `users`.`idUser` = :idUser");
        $prepare -> bindValue(':idUser', $this -> idUser, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
        } else {
            return false;
        }
    }
    // mise a jour d'un utilisateur grâce à son id
    public function updateUser(){
        $prepare = $this -> db -> prepare("UPDATE users SET pseudo = :pseudo, mail = :mail, address = :address, phone = :phone, idRole = :idRole WHERE idUser = :idUser");
        $prepare -> bindValue(":pseudo", $this -> pseudo, PDO::PARAM_STR);
        $prepare -> bindValue(":mail", $this -> mail, PDO::PARAM_STR);
        $prepare -> bindValue(":address", $this -> address, PDO::PARAM_STR);
        $prepare -> bindValue(":phone", $this -> phone, PDO::PARAM_STR);
        $prepare -> bindValue(":idRole", $this -> idRole, PDO::PARAM_INT);
        $prepare -> bindValue(":idUser", $this -> idUser, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
        } else {
            return false;
        }
    }

}