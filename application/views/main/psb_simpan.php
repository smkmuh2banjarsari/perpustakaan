<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');
$ppdb_url = base_url('ppdb');

$judul_laman = "Pendaftaran Peserta Didik Baru";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$pesan = "";

if((! $this->agent->is_browser()) && (! $this->agent->is_mobile()))
{
	exit(0);
}

//$this->encryption->initialize(array('cipher' => 'aes-256','mode' => 'ctr'));

$nama_lengkap = $this->input->post('nama_lengkap');
$nisn = $this->input->post('nisn');
$jenis_kelamin = $this->input->post('jenis_kelamin');
$tempat_lahir = $this->input->post('tempat_lahir');
$tanggal_lahir = $this->input->post('tanggal_lahir');
$alamat_rumah = $this->input->post('alamat_rumah');
$jurusan_minat = $this->input->post('jurusan_minat');
$sekolah_asal = $this->input->post('sekolah_asal');
$nama_sekolah = $this->input->post('nama_sekolah');
$no_telp = $this->input->post('no_telp');

$captcha = '';
$secretKey = "6LfXR34UAAAAAH5dUz36JAmmr9iD6PnTzW2HAjbj";
$ip_remote = $_SERVER['REMOTE_ADDR'];
$c_response = $this->input->post('recaptcha_response');


$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$c_response."&remoteip=".$ip_remote);
$response = json_decode($response);

if($response->score < 0.5) {
	$pesan = "
		Captcha Tidak Cocok! 
		<a href='$ppdb_url/daftar'>Ulangi Pendaftaran</a>. 
		";
}

if(! empty($nama_lengkap) && ! empty($alamat_rumah) && ! empty($nama_sekolah))
{
	$data = array('id_pendaftarUtama' => '', 'no_urut' => 0, 'jurusan_minat' => $jurusan_minat, 'nisn' => $nisn, 'nik' => '', 'nama_lengkap' => $nama_lengkap, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'agama' => 'islam', 'anak_ke' => 1, 'tinggi_badan' => 0, 'berat_badan' => 0, 'alamat_rumah' => $alamat_rumah, 'no_telp' => $no_telp, 'sekolah_asal' => $sekolah_asal, 'nama_sekolah' => $nama_sekolah, 'email' => '', 'nama_ayah' => '', 'nama_ibu'  => '', 'telp_ayah'  => '', 'telp_ibu'  => '', 'kerja_ayah'  => '', 'kerja_ibu'  => '', 'penghasilan_ayah'  => '', 'penghasilan_ibu'  => '', 'wali_murid'  => 'ayah', 'nama_wali'  => '', 'alamat_wali'  => '', 'telp_wali'  => '', 'kerja_wali'  => '', 'penghasilan_wali'  => '', 'no_ujian'  => '', 'no_skhun'  => '', 'no_ijazah'  => '', 'tanggal_daftar'  => date("Y-m-d"), 'syarat_formulir'  => 0, 'syarat_foto'  => 0, 'syarat_ijazah'  => 0, 'syarat_skhun'  => 0, 'syarat_akta'  => 0, 'syarat_kk'  => 0, 'syarat_ktp'  => 0, 'syarat_kip'  => 0, 'syarat_skkb'  => 0, 'syarat_lengkap'  => 0, 'online'  => 1, 'verifikasi'  => 0, 'daftar_ulang'  => 0, 'diterima'  => 0, 'ditransfer'  => 0);
	
	$set_daftar = $this->model_main->set_pendaftar($data);
	
	if($set_daftar !== FALSE)
	{
		$pesan = "
			Data Berhasil Disimpan. <br />
			Langkah berikutnya, silahkan anda ke kampus SMK Muhammadiyah 2 Banjarsari alamat Jl. Pasar Baru No. 126 Banjarsari untuk Daftar ulang pada waktu yang telah ditentukan Dengan Membawa dokumen pendaftaran. <br />
			Dokumen pendaftaran meliputi: 
			<ul>
				<li>Fotokopi Akta Kelahiran</li>
				<li>Fotokopi Kartu Keluarga</li>
				<li>Fotokopi KTP</li>
				<li>Kartu Indonesia Pintar</li>
				<li>Pas Foto 3x4 (3 lembar)</li>
			</uli>
			
			Untuk jadwal daftar ulang waktu menyusul, Terimakasih.
		";
	}else{
		$pesan = "Terjadi Kesalahan. Silahkan <a href='$ppdb_url/daftar'>Ulangi Pendaftaran</a>.";
	}
	
}else{
	$pesan = "
		Terjadi Kesalahan <a href='$ppdb_url/daftar'>Kembali</a>
	";
}


$page_content = "
	<div class='row justify-content-center'>
		<h4>Sistem Informasi PPDB SMK Muhammadiyah 2 Banjarsari</h4>
		$pesan
	</div>
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
