<?php 
    $this->load->library('session');
    
    $Element = $this->session->userdata('elements');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EcoGenius</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" style="text/css" href="../assets/css/Panier.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="overflow-x-hidden">

    <div class="container-fluid">

        <div class="row no-gutters">

            <div class="col-md-8 details">

<!--------------------------------------------- Titre ----------------------------------------------------->
    <div> 
        <h2>Votre Panier</h2>
    </div>

    <div class="titre"> 
        <p>L'élégance éco-responsable, signée Ecogenius &#x2661; </p>
    </div>

<!--------------------------------------------- Titre ----------------------------------------------------->

                <?php if (!empty($Element)) { ?>
                    <?php for($i = 0 ; $i < count($Element) ; $i++) { ?> 

                        <?php if(isset($Element[$i])){ ?>                                   
                            <ul class="custom-list-inline">
                                <li class="list-inline-item mr-5 detailsphoto">
                                    <img class="imageProduit" src="../assets/image/1.png" alt="" height=120 width=120>
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
                                    <button class="btn btn-danger supprimer"  id="supprimer"  data-key="<?php echo $i; ?>" > 
                                        <a href="<?php echo base_url('PanierController/supprimer?key='.$i) ; ?>"> <i class="bi bi-trash icone"></i> </a>
                                    </button>
                                </li>
                            </ul>
                        <?php }  ?>

                    <hr>
                    <?php } ?>
                <?php } ?>

            </div>

            <div class="col-md-4 Latotal ">
                <div class=image>
                    <p><img src="../assets/image/1.png" alt="" style="padding-left : 14%" height=350 width="400"></p>
                </div>
                <div class="PrixTotal">
                    Total : <span id="PrixTotal">0</span>ar
                </div>
                <div class="BouttonLatotal">
                    <input type="submit" value="Confirmer" id="btn-Confirmer" class="btn btn-light">
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
                mettreAJourQuantitesLocalStorage(quantites);
            }

            prixTotal.textContent = somme(prixChacun, quantites);
            mettreAJourQuantitesLocalStorage(quantites);
        });

        function sauvegarderPanier(quantites) {
            var panier = {
                quantites: Array.from(quantites).map(function (quantite) {
                    return parseInt(quantite.textContent);
                })
            };

            localStorage.setItem("panier", JSON.stringify(panier));
        }

//Mettre a jour les quantites
        function mettreAJourQuantitesLocalStorage(quantites) {
            var panier = {
                quantites: Array.from(quantites).map(function (quantite) {
                    return parseInt(quantite.textContent);
                })
            };

            localStorage.setItem("panier", JSON.stringify(panier));
        }


// Envoyer dans une autre page
        function recupererPanier() {
            var panierJSON = localStorage.getItem("panier");
            if (panierJSON) {
                var panier = JSON.parse(panierJSON);
                return panier.quantites;
            } else {
                return [];
            }
        }

        function effacerPanier() {
            localStorage.removeItem("panier");
        }

        document.getElementById("btn-Confirmer").addEventListener("click", function() {
            var panierLocalStorage = recupererPanier(); // Récupérer les quantités du panier depuis le local storage
            var tableauPHP = <?php echo json_encode($Element); ?>;
            
            // Ajouter les quantités récupérées du local storage à chaque élément du tableau
            for (var i = 0; i < panierLocalStorage.length; i++) {
                tableauPHP[i]['Quantite'] = panierLocalStorage[i];
            }
            
            // Convertir le tableau en format JSON
            var tableauJSON = JSON.stringify(tableauPHP);

            var url = "http://localhost/EcoGenius/PanierController/recuperer";
            url += "?donnee=" + encodeURIComponent(tableauJSON);

            // effacerPanier();
            
            window.location.href = url;
        });

//Supprimer un element 

        document.addEventListener("DOMContentLoaded", function() {
        var supp = document.querySelectorAll(".supprimer");

        // Sélectionner tous les boutons de suppression
        var produit = localStorage.getItem("panier");

        console.log(" original "+produit);
        
        if (produit) {
            var pan = JSON.parse(produit);
            var copy = JSON.stringify(pan) ;

            for (var i = 0; i < supp.length; i++) {
            supp[i].addEventListener("click", function () {
                console.log(typeof pan);
                var index = this.getAttribute("data-key");
                console.log(pan);

                if (typeof pan === "object" && pan.hasOwnProperty("quantites")) {
                var quantites = pan.quantites;
                if (Array.isArray(quantites)) {
                    quantites.splice(index, 1);
                    const updatedObject = JSON.stringify(pan);
                    localStorage.setItem("panier", updatedObject);
                }
                }
            });
            }
        }
        });




    // document.getElementById("hellooo").addEventListener("click", function() {
    //         localStorage.clear();
    //         console.log("vofafa");
    // });




    </script>

</body>
</html>
