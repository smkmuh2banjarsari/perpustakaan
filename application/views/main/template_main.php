<!DOCTYPE html>

<html lang="id_ID" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="google-site-verification" content="ZN8dj1CblwpNtNum5pPclJg2JetKPH119gbRBIE2akU" />
		
		<title>{judul_laman} | {judul_situs}</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="{deskripsi_situs}" />
		<meta name="keywords" content="{keyword_situs}" />
		<meta name="author" content="{judul_situs}" />
		<meta name="robots" content="index, follow" />
		<meta content="Indonesia" name="geo.country" />
		<meta content="ID" name="country" />
		<link href="{base_url}favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="canonical" href="{current_url}" />
		<link rel="alternate" hreflang="id" href="{current_url}" />
		<!--<link rel="amphtml" href="{amp_url}">-->
		
		<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js">
		</script><![endif]-->
		
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/style2.css" />
		<link rel="stylesheet" href="{base_url}assets/css/flexslider.css" type="text/css" media="all">
		
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/jquery-3.3.1.min.js">
		</script>
		<script src="{base_url}assets/js/jquery.carouFredSel-5.5.0-packed.js" type="text/javascript">
		</script>
		<!--[if lt IE 9]>
			<script src="{base_url}assets/js/modernizr.custom.js"></script>
		<![endif]-->
		<script src="{base_url}assets/js/jquery.flexslider-min.js" type="text/javascript">
		</script>
		<script src="{base_url}assets/js/functions.js" type="text/javascript">
		</script>
		<script src="{base_url}assets/js/functions2.js" type="text/javascript">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/modernizr-3.js">
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
				
				
				
				//When page loads...
				$(".tab_content").hide(); //Hide all content
				$("ul.tabs li:first").addClass("active").show(); //Activate first tab
				$(".tab_content:first").show(); //Show first tab content
				
				//On Click Event
				$("ul.tabs li").click(function() {

					$("ul.tabs li").removeClass("active"); //Remove any "active" class
					$(this).addClass("active"); //Add "active" class to selected tab
					$(".tab_content").hide(); //Hide all tab content

					var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
					$(activeTab).fadeIn(); //Fade in the active ID content
					return false;
				});
				
				  $('.flexslider').flexslider({
				    animation: "slide",
				    animationLoop: true,
				    itemWidth: 210,
				    itemMargin: 5,
				    minItems: 2,
				    maxItems: 4
				  });
			});
		</script>
		
		<script src="{base_url}assets/js/highslide.js">
		</script>
		<script type="text/javascript">
			hs.graphicsDir = '{base_url}assets/images/';
			hs.outlineType = 'rounded-white';
		</script>
		<script type="text/javascript" src="{base_url}assets/js/jquery-photostack.js">
		</script>
		
		<script type="text/javascript" src="{base_url}assets/js/shCore.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/shBrushXml.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/shBrushJScript.js">
		</script>
		<script src="{base_url}assets/js/jquery.easing.js">
		</script>
		<script src="{base_url}assets/js/jquery.mousewheel.js">
		</script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id=UA-107257366-1">
		</script>
		<script type="text/javascript">
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-107257366-1');
		</script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
		</script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-0408457475405328",
			enable_page_level_ads: true
		  });
		</script>
		
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js">
		</script>
		<script>
			window.addEventListener("load", function(){
			window.cookieconsent.initialise({
			  "palette": {
				"popup": {
				  "background": "#efefef",
				  "text": "#404040"
				},
				"button": {
				  "background": "#8ec760",
				  "text": "#ffffff"
				}
			  },
			  "theme": "classic",
			  "content": {
				"href": "https://www.smkm2banjarsari.sch.id/kebijakan-privasi"
			  }
			})});
		</script>
		
		{head_content}
	</head>
	
	<body id="atas">
		<div id="master" class="grid-container large-12 medium-12 small-12">
			<div class="wrapper">
				<div class="atas">
			<!-- HEAD -->
					<div class="kepala">
						<a href="{base_url}">
						</a>
						<div class="fl_kiri kiribesar">
							<a href="{base_url}">
								<img class="logo" src="{base_url}assets/images/smkm2banjarsari.png" title="Halaman Utama">
								<h1>{judul_situs}</h1>
							</a>
							<p class="info">Jl. Pasar Baru No. 126 Cibadak Kec. Banjarsari Kab. Ciamis 46383</p>
						</div>
						
						<div class="cl"></div>
					</div><!-- END HEAD -->
					
					<!-- MENU -->
					<nav>
						<div class="menu">
							<ul class="sf-menu" id="nav">
								<li>
									<a href="{base_url}">Beranda</a>
								</li>
								<li class="sf-parent">
									<a href="#">Informasi Sekolah<span class="sf-arrow"></span></a>
									
									<ul style="left: auto; display: none;">
										<li>
											<a href="{base_url}main/sekolah/sejarah">Sejarah Sekolah</a>
										</li>						
										<li>
											<a href="{base_url}main/sekolah/profil">Profil Sekolah</a>
										</li>						
										<li>
											<a href="{base_url}main/sekolah/visi-misi">Visi Misi</a>
										</li>
										<li>
											<a href="{base_url}main/sekolah/struktur-organisasi">Struktur Organisasi</a>
										</li>
										<li>
											<a href="{base_url}main/team">Guru dan TU</a>
										</li>				
									</ul>	
								</li>
								<li class="sf-parent">
									<a href="#">Kompetensi Keahlian<span class="sf-arrow"></span></a>
									
									<ul style="left: auto; z-index: 1005; display: none;">
										<li>
											<a href="{base_url}main/prodi/tkro">Teknik Kendaraan Ringan</a>
										</li>						
										<li>
											<a href="{base_url}main/prodi/tkj">Teknik Komputer dan Jaringan</a>
										</li>		
									</ul>									
								</li>
								
								<li class="sf-parent">
									<a href="#">Ekstrakulikuler<span class="sf-arrow"></span></a>
																				
									<ul style="left: auto; z-index: 1008; display: none;" >
										<li>
											<a href="{base_url}main/ekstrakulikuler/hizbul-wathan">Hizbul Wathan</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/ipm">IPM</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/tapak-suci">Tapak Suci</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/pks">Patroli Keamanan Sekolah</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/paskibra">Paskibra</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/marching-band">Marching Band</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/calung">Calung</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/sepak-bola">Sepakbola</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/futsal">Futsal</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/pam">PAM</a>
										</li>
										<li>
											<a href="{base_url}main/ekstrakulikuler/kokam">KOKAM</a>
										</li>
									</ul>							
								</li>
								
								<li>
									<a href="{base_url}muhammadiyah">Muhammadiyah<span class="sf-arrow"></span></a>
									
									<ul style="left: auto; z-index: 1010; display: none;" >
										<li>
											<a href="{base_url}muhammadiyah/tokoh">Tokoh</a>
										</li>
										<li>
											<a href="{base_url}muhammadiyah/galeri">Galeri</a>
										</li>
										<li>
											<a href="{base_url}muhammadiyah/sejarah">Sejarah</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="{base_url}main/berita">Berita</a>
								</li>
								<li>
									<a href="{base_url}ppdb">PPDB</a>
								</li>
								<li>
									<a href="{base_url}kontak">Kontak</a>
								</li>
								
							</ul>
							<div class="cl"></div>
						</div>
					</nav><!-- END MENU -->
			
					<div class="cl"></div>
				</div>
			
				<!-- CONTENT -->
				<div class="content">
					<div class="fl_kiri"><!-- FLOAT KIRI -->
						<p class="judul_head">{map_dir}</p>
						
						{page_content}
						
						<div id="disqus_thread"></div>
						<script>
						/**
						*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
						/*
						var disqus_config = function () {
						this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						*/
						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://smkm2banjarsari.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						
						<div class="cl"></div>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
						</script>
						<script>
							 (adsbygoogle = window.adsbygoogle || []).push({
								  google_ad_client: "ca-pub-0408457475405328",
								  enable_page_level_ads: true
							 });
						</script>
						<!-- smkm2banjarsari -->
						<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-client="ca-pub-0408457475405328"
							 data-ad-slot="6083082496"
							 data-ad-format="auto"
							 data-full-width-responsive="true"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						
						<div class="section" style="height:20px;margin:0;padding:0;">
						</div>
						<div class="cl"></div>
					
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c0142fc0c505634">
						</script>
						
						<div class="addthis_inline_share_toolbox">
						</div>
					<!-- end tabs -->
					</div><!-- END FLOAT KIRI -->
					
					<div class="fl_kanan"><!-- FLOAT KANAN -->
						<div id="sidebar_container">	<!-- SIDEBAR -->
						
							<img class="paperclip" src="{base_url}assets/images/paperclip.png" alt="Pencarian" />
							<div class="sidebar">
								<h3>Pencarian</h3>
								
								<script>
								  (function() {
									var cx = 'partner-pub-0408457475405328:8805857876';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								  })();
								</script>
								<gcse:searchbox-only></gcse:searchbox-only>
							</div>
							
							<img class="paperclip" src="{base_url}assets/images/paperclip.png" alt="paperclip" />
							<div class="sidebar">
							  <h3>Kepala Sekolah</h3>
							  <center><a id="thumb1" class="highslide" href="{base_url}assets/images/kepsek.jpg" onclick="return hs.expand(this)">
							  <img alt="Highslide JS" class="kepsek" src="{base_url}assets/images/kepsek.jpg" title="klik untuk memperbesar">
							  </a></center>
							  <p class="kepsek">H.M. KHOERI,SE.MM</p>
							  <p class="nip">NBM : 648 477</p>
							</div>
							
							
							
							<img class="paperclip" src="{base_url}assets/images/paperclip.png" alt="paperclip" />
							<div class="sidebar">
								<h3>Facebook</h3>
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSMKMuhammadiyah2Banjarsari%2F&tabs&width=280&height=150&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=360610961152481" width="280" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
							</div>
							
							<img class="paperclip" src="{base_url}assets/images/paperclip.png" alt="paperclip">
							<div class="sidebar">
							  <h3>Statistik Web</h3>
								
								
								<div id="histats_counter"></div>
								<script type="text/javascript">var _Hasync= _Hasync|| [];
								_Hasync.push(['Histats.start', '1,4186361,4,408,270,55,00001111']);
								_Hasync.push(['Histats.fasi', '1']);
								_Hasync.push(['Histats.track_hits', '']);
								(function() {
								var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
								hs.src = ('//s10.histats.com/js15_as.js');
								(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
								})();</script>
								<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4186361&101" alt="free web page hit counter" border="0"></a></noscript>

							</div>

						</div><!-- END SIDEBAR -->
					</div><!-- END FLOAT KANAN -->
					<div class="cl"></div>
					<div class="section" style="height:20px;margin:0;padding:0;">
					</div>
					<div class="clear"></div>
				</div><!--END CONTENT --><!-- END BADAN -->
				
				<div class="footer"><!-- FOOTER -->
					<div class="atas">
						<div class="box_footer">
							<h2>Link Terkait</h2>
							<ul>
								<li><a href="{base_url}ppdb">Penerimaan Siswa Baru</a></li>
								<li><a href="{base_url}kebijakan-privasi">Kebijakan dan Privasi</a></li>
								<li><a href="{base_url}muhammadiyah">Direktori Perjuangan</a></li>
								
								<li><a target="_blank" href="http://muhammadiyah.or.id/">Muhammadiyah</a></li>
							</ul>
						</div>
						<div class="box_footer">
							<h2>Kompetensi Kejuruan</h2>
							<ul>
								<li><a href="{base_url}main/prodi/tkj">Teknik Komputer &amp; Jaringan</a></li>
								<li><a href="{base_url}main/prodi/tkro">Teknik Kendaraan Ringan</a></li>
							</ul>
						</div>
						<div class="box_footer">
							<h2>Hubungi Kami</h2>
							<table>
								<tbody>
									<tr>
										<td valign="top" width="80px"><b>Alamat</b></td>
										<td valign="top">:</td>
										<td valign="top">Jl. Pasar Baru No. 126 Banjarsari</td>
									</tr>
									<tr>
										<td valign="top"><b>Telepon</b></td>
										<td valign="top">:</td>
										<td valign="top">0265 - 650883</td>
									</tr>
									<tr>
										<td valign="top"><b>E-mail</b></td>
										<td valign="top">:</td>
										<td valign="top"><a href="mailto:sekolah@smkm2banjarsari.sch.id">sekolah@smkm2banjarsari.sch.id</a></td>
									</tr>
									<tr>
										<td valign="top"><b>Website</b></td>
										<td valign="top">:</td>
										<td valign="top"><a href="{base_url}">www.smkm2banjarsari.sch.id</a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="box_footer">
							<h2>Ikuti Kami</h2>
							<ul class="list">
								<li><a href="https://www.facebook.com/SMKMuhammadiyah2Banjarsari" target="_blank">Facebook</a></li>
								<li><a href="https://www.instagram.com/smkm2banjarsari" target="_blank">Instagram</a></li>
								<li><a href="https://www.twitter.com/smkm2banjarsari" target="_blank">Twitter</a></li>
								<li><a href="https://www.youtube.com/channel/UCpDFVCP790oyzn3RfOmHCiw" target="_blank">Youtube</a></li>
							</ul>
						</div>
						<div class="cl"></div>
					</div>
					<br>
					<div class="bawah">
						Copyright &copy; {tahun_sekarang} <a href="{base_url}">{judul_situs}</a>. <br />
						Powered by <a href="https://www.facebook.com/dadan.setia" target="_blank">Hehehe</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<script type="text/javascript" src="{base_url}assets/js/jquery.easing-sooper.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/jquery.sooperfish.js">
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
		  $('ul.sf-menu').sooperfish();
		});
		</script>
		
		<div id="keAtas" style="display: none">
			<a href="#atas"><img alt="atas" src="{base_url}assets/images/keatas.png" /> </a>
		</div>
		<!-- End Content -->
		
	</body>
</html>