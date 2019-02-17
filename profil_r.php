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

   if ( isset($_GET['id_user']) AND $_GET['id_user']>0 ) 
   {
    $getid=intval($_GET['id_user']);
    $requser=$bdd->prepare("SELECT * FROM  user WHERE id_user= ? ");
    $requser->execute(array($getid));
    $userinfo=$requser->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>PROFIL</title>
	<meta charset="utf-8"/>
</head>
<body>
<div align="center">
	
    <h2>Profil de <?php echo $userinfo['nom_user']." ".$userinfo['prenom_user'] .  "  ressortissant " ?> </h2> <br><br>
    <br>
     <?php 
     if (!empty($userinfo['avatar'])) 
     {
     ?>
        <a href="edition_user.php" ><img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="100px" ></a>
     <?php 
     }
      ?>
    <br>
    email : <?php echo $userinfo['email_user']; ?>
    <br><br>
	<?php 
	    if ( isset($_SESSION['id_user']) AND $userinfo['id_user']==$_SESSION['id_user']) 
	    {
        ?>
	       <a href="edition_user.php">Editer mon Profil </a>
           <a href="deconnection_user.php">Se déconnecter ! </a>
	    <?php
         } 
         ?>
</div>
<a href="inscription_ressortissant.php">Saisir ses coordonnees</a>
<a href="index.php"><b><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
</body>
</html>
<?php 
}
else
header("Location: connection_user.php");
 ?>