<!DOCTYPE html>

<html lang="id_ID" class="no-js" amp>
	<head>
		<meta charset="UTF-8" />
		<meta name="google-site-verification" content="A1oNoSjtLwsHb4oDF-BIl_TIRT-7SiNbR7F_gnMUGVY" />
		
		<title>{judul_laman} | {judul_situs}</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
		<meta name="description" content="{deskripsi_situs}" />
		<meta name="keywords" content="{keyword_situs}" />
		<meta name="author" content="{judul_situs}" />
		<meta name="robots" content="index, follow" />
		<link href="{base_url}favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="canonical" href="{current_url}" />
		<link rel="alternate" hreflang="id" href="{current_url}" />
		
		<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js">
		</script><![endif]-->
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/webicons.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/foundation-icons.css" />
		
		<link rel="stylesheet" href="{base_url}assets/css/style.edukasi.css" media="screen" />
		
		<link rel="stylesheet" href="{base_url}assets/css/style.responsive.css" media="all" />
		<link rel="stylesheet" href="{base_url}assets/css/jquery.bxslider.css" />
		
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/jquery-3.3.1.min.js">
		</script>
		
		<script src="{base_url}assets/js/script.js">
		</script>
		<script src="{base_url}assets/js/script.responsive.js">
		</script>
		<script src="{base_url}assets/js/jquery.easing.1.3.js">
		</script>
		<script src="{base_url}assets/js/jquery.fitvids.js">
		</script>
		<script src="{base_url}assets/js/jquery.bxslider.min.js">
		</script>
		
		<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
		.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		</style>
		
		<script type="text/javascript">
		var behavior="TD"
		var ns6=document.getElementById&&!document.all
		var ie=document.all
		function changeto(e,color)
		{
		 source=ie? event.srcElement : e.target
		 if(source.tagName=="TABLE")
		 return
		 while(source.tagName!=behavior && source.tagName!="HTML")
		 source=ns6? source.parentNode : source.parentElement
		 if(source.style.backgroundColor!=color&&source.id!="ignore")
		 source.style.backgroundColor=color
		}
		function contains_ns6(master, slave) 
		{
		 while (slave.parentNode)
		 if ((slave = slave.parentNode) == master)
		 return true;
		 return false;
		}
		function changeback(e,originalcolor)
		{
		 if (ie&&(event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="ignore")||source.tagName=="TABLE")
		 return
		 else if (ns6&&(contains_ns6(source, e.relatedTarget)||source.id=="ignore"))
		 return
		 if (ie&&event.toElement!=source||ns6&&e.relatedTarget!=source)
		 source.style.backgroundColor=originalcolor
		}
		function detailagen(mn)
		{
		window.open('../procs/agenda.php?kode='+mn,'Cek','width=300,height=90,resizable=no,scrollbars=no'); 

		}
		function daftar()
		{

		window.open('../users/daftar.php','Daftar Member'); 

		}

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
					
				$('#bxslider4').bxSlider({
					auto:true,
					mode: 'vertical',
					slideWidth: 200,
					minSlides: 2,
					slideMargin: 5,
					pager: false,
					controls: false
				});
				
				$('#bxslider0').bxSlider({
					auto: true,
					adaptiveHeight: true,
					mode: 'fade',
					easing: 'easeOutBounce',
					controls: false,
					pager: false
				});
				
			});
		</script>
		
    
		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
		</style>
		<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
		<script async src="https://cdn.ampproject.org/v0.js">
		</script>
	</head>
	
	<body id="atas">
		<div id="master">
		
			{page_content}
			
			<div class="art-sheet clearfix">
				<header class="art-header">
					<div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
						<div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 200px;">
							<ul id="bxslider0" style="width: auto; position: relative;">
								<li style="float: none; list-style: none; position: absolute; width: 1000px; z-index: 0; display: none;">
								   <img src="{base_url}media/data/gbanner7.jpg" alt="header">
								</li>

								<li style="float: none; list-style: none; position: absolute; width: 1000px; z-index: 0; display: none;">
								   <img src="./Selamat Datang_files/gbanner9.jpg" alt="header1">
								</li>

								<li style="float: none; list-style: none; position: absolute; width: 1000px; z-index: 50; display: list-item;">
								   <img src="./Selamat Datang_files/gbanner8.jpg" alt="Banner5">
								</li>
							</ul>
						</div>
					</div>
				</header>
				
				<nav class="art-nav desktop-nav">
					<a href="{base_url}/#" class="art-menu-btn"><span></span><span></span><span></span>
					</a>
					<ul class="art-hmenu">
						<li>
							<a href="{base_url}/index.php" target="_self"><span class="t">Home</span></a>
							<ul class="art-hmenu-left-to-right"></ul>
						</li>
					<li>
						<a href="{base_url}/profil.php" target="_self"><span class="t">Profil</span></a>
						<ul>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=11&amp;profil=Visi%20dan%20Misi" target="_self">Visi dan Misi</a>
								<ul></ul>
							</li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=12&amp;profil=Sejarah%20Singkat" target="_self">Sejarah Singkat</a><ul></ul>
							</li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=17&amp;profil=Sarana%20&amp;%20Prasarana" target="_self">Sarana &amp; Prasarana</a><ul></ul>
							</li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=15&amp;profil=Struktur%20Organisasi" target="_self">Struktur Organisasi</a><ul></ul>
							</li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=14&amp;profil=Kepala%20Sekolah" target="_self">Kepala Sekolah</a><ul></ul></li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=18&amp;profil=Kemitraan" target="_self">Kemitraan</a><ul></ul></li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=13&amp;profil=Program%20Kerja" target="_self">Program Kerja</a><ul></ul></li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=19&amp;profil=Kondisi%20Siswa" target="_self">Kondisi Siswa</a><ul></ul></li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=22&amp;profil=Komite%20Sekolah" target="_self">Komite Sekolah</a><ul></ul></li>
							<li>
								<a href="{base_url}/profil.php?id=profil&amp;kode=16&amp;profil=Prestasi" target="_self">Prestasi</a><ul></ul>
							</li>
						</ul>
				   </li>
				   
				   <li><a href="{base_url}/guru.php" target="_self"><span class="t">Guru</span></a><ul><li><a href="{base_url}/guru.php?id=dbguru" target="_self">Direktori Guru</a><ul></ul></li><li><a href="{base_url}/guru.php?id=silabus" target="_self">Silabus</a><ul></ul></li><li><a href="{base_url}/guru.php?id=materi" target="_self">Materi Ajar</a><ul></ul></li><li><a href="{base_url}/guru.php?id=soal" target="_self">Materi Uji</a><ul></ul></li><li><a href="{base_url}/guru.php?id=profil&amp;kode=23&amp;profil=Prestasi%20Guru" target="_self">Prestasi Guru</a><ul></ul></li><li><a href="{base_url}/guru.php?id=profil&amp;kode=20&amp;profil=Kalender%20Akademik%20Semester%20Ganjil%202016" target="_self">Kalender Akademik Semester Ganjil 2016</a><ul></ul></li></ul></li><li><a href="{base_url}/siswa.php" target="_self"><span class="t">Siswa</span></a><ul><li><a href="{base_url}/siswa.php?id=dbsiswa" target="_self">Direktori Siswa</a><ul></ul></li><li><a href="{base_url}/siswa.php?id=prestasi" target="_self">Prestasi Siswa</a><ul></ul></li><li><a href="{base_url}/siswa.php?id=profil&amp;kode=21&amp;profil=OSIS" target="_self">OSIS</a><ul></ul></li><li><a href="{base_url}/2" target="_self">Ektrakurikuler</a><ul><li><a href="{base_url}/?id=profil&amp;kode=56&amp;profil=Pramuka" target="_self">Pramuka</a>
						<ul></ul></li><li><a href="{base_url}/?id=profil&amp;kode=57&amp;profil=PMR" target="_self">PMR</a>
						<ul></ul></li><li><a href="{base_url}/?id=profil&amp;kode=58&amp;profil=SISPALA" target="_self">SISPALA</a>
						<ul></ul></li></ul></li><li><a href="{base_url}/siswa.php?id=profil&amp;kode=24&amp;profil=Beasiswa" target="_self">Beasiswa</a><ul></ul></li></ul></li><li><a href="{base_url}/alumni.php" target="_self"><span class="t">Alumni</span></a><ul><li><a href="{base_url}/alumni.php?id=data" target="_self">Direktori Alumni</a><ul></ul></li><li><a href="{base_url}/alumni.php?id=info" target="_self">Info Alumni</a><ul></ul></li></ul></li><li><a href="{base_url}/index.php" target="_self"><span class="t">Fitur</span></a><ul><li><a href="{base_url}/index.php?id=info" target="_self">Info</a><ul></ul></li><li><a href="{base_url}/index.php?id=project" target="_self">Opini</a><ul></ul></li><li><a href="{base_url}/index.php?id=dafblog" target="_self">Daftar Blog</a><ul></ul></li><li><a href="{base_url}/index.php?id=link" target="_self">Link</a><ul></ul></li><li><a href="{base_url}/index.php?id=profil&amp;kode=26&amp;profil=Peta%20Situs" target="_self">Peta Situs</a><ul></ul></li><li><a href="{base_url}/index.php?id=profil&amp;kode=27&amp;profil=Kontak%20Sekolah" target="_self">Kontak Sekolah</a><ul></ul></li><li><a href="{base_url}/index.php?id=agenda" target="_self">Agenda</a><ul></ul></li></ul></li><li><a href="{base_url}/#" target="_self"><span class="t">Galeri</span></a><ul><li><a href="{base_url}/index.php?id=video" target="_self">Galeri Video</a><ul></ul></li><li><a href="{base_url}/index.php?id=album" target="_self">Galeri Photo</a><ul></ul></li></ul></li><li><a href="{base_url}/index.php?id=berita" target="_self"><span class="t">Berita</span></a><ul></ul></li><li><a href="{base_url}/index.php?id=artikel" target="_self"><span class="t">Artikel</span></a><ul></ul></li><li><a href="{base_url}/index.php?id=buku" target="_self"><span class="t">Buku Tamu</span></a><ul></ul></li><li><a href="http://mail.maalkhairaatbuntulia.sch.id/" target="_blank"><span class="t">Webmail</span></a><ul></ul></li><li><a href="http://psb.maalkhairaatbuntulia.sch.id/" target="_self"><span class="t">PPDB</span></a><ul></ul></li><li><a href="{base_url}/index.php?id=Alkhairaat" target="_self"><span class="t">Alkhairaat</span></a><ul></ul>
						</li>
					</ul>  
				</nav>
				
				<footer class="art-footer">
					<a title="RSS" class="art-rss-tag-icon" style="position: absolute; bottom: 25px; left: 6px; line-height: 32px;" href="{base_url}/rss"></a>
					
					<div style="position:relative;padding-left:10px;padding-right:10px">
						<p>
							<a href="{base_url}">Home</a> | 
							<a href="{base_url}">Kontak Sekolah</a> | 
							<a href="{base_url}">Info Sekolah</a>
						</p>
						<p>
							&copy; {tahun_sekarang} <a href="{base_url}">{judul_situs}</a><br /> 
							Developed by <a target="_blank" href="https://google.com/+DadanSetia">google.com/+DadanSetia</a>
						</p>
					</div>
				</footer>
			</div>
		</div>
		
		<div id="art-resp"><div id="art-resp-m"></div><div id="art-resp-t"></div></div>
		<div id="art-resp-tablet-landscape"></div>
		<div id="art-resp-tablet-portrait"></div>
		<div id="art-resp-phone-landscape"></div>
		<div id="art-resp-phone-portrait"></div>
		
		<div id="keAtas" style="display: none">
			<a href="#atas"><img alt="atas" src="{base_url}assets/images/keatas.png" /> </a>
		</div>
		<!-- End Content -->
		
		
