<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Prodi SMK Muhammadiyah 2 Banjarsari";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$page = $this->uri->segment(3);

$data_prodi = "";
$judul_prodi = "";
$map_dir = "<a href='$main_url'>Home</a> &#187; Prodi ";

switch($page)
{
	case "tkro":
		$judul_laman = "Teknik Kendaraan Ringan";
		$judul_prodi = "Teknik Kendaraan Ringan";
		$map_dir .= "&#187; Teknik Kendaraan Ringan ";
		
		$data_prodi = "
			Data Prodi Teknik Kendaraan Ringan
		";
	;
	break;
	
	case "tkj":
		$judul_laman = "Teknik Komputer dan Jaringan";
		$judul_prodi = "Teknik Komputer dan Jaringan";
		$map_dir .= "&#187; Teknik Komputer dan Jaringan ";
		
		$data_prodi = "
			Data Prodi Teknik Komputer dan Jaringan
		";
	;
	break;
	
	default:
		$data_prodi = "
			Program Keahlian SMK Muhammadiyah 2 Banjarsari Meliputi <br />
			<a href='$main_url/prodi/tkro'>Teknik Kendaraan Ringan (Otomotif)</a> <br />
			<a href='$main_url/prodi/tkj'>Teknik Komputer dan Jaringan</a>
		";
	;
	break;
}






$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>Program Studi $judul_prodi</h3>
		
		$data_prodi
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
