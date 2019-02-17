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

     if (isset($_GET['id_demand']) )
         {
              $reqdemand=$bdd->prepare("SELECT * FROM demandeur WHERE id_demand= ? ");
              $reqdemand->execute(array($_GET['id_demand']));
              $demand=$reqdemand->fetch();
              // pour le nom
              if ( isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] AND $demand['nom_demand']!=$_POST['nom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE demandeur SET nom_demand=? WHERE id_demand=? ");
                  $insertnom->execute(array($_POST['nom'], $_GET['id_demand']));
                  
              }
              //pour le newprenom
              if ( isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $demand['prenom_demand']!=$_POST['prenom'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE demandeur SET prenom_demand=? WHERE id_demand=? ");
                  $insertnom->execute(array($_POST['prenom'], $_GET['id_demand']));
                  
              }
              // pour le mail
              if ( isset($_POST['email']) AND !empty($_POST['email']) AND $demand['email_demand']!=$_POST['email'] ) 
              {
                  $insertnom=$bdd->prepare("UPDATE demandeur SET email_demand=? WHERE id_demand=? ");
                  $insertnom->execute(array($_POST['email'], $_GET['id_demand']));
                  
              }

              if (isset($_POST['valider_maj'])) 
              {


                    // photo
                if ( isset($_FILES['photo']) AND !empty($_FILES['photo']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['photo']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/demandeur/".$_SESSION['id_demand'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephoto=$bdd->prepare('UPDATE demandeur SET photo = :photo WHERE id_demand = :id_demand ');
                          $updatephoto->execute(array(
                                                       'photo'  => $_GET['id_demand'].".".$extensionupload,
                                                       'id_demand' => $_GET['id_demand']
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

                // copie_piece

                if ( isset($_FILES['copie_piece']) AND !empty($_FILES['copie_piece']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['copie']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['copie_piece']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/demandeur/".$_GET['id_demand'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['copie_piece']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatephoto=$bdd->prepare('UPDATE demandeur SET copie_piece = :copie_piece WHERE id_demand = :copie_piece ');
                          $updatephoto->execute(array(
                                                       'copie_piece'  => $_GET['id_demand'].".".$extensionupload,
                                                       'id_demand' => $_GET['id_demand']
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

                                     
                   // pays oririgine
                   if ( isset($_POST['pays_origine']) AND !empty($_POST['pays_origine']) AND $_POST['pays_origine'] AND $demand['pays_origine']!=$_POST['pays_origine'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE demandeur SET pays_origine=? WHERE id_demand=? ");
                          $insertnom->execute(array($_POST['pays_origine'], $_GET['id_demand']));
                          
                      }
                  //ville_origine
                      if ( isset($_POST['ville_origine']) AND !empty($_POST['ville_origine']) AND $_POST['ville_origine'] AND $demand['ville_origine']!=$_POST['ville_origine'] ) 
                          {
                              $insertnom=$bdd->prepare("UPDATE demandeur SET ville_origine=? WHERE id_demand=? ");
                              $insertnom->execute(array($_POST['ville_origine'], $_GET['id_demand']));
                              
                          }
                   // motif
                   if ( isset($_POST['motif']) AND !empty($_POST['motif']) AND $_POST['motif'] AND $demand['motif']!=$_POST['motif'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE demandeur SET motif=? WHERE id_demand=? ");
                          $insertnom->execute(array($_POST['motif'], $_GET['id_demand']));
                          
                      }
                      //date
                      if ( isset($_POST['date']) AND !empty($_POST['date']) AND $_POST['date'] AND $demand['date_naissance_demand']!=$_POST['date'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE demandeur SET date_naissance_demand=? WHERE id_demand=? ");
                          $insertnom->execute(array($_POST['date'], $_GET['id_demand']));
                          
                      }
                      //lieu
                     
                      if ( isset($_POST['lieu']) AND !empty($_POST['lieu']) AND $_POST['lieu'] AND $demand['lieu_naissance_demand']!=$_POST['lieu'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE demandeur SET lieu_naissance_demand=? WHERE id_demand=? ");
                          $insertnom->execute(array($_POST['lieu'], $_GET['id_demand']));
                          
                      }  
                      //
                      //fonction
                      if ( isset($_POST['fonction']) AND !empty($_POST['fonction']) AND $_POST['fonction'] AND $demand['fonction']!=$_POST['fonction'] ) 
                      {
                          $insertnom=$bdd->prepare("UPDATE demandeur SET fonction=? WHERE id_demand=? ");
                          $insertnom->execute(array($_POST['fonction'], $_GET['id_demand']));
                          
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
              <input type="text" id="nom" name="nom" placeholder="Votre nom" value="<?php echo $demand['nom_demand'] ?>">
            </div>
          </div>
        
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="prenom">prenom:</label>
              <input type="text" id="prenom" name="prenom" placeholder="Votre prenom" value="<?php echo $demand['prenom_demand'] ?> ">
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="email_demand">Email:</label>
              <input type="email" id="email_demand" name="email" placeholder="exemple@xyz.com" value="<?php echo $demand['email_demand'] ?> " >
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="date_naissance_demand">Date de Naissance:</label>
              <input type="date" id="date_naissance_demand" name="date" value="<?php echo $demand['date_naissance_demand'] ?> ">
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="pays_origine">Pays origine:</label>
              <?php include"pays.php" ?>
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="lieu_naissance_demand">Lieu de naissance:</label>
              <input type="text" id="lieu_naissance_demand" name="lieu" value="<?php echo $demand['lieu_naissance_demand'] ?> ">
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="ville_origine">Ville origine:</label>
              <input type="text" id="ville_origine" name="ville_origine" value="<?php echo $demand['ville_origine'] ?> ">
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
              <input type="text" id="fonction" name="fonction" value="<?php echo $demand['fonction'] ?> ">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="motif">Motif voyage:</label>
             <input type="text" id="motif" name="motif" value="<?php echo $demand['motif'] ?> ">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="photocopie_piece">Photocopie de la piece:</label>
             <input type="file" id="photocopie_piece" name="copie_piece">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
             <label for="photocopie_piece">Photo:</label>
             <input type="file" id="photo" name="photo">
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