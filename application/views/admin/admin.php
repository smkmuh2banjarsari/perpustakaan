<?php

$this->encryption->initialize(array('cipher' => 'aes-256','mode' => 'ctr'));

$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url').'/room';
$logout_url = $this->config->item('admin_url').'/logout';
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');
$map_dir = "";
$tahun_sekarang = date("Y");

$sess_uid = '';
$level = '';
$uname = '';

if(isset ($_SESSION['uid']))
{
	$sess_uid = $_SESSION['uid'];
	$sess_uid = $this->encryption->decrypt($sess_uid);
}
if(isset ($_SESSION['level']))
{
	$level = $_SESSION['level'];
	$level = $this->encryption->decrypt($level);
}
if(isset ($_SESSION['uname']))
{
	$uname = $_SESSION['uname'];
}

if(empty($sess_uid) OR empty ($level) OR ($level != 1))
{
	redirect($logout_url, 'refresh');
	exit(0);
}

$awal = $this->input->get('awal');
$edit = $this->input->get('data');

$judul_situs = "adminstrasi";
$nama_situs = $this->model_master->get_config_data('nama_situs');

$map_dir = "";
$page_content = "";
$page_content2 = "";
$page_content3 = "";

$menu = $this->uri->segment(3);

switch($menu)
{
	case "konfigurasi":
		require_once APPPATH."views/admin/konfigurasi.php";
	;
	break;
	
	case "backup":
		require_once APPPATH."views/admin/backup.php";
	;
	break;
	
	case "user":
		require_once APPPATH."views/admin/data_user.php";
	;
	break;
	
	case "jabatan":
		require_once APPPATH."views/admin/data_jabatan.php";
	;
	break;
	
	case "karyawan":
		require_once APPPATH."views/admin/data_karyawan.php";
	;
	break;
	
	case "laman":
		require_once APPPATH."views/admin/laman.php";
	;
	break;
	
	case "kategori":
		require_once APPPATH."views/admin/data_kategori.php";
	;
	break;
	
	case "berita":
		require_once APPPATH."views/admin/berita.php";
	;
	break;
	
	case "jurusan":
		require_once APPPATH."views/admin/data_jurusan.php";
	;
	break;
	
	case "kelas":
		require_once APPPATH."views/admin/data_kelas.php";
	;
	break;
	
	case "siswa":
		require_once APPPATH."views/admin/data_siswa.php";
	;
	break;
	
	case "mapel":
		require_once APPPATH."views/admin/data_mapel.php";
	;
	break;
	
	case "jadwal_pelajaran":
		require_once APPPATH."views/admin/jadwal_pelajaran.php";
	;
	break;
	
	case "pendaftar":
		require_once APPPATH."views/admin/pendaftaran_pendaftar.php";
	;
	break;
	
	case "pendaftar_online":
		require_once APPPATH."views/admin/pendaftaran_online.php";
	;
	break;
	
	case "muh_tokoh":
		require_once APPPATH."views/admin/dir_tokoh.php";
	;
	break;
	
	case "muh_sejarah":
		require_once APPPATH."views/admin/dir_sejarah.php";
	;
	break;
	
	case "album":
		require_once APPPATH."views/admin/galeri_album.php";
	;
	break;
	
	case "foto":
		require_once APPPATH."views/admin/galeri_foto.php";
	;
	break;
	
	case "ujian_data":
		require_once APPPATH."views/admin/ujian_data.php";
	;
	break;
	
	case "peserta_ujian":
		require_once APPPATH."views/admin/ujian_peserta.php";
	;
	break;
	
	case "kategori_soal":
		require_once APPPATH."views/admin/ujian_kategori.php";
	;
	break;
	
	case "soal_ujian":
		require_once APPPATH."views/admin/ujian_soal.php";
	;
	break;
	
	default:
		$judul_situs = "Admin";
		$last_backup = strtotime($this->model_master->get_single_data('data_config','db_config','id_config','backup_terakhir'));
		$today = strtotime(date("Y-m-d"));
		$backup_msg = "";
		
		if(($today - $last_backup) > 262200)
		{
			$backup_msg = "Sudah lebih dari 3 hari anda belum melakukan Backup Database. 
				<br />
				Segera lakukan backup untuk mengantisipasi hal-hal yang tidak diiingikan. <br />
				Ke <a href='$admin_url/admin/backup'>Laman Backup</a>.
			";
		}
		
		$page_content = "
			Hai <b>$uname</b> Selamat Datang di halaman Administrasi
			<br /><br />
			$backup_msg
			";
	;
	break;
}

$page_content = $page_content2;

require_once APPPATH."views/admin/admin_parse.php";

/* End of file admin.php */
/* Location: ./application/views/admin/admin.php */
