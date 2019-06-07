<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/soal_ujian'>Soal</a>";
$judul_situs = "Soal";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$kategori_ujian = $this->model_master->get_kategori_soal();
$abjad = array(1 => "A", 2 => "B", 3 => "C", 4 => "D", 5 => "E", 6 => "F");



switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Soal";
		$map_dir .= " &gt; Tambah Soal";
		
		$pil_kategori = "";
		
		if($kategori_ujian != FALSE)
		{
			foreach($kategori_ujian AS $ktj)
			{
				$pil_kategori .= "<option value='$ktj->kode_kategori_soal'>$ktj->nama_kategori_soal</option>
				";
			}
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/soal_ujian/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kategori Soal
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='kategori'>
									$pil_kategori
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Gambar
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='file' name='gambar'  />
								<div class='note'>Kosongkan Bila tidak ada</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pertanyaan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='pertanyaan' placeholder='Pertanyaan' rows='5' class='konten'></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jawaban
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<table>
									<thead>
										<tr>
											<th>Pilihan</th>
											<th>Jawaban</th>
											<th>Benar</th>
											<th>Skor</th>
										</tr>
									</thead>
									<tbody id='jawaban'>
										<tr>
											<td>A</td>
											<td>
												<textarea name='jawaban[]' ></textarea>
												<input type='file' name='gambar_jawaban[]' multiple='multiple' />
											</td>
											<td><input type='radio' name='benar[]' value='1' /></td>
											<td><input type='number' name='skor[]' value='0' /></td>
										</tr>
										<tr>
											<td>B</td>
											<td>
												<textarea name='jawaban[]' ></textarea>
												<input type='file' name='gambar_jawaban[]' multiple='multiple' />
											</td>
											<td><input type='radio' name='benar[]' value='2' /></td>
											<td><input type='number' name='skor[]' value='0' /></td>
										</tr>
										<tr>
											<td>C</td>
											<td>
												<textarea name='jawaban[]' ></textarea>
												<input type='file' name='gambar_jawaban[]' multiple='multiple' />
											</td>
											<td><input type='radio' name='benar[]' value='3' /></td>
											<td><input type='number' name='skor[]' value='0' /></td>
										</tr>
										<tr>
											<td>D</td>
											<td>
												<textarea name='jawaban[]' ></textarea>
												<input type='file' name='gambar_jawaban[]' multiple='multiple' />
											</td>
											<td><input type='radio' name='benar[]' value='4' /></td>
											<td><input type='number' name='skor[]' value='0' /></td>
										</tr>
										<tr>
											<td>E</td>
											<td>
												<textarea name='jawaban[]' ></textarea>
												<input type='file' name='gambar_jawaban[]' multiple='multiple' />
											</td>
											<td><input type='radio' name='benar[]' value='5' /></td>
											<td><input type='number' name='skor[]' value='0' /></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
							<p style='text-align:center' id='#jwb'>
								<a href='#jwb' id='tambah_jawaban'>Tambah Jawaban</a>
							</p>
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
		
		//$kode_kategori = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_kategori')));
		$kategori = $this->input->post('kategori');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban = $this->input->post('jawaban');
		$gambar_jawaban = "";//$this->input->post('gambar_jawaban');
		$benar = $this->input->post('benar');
		$skor = $this->input->post('skor');
		$gambar = "";
		$t_gambar = "";
		$audio = "";
		$t_audio = "";
		$video = "";
		$t_video = "";
		$level_soal = 1;
		$update_terakhir = date("Y-m-d H:i:s");
		$tahun_upload = date("Y");
		$aktif = 1;
		
		
		if(! is_dir("./media/soal/$tahun_upload/"))
		{
			mkdir('./media/soal/'.$tahun_upload, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/soal/'.$tahun_upload.'/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 32000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['file_ext_tolower'] = TRUE;
		$config['min_width']         = 200;
		//$config['min_height']       = 400;
		//$config['max_filename'] = 240;
		
		$this->upload->initialize($config);
		
		if(! empty($kategori) && ! empty($skor)) 
		// if(! empty($kategori) && ! empty($pertanyaan) && ! empty($jawaban) && ! empty($skor))
		{
			
			if( ! empty($_FILES['gambar']['name']))
			{
				if ($this->upload->do_upload('gambar'))
				{
					$udata = $this->upload->data();
					$gambar = $udata['file_name'];
					$t_gambar = $udata['file_type'];
					
					// resize gambar
					$cfg['source_image'] = './media/soal/'.$tahun_upload.'/'.$gambar;
					$cfg['maintain_ratio'] = TRUE;
					$cfg['width']	= 1000;
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
			
			if(!empty($_FILES['gambar_jawaban']['name'])){
				
				echo "<pre>";
				print_r($_FILES);
				echo "</pre>";
				
				$filesCount = count($_FILES['gambar_jawaban']['name']);
				for($i = 0; $i < $filesCount; $i++){
					$_FILES['file']['name']     = $_FILES['gambar_jawaban']['name'][$i];
					$_FILES['file']['type']     = $_FILES['gambar_jawaban']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['gambar_jawaban']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['gambar_jawaban']['error'][$i];
					$_FILES['file']['size']     = $_FILES['gambar_jawaban']['size'][$i];
					
					
					$config['upload_path'] = './media/soal/'.$tahun_upload.'/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					// Upload file to server
					if($this->upload->do_upload('file')){
						// Uploaded file data
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					}
				}
			}
			
			$set_soal = $this->model_master->set_soal_ujian(array('id_soal' => '', 'kode_kategori_soal' => $kategori,'pertanyaan' => $pertanyaan, 'gambar' => $gambar, 'tipe_gambar' => $t_gambar, 'audio' => $audio, 'tipe_audio' => $t_audio, 'video' => $video, 'tipe_video' => $t_video, 'level_soal' => $level_soal, 'tahun_upload' => $tahun_upload, 'update_terakhir' => $update_terakhir, 'aktif' => $aktif));
			
			if($set_soal != FALSE)
			{
				$i=0;
				$x=1;
				
				$j_gambar = "";
				
				if(! empty($jawaban) OR ! empty($_FILES['gambar_jawaban']))
				{
					
					$i=0;
					$x = 1;
					
					$m = (count(array_filter($jawaban)) > count($uploadData))?count(array_filter($jawaban)):count($uploadData);
					
					for($j=0;$j<$m;$j++)
					{
						$bnr = 0;
						if($x == $benar[0])
						{ $bnr = 1; }
						$j_gambar = "";
						
						/*
						if(! empty($jawaban))
						{
							
						}*/
						
						$upd_jawaban = $this->model_master->update_jawaban_soal(array('detail_jawaban' => $jawaban[$i], 'gambar_jawaban' => $uploadData[$j]['file_name'], 'nilai_jawaban' => $skor[$i], 'benar' => $bnr, 'update_terakhir' => $update_terakhir), $set_soal, $x);
						
						if(! $upd_jawaban)
						{
							$set_jawaban = $this->model_master->set_jawaban_soal(array('id_soal' => $set_soal, 'pilihan' => $x, 'detail_jawaban' => $jawaban[$i], 'gambar_jawaban' => $uploadData[$i]['file_name'], 'nilai_jawaban' => $skor[$j], 'benar' => $bnr, 'update_terakhir' => $update_terakhir));
						}
							
						
						
						$i++;
						$x++;
					}
				}
				
				$page_content2 = "
					Berhasil membuat Soal Baru.
					<br />
					<a href='$admin_url/soal_ujian'>Lihat</a>
				";
			}else{
				$page_content2 = "
					Gagal menambah Soal Baru.
					<br />
					<a href='$admin_url/soal_ujian/tambah'>Ulang</a>
				";
			}
			
			
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "hapus_media":
		$t = $this->input->get('t');
		$id = $this->input->get('id');
		$msg = "";
		$thn_upload = $this->model_master->get_single_data('tahun_upload','ujian_soal','id_soal',$id);
		
		switch($t)
		{
			case "gambar":
				$media = $this->model_master->get_single_data('gambar','ujian_soal','id_soal',$id);
				
				if(file_exists('./media/soal/'.$thn_upload.'/'.$media))
				{
					unlink('./media/soal/'.$thn_upload.'/'.$media);
				}
				
				$upd = $this->model_master->update_soal(array('gambar' => ''), $id);
				$msg = "Gambar telah dihapus.";
			;
			break;
			
			case "audio":
				$media = $this->model_master->get_single_data('audio','ujian_soal','id_soal',$id);
				
				if(file_exists('./media/soal/'.$thn_upload.'/'.$media))
				{
					unlink('./media/soal/'.$thn_upload.'/'.$media);
				}
				
				$upd = $this->model_master->update_soal(array('audio' => ''), $id);
				$msg = "File Audio telah dihapus.";
			;
			break;
			
			case "video":
				$media = $this->model_master->get_single_data('video','ujian_soal','id_soal',$id);
				
				if(file_exists('./media/soal/'.$thn_upload.'/'.$media))
				{
					unlink('./media/soal/'.$thn_upload.'/'.$media);
				}
				
				$upd = $this->model_master->update_soal(array('video' => ''), $id);
				$msg = "File Video telah dihapus.";
			;
			break;
			
			default:
				$msg = "Tidak ada media yang dihapus.";
			;
		}
		
		$page_content2 = "$msg <a href='$admin_url/soal_ujian/edit?data=$id'>Kembali</a>";
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Soal";
		$soal = $this->model_master->get_data_soal($edit);
		
		if($soal !== FALSE)
		{
			foreach($soal AS $sl)
			{
				$hash_kd = $this->encryption->encrypt($sl->id_soal);
				
				$pil_kategori = "";
				$media_soal = "";
				
				if($kategori_ujian != FALSE)
				{
					foreach($kategori_ujian AS $ktj)
					{
						if($ktj->kode_kategori_soal != $sl->kode_kategori_soal)
						{
							$pil_kategori .= "<option value='$ktj->kode_kategori_soal'>$ktj->nama_kategori_soal</option>
							";
						}else{
							$pil_kategori .= "<option value='$ktj->kode_kategori_soal' selected>$ktj->nama_kategori_soal</option>
							";
						}
					}
				}
				
				if(! empty($sl->gambar))
				{
					$media_soal .= "
						<img alt='gambar soal' src='$media_url/soal/$sl->tahun_upload/$sl->gambar' style='width:350px;' /> &nbsp; 
						[<a href='$admin_url/soal_ujian/hapus_media?t=gambar&id=$sl->id_soal'>Hapus</a>]
					";
				}
				
				if(! empty($sl->audio))
				{
					$media_soal .= "
						<audio controls='controls' id='audio_player'>
						  <source src='$media_url/soal/$sl->tahun_upload/$sl->audio' type='$sl->audio_type />
						  Your browser does not support the audio element.
						</audio>
						&nbsp; 
						[<a href='$admin_url/soal_ujian/hapus_media?t=audio&id=$sl->id_soal'>Hapus</a>]
					";
				}
				
				if(! empty($sl->video))
				{
					$media_soal .= "
						<video controls >
						  <source src='$media_url/soal/$sl->tahun_upload/$sl->video' type='$sl->video_type'>
						  Your browser does not support the video tag.
						</video>
						&nbsp; 
						[<a href='$admin_url/soal_ujian/hapus_media?t=video&id=$sl->id_soal'>Hapus</a>]
					";
				}
				
				$jawaban = $this->model_master->get_jawaban_soal($sl->id_soal);
				$list_jawaban = "";
				
				if($jawaban != FALSE)
				{
					$x=1;
					foreach($jawaban AS $jwb)
					{
						$bnr = "";
						if($jwb->benar == 1)
						{
							$bnr = "checked";
						}
						
						$list_jawaban .= "
							<tr>
								<td>$abjad[$x]</td>
								<td>
									<textarea name='jawaban[]' >$jwb->detail_jawaban</textarea>
									<input type='file' name='gambar_jawaban[]'  multiple='multiple'/>
									<input type='hidden' name='o_gammbar[]' />
								</td>
								<td><input type='radio' name='benar[]' value='$x' $bnr /></td>
								<td><input type='number' name='skor[]' value='$jwb->nilai_jawaban' /></td>
							</tr>
						";
						
						$x++;
					}
				}
				
				$page_content2 = "
					<form method='post' action='$admin_url/soal_ujian/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-12 medium-12 small-12 column'>
									<div class='large-4 medium-4 small-12 column'>
										Kategori Soal
									</div>
									<div class='large-8 medium-8 small-12 column'>
										<select name='kategori'>
											$pil_kategori
										</select>
									</div>
								</div>
								<div class='linebrown'></div>
								<div class='large-12 medium-12 small-12 column'>
									<div class='large-4 medium-4 small-12 column'>
										Gambar
									</div>
									<div class='large-8 medium-8 small-12 column'>
										<input type='file' name='gambar'  />
										<div class='note'>Kosongkan Bila tidak diganti</div>
									</div>
								</div>
								<div class='linebrown'></div>
								<div class='large-12 medium-12 small-12 column'>
									<div class='large-4 medium-4 small-12 column'>
										Pertanyaan
									</div>
									<div class='large-8 medium-8 small-12 column'>
										<textarea name='pertanyaan' placeholder='Pertanyaan' rows='5' class='konten'>$sl->pertanyaan</textarea>
									</div>
								</div>
								
								<div class='linebrown'></div>
								<div class='large-12 medium-12 small-12 column'>
									<div class='large-4 medium-4 small-12 column'>
										
									</div>
									<div class='large-8 medium-8 small-12 column'>
										<table>
											<thead>
												<tr>
													<th>Pilihan</th>
													<th>Jawaban</th>
													<th>Pilihan</th>
													<th>Skor</th>
												</tr>
											</thead>
											<tbody id='jawaban'>
												$list_jawaban
											</tbody>
										</table>
									</div>
								</div>
								
								<p style='text-align:center'>
									<a href='#' id='tambah_jawaban'>Tambah Jawaban</a>
								</p>
								<div class='linebrown'></div>
								
								$media_soal
								
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
		$kategori = $this->input->post('kategori');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban = $this->input->post('jawaban');
		$benar = $this->input->post('benar');
		$skor = $this->input->post('skor');
		$gambar = "";
		$audio = "";
		$video = "";
		$level_soal = 1;
		$update_terakhir = date("Y-m-d H:i:s");
		$aktif = 1;
		
		$update = FALSE;
		$del_ogambar = FALSE;
		
		$thn_upload = $this->model_master->get_single_data('tahun_upload','ujian_soal','id_soal',$hash_kd);
		$thn_upload = date("Y", strtotime($thn_upload));
		$update_terakhir = date("Y-m-d H:i:s");
		
		$old_gambar = $this->input->post('old_gambar');
		$gambar = $old_gambar;
		
		if(! is_dir("./media/soal/$thn_upload/"))
		{
			mkdir('./media/soal/'.$thn_upload, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/soal/'.$thn_upload.'/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 4000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['file_ext_tolower'] = TRUE;
		$config['min_width']         = 400;
		$config['min_height']       = 400;
		//$config['max_filename'] = 240;
		
		$this->upload->initialize($config);
		
		if(! empty($kategori) && ! empty($pertanyaan) && ! empty($jawaban) && ! empty($skor))
		{
			if( ! empty($_FILES['gambar']['name']))
			{
				if ($this->upload->do_upload('gambar'))
				{
					$udata = $this->upload->data();
					$gambar = $udata['file_name'];
					$del_ogambar = TRUE;
					
					// resize gambar
					$cfg['source_image'] = './media/soal/'.$thn_upload.'/'.$gambar;
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
			
			$update = $this->model_master->update_soal(array('kode_kategori_soal' => $kategori,'pertanyaan' => $pertanyaan, 'gambar' => $gambar, 'audio' => $audio, 'video' => $video, 'level_soal' => $level_soal, 'update_terakhir' => $update_terakhir, 'aktif' => $aktif), $hash_kd);
			
			if($update != FALSE)
			{
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					unlink('./media/soal/'.$thn_upload.'/'.$old_gambar);
				}
				
				$clear_jawaban = $this->model_master->hapus_jawaban_soal($hash_kd);
				
				$i=0;
				$x=$i+1;
				
				
				foreach($jawaban AS $jw)
				{
					$bnr = 0;
					if($x == $benar[0])
					{ $bnr = 1; }
					
					if(! empty($jw))
					{
						$update = $this->model_master->set_jawaban_soal(array('id_soal' => $hash_kd, 'pilihan' => $x, 'detail_jawaban' => $jw, 'nilai_jawaban' => $skor[$i], 'benar' => $bnr));
					}
					
					$i++;
					$x++;
				}
				
				$page_content2 = "
					Berhasil Memperhabarui Soal.
					<br />
					<a href='$admin_url/soal_ujian'>Lihat</a>
				";
			}else{
				$page_content2 = "
					Gagal Update.
					<br />
					<a href='$admin_url/soal_ujian/edit?data=$hash_kd'>Ulang</a>
				";
			}
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update Soal.
					<br />
					<a href='$admin_url/soal_ujian/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_soal = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus diubah menjadi update status kategori
		$hapus = FALSE; //$this->model_master->hapus_soal($id_soal);
		
		if($hapus)
		{
			$hapus_jawaban = $this->model_master->hapus_jawaban_soal($id_soal);
			
			$page_content2 = "
				Berhasil menghapus Soal. <br />
				<a href='$admin_url/soal_ujian'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus Soal. <br />
				<a href='$admin_url/soal_ujian'>Kembali</a>
			";
		}
	;
	break;
	
	case "cari":
		$cari = $this->input->get('cari');
		$data_cari = "";
		$i=1;
		
		if(strlen($cari) > 2)
		{
			$cari_soal = $this->model_master->cari_soal($cari);
			
			if($cari_soal !== FALSE)
			{
				$data_cari = "
					<div class='linebrown'></div>
					
					<table>
						<thead>
							<tr>
								<th><b>No.</b></th>
								<th><b>Soal</b></th>
								<th><b>Kategori</b></th>
								<th><b>Aksi</b></th>
							</tr>
						</thead>
						<tbody>
				";
				
				// uraian soal
				foreach($cari_soal AS $cs)
				{
					$soals = highlight_phrase($cs->pertanyaan, $cari, '<span style="color:#990000;background:#eeffdd;font-size:16pt;">', '</span>');;
					
					$data_cari .= "
						<tr>
							<td>$i</td>
							<td>$soals</td>
							<td>$cs->nama_kategori_soal</td>
							<td>
								<a href='$admin_url/soal_ujian/edit?data=$cs->id_soal'>Edit</a> | 
								<a href='$admin_url/soal_ujian/hapus?data=$cs->id_soal'>Hapus</a>
							</td>
						</tr>
					";
					
					$i++;
				}
				
				$data_cari .= "
						</tbody>
					</table>
					";
			}else{
				$data_cari = "<div class='linebrown'></div> Data Tidak Ditemukan!";
			}
		}
		
		$page_content2 = "
			<div class='large-12 medium-12 small-12 column main'>
				<form method='get' action='$admin_url/soal_ujian/cari'>
					<input type='text' name='cari' placeholder='Masukan Kata Kunci Soal' />
					<input type='submit' value='Cari' class='radius button' />
				</form>
				$data_cari
			</div><div class='linebrown'></div>
		";
		
	;
	break;
	
	case "kategori":
		$kode_kategori = $this->input->get('kat');
		$soal = $this->model_master->get_soal_kategori($kode_kategori,$awal);
		$i = $awal+1;
		
		$jumlah_data = $this->model_master->hitung_data_sendiri('id_soal','ujian_soal','kode_kategori_soal',$kode_kategori);
		
		$config['base_url'] = $admin_url.'/soal_ujian/kategori?kat='.$kode_kategori;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$config['cur_tag_open'] = '<li class="current">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_soal = "Belum Ada Data";
		
		if($soal !== FALSE)
		{
			$d_soal = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Soal</b></th>
						<th><b>Kategori</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($soal AS $sl)
			{
				$nama_kategori = $this->model_master->get_single_data('nama_kategori_soal','ujian_kategori_soal','kode_kategori_soal',$sl->kode_kategori_soal);
				$prtanyaan = word_limiter(strip_tags($sl->pertanyaan), 6);
				
				$d_soal .= "
					<tr>
						<td>$i</td>
						<td>$prtanyaan</td>
						<td>$nama_kategori</td>
						<td>
							<a href='$admin_url/soal_ujian/edit?data=$sl->id_soal'>Edit</a> | 
							<a href='$admin_url/soal_ujian/hapus?data=$sl->id_soal'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_soal .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/soal_ujian/tambah'>Buat Soal</a> | 
			<a href='$admin_url/soal_ujian/cari'>Cari Soal</a>
			
			<div class='linebrown'></div>
			
			
			$d_soal
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<nav aria-label='pagination'>
					<ul class='pagination text-center'>
						$halaman
					</ul>
				</nav>
			</div>
		";
	;
	break;
	
	default:
		$soal = $this->model_master->get_soal_ujian($awal);
		$i = $awal+1;
		
		$jumlah_data = $this->model_master->hitung_data('id_soal','ujian_soal');
		
		$config['base_url'] = $admin_url.'/soal_ujian/lihat?a=s';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$config['cur_tag_open'] = '<li class="current">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_soal = "Belum Ada Data";
		
		if($soal !== FALSE)
		{
			$d_soal = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Soal</b></th>
						<th><b>Kategori</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($soal AS $sl)
			{
				$nama_kategori = $this->model_master->get_single_data('nama_kategori_soal','ujian_kategori_soal','kode_kategori_soal',$sl->kode_kategori_soal);
				$prtanyaan = word_limiter(strip_tags($sl->pertanyaan), 6);
				
				if(empty ($prtanyaan))
				{
					$prtanyaan = "Soal di Gambar";
				}
				
				$d_soal .= "
					<tr>
						<td>$i</td>
						<td>$prtanyaan</td>
						<td><a href='$admin_url/soal_ujian/kategori?kat=$sl->kode_kategori_soal'>$nama_kategori</a></td>
						<td>
							<a href='$admin_url/soal_ujian/edit?data=$sl->id_soal'>Edit</a> | 
							<a href='$admin_url/soal_ujian/hapus?data=$sl->id_soal'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_soal .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/soal_ujian/tambah'>Buat Soal</a> | 
			<a href='$admin_url/soal_ujian/cari'>Cari Soal</a>
			
			<div class='linebrown'></div>
			
			
			$d_soal
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<nav aria-label='pagination'>
					<ul class='pagination text-center'>
						$halaman
					</ul>
				</nav>
			</div>
		";
	;
	break;
}
