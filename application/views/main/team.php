<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Team";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$page = $this->input->get('page');
$id_karyawan = $this->input->get('k');

$data_team = "Data tidak Ditemukan!";
$map_dir = "<a href='$main_url'>Home</a> &#187; <a href='$main_url/team'>Guru dan TU</a> ";
$judul_l = "Guru dan TU";
$stat_karyawan = array("" => "", "gty" => "Guru Tetap Yayasan", "gtt" => "Guru Tidak Tetap", "gbs" => "Guru Bantu Sekolah", "pns" => "PNS", "pty" => "Pegawai Tetap Yayasan", "ptt" => "Pegawai Tidak Tetap");

switch($page)
{
	case "detail":
		$karyawan = $this->model_main->get_data_karyawan($id_karyawan);
		
		if($karyawan !== FALSE)
		{
			$foto_guru = $assets_url."/images/unknown.jpg";
			
			$data_team = "
				<div class='data-guru' style='float:left;'>
				<table class='detguru'>
					
					<tbody>
						
			";
			 
			foreach($karyawan AS $kry)
			{
				$judul_laman = "Profil $kry->nama_lengkap";
				$judul_l = $kry->nama_lengkap;
				$map_dir .= "&#187; $kry->nama_lengkap";
				$jenis_kel = "Laki-laki";
				$gelar_belakang = "";
				
				if($kry->jenis_kelamin == FALSE)
				{
					$jenis_kel = "Perempuan";
				}
				
				if(! empty($kry->gelar_belakang))
				{
					$gelar_belakang = ", ".$kry->gelar_belakang;
				}
				
				$data_team .= "
						<tr>
							<td>Nama Lengkap</td>
							<td>: <b>$kry->gelar_depan $kry->nama_lengkap $gelar_belakang</b></td>
						</tr>
						<tr>
							<td>Nama Panggilan</td>
							<td>: <b>$kry->nama_panggilan</b></td>
						</tr>
						<tr>
							<td>Jemis Kelamin</td>
							<td>: <b>$jenis_kel</b></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>: <b>$kry->nama_jabatan</b></td>
						</tr>
						<tr>
							<td>Pendidikan Terakhir</td>
							<td>: <b>$kry->pendidikan_terakhir</b></td>
						</tr>
						<tr>
							<td>Status Karyawan</td>
							<td>: <b>".$stat_karyawan[$kry->status_karyawan]."</b></td>
						</tr>
						<tr>
							<td>Tahun Masuk</td>
							<td>: ".date("d-m-Y", strtotime($kry->tanggal_masuk))."</td>
						</tr>
				";
				
				if(! empty($kry->foto) && file_exists("./media/karyawan/$kry->tahun_masuk/".$kry->foto))
				{
					$foto_guru = $media_url."/karyawan/$kry->tahun_masuk/".$kry->foto;
				}
				
				if(! empty($kry->sosial_facebook))
				{
					$data_team .= "
						<tr>
							<td>Facebook</td>
							<td>: ".auto_link($kry->sosial_facebook, 'both', TRUE)."</td>
						</tr>";
				}
				
				if(! empty($kry->sosial_instagram))
				{
					$data_team .= "
						<tr>
							<td>Instagram</td>
							<td>: ".auto_link($kry->sosial_instagram, 'both', TRUE)."</td>
						</tr>";
				}
				
				if(! empty($kry->sosial_twitter))
				{
					$data_team .= "
						<tr>
							<td>Facebook</td>
							<td>: ".auto_link($kry->sosial_twitter, 'both', TRUE)."</td>
						</tr>";
				}
			}
			
			$data_team .= "
					</tbody>
				</table>
					<br />
					<a href='$main_url/team'>&lt;&lt; Kembali</a>
				</div>
				
				<div class='foto-guru' style='clear:none;float:right;margin:-40px auto auto auto;'>
					<img src='$foto_guru' alt='$kry->nama_lengkap' style='width:200px;' />
				</div>
			";
		}
	;
	break;
	
	default:
		$karyawan = $this->model_main->get_karyawan(0);
		$judul_laman = "Data Guru dan TU";
		$judul_l = "Data Guru dan TU SMK Muhammadiyah 2 Banjarsari";
		
		if($karyawan !== FALSE)
		{
			$data_team = "
				<table class='data'>
					<thead class='data'>
						<tr class='data'>
							<th class='data'>No</th>
							<th class='data'>Nama</th>
							<th class='data'>Jabatan</th>
							<th class='data'>Status</th>
						</tr>
					</thead>
					<tbody>
			";
			
			$i=1;
			
			foreach($karyawan AS $kry)
			{
				$st_karyawan = "Aktif";
				
				if($kry->aktif == FALSE)
				{
					$st_karyawan = "Non-Aktif";
				}
				$data_team .= "
						<tr>
							<td>$i</td>
							<td><a href='$main_url/team?page=detail&k=$kry->id_karyawan'>$kry->nama_lengkap</a><br /></td>
							<td>$kry->nama_jabatan</td>
							<td>$st_karyawan</td>
						</tr>
				";
				
				$i++;
			}
			
			$data_team .= "
					</tbody>
				</table>
			";
		}
	;
	break;
}


$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>$judul_l</h3>
		
		$data_team
		
		<div class='cl'></div>
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file team.php */
/* Location: ./application/views/main/team.php */
