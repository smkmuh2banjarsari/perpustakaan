<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$map_dir = "<a href='$admin_url'>Admin</a> &gt; <a href='$admin_url/user'>User</a>";

$menu = $this->uri->segment(4);
$judul_situs = "User";
$page_content2 = "Data Tidak Tersedia";

$id_user = $this->input->get('id_user');

switch($menu)
{
	case "tambah":
		$judul_situs = "Tambah User";
		$map_dir .= " &gt; User Baru";
		
		$page_content2 = "
				<form method='post' action='$admin_url/user/simpan' enctype='multipart/form-data'>
					
					<div class='large-12 medium-12 small-12 column'>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Username
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='username' placeholder='Masukan Username' />
								<div class='note'>Masukan Username yang akan digunakan untuk login. Untuk mempermudah, username dapat berisi Alpabet dan Angka serta tidak menggunakan spasi namun gunakan underscore (_)</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Password
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='password' name='password' placeholder='Masukan Password' />
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Password (Konfirmasi)
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='password' name='password2' placeholder='Masukan Password' />
								<div class='note'>Sebagai konfirmasi masukan kembali password</div>
							</div>
						</div>
						<div class='linebrown'></div>
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-4 medium-4 small-12 column'>
								Nama Pengguna
							</div>
							<div class='large-8 medium-8 small-12 column'>
								<input type='text' name='nama_user' placeholder='Masukan Nama Pengguna' />
								<div class='note'>Nama yang akan tampil</div>
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
		
		$username = (preg_replace("/[^\w-]/", '', $this->input->post('username')));
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$nama_user = $this->input->post('nama_user');
		
		$cek_user = FALSE;
		$cek_pass = FALSE;
		
		$page_content2 = "";
		
		if($password == $password2)
		{
			$cek_pass = TRUE;
		}else{
			$page_content2 = "Kedua Password Tidak Sesuai! <a href='$admin_url/user/tambah'>Ulang</a>";
		}
		
		/*
		if(! is_dir("./media/user/"))
		{
			mkdir('./media/user', 0777, true);
		}
		
		// Inisialisasi upload
		$config['upload_path'] = './media/user/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= 4000;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['file_ext_tolower'] = TRUE;
		$config['width']         = 800;
		$config['height']       = 600;
		$config['max_filename'] = 240;
		
		$this->upload->initialize($config);*/
		
		if(! empty($username) && ! empty($password) && ! empty($nama_user) && ($cek_pass == TRUE))
		{
			$cek_user = $this->model_master->cek_username($username);
			
			if(! $cek_user)
			{
				/*
				if( ! empty($_FILES['gambar']['name']))
				{
					if ($this->upload->do_upload('gambar'))
					{
						$udata = $this->upload->data();
						$gambar_user= $udata['file_name'];
						
						// resize gambar
						$cfg['source_image'] = './media/user/'.$gambar_user;
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
				*/
				
				$insert = $this->model_master->set_user(array('id_user' => '', 'username' => $username, 'password' => md5($password), 'nama_user' => $nama_user, 'level_user' => 1));
				
				$page_content2 = "
					Berhasil Menambah User Baru.
					<br />
					<a href='$admin_url/user'>Kembali</a>
				";
			}else{
				$page_content2 = "
					Username <b>$username</b> Telah Digunakan. Silahkan Gunakan Username lain.
					<br />
					<a href='$admin_url/user/tambah'>&lt; Kembali</a>
				";
			}
		}else{
			$page_content2 .= "<br />Permintaan Tidak dapat Diselesaikan!";
		}
	;
	break;
	
	case "edit";
		$map_dir .= " &gt; Edit User";
		$users = $this->model_master->get_data_user($id_user);
		
		if($users !== FALSE)
		{
			foreach($users AS $usr)
			{
				$hash_kd = $this->encryption->encrypt($usr->id_user);
				
				$page_content2 = "
					<form method='post' action='$admin_url/user/update' enctype='multipart/form-data'>
						<input type='hidden' name='hash_kd' value='$hash_kd' />
						<div class='large-12 medium-12 small-12 column'>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Username
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<b>$usr->username</b> (Username Tidak Dapat Diubah)
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Password
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='password' name='password' placeholder='Masukan Password' />
									<div class='note'>Kosongkan bila tidak akan diubah.</div>
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Password (Konfirmasi)
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='password' name='password2' placeholder='Masukan Password Konfirmasi' />
								</div>
							</div>
							<div class='linebrown'></div>
							<div class='large-12 medium-12 small-12 column'>
								<div class='large-4 medium-4 small-12 column'>
									Nama Pengguna
								</div>
								<div class='large-8 medium-8 small-12 column'>
									<input type='text' name='nama_user' placeholder='Masukan Nama Pengguna' value='$usr->nama_user' />
									<div class='note'>Nama yang akan tampil</div>
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
		
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$nama_user = $this->input->post('nama_user');
		
		$update = FALSE;
		$del_ogambar = FALSE;
		/*
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
		
		$this->upload->initialize($config);*/
		
		if(! empty($hash_kd) && ! empty($nama_user))
		{
			/*
			if( ! empty($_FILES['gambar']['name']))
			{
				if ($this->upload->do_upload('gambar'))
				{
					$udata = $this->upload->data();
					$gambar_user = $udata['file_name'];
					$del_ogambar = TRUE;
					
					// resize gambar
					$cfg['source_image'] = './media/user/'.$gambar_user;
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
			}*/
			
			if(! empty($password) && ($password2))
			{
				if($password != $password2)
				{
					$page_content2 = "Kedua Password Tidak Sama!";
				}else{
					$data = array('nama_user' => $nama_user, 'password' => md5($password));
					$update = $this->model_master->update_user($data, $hash_kd);
				}
			}else{
				$data = array('nama_user' => $nama_user);
				$update = $this->model_master->update_user($data, $hash_kd);
			}
			
			if($update)
			{
				/*
				if((! empty($old_gambar)) && ($del_ogambar == TRUE))
				{
					unlink('./media/user/'.$old_gambar);
				}*/
				
				$page_content2 = "
					Berhasil melakukan update User.
					<br />
					<a href='$admin_url/user/edit?id_user=$hash_kd'>&lt;&lt; Lihat</a>
				";
			}
		}
	;
	break;
	
	case "hapus":
		$id_user = $this->input->get('data');
		//$gambar_l = $this->model_master->get_single_data('gambar_laman','data_laman', 'kode_laman', $id_laman);
		$hapus = FALSE;
		
		if($id_user != 1)
		{
			$hapus = $this->model_master->hapus_user($id_user);
		}
		
		if($hapus)
		{
			/*
			if(file_exists('./media/laman/'.$gambar_l))
			{
				unlink('./media/laman/'.$gambar_l);
			}*/
			
			$page_content2 = "
				Berhasil menghapus User <br />
				<a href='$admin_url/user'>Kembali</a>
			";
		}else{
			$page_content2 = "
				Gagal menghapus User <br />
				<a href='$admin_url/user'>Kembali</a>
			";
		}
	;
	break;
	
	default:
		$user = $this->model_master->get_user($awal);
		$i=$awal+1;
		
		$config['base_url'] = $admin_url.'/user?a=b';
		$config['total_rows'] = $this->model_master->hitung_data('id_user','db_user');
		$config['per_page'] = 20; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'awal';
		$config['num_links'] = 5;
		$config['first_link'] = '&lt;&lt;Awal';
		$config['last_link'] = 'Terakhir&gt;&gt;';
		
		$this->pagination->initialize($config); 
		$halaman = $this->pagination->create_links();
		
		$d_user = "Belum Ada Data";
		
		if($user !== FALSE)
		{
			$d_user = "
				<table>
					<tr>
						<th><b>No.</b></th>
						<th><b>Kode Laman</b></th>
						<th><b>Nama Laman</b></th>
						<th><b>Aksi</b></th>
					</tr>
			";
			
			foreach($user AS $usr)
			{
				$d_user .= "
					<tr>
						<th>$i</th>
						<th>$usr->username</th>
						<th>$usr->nama_user</th>
						<th>
							<a href='$admin_url/user/edit?id_user=$usr->id_user'>Edit</a> | 
							<a href='$admin_url/user/hapus?data=$usr->id_user'>Hapus</a>
						</th>
					</tr>
				";
				
				$i++;
			}
			
			$d_user .= "
				</table>
			";
		}
		
		$page_content2 = "
			<a href='$admin_url/user/tambah'>Tambah User</a>
			<br /><br />
			
			$d_user
			
			<div class='large-12 medium-12 small-12 column pagination-centered'>
				<ul class='pagination'>
					$halaman
				</ul>
			</div>
		";
	;
	break;
}
