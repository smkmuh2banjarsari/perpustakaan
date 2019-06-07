<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/karyawan'>Karyawan</a>";
$judul_situs = "Data Pegawai";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$gol_darah = array("a" => "A", "b" => "B", "ab" => "AB", "o" => "O");
$stat_nikah = array(0 => "Belum Nikah", 1 => "Menikah", 2 => "Duda", 3 => "Janda");
$stat_karyawan = array("gty" => "Guru Tetap Yayasan", "gtt" => "Guru Tidak Tetap", "gbs" => "Guru Bantu Sekolah", "pns" => "PNS", "pty" => "Pegawai Tetap Yayasan", "ptt" => "Pegawai Tidak Tetap");

$jabatan = $this->model_master->get_jabatan();

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Karyawan";
		$map_dir .= " &gt; Tambah Karyawan";
		
		$o_gold = "";
		$o_nikah = "";
		$o_karyawan = "";
		
		$pil_jabatan = "";
		
		if($jabatan != FALSE)
		{
			foreach($jabatan AS $jbt)
			{
				$pil_jabatan .= "<option value='$jbt->kode_jabatan'>$jbt->nama_jabatan</option>
				";
			}
		}
		
		foreach($gol_darah AS $gda => $gdb)
		{
			$o_gold .= "<option value='$gda'>$gdb</option>
			";
		}
		
		foreach($stat_nikah AS $nka => $nkb)
		{
			$o_nikah .= "<option value='$nka'>$nkb</option>
			";
		}
		
		foreach($stat_karyawan AS $sta => $stb)
		{
			$o_karyawan .= "<option value='$sta'>$stb</option>
			";
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/karyawan/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jabatan 
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='jabatan'>
									$pil_jabatan
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Gelar Depan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='gelar_depan' placeholder='Gelar Depan' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Lengkap
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_lengkap' placeholder='Nama Lengkap' required />
							</div>
						</div>
						
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Gelar Belakang
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='gelar_belakang' placeholder='Gelar Belakang' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Panggilan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_panggilan' placeholder='Nama Panggilan' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Kependudukan (NIK)
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nik' placeholder='Masukan Nomor Kependudukan (KTP)' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Kepegawaian (NIP) *
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nip' placeholder='Masukan Nomor Kepegawaian' />
								<div class='note'>* Nomor Kepegawaian. Kosongkan bila Tidak ada.</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor UPTK *
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nuptk' placeholder='Masukan Nomor Kepegawaian' />
								<div class='note'>* NUPTK. Kosongkan bila Tidak ada.</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								NBM
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nbm' placeholder='NBM' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jenis Kelamin
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='jenis_kelamin'>
									<option value='1'>Laki-laki</option>
									<option value='0'>Perempuan</option>
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tempat Lahir
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='tempat_lahir' placeholder='Tempat Lahir' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tanggal Lahir
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='tanggal_lahir' placeholder='Tanggal Lahir' id='tanggal_lahir' required />
								<div class='note'>Format: Tahun-bulan-hari (contoh: 1990-01-01)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pendidikan Terakhir
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='pendidikan_terakhir' placeholder='Pendidikan Terakhir' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Alamat Rumah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='alamat_rumah' placeholder='Alamat Rumah Asal' required></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Alamat Sekarang
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='alamat_domisili' placeholder='Alamat Sekarang'></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Golongan Darah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='golongan_darah'>
									$o_gold
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Status Nikah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='status_nikah'>
									$o_nikah
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tanggal Masuk
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='tanggal_masuk' placeholder='Tanggal Masuk' id='tanggal_masuk' required />
								<div class='note'>Tanggal Masuk karyawan. Format: Tahun-bulan-hari (contoh: 2017-01-18)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tanggal Berhenti
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='tanggal_berhenti' placeholder='Tanggal Berhenti' id='tanggal_berhenti' />
								<div class='note'>Tanggal Berhenti karyawan. Kosongkan bila masih aktif</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Kontak
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='no_kontak' placeholder='Nomor Kontak' required />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Kontak Lainnya
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='no_kontak2' placeholder='Nomor Kontak Lainnya' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Status karyawan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='status_karyawan'>
									$o_karyawan
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Mengajar
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='mengajar'>
									<option value='1' selected='selected'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Masih Aktif
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='aktif'>
									<option value='1' selected='selected'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Foto Karyawan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='file' name='foto'  />
								<div class='note'>Kosongkan Bila tidak ada Foto</div>
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
		
		$jabatan = $this->input->post('jabatan');
		$nik = $this->input->post('nik');
		$nip = $this->input->post('nip');
		$nuptk = $this->input->post('nuptk');
		$nbm = $this->input->post('nbm');
		$nama_lengkap = ucwords(strtolower($this->input->post('nama_lengkap')));
		$gelar_depan = $this->input->post('gelar_depan');
		$gelar_belakang = $this->input->post('gelar_belakang');
		$nama_panggilan = ucwords(strtolower($this->input->post('nama_panggilan')));
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = ucwords(strtolower($this->input->post('tempat_lahir')));
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$alamat_rumah = $this->input->post('alamat_rumah');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$golongan_darah = $this->input->post('golongan_darah');
		$status_nikah = $this->input->post('status_nikah');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$tahun_masuk = date("Y", strtotime($tanggal_masuk));
		$tanggal_berhenti = $this->input->post('tanggal_berhenti');
		$no_kontak = $this->input->post('no_kontak');
		$no_kontak2 = $this->input->post('no_kontak2');
		$status_karyawan = $this->input->post('status_karyawan');
		$mengajar = $this->input->post('mengajar');
		$aktif = $this->input->post('aktif');
		$foto = "";
		
		if($aktif == 1)
		{
			$tanggal_berhenti = '0000-00-00';
		}
		
		if(! is_dir("./media/karyawan/$tahun_masuk/"))
		{
			mkdir('./media/karyawan/'.$tahun_masuk, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/karyawan/'.$tahun_masuk.'/';
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
		
		if(! empty($nama_lengkap) && ! empty($alamat_rumah) && ! empty($tanggal_masuk))
		{
			if( ! empty($_FILES['foto']['name']))
			{
				if ($this->upload->do_upload('foto'))
				{
					$udata = $this->upload->data();
					$foto = $udata['file_name'];
					
					// resize gambar
					$cfg['source_image'] = './media/karyawan/'.$tahun_masuk.'/'.$foto;
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
			
			$insert = $this->model_master->set_karyawan(array('id_karyawan' => '', 'kode_jabatan' => $jabatan, 'nik' => $nik, 'nip' => $nip, 'nuptk' => $nuptk, 'nbm' => $nbm, 'gelar_depan' => $gelar_depan, 'nama_lengkap' => $nama_lengkap, 'gelar_belakang' => $gelar_belakang, 'nama_panggilan' => $nama_panggilan, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'pendidikan_terakhir' => $pendidikan_terakhir,  'alamat_rumah' => $alamat_rumah,  'alamat_domisili' => $alamat_domisili,  'golongan_darah' => $golongan_darah,  'status_nikah' => $status_nikah,  'tanggal_masuk' => $tanggal_masuk, 'tahun_masuk' => $tahun_masuk,  'tanggal_berhenti' => $tanggal_berhenti,  'no_kontak' => $no_kontak,'no_kontak2' => $no_kontak2,  'jumlah_tanggungan' => 0, 'status_karyawan' => $status_karyawan, 'foto' => $foto, 'mengajar' => $mengajar, 'aktif' => $aktif));
			
			$page_content2 = "
				Berhasil Menambah karyawan.
				<br />
				<a href='$admin_url/karyawan'>Lihat</a>
			";
			
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit karyawan";
		$karyawan = $this->model_master->get_data_karyawan($edit);
		
		if($karyawan !== FALSE)
		{
			foreach($karyawan AS $kry)
			{
				$hash_kd = $this->encryption->encrypt($kry->id_karyawan);
				$y_aktif = '';
				$y_mengajar = '';
				$t_aktif = '';
				$t_mengajar = '';
				$laki_selected = '';
				$perempuan_selested = '';
				
				$o_gold = "";
				$o_nikah = "";
				$o_karyawan = "";
				$pil_jabatan = "";
				
				if($jabatan != FALSE)
				{
					foreach($jabatan AS $jbt)
					{
						if($jbt->kode_jabatan != $kry->kode_jabatan)
						{
							$pil_jabatan .= "<option value='$jbt->kode_jabatan'>$jbt->nama_jabatan</option>
							";
						}else{
							$pil_jabatan .= "<option value='$jbt->kode_jabatan' selected>$jbt->nama_jabatan</option>
							";
						}
						
					}
				}
				
				if($kry->jenis_kelamin == TRUE)
				{
					$laki_selected = 'selected';
				}else{
					$perempuan_selested = 'selected';
				}
				
				foreach($gol_darah AS $gda => $gdb)
				{
					if($gda != $kry->golongan_darah)
					{
						$o_gold .= "<option value='$gda'>$gdb</option>
						";
					}else{
						$o_gold .= "<option value='$gda' selected>$gdb</option>
						";
					}
					
				}
				
				foreach($stat_nikah AS $nka => $nkb)
				{
					if($nka != $kry->status_nikah)
					{
						$o_nikah .= "<option value='$nka'>$nkb</option>
						";
					}else{
						$o_nikah .= "<option value='$nka' selected>$nkb</option>
						";
					}
					
				}
				
				foreach($stat_karyawan AS $sta => $stb)
				{
					if($sta != $kry->status_karyawan)
					{
						$o_karyawan .= "<option value='$sta'>$stb</option>
						";
					}else{
						$o_karyawan .= "<option value='$sta' selected>$stb</option>
						";
					}
				}
				
				if($kry->mengajar == TRUE)
				{
					$y_mengajar = 'selected="selected"';
				}else{
					$t_mengajar = 'selected="selected"';
				}
				
				if($kry->aktif == TRUE)
				{
					$y_aktif = 'selected="selected"';
				}else{
					$t_aktif = 'selected="selected"';
				}
				
				$page_content2 = "
					<form method='post' action='$admin_url/karyawan/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jabatan 
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='jabatan'>
										$pil_jabatan
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Gelar Depan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='gelar_depan' placeholder='Gelar Depan' value='$kry->gelar_depan' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Lengkap
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_lengkap' placeholder='Nama Lengkap' value='$kry->nama_lengkap' required />
								</div>
							</div>
							
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Gelar Belakang
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='gelar_belakang' placeholder='Gelar Belakang' value='$kry->gelar_belakang' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Panggilan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_panggilan' placeholder='Nama Panggilan' value='$kry->nama_panggilan' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kependudukan (NIK)
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nik' placeholder='Masukan Nomor Kependudukan (KTP)' value='$kry->nik' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kepegawaian (NIP) *
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nip' placeholder='Masukan Nomor Kepegawaian' value='$kry->nip' />
									<div class='note'>* Nomor Kepegawaian. Kosongkan bila Tidak ada.</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor UPTK *
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nuptk' placeholder='Masukan Nomor Kepegawaian' value='$kry->nuptk' />
									<div class='note'>* NUPTK. Kosongkan bila Tidak ada.</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									NBM
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nbm' placeholder='NBM' value='$kry->nbm' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jenis Kelamin
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='jenis_kelamin'>
										<option value='1' $laki_selected >Laki-laki</option>
										<option value='0' $perempuan_selested>Perempuan</option>
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tempat Lahir
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tempat_lahir' placeholder='Tempat Lahir' value='$kry->tempat_lahir' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tanggal Lahir
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tanggal_lahir' placeholder='Tanggal Lahir' id='tanggal_lahir' value='$kry->tanggal_lahir' required />
									<div class='note'>Format: Tahun-bulan-hari (contoh: 1990-01-01)</div>
								</div>
							</div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Pendidikan Terakhir
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='pendidikan_terakhir' placeholder='Pendidikan Terakhir' value='$kry->pendidikan_terakhir' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Alamat Rumah
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='alamat_rumah' placeholder='Alamat Rumah Asal' required>$kry->alamat_rumah</textarea>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Alamat Sekarang
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='alamat_domisili' placeholder='Alamat Sekarang'>$kry->alamat_domisili</textarea>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Golongan Darah
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='golongan_darah'>
										$o_gold
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Status Nikah
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='status_nikah'>
										$o_nikah
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tanggal Masuk
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tanggal_masuk' placeholder='Tanggal Masuk' id='tanggal_masuk' value='$kry->tanggal_masuk' required />
									<div class='note'>Tanggal Masuk karyawan. Format: Tahun-bulan-hari (contoh: 2017-01-18)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tanggal Berhenti
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tanggal_berhenti' placeholder='Tanggal Berhenti' id='tanggal_berhenti' value='$kry->tanggal_berhenti' />
									<div class='note'>Tanggal Berhenti karyawan. Kosongkan bila masih aktif</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kontak
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='no_kontak' placeholder='Nomor Kontak' value='$kry->no_kontak' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kontak Lainnya
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='no_kontak2' placeholder='Nomor Kontak Lainnya' value='$kry->no_kontak2' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Status karyawan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='status_karyawan'>
										$o_karyawan
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Mengajar
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='mengajar'>
										<option value='1' $y_mengajar>Ya</option>
										<option value='0' $t_mengajar>Tidak</option>
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Masih Aktif
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='aktif'>
										<option value='1' $y_aktif>Ya</option>
										<option value='0' $t_aktif>Tidak</option>
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							
							
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Foto Karyawan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='file' name='foto'  />
									<div class='note'>Kosongkan Bila tidak ada Foto</div>
								</div>
							</div>
							<div class='linebrown'></div>
							
							<div class='linebrown'></div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='hidden' name='old_foto' value='$kry->foto' />
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
		$jabatan = $this->input->post('jabatan');
		$nik = $this->input->post('nik');
		$nip = $this->input->post('nip');
		$nuptk = $this->input->post('nuptk');
		$nbm = $this->input->post('nbm');
		$nama_lengkap = ucwords(strtolower($this->input->post('nama_lengkap')));
		$gelar_depan = $this->input->post('gelar_depan');
		$gelar_belakang = $this->input->post('gelar_belakang');
		$nama_panggilan = ucwords(strtolower($this->input->post('nama_panggilan')));
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = ucwords(strtolower($this->input->post('tempat_lahir')));
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$alamat_rumah = $this->input->post('alamat_rumah');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$golongan_darah = $this->input->post('golongan_darah');
		$status_nikah = $this->input->post('status_nikah');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		
		$tanggal_berhenti = $this->input->post('tanggal_berhenti');
		$no_kontak = $this->input->post('no_kontak');
		$no_kontak2 = $this->input->post('no_kontak2');
		$status_karyawan = $this->input->post('status_karyawan');
		$mengajar = $this->input->post('mengajar');
		$aktif = $this->input->post('aktif');
		
		$tahun_masuk = $this->model_master->get_single_data('tahun_masuk','data_karyawan','id_karyawan',$hash_kd);
		
		$old_foto = $this->input->post('old_foto');
		$foto = $old_foto;
		
		if($aktif == 1)
		{
			$tanggal_berhenti = '0000-00-00';
		}
		
		$update = FALSE;
		$del_ofoto = FALSE;
		
		if(! is_dir("./media/karyawan/$tahun_masuk/"))
		{
			mkdir('./media/karyawan/'.$tahun_masuk, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/karyawan/'.$tahun_masuk.'/';
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
		
		if(! empty($hash_kd) && ! empty($nama_lengkap))
		{
			if( ! empty($_FILES['foto']['name']))
			{
				if ($this->upload->do_upload('foto'))
				{
					$udata = $this->upload->data();
					$foto = $udata['file_name'];
					$del_ofoto = TRUE;
					
					// resize gambar
					$cfg['source_image'] = './media/karyawan/'.$tahun_masuk.'/'.$foto;
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
			
			$data = array('kode_jabatan' => $jabatan, 'nik' => $nik, 'nip' => $nip, 'nuptk' => $nuptk, 'nbm' => $nbm, 'gelar_depan' => $gelar_depan, 'nama_lengkap' => $nama_lengkap, 'gelar_belakang' => $gelar_belakang, 'nama_panggilan' => $nama_panggilan, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'pendidikan_terakhir' => $pendidikan_terakhir,  'alamat_rumah' => $alamat_rumah,  'alamat_domisili' => $alamat_domisili,  'golongan_darah' => $golongan_darah,  'status_nikah' => $status_nikah,  'tanggal_masuk' => $tanggal_masuk,  'tanggal_berhenti' => $tanggal_berhenti,  'no_kontak' => $no_kontak,'no_kontak2' => $no_kontak2,  'jumlah_tanggungan' => 0, 'status_karyawan' => $status_karyawan, 'foto' => $foto, 'mengajar' => $mengajar, 'aktif' => $aktif);
			$update = $this->model_master->update_karyawan($data, $hash_kd);
			
			
			if($update)
			{
				if((! empty($old_foto)) && ($del_ofoto == TRUE))
				{
					unlink('./media/karyawan/'.$old_foto);
				}
				
				$page_content2 = "
					Berhasil melakukan update karyawan.
					<br />
					<a href='$admin_url/karyawan/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat dilaksanakan.";
		}
	;
	break;
	
	case "hapus":
		$id_karyawan = $this->input->get('data');
		$tahun_masuk = $this->model_master->get_single_data('tahun_masuk','data_karyawan', 'id_karyawan', $id_karyawan);
		$foto = $this->model_master->get_single_data('foto','data_karyawan', 'id_karyawan', $id_karyawan);
		$hapus = FALSE; 
		
		if($id_karyawan > 1)
		{
			$hapus = FALSE; //$this->model_master->hapus_karyawan($id_karyawan);
		}
		
		if($hapus)
		{
			if(file_exists('./media/karyawan/'.$tahun_masuk.'/'.$foto))
			{
				unlink('./media/karyawan/'.$tahun_masuk.'/'.$foto);
			}
			
			$page_content2 = "
				Berhasil menghapus data karyawan <br />
				<a href='$admin_url/karyawan'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus data <br />
				<a href='$admin_url/karyawan'>Kembali</a>
			";
		}
	;
	break;
	
	case "sinkron":
		$act = $this->input->get('act');
		$jml_dta = 0;
		
		if($act == 1)
		{
			exit;
		}
		
		$page_content2 = "
			Anda Yakin akan mengupdate <b>$jml_dta</b> Data Karyawan? 
			<a href='$admin_url/karyawan/sinkron?act=1'>Ya</a> | <a href='$admin_url/karyawan/'>tidak</a>
		"
	;
	break;
	
	default:
		$karyawan = $this->model_master->get_karyawan($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/karyawan?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('id_karyawan','data_karyawan');
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
		
		$d_karyawan = "Belum Ada Data";
		
		if($karyawan !== FALSE)
		{
			$d_karyawan = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Nama</b></th>
						<th><b>Jabatan</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($karyawan AS $kry)
			{
				$d_karyawan .= "
					<tr>
						<th>$i</th>
						<th>$kry->nama_lengkap</th>
						<th>$kry->kode_jabatan</th>
						<th>
							<a href='$admin_url/karyawan/edit?data=$kry->id_karyawan'>Edit</a> | 
							<a href='$admin_url/karyawan/hapus?data=$kry->id_karyawan'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_karyawan .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/karyawan/tambah'>Tambah Baru</a> | 
			<a href='$admin_url/karyawan/sinkron'>Sinkron Data</a>
			<br /><br />
			
			$d_karyawan
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<ul class='pagination'>
					$halaman
				</ul>
			</div>
		";
	;
	break;
}
