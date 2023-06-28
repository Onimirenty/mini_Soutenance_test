<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets\css\loginCss.css');?>">
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <div class="box">

            <div class="boite_info">
                <h1>WELCOME</h1>
            </div>
            
            <div class="boite_Boutton">
                <h1>Login</h1>
                <form action="<?php echo site_url('Welcome/verificationLogin');?>" method="Post">
                    <div class="form_input">
                        <label for="">Email</label>    
                        <input type="text" name="mail">
                    </div>
                    <div class="form_input">
                        <label for="">Password</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="Log in">
                </form>
            </div>
        </div>

    </div>

</body>
</html>