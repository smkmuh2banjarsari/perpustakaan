<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/admin/kategori'>Kategori</a>";
$judul_situs = "Kategori";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Kategori";
		$map_dir .= " &gt; Tambah Kategori";
		
		$page_content2 = "
				<form method='post' action='$admin_url/admin/kategori/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Kategori
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_kategori' placeholder='Masukan Kode Kategori' />
								<div class='note'>Masukan Kode Kategori. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Kategori
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_kategori' placeholder='Masukan Nama Kategori' />
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
		
		$kode_kategori = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_kategori')));
		$nama_kategori = $this->input->post('nama_kategori');
		
		$cek_kode = FALSE;
		
		if(! empty($kode_kategori) && ! empty($nama_kategori))
		{
			$cek_kode = $this->model_master->cek_kode_kategori($kode_kategori);
			
			if(! $cek_kode)
			{
				$insert = $this->model_master->set_kategori(array('kode_kategori' => $kode_kategori, 'nama_kategori' => $nama_kategori, 'status_kategori' => 1));
				
				$page_content2 = "
					Berhasil membuat Kategori Baru.
					<br />
					<a href='$admin_url/admin/kategori'>Lihat</a>
				";
			}else{
				$cek_lagi = $this->model_master->cek_kode_kategori_aktif($kode_kategori);
				
				if($cek_lagi)
				{
					$insert = $this->model_master->update_kategori(array('nama_kategori' => $nama_kategori, 'status_kategori' => 1), $kode_kategori);
				
					$page_content2 = "
						Berhasil membuat Kategori Baru.
						<br />
						<a href='$admin_url/admin/kategori'>Lihat</a>
					";
				}else{
				$page_content2 = "
					Kode kategori <b>$kode_kategori</b> Telah Digunakan. Silahkan Gunakan Kode lain.
					<br />
					<a href='$admin_url/admin/kategori/tambah'>&lt; Kembali</a>
				";
				}
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Kategori";
		$kategori = $this->model_master->get_data_kategori($edit);
		
		if($kategori !== FALSE)
		{
			foreach($kategori AS $kat)
			{
				$hash_kd = $this->encryption->encrypt($kat->kode_kategori);
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/admin/kategori/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Kategori
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_kategori' placeholder='Masukan Kode Kategori' value='$kat->kode_kategori' />
									<div class='note'>Masukan Kode Kategori. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Kategori
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_kategori' placeholder='Masukan Nama Kategori' value='$kat->nama_kategori' />
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
		$kode_kategori = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_kategori')));
		$nama_kategori = $this->input->post('nama_kategori');
		
		$update = FALSE;
		
		if(! empty($hash_kd) && ! empty($kode_kategori) && ! empty($nama_kategori))
		{
			if($hash_kd != $kode_kategori)
			{
				$cek_kode = $this->model_master->cek_kode_kategori($kode_kategori); 
			}else{
				$cek_kode = FALSE;
			}
			
			if(! $cek_kode)
			{
				$data = array('kode_kategori' => $kode_kategori, 'nama_kategori' => $nama_kategori);
				
				$update = $this->model_master->update_kategori($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode kategori menjadi <b>$kode_kategori</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode laman saat pengeditan.
					<br />
					<a href='$admin_url/admin/kategori/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update Kategori.
					<br />
					<a href='$admin_url/admin/kategori/edit?data=$kode_kategori'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_kategori = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus diubah menjadi update status kategori
		$hapus = $this->model_master->update_kategori(array('status_kategori' => 0), $id_kategori);
		
		if($hapus)
		{
			$page_content2 = "
				Berhasil menghapus Kategori <b>$id_kategori</b> <br />
				<a href='$admin_url/admin/kategori'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus kategori <b>$id_kategori</b> <br />
				<a href='$admin_url/admin/kategori'>Kembali</a>
			";
		}
	;
	break;
	
	default:
		$kategori = $this->model_master->get_kategori();
		$i = 1;
		
		$d_kategori = "Belum Ada Data";
		
		if($kategori !== FALSE)
		{
			$d_kategori = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Kategori</b></th>
						<th><b>Nama Kategori</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($kategori AS $kat)
			{
				$d_kategori .= "
					<tr>
						<th>$i</th>
						<th>$kat->kode_kategori</th>
						<th>$kat->nama_kategori</th>
						<th>
							<a href='$admin_url/admin/kategori/edit?data=$kat->kode_kategori'>Edit</a> | 
							<a href='$admin_url/admin/kategori/hapus?data=$kat->kode_kategori'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_kategori .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/admin/kategori/tambah'>Buat Kategori</a>
			<br /><br />
			
			$d_kategori
			
		";
	;
	break;
}
