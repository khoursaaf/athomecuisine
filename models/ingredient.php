<?php
class ingredient extends database {

    public $idIngredients;
    public $ingredients;
    public $idRecipe;

    public function __construct() {
        parent::__construct();
    }
    // create
    public function addIngredient(){
        $prepare = $this->db->prepare("INSERT INTO `ingredients`(`ingredients`, `idRecipe`) VALUE(:ingredients,:idRecipe)");
        $prepare->bindValue(':ingredients', $this->ingredients, PDO::PARAM_STR);
        $prepare->bindValue(':idRecipe', $this->idRecipe, PDO::PARAM_INT);
        if($prepare->execute()){
            return true;
        }
    }
    // read
    public function listIngredients(){
        $prepare = $this->db->prepare("SELECT * FROM ingredients WHERE idRecipe = :idRecipe");
        $prepare->bindValue(':idRecipe', $this->idRecipe, PDO::PARAM_INT);
        if ($prepare->execute()) {
            return $listIngredients = $prepare->fetchAll(PDO::FETCH_OBJ);
        }
    }
    // update
    public function updateIngredients(){
        $prepare = $this->db->prepare("UPDATE ingredients SET ingredients = :ingredients WHERE idIngredients = :idIngredients");
        $prepare->bindValue(':idIngredients', $this -> idIngredients, PDO::PARAM_INT);
        if ($prepare->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // delete
    public function deleteIngredient(){
        $prepare = $this->db->prepare("DELETE FROM ingredients WHERE idIngredients = :idIngredients");
        $prepare->bindValue(':idIngredients', $this->idIngredients, PDO::PARAM_INT);
        if ($prepare->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
?>