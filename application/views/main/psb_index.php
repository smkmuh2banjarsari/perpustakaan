<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');
$ppdb_url = base_url('ppdb');


$judul_laman = "Sistem Informasi Penerimaan Peserta Didik Baru";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "<a href='$main_url'>Home</a> &#187; PPDB ";

$page_content = "
	<div class='row justify-content-center'>
		<h4>Sistem Informasi PPDB SMK Muhammadiyah 2 Banjarsari</h4>
		Selamat Datang di Sistem Pendaftaran Online Penerimaan Peserta Didik Tahun Ajaran 2019/2020.
	</div>
	<div class='row justify-content-center'>
		<h4>Syarat Pendaftaran</h4>
		<ul>
			<li>Mengisi Formulir Pendaftaran (Formulir Di Tempat Pendaftaran)</li>
			<li>Foto Ukuran 2x3 (2 Lembar)</li>
			<li>Foto Ukuran 4x6 (2 Lembar)</li>
			<li>Fotokopi Ijazah</li>
			<li>Fotokopi SKHUN</li>
			<li>Fotokopi Akta Kelahiran</li>
			<li>Fotokopi Kartu Keluarga</li>
			<li>Fotokopi KTP Orang Tua</li>
			<li>Surat Keterangan Berkelakuan baik dari sekolah asal</li>
			<li>NISN</li>
			<li>Kartu Indonesia Pintar</li>
		</ul>
	</div>
	<div class='row justify-content-center'>
		<h4>Kontak Personal</h4>
		Apabila ada pertanyaan seputar pendaftaran siswa baru, jangan segan untuk menghubungi kami pada : 
		<ul>
			<li>0813 2129 5571</li>
			<li>0857 9307 3005</li>
		</ul>
	</div>
	<div class='row justify-content-center'>
		<h4>Waktu dan Tempat Pendaftaran</h4>
		Pendaftaran siswa baru dimulai pada tanggal 2 April 2019 dengan lokasi di kampus SMK Muhammadiyah 2 Banjarsari Jl. Pasar Baru No. 126 Cibadak, Banjarsari. <br /><br />
		<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.052787950022!2d108.6161472!3d-7.4913777!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x97f867937cb9ab17!2sSMK+Muhammadiyah+2+Banjarsari!5e0!3m2!1sid!2sid!4v1543493291433' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
	</div>
	<br />
	<div class='cl'></div>
	<!--
	<div class='row justify-content-center'>
		<h4>Pendaftaran Secara Daring</h4>
		<p>
			Sebagai inovasi kami, anda juga dapat melakukan pendaftaran secara online dengan alur sebagai berikut: 
		</p>
		<ul>
			<li>Buka laman pendaftaran <a href='$ppdb_url/daftar' target='_blank'>$ppdb_url/daftar</a></li>
			<li>Isi Formulir pendaftaran dengan Data yang sebenarnya</li>
			<li>
				Datang Ke kampus SMK Muhammadiyah 2 Banjarsari di Jl. Pasar Baru No. 126 Banjarsari dengan membawa dokumen berikut:
				<ul>
					<li>Fotokopi Akta Kelahiran</li>
					<li>Fotokopi Kartu Keluarga</li>
					<li>Fotokopi KTP</li>
					<li>Kartu Indonesia Pintar</li>
					<li>Pas Foto 3x4 (3 lembar)</li>
				</ul>
			</li>
		</ul>
		
		<a href='$ppdb_url/daftar' style='button radius'>DAFTAR</a>
	</div>
	-->
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
