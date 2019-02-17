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
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>AFFICHAGE</title>
 </head>
 <body>
 
 <table align="center" border="1" width="250px" height="200px">
 <tr><td>id</td><td>Nom</td><td>Prenom</td><td width="200px">Date de naissance</td><td>Modifier</td><td>Supprimer</td></tr>
 	<?php 
        $line=$bdd->query('SELECT * FROM ressortissant');
        while ($sql=$line->fetch())
        {
   $id_ressortissant=$sql['id_ressortissant'];
   $supprimer='<a href="supprimer_ressortissant.php?id_ressortissant='.$id_ressortissant.'">Supprimer</a>';
   $Modifier='<a href="supprimer.php?id_ressortissant='.$id_ressortissant.'">Modifier</a>';
   echo'<tr>';
   echo'<td>'.$sql['id_ressortissant'].'</td>';
   echo'<td>'.$sql['nom_ressortissant'].'</td>';
   echo'<td>'.$sql['prenom_ressortissant'].'</td>';
   echo'<td>'.$sql['born_ressortissant'].'</td>';
   echo'<td>'.$Modifier.'</td>';
   echo'<td>'.$supprimer.'</td>';
   echo'</tr>';
        }
        ?>    
 </table>

 </body>
 </html>