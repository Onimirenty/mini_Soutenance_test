<?php 
    $Element = array();

    if(isset($tableau))
    {
        $Element = array_values($tableau);
    }else{
        $Element[0]['Nom'] = 'Produit 1';
        $Element[0]['Prix'] = 19;

        $Element[1]['Nom'] = 'Produit 2';
        $Element[1]['Prix'] = 40;

        $Element[2]['Nom'] = 'Produit 3';
        $Element[2]['Prix'] = 10;

        $Element[3]['Nom'] = 'Produit 4';
        $Element[3]['Prix'] = 5;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>EcoGenius</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" style="text/css" href="../assets/css/Panier.css">
    <link rel="stylesheet" href="../assets/bootstrap-3.3.6-dist/css/bootstrap.min.css" />

</head>
<body class="overflow-x-hidden">

    <div class="container-fluid">

        <div class="row no-gutters">

            <div class="col-md-8 details">

                <?php if (!empty($Element)) { ?>
                    <?php for($i = 0 ; $i < count($Element) ; $i++) { ?>                                          
                    <ul class="custom-list-inline">
                        <li class="list-inline-item mr-5 detailsphoto">
                            <img src="../assets/image/1.png" alt="" height=120 width=120>
                            <?php echo $Element[$i]['Nom'] ; ?>
                        </li>
                        <li class="det">
                            <span class="prix-chacun"><?php echo $Element[$i]['Prix'] ; ?></span> ariary
                        </li>
                        <li class="det">
                            <button class="btn-minus operateur"> - </button>
                            <span class="quantite">1</span>
                            <button class="btn-plus operateur"> + </button>
                        </li>
                        <li class="det">
                            <button class="btn btn-custom">
                                Supprimer
                                <!-- <a href="<?php echo base_url('welcome/supprimer?key='.$i.'&'.http_build_query(array('tableau' => $Element))) ?>"> Supprimer </a> -->
                            </button>
                        </li>
                    </ul>
                    <hr>
                    <?php } ?>
                <?php } ?>

            </div>

            <div class="col-md-4 Latotal ">
                <div class=image>
                    <p><img src="../assets/image/1.png" alt="" height=350 width="350"></p>
                </div>
                <div class="PrixTotal">
                    Total : <span id="PrixTotal">0</span>ar
                </div>
                <div class="BouttonLatotal">
                    <input type="submit" value="Confirmer" id="btn-Confirmer" class="btn-Confirmer btn-light">
                </div>
            </div>
        </div>
    </div>

    <script>
        function somme(prix, quantite){
            let total = 0;
            for (let i = 0; i < prix.length; i++) {
                total += parseInt(prix[i].textContent) * parseInt(quantite[i].textContent);
            }
            return total;
        }

        document.addEventListener("DOMContentLoaded", function () {
            var btnPlus = document.querySelectorAll(".btn-plus");
            var quantites = document.querySelectorAll(".quantite");
            var prixChacun = document.querySelectorAll(".prix-chacun");
            var prixTotal = document.getElementById("PrixTotal");

            var btnMinus = document.querySelectorAll(".btn-minus");

            for (var i = 0; i < btnPlus.length; i++) {
                btnPlus[i].addEventListener("click", function () {
                    var index = Array.from(btnPlus).indexOf(this);
                    var quantite = parseInt(quantites[index].textContent);
                    quantite++;
                    quantites[index].textContent = quantite;
                    prixTotal.textContent = somme(prixChacun, quantites);

                    sauvegarderPanier(quantites);
                });
            }

            for (var i = 0; i < btnMinus.length; i++) {
                btnMinus[i].addEventListener("click", function () {
                    var index = Array.from(btnMinus).indexOf(this);
                    var quantite = parseInt(quantites[index].textContent);
                    if (quantite > 1) {
                        quantite--;
                        quantites[index].textContent = quantite;
                        prixTotal.textContent = somme(prixChacun, quantites);

                        sauvegarderPanier(quantites);
                    }
                });
            }

            // Récupérer les données du panier depuis le localStorage lors du chargement de la page
            var panierData = localStorage.getItem("panier");
            if (panierData) {
                var panier = JSON.parse(panierData);

                // Mettre à jour les quantités dans le DOM
                for (var i = 0; i < quantites.length; i++) {
                    quantites[i].textContent = panier.quantites[i];
                }

                prixTotal.textContent = somme(prixChacun, quantites);
            }

            prixTotal.textContent = somme(prixChacun, quantites);
        });

        function sauvegarderPanier(quantites) {
            var panier = {
                quantites: Array.from(quantites).map(function (quantite) {
                    return parseInt(quantite.textContent);
                })
            };

            localStorage.setItem("panier", JSON.stringify(panier));
        }

// Envoyer dans une autre page
        document.addEventListener("DOMContentLoaded", function () {
            var btnConfirmer = document.getElementById("btn-Confirmer");

            btnConfirmer.addEventListener("click", function () {
                // Récupérer les quantités du DOM
                var quantites = document.querySelectorAll(".quantite");
                var quantitesArray = Array.from(quantites).map(function (quantite) {
                    return parseInt(quantite.textContent);
                });

                // Créer un objet contenant le tableau Element et les quantités
                var panierData = {
                    Element: <?php echo json_encode($Element); ?>,
                    quantites: quantitesArray
                };

                // Convertir les données en chaîne JSON
                var panierDataJson = JSON.stringify(panierData);

                // Créer une requête AJAX avec XMLHttpRequest
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo base_url('welcome/confirmer'); ?>", true);
                xhr.setRequestHeader("Content-Type", "application/json");

                // Envoyer les données JSON au contrôleur
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Réponse du serveur
                            console.log(xhr.responseText);
                            var response = JSON.parse(xhr.responseText);
                        } else {
                            console.error("Une erreur s'est produite.");
                        }
                    }
                };
                xhr.send(panierDataJson);
            });
        });


    </script>

</body>
</html>
