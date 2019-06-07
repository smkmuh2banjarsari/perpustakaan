<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/konfigurasi'>Konfigurasi</a>";
$judul_situs = "Konfigurasi Situs";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "edit";
		$konfig = $this->model_master->get_data_config($edit);
		
		if($konfig !== FALSE)
		{
			foreach($konfig AS $cfg)
			{
				$hash_kd = $this->encryption->encrypt($cfg->id_config);
				
				$page_content2 = "
					<form method='post' action='$admin_url/konfigurasi/update'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Konfigurasi
								</div>
								<div class='large-8 medium-8 small-12 column'>
									$cfg->id_config
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Data Konfigurasi
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='data_config' placeholder='Data Konfigurasi'>$cfg->data_config</textarea>
									$cfg->keterangan_config
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='submit' value='Simpan' class='small radius button' />
								<input type='reset' value='Ulang' class='small radius button' />
							</div>
						</div>
					</form>
				";
			}
		}	
	;
	break;
	
	case "update":
		$hash_kd = $this->encryption->decrypt($this->input->post('hash_kd'));
		$data_config = $this->input->post('data_config');
		
		if(! empty($hash_kd) && ! empty($data_config))
		{
			$data = array('data_config' => $data_config);
			
			$update = $this->model_master->update_config($data, $hash_kd);
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update Konfigurasi.
					<br />
					<a href='$admin_url/konfigurasi'>&lt;&lt; Kembali</a>
				";
			}
		}
	;
	break;
	
	default:
		$konfig = $this->model_master->get_config();
		
		if($konfig !== FALSE)
		{
			$page_content2 = "
				<table>
					<tr>
						<th><b>Nama Konfigurasi</b></th>
						<th><b>Nilai/Data Konfigurasi</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($konfig AS $cfg)
			{
				$page_content2 .= "
					<tr>
						<td>$cfg->id_config</td>
						<td>$cfg->data_config</td>
						<td>
							<i class='fi-page-edit'></i> <a href='$admin_url/konfigurasi/edit?data=$cfg->id_config'>Update</a>
						</td>
					</tr>
				";
			}
			
			$page_content2 .= "
				</table>
			";
		}
	;
	break;
}
