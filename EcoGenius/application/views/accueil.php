<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p><a href="<?php echo site_url("Welcome/detailProduit"); ?>">detail produit</a></p> 
    <p><a href="<?php echo site_url("Welcome/panier"); ?>">Panier</a></p>
    <p><a href="<?php echo site_url("RechercheController/goToRechercheAvance"); ?>">Recherche Avance</a></p>
    <h1>Admin</h1>
    <p><a href="<?php echo site_url("AdminController/achat"); ?>">Liste Client</a></p>
    <p><a href="<?php echo site_url("ProduitController/produit"); ?>">Liste Produit</a></p>
    <p><a href="<?php echo site_url("Statistique"); ?>">Liste Produit</a></p>

</html>