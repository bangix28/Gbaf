<?php $title = 'Ajouter un acteur/partenaire !'; ?>
<?php ob_start()    ?>
    <h1 class="lead text-center"> Creation d'un acteur/partenaire !</h1>
<section class="container-fluid h-100  text-dark">
    <div class="row justify-content-center align-items-center">
        <form method="POST" enctype="multipart/form-data" class="text-center">
            <div class="form-group">
                <label  class="control-label " for="name">Nom de l'acteur/partenaire</label >
                <input type="text" required class="form-control" name="name">
            </div>
            <div class="form-group">
                <label class="control-label" for="logo">Logo</label >
                <input type="file" required name="logo" class="form-control-file" placeholder="Ajouter un logo ici !" />
            </div>
            <div class="form-group">
                <label class="control-label"  for="link">Lien du site de votre banque !</label >
                <input type="text" required class="form-control" name="link">
            </div>
            <div class="form-group">
                <label class="control-label"  for="description">description de l'acteur/partenaire</label >
                <textarea required class="form-control" name="description" ></textarea>
            </div>
            <button type="submit">Valider !</button>
            <div class="text-center"
                <p class="col-10"><?php if (isset($message)) { echo $message; } ?></p>
            </div>
        </form>
    </div>
</section>
<?php $content = ob_get_clean() ?>
<?php require 'template.php'; ?>