<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets\css\signUpCss.css');?>">
    <title>Sign Up</title>
</head>
<body>
    
    <div class="container">
        <div class="box">

            <div class="boite_info">
                <h1>Let's get Started</h1>
            </div>
            
            <div class="boite_Boutton">
                <h1>Sign Up</h1>
                <form action="<?php echo site_url('Welcome/inscription');?>" method="Post" onsubmit="return verificationMotDePasseConfirmation()">
                    <div class="groupe_pagination">
                        <div class="form_input">
                            <label for="">Nom</label>    
                            <input type="text" name="nom" required>
                        </div>
                        
                        <div class="form_input">
                            <label for="">Prenom</label>
                            <input type="text" name="prenom" required>
                        </div>

                        <div class="form_input">
                            <label for="">Date de Naissance</label>
                            <input type="date" name="dateDeNaissance" required>
                        </div>
                    </div>

                    <div class="groupe_pagination">
                        <div class="form_input">
                            <label for="">Numero</label>    
                            <input type="text" name="numero" required>
                        </div>
                        
                        <div class="form_input">
                            <label for="">Email</label>
                            <input type="text" name="mail" required>
                        </div>

                        <div class="form_input">
                            <label for="">Sexe</label>
                            <select name="sexeId" id="" required>
                                <?php for($i=0;$i<count($listeSexe);$i++){?>
                                        <option value="<?php echo $listeSexe[$i]['id']; ?>"><?php echo $listeSexe[$i]['libelle']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="groupe_pagination">
                        <div class="form_input">
                            <label for="">Mot de passe</label>    
                            <input type="password" name="motDePasse" id="motDePasse">
                        </div>
                        
                        
                        <div class="form_input">
                            <label for="">Confirmation</label>
                            <input type="password" id="confirmation">
                        </div>

                        <input type="submit" value="Sign Up">
                    </div>

                    <div class="pagination_contains">
                        <div class="pagination">
                            <ul>
                                <li class="link active"><a href="#" onclick="changePage(1)">1</a></li>
                                <li class="link"><a href="#" onclick="changePage(2)">2</a></li>
                                <li class="link"><a href="#" onclick="changePage(3)">3</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function changePage(pageNumber){
             const pages=document.getElementsByClassName("groupe_pagination");
             const pagination=document.getElementsByClassName("link");
             for(let i=0;i<pages.length;i++){
                 if(i+1==pageNumber){
                     pages[i].style.display="block";
                     pagination[i].classList.add("active");
                 }else{
                    pages[i].style.display="none";
                    pagination[i].classList.remove("active");       //suppression de la classe active
                 }
             }
        }

        changePage(1);

        function verificationMotDePasseConfirmation(){
            var motDePasse=document.getElementById("motDePasse").value;
            var confirmation=document.getElementById("confirmation").value;
            if(motDePasse!=confirmation){
                alert("les mots de passe ne correspondent pas. Veuillez réessayer.");
                return false;
            }
            
            if(motDePasse.length<6){
                alert("mot de passe trop court");
                return false;
            }
        }
    </script>

</body>
</html>