<div id="art-main">
    <div class="art-sheet clearfix">
      
<div class="art-layout-wrapper">
<div class="art-block"> <marquee behavior="scroll" direction="left" height="15" scrollamount="4" width="100%"><h3>Ahlan Wa Sahlan... di Madrasah Aliyah Alkhairaat Buntulia.  |  Mulai tahun ini, pendaftaran Peserta Didik Baru dilakukan secara online, akses di http://psb.maalkhairaatbuntulia.sch.id/. |  Pendaftaran Peserta Didik Baru dibuka bulan Mei 2017.</h3></marquee></div>
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1">
						  <!-- multibahasa-->
						<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Pencarian</h3>
        </div>
        <div class="art-blockcontent"><div><form action="{base_url}/index.php" method="post"><table><tbody><tr><td><input type="text" name="query" size="17"></td><td>
<input type="submit" value="Cari" class="art-button" style="zoom: 1;"></td></tr><input type="hidden" value="cari" name="id"></tbody></table></form></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Login Member</h3>
        </div>
        <div class="art-blockcontent"><div><center><form id="form1" name="login" action="{base_url}/users/index.php" method="post">
<table border="0" width="100%"><tbody><tr><td>Username</td><td>:<input type="text" name="username" class="editbox" size="15" title="Masukan Username"></td></tr>
<tr><td>Password </td><td>:<input type="password" name="password" class="editbox" size="15" title="Masukan Password"></td></tr>
<tr><td colspan="2"><input type="submit" value="Login  " class="art-button" style="zoom: 1;">
<input type="hidden" name="lang" value="id"><input type="submit" value="Daftar " class="art-button" onclick="daftar()" style="zoom: 1;"></td></tr></tbody></table></form></center></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Kontak Kami</h3>
        </div>
        <div class="art-blockcontent"><div><p style="text-align: center;"><img width="60" height="60" alt="" src="./Selamat Datang_files/60730012.jpg"><br></p><p style="text-align: center;"><strong>Madrasah Aliyah Alkhairaat Buntulia</strong></p><p style="text-align: center;">NPSN : <a href="http://referensi.data.kemdikbud.go.id/tabs.php?npsn=60730012" target="_blank">60730012</a></p><p style="text-align: center;">Jl.Sis Aljufri No. 02 Km. 170 Ds. Buntulia Utara Kec. Buntulia Kab. Pohuwato 96266</p><hr><p style="text-align: center;">alkhairaatma.buntulia@gmail.com</p><p style="text-align: center;">TLP : (0443) 2215104</p><br><p style="text-align: center;">&nbsp;&nbsp;<a href="https://www.facebook.com/maalkhairaatbuntulia" target="_blank" class="art-facebook-tag-icon" style="line-height: 32px;"></a>&nbsp;&nbsp;<a href="https://www.twitter.com/@mabuntulia_alkh" target="_blank" class="art-twitter-tag-icon" style="line-height: 32px;"></a>&nbsp;&nbsp;<a href="https://www.youtube.com/channel/UCFNmbKqt8tVmPmQ8O" target="_blank" class="art-youtube-tag-icon" style="line-height: 32px;"></a>&nbsp;&nbsp;<a href="https://www.instagram.com/aditiaweb" target="_blank" class="art-ig-tag-icon" style="line-height: 32px;"></a>&nbsp;&nbsp;<a href="https://plus.google.com/u/0/103712286834438724642" target="_blank" class="art-gplus-tag-icon" style="line-height: 32px;"></a></p></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Banner</h3>
        </div>
        <div class="art-blockcontent"><div><script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider11').bxSlider({
             auto:true,
             mode: 'horizontal',
