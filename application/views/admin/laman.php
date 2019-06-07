<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/admin/laman'>Halaman</a>";
$judul_situs = "Laman Web";
$page_content = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Laman";
		$map_dir .= " &gt; Buat Laman";
		
		$page_content = "
				<form method='post' action='$admin_url/admin/laman/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Halaman
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_laman' placeholder='Masukan Kode Laman' />
								<div class='note'>Masukan Kode Laman. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Halaman
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_laman' placeholder='Masukan Nama Laman' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Deskripsi Halaman
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='deskripsi_laman' placeholder='Masukan Deskripsi Halaman'></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Gambar
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='file' name='gambar'  />
								<div class='note'>Kosongkan Bila tidak ada gambar</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Gambar Penuh
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='gambar_penuh'>
									<option value='0' selected='selected'>Tidak</option>
									<option value='1'>Ya</option>
								</select>
								<div class='note'>Jika memilih 'Ya', maka lebar gambar akan maksimal</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Dipublikasi
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='publikasi'>
									<option value='0'>Tidak</option>
									<option value='1' selected='selected'>Ya</option>
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tampilkan Pada Menu
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='tampil_menu'>
									<option value='0' selected='selected'>Tidak</option>
									<option value='1'>Ya</option>
								</select>
								<div class='note'>Jika memilih 'Ya' Link akan disertakan pada menu Profil</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							Konten Laman
							<br />
							<textarea class='konten' name='konten_laman' placeholder='Deskripsi Halaman'></textarea>
						</div>
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
		//$kode_laman = str_replace(array(" ", "\t", "\n", "\r", "\0", "\x0B"), "", $this->input->post('kode_laman'));
		$kode_laman = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_laman')));
		$nama_laman = $this->input->post('nama_laman');
		$deskripsi_laman = $this->input->post('deskripsi_laman');
		$gambar_laman = "";
		$gambar_penuh = $this->input->post('gambar_penuh');
		$konten_laman = $this->input->post('konten_laman');
		$publikasi = $this->input->post('publikasi');
		$tampil_menu = $this->input->post('tampil_menu');
		
		$cek_kode = FALSE;
		
		if(! is_dir("./media/laman/"))
		{
			mkdir('./media/laman', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/laman/';
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
		
		if(! empty($kode_laman) && ! empty($nama_laman) && ! empty($konten_laman))
		{
			$cek_kode = $this->model_master->cek_kode_laman($kode_laman);
			
			if(! $cek_kode)
			{
				if( ! empty($_FILES['gambar']['name']))
				{
					if ($this->upload->do_upload('gambar'))
					{
						$udata = $this->upload->data();
						$gambar_laman = $udata['file_name'];
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/laman/'.$gambar_laman;
						$cfg['new_image'] = './media/laman/thumb_'.$gambar_laman;
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
						$cfg['source_image'] = './media/laman/'.$gambar_laman;
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
				
				$insert = $this->model_master->set_laman(array('kode_laman' => $kode_laman, 'nama_laman' => $nama_laman, 'deskripsi_laman' =>$deskripsi_laman, 'gambar_laman' => $gambar_laman, 'gambar_penuh' => $gambar_penuh, 'konten_laman' => $konten_laman, 'publikasi' => $publikasi,  'tampil_menu' => $tampil_menu));
				
				$page_content = "
					Berhasil membuat Halaman Baru.
					<br />
					<a href='$admin_url/admin/laman'>Lihat</a>
				";
			}else{
				$page_content = "
					Kode laman <b>$kode_laman</b> Telah Digunakan. Silahkan Gunakan Kode lain.
					<br />
					<a href='$admin_url/admin/laman/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content = "Permintaan Tidak dapat Diselesaikan!";
		}
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Laman";
		$laman = $this->model_master->get_data_laman($edit);
		
		if($laman !== FALSE)
		{
			foreach($laman AS $lam)
			{
				$hash_kd = $this->encryption->encrypt($lam->kode_laman);
				$y_gambar = '';
				$y_publikasi = '';
				$y_menu = '';
				$t_gambar = '';
				$t_publikasi = '';
				$t_menu = '';
				
				if($lam->gambar_penuh == TRUE)
				{
					$y_gambar = 'selected="selected"';
				}else{
					$t_gambar = 'selected="selected"';
				}
				
				if($lam->publikasi == TRUE)
				{
					$y_publikasi = 'selected="selected"';
				}else{
					$t_publikasi = 'selected="selected"';
				}
				
				if($lam->tampil_menu == TRUE)
				{
					$y_menu = 'selected="selected"';
				}else{
					$t_menu = 'selected="selected"';
				}
				
				$page_content = "
					<form method='post' action='$admin_url/admin/laman/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Halaman
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_laman' placeholder='Masukan Kode Laman' value='$lam->kode_laman' />
									<div class='note'>Masukan Kode Laman. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Halaman
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_laman' placeholder='Masukan Nama Laman' value='$lam->nama_laman' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Deskripsi Halaman
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='deskripsi_laman' placeholder='Masukan Deskripsi Halaman'>$lam->deskripsi_laman</textarea>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Gambar
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='file' name='gambar'  />
									<div class='note'>Kosongkan Bila tidak ingin mengubah gambar</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Gambar Penuh
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='gambar_penuh'>
										<option value='0' $t_gambar>Tidak</option>
										<option value='1' $y_gambar>Ya</option>
									</select>
									<div class='note'>Jika memilih 'Ya', maka lebar gambar akan maksimal</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Dipublikasi
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='publikasi'>
										<option value='0' $t_publikasi>Tidak</option>
										<option value='1' $y_publikasi>Ya</option>
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tampilkan Pada Menu
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='tampil_menu'>
										<option value='0' $t_menu>Tidak</option>
										<option value='1' $y_menu>Ya</option>
									</select>
									<div class='note'>Jika memilih 'Ya' Link akan disertakan pada menu Profil</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								Konten Laman
								<br />
								<textarea class='konten' name='konten_laman' placeholder='Deskripsi Halaman'>$lam->konten_laman</textarea>
							</div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='hidden' name='old_gambar' value='$lam->gambar_laman' />
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
		$kode_laman = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_laman')));
		$nama_laman = $this->input->post('nama_laman');
		$deskripsi_laman = $this->input->post('deskripsi_laman');
		$gambar_laman = "";
		$gambar_penuh = $this->input->post('gambar_penuh');
		$konten_laman = $this->input->post('konten_laman');
		$publikasi = $this->input->post('publikasi');
		$tampil_menu = $this->input->post('tampil_menu');
		$old_gambar = $this->input->post('old_gambar');
		$gambar_laman = $old_gambar;
		
		$update = FALSE;
		$del_ogambar = FALSE;
		
		if(! is_dir("./media/laman/"))
		{
			mkdir('./media/laman', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/laman/';
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
		
		// mencegah kode profil diganti
		if(($hash_kd == 'profil') && ($hash_kd != $kode_laman))
		{
			redirect($admin_url.'/admin/laman/edit?data=profil','refresh');
			exit;
		}
		
		if(! empty($hash_kd) && ! empty($kode_laman))
		{
			if($hash_kd != $kode_laman)
			{
				$cek_kode = $this->model_master->cek_kode_laman($kode_laman); 
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
						$gambar_laman = $udata['file_name'];
						$del_ogambar = TRUE;
						
						// Buat Thumbnail
						$cfg['source_image'] = './media/laman/'.$gambar_laman;
						$cfg['new_image'] = './media/laman/thumb_'.$gambar_laman;
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
						$cfg['source_image'] = './media/laman/'.$gambar_laman;
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
				
				$data = array('kode_laman' => $kode_laman, 'nama_laman' => $nama_laman, 'deskripsi_laman' =>$deskripsi_laman, 'gambar_laman' => $gambar_laman, 'gambar_penuh' => $gambar_penuh, 'konten_laman' => $konten_laman, 'publikasi' => $publikasi,  'tampil_menu' => $tampil_menu);
				$update = $this->model_master->update_laman($data, $hash_kd);
			}else{
				$page_content = "
					Tidak dapat mengubah kode laman menjadi <b>$kode_laman</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode laman saat pengeditan.
					<br />
					<a href='$admin_url/admin/laman/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					unlink('./media/laman/'.$old_gambar);
					unlink('./media/laman/thumb_'.$old_gambar);
				}
				
				$page_content = "
					Berhasil melakukan update Laman.
					<br />
					<a href='$admin_url/admin/laman/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}else{
				$page_content = "Gagal melakukan update Laman.
					<br />
					<a href='$admin_url/admin/laman/edit?data=$hash_kd'>&lt;&lt; kembali</a>";
			}
		}else{
			$page_content = "Tidak dapat memperbaharui data";
		}
	;
	break;
	
	case "hapus":
		$id_laman = $this->input->get('data');
		$gambar_l = $this->model_master->get_single_data('gambar_laman','data_laman', 'kode_laman', $id_laman);
		$hapus = FALSE;
		
		if($id_laman != 'profil')
		{
			$hapus = $this->model_master->hapus_laman($id_laman);
		}
		
		if($hapus)
		{
			if(! empty($gambar_l))
			{
				if(file_exists('./media/laman/'.$gambar_l))
				{
					unlink('./media/laman/'.$gambar_l);
				}
				
				if(file_exists('./media/laman/thumb_'.$gambar_l))
				{
					unlink('./media/laman/thumb_'.$gambar_l);
				}	
			}
			
			$page_content = "
				Berhasil menghapus laman <b>$id_laman</b> <br />
				<a href='$admin_url/admin/laman'>Kembali</a>
			";
		}else{
			$page_content = "
				Gagal menghapus laman <b>$id_laman</b> <br />
				<a href='$admin_url/admin/laman'>Kembali</a>
			";
		}
	;
	break;
	
	default:
		$laman = $this->model_master->get_laman($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/admin/laman?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('kode_laman','data_laman');
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_laman = "Belum Ada Data";
		
		if($laman !== FALSE)
		{
			$d_laman = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Laman</b></th>
						<th><b>Nama Laman</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($laman AS $hal)
			{
				$d_laman .= "
					<tr>
						<th>$i</th>
						<th>$hal->kode_laman</th>
						<th>$hal->nama_laman</th>
						<th>
							<a href='$admin_url/admin/laman/edit?data=$hal->kode_laman'>Update</a> | 
							<a href='$admin_url/admin/laman/hapus?data=$hal->kode_laman'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_laman .= "
				</table>
			";
		}
		
		$page_content = "
			<a href='$admin_url/admin/laman/tambah'>Buat Laman Baru</a>
			<br /><br />
			
			$d_laman
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<ul class='pagination'>
					$halaman
				</ul>
			</div>
		";
	;
	break;
}
