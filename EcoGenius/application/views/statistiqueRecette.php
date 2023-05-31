<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Statistiques des recettes</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/statistique.css');?>">
</head>
<body>
  <div class="container">
    <div class="buttons">
    <a href="<?php echo site_url('Statistique/index');?>"><button>Ventes</button></a>
    <a href="<?php echo site_url('Statistique/statCommande');?>"><button>Commandes</button></a>
    <a href="<?php echo site_url('Statistique/statRecette');?>"><button class="active">Recettes</button></a>
    <a href="<?php echo site_url('Statistique/statBenefice');?>"><button>Bénéfices</button></a>
    <a href="<?php echo site_url('Statistique/statProduction');?>"><button>Production</button></a>
    </div>
    <h1>Statistiques des recettes</h1>
    <table>
      <tr>
        <th>Mois</th>
        <th>Montant total des recettes générées</th>
        <th>Répartition des recettes par source</th>
      </tr>
      <tr>
        <td class="month">Janvier</td>
        <td>$100</td>
        <td>ventes en ligne</td>
      </tr>
      <tr>
        <td class="month">Février</td>
        <td>$12,500</td>
        <td>ventes en magasin</td>
      </tr>
      <!-- Ajoutez les autres mois ici -->
    </table>
  </div>
</body>
</html>