adaptiveHeight: true,
pager:false,
controls:false

          });
       });
	</script><div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 60px;"><ul id="bxslider11" style="width: 415%; position: relative; transition-duration: 0s; transform: translate3d(-416px, 0px, 0px);"><li style="list-style: none; float: left; position: relative; width: 208px;" class="bx-clone">
                             <a href="{base_url}/procs/visit.php?id=5" target="_blank"><img src="./Selamat Datang_files/bn5.jpg" width="210" height="60"></a>
                            </li>
      
                            <li style="list-style: none; float: left; position: relative; width: 208px;">
                             <a href="{base_url}/procs/visit.php?id=3" target="_blank"><img src="./Selamat Datang_files/bn3.jpg" width="210" height="60"></a>
                            </li>
                            <li style="list-style: none; float: left; position: relative; width: 208px;">
                             <a href="{base_url}/procs/visit.php?id=5" target="_blank"><img src="./Selamat Datang_files/bn5.jpg" width="210" height="60"></a>
                            </li>     
      <li style="list-style: none; float: left; position: relative; width: 208px;" class="bx-clone">
                             <a href="{base_url}/procs/visit.php?id=3" target="_blank"><img src="./Selamat Datang_files/bn3.jpg" width="210" height="60"></a>
                            </li></ul></div></div> </div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Jajak Pendapat</h3>
        </div>
        <div class="art-blockcontent"><div><form action="{base_url}/index.php" method="post">
					Bagaimana pendapat anda mengenai web sekolah kami ?
		   			<br>
		     	<table border="0" cellspacing="0" width="100%"><tbody><tr>
						<td>
							<font class="ari13">Sangat bagus</font>
						</td>
						<td>
							<input type="hidden" name="file" value="Resource" id="" #22=""><input type="hidden" name="am_id" value="1">
							<input type="hidden" name="lt_id" value=""><input type="hidden" name="t_id" value="">
							<input type="radio" name="guest" value="1">
						</td>
					</tr><tr>
						<td>
							<font class="ari13">Bagus</font>
						</td>
						<td>
							<input type="hidden" name="file" value="Resource" id="" #22=""><input type="hidden" name="am_id" value="1">
							<input type="hidden" name="lt_id" value=""><input type="hidden" name="t_id" value="">
							<input type="radio" name="guest" value="2">
						</td>
					</tr><tr>
						<td>
							<font class="ari13">Kurang Bagus</font>
						</td>
						<td>
							<input type="hidden" name="file" value="Resource" id="" #22=""><input type="hidden" name="am_id" value="1">
							<input type="hidden" name="lt_id" value=""><input type="hidden" name="t_id" value="">
							<input type="radio" name="guest" value="3">
						</td>
					</tr></tbody></table>
						<input type="hidden" name="id" value="tam_vot"> <input class="art-button" type="submit" name="Submit" value="Pilih" style="zoom: 1;"> &nbsp;
						<a href="{base_url}/index.php?id=lih_voting&amp;kd=1" class="art-button">Lihat</a>
		    	</form>  	</div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Statistik</h3>
        </div>
        <div class="art-blockcontent"><div><br>
        <table>
        <tbody><tr><td class="news-title"><img src="./Selamat Datang_files/9.gif" width="17" height="14"> Total Hits </td><td class="news-title"> : 23625 </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/9.gif" width="17" height="14"> Pengunjung </td><td class="news-title"> : 7934 </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/8.gif" width="17" height="14"> Hari ini </td><td class="news-title"> : 16 </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/9.gif" width="17" height="14"> Hits hari ini </td><td class="news-title"> : 17 </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/10.gif" width="17" height="14"> Member Online </td><td class="news-title"> : 67 </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/10.gif" width="17" height="14"> IP</td><td class="news-title"> : 115.178.201.16</td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/10.gif" width="17" height="14"> Proxy</td><td class="news-title"> :  - </td></tr>
        <tr><td class="news-title"><img src="./Selamat Datang_files/10.gif" width="17" height="14"> Browser</td><td class="news-title"> : Safari</td></tr>
        </tbody></table></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Status Member</h3>
        </div>
        <div class="art-blockcontent"><div><script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider4').bxSlider({
             auto:true,
             mode: 'vertical',
             slideWidth: 200,
             minSlides: 2,
             slideMargin: 5,
             pager: false,
             controls: false
          });
       });
	</script><div class="bx-wrapper" style="max-width: 200px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 222.581px;"><ul id="bxslider4" style="width: auto; position: relative; transition-duration: 0.5s; transform: translate3d(0px, -1254px, 0px);"><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;" class="bx-clone">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>ZAIRA SULEMAN (Siswa)</strong><br><span>2017-05-19 08:35:28</span><br><br><i>bismillahirrahmanirrahim...</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;" class="bx-clone">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>Wirda Harun (Siswa)</strong><br><span>2017-05-19 06:41:59</span><br><br><i>ya ALLAH semoga bisa...
