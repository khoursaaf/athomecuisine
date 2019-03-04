<?php
class recipe extends database
{
    public $idRecipe;
    public $name;
    public $description;
    public $difficulty;
    public $price;
    public $idUser;
    
    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @return boolean
     */
    public function addRecipe(){
        $prepare = $this -> db -> prepare("INSERT INTO `recipe`(`name`, `description`, `difficulty`, `price`, `idUser`) VALUE(:name, :description, :difficulty, :price, :idUser)");
        $prepare -> bindValue(':name', $this -> name, PDO::PARAM_STR);
        $prepare -> bindValue(':description', $this -> description, PDO::PARAM_STR);
        $prepare -> bindValue(':difficulty', $this -> difficulty, PDO::PARAM_INT);
        $prepare -> bindValue(':price', $this -> price, PDO::PARAM_INT);
        $prepare -> bindValue(':idUser', $this -> idUser, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
        }
    }
    /**
     * récupère le dernier id inséré dans la base de données
     * @return type
     */
    public function lastId(){
        return $this->db->lastInsertId();
    }
    /**
     * Retourne un tableau contenant toute les recette de l'utilisateur
     * @return type
     */
    public function listMyRecipe(){
        $prepare = $this->db->prepare('SELECT * FROM recipe WHERE idUser = :idUser');
        $prepare->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $prepare->execute();
        $all = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function recipeByIdRecipe(){
        $prepare = $this->db->prepare('SELECT * FROM recipe WHERE idRecipe = :idRecipe');
        $prepare->bindValue(':idRecipe', $this->idRecipe, PDO::PARAM_INT);
        $prepare->execute();
        $recipe = $prepare->fetch(PDO::FETCH_OBJ);
        return $recipe;
    }
    /**
     * recherche d'une recette grâce au nom de la recette
     * @return type
     */
    public function recipeByName(){
        $prepare = $this->db->prepare('SELECT * FROM recipe WHERE name = :name');
        $prepare -> bindValue(':name', $this -> name, PDO::PARAM_STR);
        $result = $prepare -> fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /**
     * Modifie une recette grâce à son id
     * @return boolean
     */
    public function updateRecipe(){
        $prepare = $this -> db -> prepare('UPDATE `recipe` SET `name` = :name, `description` = :description, `difficulty` = :difficulty, price = :price WHERE `idRecipe` = :idRecipe');
        $prepare -> bindValue(':name', $this -> name, PDO::PARAM_STR);
        $prepare -> bindValue(':description', $this -> description, PDO::PARAM_STR);
        $prepare -> bindValue(':difficulty', $this -> difficulty, PDO::PARAM_INT);
        $prepare -> bindValue(':price', $this -> price, PDO::PARAM_INT);
        $prepare -> bindValue(':idRecipe', $this -> idRecipe, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
        }
    }
    /**
     * Supprime une recette grace à son id et l'id de l'utilisateur
     * @return boolean
     */
    public function deleteRecipe(){
        $prepare = $this -> db -> prepare("DELETE FROM `recipe` WHERE `idRecipe` = :idRecipe AND `idUser` = :idUser");
        $prepare -> bindValue(':idRecipe', $this -> idRecipe, PDO::PARAM_INT);
        $prepare -> bindValue(':idUser', $this -> idUser, PDO::PARAM_INT);
        if ($prepare -> execute()) {
            return true;
        }
    }
    /**
     * Retourne un tableau avec toute les recettes
     * @return type
     */
    public function fetchRecipeUser(){
        $query = $this->db->query('SELECT * FROM recipe');
        $all = $query->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

}