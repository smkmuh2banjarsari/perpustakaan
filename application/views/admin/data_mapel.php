<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/mapel'>Mapel</a>";
$judul_situs = "Data Mata Pelajaran";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$jurusan = $this->model_master->get_jurusan();
$wali_mapel = FALSE; //$this->model_master->get_wali_mapel();

$kategori_mapel = array("nor" => "Normatif", "adp" => "Adaptif", "prod" => "Produktif");

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Mapel";
		$map_dir .= " &gt; Mapel Baru";
		$pil_kategori = "";
		
		if($kategori_mapel != FALSE)
		{
			foreach($kategori_mapel AS $kata => $katb)
			{
				$pil_kategori .= "<option value='$kata'>$katb</option>";
			}
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/mapel/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Mata Pelajaran
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_mapel' placeholder='Masukan Kode mapel' required />
								<div class='note'>Kode dapat huruf, angka dan underscore</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kategori Mata Pelajaran
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='kategori_mapel'>
									$pil_kategori
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Mata Pelajaran
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_mapel' placeholder='Masukan Nama Mata Pelajaran' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Prioritas Mapel
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='prioritas_mapel' value='10' />
								<div class='note'>Semakin kecil, semakin tinggi tingkat Mata Pelajaran</div>
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
		//$kode_mapel = str_replace(array(" ", "\t", "\n", "\r", "\0", "\x0B"), "", $this->input->post('kode_mapel'));
		$kode_mapel = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_mapel')));
		$nama_mapel = $this->input->post('nama_mapel');
		$kategori_mapel = $this->input->post('kategori_mapel');
		
		$prioritas_mapel = $this->input->post('prioritas_mapel');
		
		$cek_kode = FALSE;
		
		if(! is_dir("./media/mapel/"))
		{
			mkdir('./media/mapel', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/mapel/';
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
		
		if(! empty($kode_mapel) && ! empty($nama_mapel) && ! empty($prioritas_mapel))
		{
			$cek_kode = $this->model_master->cek_kode_mapel($kode_mapel);
			
			if(! $cek_kode)
			{
				if( ! empty($_FILES['gambar']['name']))
				{
					if ($this->upload->do_upload('gambar'))
					{
						$udata = $this->upload->data();
						$gambar_mapel = $udata['file_name'];
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/mapel/'.$gambar_mapel;
						$cfg['new_image'] = './media/mapel/thumb_'.$gambar_mapel;
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
						$cfg['source_image'] = './media/mapel/'.$gambar_mapel;
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
				
				$insert = $this->model_master->set_mapel(array('kode_mapel' => $kode_mapel, 'kategori_mapel' => $kategori_mapel, 'nama_mapel' => $nama_mapel, 'prioritas_mapel' => $prioritas_mapel));
				
				$page_content2 = "
					Berhasil membuat mapel Baru.
					<br />
					<a href='$admin_url/mapel'>Lihat</a>
				";
			}else{
				$page_content2 = "
					Kode mapel <b>$kode_mapel</b> Telah Digunakan. Silahkan Gunakan Kode lain.
					<br />
					<a href='$admin_url/mapel/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
		
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit mapel";
		$mapel = $this->model_master->get_data_mapel($edit);
		
		if($mapel !== FALSE)
		{
			foreach($mapel AS $mpl)
			{
				$hash_kd = $this->encryption->encrypt($mpl->kode_mapel);
				
				$pil_kategori = "";
				
				if($kategori_mapel != FALSE)
				{
					foreach($kategori_mapel AS $kata => $katb)
					{
						if($kata != $mpl->kategori_mapel)
						{
							$pil_kategori .= "<option value='$kata'>$katb</option>";
						}else{
							$pil_kategori .= "<option value='$kata' selected='selected'>$katb</option>";
						}
						
					}
				}
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/mapel/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Mata Pelajaran
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_mapel' placeholder='Masukan Kode mapel' value='$mpl->kode_mapel' required />
									<div class='note'>Kode dapat huruf, angka dan underscore</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kategori Mata Pelajaran
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='kategori_mapel'>
										$pil_kategori
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Mata Pelajaran
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_mapel' placeholder='Masukan Nama Mata Pelajaran' value='$mpl->nama_mapel' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Prioritas Mapel
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='number' name='prioritas_mapel' value='$mpl->prioritas_mapel' />
									<div class='note'>Semakin kecil, semakin tinggi tingkat Mata Pelajaran</div>
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
			}
		}	
	;
	break;
	
	case "update":
		$hash_kd = $this->encryption->decrypt($this->input->post('hash_kd'));
		$kode_mapel = strtoupper(preg_replace("/[^\w-]/", '', $this->input->post('kode_mapel')));
		$nama_mapel = $this->input->post('nama_mapel');
		$kategori_mapel = $this->input->post('kategori_mapel');
		
		$prioritas_mapel = $this->input->post('prioritas_mapel');
		
		$old_gambar = $this->input->post('old_gambar');
		$gambar_mapel = $old_gambar;
		
		$update = FALSE;
		$del_ogambar = FALSE;
		
		if(! is_dir("./media/mapel/"))
		{
			mkdir('./media/mapel', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/mapel/';
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
		
		if(! empty($hash_kd) && ! empty($kode_mapel))
		{
			if($hash_kd != $kode_mapel)
			{
				$cek_kode = $this->model_master->cek_kode_mapel($kode_mapel); 
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
						$gambar_mapel = $udata['file_name'];
						$del_ogambar = TRUE;
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/mapel/'.$gambar_mapel;
						$cfg['new_image'] = './media/mapel/thumb_'.$gambar_mapel;
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
						$cfg['source_image'] = './media/mapel/'.$gambar_mapel;
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
				
				$data = array('kode_mapel' => $kode_mapel, 'kategori_mapel' => $kategori_mapel, 'nama_mapel' => $nama_mapel, 'prioritas_mapel' => $prioritas_mapel);
				$update = $this->model_master->update_mapel($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode Mapel menjadi <b>$kode_mapel</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode Mapel saat pengeditan.
					<br />
					<a href='$admin_url/mapel/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					unlink('./media/mapel/'.$old_gambar);
					unlink('./media/mapel/thumb_'.$old_gambar);
				}
				
				$page_content2 = "
					Berhasil melakukan update Mata Pelajaran.
					<br />
					<a href='$admin_url/mapel/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_mapel = $this->input->get('data');
		//$gambar_mapel = $this->model_master->get_single_data('gambar_mapel','data_mapel', 'kode_mapel', $id_mapel);
		// Untuk keamanan, fungsi dinonaktifkan
		$hapus = FALSE; //$this->model_master->hapus_mapel($id_mapel);
		
		if($hapus)
		{
			if(file_exists('./media/mapel/'.$gambar_mapel))
			{
				unlink('./media/mapel/'.$gambar_mapel);
			}
			
			if(file_exists('./media/mapel/thumb_'.$gambar_mapel))
			{
				unlink('./media/mapel/thumb_'.$gambar_mapel);
			}
			
			$page_content2 = "
				Berhasil menghapus mapel <b>$id_mapel</b> <br />
				<a href='$admin_url/mapel'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus mapel <b>$id_mapel</b> <br />
				<a href='$admin_url/mapel'>Kembali</a>
			";
		}
	;
	break;
	
	default:
		$mapel = $this->model_master->get_mapel($awal);
		$i=$awal+1;
		
		$d_mapel = "Belum Ada Data";
		
		if($mapel !== FALSE)
		{
			$d_mapel = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Mapel</b></th>
						<th><b>Nama Mapel</b></th>
						<th><b>Kategori</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($mapel AS $mpl)
			{
				$katm = $kategori_mapel[$mpl->kategori_mapel];
				
				$d_mapel .= "
					<tr>
						<td>$i</td>
						<td>$mpl->kode_mapel</td>
						<td>$mpl->nama_mapel</td>
						<td>$katm</td>
						<td>
							<a href='$admin_url/mapel/edit?data=$mpl->kode_mapel'>Edit</a> | 
							<a href='$admin_url/mapel/hapus?data=$mpl->kode_mapel'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_mapel .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/mapel/tambah'>Tambah Mapel</a>
			<br /><br />
			
			$d_mapel
			
			<div class='linebrown'></div>
		";
	;
	break;
}
