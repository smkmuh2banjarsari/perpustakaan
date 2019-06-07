<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/peserta_ujian'>Peserta</a>";
$judul_situs = "Peserta Ujian";
$page_content2 = "Data Tidak Tersedia";

$menu = $this->uri->segment(4);

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah Kategori";
		$map_dir .= " &gt; Tambah Kategori";
		
		$page_content2 = "
				<form method='post' action='$admin_url/peserta_ujian/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Kode Kategori
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='kode_kategori' placeholder='Masukan Kode Kategori' />
								<div class='note'>Masukan Kode Kategori. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Kategori
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_kategori' placeholder='Masukan Nama Kategori' />
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
		
		$kode_kategori = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_kategori')));
		$nama_kategori = $this->input->post('nama_kategori');
		
		$cek_kode = FALSE;
		
		if(! empty($kode_kategori) && ! empty($nama_kategori))
		{
			$cek_kode = $this->model_master->cek_kode_kategori($kode_kategori);
			
			if(! $cek_kode)
			{
				$insert = $this->model_master->set_kategori(array('kode_kategori' => $kode_kategori, 'nama_kategori' => $nama_kategori, 'status_kategori' => 1));
				
				$page_content2 = "
					Berhasil membuat Kategori Baru.
					<br />
					<a href='$admin_url/peserta_ujian'>Lihat</a>
				";
			}else{
				$cek_lagi = $this->model_master->cek_kode_kategori_aktif($kode_kategori);
				
				if($cek_lagi)
				{
					$insert = $this->model_master->update_kategori(array('nama_kategori' => $nama_kategori, 'status_kategori' => 1), $kode_kategori);
				
					$page_content2 = "
						Berhasil membuat Kategori Baru.
						<br />
						<a href='$admin_url/peserta_ujian'>Lihat</a>
					";
				}else{
				$page_content2 = "
					Kode kategori <b>$kode_kategori</b> Telah Digunakan. Silahkan Gunakan Kode lain.
					<br />
					<a href='$admin_url/peserta_ujian/tambah'>&lt; Kembali</a>
				";
				}
			}
		}else{
			$page_content2 = "Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit Kategori";
		$kategori = $this->model_master->get_data_kategori($edit);
		
		if($kategori !== FALSE)
		{
			foreach($kategori AS $kat)
			{
				$hash_kd = $this->encryption->encrypt($kat->kode_kategori);
				
				
				$page_content2 = "
					<form method='post' action='$admin_url/peserta_ujian/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Kode Kategori
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='kode_kategori' placeholder='Masukan Kode Kategori' value='$kat->kode_kategori' />
									<div class='note'>Masukan Kode Kategori. Kode harus kecil semua, dapat berisi alpabet dan angka serta tidak menggunakan spasi namun anda dapat menggunakan underscore (_)</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Kategori
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_kategori' placeholder='Masukan Nama Kategori' value='$kat->nama_kategori' />
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
		$kode_kategori = strtolower(preg_replace("/[^\w-]/", '', $this->input->post('kode_kategori')));
		$nama_kategori = $this->input->post('nama_kategori');
		
		$update = FALSE;
		
		if(! empty($hash_kd) && ! empty($kode_kategori) && ! empty($nama_kategori))
		{
			if($hash_kd != $kode_kategori)
			{
				$cek_kode = $this->model_master->cek_kode_kategori($kode_kategori); 
			}else{
				$cek_kode = FALSE;
			}
			
			if(! $cek_kode)
			{
				$data = array('kode_kategori' => $kode_kategori, 'nama_kategori' => $nama_kategori);
				
				$update = $this->model_master->update_kategori($data, $hash_kd);
			}else{
				$page_content2 = "
					Tidak dapat mengubah kode kategori menjadi <b>$kode_kategori</b> karena telah Digunakan. 
					Silahkan Gunakan Kode lain atau tidak perlu mengubah kode laman saat pengeditan.
					<br />
					<a href='$admin_url/peserta_ujian/edit?data=$hash_kd'>&lt; Kembali</a>
				";
			}
			
			if($update)
			{
				$page_content2 = "
					Berhasil melakukan update Kategori.
					<br />
					<a href='$admin_url/peserta_ujian/edit?data=$kode_kategori'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_sesi = $this->input->get('data');
		
		// Untuk keamanan data, fungsi hapus diubah menjadi update status kategori
		$hapus = $this->model_master->hapus_peserta($id_sesi);
		$hapus2 = $this->model_master->hapus_jawaban_pst($id_sesi);
		
		if($hapus)
		{
			$page_content2 = "
				Berhasil menghapus Peserta <br />
				<a href='$admin_url/peserta_ujian'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus Data <br />
				<a href='$admin_url/peserta_ujian'>Kembali</a>
			";
		}
	;
	break;
	
	case "reset":
		$id_sesi = $this->input->get('data');
		$all = $this->input->get('r');
		$sekarang = date("Y-m-d H:i:s");
		$update_terakhir = date("Y-m-d H:i:s");
		
		if(! empty($id_sesi))
		{
			$sisa_waktu = $this->model_master->get_single_data('sisa_waktu','ujian_peserta','id_sesi', $id_sesi);
			if($sisa_waktu < 30)
			{
				$sisa_waktu = 1000;
			}
			
			$skrg = strtotime($sekarang);
			$selesai = $skrg+$sisa_waktu;
			$jam_selesai = date("Y-m-d H:i:s", $selesai);
			$update = $this->model_master->update_peserta_ujian(array('jam_mulai' => $sekarang, 'jam_selesai' => $jam_selesai, 'update_terakhir' => $update_terakhir), $id_sesi);
		}
		
		if($all == "all")
		{
			$belum_selesai = $this->model_master->get_belum_selesai();
			
			if($belum_selesai != FALSE)
			{
				foreach($belum_selesai AS $bls)
				{
					$sisa_waktu = $bls->sisa_waktu;
					$skrg = strtotime($sekarang);
					$selesai = $skrg+$sisa_waktu;
					$jam_selesai = date("Y-m-d H:i:s", $selesai);
					$update = $this->model_master->update_peserta_ujian(array('jam_mulai' => $sekarang, 'jam_selesai' => $jam_selesai, 'update_terakhir' => $update_terakhir), $bls->id_sesi);
				}
			}
		}
		
		$page_content2 = "
				Reset telah dilakukan. <br />
				<a href='$admin_url/peserta_ujian'>Kembali</a>
			";
	;
	break;
	
	case "recheck":
		$id_ujian = $this->input->get('data');
		$link_back = "";
		$sekarang = date("Y-m-d H:i:s");
		
		$peserta_ujian = $this->model_master->get_peserta_ujian_semua($id_ujian);
		
		if($peserta_ujian != FALSE)
		{
			$jumlah_soal = $this->model_master->get_single_data('jumlah_soal','ujian_data', 'id_ujian', $id_ujian);
			
			foreach($peserta_ujian AS $pst)
			{
				$jawaban_siswa =  $this->model_master->get_jawaban_sesi($pst->id_sesi);
				$jawaban_benar = 0;
				$skor_akhir = 0;
				
				if($jawaban_siswa !== FALSE)
				{
					foreach($jawaban_siswa AS $jws)
					{
						$cek_jawaban = $this->model_master->get_jawaban_benar($jws->id_soal, $jws->jawaban_siswa);
						
						if($cek_jawaban !== FALSE)
						{
							$jawaban_benar += 1;
						}
					}
				}
				
				$skor_akhir = round(($jawaban_benar/$jumlah_soal*100), 0);
				
				$update_peserta = $this->model_master->update_peserta_ujian(array('update_terakhir' => $sekarang, 'jawaban_benar' => $jawaban_benar, 'skor_akhir' => $skor_akhir, 'selesai' => 1), $pst->id_sesi);
			}
			
			$link_back = "ujian?data=$id_ujian";
		}
		
		$page_content2 = "
			Semua Data telah diperiksa Ulang. 
			<a href='$admin_url/peserta_ujian/$link_back'>Kembali</a>
		";
	;
	break;
	
	case "unblock":
		
		$unblock = $this->model_master->unblock_peserta_ujian();
		
		$page_content2 = "
			Semua Data telah di <b>Unblock</b>. 
			<a href='$admin_url/peserta_ujian/'>Kembali</a>
		";
	;
	break;
	
	case "ujian":
		
		$id_ujian = $this->input->get('data');
		$peserta = $this->model_master->get_peserta_ujian2($id_ujian, $awal);
		$i = $awal+1;
		
		$jumlah_data = $this->model_master->hitung_data_sendiri('id_sesi','ujian_peserta', 'id_ujian', $id_ujian);
		
		$config['base_url'] = $admin_url.'/peserta_ujian/ujian?data='.$id_ujian;
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
		
		$d_peserta = "Belum Ada Data";
		
		if($peserta !== FALSE)
		{
			$d_peserta = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Peserta</b></th>
						<th><b>Ujian</b></th>
						<th><b>Status</b></th>
						<th><b>S.Waktu</b></th>
						<th><b>Skor</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($peserta AS $pst)
			{
				$nama_siswa = $this->model_master->get_single_data('nama_panggilan','data_siswa','id_siswa',$pst->id_siswa);
				$nama_ujian = $this->model_master->get_single_data('nama_ujian','ujian_data','id_ujian',$pst->id_ujian);
				$stat_ujian = "Selesai";
				if($pst->selesai == 0)
				{
					$stat_ujian = "Mengerjakan";
				}
				
				$d_peserta .= "
					<tr>
						<td>$i</td>
						<td>$nama_siswa</td>
						<td>$nama_ujian</td>
						<td>$stat_ujian</td>
						<td>$pst->sisa_waktu</td>
						<td>$pst->skor_akhir</td>
						<td>
							<a href='$admin_url/peserta_ujian/reset?data=$pst->id_sesi'>Reset</a> | 
							<a href='$admin_url/peserta_ujian/hapus?data=$pst->id_sesi'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_peserta .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/peserta_ujian/semua'>Semua Ujian</a> | 
			<a href='$admin_url/peserta_ujian/reset?r=all'>Reset Login</a> | 
			<a href='$admin_url/peserta_ujian/recheck?data=$id_ujian'>Periksa Ulang</a> | 
			<a href='$admin_url/ujian_data/download?data=$id_ujian&tipe=xls'>Download</a> 
			<br /><br />
			
			$d_peserta
			
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
		$peserta = $this->model_master->get_peserta_ujian($awal);
		$i = $awal+1;
		
		$jumlah_data = $this->model_master->hitung_data('id_sesi','ujian_peserta');
		
		$config['base_url'] = $admin_url.'/peserta_ujian/lihat?a=s';
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
		
		$d_peserta = "Belum Ada Data";
		
		if($peserta !== FALSE)
		{
			$d_peserta = "
				<table>
					<thead>
						<tr>
							<th><b>No.</b></th>
							<th><b>Peserta</b></th>
							<th><b>Ujian</b></th>
							<th><b>Status</b></th>
							<th><b>Blokir (Jumlah)</b></th>
							<th><b>Skor</b></th>
							<th><b>Aksi</b></th>
						</tr>
					</thead>
					<tbody>
			";
			
			foreach($peserta AS $pst)
			{
				$nama_siswa = $this->model_master->get_single_data('nama_panggilan','data_siswa','id_siswa',$pst->id_siswa);
				$nama_ujian = $this->model_master->get_single_data('nama_ujian','ujian_data','id_ujian',$pst->id_ujian);
				$stat_ujian = "Selesai";
				$blok = "Tidak";
				if($pst->selesai == 0)
				{
					$stat_ujian = "Mengerjakan";
				}
				if($pst->blokir == 1)
				{
					$blok = "Ya";
				}
				
				$d_peserta .= "
					<tr>
						<td>$i</td>
						<td>$nama_siswa</td>
						<td>$nama_ujian</td>
						<td>$stat_ujian</td>
						<td>$blok ($pst->jumlah_diblokir)</td>
						<td>$pst->skor_akhir</td>
						<td>
							<!--<a href='$admin_url/peserta_ujian/edit?data=$pst->id_sesi'>Edit</a> | -->
							<a href='$admin_url/peserta_ujian/ujian?data=$pst->id_ujian'>lihat</a> |
							<a href='$admin_url/peserta_ujian/reset?data=$pst->id_sesi'>Reset</a> | 
							<a href='$admin_url/peserta_ujian/hapus?data=$pst->id_sesi'>Hapus</a>
						</td>
					</tr>
				";
				
				$i++;
			}
			
			$d_peserta .= "
					</tbody>
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/peserta_ujian/reset?r=all'>Reset Login</a> | <a href='$admin_url/peserta_ujian/unblock?r=all'>Unblock Semua</a> 
			<br /><br />
			
			$d_peserta
			
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
