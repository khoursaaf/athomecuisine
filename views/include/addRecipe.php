    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 m-auto">
                <div class="card" >
                    <div class="card-body">
                        <form action="" method="post" class="form-signin mt-4">
                            <label for="inputRecipeName" class="sr-only">Nom de la recette</label>
                            <input type="text" id="inputRecipeName" name="inputRecipeName" class="form-control mb-2 mt-4" placeholder="Nom de la recette." autofocus>
                            <label for="inputRecipeDescription" class="sr-only">Petite description</label>
                            <textarea name="inputRecipeDescription" id="inputRecipeDescription" class="form-control mb-4" placeholder="Petite description de la recette." cols="30" rows="3"></textarea>
                            <div class="form-row">
                                <label for="inputRecipeDifficulty">Difficulté de la recette</label>
                                <select name="inputRecipeDifficulty" id="inputRecipeDifficulty" class="form-control mb-2">
                                    <option value="0"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <label for="inputRecipePrice">Prix de la recette</label>
                                <input type="number" class="form-control mb-2" name="inputRecipePrice" id="inputRecipePrice" min="0" step="any" value="0" placeholder="Prix">
                            </div>
                            <button class="btn btn-lg btn-light btn-block button_all" type="submit" name="SubmitRecipe">Ajouter les ingredients</button>
                            <button class="btn btn-lg btn-light btn-block button_all" name="inputCancel">Annuler</button>
                            <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>