<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Pencarian";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "<a href='$main_url'>Home</a> &#187; Hasil Pencarian";

$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>Pencarian</h3>
		
		<gcse:searchbox-only></gcse:searchbox-only>
	</aside>
	
	<aside class='f_widget ab_widget'>
		<gcse:searchresults-only></gcse:searchresults-only>
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
