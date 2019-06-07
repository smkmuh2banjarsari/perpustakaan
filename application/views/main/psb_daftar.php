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


$head_content = "
	<script src='https://www.google.com/recaptcha/api.js?render=6LfXR34UAAAAABRig7NKqTAlhrIRNNV4Df9ZmZMU'>
	</script>
	<link rel='stylesheet' type='text/css' href='$assets_url/css/jquery.timepicker.css' />
	
	<script type='text/javascript' src='$assets_url/js/jquery.timepicker.js'>
	</script>
	
	<script type='text/javascript'>
		var tahun_ini = new Date().getFullYear();
		var tahun_min = tahun_ini - 80;
		var tahun_max = tahun_ini + 3;
		var tahun_lahir = tahun_ini - 10;
		
		$(document).ready(function(){
			$('#tanggal_lahir' ).datepicker({
				monthNames: [ 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ],
				dayNamesMin: [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sa' ],
				yearRange: tahun_min+':'+tahun_lahir,
				defaultDate: tahun_lahir+'-01-01',
				changeYear: true,
				dateFormat: 'yy-mm-dd'
			});
		});
	</script>
";

$page_content = "
	<div class='row justify-content-center'>
		<h4>Sistem Informasi PPDB SMK Muhammadiyah 2 Banjarsari</h4>
		Silahkan isi Formulir Pendaftaran dengan Data yang Sebenarnya.
	</div>
	<div class='row justify-content-center'>
		<h4>Formulir Pendaftaran</h4>
		<form method='post' action='$ppdb_url/simpan'>
			
			<table>
				<tbody>
					<tr>
						<td valign='top'><b>Nama Lengkap</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='nama_lengkap' placeholder='Nama Lengkap' required /></td>
					</tr>
					<tr>
						<td valign='top'><b>NISN</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='nisn' placeholder='NISN' /></td>
					</tr>
					<tr>
						<td valign='top'><b>Jenis Kelamin</b></td>
						<td valign='top'>:</td>
						<td valign='top'>
							<select name='jenis_kelamin'>
								<option value='1'>Laki-Laki</option>
								<option value='0'>Perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign='top'><b>Tempat Lahir</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='tempat_lahir' placeholder='Tempat Lahir' required /></td>
					</tr>
					<tr>
						<td valign='top'><b>Tanggal Lahir</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='tanggal_lahir' placeholder='YYYY-MM-DD' id='tanggal_lahir' required /></td>
					</tr>
					<tr>
						<td valign='top'><b>Alamat Tinggal</b></td>
						<td valign='top'>:</td>
						<td valign='top'><textarea name='alamat_rumah' placeholder='Alamat'></textarea></td>
					</tr>
					<tr>
						<td valign='top'><b>Asal Sekolah</b></td>
						<td valign='top'>:</td>
						<td valign='top'>
							<select name='jurusan_minat'>
								<option value='TKR'>Teknik Kendaraan Ringan</option>
								<option value='TKJ'>Teknik Komputer dan Jaringan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign='top'><b>Asal Sekolah</b></td>
						<td valign='top'>:</td>
						<td valign='top'>
							<select name='sekolah_asal'>
								<option value='smp'>SMP</option>
								<option value='mts'>MTS</option>
								<option value='dll'>Lainnya</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign='top'><b>Nama Sekolah Asal</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='nama_sekolah' placeholder='Nama Sekolah Asal' /></td>
					</tr>
					<tr>
						<td valign='top'><b>No Kontak</b></td>
						<td valign='top'>:</td>
						<td valign='top'><input type='text' name='no_telp' placeholder='Nomor Kontak Anda' /></td>
					</tr>
				</tbody>
			</table>
			
			<div class='large-12'>
				<script>
					grecaptcha.ready(function() {
						grecaptcha.execute('6LfXR34UAAAAABRig7NKqTAlhrIRNNV4Df9ZmZMU', {action: 'simpan'}).then(function (token) {
							var recaptchaResponse = document.getElementById('recaptchaResponse');
							recaptchaResponse.value = token;
						});
					});
				</script>
				 <input type='hidden' name='recaptcha_response' id='recaptchaResponse'>
			</div>
			
			<input type='submit' value='Simpan' />
		</form>
	</div>
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
