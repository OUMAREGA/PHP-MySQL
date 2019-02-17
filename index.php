<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenue dans cette page</title>
<meta name="description" content="Script jQuery Les différentes sections du menu changent d'arrière-plan au survol et le sous-menu apparait" />
<meta name="Robots" content="all"/>
<meta name="author" content="Codrops" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="styleindex.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="font-awesome.css" />
<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
<link rel="stylesheet" type="text/css" href="css/style_index.css" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
<script type="text/javascript">
	$(function() {
		$('#sbi_container').bgImageMenu({
			defaultBg	: 'images/1defaut.jpg',
			type		: {
				mode		: 'seqVerticalSlideAlt',
				speed		: 250,
				easing		: 'jswing',
				seqfactor	: 100
			}
		});
	});
</script>
<style type="text/css">
	span 
	{
		            color: #00ACEE;
					font-size: 20px;
					font-style: italic;
					text-align:center;
	}
	.info
	{
					font-size: 16px;
					font-style: italic;
					text-align:center;	
	}
	.ho
	{
					font-size: 20px;
					font-style: italic;
					text-align:center;	
	}
	.dw
	{
					font-size: 21px;
					font-style: italic;
					text-align:center;
	}
	.dw a
	{
					font-size: 21px;
					font-style: italic;
					text-align:center;
					color: black;
	}
</style>
</head>
<body>
<img src="images/3.png" width="80%" align="center" style="margin-left:10%; margin-right:10%; " ></td>
<br><br>
<table>
<tr>
<td width="145px" ><td>
<td><span><marquee>Il est porté à la connaissance des ressortissants sénégalais établis au Canada que, conformément aux dispositions du décret nº 2017-683 du <b> 26 avril 2017</b>, les électeurs sénégalais sont convoqués le dimanche 30 juillet 2017, pour les élections législatives.</h2></marquee></span><td>
<td width="130px" ><td>
<td width="300px" ><td>
</tr>
</table>
<!-- Paramètres:
defaultBg: image par defaut au démarrage
pos: si defaultbg non défini, pos indique quel panneau doit être affiché ou non
width: largeur des images
height: hauteur des images
border: largeur du bord de chaque panneau
menuSpeed: vitesse de l'effet (ms)

mode: type d'animation | fade | seqFade | horizontalSlide | seqHorizontalSlide | verticalSlide | seqVerticalSlide | verticalSlideAlt | seqVerticalSlideAlt
speed: vitesse de l'animation du panneau
easing: effet du panneau
seqfactor: délai entre les animations des panneaux pour seqFade | seqHorizontalSlide | seqVerticalSlide | seqVerticalSlideAlt  -->
<table>
	<tr>
	    <td  width="145px"></td>
		<td align="center" style="margin-left" >
			<div class="container">
			<div class="content">
				<div id="sbi_container" class="sbi_container">
					<div class="sbi_panel" data-bg="images/c.png">
						<a href="consul.php" class="sbi_label">Le Consul</a>
											
					</div>
					<div class="sbi_panel" data-bg="images/v.jpg">
						<a href="visa.php" class="sbi_label">L'Administration de visas</a>
											
					</div>
					<div class="sbi_panel" data-bg="images/mt.jpg">
						<a href="etranger.php" class="sbi_label">Service des affaires etrangéres</a>
									
					</div>

					
				</div>
			</div>
		</td>
		<!-- fin 2e td -->
		<td width="130px" >
          <!-- td vide -->
		</td>
		<!--  dernier td  -->
		<td width="300px" align="right" >
         <div width="250px" style="margin: 0 auto ;" >
         	<?php include 'tweet.php'; ?>
         </div>
		</td>
		
	</tr>
</table>
<br>
<table  width="950px" height="250px" align="center" style="margin-left:140px;" >
	<tr> 
		<td width="300px" height="250px" >
			<div class="info" >
			 <b>A propos du consulat</b>
			 <p>
			 	Sénégal au Canada: En plus du consulat à Montréal, Sénégal dispose 4 autres représentations au Canada.
			 	Les autres représentations incluent une ambassade à Ottawa consulats à Québec, Vancouver, et Winnipeg.Canada au Sénégal: Canada dispose d'une ambassade à Dakar.
                Le consulat du Sénégal à Montréal est l'un des 613 représentations étrangères au Canada, 
                et l'une des 84 représentations étrangères à Montréal.
                Le  consulat à Montréal est l'une des 143 représentations diplomatiques et consulaires du Sénégal dans le monde. 
			 </p>
			</div>
		</td>

		<td width="300px">
			<div class="ho" >
			<b>Heures d'Ouverture</b>
			<br>
			<b>Du Lundi au vendredi</b> :
			09h00 – 13h00 <br/>
			14h00 – 16h00<br/>
			<b>Horaires d'été</b> 
			<br/>
			(du 1er juin au 31 août)
			<br/>
            <br/>
			<b>Du lundi au vendredi</b> : 
			<br/>
			09h00 – 13h00 <br/>
			13h30 – 15h00
			</div>
		</td>

		<td width="300px" >
			<div class="dw">
				<b>FORMULAIRES</b>
				<br>
				<b>Affaires consulaires</b>
				<ul>
					<li><a href="download.php?pdf=Formulaire_Immatriculaton.pdf"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>&nbsp;Telecharger Formulaire Immatriculation</a></li>
					<li><a href="download.php?pdf=Formulaire_Sauf-conduit.pdf"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>&nbsp;Telecharger Formulaire Sauf-conduit</a></li>
					<li><a href="download.php?pdf=Formulaire_Visa.pdf"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>&nbsp;Telecharger Formulaire Visa</a></li>
				</ul>
				<b>Etudiants</b>
				<ul>
					<li><a href="download.php?pdf=Formulaire_Annexe.pdf"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>&nbsp;Telecharger Formulaire Annexe</a></li>
				</ul>

			</div>
		</td>
	</tr>
</table>	
<br/><br/><br/>
</body>
</html>