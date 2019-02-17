<?php 
    $Auth->allow('user');
    global $bdd;
    $req=$bdd->prepare('SELECT nom_user,prenom_user,groupe_user,departement_user WHERE id_user=:id_user');
    $req->execute(array(
    	           'id'=>$Auth->user('id')

    	                ));
    $user=$req->fetchAll();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <p>Mon nom: <?php echo $user->nom; ?> </p>
 <p>Mon prenom: <?php echo $user->prenom; ?> </p>
 </body>
 </html>