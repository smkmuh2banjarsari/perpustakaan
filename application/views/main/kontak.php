<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Kontak";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "<a href='$main_url'>Home</a> &#187; Kontak SMK Muhammadiyah 2 Banjarsari";

$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>Lokasi Sekolah</h3>
		<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.052787950022!2d108.6161472!3d-7.4913777!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x97f867937cb9ab17!2sSMK+Muhammadiyah+2+Banjarsari!5e0!3m2!1sid!2sid!4v1543493291433' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
		
		<h3>Kontak Kami</h3>
		
		
		<table>
			<tbody>
				<tr>
					<td valign='top' width='80px'><b>Alamat</b></td>
					<td valign='top'>:</td>
					<td valign='top'>Jl. Pasar Baru Cibadak No. 126 Banjarsari, Kec. Banjarsari Kab. Ciamis 46383</td>
				</tr>
				<tr>
					<td valign='top'><b>Telepon</b></td>
					<td valign='top'>:</td>
					<td valign='top'>(0265) 650883</td>
				</tr>
				<tr>
					<td valign='top'><b>E-mail</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a href='mailto:smkm2bjrs@yahoo.com'>smkm2bjrs@yahoo.com</a> / <a href='mailto:sekolah@smkm2banjarsari.sch.id'>sekolah@smkm2banjarsari.sch.id</a></td>
				</tr>
				<tr>
					<td valign='top'><b>Website</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a href='$main_url'>www.smkm2banjarsari.sch.id</a></td>
				</tr>
				<tr>
					<td valign='top'><b>Facebook</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a target='_blank' href='https://www.facebook.com/SMKMuhammadiyah2Banjarsari/'>SMK Muhammadiyah 2 Banjarsari</a></td>
				</tr>
				<tr>
					<td valign='top'><b>Instagram</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a target='_blank' href='https://www.instagram.com/smkm2banjarsari'>Instagram.com/smkm2banjarsari</a></td>
				</tr>
				<tr>
					<td valign='top'><b>Twitter</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a target='_blank' href='https://twitter.com/smkm2banjarsari'>Twitter.com/smkm2banjarsari</a></td>
				</tr>
				<tr>
					<td valign='top'><b>YT</b></td>
					<td valign='top'>:</td>
					<td valign='top'><a target='_blank' href='https://www.youtube.com/channel/UCpDFVCP790oyzn3RfOmHCiw'>SMK Muhammadiyah 2 Banjarsari</a></td>
				</tr>
			</tbody>
		</table>
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
