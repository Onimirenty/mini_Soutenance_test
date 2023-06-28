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
                            <th colspan="2"></th>
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
                                <td><button class='btn2' onclick="display_component('popupUpdate')">modifier</button></td>
                                <td><button class='btn2'
                                        onclick="deleteProduct('popupDelete', '<?php echo htmlspecialchars(json_encode($idtab)); ?>')">supprimer</button>
                                </td>
                                <!-- <td> -->
                                <?php
                                // echo htmlspecialchars(json_encode($idtab)); 
                                ?>
                                <!-- </td> -->


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="popupUpdate">
                <form method="POST" action="<?php echo $baseUrl; ?>Produit/modification" class='modificationForm'>
                    <center>
                        <p>
                            Modification du produit !
                        </p>
                        <p>
                            <label>
                                <?php echo $NP; ?>:
                            </label>
                            <input type="text" name="<?php echo $NP; ?>">
                        </p>
                        <p>
                            <label>
                                <?php echo $NPC; ?>:
                            </label>
                            <input type="text" name="<?php echo $NPC; ?>">
                        </p>
                        <p>
                            <label>
                                <?php echo $NSC; ?>:
                            </label>
                            <input type="text" name="<?php echo $NSC; ?>">
                        </p>
                        <p>
                            <label>
                                <?php echo $Desc; ?>:
                            </label>
                            <input type="text" name="<?php echo $Desc; ?>">
                        </p>
                        <p>
                            <label>
                                <?php echo $prix; ?>:
                            </label>
                            <input type="text" name="<?php echo $prix; ?>">
                        </p>
                        <p>
                            <label>
                                <?php echo $photos; ?>:
                            </label>
                            <input type="text" name="<?php echo $photos; ?>">
                        </p>
                        <p>
                            <input class='input_1' type="submit" value="modifier">
                        </p>
                        <center>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="popupDelete">
                <p>
                    Voulez-vous vraiment supprimer ce produit ?
                </p>

                <form id="deleteForm" action="<?php echo $baseUrl; ?>produitController/deletion" method="POST">
                    <input type="hidden" name="data" id="deleteData" value="">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="btn btn-secondary" onclick="toggleDeletePopup()">Annuler</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    
    // $array = json_decode(JSON.stringify(($idtab)), true);
    // print_r($array);
    ?>
</body>

</html>