<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Blog";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "<a href='$main_url'>Home</a> &#187; Blog ";

// Set name of XML file
$file = "http://feeds.feedburner.com/smkm2banjarsari";

include_once (APPPATH."libraries/Rssparser.php");

//$this->load->library('rssparser');							// load library
$rss = new Rssparser();
$rss->set_feed_url('http://feeds.feedburner.com/smkm2banjarsari'); 	// get feed
$rss->set_cache_life(30); 						// Set cache life time in minutes
$rss = $rss->getFeed(6);

$data_feed = "Tidak ada data";

if(count($rss) > 0)
{
	$data_feed = "<ul>";
	
	foreach ($rss as $item)
	{
		$judul = $item['title'];
		$konten = $item['description'];
		$link = $item['link'];
		
		$data_feed .= "
			<li class='homeartikel'>
				<a target='_blank' href='$link' title='$judul'><h1>$judul</h1></a>
				<br /><br />
				
				$konten
			</li>
		";
	}
	
	$data_feed .= "</ul>";
}	
	
$page_content = "
	<h1>Berita Sekolah</h1>
	<div id='lebarTab'>
		<div id='berita' class='tab_content' style='display: block;'>
			$data_feed
		</div>
	</div>
";

require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
