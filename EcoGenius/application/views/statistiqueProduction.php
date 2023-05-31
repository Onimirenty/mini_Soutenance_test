<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Statistiques</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/statistique.css');?>">
</head>
<body>
  <div class="container">
    <div class="buttons">
    <a href="<?php echo site_url('Statistique/index');?>"><button>Ventes</button></a>
    <a href="<?php echo site_url('Statistique/statCommande');?>"><button>Commandes</button></a>
    <a href="<?php echo site_url('Statistique/statRecette');?>"><button>Recettes</button></a>
    <a href="<?php echo site_url('Statistique/statBenefice');?>"><button>Bénéfices</button></a>
    <a href="<?php echo site_url('Statistique/statProduction');?>"><button class="active">Production</button></a>   
</div>
    <h1>Statistiques de production</h1>
    <table>
      <tr>
        <th>Mois</th>
        <th>Nombre total de produits fabriqués</th>
        <th>Nombre de produits vendus</th>
        <th>Variation de la production</th>
        <th>Evolution</th>
      </tr>
      <tr>
        <td class="month">Janvier</td>
        <td>50</td>
        <td>30</td>
        <td>+20%</td>
        <td class="chart"><div class="bar" style="width: 60%;"></div></td>
      </tr>
      <tr>
        <td class="month">Fevrier</td>
        <td>100</td>
        <td>94</td>
        <td>+40%</td>
        <td class="chart"><div class="bar" style="width: 80%;"></div></td>
      </tr>
      <!-- Ajoutez les autres mois ici -->
    </table>
  </div>
</body>
</html>
