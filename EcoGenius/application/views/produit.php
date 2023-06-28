<?php
defined('BASEPATH') or exit('No direct script access allowed');
$baseUrl = site_url();
$NP = "Nom du produit";
$NPC = "Nom de la catégorie";
$NSC = "Nom de la sous-catégorie";
$Desc = "Description";
$prix = "Prix";
$photos = "Photos";
$nombre = "Nombre";
$idtab = array();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/produit.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/bootstrap.minrenty.css" type="text/css">
    <script src="<?php echo $baseUrl; ?>assets/js/index.js"></script>

    <title>Produit</title>
</head>

<body>
    <div class="sidebar">
        <button class="btn1 responsive-button btn btn-primary" onclick="toggleMenu()">&#9776;</button>
        <ul class="menu">
            <li class="menu-item">À propos</li>
            <li class="menu-item">Services</li>
            <li class="menu-item">Contact</li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <h1 class='title1'>Liste des produits</h1>
                </center>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <?php echo $NP; ?>
                            </th>
                            <th>
                                <?php echo $NPC; ?>
                            </th>
                            <th>
                                <?php echo $NSC; ?>
                            </th>
                            <th>
                                <?php echo $Desc; ?>
                            </th>
                            <th>
                                <?php echo $prix; ?>
                            </th>
                            <th>
                                <?php echo $photos; ?>
                            </th>
                            <th>
                                <?php echo $nombre; ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produits as $produit):
                            $idtab = array(
                                'idProduit' => $produit->idproduit,
                                'idCategorieProduit' => $produit->idcategorieproduit,
                                'idSousCategorieProduit' => $produit->idsouscategorieproduit,
                                'idPhotoProduit' => $produit->idsouscategorieproduit
                            );
                            ?>
                            <tr>
                                <td>
                                    <?php echo $produit->nomproduit; ?>
                                </td>
                                <td>
                                    <?php echo $produit->nomcategorieproduit; ?>
                                </td>
                                <td>
                                    <?php echo $produit->nomsouscategorieproduit; ?>
                                </td>
                                <td>
                                    <?php echo $produit->description; ?>
                                </td>
                                <td>
                                    <?php echo $produit->prix; ?>
                                </td>
                                <td>
                                    <?php echo $produit->photo; ?>
                                </td>
                                <td>
                                    <?php echo $produit->nombresouscategorie; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


</body>

</html>