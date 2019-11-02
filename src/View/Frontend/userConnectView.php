<?php $title = 'Connexion au site du GBAF'; ?>
<?php ob_start(); ?>

<form method="POST" action="../../../public/index.php?access=userConnect">
    <fieldset>
        <legend>Legend</legend>
        <div class="form-group row">
        <div class="form-group">
            <label for="username">Pseudo</label>
            <input type="text" class="form-control" id="username" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </fieldset>
</form>
<? $content = ob_get_clean(); ?>
<?php require('template.php') ?>

