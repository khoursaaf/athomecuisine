    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 m-auto">
                <div class="card" >
                    <div class="card-body">
                        <form action="" method="post" class="form-signin mt-4">
                        <?php
                        if(isset($listStep)){
                            foreach ($listStep as $value) {
                            ?>
                            <div class="form-text text-muted">
                                <p><?= $value->step;?></p> 
                            </div>
                        <?php
                            }
                        }
                        ?>
                            <label for="inputStep" class="sr-only">Ajouter une étape.</label>
                            <input type="text" id="inputStep" name="inputStep" class="form-control mt-4" placeholder="Ajouter une étape." autofocus>
                            <small class="form-text text-muted mb-2 ml-2">Example : 1 : Melanger les bouts de nuages avec la mousse de fleur.</small>
                            <input type="submit" name="submitStep" class="btn btn-lg btn-light btn-block button_all" value="Ajouter l'étape">
                            <input type="submit" name="finishRecipe" class="btn btn-lg btn-light btn-block button_all" value="Finir la recette">
                            <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
