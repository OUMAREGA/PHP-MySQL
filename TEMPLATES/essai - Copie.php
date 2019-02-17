<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Script jQuery Menu à arrière plan glissant : Outils-web.com</title>
<meta name="description" content="Script jQuery Les différentes sections du menu changent d'arrière-plan au survol et le sous-menu apparait" />
<meta name="Robots" content="all"/>
<meta name="author" content="Codrops" />
<link rel="stylesheet" type="text/css" href="css1/style.css" />
<link rel="stylesheet" type="text/css" href="css1/sbimenu.css" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js1/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js1/jquery.bgImageMenu.js"></script>
<script type="text/javascript">
	$(function() {
		$('#sbi_container').bgImageMenu({
			defaultBg	: 'images/default.jpg',
			type		: {
				mode		: 'seqVerticalSlideAlt',
				speed		: 250,
				easing		: 'jswing',
				seqfactor	: 100
			}
		});
	});
</script>
</head>
<body>
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
<a href="http://www.outils-web.com"><img src="../../img/ow.png" border="0" width="400" height="100" alt=""></a>
<br /><p class="tt" >Menu à arrière plan glissant</p><br /><br />
<p><a href="default.asp" class="btn">Exemple 1</a><a href="exemple_2.asp" class="btn">Exemple 2</a><a href="exemple_3.asp" class="btn">Exemple 3</a><br /><br /></p>
		<div class="container">
			<div class="content">
				<div id="sbi_container" class="sbi_container">
					<div class="sbi_panel" data-bg="images/3.jpg">
						<a href="#" class="sbi_label">Légumes</a>
						<div class="sbi_content">
							<ul>
								<li><a href="#">Du Jardin</a></li>
								<li><a href="#">Oldies</a></li>
								<li><a href="#">Du futur</a></li>
							</ul>
						</div>						
					</div>
					<div class="sbi_panel" data-bg="images/4.jpg">
						<a href="#" class="sbi_label">Pâtes</a>
						<div class="sbi_content">
							<ul>
								<li><a href="#">Couleurs</a></li>
								<li><a href="#">De la mer</a></li>
								<li><a href="#">Azote</a></li>
							</ul>
						</div>						
					</div>
					<div class="sbi_panel" data-bg="images/5.jpg">
						<a href="#" class="sbi_label">Produits de la mer</a>
						<div class="sbi_content">
							<ul>
								<li><a href="#">Crustacées</a></li>
								<li><a href="#">Poissons</a></li>
								<li><a href="#">Algues</a></li>
							</ul>
						</div>						
					</div>
					<div class="sbi_panel" data-bg="images/6.jpg">
						<a href="#" class="sbi_label">Salades</a>
						<div class="sbi_content">
							<ul>
								<li><a href="#">Chaudes</a></li>
								<li><a href="#">Tièdes</a></li>
								<li><a href="#">Froides</a></li>
							</ul>
						</div>						
					</div>
				</div>
			</div>
<br/><br/><br/>
</body>
</html>