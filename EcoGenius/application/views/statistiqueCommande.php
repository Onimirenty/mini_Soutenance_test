<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Statistiques de ventes</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/statistique.css');?>">
</head>
<body>
  <div class="container">
    <div class="buttons">
    <a href="<?php echo site_url('Statistique/index');?>"><button>Ventes</button></a>
    <a href="<?php echo site_url('Statistique/statCommande');?>"><button class="active">Commandes</button></a>
    <a href="<?php echo site_url('Statistique/statRecette');?>"><button>Recettes</button></a>
    <a href="<?php echo site_url('Statistique/statBenefice');?>"><button>Bénéfices</button></a>
    <a href="<?php echo site_url('Statistique/statProduction');?>"><button>Production</button></a>
    </div>
    <h1>Statistiques des commandes</h1>
    <table>
      <tr>
        <th>Mois</th>
        <th>Nombre total de commandes passées</th>
        <th>Montant total des commandes passées</th>
        <th>Commandes en attente de traitement</th>
        <th>Commandes expédiées/livrées</th>
      </tr>
      <tr>
        <td class="month">Janvier</td>
        <td>100</td>
        <td>$10,000</td>
        <td>20</td>
        <td>20</td>
      </tr>
      <tr>
        <td class="month">Février</td>
        <td>120</td>
        <td>$12,500</td>
        <td>10</td>
        <td>10</td>
      </tr>
      <!-- Ajoutez les autres mois ici -->
    </table>
  </div>
</body>
</html>
