<?php $title = 'Connexion au site du GBAF'; ?>

<?php ob_start(); ?>
<form method="POST" action="../../../public/index.php?access=userConnect">
        <div class="form-group row">
        <div class="form-group offset-4 col-5 text-center">
            <label for="username">Pseudo</label>
            <input type="text" class="form-control" id="username" placeholder="Pseudo">
        </div>
        <div class="form-group offset-4 col-5 text-center">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
            <div class="row">
        <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
</form>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>

