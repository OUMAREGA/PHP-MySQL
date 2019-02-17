<?php 
class Auth
{
	var $forbiddenpage = 'index1.php?p=forbidden.php'; 
	function login($d)
	{   
		global $bdd;
        $req=$bdd->prepare('SELECT user.id_user,user.nom_user,user.prenom_user,user.email_user,user.groupe_user,user.departement_user,goupe.nom_groupe,groupe.slug,groupe.level FROM user LEFT JOIN groupe ON user.id_groupe=groupe.id_groupe WHERE email_user=:email_user AND password_user=:password_user');
        $req->execute($d);
        $data=$req->fetchAll();
        if(count($data)> 0)
        {
        	$_SESSION['Auth']=$data[0];
        	return true;
        }

        return false;
	}
	function allow($rang)
	{
        global $bdd;
        $req=$bdd->prepare('SELECT slug,level FROM groupe ');
        $req->execute($d);
        $data=$req->fetchAll();
        $groupe=array();
        foreach ($data as $d) 
        {
        	$data[$d->slug]=$d->level;
        }
        if(!$this->user('slug'))
        {
        	$this->forbidden();
        }
        else
        {
           if($data[$rang]>$this->user('level'))
		    {
		        $this->forbidden(); 
		    }
		     else
		     {
		        return true;
		     }
        }
        
        
	}

	/**
	*Recupere une info utilsateur
	***/

    function user($field)
    {
       if(isset($_SESSION['Auth']->$field))
       {
       	  return  $_SESSION['Auth']->$field;
       }
       else
       {
       	return false ;
       }

    }

    /**
    *Redirge un user
    ***/
    function forbidden()
    {
    	header('Location'.$this->forbiddenpage);
    }


}

$Auth = new Auth();
?> 