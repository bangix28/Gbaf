<?php $title = 'Acceuil du Gbaf'; ?>
<?php ob_start(); ?>
<div class="col-lg-12">
    <div class="col-lg-2 col-sm-6">
        <img src="../../../public/images/logo.png">
    </div>
    <div class="col-lg-4 text-center">
        <img src="">
        <p class="lead"><?= $fullname ?></p>
        </div>
    <section>
        <div class="col-lg-12">
          <!-- Uncomment when  separator are find.  <img src=""> !-->
        </div>
        <div class="col-12">
            <h1 class="leads">Lorem ipseum......</h1>
        </div>
            <div class="col-12">
            <!-- Uncomment when  separator are find.  <img src=""> !-->
        </div>
    </section>
    <section class="container">
        <?php while ($data = $partner->fetch())
        {
            ?>

        <article class="col-lg-10 justify-content-center">
            <div class="col-4">
                <img src="<?= $logo ?>">
            </div>
            <div class="col-lg-6">
                <h3><?= $description ?></h3>
            </div>
            <a href="../../../public/index.php?access=actorView&amp;id=<?= $actorId ?>"><p class="lead">Lire la suite</p></a>
            <?php
            }
            $partner->closeCursor();
        ?>
        </article>
        <div class="col-lg-12">
            <!-- Uncomment when  separator are find.  <img src=""> !-->
        </div>
    </section>
</div>
<?php require('template.php') ?>
