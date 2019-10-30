<?php $title = 'Connexion'; ?>
<?php ob_start() ?>
<form>
    <fieldset>
        <legend>Connexion</legend>
        <div class="form-group row">
        </div>
        <div class="form-group">
            <label for="user">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="user" placeholder="Nom d'utilisateur">      </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </fieldset>
</form>
<?php $content = ob_clean(); ?>
<?php require('template.php'); ?>
