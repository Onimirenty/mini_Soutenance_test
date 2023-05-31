<!DOCTYPE html>
<html>
<head>
    <title>Liste des clients avec leurs achats par mois</title>
</head>
<body>
    <h1>Liste des clients avec leurs achats par mois</h1>
    <table>
        <tr>
            <th>Client ID</th>
            <th>Nom</th>
            <th>Mois</th>
            <th>Total Achat</th>
        </tr>
        <?php foreach ($client as $client): ?>
        <tr>
            <td><?php echo $client->idclient; ?></td>
            <td><?php echo $client->nom; ?></td>
            <td><?php echo $client->mois; ?></td>
            <td><?php echo $client->totalachat; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
