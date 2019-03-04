<?php
class step extends database
{

    public $idStep;
    public $step;
    public $idRecipe;

    public function __construct() {
        parent::__construct();
    }
    // create
    public function addStep(){
        $prepare = $this -> db -> prepare("INSERT INTO `step`(`step`, `idRecipe`) VALUE(:step,:idRecipe)");
        $prepare -> bindValue(':step', $this -> step, PDO::PARAM_STR);
        $prepare -> bindValue(':idRecipe', $this -> idRecipe, PDO::PARAM_INT);
        if($prepare -> execute()){
            return true;
        }
    }
    // read
    public function listStep(){
        $prepare = $this -> db -> prepare("SELECT * FROM step WHERE idRecipe = :idRecipe");
        $prepare -> bindValue(':idRecipe', $this -> idRecipe, PDO::PARAM_INT);
        if ($prepare -> execute()) {
            return $listStep = $prepare -> fetchAll(PDO::FETCH_OBJ);
        }
    }
    // update
    public function updateStep(){
        $prepare = $this->db->prepare("UPDATE step SET step = :step WHERE idStep = :idStep");
        $prepare -> bindValue(':idStep', $this -> idStep, PDO::PARAM_INT);
        if ($prepare -> execute()) {
            return true;
        } else {
            return false;
        }
    }
    // delete
    public function deleteStep(){
        $prepare = $this -> db -> prepare("DELETE FROM step WHERE idStep = :idStep");
        $prepare -> bindValue(':idStep', $this -> idStep, PDO::PARAM_INT);
        if ($prepare -> execute()) {
            return true;
        } else {
            return false;
        }
    }

}
