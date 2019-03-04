<?php
class user extends database
{
   
    public $id;
    public $pseudo;
    public $password;
    public $mail;
    public $address;
    public $phone;
    public $image;
    // public $token;
    // public $active = 0;
    public $idRole = 3;

    public function __construct() {
        parent::__construct();
    }
    //affiche tous les utilisateur
    public function listAllUser(){
        $query = $this ->db->query("SELECT * FROM users");
        $all = $query -> fetchAll(PDO::FETCH_OBJ);
        return $all;
    }
    
    //ajout d'un nouvel utilisateur
    public function addUser(){
        $prepare = $this -> db -> prepare("INSERT INTO `users`(`pseudo`, `password`, `mail`, `idRole`) VALUE(:pseudo, :password, :mail, :idRole)");
        $prepare -> bindValue(':pseudo', $this -> pseudo, PDO::PARAM_STR);
        $prepare -> bindValue(':password', $this -> password, PDO::PARAM_STR);
        $prepare -> bindValue(':mail', $this -> mail, PDO::PARAM_STR);
        $prepare -> bindValue(':idRole', $this -> idRole, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
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
        $prepare = $this -> db -> prepare("UPDATE users SET pseudo = :pseudo, mail = :mail, address = :address, phone = :phone WHERE idUser = :idUser");
        $prepare->bindValue(":pseudo",$this->pseudo,PDO::PARAM_STR);
        $prepare->bindValue(":mail",$this->mail,PDO::PARAM_STR);
        $prepare->bindValue(":address",$this->address,PDO::PARAM_STR);
        $prepare->bindValue(":phone",$this->phone,PDO::PARAM_STR);
        $prepare->bindValue(":idUser",$this->idUser,PDO::PARAM_INT);
        if($prepare->execute()){
            return true;
        } else {
            return false;
        }
    }


    // mise a jour d'un utilisateur grâce à son id
    public function updateUserAdmin(){
        $prepare = $this -> db -> prepare("UPDATE users SET pseudo = :pseudo, mail = :mail, address = :address, phone = :phone, idRole = :idRole WHERE idUser = :idUser");
        $prepare->bindValue(":pseudo",$this->pseudo,PDO::PARAM_STR);
        $prepare->bindValue(":mail",$this->mail,PDO::PARAM_STR);
        $prepare->bindValue(":address",$this->address,PDO::PARAM_STR);
        $prepare->bindValue(":phone",$this->phone,PDO::PARAM_STR);
        $prepare->bindValue(":idRole",$this->idRole,PDO::PARAM_INT);
        $prepare->bindValue(":idUser",$this->idUser,PDO::PARAM_INT);
        if($prepare->execute()){
            return true;
        } else {
            return false;
        }
    }
    //verifie l'unicité d'un pseudo
    public function pseudoUnique(){
        $prepare = $this->db->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
        $prepare->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        if($prepare->execute()){
            return $pseudoUnique = $prepare->rowCount();
        }
    }
    //verifie l'unicité d'une addresse mail
    public function mailUnique(){
        $prepare = $this->db->prepare('SELECT mail FROM users WHERE mail = :mail');
        $prepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if($prepare->execute()){
            return $mailUnique = $prepare->rowCount();
        }
    }
    //renvoie un tableau avec toutes les informations d'un utilisateur grace à son id
    public function listOneUser(){
        $prepare = $this->db->prepare("SELECT * FROM `users` WHERE idUser = :idUser");
        $prepare->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        if($prepare->execute()){
            $listOneUser = $prepare->fetch(PDO::FETCH_OBJ);
            return $listOneUser;
        } else {
            return false;
        }
    }

    public function connectUser(){
        $prepare = $this->db->prepare("SELECT `idUser`, `password`, `idRole` FROM `users` WHERE `pseudo` = :pseudo");
        $prepare->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        if ($prepare->execute()) {
            return $result = $prepare->fetch(PDO::FETCH_OBJ);
        } else {
          return false;
        }
    }

    public function listAll(){
        $query = $this->db->query("SELECT users.idUser idUser, users.pseudo pseudo, r.idRecipe,idRecipe, r.name recipe, r.description description,COUNT(s.step) step FROM users RIGHT JOIN recipe r USING(idUser) JOIN step s USING(idRecipe) GROUP BY r.idRecipe, r.name, users.idUser, users.pseudo");
        return $result = $query->fetchAll(PDO::FETCH_OBJ);
    }

}
