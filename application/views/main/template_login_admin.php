<!DOCTYPE html>

<html lang="id_ID" class="no-js" amp>
	<head>
		<meta charset="UTF-8" />
		
		<title>{judul_laman} | {judul_situs}</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
		<meta name="description" content="{deskripsi_situs}" />
		<meta name="keywords" content="{keyword_situs}" />
		<meta name="author" content="{judul_situs}" />
		<meta name="robots" content="noindex, nofollow" />
		<link href="{base_url}favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="canonical" href="{current_url}" />
		<link rel="alternate" hreflang="id" href="{current_url}" />
		
		<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js">
		</script><![endif]-->
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/webicons.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/foundation-icons.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/foundation.min.css" />
		
		<link rel="stylesheet" href="{base_url}assets/css/style.edukasi.css" media="screen" />
		
		
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/jquery-3.3.1.min.js">
		</script>
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/foundation.min.js">
		</script>
		

		<script type="text/javascript">
			$(document).ready(function(){
				if ($(window).scrollTop() == 0) {
					$("#keAtas").fadeOut(1000);
				}
				
				$(window).scroll(function() {
					if ($(this).scrollTop() != 0) {
						$("#keAtas").fadeIn();
					} else {
						$("#keAtas").fadeOut();
					}
				});
				
				$("#keAtas").click(function(event) {
					event.preventDefault();
					$("html,body").animate({scrollTop: 0},2000);
				});
				
				$(".reset").bind("click", function() {
					$("input[type=text], textarea").val("");
				});
					
				
				
			});
		</script>
		
    
		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
		</style>
		<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
		<script async src="https://cdn.ampproject.org/v0.js">
		</script>
	</head>
	
	<body id="atas" class="login-page">
		<div id="master" class="grid-container large-12 medium-12 small-12">
			<div id="login-box">
				<div class="login-logo">
					<img src="{base_url}assets/images/tutwurihandayani.png" alt="logo" class="text-center" width="100">
					<!--a href="http://127.0.0.1/eRapor/"><b>e-Rapor SMK</b></a-->
				</div>
				
				<div class="login-box-body">
					<p class="login-box-msg">
						Halaman Login
					</p>
					
					
					<form action="{base_url}master/periksa" method="post">
						<div class="form-group has-feedback">
							<input type="text" name="username" class="form-control" placeholder="Masukan Username">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" name="password" class="form-control" placeholder="Password">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							{page_content}
						</div>
						<div class="form-group has-feedback">
							<input type="text" name="captcha" class="form-control" placeholder="Ketik Huruf Diatas">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<br />
						<div class="row" style="text-align:center">
							
							<!-- /.col -->
							<div class="col-xs-4">
								<button type="submit" class="radius small button">Masuk</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
			</div>
			
				
			<footer class="large-12 medium-12 small-12">
				<div style="position:relative;padding-left:10px;padding-right:10px;text-align:center;">
					<p style="text-align:center">
						&copy; {tahun_sekarang} <a href="{base_url}">{judul_situs}</a><br /> 
						Developed by <a target="_blank" href="https://www.facebook.com/dadan.setia">facebook.com/dadansetia</a>
					</p>
				</div>
			</footer>
			
		</div>
		
		<div id="keAtas" style="display: none">
			<a href="#atas"><img alt="atas" src="{base_url}assets/images/keatas.png" /> </a>
		</div>
		<!-- End Content -->
		
	</body>
</html>