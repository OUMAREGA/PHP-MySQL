<div class="testomonial" >
			<div class="tableau" ><br><center><h2>Testimonial</h2></center></div>	
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
						<div class="ptestomonial" ><img src="4.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>Simplement extraordinaire ! Ils ont resolu mon probleme, chapeau.</blockquote>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alain Laporte.
					</li>
					<li>
						<div class="ptestomonial" ><img src="7.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>Je vous le recommande fortement. Un personnel de qualite.</blockquote>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abdoulaye Bitew.
					</li>
					<li>
						<div class="ptestomonial" ><img src="6.jpg"></div><br><br><br><br><br><br><br><br>
						<blockquote>Un énorme succès. Il est comme marcher sur le soleil par rapport à ses concurrents.</blockquote>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jean Pierre Mendes.
					</li>
				</ul>
			</div>
			<style>
				* {
					margin:0;
					padding:0;
				}
				#testimonials{
					width: 400px;
					height: 300px;
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
					text-align: right;
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
					padding: 10px 0 10px 50px;
				}
			</style>
		</div>
	</div>