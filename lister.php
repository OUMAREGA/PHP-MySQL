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
<html>
	<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			table{
				width:100%;
			}
			table, th, td{
				border:solid 1px gray;
			}
		</style>
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="html-table-search.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('table.search-table').tableSearch({
					searchText:'Search Table',
					searchPlaceHolder:'Input Value'
				});
			});
		</script>
	</head>
	<body>
		<table class="search-table">
			<tr><td>id</td><td>Nom</td><td>Prenom</td><td width="200px">Date de naissance</td><td>Modifier</td><td>Supprimer</td></tr>
 	<?php 
        $line=$bdd->query('SELECT * FROM demandeur');
        while ($sql=$line->fetch())
        {
   $id_demand=$sql['id_demand'];
   $supprimer='<a href="supprimer.php?id_demand='.$id_demand.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
   $Modifier='<a href="supprimer.php?id_demand='.$id_demand.'"><i class="fa fa-pencil-square-o"></i></a>';
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
<html>