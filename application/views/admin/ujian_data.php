<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/ujian_data'>Ujian</a>";
$judul_situs = "Ujian";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);
$kategori_ujian = $this->model_master->get_kategori_soal();
$jam_pengerjaan = array(1800 => "30 Menit", 2400 => "40 Menit", 3600 => "1 Jam", 5500 => "90 Menit", 7200 => "3 Jam", 10800 => "3 Jam");

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Ujian";
		$map_dir .= " &gt; Tambah Ujian";
		$kat_ujian = "";
		$pil_jam = "";
		
		if($kategori_ujian !== FALSE)
		{
			foreach($kategori_ujian AS $ktj)
			{
				$kat_ujian .= "<option value='$ktj->kode_kategori_soal'>$ktj->nama_kategori_soal</option>
				";
			}
		}
		
		if(! empty($jam_pengerjaan))
		{
			foreach($jam_pengerjaan AS $jmpa => $jmpb)
			{
				$pil_jam .= "<option value='$jmpa'>$jmpb</option>";
			}
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/ujian_data/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Ujian
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_ujian' placeholder='Masukan Nama Ujian' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kategori Ujian
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='kategori'>
									$kat_ujian
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jumlah Soal
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='jumlah_soal' placeholder='Jumlah Soal' /> Max 200
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Waktu Pengerjaan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='waktu_pengerjaan'>
									$pil_jam
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Acak Soal Ujian
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='acak_soal'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
								Jika 'Ya', semua soal akan diacak. Jika pilih 'Tidak' semua soal akan sama untuk seluruh peserta
							</div>
						</div>
						<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Lihat Hasil
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='lihat_hasil'>
										<option value='1'>Ya</option>
										<option value='0'>Tidak</option>
									</select>
									Jika 'Ya', peserta dapat melihat hasil ujian. Jika pilih 'Tidak', Peserta Tidak dapat melihat hasil ujian.
								</div>
							</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Ulangi
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='ulangi'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
								Jika 'Ya', peserta bisa ujian lagi setelah selesai. Jika pilih 'Tidak', Peserta Tidak dapat mengulang setelah selesai ujian.
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
		
		//$kode_ujian_data = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_ujian_data')));
		$nama_ujian = $this->input->post('nama_ujian');
		$jumlah_soal = $this->input->post('jumlah_soal');
		$kategori_soal = $this->input->post('kategori');
		$acak_soal = $this->input->post('acak_soal');
		$waktu_pengerjaan = $this->input->post('waktu_pengerjaan');
		$lihat_hasil = $this->input->post('lihat_hasil');
		$ulangi = $this->input->post('ulangi');
		$aktif = 1;
		
		if(($jumlah_soal < 1) OR ($jumlah_soal > 200))
		{
			$jumlah_soal = 40;
		}
		
		if(! empty($nama_ujian) && ! empty($jumlah_soal))
		{
			$rd_soal = $this->model_master->get_random_soal($kategori_soal, $jumlah_soal);
			$pil_soal = "";
			if($rd_soal != FALSE)
			{
				foreach($rd_soal AS $rds)
				{
					if(! empty($pil_soal))
					{
						$pil_soal .= ",".$rds->id_soal;
					}else{
						$pil_soal = $rds->id_soal;
					}
				}
			}
			
			$insert = $this->model_master->set_data_ujian(array('id_ujian' => '', 'kode_kategori_soal' => $kategori_soal, 'nama_ujian' => $nama_ujian, 'jumlah_soal' => $jumlah_soal, 'acak_soal' => $acak_soal, 'soal_terpilih' => $pil_soal, 'waktu_pengerjaan' => $waktu_pengerjaan, 'lihat_hasil' => $lihat_hasil, 'mengulang' => $ulangi, 'aktif' => $aktif));
			
			if($insert)
			{
				$page_content2 = "Berhasil Menambah Ujian. <a href='$admin_url/ujian_data'>Kembali</a>";
				
			}else{
				$page_content2 = "Gagal Menambah Ujian. <a href='$admin_url/ujian_data/tambah'>Ulang</a>";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Ujian";
		$ujian_data = $this->model_master->get_data_ujian($edit);
		
		if($ujian_data !== FALSE)
		{
			foreach($ujian_data AS $ujn)
			{
				$hash_kd = $this->encryption->encrypt($ujn->id_ujian);
				$hash_kat = $this->encryption->encrypt($ujn->kode_kategori_soal);
				
				$kat_ujian = "";
				$pil_jam = "";
				$y_acak = "";
				$y_aktif = "";
				$y_ulangi = "";
				$y_hasil = "";
				$t_acak = "";
				$t_aktif = "";
				$t_ulangi = "";
				$t_hasil = "";
				
				if($kategori_ujian !== FALSE)
				{
					foreach($kategori_ujian AS $ktj)
					{
						if($ujn->kode_kategori_soal != $ktj->kode_kategori_soal)
						{
							$kat_ujian .= "<option value='$ktj->kode_kategori_soal'>$ktj->nama_kategori_soal</option>
							";
						}else{
							$kat_ujian .= "<option value='$ktj->kode_kategori_soal' selected>$ktj->nama_kategori_soal</option>
							";
						}
					}
				}
				
				if(! empty($jam_pengerjaan))
				{
					foreach($jam_pengerjaan AS $jmpa => $jmpb)
					{
						if($ujn->waktu_pengerjaan != $jmpa)
						{
							$pil_jam .= "<option value='$jmpa'>$jmpb</option>";
						}else{
							$pil_jam .= "<option value='$jmpa' selected>$jmpb</option>";
						}
					}
				}
				
				if($ujn->acak_soal == TRUE)
				{
					$y_acak = "selected";
				}else{
					$t_acak = "selected";
				}
				
				if($ujn->lihat_hasil == TRUE)
				{
					$y_hasil = "selected";
				}else{
					$t_hasil = "selected";
				}
				
				if($ujn->mengulang == TRUE)
				{
					$y_ulangi = "selected";
				}else{
					$t_ulangi = "selected";
				}
			
				if($ujn->aktif == TRUE)
				{
					$y_aktif = "selected";
				}else{
					$t_aktif = "selected";
				}
				
				$page_content2 = "
					<form method='post' action='$admin_url/ujian_data/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<input type='hidden' name='hash_kat' value='$hash_kat' />
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Ujian
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_ujian' placeholder='Masukan Nama Ujian' value='$ujn->nama_ujian' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kategori Ujian
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='kategori'>
										$kat_ujian
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jumlah Soal
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='number' name='jumlah_soal' placeholder='Jumlah Soal' value='$ujn->jumlah_soal' /> Max 200
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Waktu Pengerjaan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='waktu_pengerjaan'>
										$pil_jam
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Acak Soal Ujian
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='acak_soal'>
										<option value='1' $y_acak>Ya</option>
										<option value='0' $t_acak>Tidak</option>
									</select>
									Jika 'Ya', semua soal akan diacak. Jika pilih 'Tidak' semua soal akan sama untuk seluruh peserta
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Status Ujian Ujian
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='aktif'>
										<option value='1' $y_aktif>Aktif</option>
										<option value='0' $t_aktif>Tutup</option>
									</select>
									Aktifkan atau tutup akses ke sesi ujian ini!
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Lihat Hasil
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='lihat_hasil'>
										<option value='1' $y_hasil>Ya</option>
										<option value='0' $t_hasil>Tidak</option>
									</select>
									Jika 'Ya', peserta dapat melihat hasil ujian. Jika pilih 'Tidak', Peserta Tidak dapat melihat hasil ujian.
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Ulangi
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='ulangi'>
										<option value='1' $y_ulangi>Ya</option>
										<option value='0' $t_ulangi>Tidak</option>
									</select>
									Jika 'Ya', peserta bisa ujian lagi setelah selesai. Jika pilih 'Tidak', Peserta Tidak dapat mengulang setelah selesai ujian.
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
		$hash_kat = $this->encryption->decrypt($this->input->post('hash_kat'));
		$nama_ujian = $this->input->post('nama_ujian');
		$jumlah_soal = $this->input->post('jumlah_soal');
		$kategori_soal = $this->input->post('kategori');
		$acak_soal = $this->input->post('acak_soal');
		$waktu_pengerjaan = $this->input->post('waktu_pengerjaan');
		$lihat_hasil = $this->input->post('lihat_hasil');
		$ulangi = $this->input->post('ulangi');
		$aktif = $this->input->post('aktif');
		
		if(($jumlah_soal < 1) OR ($jumlah_soal > 200))
		{
			$jumlah_soal = 40;
		}
		
		$update = FALSE;
		
		if(! empty($hash_kd) && ! empty($nama_ujian) && ! empty($jumlah_soal))
		{
			if($hash_kat != $kategori_soal)
			{
				$rd_soal = $this->model_master->get_random_soal($kategori_soal, $jumlah_soal);
				$pil_soal = "";
				if($rd_soal != FALSE)
				{
					foreach($rd_soal AS $rds)
					{
						if(! empty($pil_soal))
						{
							$pil_soal .= ",".$rds->id_soal;
						}else{
							$pil_soal = $rds->id_soal;
						}
					}
				}
				
				$data_update = array('kode_kategori_soal' => $kategori_soal, 'nama_ujian' => $nama_ujian, 'jumlah_soal' => $jumlah_soal, 'acak_soal' => $acak_soal, 'soal_terpilih' => $pil_soal, 'waktu_pengerjaan' => $waktu_pengerjaan, 'lihat_hasil' => $lihat_hasil, 'mengulang' => $ulangi, 'aktif' => $aktif);
			}else{
				$data_update = array('kode_kategori_soal' => $kategori_soal, 'nama_ujian' => $nama_ujian, 'jumlah_soal' => $jumlah_soal, 'acak_soal' => $acak_soal, 'waktu_pengerjaan' => $waktu_pengerjaan, 'lihat_hasil' => $lihat_hasil, 'mengulang' => $ulangi, 'aktif' => $aktif);
			}
			
			$update = $this->model_master->update_data_ujian($data_update, $hash_kd);
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update Ujian.
					<br />
					<a href='$admin_url/ujian_data/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}else{
				$page_content2 = "
					Gagal melakukan update Ujian.
					<br />
					<a href='$admin_url/ujian_data/edit?data=$hash_kd'>&lt;&lt; Kembali</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_ujian = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus diubah menjadi update status ujian_data
		$hapus = FALSE; //$this->model_master->update_ujian_data(array('status_ujian_data' => 0), $id_ujian);
		
		if($hapus)
		{
			$page_content2 = "
				Berhasil menghapus Ujian <b>$id_ujian</b> <br />
				<a href='$admin_ur/ujian_data'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus Ujian <b>$id_ujian</b> <br />
				<a href='$admin_url/ujian_data'>Kembali</a>
			";
		}
	;
	break;
	
	case "download":
		$id_ujian = $this->input->get('data');
		$nama_ujian = $this->model_master->get_single_data('nama_ujian','ujian_data','id_ujian',$id_ujian);
		
		$peserta_ujian = $this->model_master->get_peserta_ujian_semua($id_ujian);
		$tipe = $this->input->get('tipe');
		
		if($peserta_ujian !== FALSE)
		{
			
			 
			$data_ujian = "
				<html>
				<body>
				<h2>Data Nilai Ujian $nama_ujian</h2>
				
				<table border='1' width='100%'>
					<thead>
						<tr>
							<th>No</th>
							<th>NISN</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Platform</th>
							<th>Diblokir</th>
							<th>Jawaban Benar</th>							
							<th>Skor Akhir</th>
						</tr>
					</thead>
					<tbody>
			";
			$i=1;
			
			foreach($peserta_ujian AS $pst)
			{
				$data_ujian .= "
					<tr>
						<td>$i</td> 
						<td>$pst->nisn</td>
						<td>$pst->nama_lengkap</td>
						<td>$pst->nama_kelas</td>
						<td>$pst->platform</td>
						<td>$pst->jumlah_diblokir</td>
						<td>$pst->jawaban_benar</td>
						<td>$pst->skor_akhir</td>
					</tr>
				";
				
				$i++;
			}
			
			$data_ujian .= "
					</tbody>
				</table>
				</body>
				</html>
				
			";
			
			if($tipe == "xls")
			{
				//header("Content-type: application/vnd-ms-excel");
				//header("Content-Disposition: attachment; filename=ujian_$nama_ujian.xls");
				//header("Pragma: no-cache"); 
				//header("Expires: 0");
				
				//echo $data_ujian;
			
				//exit;
				
				include_once (APPPATH."libraries/Excel.php");
				
				$excel = new Excel();
				
				$excel->nilai_ujian($peserta_ujian, "ujian_".$nama_ujian);
			}else{
				ob_end_flush(); // Matikan Output buffering
				ob_end_clean();
				
				include_once (APPPATH."libraries/Pdf.php");
				
				$pdf = new Pdf();
				
				$pdf->nilai_ujian($data_ujian, "ujian_$nama_ujian",true);
			}
			
		}
		
	;
	break;
	
	default:
		$ujian_data = $this->model_master->get_ujian_data($awal);
		$i = $awal+1;
		
		$jumlah_data = $this->model_master->hitung_data('id_ujian','ujian_data');
		
		$config['base_url'] = $admin_url.'/ujian_data/lihat?a=s';
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
		
		$d_ujian_data = "Belum Ada Data";
		
		if($ujian_data !== FALSE)
		{
			$d_ujian_data = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Nama Ujian</b></th>
						<th><b>Pelajaran</b></th>
						<th><b>Acak</b></th>
						<th><b>Waktu</b></th>
						<th><b>Aktif</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($ujian_data AS $dtj)
			{
				$aktif = "Tidak";
				if($dtj->aktif == TRUE)
				{
					$aktif = "Ya";
				}
				
				$d_ujian_data .= "
					<tr>
						<td>$i</td>
						<td>$dtj->nama_ujian</td>
						<td>$dtj->kode_kategori_soal</td>
						<td>$dtj->acak_soal</td>
						<td>$dtj->waktu_pengerjaan</td>
						<td>$aktif</td>
						<td>
							<a href='$admin_url/ujian_data/edit?data=$dtj->id_ujian'>Edit</a> | 
							<a href='$admin_url/peserta_ujian/recheck?data=$dtj->id_ujian'>Cek-Ulang</a> |
							<a href='$admin_url/ujian_data/download?data=$dtj->id_ujian&tipe=pdf'>Pdf</a> | 
							<a href='$admin_url/ujian_data/download?data=$dtj->id_ujian&tipe=xls'>Xls</a> | 
							<a href='$admin_url/ujian_data/hapus?data=$dtj->id_ujian'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_ujian_data .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/ujian_data/tambah'>Buat Ujian</a>
			<br /><br />
			
			$d_ujian_data
			
			<br />
			
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
