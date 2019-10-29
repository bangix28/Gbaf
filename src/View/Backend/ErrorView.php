<?php ?>
<?php $title = "Erreur !"; ?>
<?php ob_start() ?>
<div class="col-lg-12">
    <p class="text-center"><?= $e ?></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Frontend/template.php'); ?>
