<?php // connexion a la bd  
try
   {
      $bdd = new PDO('mysql:host=127.0.0.1;dbname=ambassade;charset=utf8', 'root', '',
	  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
   catch(Exception $e)
     {
        die('Erreur : '.$e->getMessage());
     }

     if (isset($_POST['valider_inscription'])) // si on a valide
     {

         // securite
     	   $nom_user=htmlspecialchars($_POST['nom_user']);
     	   $prenom_user=htmlspecialchars($_POST['prenom_user']);
     	   $email_user=htmlspecialchars($_POST['email_user']);
     	   $confirmation_email=htmlspecialchars($_POST['confirmation_email']);
     	   $password_user=sha1($_POST['password_user']);
     	   $confirmation_password=sha1($_POST['confirmation_password']);
     	   $groupe_user=htmlspecialchars($_POST['groupe_user']);
     	   $departement_user=htmlspecialchars($_POST['departement_user']);
     	   $tel_user=htmlspecialchars($_POST['tel_user']);

     	if ( !empty($_POST['nom_user']) && !empty($_POST['prenom_user']) && !empty($_POST['email_user']) && !empty($_POST['confirmation_email']) && !empty($_POST['password_user']) && !empty($_POST['confirmation_password']) && !empty($_POST['groupe_user']) && !empty($_POST['departement_user']) && !empty($_POST['tel_user'] )  )
     	{

     	   $longnom=strlen($_POST['nom_user']); // longueur du nom
     	   $longprenom=strlen($_POST['prenom_user']);
     	   if (  $longprenom <=255 || $longnom<=255  ) 
     	   {

     	   	  if ($email_user==$confirmation_email) 
     	   	   {
	     	   	  	if (filter_var($email_user,FILTER_VALIDATE_EMAIL) ) 
	     	   	  	{
	     	   	  	    $reqmail=$bdd->prepare("SELECT * FROM user where email_user=? ");
                        $reqmail->execute(array($email_user));
                        $mailexist=$reqmail->rowCount();
                        if ($mailexist==0)
                         {
                         	/*$reqpseudo=$bdd->prepare("SELECT * FROM user where nom_user=? ");
	                        $reqpseudo->execute(array($nom_user));
	                        $pseudoexist=$reqpseudo->rowCount();
	                        if ($pseudoexist==0) 
	                        {*/
	                        
                        

					     	   	  	if ($password_user==$confirmation_password) 
					     	   	  	{
					     	   	  		$insert=$bdd->prepare("INSERT INTO user(nom_user,prenom_user,email_user,password_user,groupe_user,departement_user,tel_user,avatar) VALUES (?,?,?,?,?,?,?,?) ");
					     	   	  		$insert->execute(array($nom_user,$prenom_user,$email_user,$password_user,$groupe_user,$departement_user,$tel_user,"default.png"));
					     	   	  		$notification="Votre compte a ete bien cree ! <a href=\"connection_user.php\">Me connecter !<a> ";
					     	   	  	}

					     	   	  	else
					     	   	  	{
					     	   	  		$notification="Les deux mots de passe ne correspondent pas, Ressayer !";
					     	   	  	}

					     	//}
			     	   	    /*else
			     	   	    {
			     	   	    	$notification="Ce pseudo existe deja ";
			     	   	    }*/



			     	   	 }
			     	   	 else
			     	   	 {
			     	   	 	$notification="Cette adresse mail est deja utilisée" ;
			     	   	 }

	     	   	    }

	     	   	    else
	     	   	    {
                         $notification = "Votre email n'est pas valide !";
	     	   	    }

     	   	    }

     	   	    else
	     	   	{
	               $notification = "Les deux adresses email  en correspondent pas, Reessaye !";
	     	   	}

     	   }

     	   else
     	   {
              $notification="Votre nom ou renom ne doit pas depasses 255 caractéres !";
     	   }
     	}
     	else
     	{
     		$notification = "Tous les champs  sont obligatoires ! ";
     	}
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
			<input type="text" id="nom" name="nom_user" placeholder="Votre nom">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="prenom_user">Prenom:</label>
			</td>
			<td>
			<input type="text" id="prenom_user" name="prenom_user" placeholder="Votre prenom">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="email_user">Email:</label>
			</td>
			<td>
			<input type="email" id="email_user" name="email_user" placeholder="exemple@xyz.com" >
			</td>
         </tr>
           
         <tr>
		    <td>
			<label for="confirmation_email">Confirmer votre Email:</label>
			</td>
			<td>
			<input type="email" id="confirmation_email" name="confirmation_email" placeholder="Retapez votre email">
			</td>
         </tr>
         
         <tr>
		    <td>
			<label for="password_user">Mot de passe:</label>
			</td>
			<td>
			<input type="password" id="password_user" name="password_user" placeholder="Votre password">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="confirmation_password">Confirmer votre Mot de passe:</label>
			</td>
			<td>
			<input type="password" id="confirmation_password" name="confirmation_password" placeholder="Confirmer votre Mot de passe">
			</td>
         </tr>

         <tr>
		    <td>
			<label for="groupe_user">Groupe:</label>
			</td>
			<td>
			<select name="groupe_user" id="Groupe">
			   <option></option>
               <option value="utilisateur">utilisateur</option>
               <option value="resortissant">ressortissant</option>
            </select>
			</td>
         </tr>

         <tr>
		    <td>
			<label for="departement_user">Departement:</label>
			</td>
			<td>
			<select name="departement_user" id="Departement">
			   <option ></option>
               <option value="consul">Le Consul</option>
               <option value="administration_visa">Administration des Visa</option>
               <option value="service_affaires_etrangeres">Services des affaires etrangeres</option>
            </select>
			</td>
         </tr>

         <tr>
		    <td>
			<label for="tel_user">Tel:</label>
			</td>
			<td>
			<input type="tel" id="tel_user" name="tel_user">
			</td>
         </tr>

         <tr>
			<td>
			<input type="submit"  name="valider_inscription" value="S'inscrire">
			
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