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
        $line=$bdd->query('SELECT * FROM demandeur');
        while ($sql=$line->fetch())
        {
   $id_demand=$sql['id_demand'];
   $supprimer='<a href="supprimer.php?id_demand='.$id_demand.'">Supprimer</a>';
   $Modifier='<a href="supprimer.php?id_demand='.$id_demand.'">Modifier</a>';
   echo'<tr>';
   echo'<td>'.$sql['id_demand'].'</td>';
   echo'<td>'.$sql['nom_demand'].'</td>';
   echo'<td>'.$sql['prenom_demand'].'</td>';
   echo'<td>'.$sql['date_naissance_demand'].'</td>';
   echo'<td>'.$Modifier.'</td>';
   echo'<td>'.$supprimer.'</td>';
   echo'</tr>';
        }
        ?>    
 </table>

 </body>
 </html>