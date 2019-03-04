    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 m-auto">
                <div class="card" >
                    <div class="card-body">
                        <form action="" method="post" class="form-signin mt-4">
                        <?php
                            if(isset($listIngredients)){
                                foreach ($listIngredients as $value) {
                        ?>
                            <div class="form-text text-muted">
                                <p><?= $value->ingredients;?></p> 
                            </div>
                        <?php
                            }
                        }
                        ?>
                            <label for="inputIngredient" class="sr-only">Ajouter un ingredient.</label>
                            <input type="text" id="inputIngredient" name="inputIngredient" class="form-control mt-4" placeholder="Ajouter un ingredient." autofocus>
                            <small class="form-text text-muted mb-2 ml-2">Example : 300g de viande de dragon rouge.</small>
                            <button class="btn btn-lg btn-light btn-block button_all" type="submit" name="submitIngredient">Ajouter un ingredients</button>
                            <button class="btn btn-lg btn-light btn-block button_all" type="submit" name="submitStep">Ajouter les étapes</button>
                            <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>