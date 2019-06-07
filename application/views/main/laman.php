<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "SMK Muhammadiyah 2 Banjarsari";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$page = $this->input->get('page');
$id_karyawan = $this->input->get('k');

$data_team = "";

switch($page)
{
	case "detail":
		$karyawan = $this->model_main->get_data_karyawan($id_karyawan);
		
		if($karyawan !== FALSE)
		{
			foreach($karyawan AS $kry)
			{
				$data_team .= "
					Nama 	: $kry->nama_lengkap <br />
					Jabatan : $kry->nama_jabatan <br />
					Alamat 	: $kry->alamat_domisili <br />
				";
				
				if(! empty($kry->sosial_facebook))
				{
					$data_team .= "Facebook 	: ".auto_link($kry->sosial_facebook, 'both', TRUE)." <br />";
				}
				
				if(! empty($kry->sosial_instagram))
				{
					$data_team .= "Instagram 	: ".auto_link($kry->sosial_instagram, 'both', TRUE)." <br />";
				}
				
				if(! empty($kry->sosial_twitter))
				{
					$data_team .= "Twitter 	: ".auto_link($kry->sosial_twitter, 'both', TRUE)." <br />";
				}
			}
		}
	;
	break;
	
	default:
		$karyawan = $this->model_main->get_karyawan_aktif();
		
		if($karyawan !== FALSE)
		{
			foreach($karyawan AS $kry)
			{
				$data_team .= "<a href='$main_url/team?page=detail&k=$kry->id_karyawan'>$kry->nama_lengkap</a><br />";
			}
		}
	;
	break;
}






$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>Team SMK Muhammadiyah 2 Banjarsari</h3>
		
		$data_team
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
