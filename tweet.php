<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="testomonial" >	
			<script type="text/javascript">
				$(function(){
					var items = (Math.floor(Math.random() * ($('#testimonials li').length)));
					$('#testimonials li').hide().eq(items).show();

					function next(){
						$('#testimonials li:visible').delay(5000).fadeOut('slow',function(){
							$(this).appendTo('#testimonials ul');
							$('#testimonials li:first').fadeIn('slow',next);
						});
					}
					next();
				});

			</script>
			<div id="testimonials">
				<ul>
					<li>
						<div class="ptestomonial" ><img src="images/mt.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>Son Excellence Monsieur Macky SALL, Président de la République du Sénégal et Justin TRUDEAU  président du Canada </blockquote>
					</li>
					<li>
						<div class="ptestomonial" ><img src="images/os.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>Son Excellence Monsieur Ousmane PAYE, Ambassadeur Extraordinaire et Plénipotentiaire de la République du Sénégal au Canada.</blockquote>
						
					</li>
					<li>
						<div class="ptestomonial" ><img src="images/v.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>NB: Tout dossier incomplet conduit à un refus de visa. L'attribution d'un visa canadien est seulement du ressort du consulat de canada!</blockquote>
						
					</li>
				</ul>
			</div>
			<style>
				* {
					margin:0;
					padding:0;
				}
				#testimonials{
					width:280px;
					height:320px;
					padding: 10px;
					background: #EBEBEB;
					-moz-border-radius:12px;
					-webkit-border-radius:12px;
					border-radius:12px;
				}
				#testimonials li{ 
					display:none;
				}
				#testimonials ul{
					list-style:none;
				}
				#testimonials p.author{
					color: #00ACEE;
					font-size: 16px;
					font-style: italic;
					text-align:center;
					margin:10px;
				}
				#testimonials p.author a,
				#testimonials p.author a:hover,
				#testimonials p.author a:visited{
					color:#FF6400;
				}
				blockquote {
					background: url(https://dl.dropbox.com/u/96099766/RotatingTestimonial/open-quote.png) 0 0 no-repeat;
					font-size: 24px;
					padding: 10px
				}
			</style>
	</div>

</body>
</html>