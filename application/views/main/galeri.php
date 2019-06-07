<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Galeri";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "<a href='$main_url'>Home</a> &#187; Galeri ";

$page_content = "
			<h1>Galeri SMK Muhammadiyah 2 Banjarsari</h1>
			<p>
				Galeri Kegiatan SMK Muhammadiyah 2 Banjarsari
			</p>
			
			
			
			
			
			<h3>Video Terbaru</h3>
			<iframe width='560' height='315' src='https://www.youtube.com/embed/videoseries?list=PLdvQ7zDEj7Kz6BTK-2fJvwQCjLi5KbMoB' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>
";

require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
