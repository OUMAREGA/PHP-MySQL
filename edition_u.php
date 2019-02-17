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
    
         if (isset($_SESSION['id_user']) ) 
         {
              $requser=$bdd->prepare("SELECT * FROM user WHERE id_user= ? ");
              $requser->execute(array($_SESSION['id_user']));
              $user=$requser->fetch();
              // pour le nom
              if ( isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] AND $user['nom_user']!=$_POST['newnom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE user SET nom_user=? WHERE id_user=? ");
                  $insertnom->execute(array($_POST['newnom'], $_SESSION['id_user']));
                  
              }
              //pour le prenom
              if ( isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $user['prenom_user']!=$_POST['newprenom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE user SET prenom_user=? WHERE id_user=? ");
                  $insertnom->execute(array($_POST['newprenom'], $_SESSION['id_user']));
                  
              }
              // pour le mail
              if ( isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $user['email_user']!=$_POST['newemail'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE user SET email_user=? WHERE id_user=? ");
                  $insertnom->execute(array($_POST['newemail'], $_SESSION['id_user']));
                  
              }
              // pour le mot de passe
              if (isset($_POST['valider_maj'])) 
              {


                                  // photo de profil
                if ( isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['avatar']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/avatars/".$_SESSION['id_user'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updateavatar=$bdd->prepare('UPDATE user SET avatar = :avatar WHERE id_user = :avatar ');
                          $updateavatar->execute(array(
                                                       'avatar'  => $_SESSION['id_user'].".".$extensionupload,
                                                       'id_user' => $_SESSION['id_user']
                                                       ));
                          // redirection vers profil
                          header("Location: profil_user.php?id_user=".$_SESSION['id_user']); 
                          
                        }
                        else
                        {
                          $notification = "Erreur pendant l'importation " ;
                        }

                      }
                      else
                      {
                        $notification = "Votre photo de profil doit etre au format jpg, png, gif" ;
                      }

                    }
                    else
                    {
                      $notification="La taille de votre photo ne doit pas depasser 2Mo";
                    }
                }  

                  $ancien_password=sha1($_POST['ancien_password']);
             
                  if (!empty($_POST['ancien_password']))
                  {
                   if ($user['password_user']==$ancien_password) 
                    {
                    
                            $password_user=sha1($_POST['newpassword']);
                            $confirmation_password=sha1($_POST['newconfirmation_password']);
                            if ($password_user==$confirmation_password) 
                            {
                              $insertnom=$bdd->prepare("UPDATE user SET password_user=? WHERE id_user=? ");
                              $insertnom->execute(array($password_user, $_SESSION['id_user']));
                             
                            }
                            else
                            {
                              $notification="Vos deux  nouveaux mots de passe ne correspondent pas !" ;
                            }
                      }
                      else
                          $notification="Votre ancien mot de passe n'est pas valide !" ;   
                  }
                  else
                  {
                    $notification= "Le champ ancien mot de passe est obligatoire pour editer votre profil ! ";
                  }

                   
                   // pour le groupe
                   if ( isset($_POST['newgroupe']) AND !empty($_POST['newgroupe']) AND $_POST['newgroupe'] AND $user['groupe_user']!=$_POST['newgroupe'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE user SET groupe_user=? WHERE id_user=? ");
                          $insertnom->execute(array($_POST['newgroupe'], $_SESSION['id_user']));
                          
                      }
                  //pour le departement
                      if ( isset($_POST['newdepartement']) AND !empty($_POST['newdepartement']) AND $_POST['newdepartement'] AND $user['departement_user']!=$_POST['newdepartement'] ) 
                          {
                              $insertnom=$bdd->prepare("UPDATE user SET departement_user=? WHERE id_user=? ");
                              $insertnom->execute(array($_POST['newdepartement'], $_SESSION['id_user']));
                              
                          }
                   // pour le tel
                   if ( isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] AND $user['tel_user']!=$_POST['newtel'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE user SET tel_user=? WHERE id_user=? ");
                          $insertnom->execute(array($_POST['newtel'], $_SESSION['id_user']));
                          
                      }       

                  


                }

      

?>
<!DOCTYPE html>
<html>
<head>
	<title>PROFIL</title>
	<meta charset="utf-8"/>
</head>
<body>
<div align="center">
	
    <h2>Edition de mon Profil</h2> 
    <form method="POST" action="" enctype="multipart/form-data" >
      <table>
    <tr>
        <td>
      <label for="nom">Nom:</label>
      </td>
      <td>
      <input type="text" id="nom" name="newnom" placeholder="Votre nom" value="<?php echo $user['nom_user'] ?> " >
      </td>
         </tr>

         <tr>
        <td>
      <label for="prenom_user">Prenom:</label>
      </td>
      <td>
      <input type="text" id="prenom_user" name="newprenom" placeholder="Votre prenom" value="<?php echo $user['prenom_user'] ?>">
      </td>
         </tr>

         <tr>
        <td>
      <label for="email_user">Email:</label>
      </td>
      <td>
      <input type="email" id="email_user" name="newemail" placeholder="exemple@xyz.com" value="<?php echo $user['email_user'] ?> " >
      </td>
         </tr>
           
         <tr>
        <td>
      <label for="ancien_password">Votre ancien Mot de passe:</label>
      </td>
      <td>
      <input type="password" id="ancien_password" name="ancien_password" placeholder="Votre ancien password" >
      </td>
         </tr>
         
         <tr>
        <td>
      <label for="password_user"> Nouveau Mot de passe:</label>
      </td>
      <td>
      <input type="password" id="newpassword" name="newpassword" placeholder="Votre password">
      </td>
         </tr>

         <tr>
        <td>
      <label for="confirmation_password">Confirmer votre Mot de passe:</label>
      </td>
      <td>
      <input type="password" id="newconfirmation_password" name="newconfirmation_password" placeholder="Confirmer votre nouveau Mot de passe">
      </td>
         </tr>




         <tr>
        <td>
      <label for="groupe_user">Groupe:</label>
      </td>
      <td>
      <select name="newgroupe" id="Groupe" value="<?php echo $user['groupe_user']; ?>" >
         <option></option>
               <option value="utilisateur" selected >utilisateur</option>
               <option value="resortissant">admin</option>
               <option value="resortissant">ressortissant</option>
         </select>
      </td>
         </tr>

         <tr>
        <td>
      <label for="departement_user">Departement:</label>
      </td>
      <td>
      <input type="text" id="departement_user" name="newdepartement" placeholder="Votre departement"  value="<?php echo $user['departement_user'] ?> " >
      </td>
         </tr>

         <tr>
        <td>
      <label for="tel_user">Tel:</label>
      </td>
      <td>
      <input type="tel" id="tel_user" name="newtel" value="<?php echo $user['tel_user'] ?> ">
      </td>
         </tr>

         <tr>
        <td>
      <label for="avatar">Avatar:</label>
      </td>
      <td>
      <input type="file" id="avatar" name="avatar">
      </td>

         <tr>
      <td>
      <input type="submit"  name="valider_maj" value="Mettre à jour le Profil"/>
      <a href="javascript:history.go(-1)">Ne rien faire
                                         Se redirer vers le profil</a>
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
</body>
</html>
<?php 
}
else
header("Location: connection_user.php");
 ?>