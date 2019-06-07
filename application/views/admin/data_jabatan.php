<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/jabatan'>Jabatan</a>";
$judul_situs = "Data Jabatan";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Jabatan";
		$map_dir .= " &gt; Tambah Jabatan";
		
		$page_content2 = "
				<form method='post' action='$admin_url/jabatan/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Jabatan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_jabatan' placeholder='Masukan Kode Jabatan' />
								<div class='note'>Masukan Kode Jabatan. Kode dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Jabatan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_jabatan' placeholder='Masukan Nama Jabatan' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Level Jabatan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='level_jabatan' value='10' />
								<div class='note'>Semakin Kecil, semakin tinggi posisi Jabatan. Semakin besar, semakin kecil posisi jabatan</div>
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
	;
	break;
	
	case "simpan":
		
		$kode_jabatan = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_jabatan')));
		$nama_jabatan = $this->input->post('nama_jabatan');
		$level_jabatan = $this->input->post('level_jabatan');
		
		$cek_kode = FALSE;
		
		if(! empty($kode_jabatan) && ! empty($nama_jabatan))
		{
			$cek_kode = $this->model_master->cek_kode_jabatan($kode_jabatan);
			
			if(! $cek_kode)
			{
				$insert = $this->model_master->set_jabatan(array('kode_jabatan' => $kode_jabatan, 'nama_jabatan' => $nama_jabatan, 'level_jabatan' => $level_jabatan));
				
				$page_content2 = "
					Berhasil membuat Jabatan Baru.
					<br />
					<a href='$admin_url/jabatan'>Selesai</a>
				";
			}else{
				$page_content2 = "
					Kode jabatan <b>$kode_jabatan</b> Telah Digunakan. Silahkan Gunakan Kode jabatan lain.
					<br />
					<a href='$admin_url/jabatan/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Jabatan";
		$jabatan = $this->model_master->get_data_jabatan($edit);
		
		if($jabatan !== FALSE)
		{
			foreach($jabatan AS $jab)
			{
				$hash_kd = $this->encryption->encrypt($jab->kode_jabatan);
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/jabatan/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Jabatan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_jabatan' placeholder='Masukan Kode Jabatan' value='$jab->kode_jabatan' />
									<div class='note'>Masukan Kode Jabatan. Kode dapat dapat berupa alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Jabatan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_jabatan' placeholder='Masukan Nama Jabatan' value='$jab->nama_jabatan' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Level Jabatan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='number' name='level_jabatan' value='$jab->level_jabatan' />
									<div class='note'>Semakin Kecil, semakin tinggi posisi Jabatan. Semakin besar, semakin kecil posisi jabatan</div>
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
		$kode_jabatan = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_jabatan')));
		$nama_jabatan = $this->input->post('nama_jabatan');
		$level_jabatan = $this->input->post('level_jabatan');
		
		$update = FALSE;
		
		if(! empty($hash_kd) && ! empty($kode_jabatan) && ! empty($nama_jabatan))
		{
			if($hash_kd != $kode_jabatan)
			{
				$cek_kode = $this->model_master->cek_kode_jabatan($kode_jabatan); 
			}else{
				$cek_kode = FALSE;
			}
			
			if(! $cek_kode)
			{
				$data = array('kode_jabatan' => $kode_jabatan, 'nama_jabatan' => $nama_jabatan, 'level_jabatan' => $level_jabatan);
				
				$update = $this->model_master->update_jabatan($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode jabatan menjadi <b>$kode_jabatan</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode laman saat pengeditan.
					<br />
					<a href='$admin_url/jabatan/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update jabatan.
					<br />
					<a href='$admin_url/jabatan/edit?data=$kode_jabatan'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$kode_jabatan = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus ditiadakan
		$hapus = FALSE; //$this->model_master->hapus_jabatan('kode_jabatan');
		
		if($hapus)
		{
			$page_content2 = "
				<b>Berhasil</b> menghapus Jabatan <br />
				<a href='$admin_url/jabatan'>&lt; Kembali</a>
			";
		}else{
			$page_content2 = "
				<b>Gagal</b> menghapus Jabatan <br />
				<a href='$admin_url/jabatan'>&lt; Kembali</a>
			";
		}
	;
	break;
	
	default:
		$jabatan = $this->model_master->get_jabatan();
		$i = 1;
		
		$d_jabatan = "Belum Ada Data";
		
		if($jabatan !== FALSE)
		{
			$d_jabatan = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Jabatan</b></th>
						<th><b>Nama Jabatan</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($jabatan AS $jab)
			{
				$d_jabatan .= "
					<tr>
						<th>$i</th>
						<th>$jab->kode_jabatan</th>
						<th>$jab->nama_jabatan</th>
						<th>
							<a href='$admin_url/jabatan/edit?data=$jab->kode_jabatan'>Edit</a> | 
							<a href='$admin_url/jabatan/hapus?data=$jab->kode_jabatan'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_jabatan .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/jabatan/tambah'>Tambah Jabatan</a>
			<br /><br />
			
			$d_jabatan
			
		";
	;
	break;
}
