<?php 

$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');

$map_dir = "";
$judul_situs = "Tentang Halaman Admin";

$page_content = "
	<h4>Tentang Halaman Admin</h4>
	<p>
		Halaman admin merupakan halaman pendukung untuk mempermudah memodifikasi data pada Baisdata dan pengelolaan informasi lainnya.
	</p>
	
	<p>
		Untuk mencari tahu tentang fitur terbaru dan juga masalah teknis lainnya dari aplikasi ini silahkan kunjungi <a target='_blank' href='https://github.com/dadansetia/sekolah'>https://github.com/dadansetia/sekolah</a>
	</p>
";

$data = array(
	'base_url' => base_url(),
	'judul_situs' => $judul_situs,
	'main_url' => $main_url,
	'admin_url' => $admin_url, 
	'map_dir' => $map_dir,
	'page_content' => $page_content,
	'tahun_sekarang' => date("Y")
);

$this->parser->parse('admin/template_admin', $data);