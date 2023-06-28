<?php
defined('BASEPATH') or exit('No direct script access allowed');
$baseUrl = site_url();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/HistoriqueProduit.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/bootstrap.minrenty.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/produit.css">
    
    <script src="<?php echo $baseUrl; ?>assets/js/index.js"></script>

    <title>Historique des produits</title>
</head>

<body>
    <center>
        <h1>Historique des matières premières</h1>
        <table border=2>
            <thead>
                <tr>
                    <th>Mouvement</th>
                    <th>Matière première</th>
                    <th>Date</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiquematierepremiere as $historique): ?>
                    <tr>
                        <td>
                            <?= $historique->mouvement ?>
                        </td>
                        <td>
                            <?= $historique->nommatierepremiere ?>
                        </td>
                        <td>
                            <?= $historique->date ?>
                        </td>
                        <td>
                            <?= $historique->quantite ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h1>Historique des sous-catégories de produits</h1>
        <table border=2>
            <thead>
                <tr>
                    <th>Mouvement</th>
                    <th>Sous-catégorie de produit</th>
                    <th>Date</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiqueSouscategorieproduit as $historique): ?>
                    <tr>
                        <td>
                            <?= $historique->mouvement ?>
                        </td>
                        <td>
                            <?= $historique->nomsouscategorieproduit ?>
                        </td>
                        <td>
                            <?= $historique->date ?>
                        </td>
                        <td>
                            <?= $historique->quantite ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('HistoriqueProduitController/ajouterHistorique'); ?>">Ajouter un nouvel historique</a>
    </center>
</body>

</html>