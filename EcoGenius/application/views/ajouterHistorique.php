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
    
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/produit.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/bootstrap.minrenty.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/ajoutHistoriqueProduit.css" type="text/css">
    
    <script src="<?php echo $baseUrl; ?>assets/js/index.js"></script>

    <title>ajout historique Produit</title>
</head>

<body>
    <form action="<?php echo site_url('HistoriqueProduitController/ajouterHistorique'); ?>" method="post">
        <label for="id_matiere_premiere">ID Matière Première:</label>
        <input type="text" name="id_matiere_premiere" required>

        <label for="date">Date:</label>
        <input type="date" name="date" required>

        <label for="quantite">Quantité:</label>
        <input type="text" name="quantite" required>
        
        <label for="id_mouvement">ID Mouvement:</label>
        <input type="text" name="id_mouvement" required>
        
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>