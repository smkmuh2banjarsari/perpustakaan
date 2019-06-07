<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/admin/berita'>Berita</a>";
$judul_situs = "Berita";
$page_content = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$kategori = $this->model_master->get_kategori();

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Berita";
		$map_dir .= " &gt; Berita Buat";
		
		$o_kategori = "";
		if($kategori !== FALSE)
		{
			foreach($kategori AS $ktg)
			{
				$o_kategori .= "<option value='$ktg->kode_kategori'>$ktg->nama_kategori</option>
				";
			}
		}
		
		$page_content = "
				<form method='post' action='$admin_url/admin/berita/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Judul Berita
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='judul_berita' placeholder='Masukan Judul Berita' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kategori Berita
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='kategori'>
									$o_kategori
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Deskripsi berita
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='deskripsi_berita' placeholder='Masukan Deskripsi Berita' maxlength='160'></textarea>
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
								Dipublikasikan
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
							Konten Berita
							<br />
							<textarea class='konten' name='konten_berita' placeholder='Berita'>Berita</textarea>
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
		$judul_berita = ucwords($this->input->post('judul_berita'));
		$kategori_berita = $this->input->post('kategori');
		$deskripsi_berita = $this->input->post('deskripsi_berita');
		$gambar_berita = "";
		$konten_berita = $this->input->post('konten_berita');
		$publikasi = $this->input->post('publikasi');
		
		$tanggal = date("Y-m-d H:i:s");
		$thn_br = date("Y", strtotime($tanggal));
		$bln_br = date("m", strtotime($tanggal));
		
		if(! is_dir("./uploads/berita/$thn_br/$bln_br/"))
		{
			mkdir("./uploads/berita/$thn_br/$bln_br", 0777, true);
		}
		
		$sumber_gmbr = './uploads/berita/'.$thn_br.'/'.$bln_br.'/';
		
		// Inisialisasi upload
		$config['upload_path'] = $sumber_gmbr;
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
		
		if(! empty($judul_berita) && ! empty($kategori_berita) && ! empty($konten_berita))
		{
			
			if( ! empty($_FILES['gambar']['name']))
			{
				if ($this->upload->do_upload('gambar'))
				{
					$udata = $this->upload->data();
					$gambar_berita = $udata['file_name'];
					
					// Buat Thumbnail
					$cfg['source_image'] = $sumber_gmbr.$gambar_berita;
					$cfg['new_image'] = $sumber_gmbr.'thumb_'.$gambar_berita;
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
					$cfg['source_image'] = $sumber_gmbr.$gambar_berita;
					$cfg['maintain_ratio'] = TRUE;
					$cfg['width']	= 1024;
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
			
			$insert = $this->model_master->set_berita(array('id_berita' => '', 'kode_kategori' => $kategori_berita, 'judul_berita' => $judul_berita, 'deskripsi_berita' => $deskripsi_berita, 'konten_berita' => $konten_berita, 'gambar_berita' => $gambar_berita, 'tanggal_berita' => $tanggal, 'publikasi' => $publikasi));
			
			$page_content = "
				Berhasil menambah Berita Baru.
				<br />
				<a href='$admin_url/admin/berita'>Lihat</a>
			";
				
		}else{
			$page_content = "Permintaan Tidak dapat Diselesaikan!";
		}
		
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Berita";
		$berita = $this->model_master->get_data_berita($edit);
		
		if($berita !== FALSE)
		{
			foreach($berita AS $brt)
			{
				$hash_kd = $this->encryption->encrypt($brt->id_berita);
				
				$o_kategori = "";
				if($kategori !== FALSE)
				{
					foreach($kategori AS $ktg)
					{
						if($ktg->kode_kategori != $brt->kode_kategori)
						{
							$o_kategori .= "<option value='$ktg->kode_kategori'>$ktg->nama_kategori</option>
							";
						}else{
							$o_kategori .= "<option value='$ktg->kode_kategori' selected='selected'>$ktg->nama_kategori</option>
							";
						}							
					}
				}
				
				$y_publikasi = '';
				$t_publikasi = '';
				
				if($brt->publikasi == TRUE)
				{
					$y_publikasi = 'selected="selected"';
				}else{
					$t_publikasi = 'selected="selected"';
				}
				
				$h_gambar = "";
				if(! empty ($brt->gambar_berita))
				{
					$tglb = strtotime($brt->tanggal_berita);
					$thnb = date("Y", $tglb);
					$blnb = date("m", $tglb);
					$uploads = base_url('uploads');
					
					$h_gambar = "
						<a href='$admin_url/admin/berita/hgambar?idb=$brt->id_berita'>Hapus gambar</a> | 
						<a href='$uploads/berita/$thnb/$blnb/$brt->gambar_berita' target='_blank'>$brt->gambar_berita</a>
					";
				}
				
				$page_content = "
					<form method='post' action='$admin_url/admin/berita/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Judul Berita
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='judul_berita' placeholder='Masukan Judul Berita' value='$brt->judul_berita' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kategori Berita
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='kategori'>
										$o_kategori
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Deskripsi Berita
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='deskripsi_berita' placeholder='Masukan Deskripsi Berita'>$brt->deskripsi_berita</textarea>
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
									<br />
									$h_gambar
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
								Konten Berita
								<br />
								<textarea class='konten' name='konten_berita' placeholder='Deskripsi Berita'>$brt->konten_berita</textarea>
							</div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='hidden' name='old_gambar' value='$brt->gambar_berita' />
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
		$judul_berita = ucwords($this->input->post('judul_berita'));
		$kategori_berita = $this->input->post('kategori');
		$deskripsi_berita = $this->input->post('deskripsi_berita');
		$konten_berita = $this->input->post('konten_berita');
		$publikasi = $this->input->post('publikasi');
		$old_gambar = $this->input->post('old_gambar');
		$gambar_berita = $old_gambar;
		
		$tglb = strtotime($this->model_master->get_single_data('tanggal_berita','data_berita', 'id_berita', $hash_kd));
		$thnb = date("Y", $tglb);
		$blnb = date("m", $tglb);
		
		$update = FALSE;
		$del_ogambar = FALSE;
		
		if(! is_dir("./uploads/berita/$thnb/$blnb/"))
		{
			mkdir('./uploads/berita/'.$thnb.'/'.$blnb, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = "./uploads/berita/$thnb/$blnb/";
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 4000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['file_ext_tolower'] = TRUE;
		$config['width']         = 1024;
		$config['height']       = 768;
		$config['max_filename'] = 240;
		
		$this->upload->initialize($config);
		
		if(! empty($hash_kd) && ! empty($judul_berita) && ! empty($kategori_berita) && ! empty($konten_berita))
		{
			if( ! empty($_FILES['gambar']['name']))
			{
				if ($this->upload->do_upload('gambar'))
				{
					$udata = $this->upload->data();
					$gambar_berita = $udata['file_name'];
					$del_ogambar = TRUE;
					
					// Buat Thumbnail
					$cfg['source_image'] = "./uploads/berita/$thnb/$blnb/".$gambar_berita;
					$cfg['new_image'] = "./uploads/berita/$thnb/$blnb/thumb_".$gambar_berita;
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
					$cfg['source_image'] = "./uploads/berita/$thnb/$blnb/".$gambar_berita;
					$cfg['maintain_ratio'] = TRUE;
					$cfg['width']	= 1024;
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
			
			$data = array('kode_kategori' => $kategori_berita, 'judul_berita' => $judul_berita, 'deskripsi_berita' => $deskripsi_berita, 'konten_berita' => $konten_berita, 'gambar_berita' => $gambar_berita, 'publikasi' => $publikasi);
			$update = $this->model_master->update_berita($data, $hash_kd);
			
			
			if($update)
			{
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					if(file_exists("./uploads/berita/$thnb/$blnb/".$old_gambar))
					{
						unlink("./uploads/berita/$thnb/$blnb/".$old_gambar);
					}
					
					if(file_exists("./uploads/berita/$thnb/$blnb/thumb_".$old_gambar))
					{
						unlink("./uploads/berita/$thnb/$blnb/thumb_".$old_gambar);
					}
				}
				
				$page_content = "
					Berhasil update Berita.
					<br />
					<a href='$admin_url/admin/berita/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}else{
			$page_content = "Permintaan tidak lengkap!";
		}
	;
	break;
	
	case "hapus":
		$id_berita = $this->input->get('data');
		$gambar_b = $this->model_master->get_single_data('gambar_berita','data_berita', 'id_berita', $id_berita);
		$tglb = strtotime($this->model_master->get_single_data('tanggal_berita','data_berita', 'id_berita', $id_berita));
		
		$hapus = $this->model_master->hapus_berita($id_berita);;
		
		if($hapus)
		{
			$thnb = date("Y", $tglb);
			$blnb = date("m", $tglb);
			$srcg = "./uploads/berita/$thnb/$blnb/";
			
			if(! empty($gambar_b))
			{
				if(file_exists($srcg.$gambar_b))
				{
					unlink($srcg.$gambar_b);
				}
				
				if(file_exists($srcg.'thumb_'.$gambar_b))
				{
					unlink($srcg.'thumb_'.$gambar_b);
				}	
			}
			
			$page_content = "
				Berhasil menghapus Berita <br />
				<a href='$admin_url/admin/berita'>Kembali</a>
			";
		}else{
			$page_content = "
				Gagal menghapus Berita <br />
				<a href='$admin_url/admin/berita'>Kembali</a>
			";
		}
	;
	break;
	
	case "hgambar":
		$id_berita = $this->input->get('idb');
		$gambar_b = $this->model_master->get_single_data('gambar_berita','data_berita', 'id_berita', $id_berita);
		$tglb = strtotime($this->model_master->get_single_data('tanggal_berita','data_berita', 'id_berita', $id_berita));
		$page_content = "";
		$hapus = FALSE;
		
		if(! empty($gambar_b))
		{
			$thnb = date("Y", $tglb);
			$blnb = date("m", $tglb);
			
			$srcg = "./uploads/berita/$thnb/$blnb/";
			
			if(file_exists($srcg.$gambar_b))
			{
				unlink($srcg.$gambar_b);
			}
			
			if(file_exists($srcg.'thumb_'.$gambar_b))
			{
				unlink($srcg.'thumb_'.$gambar_b);
			}
			
			$tupd = $this->model_master->update_berita(array('gambar_berita' => ''), $id_berita);
			$page_content = "Berhasil menghapus gambar ";
		}
		
		$page_content .= "[<a href='$admin_url/admin/berita/edit?data=$id_berita'>Kembali</a>]";
	;
	break;
	
	default:
		$berita = $this->model_master->get_berita($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/admin/berita?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('id_berita','data_berita');
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_berita = "Belum Ada Berita";
		
		if($berita !== FALSE)
		{
			$d_berita = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Judul Berita</b></th>
						<th><b>Dipublikasi</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($berita AS $brt)
			{
				$pub = "Tidak";
				if($brt->publikasi == TRUE)
				{
					$pub = "Ya";
				}
				
				$d_berita .= "
					<tr>
						<th>$i</th>
						<th>$brt->judul_berita</th>
						<th>$pub</th>
						<th>
							<a href='$admin_url/admin/berita/edit?data=$brt->id_berita'>Edit</a> | 
							<a href='$admin_url/admin/berita/hapus?data=$brt->id_berita'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_berita .= "
				</table>
			";
		}
		
		$page_content = "
			<a href='$admin_url/admin/berita/tambah'>Tambah Baru</a>
			<br /><br />
			
			$d_berita
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<ul class='pagination'>
					$halaman
				</ul>
			</div>
		";
	;
	break;
}
