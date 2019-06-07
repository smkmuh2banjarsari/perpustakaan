<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/kelas'>Kelas</a>";
$judul_situs = "Data Kelas";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$jurusan = $this->model_master->get_jurusan();
$wali_kelas = $this->model_master->get_wali_kelas();

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Kelas";
		$map_dir .= " &gt; Buat Kelas";
		$pil_jurusan = "";
		$pil_wali = "";
		
		if($jurusan != FALSE)
		{
			foreach($jurusan AS $jur)
			{
				$pil_jurusan .= "<option value='$jur->kode_jurusan'>$jur->nama_jurusan</option>";
			}
		}
		
		if($wali_kelas != FALSE)
		{
			foreach($wali_kelas AS $wali)
			{
				$pil_wali .= "<option value='$wali->id_karyawan'>$wali->nama_lengkap</option>";
			}
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/kelas/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Kelas
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_kelas' placeholder='Masukan Kode Kelas' required />
								<div class='note'>Gunakan Tahun masuk, Jurusan dan nomor urut kelas contoh: 17TKR05, 18TKJ01</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jurusan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='jurusan'>
									$pil_jurusan
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Kelas
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_kelas' placeholder='Masukan Nama kelas' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Wali Kelas
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='wali_kelas'>
									$pil_wali
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Keterangan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='keterangan_kelas' placeholder='Masukan Keterangan'></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Aktif
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='aktif'>
									<option value='0'>Tidak</option>
									<option value='1' selected='selected'>Ya</option>
								</select>
								<div class='note'>Pilih 'Ya', jika kelas masih ada dan aktif melakukan KBM</div>
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
		//$kode_kelas = str_replace(array(" ", "\t", "\n", "\r", "\0", "\x0B"), "", $this->input->post('kode_kelas'));
		$kode_kelas = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_kelas')));
		$nama_kelas = $this->input->post('nama_kelas');
		$keterangan_kelas = $this->input->post('keterangan_kelas');
		
		$jurusan = $this->input->post('jurusan');
		$wali_kelas = $this->input->post('wali_kelas');
		$aktif = $this->input->post('aktif');
		
		$cek_kode = FALSE;
		
		if(! is_dir("./media/kelas/"))
		{
			mkdir('./media/kelas', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/kelas/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 4000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['file_ext_tolower'] = TRUE;
		$config['width']         = 800;
		$config['height']       = 600;
		$config['max_filename'] = 240;
		
		$this->upload->initialize($config);
		
		if(! empty($kode_kelas) && ! empty($nama_kelas) && ! empty($jurusan))
		{
			$cek_kode = $this->model_master->cek_kode_kelas($kode_kelas);
			
			if(! $cek_kode)
			{
				if( ! empty($_FILES['gambar']['name']))
				{
					if ($this->upload->do_upload('gambar'))
					{
						$udata = $this->upload->data();
						$gambar_kelas = $udata['file_name'];
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/kelas/'.$gambar_kelas;
						$cfg['new_image'] = './media/kelas/thumb_'.$gambar_kelas;
						$cfg['quality'] = '100%';
						$cfg['maintain_ratio'] = TRUE;
						$cfg['width']	= 320;
						$cfg['height']	= 240;
						
						$this->image_lib->initialize($cfg);
						if (! $this->image_lib->resize()) {
							echo $this->image_lib->display_errors();
						}
						$this->image_lib->clear();
						unset($cfg);
						
						// resize gambar
						$cfg['source_image'] = './media/kelas/'.$gambar_kelas;
						$cfg['maintain_ratio'] = TRUE;
						$cfg['width']	= 800;
						$cfg['quality'] = '100%';
						
						$this->image_lib->initialize($cfg);
						
						$this->image_lib->resize();
						$this->image_lib->clear();
						unset($cfg);
						// end resize
						
					}else{
						echo "Terjadi Kesalahan upload gambar. Pastikan ekstensi file diperbolehkan serta ukuran tidak melebihi 3MB.";
						exit(0);
					}
				}
				
				$insert = $this->model_master->set_kelas(array('kode_kelas' => $kode_kelas, 'kode_jurusan' => $jurusan, 'wali_kelas' => $wali_kelas, 'nama_kelas' => $nama_kelas, 'keterangan_kelas' => $keterangan_kelas, 'status_kelas' => $aktif));
				
				$page_content2 = "
					Berhasil membuat Kelas Baru.
					<br />
					<a href='$admin_url/kelas'>Lihat</a>
				";
			}else{
				$page_content2 = "
					Kode kelas <b>$kode_kelas</b> Telah Digunakan. Silahkan Gunakan Kode lain.
					<br />
					<a href='$admin_url/kelas/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
		
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit kelas";
		$kelas = $this->model_master->get_data_kelas($edit);
		
		if($kelas !== FALSE)
		{
			foreach($kelas AS $kls)
			{
				$hash_kd = $this->encryption->encrypt($kls->kode_kelas);
				$y_aktif = "";
				$t_aktif = "";
				
				$pil_jurusan = "";
				$pil_wali = "";
				
				if($jurusan != FALSE)
				{
					foreach($jurusan AS $jur)
					{
						if($jur->kode_jurusan != $kls->kode_jurusan)
						{
							$pil_jurusan .= "<option value='$jur->kode_jurusan'>$jur->nama_jurusan</option>";
						}else{
							$pil_jurusan .= "<option value='$jur->kode_jurusan' selected='selected'>$jur->nama_jurusan</option>";
						}
						
					}
				}
				
				if($wali_kelas != FALSE)
				{
					foreach($wali_kelas AS $wali)
					{
						if($wali->id_karyawan != $kls->wali_kelas)
						{
							$pil_wali .= "<option value='$wali->id_karyawan'>$wali->nama_lengkap</option>";
						}else{
							$pil_wali .= "<option value='$wali->id_karyawan' selected='selected'>$wali->nama_lengkap</option>";
						}
						
					}
				}
				
				if($kls->status_kelas == TRUE)
				{
					$y_aktif = 'selected="selected"';
				}else{
					$t_aktif = 'selected="selected"';
				}
				
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/kelas/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Kelas
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_kelas' placeholder='Masukan Kode Kelas' value='$kls->kode_kelas' required />
									<div class='note'>Gunakan Tahun masuk, Jurusan dan nomor urut kelas contoh: 17TKR05, 18TKJ01</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jurusan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='jurusan'>
										$pil_jurusan
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Kelas
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_kelas' placeholder='Masukan Nama kelas' value='$kls->nama_kelas' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Wali Kelas
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='wali_kelas'>
										$pil_wali
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Keterangan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='keterangan_kelas' placeholder='Masukan Keterangan'>$kls->keterangan_kelas</textarea>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Aktif
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='aktif'>
										<option value='0' $t_aktif>Tidak</option>
										<option value='1' $y_aktif>Ya</option>
									</select>
									<div class='note'>Pilih 'Ya', jika kelas masih ada dan aktif melakukan KBM</div>
								</div>
							</div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='hidden' name='old_gambar' value='' />
								<input type='submit' value='Simpan' class='small radius button' />
								<input type='reset' value='Ulang' class='small radius button' />
							</div>
						</div>
					</form>
				";
				
				$siswa_kelas = $this->model_master->get_siswa_kelas($kls->kode_kelas);
				
				if($siswa_kelas !== FALSE)
				{
					$page_content2 .= "
					<h3>Siswa Kelas Ini</h3>
					<a href='$admin_url/kelas/presensi?data=$kls->kode_kelas'>Dowload Data</a>
					
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Siswa</th>
								<th>NIS</th>
							</tr>
						</thead>
						<tbody>
					";
					
					$no =1;
					foreach($siswa_kelas AS $skls)
					{
						$page_content2 .= "
							<tr>
								<td>$no</td>
								<td>$skls->nama_lengkap</td>
								<td>$skls->nis</td>
							</tr>
						";
						
						$no++;
					}
					
					$page_content2 .= "
						</tbody>
					</table>
					";
					
				}
			}
		}	
	;
	break;
	
	case "update":
		$hash_kd = $this->encryption->decrypt($this->input->post('hash_kd'));
		$kode_kelas = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_kelas')));
		$nama_kelas = $this->input->post('nama_kelas');
		$keterangan_kelas = $this->input->post('keterangan_kelas');
		
		$jurusan = $this->input->post('jurusan');
		$wali_kelas = $this->input->post('wali_kelas');
		$aktif = $this->input->post('aktif');
		
		// jika kelas sudah tidak aktif, wali kelas dikosongkan
		if($aktif != TRUE)
		{
			$wali_kelas = 0;
		}
		
		$old_gambar = $this->input->post('old_gambar');
		$gambar_kelas = $old_gambar;
		
		$update = FALSE;
		$del_ogambar = FALSE;
		
		if(! is_dir("./media/kelas/"))
		{
			mkdir('./media/kelas', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/kelas/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 4000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['file_ext_tolower'] = TRUE;
		$config['width']         = 800;
		$config['height']       = 600;
		$config['max_filename'] = 240;
		
		$this->upload->initialize($config);
		
		if(! empty($hash_kd) && ! empty($kode_kelas))
		{
			if($hash_kd != $kode_kelas)
			{
				$cek_kode = $this->model_master->cek_kode_kelas($kode_kelas); 
			}else{
				$cek_kode = FALSE;
			}
			
			if(! $cek_kode)
			{
				if( ! empty($_FILES['gambar']['name']))
				{
					if ($this->upload->do_upload('gambar'))
					{
						$udata = $this->upload->data();
						$gambar_kelas = $udata['file_name'];
						$del_ogambar = TRUE;
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/kelas/'.$gambar_kelas;
						$cfg['new_image'] = './media/kelas/thumb_'.$gambar_kelas;
						$cfg['quality'] = '100%';
						$cfg['maintain_ratio'] = TRUE;
						$cfg['width']	= 320;
						$cfg['height']	= 240;
						
						$this->image_lib->initialize($cfg);
						
						if (! $this->image_lib->resize()) {
							echo $this->image_lib->display_errors();
						}
						$this->image_lib->clear();
						unset($cfg);
						
						// resize gambar
						$cfg['source_image'] = './media/kelas/'.$gambar_kelas;
						$cfg['maintain_ratio'] = TRUE;
						$cfg['width']	= 800;
						$cfg['quality'] = '100%';
						
						$this->image_lib->initialize($cfg);
						
						$this->image_lib->resize();
						$this->image_lib->clear();
						unset($cfg);
						// end resize
						
						
						
					}else{
						echo "Terjadi Kesalahan upload gambar. Pastikan ekstensi file diperbolehkan serta ukuran tidak melebihi 3MB.";
						exit(0);
					}
				}
				
				$data = array('kode_kelas' => $kode_kelas, 'kode_jurusan' => $jurusan, 'wali_kelas' => $wali_kelas, 'nama_kelas' => $nama_kelas, 'keterangan_kelas' => $keterangan_kelas, 'status_kelas' => $aktif);
				$update = $this->model_master->update_kelas($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode kelas menjadi <b>$kode_kelas</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode kelas saat pengeditan.
					<br />
					<a href='$admin_url/kelas/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					unlink('./media/kelas/'.$old_gambar);
					unlink('./media/kelas/thumb_'.$old_gambar);
				}
				
				$page_content2 = "
					Berhasil melakukan update kelas.
					<br />
					<a href='$admin_url/kelas/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_kelas = $this->input->get('data');
		//$gambar_kelas = $this->model_master->get_single_data('gambar_kelas','data_kelas', 'kode_kelas', $id_kelas);
		// Untuk keamanan, fungsi dinonaktifkan
		$hapus = FALSE; //$this->model_master->hapus_kelas($id_kelas);
		
		if($hapus)
		{
			if(file_exists('./media/kelas/'.$gambar_kelas))
			{
				unlink('./media/kelas/'.$gambar_kelas);
			}
			
			if(file_exists('./media/kelas/thumb_'.$gambar_kelas))
			{
				unlink('./media/kelas/thumb_'.$gambar_kelas);
			}
			
			$page_content2 = "
				Berhasil menghapus kelas <b>$id_kelas</b> <br />
				<a href='$admin_url/kelas'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus kelas <b>$id_kelas</b> <br />
				<a href='$admin_url/kelas'>Kembali</a>
			";
		}
	;
	break;
	
	case "presensi":
		include_once (APPPATH."libraries/Excel.php");
		$kode_kls = $this->input->get('data');
		$nama_kelas = $this->model_master->get_single_data('nama_kelas','data_kelas','kode_kelas',$kode_kls);
		$anggota_kelas = $this->model_master->get_siswa_kelas($kode_kls);
		
				
		$excel = new Excel();
		
		$excel->presensi_kelas($anggota_kelas, $nama_kelas);
	;
	break;
	
	default:
		$kelas = $this->model_master->get_kelas($awal);
		$i=$awal+1;
		
		$d_kelas = "Belum Ada Data";
		
		if($kelas !== FALSE)
		{
			$d_kelas = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Kelas</b></th>
						<th><b>Nama Kelas</b></th>
						<th><b>Wali Kelas</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($kelas AS $kls)
			{
				$wal = $this->model_master->get_single_data('nama_lengkap','data_karyawan','id_karyawan', $kls->wali_kelas);
				
				$d_kelas .= "
					<tr>
						<td>$i</td>
						<td>$kls->kode_kelas</td>
						<td>$kls->nama_kelas</td>
						<td>$wal</td>
						<td>
							<a href='$admin_url/kelas/edit?data=$kls->kode_kelas'>Edit</a> | 
							<a href='$admin_url/kelas/presensi?data=$kls->kode_kelas'>Presensi</a> | 
							<a href='$admin_url/kelas/hapus?data=$kls->kode_kelas'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_kelas .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/kelas/tambah'>Tambah Kelas</a>
			<br /><br />
			
			$d_kelas
			
			<div class='linebrown'></div>
		";
	;
	break;
}
