<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Situs Resmi SMK Muhammadiyah 2 Banjarsari";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

include_once (APPPATH."libraries/Rssparser.php");

$rss = new Rssparser();
$rss->set_feed_url('https://blog.smkm2banjarsari.sch.id/feeds/posts/default/-/berita/?alt=rss'); //('http://feeds.feedburner.com/smkm2banjarsari'); 	
$rss->set_cache_life(5); 						// Set cache life time in minutes
$berita = $rss->getFeed(10);

$rss->set_feed_url('https://blog.smkm2banjarsari.sch.id/feeds/posts/default/-/materi/?alt=rss'); //('http://feeds.feedburner.com/smkm2banjarsari'); 	
$rss->set_cache_life(5); 						// Set cache life time in minutes
$materi = $rss->getFeed(10);

$rss->set_feed_url('https://blog.smkm2banjarsari.sch.id/feeds/posts/default/-/informasi/?alt=rss'); //('http://feeds.feedburner.com/smkm2banjarsari'); 	
$rss->set_cache_life(5); 						// Set cache life time in minutes
$info = $rss->getFeed(10);

$data_berita = "<li>Belum ada berita yang di publikasikan</li>";
$data_materi = "<li>Belum ada Materi</li>";
$data_informasi = "<li>Belum ada Informasi</li>";

if(count($berita) > 0)
{
	$data_berita = "";
	
	foreach ($berita as $item)
	{
		$judul = $item['title'];
		$konten = $item['description'];
		$link = $item['link'];
		
		$konten = word_limiter(preg_replace('/[^A-Za-z0-9\-] \n/', '', $konten), 30);
		
		$data_berita .= "
			<li class='homeartikel'>
				<a target='_blank' href='$link' title='$judul'><b>$judul</b></a>
				<br /><br />
				
				$konten
				
				<a target='_blank' href='$link' title='$judul'>Selengkapnya</a>
			</li>
		";
	}
}	

if(count($materi) > 0)
{
	$data_materi	= "";
	
	foreach ($materi as $item)
	{
		$judul = $item['title'];
		$konten = $item['description'];
		$link = $item['link'];
		
		$konten = word_limiter(preg_replace('/[^A-Za-z0-9\-] /', '', $konten), 30);
		
		$data_materi .= "
			<li class='homeartikel'>
				<a target='_blank' href='$link' title='$judul'><b>$judul</b></a>
				<br /><br />
				
				$konten
				
				<a target='_blank' href='$link' title='$judul'>Selengkapnya</a>
			</li>
		";
	}
}	

if(count($info) > 0)
{
	$data_informasi = "";
	
	foreach ($info as $item)
	{
		$judul = $item['title'];
		$konten = $item['description'];
		$link = $item['link'];
		
		$konten = word_limiter(preg_replace('/[^A-Za-z0-9\-] /', '', $konten), 30);
		
		$data_informasi .= "
			<li class='homeartikel'>
				<a target='_blank' href='$link' title='$judul'><b>$judul</b></a>
				<br /><br />
				
				$konten
				
				<a target='_blank' href='$link' title='$judul'>Selengkapnya</a>
			</li>
		";
	}
}	

$page_content = "
			<h1>Selamat Datang</h1>
			<p>Selamat datang di situs resmi SMK Muhammadiyah 2 Banjarsari. Dengan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. Sebaliknya orangtua dapat mengakses informasi tentang kegiatan akademik dan non akademik putra - puterinya di sekolah ini. Dengan fasilitas ini Siswa dapat mengakses berbagai informasi pembelajaran dan informasi akademik.</p>
			
			
			
			<ul class='tabs'><!-- tabs -->
				<li class='active'><a href='#berita'>Berita Terbaru</a></li>
				<li><a href='#info'>Info Terbaru</a></li>
				<li><a href='#materi'>Materi Terbaru</a></li>
			</ul>

			<div id='lebarTab'>
				<div id='berita' class='tab_content' style='display: block;'>
					<ul>
						$data_berita 					
					</ul>			
				</div>
					
				<div id='info' class='tab_content' style='display: none;'>
					<ul>
						$data_informasi 					
					</ul>
				</div>
					<div id='materi' class='tab_content' style='display: none;'>
					<ul>
						$data_materi				
					</ul>
					</div>
			</div>
";

require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
