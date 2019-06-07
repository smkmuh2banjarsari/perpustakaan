<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/backup'>Backup</a>";


$judul_situs = "Backup Database";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "download";
		$id_backup = $this->input->get('data');
		$backup = $this->model_master->get_data_backup($id_backup);
		
		if($backup !== FALSE)
		{
			foreach($backup AS $bak)
			{
				$page_content2 = "Data Downloaded";
				force_download('./database/'.$bak->file_backup, NULL);
			}
		}	
	;
	break;
	
	case "proses":
		
		// Backup your entire database and assign it to a variable
		$backup_db = $this->dbutil->backup();
		
		$tgl_lengkap = date("Y-m-d H:i:s");
		$tgl_skrg = date("Ymd_His");
		$nama_file = "backup_$tgl_skrg.sql.gz";
		
		$simpan = write_file('./database/'.$nama_file, $backup_db);
		if($simpan)
		{
			write_file('./database/backup.sql.gz', $backup_db); // Simpan Backup.sql.gz
			$data = array('id_backup' => '', 'tanggal_backup' => $tgl_lengkap, 'file_backup' => $nama_file);
			$this->model_master->set_backup($data);
			$this->model_master->update_config(array('data_config' => $tgl_lengkap), 'backup_terakhir');
		}
		
		$page_content2 = "Selesai Melakukan Backup! <br /> Kembali ke <a href='$admin_url/backup'>Laman Backup</a>";
	;
	break;
	
	case "hapus";
		$id_backup = $this->input->get('data');
		$file_backup = $this->model_master->get_single_data('file_backup', 'data_backup', 'id_backup', $id_backup);
		
		$hapus_bak = $this->model_master->hapus_backup($id_backup);
				
		if(($hapus_bak) && (file_exists('./database/'.$file_backup)))
		{
			unlink('./database/'.$file_backup);
		}
		
		$page_content2 = "Selesai Menghapus Backup! <br /> Kembali ke <a href='$admin_url/backup'>Laman Backup</a>";
	;
	break;
	
	default:
		$backup = $this->model_master->get_backup($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/backup?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('id_backup','data_backup');
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_backup = "Belum Ada Backup";
		
		if($backup !== FALSE)
		{
			$d_backup = "
				<table>
					<tr>
						<th><b>No</b></th>
						<th><b>Tanngal Backup</b></th>
						<th><b>Jam Backup</b></th>
						<th><b>File Backup</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($backup AS $bak)
			{
				$tanggal_bak = strtotime($bak->tanggal_backup);
				$tgl_backup = date("d-m-Y", $tanggal_bak);
				$jam_backup = date("H:i:s", $tanggal_bak);
				
				$d_backup .= "
					<tr>
						<th>$i</th>
						<th>$tgl_backup</th>
						<th>$jam_backup</th>
						<th>
							<a target='_blank' href='$admin_url/backup/download?data=$bak->id_backup'>$bak->file_backup</a>
						</th>
						<th>
							<a target='_blank' href='$admin_url/backup/download?data=$bak->id_backup'>Download</a> | 
							<a href='$admin_url/backup/hapus?data=$bak->id_backup'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_backup .= "
				</table>
			";
			
			
		}
		
		$page_content2 = "
			<a href='$admin_url/backup/proses'>Backup Sekarang</a>
			<br /><br />
			<p>
				Perlu diketahui Fitur ini hanya tersedia untuk Database MySQL. <br />
				Apabila Database yang anda gunakan diluar itu, maka fitur ini tidak akan berfungsi.
			</p>
			<br />
			
			$d_backup
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<ul class='pagination'>
					$halaman
				</ul>
			</div>
		";
	;
	break;
}
