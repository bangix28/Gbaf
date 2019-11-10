<?php $title = 'Acteur'; ?>
<?php ob_start(); ?>

        <section class="container-fluid h-100  text-dark">
            <div class="row justify-content-center align-items-center">
                 <img src="?">
            </div>
            <div class="offset-2 col-10 p-3">
                <h2 class="lead"><a href="?">?</a></h2>
            </div>
            <div class="offset-2 col-10">
                <p class="lead p-5"> LOREUM ipseum</p>
            </div>
        </section>
        <section class="container-fluid h-100  text-dark">
            <div class="row justify-content-center align-items-center">
                <div class="offset-1 col-8 row">
                    <h2 class="col-lg-4">? de Commentaires</h2>
                    <p class="offset-2 col-3"><a href="#">Nouveau commentaires</a></p>
                    <p>? <a href="#"><img href="#"></a> <a href="#"><img href="#"></a></p>
                </div>
                <div class="offset-3 col-9">
                    <php while ($data = $comments->fetch());
                    {
                        ?>
                        <p class="col-12">Prénom: ?</p>
                        <p class="lead">Date: ?</p>
                        <p class="lead">Commentaire: ?</p>
                    <
                    }
                    ?>
                </div>
            </div>
        </section>
<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
