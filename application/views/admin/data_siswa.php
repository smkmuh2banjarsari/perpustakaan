<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/siswa'>siswa</a>";
$judul_situs = "Data siswa";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$gol_darah = array("-" => "-", "a" => "A", "b" => "B", "ab" => "AB", "o" => "O");
$stat_nikah = array(0 => "Belum Nikah", 1 => "Menikah", 2 => "Duda", 3 => "Janda");
$stat_siswa = array(1 => "Aktif", 2 => "Lulus", 3 => "Keluar", 4 => "Dikeluarkan");
$transportasi = array("jalan" => "Jalan Kaki", "pribadi" => "Kendaraan Pribadi", "umum" => "Kendaraan Umum", "dll" => "Lainnya");
$wali_m = array("ayah" => "Ayah", "ibu" => "Ibu", "dll" => "Lainnya");

$kelas = $this->model_master->get_kelas_aktif();

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah siswa";
		$map_dir .= " &gt; Tambah siswa";
		
		$o_gold = "";
		$o_siswa = "";
		
		$pil_kelas = "";
		
		$pil_jurusan = "";
		$pil_transportasi = "";
		$pil_sekolah = "";
		$pil_wali = "";
		
		foreach($gol_darah AS $gda => $gdb)
		{
			$o_gold .= "<option value='$gda'>$gdb</option>
			";
		}
		
		if($kelas != FALSE)
		{
			foreach($kelas AS $kls)
			{
				$pil_kelas .= "<option value='$kls->kode_kelas'>$kls->nama_kelas</option>
				";
			}
		}
		
		if($transportasi)
		{
			foreach($transportasi AS $trs => $trsa)
			{
				$pil_transportasi .= "<option value='$trs'>$trsa</option>
				";
			}
		}
		
		foreach($wali_m AS $wla => $wlb)
		{
			$pil_wali .= "<option value='$wla'>$wlb</option>
			";
		}
		
		
		$page_content2 = "
				<form method='post' action='$admin_url/siswa/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kelas
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='kelas'>
									$pil_kelas
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Kependudukan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nik' placeholder='Masukan Nomor Kependudukan (KTP)' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Induk Siswa
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nis' placeholder='Masukan NIS' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Induk Siswa Nasional
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nisn' placeholder='Masukan NISN' />
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
								Nama Panggilan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_panggilan' placeholder='Nama Panggilan' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								<label for='nama_sekolah'>Nama Sekolah Asal</label>
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input id='nama_sekolah' type='text' name='asal_sekolah' placeholder='Nama Sekolah Asal' autocomplete='off' required />
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
								Anak Ke
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='anak_ke' placeholder='Anak Ke' value='1'  />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tinggi Badan (Dalam CM)
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='tinggi_badan' placeholder='Dalam centimeter' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Berat Badan (Dalam KG)
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='number' name='berat_badan' placeholder='Dalam KG' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Tanggal Diterima
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='tanggal_diterima' placeholder='Tanggal Diterima' id='tanggal_masuk' required />
								<div class='note'>Format: Tahun-bulan-hari (contoh: 2018-07-01)</div>
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
								<textarea name='alamat_domisili' placeholder='Alamat Sekarang' required></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Latitude Rumah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='latitude' value='0'>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Longitude Rumah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='longitude' value='0'>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jarak Ke Sekolah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='jarak_rumah' placeholder='Jarak Rumah ke Sekolah' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Transportasi yang Digunakan
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='transportasi'>
									$pil_transportasi
								</select>
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
								Email
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='email' name='email' placeholder='Email' autocomplete='off' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Ujian
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='no_ujian' placeholder='Nomor Ujian' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Seri SKHUN
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='no_skhun' placeholder='Nomor Seri SKHUN' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nomor Seri Ijazah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='no_ijazah' placeholder='Nomor Seri Ijazah' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Ayah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_ayah' placeholder='Masukan Nama Ayah' autocomplete='off' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pekerjaan Ayah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kerja_ayah' placeholder='Pekerjaan Ayah' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Penghasilan Ayah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='penghasilan_ayah' placeholder='Penghasilan perbulan' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Telpon Ayah
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='telp_ayah' placeholder='Nomor Telpon Ayah' autocomplete='off' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Ibu
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_ibu' placeholder='Masukan Nama Ibu' autocomplete='off' />
							</div>
						</div>
						<div class='linebrown'></div>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pekerjaan Ibu
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kerja_ibu' placeholder='Pekerjaan Ibu' />
							</div>
						</div>
						<div class='linebrown'></div>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Penghasilan Ibu
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='penghasilan_ibu' placeholder='Penghasilan perbulan' />
							</div>
						</div>
						<div class='linebrown'></div>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Telpon Ibu
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='telp_ibu' placeholder='Nomor Telpon Ibu' autocomplete='off' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Wali Murid
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='wali_murid'>
									$pil_wali
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<h5>Data Wali Siswa</h5>
							* Diisi apabila wali bukan ayah atau ibu dari siswa
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Wali
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_wali' placeholder='Nama Wali' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Alamat Wali
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<textarea name='alamat_wali' placeholder='Alamat Wali'></textarea>
							</div>
						</div>
						<div class='linebrown'></div>
						
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pekerjaan Wali
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kerja_wali' placeholder='Pekerjaan Wali' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Penghasilan Wali
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='penghasilan_wali' placeholder='Penghasilan Wali' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Telpon Wali
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='telp_wali' placeholder='Nomor Telpon Wali' autocomplete='off' />
							</div>
						</div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Foto Siswa
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='file' name='foto'  />
								<div class='note'>Kosongkan Bila tidak ada Foto</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Status siswa
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='status_siswa'>
									<option value='1'>Aktif</a>
									<option value='2'>Lulus</a>
									<option value='3'>Keluar</a>
									<option value='4'>Dikeluarkan</a>
								</select>
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
		
		$kelas = $this->input->post('kelas');
		$nik = $this->input->post('nik');
		$nis = $this->input->post('nis');
		$nisn = $this->input->post('nisn');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nama_panggilan = $this->input->post('nama_panggilan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat_rumah = $this->input->post('alamat_rumah');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$golongan_darah = $this->input->post('golongan_darah');
		$tanggal_diterima = $this->input->post('tanggal_diterima');
		$no_kontak = $this->input->post('no_kontak');
		$no_kontak2 = $this->input->post('no_kontak2');
		$status_siswa = $this->input->post('status_siswa');
		$foto = "";
		
		//tambaan untuk siswa pendaftaran
		$hash_kd = $this->encryption->decrypt($this->input->post('hash_kd'));
		
		$tahun_masuk = date("Y", strtotime($tanggal_diterima));
		$update_terakhir = date("Y-m-d H:i:s");
		
		if(! is_dir("./media/siswa/$tahun_masuk/"))
		{
			mkdir('./media/siswa/'.$tahun_masuk, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/siswa/'.$tahun_masuk.'/';
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
		
		if(! empty($nama_lengkap) && ! empty($alamat_rumah) && ! empty($tanggal_diterima))
		{
			if( ! empty($_FILES['foto']['name']))
			{
				if ($this->upload->do_upload('foto'))
				{
					$udata = $this->upload->data();
					$foto = $udata['file_name'];
					
					// resize gambar
					$cfg['source_image'] = './media/siswa/'.$tahun_masuk.'/'.$foto;
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
			
			$insert = $this->model_master->set_siswa(array('id_siswa' => '', 'kode_kelas' => $kelas, 'nik' => $nik, 'nis' => $nis, 'nisn' => $nisn, 'password' => md5($nisn), 'nama_lengkap' => $nama_lengkap, 'nama_panggilan' => $nama_panggilan, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'tanggal_diterima' => $tanggal_diterima, 'tahun_masuk' => $tahun_masuk, 'golongan_darah' => $golongan_darah,  'alamat_rumah' => $alamat_rumah,  'alamat_domisili' => $alamat_domisili,  'no_kontak' => $no_kontak,  'no_kontak2' => $no_kontak2,  'foto_siswa' => $foto,  'status_siswa' => $status_siswa, 'update_terakhir' => $update_terakhir));
			
			if($insert)
			{
				$pendaftar = $this->input->get('pendaftar');
				if($pendaftar == 1)
				{
					$terima = array('diterima' => 1, 'disimpan' => 1);
					$update_terima = $this->model_master->update_pendaftar($terima, $hash_kd);
				}
			}
			
			$page_content2 = "
				Berhasil Menambah siswa.
				<br />
				<a href='$admin_url/siswa'>Lihat</a>
			";
			
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit siswa";
		$siswa = $this->model_master->get_data_siswa($edit);
		
		if($siswa !== FALSE)
		{
			foreach($siswa AS $sis)
			{
				$hash_kd = $this->encryption->encrypt($sis->id_siswa);
				$o_gold = "";
				$st_siswa = "";
				
				$pil_kelas = "";
				
				$sis_laki = "";
				$sis_perempuan = "";
				
				if($kelas != FALSE)
				{
					foreach($kelas AS $kls)
					{
						if($sis->kode_kelas != $kls->kode_kelas)
						{
							$pil_kelas .= "<option value='$kls->kode_kelas'>$kls->nama_kelas</option>
							";
						}else{
							$pil_kelas .= "<option value='$kls->kode_kelas' selected='selected'>$kls->nama_kelas</option>
							";
						}
						
					}
				}
				
				if($sis->jenis_kelamin == 1)
				{
					$sis_laki = "selected='selected'";
				}else{
					$sis_perempuan = "selected='selected'";
				}
				
				foreach($gol_darah AS $gda => $gdb)
				{
					if($sis->golongan_darah != $gda)
					{
						$o_gold .= "<option value='$gda'>$gdb</option>
						";
					}else{
						$o_gold .= "<option value='$gda' selected>$gdb</option>
						";
					}
				}
				
				
				foreach($stat_siswa AS $sta => $stb)
				{
					if($sis->status_siswa != $sta)
					{
						$st_siswa .= "<option value='$sta'>$stb</option>
						";
					}else{
						$st_siswa .= "<option value='$sta' selected>$stb</option>
						";
					}
				}
				
				$page_content2 = "
					<form method='post' action='$admin_url/siswa/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kelas
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='kelas'>
										$pil_kelas
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kependudukan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nik' placeholder='Masukan Nomor Kependudukan (KTP)' value='$sis->nik' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Induk Siswa
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nis' placeholder='Masukan NIS' value='$sis->nis' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Induk Siswa Nasional
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nisn' placeholder='Masukan NISN' value='$sis->nisn' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Lengkap
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_lengkap' placeholder='Nama Lengkap' value='$sis->nama_lengkap' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Panggilan
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_panggilan' placeholder='Nama Panggilan' value='$sis->nama_panggilan' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Password
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='password' placeholder='Password' />
									Kosongkan Bila tidak akan ganti password
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jenis Kelamin
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='jenis_kelamin'>
										<option value='1' $sis_laki>Laki-laki</option>
										<option value='0' $sis_perempuan>Perempuan</option>
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tempat Lahir
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tempat_lahir' placeholder='Tempat Lahir' value='$sis->tempat_lahir' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tanggal Lahir
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tanggal_lahir' placeholder='Tanggal Lahir' id='tanggal_lahir' value='$sis->tanggal_lahir' required />
									<div class='note'>Format: Tahun-bulan-hari (contoh: 1990-01-01)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Tanggal Diterima
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='tanggal_diterima' placeholder='Tanggal Diterima' id='tanggal_masuk' value='$sis->tanggal_diterima' required />
									<div class='note'>Format: Tahun-bulan-hari (contoh: 2018-07-01)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Alamat Rumah
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='alamat_rumah' placeholder='Alamat Rumah Asal' required>$sis->alamat_rumah</textarea>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Alamat Sekarang
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<textarea name='alamat_domisili' placeholder='Alamat Sekarang' required>$sis->alamat_domisili</textarea>
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
									Nomor Kontak
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='no_kontak' placeholder='Nomor Kontak' value='$sis->no_kontak' required />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nomor Kontak Lainnya
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='no_kontak2' placeholder='Nomor Kontak Lainnya' value='$sis->no_kontak2' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Foto Siswa
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='file' name='foto'  />
									<div class='note'>Kosongkan Bila tidak ada Foto</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Status siswa
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='status_siswa'>
										$st_siswa
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							
							
							<div class='linebrown'></div>
							<div class='blank'></div>
							<div class='large-12 medium-12 small-12 column' style='text-align:center'>
								<input type='hidden' name='old_foto' value='$sis->foto_siswa' />
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
		$kelas = $this->input->post('kelas');
		$nik = $this->input->post('nik');
		$nis = $this->input->post('nis');
		$nisn = $this->input->post('nisn');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nama_panggilan = $this->input->post('nama_panggilan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat_rumah = $this->input->post('alamat_rumah');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$golongan_darah = $this->input->post('golongan_darah');
		$tanggal_diterima = $this->input->post('tanggal_diterima');
		$no_kontak = $this->input->post('no_kontak');
		$no_kontak2 = $this->input->post('no_kontak2');
		$status_siswa = $this->input->post('status_siswa');
		$foto = "";
		$password = $this->input->post('password');
		
		$thn_masuk = $this->model_master->get_single_data('tahun_masuk','data_siswa','id_siswa',$hash_kd);
		$tahun_masuk = date("Y", strtotime($thn_masuk));
		$update_terakhir = date("Y-m-d H:i:s");
		
		$old_foto = $this->input->post('old_foto');
		$foto = $old_foto;
		
		$update = FALSE;
		$del_ofoto = FALSE;
		
		if(empty($tahun_masuk))
		{
			$tahun_masuk = "2018";
		}
		
		if(! is_dir("./media/siswa/$tahun_masuk/"))
		{
			mkdir('./media/siswa/'.$tahun_masuk, 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/siswa/'.$tahun_masuk.'/';
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
					$cfg['source_image'] = './media/siswa/'.$tahun_masuk.'/'.$foto;
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
			
			$data = array('kode_kelas' => $kelas, 'nik' => $nik, 'nis' => $nis, 'nisn' => $nisn, 'nama_lengkap' => $nama_lengkap, 'nama_panggilan' => $nama_panggilan, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'tanggal_diterima' => $tanggal_diterima, 'golongan_darah' => $golongan_darah,  'alamat_rumah' => $alamat_rumah,  'alamat_domisili' => $alamat_domisili,  'no_kontak' => $no_kontak,  'no_kontak2' => $no_kontak2,  'foto_siswa' => $foto,  'status_siswa' => $status_siswa, 'update_terakhir' => $update_terakhir);
			
			if(! empty($password))
			{
				$password = md5($password);
				
				$data = array('kode_kelas' => $kelas, 'nik' => $nik, 'nis' => $nis, 'nisn' => $nisn, 'password' => $password, 'nama_lengkap' => $nama_lengkap, 'nama_panggilan' => $nama_panggilan, 'jenis_kelamin' => $jenis_kelamin, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'tanggal_diterima' => $tanggal_diterima, 'golongan_darah' => $golongan_darah,  'alamat_rumah' => $alamat_rumah,  'alamat_domisili' => $alamat_domisili,  'no_kontak' => $no_kontak,  'no_kontak2' => $no_kontak2,  'foto_siswa' => $foto,  'status_siswa' => $status_siswa, 'update_terakhir' => $update_terakhir);;
			}
			
			$update = $this->model_master->update_siswa($data, $hash_kd);
			
			
			if($update)
			{
				if((! empty($old_foto)) && ($del_ofoto == TRUE))
				{
					unlink('./media/siswa/'.$tahun_masuk.'/'.$old_foto);
				}
				
				$page_content2 = "
					Berhasil melakukan update siswa.
					<br />
					<a href='$admin_url/siswa/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat dilaksanakan.";
		}
	;
	break;
	
	case "hapus":
		$id_siswa = $this->input->get('data');
		$foto = $this->model_master->get_single_data('foto_siswa','data_siswa', 'id_siswa', $id_siswa);
		$tahun_masuk = $this->model_master->get_single_data('tahun_masuk','data_siswa', 'id_siswa', $id_siswa);
		$hapus = FALSE; //$this->model_master->hapus_siswa($id_siswa);
		
		if($hapus)
		{
			if(file_exists('./media/siswa/'.$tahun_masuk.'/'.$foto))
			{
				unlink('./media/siswa/'.$tahun_masuk.'/'.$foto);
			}
			
			$page_content2 = "
				Berhasil menghapus data siswa <br />
				<a href='$admin_url/siswa'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus data <br />
				<a href='$admin_url/siswa'>Kembali</a>
			";
		}
	;
	break;
	
	case "sinkron":
		exit;
		$a=0;
		$u=0;
		
		$siswae = $this->model_master->get_sinkron_siswa();
		$update_terakhir = date("Y-m-d H:i:s");
		
		if($siswae !== FALSE)
		{
			foreach($siswae AS $sis)
			{
				$kode_kelas = "TKJ";
				$jk = 1;
				
				$cek_siswa = $this->model_master->cek_siswa($sis->nisn);
				$pass = md5($sis->nisn);
				$alamat = $sis->alamat." RT ".$sis->rt." RW ".$sis->rw." Desa ".$sis->desa_kelurahan." Kecamatan ".$sis->kecamatan." ".$sis->kode_pos;
				
				if($cek_siswa != FALSE)
				{
					$data = array('kode_kelas' => $kode_kelas,  'nis' => $sis->no_induk, 'nisn' => $sis->nisn, 'password' => $pass, 'nama_lengkap' => $sis->nama, 'nama_panggilan' => $sis->nama, 'jenis_kelamin' => $jk, 'tempat_lahir' => $sis->tempat_lahir, 'tanggal_lahir' => $sis->tanggal_lahir, 'agama' => $sis->agama, 'anak_ke' => $sis->anak_ke, 'alamat_rumah' => $alamat, 'alamat_domisili' => $alamat, 'update_terakhir' => $update_terakhir);
					$update = $this->model_master->update_siswa($data, $cek_siswa);
					
					$u++;
				}else{
					$data = array('id_siswa' => '', 'kode_kelas' => $kode_kelas,  'nis' => $sis->no_induk, 'nisn' => $sis->nisn, 'password' => $pass, 'nama_lengkap' => $sis->nama, 'nama_panggilan' => $sis->nama, 'jenis_kelamin' => $jk, 'tempat_lahir' => $sis->tempat_lahir, 'tanggal_lahir' => $sis->tanggal_lahir, 'agama' => $sis->agama, 'anak_ke' => $sis->anak_ke, 'tinggi_badan' => '', 'berat_badan' => '', 'tanggal_diterima' => '', 'tahun_masuk' => '', 'asal_sekolah' => '', 'golongan_darah' => '', 'alamat_rumah' => $alamat, 'alamat_domisili' => $alamat, 'no_kontak' => '', 'no_kontak2' => '', 'email' => '', 'nama_ayah' => '', 'nama_ibu' => '', 'pekerjaan_ayah' => '', 'pekerjaan_ibu' => '', 'penghasilan_ayah' => '', 'penghasilan_ibu' => '', 'kontak_ayah' => '', 'kontak_ibu' => '', 'wali_murid' => 'ayah', 'nama_wali' => '', 'pekerjaan_wali' => '', 'penghasilan_wali' => '', 'alamat_wali' => '', 'kontak_wali' => '', 'no_ujian_sltp' => '', 'no_skhun_sltp' => '', 'no_ijazah_sltp' => '', 'no_ujian_slta' => '', 'no_skhun_slta' => '', 'no_ijazah_slta' => '', 'foto_siswa' => '', 'status_siswa' => '', 'update_terakhir' => $update_terakhir);
					$insert = $this->model_master->set_siswa($data);
					
					$a++;
				}
				
			}
		}
		
		$page_content2 = "
				<b>$a</b> Data telah ditambahkan. <br />
				<b>$u</b> Data telah diperbaharui. <br />
				Proses Sinkronisasi telah selesai.
		";
	;
	break;
	
	case "reset_pass":
		$id_siswa = $this->input->get('ids');
		
		$siswa = $this->model_master->get_data_siswa($id_siswa);
		$update_terakhir = date("Y-m-d H:i:s");
		
		if($siswa !== FALSE)
		{
			foreach($siswa AS $sis)
			{
				$pass = md5($sis->nisn);
				
				$update = $this->model_master->update_siswa(array('password' => $pass, 'update_terakhir' => $update_terakhir), $sis->id_siswa);
			}
		}
		
		$page_content2 = "Passwod Telah Direset! <a href='$admin_url/siswa'>Kembali</a>.";
	;
	break;
	
	case "cari":
		$cari = $this->input->get('cari');
		$data_cari = "";
		$i=1;
		
		if(strlen($cari) > 2)
		{
			$cari_siswa = $this->model_master->cari_siswa($cari);
			
			if($cari_siswa !== FALSE)
			{
				$data_cari = "
					<div class='linebrown'></div>
					
					<table>
						<thead>
							<tr>
								<th><b>No.</b></th>
								<th><b>Nama</b></th>
								<th><b>NISN</b></th>
								<th><b>Kelas</b></th>
								<th><b>Aksi</b></th>
							</tr>
						</thead>
						<tbody>
				";
				
				// Cari Siswa
				foreach($cari_siswa AS $cs)
				{
					$nama_siswa = highlight_phrase($cs->nama_lengkap, $cari, '<span style="color:#990000;background:#eeffdd;font-size:16pt;">', '</span>');
					$nisn_siswa = highlight_phrase($cs->nisn, $cari, '<span style="color:#990000;background:#eeffdd;font-size:16pt;">', '</span>');;
					
					$data_cari .= "
						<tr>
							<td>$i</td>
							<td>$nama_siswa</td>
							<td>$nisn_siswa</td>
							<td>$cs->nama_kelas</td>
							<td>
								<a href='$admin_url/siswa/edit?data=$cs->id_siswa'>Edit</a> |
								<a href='$admin_url/siswa/reset_pass?ids=$cs->id_siswa'>Reset</a> |							
								<a href='$admin_url/siswa/hapus?data=$cs->id_siswa'>Hapus</a>
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
				<form method='get' action='$admin_url/siswa/cari'>
					<input type='text' name='cari' placeholder='Masukan Nama atau NISN' />
					<input type='submit' value='Cari' class='radius button' />
				</form>
				$data_cari
			</div><div class='linebrown'></div>
		";
	;
	break;
	
	default:
		$siswa = $this->model_master->get_siswa($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/siswa?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('id_siswa','data_siswa');
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
		
		$d_siswa = "Belum Ada Data";
		
		if($siswa !== FALSE)
		{
			$d_siswa = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Nama siswa</b></th>
						<th><b>NISN</b></th>
						<th><b>Kelas</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($siswa AS $sis)
			{
				$d_siswa .= "
					<tr>
						<td>$i</td>
						<td>$sis->nama_lengkap</td>
						<td>$sis->nisn</td>
						<td>$sis->nama_kelas</td>
						<td>
							<a href='$admin_url/siswa/edit?data=$sis->id_siswa'>Edit</a> |
							<a href='$admin_url/siswa/reset_pass?ids=$sis->id_siswa'>Reset</a> |							
							<a href='$admin_url/siswa/hapus?data=$sis->id_siswa'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_siswa .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/siswa/tambah'>Tambah Baru</a> |
			<a href='$admin_url/siswa/cari'>Cari Data</a> |			
			<a href='$admin_url/siswa/sinkron'>Sinkron Data</a>
			<br /><br />
			
			$d_siswa
			
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
