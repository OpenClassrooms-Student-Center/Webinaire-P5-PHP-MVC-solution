<?php ob_start(); ?>
    <div class="container mt-5 mb-5">
        <form class="mx-auto w-50" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
            <p><?php echo $error; ?></p>
            <div class="row mt-2 mb-2">
                <div class="col-6">
                    <label for="login" class="sr-only">Identifiant</label>
                    <input type="text" id="login" name="login" class="form-control" placeholder="Identifiant" required
                           autofocus>
                </div>
                <div class="col-6">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe"
                           required>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        </form>
    </div>
<?php $content = ob_get_clean();
require 'template.php'; ?>