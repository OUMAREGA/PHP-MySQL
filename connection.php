<?php // connexion a la bd 
session_start(); 
try
   {
      $bdd = new PDO('mysql:host=localhost;dbname=ambassade;charset=utf8', 'root', '',
	  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

if (isset($_POST['valider_connection'])) 
    {
    	

         $email_userconnect=htmlspecialchars($_POST['email_userconnect']);
         $password_userconnect=sha1($_POST['password_userconnect']);

         if (!empty($email_userconnect) && !empty($password_userconnect) )
         {
            $requser=$bdd->prepare("SELECT * FROM  user WHERE email_user = ? AND password_user = ? ");
            $requser->execute(  array($email_userconnect, $password_userconnect) );
            $userexist=$requser->rowCount();
            if ($userexist == 1)
            {
            	$userinfo=$requser->fetch();
            	$_SESSION['id_user']=$userinfo['id_user'];
            	$_SESSION['email_user']=$userinfo['email_user'];
            	$_SESSION['nom_user']=$userinfo['nom_user'];
            	$_SESSION['groupe_user']=$userinfo['groupe_user'];
            	
            	if($userinfo['groupe_user']=="utilisateur")
            	header("Location: profil_u.php?id_user=".$_SESSION['id_user']);
                
                elseif($userinfo['groupe_user']=="ressortissant")
            	header("Location: profil_r.php?id_user=".$_SESSION['id_user']);
               
                elseif($userinfo['groupe_user']=="admin")
                	header("Location: profil_a.php?id_user=".$_SESSION['id_user']);
            }
            else
            {
            	$notification =  "Mauvais mot de passe ou email ";
            }

         }
         else
         {
         	$notification =  "Tous les champs doivent etre complétés ";
         }

    }
?>
     


<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">

<title>Elegant Login - Designscrazed</title>
<style>
body {
    background: url('') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

.logo {
    width: 213px;
    height: 36px;
    background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}

</style>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
<form action="" method="POST" >
    <h1>Login</h1>
    <input type="text" name="email_userconnect" placeholder="Email" id="Email" />
    <input type="password" name="password_userconnect" value="" placeholder="Password" id="password" />
    <input type="submit"  name="valider_connection" value="Se Connecter !">
</form>
Vous n'avez pas encore de compte <a href="inscription.php">Identifier vous !</a>   
</div>
	</script>
<span id="elementClignotant" align="center" >
					<p>
						<h2><?php 
	    if (isset($notification)) 
	    {
	    	echo ' '.$notification ;
	    }
?></h2>
					</p>
				</span>
				<script type="text/javascript">

	function textClignotant()
{
    var element = document.getElementById('elementClignotant');
    var random = Math.round(Math.random()*5);
     
    switch (random)
    {
        case 0:
        element.style.color = "indigo";
        break;
         
        case 1:
        element.style.color = "green";
        break;
         
        case 2:
        element.style.color = "blue";
        break;
         
        case 3:
        element.style.color = "brown";
        break;
         
        case 4:
        element.style.color = "purple";
        break;
        case 5:
        element.style.color = "black";
        break;
    }
}
 
window.onload = function(){ setInterval(textClignotant, 1000); };
	</script>
</div>
</body>
</html>