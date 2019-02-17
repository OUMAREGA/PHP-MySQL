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
              <input type="text" id="nom" name="nom_demand" placeholder="Votre nom">
            </div>
          </div>
        
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="prenom_demand">Prenom:</label>
              <input type="text" id="prenom_demand" name="prenom_demand" placeholder="Votre prenom">
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="email_demand">Email:</label>
              <input type="email" id="email_demand" name="email_demand" placeholder="exemple@xyz.com" >
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="date_naissance_demand">Date de Naissance:</label>
              <input type="date" id="date_naissance_demand" name="date_naissance_demand">
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
              <input type="text" id="lieu_naissance_demand" name="lieu_naissance_demand">
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="ville_origine">Ville origine:</label>
              <input type="text" id="ville_origine" name="ville_origine">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="ville_origine">Ville origine:</label>
              <input type="text" id="ville_origine" name="ville_origine">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="adresse_demand">Adresse:</label>
              <input type="text" id="adresse_demand" name="adresse_demand">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="fonction">Fonction:</label>
              <input type="text" id="fonction" name="fonction">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="motif">Motif voyage:</label>
             <input type="text" id="motif" name="motif">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="photocopie_piece">Photocopie de la piece:</label>
             <input type="file" id="photocopie_piece" name="photocopie_piece">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
             <label for="photocopie_piece">Photo:</label>
             <input type="file" id="photo" name="photo">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="nombre_demand">Nombre de demande :</label>
             <input type="number" id="nombre_demand" name="nombre_demand">
            </div>
          </div>


          
          <input type="submit"  name="valider_demand" value="Faire une demande de visa en ligne">
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