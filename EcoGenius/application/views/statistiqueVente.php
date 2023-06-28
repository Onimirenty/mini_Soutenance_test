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
    <a href="<?php echo site_url('Statistique/index');?>"><button class="active">Ventes</button></a>
    <a href="<?php echo site_url('Statistique/statCommande');?>"><button>Commandes</button></a>
    <a href="<?php echo site_url('Statistique/statRecette');?>"><button>Recettes</button></a>
    <a href="<?php echo site_url('Statistique/statBenefice');?>"><button>Bénéfices</button></a>
    <a href="<?php echo site_url('Statistique/statProduction');?>"><button>Production</button></a>
    </div>
    <h1>Statistiques de ventes</h1>
    <table>
      <tr>
        <th>Mois</th>
        <th>Nombre de ventes</th>
        <th>Montant des ventes</th>
        <th>Variation</th>
        <th>Évolution</th>
      </tr>
      <tr>
        <td class="month">Janvier</td>
        <td>100</td>
        <td>$10,000</td>
        <td>+20%</td>
        <td class="chart"><div class="bar" style="width: 60%;"></div></td>
      </tr>
      <tr>
        <td class="month">Février</td>
        <td>120</td>
        <td>$12,500</td>
        <td>-10%</td>
        <td class="chart"><div class="bar" style="width: 30%;"></div></td>
      </tr>
      <!-- Ajoutez les autres mois ici -->
    </table>
  </div>
</body>
</html>
