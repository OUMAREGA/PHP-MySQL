<!DOCTYPE html>
<html class=''>
<head>
<script type="text/javascript" src="console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js">
</script>
<script type="text/javascript" src="events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js">
</script>
<script type="text/javascript" src="css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js">
</script>
<meta charset="utf-8"><meta name="robots" content="noindex">

<link type="text/css" rel="stylesheet prefetch" href="reset.min.css">
<style class="cp-pen-styles">/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

html {
  height: 100%;
  /*Image only BG fallback*/
  
  /*background = gradient + image pattern combo*/
  background: 
    linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
}

body {
  font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
  width: 400px;
  margin: 50px auto;
  text-align: center;
  position: relative;
}
#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;
  box-sizing: border-box;
  width: 80%;
  margin: 0 10%;
  
  /*stacking fieldsets above each other*/
  position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
  display: none;
}
/*inputs*/
#msform input, #msform textarea, #msform select {
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #2C3E50;
  font-size: 13px;
}
/*buttons*/
#msform .action-button {
  width: 100px;
  background: #27AE60;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 1px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
  font-size: 15px;
  text-transform: uppercase;
  color: #2C3E50;
  margin-bottom: 10px;
}
.fs-subtitle {
  font-weight: normal;
  font-size: 13px;
  color: #666;
  margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: white;
  text-transform: uppercase;
  font-size: 9px;
  width: 33.33%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: white;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #27AE60;
  color: white;
}



</style>
</head>
<body>
<!-- multistep form -->
<form id="msform" action="" method="POST" >
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Vos parametres de connexion</li>
    <li>Details Personnels</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Creer votre compte</h2>
    <h3 class="fs-subtitle">Etape 1</h3>
    <input type="email" id="email_user" name="email_user" placeholder="exemple@xyz.com"  >
    <input type="text" id="confirmation_email" name="confirmation_email" placeholder="Retapez votre email"  >
    <input type="password" id="password_user" name="password_user" placeholder="Votre password" >
    <input type="password" id="confirmation_password" name="confirmation_password" placeholder="Confirmer votre Mot de passe" >
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>
  
  <fieldset>
    <h2 class="fs-title">Details Personnels</h2>
    <h3 class="fs-subtitle">Etape 2 et Fin</h3>
    <input type="text" id="nom" name="nom_user" placeholder="Votre nom">
    <input type="text" id="prenom_user" name="prenom_user" placeholder="Votre prenom">
    <select name="groupe_user" id="Groupe"  >
			   <option></option>
               <option value="utilisateur" selected >utilisateur</option>
               <option value="resortissant">ressortissant</option>
    </select>
    <select name="departement_user" id="Departement"  >
			   <option ></option>
               <option value="consul" selected >Le Consul</option>
               <option value="administration_visa">Administration des Visa</option>
               <option value="service_affaires_etrangeres">Services des affaires etrangeres</option>
    </select>
    <input type="tel" id="tel_user" name="tel_user" placeholder="Saisir votre numero de telephone" >

    <input type="button" name="previous" class="previous action-button" value="Precedent" />
    <input type="submit" name="submit" class="submit action-button" value="S'inscrire !" />
  </fieldset>
</form>
<script type="text/javascript" src="stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.easing.min.js"></script>
<script type="text/javascript" >
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
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

     if (isset($_POST['submit'])) // si on a valide
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
})


//# sourceURL=pen.js
</script>
<span id="elementClignotant" align="center" >
					<p>
						<h2><?php 
	    if (isset($notification)) 
	    {
	    	echo ' '.$notification ;
	    }
?></h2>
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