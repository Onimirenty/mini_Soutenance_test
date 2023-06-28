<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap-grid.min.css"); ?>  ">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/detail_commande.css"); ?> ">
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>  "></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1 logo ">
                <img src="<?php echo base_url("assets/image/1.png") ; ?>" class="card-img-top" alt="Image">
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row  ">
            <div class="col-sm-2"> </div>
            <div class="col-sm-5">
                <div class=" titre ">
                    <?php  echo $detail_produit[0]['nomsouscategorieproduit'] ?>
                </div>
                <div class="description"><?php echo $detail_produit[0]['description'] ?></div> 
                <div class="row">
                    <div class="col-sm-2 prix" >Prix </div> 
                </div>
                <div class="row">
                    <div class="col-sm-2" ></div>
                    <div class="col-sm-8 prix_valeur"> <?php echo $nombre_formate = number_format($detail_produit[0]['prix'], 0, ',', ' ');  ?> Ariary</div>
                </div>
                <div class="row">
                    <div class="col-sm-2" ></div>
                    <div class="col-sm-5 boutton_acheter" > 
                        <button type="submit"> Acheter</button>
                    </div> 
                </div>
            </div>     
            <div class="col-sm-3 description_image image_produit"> <img src="<?php echo base_url("assets/image/".$image_produit[0]['photo']) ; ?>" class="card-img-top" alt="Image"></div>
        </div>
    </div>
   
    <div class="container">
        <div class="row   suggestion">
            <div class="col-sm-2"> </div>
            <div class="col-sm-5"> Suggestion</div>
        </div>
    </div>
  
    <div class="container">
        <div class="row produit_a_suggerer">
            <div class="col-sm-2 "> </div>
            <div class="col-sm-2 produit lien_suggestion"> <a href="#"> <img src="<?php echo base_url("assets/image/1.png") ; ?>" class="card-img-top" alt="Image"></a>   </div>
            <div class="col-sm-1 "> </div>
            <div class="col-sm-2 produit lien_suggestion">  <img src="<?php echo base_url("assets/image/1.png") ; ?>" class="card-img-top" alt="Image"> </div>
            <div class="col-sm-1 "> </div>
            <div class="col-sm-2 produit lien_suggestion">  <img src="<?php echo base_url("assets/image/1.png") ; ?>" class="card-img-top" alt="Image"> </div>
        </div>
    </div>


    
  

      
      
      
      
      
      
    
</body>
</html>