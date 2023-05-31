<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets\bootstrap\css\bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets\css\search.css');?>">
</head>
<body>
    <div class="container">
      <form action="<?php echo base_url('RechercheController/rechercheDetaille');?>" method="get">
          <div class="row" style="margin-top: 208px; margin-left: 50px;">
            <div class="col-md-5 col-sm-5">
                <div class="row searchDiv">
                  <select name="idProduit" id="" class="searchCheckBox">
                  <?php for($i=0;$i<count($listProduit);$i++){ ?>  
                  <option value="<?php echo $listProduit[$i]['nomproduit'] ?>"><?php echo $listProduit[$i]['nomproduit'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="row searchDiv">
                  <select name="idCategorieProduit" id="" class="searchCheckBox">
                  <?php for($i=0;$i<count($listCategorieProduit);$i++){ ?>  
                  <option value="<?php echo $listCategorieProduit[$i]['nomcategorieproduit'] ?>"><?php echo $listCategorieProduit[$i]['nomcategorieproduit'] ?></option>
                    <?php } ?>
                  </select>
                  </select>
                </div>
            </div>

            <div class="col-md-5 col-sm-5">
              <div class="row searchDiv">
                <input type="text" name="prix1" class="searchCheckBox" placeholder="Prix minimal">
              </div>

              <div class="row searchDiv">
                <input type="text" name="prix2" class="searchCheckBox" placeholder="Prix maximal">
              </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-5 col-sm-5 col-md-offset-2 col-sm-offset-5">
              <input type="textarea" name="description" class="searchCheckBox" placeholder="Description">
            </div>
          </div>

          <div class="row">
            <div class="col-md-5 col-sm-5 col-md-offset-2 col-smd-offset-2 boutonDiv">
              <button type="submit" class="btn btn-default bouton">Submit</button>
            </div>
          </div>
          </form>
    </div>
</body>
</html>