</i></span></div> 
			   </li>
                  <li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img class="art-lightbox" src="./Selamat Datang_files/gb108.jpg" width="60" height="70" align="left" style="margin:auto 5px auto auto"><span><strong>AHMAD HUSAIN (Siswa)</strong><br><span>2017-05-19 18:15:29</span><br><br><i>Madrasah Aliyah Al-Khairaat Buntulia</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img class="art-lightbox" src="./Selamat Datang_files/gb108.jpg" width="60" height="70" align="left" style="margin:auto 5px auto auto"><span><strong>AHMAD HUSAIN (Siswa)</strong><br><span>2017-05-19 18:15:02</span><br><br><i>??????? ?????? ??????? ??????</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img class="art-lightbox" src="./Selamat Datang_files/gb108.jpg" width="60" height="70" align="left" style="margin:auto 5px auto auto"><span><strong>AHMAD HUSAIN (Siswa)</strong><br><span>2017-05-19 18:13:06</span><br><br><i>semoga ada remedial penambahan nilai SKI untuk kelas XI Ipa/Ips yg blm memenuhi standar nilainya</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>MOH. RIFQIANDI TUNGEDI (Siswa)</strong><br><span>2017-05-19 10:14:14</span><br><br><i>alah tdk tuntas pa.....</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>MOH. RIFQIANDI TUNGEDI (Siswa)</strong><br><span>2017-05-19 10:14:14</span><br><br><i>alah tdk tuntas pa.....</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>MOH. RIFQIANDI TUNGEDI (Siswa)</strong><br><span>2017-05-19 10:14:14</span><br><br><i>alah tdk tuntas pa.....</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>Fiat Katinusa (Siswa)</strong><br><span>2017-05-19 09:57:37</span><br><br><i>hmmmmm,nilai yg tidak memuaskan</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>Vebriyanti Mustafa (Siswa)</strong><br><span>2017-05-19 08:38:44</span><br><br><i>bismillah

smga brjaln dgn lncar</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>ZAIRA SULEMAN (Siswa)</strong><br><span>2017-05-19 08:35:28</span><br><br><i>bismillahirrahmanirrahim...</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;">
	           <div class="boxed" margin-top="5px"><img src="./Selamat Datang_files/kosong.jpg" width="50" height="50" align="left" .="" class="erik_gambar"><span><strong>Wirda Harun (Siswa)</strong><br><span>2017-05-19 06:41:59</span><br><br><i>ya ALLAH semoga bisa...
