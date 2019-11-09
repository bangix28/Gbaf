<?php $title = 'Ajouter un acteur/partenaire !'; ?>
<?php ob_start()    ?>
<section class="col-12">
    <form method="POST" enctype="multipart/form-data" class="text-center">
        <div class="form-group">
            <label for="name">Nom de l'acteur/partenaire</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-control">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control" placeholder="Ajouter un logo ici !" />
        </div>
        <div class="form-control">
            <label for="title">Titre de votre déscription</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-control">
            <label for="description">description de l'acteur/partenaire</label>
            <input type="text" class="form-control" name="description">
        </div>
    </form>
</section>
<?php $content = ob_get_clean() ?>
<?php require '../Frontend/template.php'; ?>
