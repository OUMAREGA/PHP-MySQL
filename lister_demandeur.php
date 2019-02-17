 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title></title>
<!-- Stu Nicholls | CSSplay |  -->
<!-- traduit et adapté par outils-web.com -->
<!-- chargement des feuilles de style -->
<link href="css1/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  .content
  {
    margin-top: 5px;
    margin-left: 150px;
    height:400px;
    width:1050px;
    color:red;
  }
</style>
</head>

<body>
<!-- emplacement du menu -->
<ul class="menu">
<!-- class="current" défini l'item sélectionné de la page active-->
<li class="current"><a href="index.php"><b><i class="fa fa-home" aria-hidden="true"></i>Accueil</b></a></li>
<li><a href="connection_user.php"><b><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</b></a></li>
<li><a href="#"><b>Zones Touristiques</b></a></li>
<li><a href="#"><b>Contact</b></a></li>
</ul>
<img src="images1/3.png" width="80%" align="center" style="margin-left:10%; margin-right:10%; " ></td>
<div class="content" >
  <?php include 'list_demandeur.php'; ?>
</div>
</body>
</html>