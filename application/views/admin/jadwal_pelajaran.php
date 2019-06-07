<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url/admin'>Admin</a> &gt; <a href='$admin_url/jadwal_pelajaran'>Jadwal</a>";
$judul_situs = "Jadwal Pelajaran";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

$pengajar = $this->model_master->get_pengajar();
$kelas = $this->model_master->get_kelas_aktif();
$mapel = $this->model_master->get_mapel();

$hari = array(1=>"Senin",2=>"Selasa",3=>"Rabu",4=>"Kamis",5=>"Jumat",6=>"Sabtu",7=>"Minggu");

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Jadwal";
		$map_dir .= " &gt; Tambah Jadwal";
		
		$pil_hari = "";
		$pil_pengajar = "";
		$pil_kelas = "";
		$pil_mapel = "";
		
		if($hari != FALSE)
		{
			foreach($hari AS $hra=>$hrb)
			{
				$pil_hari .= "<option value='$hra'>$hrb</option>";
			}
		}
		
		if($pengajar != FALSE)
		{
			foreach($pengajar AS $guru)
			{
				$pil_pengajar .= "<option value='$guru->id_karyawan'>$guru->nama_panggilan</option>";
			}
		}
		
		if($kelas != FALSE)
		{
			foreach($kelas AS $kls)
			{
				$pil_kelas .= "<option value='$kls->kode_kelas'>$kls->nama_kelas</option>";
			}
		}
		
		if($mapel != FALSE)
		{
			foreach($mapel AS $mpl)
			{
				$pil_mapel .= "<option value='$mpl->kode_mapel'>$mpl->nama_mapel</option>";
			}
		}
		
		$page_content2 = "
				<form method='post' action='$admin_url/jadwal_pelajaran/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pilih Hari
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='hari'>
									$pil_hari
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Pengajar
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='pengajar'>
									$pil_pengajar
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
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
								Mata Pelajaran
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<select name='mapel'>
									$pil_mapel
								</select>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jam Mulai
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='time' name='jam_mulai' placeholder='Jam Mulai' class='pilih_jam' />
								<div class='note'>Format Jam:Menit, contoh <b>07:00</b></div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Jam Selesai
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='time' name='jam_selesai' class='pilih_jam' placeholder='Jam Selesai' />
								<div class='note'>Format Jam:Menit, contoh <b>09:20</b></div>
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
		
		$hari = $this->input->post('hari');
		$pengajar = $this->input->post('pengajar');
		$kelas = $this->input->post('kelas');
		$mapel = $this->input->post('mapel');
		$jam_mulai = $this->input->post('jam_mulai').':01';
		$jam_selesai = $this->input->post('jam_selesai').':00';
		
		if(! empty($jam_mulai) && ! empty($jam_selesai))
		{
			// cek jam mulai dan jam selesai
			if($jam_mulai < $jam_selesai)
			{
				$cek_jadwal = $this->model_master->cek_jadwal_pelajaran($kelas, $hari, $jam_mulai, $jam_selesai);
				
				if($cek_jadwal)
				{
					$insert = $this->model_master->set_jadwal_pelajaran(array('id_jadwal' => '', 'id_karyawan' => $pengajar, 'kode_kelas' => $kelas, 'kode_mapel' => $mapel, 'hari' => $hari, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai));
					
					if($insert)
					{
						$page_content2 = "
							Berhasil membuat Jadwal Baru.
							<br />
							<a href='$admin_url/jadwal_pelajaran'>Lihat</a>
						";
					}else{
						$page_content2 = "
							Gagal menambah jadwal.
							<br />
							<a href='$admin_url/jadwal_pelajaran/tambah'>&lt; Kembali</a>
						";
					}
				}else{
					$page_content2 = "
							Kelas sudah memiliki Jadwal pada hari dan jam tersebut. 
							<br />
							<a href='$admin_url/jadwal_pelajaran/tambah'>&lt; Kembali</a>
						";
				}
			}else{
				$page_content2 = "
					Jam Selesai tidak boleh lebih rendah dari jam Mulai. 
					<br />
					<a href='$admin_url/jadwal_pelajaran/tambah'>&lt; Kembali</a>
				";
			}
			
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
		
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit jadwal_pelajaran";
		$jadwal_pelajaran = $this->model_master->get_data_jadwal_pelajaran($edit);
		
		if($jadwal_pelajaran !== FALSE)
		{
			foreach($jadwal_pelajaran AS $jdw)
			{
				$hash_kd = $this->encryption->encrypt($jdw->id_jadwal);
				$pil_hari = "";
				$pil_pengajar = "";
				$pil_kelas = "";
				$pil_mapel = "";
				
				if($hari != FALSE)
				{
					foreach($hari AS $hra=>$hrb)
					{
						if($jdw->hari != $hra)
						{
							$pil_hari .= "<option value='$hra'>$hrb</option>
							";
						}else{
							$pil_hari .= "<option value='$hra' selected>$hrb</option>
							";
						}
						
					}
				}
				
				if($pengajar != FALSE)
				{
					foreach($pengajar AS $guru)
					{
						if($jdw->id_karyawan != $guru->id_karyawan)
						{
							$pil_pengajar .= "<option value='$guru->id_karyawan'>$guru->nama_panggilan</option>
							";
						}else{
							$pil_pengajar .= "<option value='$guru->id_karyawan' selected>$guru->nama_panggilan</option>
							";
						}
						
					}
				}
				
				if($kelas != FALSE)
				{
					foreach($kelas AS $kls)
					{
						if($jdw->kode_kelas != $kls->kode_kelas)
						{
							$pil_kelas .= "<option value='$kls->kode_kelas'>$kls->nama_kelas</option>
							";
						}else{
							$pil_kelas .= "<option value='$kls->kode_kelas' selected>$kls->nama_kelas</option>
							";
						}
						
					}
				}
				
				if($mapel != FALSE)
				{
					foreach($mapel AS $mpl)
					{
						if($jdw->kode_mapel != $mpl->kode_mapel)
						{
							$pil_mapel .= "<option value='$mpl->kode_mapel'>$mpl->nama_mapel</option>
							";
						}else{
							$pil_mapel .= "<option value='$mpl->kode_mapel' selected>$mpl->nama_mapel</option>
							";
						}
						
					}
				}
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/jadwal_pelajaran/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Pilih Hari
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='hari'>
										$pil_hari
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Pengajar
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='pengajar'>
										$pil_pengajar
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
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
									Mata Pelajaran
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<select name='mapel'>
										$pil_mapel
									</select>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jam Mulai
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='time' name='jam_mulai' class='pilih_jam' placeholder='Jam Mulai' value='$jdw->jam_mulai' />
									<div class='note'>Format Jam:Menit, contoh <b>07:00</b></div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Jam Selesai
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='time' name='jam_selesai' class='pilih_jam' placeholder='Jam Selesai' value='$jdw->jam_selesai' />
									<div class='note'>Format Jam:Menit, contoh <b>09:20</b></div>
								</div>
							</div>
							<div class='linebrown'></div>
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
		$hari = $this->input->post('hari');
		$pengajar = $this->input->post('pengajar');
		$kelas = $this->input->post('kelas');
		$mapel = $this->input->post('mapel');
		$jam_mulai = $this->input->post('jam_mulai').':01';
		$jam_selesai = $this->input->post('jam_selesai').':00';
		
		$update = FALSE;
		
		
		if(! empty($hash_kd) && ! empty($jam_mulai) && ! empty($jam_selesai))
		{
			$data = array('id_karyawan' => $pengajar, 'kode_kelas' => $kelas, 'kode_mapel' => $mapel, 'hari' => $hari, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai);
			
			$update = $this->model_master->update_jadwal_pelajaran($data, $hash_kd);
			
			if($update)
			{
				
				$page_content2 = "
					Berhasil melakukan update Jadwal Pelajaran.
					<br />
					<a href='$admin_url/jadwal_pelajaran/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}else{
				$page_content2 = "
					Berhasil melakukan update Jadwal Pelajaran.
					<br />
					<a href='$admin_url/jadwal_pelajaran/edit?data=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_jadwal = $this->input->get('data');
		// Untuk keamanan, fungsi dinonaktifkan
		$hapus = FALSE; //$this->model_master->hapus_jadwal_pelajaran($id_jadwal);
		
		if($hapus)
		{
			
			$page_content2 = "
				Berhasil menghapus Jadwal <br />
				<a href='$admin_url/jadwal_pelajaran'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus Jadwal <br />
				<a href='$admin_url/jadwal_pelajaran'>Kembali</a>
			";
		}
	;
	break;
	
	default:
		$jadwal_pelajaran = $this->model_master->get_jadwal_pelajaran($awal);
		$i=$awal+1;
		
		$d_jadwal = "Belum Ada Data";
		
		if($jadwal_pelajaran !== FALSE)
		{
			$d_jadwal = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Hari</b></th>
						<th><b>Kelas</b></th>
						<th><b>Pelajaran</b></th>
						<th><b>Pengajar</b></th>
						<th><b>Jam</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($jadwal_pelajaran AS $jdw)
			{
				//$wal = $this->model_master->get_single_data('nama_panggilan','data_karyawan','id_karyawan', $kls->wali_kelas);
				$hri = $hari[$jdw->hari];
				
				$d_jadwal .= "
					<tr>
						<td>$i</td>
						<td>$hri</td>
						<td>$jdw->nama_kelas</td>
						<td>$jdw->nama_mapel</td>
						<td>$jdw->nama_panggilan</td>
						<td>$jdw->jam_mulai - $jdw->jam_selesai</td>
						<td>
							<a href='$admin_url/jadwal_pelajaran/edit?data=$jdw->id_jadwal'>Edit</a> | 
							<a href='$admin_url/jadwal_pelajaran/hapus?data=$jdw->id_jadwal'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_jadwal .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/jadwal_pelajaran/tambah'>Tambah Jadwal</a>
			<br /><br />
			
			$d_jadwal
			
			<div class='linebrown'></div>
		";
	;
	break;
}
