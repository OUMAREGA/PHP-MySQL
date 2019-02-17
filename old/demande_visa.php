<?php // connexion a la bd  
session_start();
try
   {
      $bdd = new PDO('mysql:host=127.0.0.1;dbname=ambassade;charset=utf8', 'root', '',
	  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
   catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

     if (isset($_POST['valider_demand'])) // si on a valide
     {

           // securite
     	   $nom_demand=htmlspecialchars($_POST['nom_demand']);
     	   $prenom_demand=htmlspecialchars($_POST['prenom_demand']);
     	   $email_demand=htmlspecialchars($_POST['email_demand']);
     	   $date_naissance_demand=htmlspecialchars($_POST['date_naissance_demand']);
     	   $pays_origine=htmlspecialchars($_POST['pays_origine']);
     	   $lieu_naissance_demand=htmlspecialchars($_POST['lieu_naissance_demand']);
     	   $ville_origine=htmlspecialchars($_POST['ville_origine']);
     	   $fonction=htmlspecialchars($_POST['fonction']);
           $adresse_demand=htmlspecialchars($_POST['adresse_demand']);
           $motif=htmlspecialchars($_POST['motif']);
           $photo=htmlspecialchars($_POST['photo']);
           $photocopie_piece=htmlspecialchars($_POST['photocopie_piece']);
           $nombre_demand=htmlspecialchars($_POST['nombre_demand']);

     	if ( !empty($_POST['nom_demand']) && !empty($_POST['prenom_demand']) && !empty($_POST['email_demand']) && !empty($_POST['date_naissance_demand']) && !empty($_POST['pays_origine']) && !empty($_POST['lieu_naissance_demand']) && !empty($_POST['ville_origine']) && !empty($_POST['fonction']) && !empty($_POST['adresse_demand']) && !empty($_POST['motif']) && !empty($_POST['photo']) && !empty($_POST['photocopie_piece']) && !empty($_POST['nombre_demand']) )
     	  {

	  	     $insert=$bdd->prepare("INSERT INTO demandeur (nom_demand,prenom_demand,email_demand,date_naissance_demand,pays_origine,lieu_naissance_demand,ville_origine,fonction,adresse_demand,motif,photo,copie_piece,nombre_demand) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) ");
			  $insert->execute(array($nom_demand,$prenom_demand,$email_demand,$date_naissance_demand,$pays_origine,$lieu_naissance_demand,$ville_origine,$fonction,$adresse_demand,$motif,$photo,$photocopie_piece,$nombre_demand));
			  $notification="Votre demande a ete bien enregistre";
			 // redirection vers le profil adequat header("Location: lister_demandeur.php");
			//$notification="Vos donnees ont ete enregistrees ! <a href=\"connection_demand.php\">Me connecter !<a> ";
			 // 1 photo
                if ( isset($_FILES['photo']) AND !empty($_FILES['photo']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['photo']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/demandeur/".$_SESSION['photo'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephoto=$bdd->prepare('UPDATE user SET photo = :photo WHERE id_demand = :id_demand ');
                          $updatephoto->execute(array(
                                                       'photo'  => $_SESSION['photo'].".".$extensionupload,
                                                       'id_demand' => $_SESSION['id_demand']
                                                       )); 
                          
                        }
                        else
                        {
                          $notification = "Erreur pendant l'importation " ;
                        }

                      }
                      else
                      {
                        $notification = "Votre photo doit etre au format jpg, png, gif" ;
                      }

                    }
                    else
                    {
                      $notification="La taille de votre photo ne doit pas depasser 2Mo";
                    }
                }


                // 2 phototocopie_ppiece
                              
                if ( isset($_FILES['photocopie_piece']) AND !empty($_FILES['photocopie_piece']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['photocopie_piece']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['photocopie_piece']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/ressortissant/".$_SESSION[''].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['photocopie_piece']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephotocopie_piece=$bdd->prepare('UPDATE demander SET photocopie_piece = :photocopie_piece WHERE id_demand = :id_demand ');
                          $updatephotocopie_piece->execute(array(
                                                       'photocopie_piece'  => $_SESSION['photocopie_piece'].".".$extensionupload,
                                                       'id_demand' => $_SESSION['id_demand']
                                                       ));
                          
                        }
                        else
                        {
                          $notification = "Erreur pendant l'importation " ;
                        }

                      }
                      else
                      {
                        $notification = "Votre photocopie_piece doit etre au format jpg, png, gif" ;
                      }

                    }
                    else
                    {
                      $notification="La taille de votre photo ne doit pas depasser 2Mo";
                    }
                }
               // fin du traitement 	   	
					     	   	  	
       }
       else

       $notification= "Tous les champs sont obligatoires !"  ;
   }  


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>INSCRIPTION DES UTILISATEURS</title>
	<meta charset="utf-8"/>
</head>
<body>
<div align="center">
	<form action="" method="POST" > 
		<table>
		<tr>
		    <td>
			<label for="nom">Nom:</label>
			</td>
			<td>
			<input type="text" id="nom" name="nom_demand" placeholder="Votre nom">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="prenom_demand">Prenom:</label>
			</td>
			<td>
			<input type="text" id="prenom_demand" name="prenom_demand" placeholder="Votre prenom">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="email_demand">Email:</label>
			</td>
			<td>
			<input type="email" id="email_demand" name="email_demand" placeholder="exemple@xyz.com" >
			</td>
         </tr>
           

         <tr>
		    <td>
			<label for="date_naissance_demand">Date de Naissance:</label>
			</td>
			<td>
			<input type="date" id="date_naissance_demand" name="date_naissance_demand">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="pays_origine">Pays origine:</label>
			</td>
			<td>
			<?php include"pays.php" ?>
			</td>
         </tr>


         <tr>
		    <td>
			<label for="lieu_naissance_demand">Lieu de naissance:</label>
			</td>
			<td>
			<input type="text" id="lieu_naissance_demand" name="lieu_naissance_demand">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="ville_origine">Ville origine:</label>
			</td>
			<td>
			<input type="text" id="ville_origine" name="ville_origine">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="adresse_demand">Adresse:</label>
			</td>
			<td>
			<input type="text" id="adresse_demand" name="adresse_demand">
			</td>
         </tr>

        <tr>
		    <td>
			<label for="fonction">Fonction:</label>
			</td>
			<td>
			<input type="text" id="fonction" name="fonction">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="motif">Motif voyage:</label>
			</td>
			<td>
			<input type="text" id="motif" name="motif">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="photocopie_piece">Photocopie de la piece:</label>
			</td>
			<td>
			<input type="file" id="photocopie_piece" name="photocopie_piece">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="photo">Photo :</label>
			</td>
			<td>
			<input type="file" id="photo" name="photo">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="nombre_demand">Nombre de demande :</label>
			</td>
			<td>
			<input type="number" id="nombre_demand" name="nombre_demand">
			</td>
         </tr>



         <tr>
			<td>
			<input type="submit"  name="valider_demand" value="Faire une demande de visa en ligne">
			
			<input type="reset"  name="annuler" value="Annuler">
			</td>
         </tr>

		</table>
	</form>
	<?php 
	    if (isset($notification)) 
	    {
	    	echo '<font color="red" >'.$notification.'</font>';
	    }
	 ?>
</div>
<p> 
<font color="red"> NB : Ces informations feront l'objet d'une verificiation.<br>
Toutes fausses informations peut conduire au blocage de votre compte par la suite.
</font>
</p>
</body>
</html>