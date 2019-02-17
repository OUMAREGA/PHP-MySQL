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

     if (isset($_GET['id_ressortissant']) )
         {
              $reqdemand=$bdd->prepare("SELECT * FROM ressortissant WHERE id_ressortissant= ? ");
              $reqdemand->execute(array($_GET['id_ressortissant']));
              $demand=$reqdemand->fetch();
              // pour le nom
              if ( isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] AND $demand['nom_ressortissant']!=$_POST['nom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE ressortissant SET nom_ressortissant=? WHERE id_ressortissant=? ");
                  $insertnom->execute(array($_POST['nom'], $_GET['id_ressortissant']));
                  
              }
              //pour le newprenom
              if ( isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $demand['prenom_ressortissant']!=$_POST['prenom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE ressortissant SET prenom_ressortissant=? WHERE id_ressortissant=? ");
                  $insertnom->execute(array($_POST['prenom'], $_GET['id_ressortissant']));
                  
              }
              // pour le mail
              if ( isset($_POST['email']) AND !empty($_POST['email']) AND $demand['email_ressortissant']!=$_POST['email'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE ressortissant SET email_ressortissant=? WHERE id_ressortissant=? ");
                  $insertnom->execute(array($_POST['email'], $_GET['id_ressortissant']));
                  
              }
              //


              if (isset($_POST['valider_maj'])) 
              {


                    // piece
                if ( isset($_FILES['piece']) AND !empty($_FILES['piece']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['piece']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['piece']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/ressortissant/".$_GET['id_ressortissant'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephoto=$bdd->prepare('UPDATE ressortissant SET piece_ressortissant = :piece_ressortissant WHERE id_ressortissant = :piece ');
                          $updatephoto->execute(array(
                                                       'piece'  => $_GET['id_ressortissant'].".".$extensionupload,
                                                       'id_ressortissant' => $_GET['id_ressortissant']
                                                       ));
                          // redirection vers profil
                          //header("Location: profil_demand.php?id_demand=".$_GET['id_demand']); 
                          
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

                // extrait

                if ( isset($_FILES['extrait']) AND !empty($_FILES['extrait']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['extrait']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['extrait']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/ressortissant/".$_GET['id_ressortissant'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['extrait']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephoto=$bdd->prepare('UPDATE ressortissant SET extrait_ressortissant = :extrait WHERE id_ressortissant = :extrait ');
                          $updatephoto->execute(array(
                                                       'extrait'  => $_GET['id_ressortissant'].".".$extensionupload,
                                                       'id_ressortissant' => $_GET['id_ressortissant']
                                                       ));
                          // redirection vers profil
                          //header("Location: profil_demand.php?id_demand=".$_GET['id_demand']); 
                          
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

                
                                     
                   // adresse
                   if ( isset($_POST['adresse']) AND !empty($_POST['adresse']) AND $_POST['adresse'] AND $demand['adresse_ressortissant']!=$_POST['adresse'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET adresse_ressortissant=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['adresse'], $_GET['id_ressortissant']));
                          
                      }
                  //ville_origine
                      if ( isset($_POST['ville_origine']) AND !empty($_POST['ville_origine']) AND $_POST['ville_origine'] AND $demand['ville_origine_ressortissant']!=$_POST['ville_origine'] ) 
                          {
                              $insertnom=$bdd->prepare("UPDATE ressortissant SET ville_origine_ressortissant=? WHERE id_ressortissant=? ");
                              $insertnom->execute(array($_POST['ville_origine'], $_GET['id_ressortissant']));
                              
                          }
                   // diplome
                   if ( isset($_POST['diplome']) AND !empty($_POST['diplome']) AND $_POST['diplome'] AND $demand['diplome']!=$_POST['diplome'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET diplome=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['diplome'], $_GET['id_ressortissant']));
                          
                      }
                      //date
                      if ( isset($_POST['date']) AND !empty($_POST['date']) AND $_POST['date'] AND $demand['born_ressortissant']!=$_POST['date'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET born_ressortissant=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['date'], $_GET['id_ressortissant']));
                          
                      }
                      //lieu
                     
                      if ( isset($_POST['lieu']) AND !empty($_POST['lieu']) AND $_POST['lieu'] AND $demand['lieu_naissance_ressortissant']!=$_POST['lieu'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET lieu_naissance_ressortissant=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['lieu'], $_GET['id_ressortissant']));
                          
                      }  
                      //
                      //fonction
                      if ( isset($_POST['fonction']) AND !empty($_POST['fonction']) AND $_POST['fonction'] AND $demand['fonction_ressortissant']!=$_POST['fonction'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET fonction_ressortissant=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['fonction'], $_GET['id_ressortissant']));
                          
                      }
                      //
                      if ( isset($_POST['niveau']) AND !empty($_POST['niveau']) AND $_POST['niveau'] AND $demand['niveau_etude']!=$_POST['niveau'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE ressortissant SET niveau_etude=? WHERE id_ressortissant=? ");
                          $insertnom->execute(array($_POST['fonction'], $_GET['id_ressortissant']));
                          
                      }        

                  

                   header("Location: lister_demandeur.php");
                }

            }
            


 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Enhance Required Form Fields with CSS3" />
        <meta name="keywords" content="form, html5, css3, animated, transition, required, filter" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css2/demo.css" />
        <link rel="stylesheet" type="text/css" href="css2/style.css" />
    <script type="text/javascript" src="js2/modernizr.custom.04022.js"></script>
    <!--[if lt IE 8]>
      <style>
        .af-wrapper{display:none;}
        .ie-note{display:block;}
      </style>
    <![endif]-->
    </head>
    <body>
        <div class="container">
      <!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                    <a href="http://tympanus.net/codrops/2012/05/02/enhance-required-form-fields-with-css3/">
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->   
      <header>
      </header>
      
      <section class="af-wrapper">
            
        <input id="af-showreq" class="af-show-input" type="checkbox" name="showreq" />
        <label for="af-showreq" class="af-show"></label>
        
        <form action="" method="post" class="af-form" id="af-form" novalidate>
          
          <div class="af-outer">
            <div class="af-inner">
             <label for="nom">Nom:</label>
              <input type="text" id="nom" name="nom" placeholder="Votre nom" value="<?php echo $demand['nom_ressortissant']; ?>">
            </div>
          </div>
        
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="prenom">prenom:</label>
              <input type="text" id="prenom" name="prenom" placeholder="Votre prenom" value="<?php echo $demand['prenom_ressortissant']; ?> ">
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="email_demand">Email:</label>
              <input type="email" id="email_demand" name="email" placeholder="exemple@xyz.com" value="<?php echo $demand['email_ressortissant']; ?> " >
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="date_naissance_demand">Date de Naissance:</label>
              <input type="date" id="date_naissance_demand" name="date" value="<?php echo $demand['born_ressortissant']; ?> "  >
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="niveau_ressortissant">Niveau Etude:</label>
              <input type="text" id="niveau_ressortissant" name="niveau" value="<?php echo $demand['niveau_etude']; ?> " >
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="lieu_naissance_ressortissant">Lieu de naissance:</label>
              <input type="text" id="lieu_naissance_ressortissant" name="lieu" value="<?php echo $demand['lieu_naissance_ressortissant']; ?> ">
            </div>
          </div>


          <div class="af-outer">
            <div class="af-inner">
              <label for="lieu_naissance_ressortissant">Ville origine:</label>
              <input type="text" id="ville_origine" name="lieu" value="<?php echo $demand['ville_origine_ressortissant']; ?> ">
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="adresse_ressortissant">Adresse:</label>
             <input type="text" id="adresse_ressortissant" name="adresse" value="<?php echo $demand['adresse_ressortissant']; ?> ">
            </div>
          </div>


          <!--<div class="af-outer">
            <div class="af-inner">
              <label for="adresse_demand">Adresse:</label>
              <input type="text" id="adresse_demand" name="adresse_demand" value="<?php //echo $demand['newnom'] ?> ">
            </div>
          </div>-->

          <div class="af-outer">
            <div class="af-inner">
              <label for="fonction">Fonction:</label>
              <input type="text" id="fonction" name="fonction" value="<?php echo $demand['fonction_ressortissant']; ?> ">
            </div>
          </div>


          <div class="af-outer">
            <div class="af-inner">
              <label for="photocopie_piece">Piece d'Identification:</label>
             <input type="file" id="photocopie_piece" name="piece">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
             <label for="extrait">Extrait de Naissance:</label>
             <input type="file" id="photo" name="extrait">
            </div>
          </div>


        <div class="af-outer">
            <div class="af-inner">
             <label for="diplome">Dernier Diplome:</label>
             <input type="type" id="photo" name="diplome" value="<?php echo $demand['diplome']; ?> ">
            </div>
          </div>
          <!--><div class="af-outer">
            <div class="af-inner">
              <label for="nombre_demand">Nombre de demande :</label>
             <input type="number" id="nombre_demand" name="nombre_demand" value="<?php //echo $demand['newnom'] ?> ">
            </div>
          </div>-->


          
          <input type="submit"  name="valider_maj" value="Mettre a jour">
          <input type="reset"  name="annuler" value="Annuler">
        </form>
      </section>
        </div>

<span id="elementClignotant" align="center" >
          <p>
            <h2><?php 
      if (isset($notification)) 
      {
        echo ' '.$notification ;
      }
    ?>
</h2>
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

    </body>
</html>