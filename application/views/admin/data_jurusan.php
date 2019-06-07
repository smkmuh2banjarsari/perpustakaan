<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/jurusan'>Jurusan</a>";
$judul_situs = "Data Jurusan";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Jurusan";
		$map_dir .= " &gt; Tambah Jurusan";
		
		$page_content2 = "
				<form method='post' action='$admin_url/jurusan/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Jurusan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_jurusan' placeholder='Masukan Kode jurusan' />
								<div class='note'>Masukan Kode jurusan. Kode dapat berisi huruf dan angka serta tidak menggunakan spasi namun dapat menggunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Jurusan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_jurusan' placeholder='Masukan Nama jurusan' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Keterangan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='keterangan_jurusan' placeholder='Masukan Keterangan'></textarea>
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
		
		$kode_jurusan = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_jurusan')));
		$nama_jurusan = $this->input->post('nama_jurusan');
		$keterangan_jurusan = $this->input->post('keterangan_jurusan');
		
		$cek_kode = FALSE;
		
		if(! empty($kode_jurusan) && ! empty($nama_jurusan))
		{
			$cek_kode = $this->model_master->cek_kode_jurusan($kode_jurusan);
			
			if(! $cek_kode)
			{
				$insert = $this->model_master->set_jurusan(array('kode_jurusan' => $kode_jurusan, 'nama_jurusan' => $nama_jurusan, 'keterangan_jurusan' => $keterangan_jurusan));
				
				$page_content2 = "
					Berhasil membuat jurusan Baru.
					<br />
					<a href='$admin_url/jurusan'>Selesai</a>
				";
			}else{
				$page_content2 = "
					Kode jurusan <b>$kode_jurusan</b> Telah Digunakan. Silahkan Gunakan Kode jurusan lain.
					<br />
					<a href='$admin_url/jurusan/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Jurusan";
		$jurusan = $this->model_master->get_data_jurusan($edit);
		
		if($jurusan !== FALSE)
		{
			foreach($jurusan AS $jur)
			{
				$hash_kd = $this->encryption->encrypt($jur->kode_jurusan);
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/jurusan/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Jurusan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_jurusan' placeholder='Masukan Kode jurusan' value='$jur->kode_jurusan' />
									<div class='note'>Masukan Kode jurusan. Kode dapat dapat berupa huruf dan angka serta tidak menggunakan spasi namun  dapat menggunakan underscore (_)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Jurusan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_jurusan' placeholder='Masukan Nama jurusan' value='$jur->nama_jurusan' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Keterangan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='keterangan_jurusan'>$jur->keterangan_jurusan</textarea>
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
		$kode_jurusan = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_jurusan')));
		$nama_jurusan = $this->input->post('nama_jurusan');
		$keterangan_jurusan = $this->input->post('keterangan_jurusan');
		
		$update = FALSE;
		
		if(! empty($hash_kd) && ! empty($kode_jurusan) && ! empty($nama_jurusan))
		{
			if($hash_kd != $kode_jurusan)
			{
				$cek_kode = $this->model_master->cek_kode_jurusan($kode_jurusan); 
			}else{
				$cek_kode = FALSE;
			}
			
			if(! $cek_kode)
			{
				$data = array('kode_jurusan' => $kode_jurusan, 'nama_jurusan' => $nama_jurusan, 'keterangan_jurusan' => $keterangan_jurusan);
				
				$update = $this->model_master->update_jurusan($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode jurusan menjadi <b>$kode_jurusan</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode laman saat pengeditan.
					<br />
					<a href='$admin_url/jurusan/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update jurusan.
					<br />
					<a href='$admin_url/jurusan/edit?data=$kode_jurusan'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$kode_jurusan = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus ditiadakan
		$hapus = FALSE; //$this->model_master->hapus_jurusan('kode_jurusan');
		
		if($hapus)
		{
			$page_content2 = "
				<b>Berhasil</b> menghapus jurusan <br />
				<a href='$admin_url/jurusan'>&lt; Kembali</a>
			";
		}else{
			$page_content2 = "
				<b>Gagal</b> menghapus jurusan <br />
				<a href='$admin_url/jurusan'>&lt; Kembali</a>
			";
		}
	;
	break;
	
	default:
		$jurusan = $this->model_master->get_jurusan();
		
		$i = 1;
		
		$d_jurusan = "Belum Ada Data";
		
		if($jurusan !== FALSE)
		{
			$d_jurusan = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode jurusan</b></th>
						<th><b>Nama jurusan</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($jurusan AS $jab)
			{
				$d_jurusan .= "
					<tr>
						<th>$i</th>
						<th>$jab->kode_jurusan</th>
						<th>$jab->nama_jurusan</th>
						<th>
							<a href='$admin_url/jurusan/edit?data=$jab->kode_jurusan'>Edit</a> | 
							<a href='$admin_url/jurusan/hapus?data=$jab->kode_jurusan'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_jurusan .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/jurusan/tambah'>Tambah Jurusan</a>
			<br /><br />
			
			$d_jurusan
			
		";
	;
	break;
}