</i></span></div> 
			   </li>    
                <li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;" class="bx-clone">
	           <div class="boxed" margin-top="5px"><img class="art-lightbox" src="./Selamat Datang_files/gb108.jpg" width="60" height="70" align="left" style="margin:auto 5px auto auto"><span><strong>AHMAD HUSAIN (Siswa)</strong><br><span>2017-05-19 18:15:29</span><br><br><i>Madrasah Aliyah Al-Khairaat Buntulia</i></span></div> 
			   </li><li style="float: none; list-style: none; position: relative; width: 200px; margin-bottom: 5px;" class="bx-clone">
	           <div class="boxed" margin-top="5px"><img class="art-lightbox" src="./Selamat Datang_files/gb108.jpg" width="60" height="70" align="left" style="margin:auto 5px auto auto"><span><strong>AHMAD HUSAIN (Siswa)</strong><br><span>2017-05-19 18:15:02</span><br><br><i>??????? ?????? ??????? ??????</i></span></div> 
			   </li></ul></div></div> </div>
</div>
</div> <!-- kiri konten-->
                         </div>
						 
                    <div class="art-layout-cell art-content"><div class="art-layout-cell art-content">
						<article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader"><span class="art-postheadericon">Berita Terbaru</span></h2>
                                    </div>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				<div class="art-content-layout">
    <div class="art-content-layout-row"><script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider1').bxSlider({
             mode: 'fade',
             useCSS: false,
             captions: true,
             auto: true,
             adaptiveHeight: true,
             easing: 'easeOutExpo',
             controls: false
          });
       });
	</script><div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 336px;"><ul id="bxslider1" style="width: auto; position: relative;">
      
                            <li style="float: none; list-style: none; position: absolute; width: 454px; z-index: 0; display: none;">
                              <a href="{base_url}/index.php?id=berita&amp;kode=30"><img class="headline" src="./Selamat Datang_files/gb30.jpg" width="100%" height="320"></a>
                            <div class="bx-caption"><span>Info untuk Alumni</span></div></li>
                            <li style="float: none; list-style: none; position: absolute; width: 454px; z-index: 0; display: none;">
                              <a href="{base_url}/index.php?id=berita&amp;kode=29"><img class="headline" src="./Selamat Datang_files/gb29.jpg" width="100%" height="320"></a>
                            <div class="bx-caption"><span>Siswa MA Al Khairaat Halmahera Utara Tetap Ikuti UN Sesuai Jadwal</span></div></li>
                            <li style="float: none; list-style: none; position: absolute; width: 454px; z-index: 50; display: list-item;">
                              <a href="{base_url}/index.php?id=berita&amp;kode=28"><img class="headline" src="./Selamat Datang_files/gb28.jpg" width="100%" height="320"></a>
                            <div class="bx-caption"><span>Penjemputan Naskah Soal dan Lembar Jawaban</span></div></li>
                            <li style="float: none; list-style: none; position: absolute; width: 454px; z-index: 0; display: none;">
                              <a href="{base_url}/index.php?id=berita&amp;kode=27"><img class="headline" src="./Selamat Datang_files/gb27.jpg" width="100%" height="320"></a>
                            <div class="bx-caption"><span>Hari Pertama UN</span></div></li>
                            <li style="float: none; list-style: none; position: absolute; width: 454px; z-index: 0; display: none;">
                              <a href="{base_url}/index.php?id=berita&amp;kode=25"><img class="headline" src="./Selamat Datang_files/gb25.jpg" width="100%" height="320"></a>
                            <div class="bx-caption"><span>UAMBN TAHUN PELAJARAN 2015/2016</span></div></li>     
      </ul></div><div class="bx-controls bx-has-pager"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="0" class="bx-pager-link">1</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="1" class="bx-pager-link">2</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="2" class="bx-pager-link active">3</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="3" class="bx-pager-link">4</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="4" class="bx-pager-link">5</a></div></div></div></div> <div align="right" style="padding-right:8px;"><b>» <a class="link-box" href="{base_url}/index.php?id=berita">Index Berita</a></b></div></div>
</div>

</div>
                                
                

</article>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Artikel Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><div class="boxed"><a href="{base_url}/index.php?id=artikel&amp;kode=28">INGAT ALLAH HATI MU AKAN TENANG</a><br>
			<img src="./Selamat Datang_files/gb28(1).jpg" class="art-lightbox" align="left" width="100" height="65" style="margin: 4px 4px;"><p align="justify">Ingatlah Allah Hati Mu Akan Tenang.
&nbsp;
“Dengan mengingat Allah, hati menjadi&nbsp;tenang”
&nbsp;
Kejujuran itu kakasih Allah. Keterusterangan merupakan sabun pencuci hati. Pengalaman itu bukti. Dan...</p></div><div class="boxed"><a href="{base_url}/index.php?id=artikel&amp;kode=27">KENIKMATAN SUBUH</a><br>
			<img src="./Selamat Datang_files/gb27(1).jpg" class="art-lightbox" align="left" width="100" height="65" style="margin: 4px 4px;"><p align="justify">Suatu kenikmatan yang amat besar saat kita tidur kemudian kita terbangun kembali. Tidak semua orang dapat merasakan kenikmatan ini. Saat subuhpun merupakan suatu pelajaran yang binatang ajarkan kepada man...</p></div><div class="boxed"><a href="{base_url}/index.php?id=artikel&amp;kode=26">AWALI KERJA DENGAN SHALAT DHUHA</a><br>
			<img src="./Selamat Datang_files/gb26.jpg" class="art-lightbox" align="left" width="100" height="65" style="margin: 4px 4px;"><p align="justify">Tubuh manusia memiliki ratusan tulang yang masing-masing dihubungkan dengan persendian. Jumlah persendian dalam tubuh manusia adalah 360, sebagaimana disebutkan oleh Rasulullah SAW dan dibenarkan...</p></div><div class="boxed"><a href="{base_url}/index.php?id=artikel&amp;kode=25">JANGAN MENGHARAP “TERIMA KASIH” DARI SESEORANG</a><br>
			<img src="./Selamat Datang_files/gb25(1).jpg" class="art-lightbox" align="left" width="100" height="65" style="margin: 4px 4px;"><p align="justify">&nbsp;


