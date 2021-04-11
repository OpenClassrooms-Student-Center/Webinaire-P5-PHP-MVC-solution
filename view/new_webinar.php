<?php ob_start(); ?>
    <div class="container mt-5 mb-5">
        <form class="mx-auto w-50" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Ajouter un webinaire</h1>
            <p><?php echo $error; ?></p>
            <div class="row mt-2 mb-2">
                <div class="col-12">
                    <label for="name">Nom du webinaire</label>
                    <input type="text" id="name" name="name" class="form-control" required autofocus>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for="category">Catégorie</label>
                    <select id="category" name="category" class="form-control" required>
                        <?php
                        foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="date">Date</label>
                    <input type="datetime-local" name="date" id="date" class="form-control" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <label for="link">Lien du webinaire</label>
                    <input type="text" name="link" id="link" class="form-control" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Créer le webinaire</button>
        </form>
    </div>
<?php $content = ob_get_clean();
require 'template.php'; ?>