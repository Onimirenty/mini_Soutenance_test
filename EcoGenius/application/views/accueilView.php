<title>Accueil</title>
<link href="<?php echo site_url('assets/css/accueilView.css'); ?>" rel="stylesheet" media="all">
<style>
    body {
        background-color: rgb(192, 204, 202);
    }
</style>
<center>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" style="padding-top: 5pc">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?php echo site_url('assets/images/carousel/carousel4.png') ?>" class="d-block w-80" alt="Image introuvable">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?php echo site_url('assets/images/carousel/carousel1.png') ?>" class="d-block w-80" alt="Image introuvable">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo site_url('assets/images/carousel/carousel5.png') ?>" class="d-block w-80" alt="Image introuvable">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev align-items-center justify-content-center d-none d-lg-flex" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next align-items-center justify-content-center d-none d-lg-flex" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</center>
<div class="container">
    <h1 class="text-center p-5 mb-5 mt-5">Pourquoi l' ananas ?</h1>
    <div class="row">
        <div class="col-md-6 p-5 mb-5" style="background-color:#05352C; color: white">
            <p>
                L'objectif de ce projet est de favoriser et de mettre en vogue l'usage du cuir végétal.
                de diminuer les déchets, de créer de l'emploi, de vulgariser l'e-commerce à Madagascar
                , mettre en valeur le talent des stylistes malagasy
            </p>
        </div>
        <div class="col-md-6 bg-dark-subtle p-5 mb-5">
            <p>
                Les feuilles d' ananas sont biodégradables.
                Elles ont une forte résistance.
            </p>
            <button class="boutonAccueil">En savoir plus</button>
        </div>
    </div>
    <h2 id="produitsTitre" class="fs-1 p-5 mt-5 mb-5 text-center">DES PRODUITS DE NOS LOCAUX</h2>

</div>
<div class="milieuAccueil" style="width:100%;">
    <div class="col" style="height:100%; position:sticky; top:12%; bottom: 100%;">
        <div class="card" style="width: 28pc;margin-left: 5pc; text-align:left; color: rgb(5, 53, 44);padding-top:1pc; padding-left:1pc;  ">
            <ul class="list-unstyled social-list">
                <?php
                for ($i = 0; $i < count($lesProduits); $i++) { ?>
                    <a href="#" class="animate__animated" onmouseover="animateIn(this)" onmouseout="animateOut(this)">
                        <?php echo '<li><h4>';

                        // Vérifier le nom du produit pour afficher l'icône correspondante
                        if ($lesProduits[$i]['nomproduit'] == 'shampooing') {
                            echo '<i class="fas fa-wine-bottle icon"></i>&nbsp;';
                        } elseif ($lesProduits[$i]['nomproduit'] == 'sac') {
                            echo '<img src="assets/bootstrap-icons/icons/bag-heart-fill.svg" alt="1" width="30px">&nbsp;';
                        }

                        echo (strtoupper($lesProduits[$i]['nomproduit'])) ?></a>
                    <?php echo '</h4>';

                    // Parcourir les catégories de produit correspondant à l'id du produit
                    foreach ($lesCategorieProduitParProduit as $categorie) {
                        if ($categorie['idproduit'] == $lesProduits[$i]['idproduit']) { ?>
                            <p style="padding-left:2pc;"><a href="#"><?php echo (ucfirst($categorie['nomcategorieproduit'])) ?></a></p>
                <?php }
                    }

                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row col-md-8" style="margin-right: 3pc">
        <?php for ($i = 0; $i < count($tousLesProduitsParSousCategorieProduit); $i++) { ?>
            <div class="col-md-6 card-case">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <?php for ($j = 0; $j < count($toutesLesPhotosParIdsouscategorieProduit); $j++) { ?>
                                <?php if ($toutesLesPhotosParIdsouscategorieProduit[$j]['idsouscategorieproduit'] == $tousLesProduitsParSousCategorieProduit[$i]['idsouscategorieproduit']) { ?>
                                    <img src="<?php echo ('assets/images/' . $toutesLesPhotosParIdsouscategorieProduit[$j]['photo']); ?>" alt="Image introuvable" class="img-fluid card-img">
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo (strtoupper($tousLesProduitsParSousCategorieProduit[$i]['nomsouscategorieproduit'])); ?></h5>
                                <p class="card-text"><?php echo (ucfirst($tousLesProduitsParSousCategorieProduit[$i]['description'])); ?></p>
                                <p>
                                <form method="post" action="<?php echo site_url(); ?>/accueilController/garderValeurAEnvoyer">
                                    <input type="hidden" value="<?php echo (htmlentities(json_encode($tousLesProduitsParSousCategorieProduit[$i]))); ?>" name="produit" id="produit">
                                    <center><input type="submit" class="boutonAccueil" value="Ajouter au panier"></center>
                                </form>
                                </p>
                                <br>
                                <p>
                                <form method="post" action="<?php echo site_url(); ?>">
                                    <input type="hidden" value="<?php echo ($tousLesProduitsParSousCategorieProduit[$i]); ?>" name="produit" id="produit">
                                    <center><input type="submit" class="boutonAccueil" value="Détails"></center>
                                </form>
                                </p>
                                <br>
                                <p class="card-text"><small class="text-body-secondary"><?php echo (ucfirst($tousLesProduitsParSousCategorieProduit[$i]['nomcategorieproduit'])); ?></h5>
                                    </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-6 sidebar">
        </div>
    </div>
</div>