Jika Teman Baik Kita Tidak Balas Budi.
&nbsp;
Allah menciptakan para setiap hamba agar selalu mengingat-Nya, dan Dia menganugerahkan rezeki kepada setiap makhluk ciptaan...</p></div><div class="boxed"><a href="{base_url}/index.php?id=artikel&amp;kode=24">Pendidikan Sebagai Investasi Jangka Panjang</a><br>
			<img src="./Selamat Datang_files/gb24.jpg" class="art-lightbox" align="left" width="100" height="65" style="margin: 4px 4px;"><p align="justify">Profesor Toshiko Kinosita mengemukakan bahwa sumber daya manusia Indonesia masih sangat lemah untuk mendukung perkembangan industri dan ekonomi. Penyebabnya karena pemerintah selama ini tidak pernah menempatkan pen...</p></div><div align="right" style="padding-right:8px;"><b>» <a class="link-box" href="{base_url}/index.php?id=artikel">Index Artikel</a></b></div></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Galeri Video Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><script>
        jQuery(window).load(function(){
	jQuery('img').removeAttr('title');       
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider5').bxSlider({
             slideWidth: 450,
    minSlides: 1,
    maxSlides: 1,
    slideMargin: 5,
    captions: true
             
          });
       });
	</script><div class="bx-wrapper" style="max-width: 450px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 300px;"><div id="bxslider5" style="width: 715%; position: relative; transition-duration: 0s; transform: translate3d(-455px, 0px, 0px);"><div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=4&amp;kd=7">
                      <img alt="video" src="./Selamat Datang_files/gb7.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Profile Sekolah SMAN 3 Kota Sukabumi</center></span></div></div>
      <div class="slide" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=9&amp;kd=12">
                      <img alt="video" src="./Selamat Datang_files/gb12.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Hayyaa Binaa</center></span></div></div><div class="slide" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=6&amp;kd=10">
                      <img alt="video" src="./Selamat Datang_files/gb10.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>WORKSHOP AIV 2011 PANGKAL PINANG</center></span></div></div><div class="slide" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=8&amp;kd=9">
                      <img alt="video" src="./Selamat Datang_files/gb9.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Lagu Almamater SMANTIE REUNI AKBAR 1986-2011</center></span></div></div><div class="slide" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=7&amp;kd=8">
                      <img alt="video" src="./Selamat Datang_files/gb8.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Neng Hayati XII IPA 5 Qoriah SMANTIE</center></span></div></div><div class="slide" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=4&amp;kd=7">
                      <img alt="video" src="./Selamat Datang_files/gb7.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Profile Sekolah SMAN 3 Kota Sukabumi</center></span></div></div>     
      <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 450px; margin-right: 5px;">
                            <a href="{base_url}/index.php?id=tampil&amp;kode=9&amp;kd=12">
                      <img alt="video" src="./Selamat Datang_files/gb12.jpg" width="450" height="300"></a><div class="bx-caption"><span><center>Hayyaa Binaa</center></span></div></div></div></div><div class="bx-controls bx-has-pager bx-has-controls-direction"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="0" class="bx-pager-link active">1</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="1" class="bx-pager-link">2</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="2" class="bx-pager-link">3</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="3" class="bx-pager-link">4</a></div><div class="bx-pager-item"><a href="{base_url}/" data-slide-index="4" class="bx-pager-link">5</a></div></div><div class="bx-controls-direction"><a class="bx-prev" href="{base_url}/">Prev</a><a class="bx-next" href="{base_url}/">Next</a></div></div></div> <div align="right" style="padding-right:8px;"><b>» <a class="link-box" href="{base_url}/index.php?id=video">Index Video</a></b></div></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Galeri Photo Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider2').bxSlider({
             useCSS:false,             
             slideWidth: 250,
             minSlides: 2,
             maxSlides: 5,
             slideMargin: 10,
             ticker: true,
             tickerHover: true,
             speed: 12000
             
          });
       });
	</script><div class="bx-wrapper" style="max-width: 1290px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 180px;"><ul id="bxslider2" style="width: 715%; position: relative; left: -155.22px;">
      
                            <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;">
                              <img class="art-lightbox" src="./Selamat Datang_files/noimage-besar.jpg" width="250" height="180">
                            </li>
                            <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;">
                              <img class="art-lightbox" src="./Selamat Datang_files/noimage-besar.jpg" width="250" height="180">
                            </li>
                            <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb44.jpg" width="250" height="180">
                            </li>
                            <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb43.jpg" width="250" height="180">
                            </li>
                            <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb42.jpg" width="250" height="180">
                            </li>     
      <li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;" class="bx-clone">
                              <img class="art-lightbox" src="./Selamat Datang_files/noimage-besar.jpg" width="250" height="180">
                            </li><li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;" class="bx-clone">
                              <img class="art-lightbox" src="./Selamat Datang_files/noimage-besar.jpg" width="250" height="180">
                            </li><li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;" class="bx-clone">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb44.jpg" width="250" height="180">
                            </li><li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;" class="bx-clone">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb43.jpg" width="250" height="180">
                            </li><li style="float: left; list-style: none; position: relative; width: 224px; margin-right: 10px;" class="bx-clone">
                              <img class="art-lightbox" src="./Selamat Datang_files/gb42.jpg" width="250" height="180">
                            </li></ul></div></div> <div align="right" style="padding-right:8px;"><b>» <a class="link-box" href="{base_url}/index.php?id=album">Index Photo</a></b></div></div>
