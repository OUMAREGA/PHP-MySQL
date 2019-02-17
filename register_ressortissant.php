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

    if (isset($_POST['valider_inscription'])) // si on a valide
     {

         // securite
         $nom_ressortissant=htmlspecialchars($_POST['nom_ressortissant']);
         $prenom_ressortissant=htmlspecialchars($_POST['prenom_ressortissant']);
         $email_ressortissant=htmlspecialchars($_POST['email_ressortissant']);
         $lieunaissance_ressortissant=htmlspecialchars($_POST['lieunaissance_ressortissant']);
         $datenaissance_ressortissant=htmlspecialchars($_POST['datenaissance_ressortissant']);
         $tel_ressortissant=htmlspecialchars($_POST['tel_ressortissant']);
         $adresse_ressortissant=htmlspecialchars($_POST['adresse_ressortissant']);
         $fonction_ressortissant=htmlspecialchars($_POST['fonction_ressortissant']);
         $ville_ressortissant=htmlspecialchars($_POST['ville_ressortissant']);
         $niveau_ressortissant=htmlspecialchars($_POST['niveau_ressortissant']);
         $diplome_ressortissant=htmlspecialchars($_POST['diplome_ressortissant']);
         $piece_ressortissant=$_POST['piece_ressortissant'];
         $extrait_ressortissant=$_POST['extrait_ressortissant'];
         // si tous les entres sont biens remplis
         if (!empty($_POST['nom_ressortissant']) && !empty($_POST['prenom_ressortissant']) && !empty($_POST['email_ressortissant'])  && !empty($_POST['tel_ressortissant']) &&  !empty($_POST['niveau_ressortissant']) && !empty($_POST['adresse_ressortissant']) && !empty($_POST['piece_ressortissant']) && !empty($_POST['extrait_ressortissant']) && !empty($_POST['fonction_ressortissant']) && !empty($_POST['diplome_ressortissant']) && !empty($_POST['datenaissance_ressortissant']) && !empty($_POST['lieunaissance_ressortissant']) )
         {
              

               // traitement php si les champs sont tous remplis
                   $longnom=strlen($_POST['nom_ressortissant']); // longueur du nom
                 $longprenom=strlen($_POST['prenom_ressortissant']);
                 if (  $longprenom <=255 || $longnom<=255  ) 
                 {

                        if (filter_var($email_ressortissant,FILTER_VALIDATE_EMAIL) ) 
                        {
                            $reqmail=$bdd->prepare("SELECT * FROM ressortissant where email_ressortissant= ? ");
                                $reqmail->execute(array($email_ressortissant));
                                $mailexist=$reqmail->rowCount();
                                if ($mailexist==0)
                                 {
                                  

                                
                                
                                  $insert=$bdd->prepare("INSERT INTO ressortissant(nom_ressortissant,prenom_ressortissant,email_ressortissant,tel,fonction_ressortissant,piece_ressortissant,adresse_ressortissant,extrait_ressortissant,ville_origine_ressortissant,niveau_etude,diplome,lieu_naissance_ressortissant,born_ressortissant) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
                                  $insert->execute(array($nom_ressortissant,$prenom_ressortissant,$email_ressortissant,$tel_ressortissant,$fonction_ressortissant,$piece_ressortissant,$adresse_ressortissant,$extrait_ressortissant,$ville_ressortissant,$niveau_ressortissant,$diplome_ressortissant,$lieunaissance_ressortissant,$datenaissance_ressortissant,"default.png"));
                                  $notification="Votre compte a ete bien cree ! <a href=\"connection_ressortissant.php\">Me connecter !<a> ";

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
                      $notification="Votre nom ou renom ne doit pas depasses 255 caractéres !";
                 }


                 // gestion des files
                  // 1 piece d'identification
                if ( isset($_FILES['piece_ressortissant']) AND !empty($_FILES['piece_ressortissant']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['piece_ressortissant']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['piece_ressortissant']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/ressortissant/".$_SESSION['piece_ressortissant'].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['piece_ressortissant']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updatepiece_ressortissant=$bdd->prepare('UPDATE user SET piece_ressortissant = :piece_ressortissant WHERE id_ressortissant = :id_ressortissant ');
                          $updatepiece_ressortissant->execute(array(
                                                       'piece_ressortissant'  => $_SESSION['piece_ressortissant'].".".$extensionupload,
                                                       'id_ressortissant' => $_SESSION['id_ressortissant']
                                                       )); 
                          
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


                // 2 extrait de naissance
                              
                if ( isset($_FILES['extrait_ressortissant']) AND !empty($_FILES['extrait_ressortissant']['name']) ) 
                {
                    $taillemax=2097152;
                    $extensionvalides=array("jpg","jpeg","png","gif");
                    if ( $_FILES['extrait_ressortissant']['size']<= $taillemax )
                    {

                      $extensionupload=strtolower(substr(strrchr($_FILES['extrait_ressortissant']['name'], '.'), 1));
                      if (in_array($extensionupload, $extensionvalides)) 
                      {
                        $chemin="membres/ressortissant/".$_SESSION[''].".".$extensionupload;
                        $deplacement=move_uploaded_file($_FILES['extrait_ressortissant']['tmp_name'], $chemin);
                        if ($deplacement) 
                        {
                          $updateextrait_ressortissant=$bdd->prepare('UPDATE user SET extrait_ressortissant = :extrait_ressortissant WHERE id_ressortissant = :id_ressortissant ');
                          $updateextrait_ressortissant->execute(array(
                                                       'extrait_ressortissant'  => $_SESSION['extrait_ressortissant'].".".$extensionupload,
                                                       'id_ressortissant' => $_SESSION['id_ressortissant']
                                                       ));
                          
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
               // fin du traitement       

         }
         else
         {
          $notification="Tous les champs sont obligatoires";
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
              <input type="text" id="nom" name="nom_ressortissant" placeholder="Votre nom">
            </div>
          </div>
        
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="prenom_demand">Prenom:</label>
              <input type="text" id="prenom_ressortissant" name="prenom_ressortissant" placeholder="Votre prenom">
            </div>
          </div>
          
          <div class="af-outer af-required">
            <div class="af-inner">
              <label for="email_demand">Email:</label>
              <input type="email" id="email_ressortissant" name="email_ressortissant" placeholder="exemple@xyz.com" >
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="date_naissance_demand">Date de Naissance:</label>
              <input type="date" id="datenaissance_ressortissant" name="datenaissance_ressortissant">
            </div>
          </div>
          
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="lieu_naissance_demand">Lieu de naissance:</label>
              <input type="text" id="lieunaissance_ressortissant" name="lieunaissance_ressortissant" placeholder="Votre lieu de Naissance">
            </div>
          </div>
          
          <div class="af-outer">
            <div class="af-inner">
              <label for="ville_origine">Ville origine:</label>
              <input type="text" id="ville_ressortissant" name="ville_ressortissant">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="niveau_ressortissant">Niveau Etude:</label>
              <input type="text" id="niveau_ressortissant" name="niveau_ressortissant">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
             <label for="diplome_ressortissant">Dernier diplome obtenu:</label>
              <input type="text" id="diplome_ressortissant" name="diplome_ressortissant">
            </div>
          </div>


          <div class="af-outer">
            <div class="af-inner">
              <label for="adresse_ressortissant">Adresse:</label>
             <input type="text" id="adresse_ressortissant" name="adresse_ressortissant">
            </div>
          </div>

          <div class="af-outer">
            <div class="af-inner">
              <label for="tel_ressortissant">Tel:</label>
              <input type="text" id="tel_ressortissant" name="tel_ressortissant">
            </div>
          </div>


          <div class="af-outer">
            <div class="af-inner">
              <label for="fonction_ressortissant">Fonction:</label>
              <input type="text" id="fonction_ressortissant" name="fonction_ressortissant">
            </div>
          </div>

           <div class="af-outer">
            <div class="af-inner">
              <label for="extrait_ressortissant">Extrait de Naissance:</label>
              <input type="file" id="extrait_ressortissant" name="extrait_ressortissant">
            </div>
          </div>


          <div class="af-outer">
            <div class="af-inner">
             <label for="piece_ressortissant">Piece d'Indentification:</label>
              <input type="file" id="piece_ressortissant" name="piece_ressortissant">
            </div>
          </div>



          <input type="submit"  name="valider_inscription" value="S'inscrire">
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