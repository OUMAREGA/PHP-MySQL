<?php 
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
    if (isset($_GET['id_ressortissant'])) 
   {
     $getid=intval($_GET['id_ressortissant']);
     $req=$bdd->prepare("DELETE FROM ressortissant WHERE id_ressortissant = ?");
     $req->execute(array($getid));
     //header("Location: lister_demandeur.php");
 }
?>