</div>
</div> </div>
<div class="art-layout-cell art-sidebar2"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Photo Staf </h3>
        </div>
        <div class="art-blockcontent"><div><script>
        jQuery(window).load(function(){
	jQuery('img').removeAttr('title');       
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
        $('#bxslider3').bxSlider({
        auto: true,    
        slideWidth: 200,
        minSlides: 1,
        maxSlides: 1,
        slideMargin: 10,
        captions: true,
        pager: false
        

          });
       });
	</script><div class="bx-wrapper" style="max-width: 200px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 235px;"><ul id="bxslider3" style="width: 1815%; position: relative; transition-duration: 0.5s; transform: translate3d(-1260px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;" class="bx-clone">
                             <a href="{base_url}/guru.php?id=data&amp;kode=11"><img src="./Selamat Datang_files/67891012345.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center><br>Yolha Gham, S. Fil.I</center></span></div></li>
      
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=7"><img src="./Selamat Datang_files/197903052006042016.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wali Kelas XII IPS<br>Irawaty Hayuningkyas, S. Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=14"><img src="./Selamat Datang_files/199002022013081010.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wali Kelas XI-IPS<br>Rukiya Monoarfa, S.Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=12"><img src="./Selamat Datang_files/2345678910.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wali Kelas XI-IPA<br>Runi R. Kunai, S. Pd.I</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=13"><img src="./Selamat Datang_files/199006282013092010.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wali Kelas X-IPS<br>Susantika Kurapu, S.Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=3"><img src="./Selamat Datang_files/197206072006042025.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wakamad Bid. Sarana Prasarana<br>Sahara Abdullah Bamu S, Ag</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=10"><img src="./Selamat Datang_files/197708242006042017.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wakamad Bid. Kesiswaan<br>Fathan Lasiki, S. Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=8"><img src="./Selamat Datang_files/197811152006042010.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wakamad Bid. Kerikulum<br>Sri Astina Abubakar, S. Pd.I</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=4"><img src="./Selamat Datang_files/199108212014081010.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Pembina Pramuka - Operator<br>Asram Husuna, S.Th.I</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=15"><img src="./Selamat Datang_files/199211222016021010.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Pembina Olahraga<br>Yahya Bangga, S.Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=9"><img src="./Selamat Datang_files/197802152009012001.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Kepala TU<br>Irawaty As Ali, S. Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=16"><img src="./Selamat Datang_files/198312202009012001.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Kepala Perpus-Wali Kelas X-IPA<br>Sufiati, S. Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=2"><img src="./Selamat Datang_files/197805052006042019.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Kepala Madrasah<br>Nurul Khoiriyah H, S. Pd.I</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=6"><img src="./Selamat Datang_files/196708262006042004.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Bendahara<br>Dra. Noni S. Bawu</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=1"><img src="./Selamat Datang_files/197012272001122001.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center><br>Tanti Taha Maya, S. Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=5"><img src="./Selamat Datang_files/196212061989011003.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center><br>Subakrin Harun, S.Pd</center></span></div></li>
                            <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;">
                             <a href="{base_url}/guru.php?id=data&amp;kode=11"><img src="./Selamat Datang_files/67891012345.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center><br>Yolha Gham, S. Fil.I</center></span></div></li>     
      <li style="float: left; list-style: none; position: relative; width: 200px; margin-right: 10px;" class="bx-clone">
                             <a href="{base_url}/guru.php?id=data&amp;kode=7"><img src="./Selamat Datang_files/197903052006042016.jpg" width="200" height="235"></a>
                            <div class="bx-caption"><span><center>Wali Kelas XII IPS<br>Irawaty Hayuningkyas, S. Pd</center></span></div></li></ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href="{base_url}/">Prev</a><a class="bx-next" href="{base_url}/">Next</a></div></div></div> <br><div align="right" style="padding-right:8px;"><b>» <a href="{base_url}/guru.php?id=dbguru">Index Staf</a></b></div></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Info Sekolah</h3>
        </div>
        <div class="art-blockcontent"><div><ul><li><a href="{base_url}/index.php?id=info&amp;kode=10" class="ari13">Kebutuhan SNMPTN - SBNPTN</a></li><li><a href="{base_url}/index.php?id=info&amp;kode=9" class="ari13">HASIL SIMULASI PERTAMA UNBK</a></li><li><a href="{base_url}/index.php?id=info&amp;kode=8" class="ari13">MOS T.P 2016/2017</a></li><li><a href="{base_url}/index.php?id=info&amp;kode=7" class="ari13">Persiapan Adiwiyata 2016</a></li><li><a href="{base_url}/index.php?id=info&amp;kode=6" class="ari13">UAS TP. 2015/2016</a></li></ul><div style="text-align:right">::&nbsp;<a href="{base_url}/index.php?id=info">Selengkapnya</a></div></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Berita Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><ul><li><a href="{base_url}/index.php?id=berita&amp;kode=30" class="ari13">Info untuk Alumni</a></li><li><a href="{base_url}/index.php?id=berita&amp;kode=29" class="ari13">Siswa MA Al Khairaat Halmahera Utara Tetap Ikuti UN Sesuai Jadwal</a><img src="./Selamat Datang_files/baru.gif"></li><li><a href="{base_url}/index.php?id=berita&amp;kode=28" class="ari13">Penjemputan Naskah Soal dan Lembar Jawaban</a></li><li><a href="{base_url}/index.php?id=berita&amp;kode=27" class="ari13">Hari Pertama UN</a></li><li><a href="{base_url}/index.php?id=berita&amp;kode=25" class="ari13">UAMBN TAHUN PELAJARAN 2015/2016</a></li></ul><div style="text-align:right">:: <a href="{base_url}/index.php?id=berita">Selengkapnya</a></div></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Materi Ajar Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><ul><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=17" title="Didownload 8 kali">Ramadhan</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=18" title="Didownload 11 kali">BAKTERI</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=13" title="Didownload 12 kali">Dinamika Partikel 1</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=31" title="Didownload 12 kali">BAB 3 @SKI kelas 10 IPA/IPS</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=28" title="Didownload 13 kali">BAB 7 @SKI kelas 12 IPA/IPS</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=16" title="Didownload 14 kali">Ramadhan</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=6" title="Didownload 15 kali">Teknik dan Logika Pemrograman</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=15" title="Didownload 16 kali">mobilitas sosial</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=23" title="Didownload 16 kali">BAB 2 @SKI kelas 12 IPA/IPS</a></li><li><a href="{base_url}/guru.php?id=lihmateri&amp;kode=24" title="Didownload 16 kali">BAB 3 @SKI kelas 12 IPA/IPS</a></li><ul><div style="text-align:right">::&nbsp;<a href="{base_url}/guru.php?id=materi">Selengkapnya</a></div></ul></ul></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Agenda</h3>
        </div>
        <div class="art-blockcontent"><div><center><table bgcolor="#2492AB" height="90" width="200" border="0" cellpadding="0" cellspacing="1"><tbody><tr><td colspan="7" height="8%" align="center">	<table height="100%" width="100%" border="0"><tbody><tr><td align="left"></td>	<td align="center"><center>	<b><a href="{base_url}/#" class="tah11" title="Klik tanggalnya untuk melihat detail Agenda">10 June 2017</a></b></center></td>	<td align="right"></td></tr></tbody></table>	</td></tr><tr bgcolor="#D1E3F8">	<td height="4%" align="center" valign="top" width="14%"><center><font class="tah11"><b>M</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>S</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>S</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>R</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>K</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>J</b></font></center></td>	<td align="center" valign="top" width="14%"><center><font class="tah11"><b>S</b></font></center></td></tr>	<tr><td colspan="7"></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#FF0000"></font><center><font size="1" color="#FF0000">28</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">29</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">30</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">31</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">1</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">2</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">3</font></center></td></tr></tbody></table></center></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#FF0000"></font><center><font size="1" face="MS Sans Serif" color="#FF0000">4</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">5</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">6</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">7</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">8</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">9</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#F4E6B4" onmouseover="ddrivetip(&#39; &lt;center&gt;&lt;B&gt;Sekarang&lt;/B&gt;&lt;/center&gt;&lt;br&gt;Hari Sabtu Tanggal 10  Juni  2017&#39;,&#39;#AFF5E2&#39;,200);" onmouseout="hideddrivetip()"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">10</font></center></td></tr></tbody></table></center></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#FF0000"></font><center><font size="1" face="MS Sans Serif" color="#FF0000">11</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">12</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">13</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">14</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">15</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">16</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">17</font></center></td></tr></tbody></table></center></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#FF0000"></font><center><font size="1" face="MS Sans Serif" color="#FF0000">18</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">19</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">20</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">21</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">22</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">23</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">24</font></center></td></tr></tbody></table></center></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#FF0000"></font><center><font size="1" face="MS Sans Serif" color="#FF0000">25</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">26</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">27</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">28</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">29</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#DAEBE1"><center><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" face="MS Sans Serif" color="#000000"></font><center><font size="1" face="MS Sans Serif" color="#000000">30</font></center></td></tr></tbody></table></center></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">1</font></center></td></tr></tbody></table></td></tr>	<tr>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#FF0000"></font><center><font size="1" color="#FF0000">2</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">3</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">4</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">5</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">6</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">7</font></center></td></tr></tbody></table></td>		<td align="center" valign="top" height="14%" bgcolor="#B5CDE5"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td align="center"><font size="1" color="#000000"></font><center><font size="1" color="#000000">8</font></center></td></tr></tbody></table></td></tr></tbody></table></center></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Materi Uji Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div><ul><li><a href="{base_url}/guru.php?id=lihsoal&amp;kode=3" title="Didownload 20 kali">soal latihan 1</a>  </li><li><a href="{base_url}/guru.php?id=lihsoal&amp;kode=2" title="Didownload 17 kali">soal ulungan umum 2</a>  </li><li><a href="{base_url}/guru.php?id=lihsoal&amp;kode=1" title="Didownload 19 kali">soal ulungan umum 1</a>  </li><ul><div style="text-align:right">::&nbsp;<a href="{base_url}/guru.php?id=soal">Selengkapnya</a></div></ul></ul></div>
