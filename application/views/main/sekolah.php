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

$page = $this->uri->segment(3);

$judul_l = "SMK Muhammadiyah 2 Banjarsari";
$map_dir = "<a href='$main_url'>Home</a> &#187; Sekolah ";
$data_sekolah = "";

switch($page)
{
	case "sejarah":
		$judul_laman = "Sejarah";
		$judul_l = "Sejarah SMK Muhammadiyah 2 Banjarsari";
		$map_dir .= "&#187; Sejarah Sekolah";
		
		$data_sekolah = "
			Sejarah SMK Muhammadiyah Banjarsari
		";
	;
	break;
	
	case "profil":
		$judul_laman = "Profil";
		$judul_l = "Profil SMK Muhammadiyah 2 Banjarsari";
		$map_dir .= "&#187; Profil Sekolah";
		
		$data_sekolah = "
		<p>
			SMK Muhammadiyah 2 Banjarsari adalah SMK Swasta di Banjarsari, Ciamis yang berada dibawah naungan Persyarikatan Muhammadiyah Banjarsari. 
		</p>
		
		<b>A. Data Yayasan</b>
		<table>
			<tbody>
				<tr>
					<td>Nama</td>
					<td colspan='2'>: Muhammadiyah</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td colspan='2'>: Jln. Pasar Baru Cibadak No. 126 Tlp. (0265) 650048  Banjarsari</td>
				</tr>
				
				<tr>
					<td valign='top'>Akte Notaris</td>
					<td>
						Nama <br />
						Nomor <br />
						Tanggal <br />
					</td>
					<td>
						: Syarif Thajeb <br />
						: 23628/MPK/74 <br />
						: 24 Juli 1974
					</td>
				</tr>
				<tr>
					<td valign='top'>Nama Pengurus</td>
					<td>
						Ketua <br />
						Sekretaris <br />
						Bendahara <br />
					</td>
					<td>
						: Toto Kusmana <br />
						: Sujana <br />
						: H. Bazari
					</td>
				</tr>
			</tbody>
		</table>
		
		<br />
		<b>B. Identitas Sekolah</b>
		
		<table>
			<tbody>
				<tr>
					<td>Nama SMK</td>
					<td colspan='2'>: Muhammadiyah 2 Banjarsari</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td colspan='2'>: Jln. Pasar Baru Cibadak No. 126 Tlp. (0265) 650884  Banjarsari</td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>: -</td>
				</tr>
				<tr>
					<td>Email</td>
					<td colspan='2'>: <a href='mailto:smkm2bjrs@yahoo.com'>smkm2bjrs@yahoo.com</a> / <a href='mailto:sekolah@smkm2banjarsari.sch.id'>sekolah@smkm2banjarsari.sch.id</a></td>
				</tr>
				<tr>
					<td>Desa/ Kel.</td>
					<td colspan='2'>: Cibadak</td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td colspan='2'>: Banjarsari</td>
				</tr>
				<tr>
					<td>Kabupaten</td>
					<td colspan='2'>: Ciamis</td>
				</tr>
				<tr>
					<td>NSS</td>
					<td colspan='2'>: 322021423010</td>
				</tr>
				<tr>
					<td>NDS</td>
					<td colspan='2'>: 420.230.0005</td>
				</tr>
				<tr>
					<td>NPSN</td>
					<td colspan='2'>: 20211498</td>
				</tr>
				<tr>
					<td valign='top'>Izin Pendirian</td>
					<td>
						Nomor <br />
						Tanggal <br />
					</td>
					<td>
						: 3120/102.1/Kep/OT/1999 <br />
						: 5 Agustus 1999
					</td>
				</tr>
			</tbody>
		</table>
		";
	;
	break;
	
	case "visi-misi":
		$judul_laman = "Visi dan Misi";
		$judul_l = "Visi dan Misi";
		$map_dir .= "&#187; Visi dan Misi";
		
		$data_sekolah = "
			<b>A. Visi SMK Muhammadiyah 2 Banjarsari</b>
			<p>
				Menjadikan SMK Muhammadiyah 2 Banjarsari sebagai sekolah unggulan yang berfungsi sebagai pusat pendidikan dan pelatihan Kejuruan Mekanik Otomotif dengan memenuhi Standar Nasional dan Internasional.
			</p>
			<b>B. Misi SMK Muhammadiyah 2 Banjarsari</b>
			<ul>
				<li>Menyelenggarakan pendidikan yang professional, tertib, aman dan nyaman.</li>
				<li>Membentuk tamatan yang memiliki kepribadian yang beriman dan bertaqwa.</li>
				<li>Menciptakan tamatan yang berkompetensi keahlian otomotif.</li>
				<li>Menciptakan kepuasan dalam pelaksanaan kegiatan diklat.</li>
			</ul>
		";
	;
	break;
	
	case "struktur-organisasi":
		$judul_laman = "Struktur Organisasi";
		$judul_l = "Struktur Organisasi";
		$map_dir .= "&#187; Struktur Organisasi";
		
		$data_sekolah = "
			<div style='text-align:center;width:100%'>
				<img alt='Struktur Organisasi Sekolah' src='$assets_url/org/struktur-organisasi-sekolah.png' style='width:100%' />
			</div>
		";
	;
	break;
	
	default:
		$judul_l = "";
		
		$data_sekolah = "
			<p>
				SMK Muhammadiyah 2 Banjarsari merupakan Sekolah swasta di Banjarsari yang berada dibawah Pimpinan Cabang Muhammadiyah Banjarsari, Ciamis.
			</p>
		";
	;
	break;
}






$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>$judul_l</h3>
		
		$data_sekolah
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
