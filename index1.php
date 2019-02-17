<?php
try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=ambassade;charset=utf8', 'root', '');
	  $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	  $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }
catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    require 'class.auth.php';
    ob_start();
    include((isset($_GET['p']) ? $_GET['p']:'index1').'.php');
    $content_for_layout=ob_get_clean();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php echo $content_for_layout; ?>
 </body>
 </html>