</div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Silabus</h3>
        </div>
        <div class="art-blockcontent"><div><ul><li><a href="{base_url}/guru.php?id=silabus&amp;kode=7" itle="Didownload 93 kali">Sejarah Kebudayaan Islam - XII IPA</a></li><li><a href="{base_url}/guru.php?id=silabus&amp;kode=6" itle="Didownload 92 kali">B. Inggris - a</a></li></ul><div style="text-align:right">:: <a href="{base_url}/guru.php?id=silabus">Selengkapnya</a>&nbsp;&nbsp;</div></div>
</div>
</div></div> <!-- tengah konten-->
                       
                    </div>
                </div>
				
				
            </div>
			
<footer class="art-footer">
<a title="RSS" class="art-rss-tag-icon" style="position: absolute; bottom: 25px; left: 6px; line-height: 32px;" href="{base_url}/rss"></a><div style="position:relative;padding-left:10px;padding-right:10px"><p><a href="{base_url}/">Home</a> | <a href="{base_url}/index.php?id=profil&amp;kode=27&amp;profil=Kontak%20Sekolah">Kontak Sekolah</a> | <a href="{base_url}/index.php?id=info">Info Sekolah</a></p>
<p>Copyright © 2017. <a href="{base_url}/">Madrasah Aliyah Alkhairaat Buntulia</a><br> 
	Website engine's code is copyright © 2017 Tim Balitbang Kemdikbud versi 170502 <br>Best viewed in Mozilla Firefox 1024 x 768 resolution.</p></div>
</footer>

    </div>
    <p class="art-page-footer">
        <span id="art-footnote-links">Setup by <a href="https://www.websitesekolahgratis.web.id/" target="_blank">Website Sekolah Gratis</a>.</span>
    </p>
</div>


	
	</body>
</html>