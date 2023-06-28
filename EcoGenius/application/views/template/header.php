<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="<?php echo site_url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" media="all">
  <link href="<?php echo site_url('assets/css/footer.css'); ?>" rel="stylesheet" media="all">
  <link rel="stylesheet" href=<?php echo site_url('assets/bootstrap-icons/font/bootstrap-icons.css'); ?>>
  <link rel="stylesheet" href=<?php echo site_url('assets/animate.css/animate.min.css'); ?>>
  <script src="<?php echo site_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo site_url('assets/js/accueilJs.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary barreNavigation" style="position: sticky; top: 0%; width: 100%; heigth: 20pc; z-index: 10; background-color: #05352C;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('accueilController'); ?>"><img src="<?php echo site_url('assets/images/logo.png') ?>" width="80"></a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Link2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Link4</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="boutonAccueil" type="submit" style="width: 15pc;">RECHERCHE</button>
        </form>
        <!-- MODAL -->
        <!-- Bouton -->
        <input type="submit" name="personnalier" value="PERSONNALISER " class="boutonAccueil" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: 3pc; ">
        <!-- Bouton -->
        <!-- MODAL -->

      </div>
    </div>
  </nav>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(192, 204, 202);">
          <h5 class="modal-title">NOS PRODUITS</h5>
        </div>
        <div class="modal-body">
          <ul>
            <?php foreach ($lesCategorieProduitParProduit as $categorie) { ?>
              <form method="post" action="<?php echo site_url(); ?>/processController">
                <input type="hidden" value="<?php echo $categorie['idcategorieproduit']; ?>" id="categorieDeSac" name="categorieDeSac">
                <li>
                  <input type="submit" name="open_frame" class="boutonAccueil" value="<?php echo $categorie['nomcategorieproduit']; ?>" style="width: 20pc; margin:10px">
                </li>
              </form>
            <?php } ?>
          </ul>
        </div>
        <div class="modal-footer" style="background-color: rgb(192, 204, 202);">
          <p class="card-text"><small class="text-body-secondary">PERSONNALISATION</small></p>
        </div>
      </div>
    </div>
  </div>