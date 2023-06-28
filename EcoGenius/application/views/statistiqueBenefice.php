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
    <a href="<?php echo site_url('Statistique/statCommande');?>"><button>Commandes</button></a>
    <a href="<?php echo site_url('Statistique/statRecette');?>"><button>Recettes</button></a>
    <a href="<?php echo site_url('Statistique/statBenefice');?>"><button  class="active">Bénéfices</button></a>
    <a href="<?php echo site_url('Statistique/statProduction');?>"><button>Production</button></a>
    </div>
    <h1>Statistiques des benefices</h1>
    <table>
      <tr>
        <th>Mois</th>
        <th>Montant total des bénéfices réalisés</th>
        <th>Marge bénéficiaire brute</th>
        <th>Variation des bénéfices</th>
        <th>Evolution</th>
      </tr>
      <tr>
        <td class="month">Janvier</td>
        <td>$100,000</td>
        <td>$10,000</td>
        <td>+20%</td>
        <td class="chart"><div class="bar" style="width: 60%;"></div></td>
      </tr>
      <tr>
        <td class="month">Fevrier</td>
        <td>$100,000</td>
        <td>$10,000</td>
        <td>+40%</td>
        <td class="chart"><div class="bar" style="width: 80%;"></div></td>
      </tr>
      <!-- Ajoutez les autres mois ici -->
    </table>
  </div>
</body>
</html>
