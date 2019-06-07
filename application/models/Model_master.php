<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends CI_Model {
	private $dbe = NULL;
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	// ========================================= Global
	
	function hitung_data($field,$table)
	{
		$this->db->select($field);
		$hitung = $this->db->get($table);
		
		return $hitung->num_rows();
	}
	
	function get_single_data($select, $table, $fid, $id)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($fid, $id);
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			foreach($data->result() AS $hasil)
			{
				return $hasil->$select;
			}
		}
		
		return FALSE;
	}
	
	function hitung_data_sendiri($select, $table, $fid, $id)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($fid, $id);
		$data = $this->db->get();
		
		return $data->num_rows();
	}
	
	function hitung_data_dua($select, $table, $fid, $id, $fid2, $id2)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($fid, $id);
		$this->db->where($fid2, $id2);
		
		$data = $this->db->get();
		
		return $data->num_rows();
	}
	
	function get_login($data)
	{
		$this->db->select('*');
		$login = $this->db->get_where('db_user', $data);
		
		if($login->num_rows() > 0)
		{
			return $login->result();
		}
		
		return FALSE;
	}
	
	function get_config()
	{
		$this->db->where('edit_config', 1);
    	$this->db->order_by('level_config', 'asc');
		$this->db->order_by('id_config', 'asc');
		
		$data = $this->db->get('db_config');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		return FALSE;
    }
	
	function get_data_config($id_config=0)
    {
    	$this->db->where('id_config', $id_config);
		$this->db->where('edit_config', 1);
		
		$data = $this->db->get('db_config');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		return FALSE;
    }
	
	function get_config_data($id_config=0)
    {
		// cache non aktif karena semua data menjadi ter-cache
		//$this->db->cache_on();
    	$this->db->where('id_config', $id_config);
		
		$data = $this->db->get('db_config');
		if($data->num_rows() > 0)
		{
			foreach($data->result() AS $rst)
			{
				return $rst->data_config;
			}
		}
		return FALSE;
    }
	
	function update_config($data, $id_config)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_config', $id_config);
		$this->db->update('db_config', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_config($id_config=0)
	{
		$this->db->where('id_config', $id_config);
		$this->db->where('hapus_config', 1);
		
		$this->db->delete('db_config');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function set_log($data)
	{
		$log = $this->db->insert('db_log_user', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function set_backup($data)
    {
		$this->db->insert('data_backup',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function get_backup($awal=0)
    {
    	$this->db->order_by('id_backup', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('data_backup');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_backup($id_backup=0)
    {
    	$this->db->where('id_backup', $id_backup);
		
		$data = $this->db->get('data_backup');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function hapus_backup($id_backup=0)
	{
		$this->db->where('id_backup', $id_backup);
		
		$this->db->delete('data_backup');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	// ======================= Insert 
	// -------------------------------
	
	function set_berita($data)
    {
		$this->db->insert('data_berita',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_jabatan($data)
    {
		$this->db->insert('data_jabatan',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_karyawan($data)
    {
		$this->db->insert('data_karyawan',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_jurusan($data)
    {
		$this->db->insert('data_jurusan',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	
	function set_kelas($data)
    {
		$this->db->insert('data_kelas',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return TRUE;
    	}
    	return FALSE;
    }
	
	function set_siswa($data)
    {
		$this->db->insert('data_siswa',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_mapel($data)
    {
		$this->db->insert('data_mapel',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_kategori($data)
    {
		$this->db->insert('berita_kategori',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return TRUE;
    	}
    	return FALSE;
    }
	
	
	function set_laman($data)
    {
		$this->db->insert('data_laman',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return TRUE;
    	}
    	return FALSE;
    }
	
	
	
	function set_user($data)
    {
		$this->db->insert('db_user',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_album($data)
    {
		$this->db->insert('galeri_album',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return TRUE;
    	}
    	return FALSE;
    }
	
	function set_foto($data)
    {
		$this->db->insert('galeri_foto',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_tokh($data)
    {
		$this->db->insert('dir_tokoh',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_sejarah($data)
    {
		$this->db->insert('dir_sejarah',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_jadwal_pelajaran($data)
    {
		$this->db->insert('jadwal_pelajaran',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return TRUE;
    	}
    	return FALSE;
    }
	
	function set_pendaftar($data)
    {
		$this->db->insert('pendaftaran_pendaftar',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_data_ujian($data)
    {
		$this->db->insert('ujian_data',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_peserta_ujian($data)
    {
		$this->db->insert('ujian_peserta',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_kategori_soal($data)
    {
		$this->db->insert('ujian_kategori_soal',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_soal_ujian($data)
    {
		$this->db->insert('ujian_soal',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	function set_jawaban_soal($data)
    {
		$this->db->insert('ujian_jawaban_soal',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
    }
	
	// ======================= Update 
	// -------------------------------
	
	function update_berita($data, $id_berita=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_berita', $id_berita);
		$this->db->update('data_berita', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_jabatan($data, $kode_jabatan='kepsek')
	{
		$this->db->where('kode_jabatan', $kode_jabatan);
		$this->db->update('data_jabatan', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_karyawan($data, $id_karyawan=0)
	{
		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->update('data_karyawan', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_kategori($data, $kode_kategori=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_kategori', $kode_kategori);
		$this->db->update('berita_kategori', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_jurusan($data, $kode_jurusan=0)
	{
		$this->db->where('kode_jurusan', $kode_jurusan);
		$this->db->update('data_jurusan', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_kelas($data, $kode_kelas=0)
	{
		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->update('data_kelas', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_mapel($data, $kode_mapel=0)
	{
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->update('data_mapel', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_laman($data, $kode_laman=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_laman', $kode_laman);
		$this->db->update('data_laman', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_siswa($data, $id_siswa=0)
	{
		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('data_siswa', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_user($data, $id_user=0)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('db_user', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_album($data, $kode_album=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_album', $kode_album);
		$this->db->update('galeri_album', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_foto($data, $id_foto=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_foto', $id_foto);
		$this->db->update('galeri_foto', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_tokoh($data, $id_tokoh=0)
	{
		$this->db->where('id_tokoh', $id_tokoh);
		$this->db->update('dir_tokoh', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_sejarah($data, $id_sejarah=0)
	{
		$this->db->where('id_sejarah', $id_sejarah);
		$this->db->update('dir_sejarah', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_jadwal_pelajaran($data, $id_jadwal=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('jadwal_pelajaran', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_pendaftar($data, $id_pendaftar=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_pendaftar', $id_pendaftar);
		$this->db->update('pendaftaran_pendaftar', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_data_ujian($data, $id_ujian=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_ujian', $id_ujian);
		$this->db->update('ujian_data', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_peserta_ujian($data, $id_sesi=0)
	{
		
		$this->db->where('id_sesi', $id_sesi);
		$this->db->update('ujian_peserta', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_kategori_soal($data, $kode_kategori_soal=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_kategori_soal', $kode_kategori_soal);
		$this->db->update('ujian_kategori_soal', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_soal($data, $id_soal=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_soal', $id_soal);
		$this->db->update('ujian_soal', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_jawaban_soal($data, $id_soal=0, $pilihan=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_soal', $id_soal);
		$this->db->where('pilihan', $pilihan);
		$this->db->update('ujian_jawaban_soal', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	// ======================= Delete 
	// -------------------------------
	
	function hapus_berita($id_berita=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_berita', $id_berita);
		$this->db->delete('data_berita');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_karyawan($id_karyawan=0)
	{
		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->delete('data_karyawan');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_kategori($kode_kategori=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_kategori', $kode_kategori);
		$this->db->delete('berita_kategori');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_jurusan($kode_jurusan=0)
	{
		$this->db->where('kode_jurusan', $kode_jurusan);
		$this->db->delete('data_jurusan');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_kelas($kode_kelas=0)
	{
		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->delete('data_kelas');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_mapel($kode_mapel=0)
	{
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->delete('data_mapel');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_laman($kode_laman=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_laman', $kode_laman);
		$this->db->delete('data_laman');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_siswa($id_siswa=0)
	{
		$this->db->where('id_siswa', $id_siswa);
		$this->db->delete('data_siswa');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_user($id_user=0)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('data_user');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_album($kode_album=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('kode_album', $kode_album);
		$this->db->delete('galeri_album');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_foto($id_foto=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_foto', $id_foto);
		$this->db->delete('galeri_foto');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_tokoh($id_tokoh=0)
	{
		$this->db->where('id_tokoh', $id_tokoh);
		$this->db->delete('dir_tokoh');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_sejarah($id_sejarah=0)
	{
		$this->db->where('id_sejarah', $id_sejarah);
		$this->db->delete('dir_sejarah');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_jabatan($kode_jabatan=0)
	{
		$this->db->where('kode_jabatan', $kode_jabatan);
		$this->db->delete('data_jabatan');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_jadwal_pelajaran($id_jadwal=0)
	{
		$this->db->cache_delete_all();
		
		$this->db->where('id_jadwal', $id_jadwal);
		
		$this->db->delete('jadwal_pelajaran');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function hapus_pendaftar($id_pendaftar=0)
	{
		$this->db->where('id_pendaftar', $id_pendaftar);
		$this->db->delete('pendaftaran_pendaftar');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_ujian($id_ujian=0)
	{
		$this->db->where('id_ujian', $id_ujian);
		$this->db->delete('ujian_data');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_kategori_soal($kode_kategori_soal=0)
	{
		return false;
		
		$this->db->where('kode_kategori_soal', $kode_kategori_soal);
		$this->db->delete('ujian_kategori_soal');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_soal($id_soal=0)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->delete('ujian_soal');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_jawaban_soal($id_soal=0)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->delete('ujian_jawaban_soal');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_peserta($id_sesi=0)
	{
		$this->db->where('id_sesi', $id_sesi);
		$this->db->delete('ujian_peserta');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function hapus_jawaban_pst($id_sesi=0)
	{
		$this->db->where('id_sesi', $id_sesi);
		$this->db->delete('ujian_jawaban_siswa');
	
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	// ======================= Select 
	// -------------------------------
	
	// Data 
	
	function get_berita($awal=0)
    {
    	$this->db->order_by('id_berita', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('data_berita');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_berita($id_berita=0)
    {
    	$this->db->where('id_berita', $id_berita);
		
		$data = $this->db->get('data_berita');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_karyawan($awal=0, $order_by='id_karyawan', $order='asc')
    {
		$this->db->select('*');
		$this->db->from('data_karyawan AS k');
		$this->db->join('data_jabatan AS j','k.kode_jabatan=j.kode_jabatan');
		$this->db->order_by('k.aktif', 'desc');
    	$this->db->order_by('j.level_jabatan', 'asc');
		$this->db->order_by('k.nama_lengkap', 'asc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_karyawan($id_karyawan=0)
    {
    	$this->db->where('id_karyawan', $id_karyawan);
		
		$data = $this->db->get('data_karyawan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_kategori($awal=0)
    {
		$this->db->where('status_kategori', 1);
    	$this->db->order_by('nama_kategori', 'asc');
		
		$data = $this->db->get('berita_kategori');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_berita_kategori($kode_kategori=0)
    {
    	$this->db->where('kode_kategori', $kode_kategori);
		
		$data = $this->db->get('berita_kategori');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jurusan()
	{
		$this->db->order_by('kode_jurusan', 'asc');
		
		$data = $this->db->get('data_jurusan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_data_jurusan($kode_jurusan=0)
    {
    	$this->db->where('kode_jurusan', $kode_jurusan);
		
		$data = $this->db->get('data_jurusan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_kelas($awal=0)
    {
    	$this->db->order_by('kode_kelas', 'desc');
		
		$data = $this->db->get('data_kelas');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_kelas($kode_kelas=0)
    {
    	$this->db->where('kode_kelas', $kode_kelas);
		
		$data = $this->db->get('data_kelas');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_wali_kelas($awal=0)
    {
		$this->db->where('aktif', 1);
    	$this->db->order_by('nama_lengkap', 'asc');
		
		$data = $this->db->get('data_karyawan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_mapel($awal=0)
    {
    	$this->db->order_by('kode_mapel', 'asc');
		$this->db->limit(50, $awal);
		
		$data = $this->db->get('data_mapel');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_mapel($kode_mapel=0)
    {
    	$this->db->where('kode_mapel', $kode_mapel);
		
		$data = $this->db->get('data_mapel');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jadwal_pelajaran()
    {
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran AS j');
		$this->db->join('data_karyawan AS g','g.id_karyawan=j.id_karyawan');
		$this->db->join('data_kelas AS k','k.kode_kelas=j.kode_kelas');
		$this->db->join('data_mapel AS m','m.kode_mapel=j.kode_mapel');
    	$this->db->order_by('j.hari', 'asc');
		
		$this->db->order_by('j.jam_mulai', 'asc');
		$this->db->order_by('j.kode_kelas', 'asc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_jadwal_pelajaran($id_jadwal=0)
    {
    	$this->db->where('id_jadwal', $id_jadwal);
		
		$data = $this->db->get('jadwal_pelajaran');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_laman($awal=0)
    {
    	$this->db->order_by('nama_laman', 'asc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('data_laman');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_laman($kode_laman=0)
    {
    	$this->db->where('kode_laman', $kode_laman);
		
		$data = $this->db->get('data_laman');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_laman_aktif()
    {
		$this->db->where('publikasi', 1);
    	$this->db->order_by('kode_laman', 'asc');
		
		$data = $this->db->get('data_laman');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function cek_kode_laman($kode_laman=0)
	{
		$this->db->where('kode_laman', $kode_laman);
		
		$data = $this->db->get('data_laman');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_kategori($kode_kategori=0)
	{
		$this->db->where('kode_kategori', $kode_kategori);
		
		$data = $this->db->get('berita_kategori');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_kategori_soal($kode_kategori=0)
	{
		$this->db->where('kode_kategori_soal', $kode_kategori);
		
		$data = $this->db->get('ujian_kategori_soal');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_jabatan($kode_jabatan=0)
	{
		$this->db->where('kode_jabatan', $kode_jabatan);
		
		$data = $this->db->get('data_jabatan');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_kategori_aktif($kode_kategori=0)
	{
		$this->db->where('kode_kategori', $kode_kategori);
		$this->db->where('status_kategori', 0);
		
		$data = $this->db->get('berita_kategori');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_kategori_soal_aktif($kode_kategori=0)
	{
		$this->db->where('kode_kategori_soal', $kode_kategori);
		$this->db->where('status_kategori', 0);
		
		$data = $this->db->get('ujian_kategori_soal');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_jurusan($kode_jurusan=0)
	{
		$this->db->where('kode_jurusan', $kode_jurusan);
		
		$data = $this->db->get('data_jurusan');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_kelas($kode_kelas=0)
	{
		$this->db->where('kode_kelas', $kode_kelas);
		
		$data = $this->db->get('data_kelas');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_username($username=0)
	{
		$this->db->where('username', $username);
		
		$data = $this->db->get('db_user');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_kode_mapel($kode_mapel=0)
	{
		$this->db->where('kode_mapel', $kode_mapel);
		
		$data = $this->db->get('data_mapel');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function cek_jadwal_pelajaran($kode_kelas='a', $hari=1, $jam_mulai='00:00:00', $jam_selesai='00:00:00')
	{
		//$this->db->where('kode_kelas', $kode_kelas);
		//$this->db->where('hari', $hari);
		//$this->db->where('jam_mulai >=', $jam_mulai);
		//$this->db->where('jam_mulai <=', $jam_selesai);
		//$data = $this->db->get('jadwal_pelajaran');
		
		$data = $this->db->query("SELECT * FROM jadwal_pelajaran WHERE kode_kelas='$kode_kelas' AND hari='$hari' AND ((jam_mulai BETWEEN '$jam_mulai' AND '$jam_selesai') OR (jam_selesai BETWEEN '$jam_mulai' AND '$jam_selesai'))");
		
		if($data->num_rows() > 0)
		{
			return FALSE;
		}
		
		return TRUE;
	}
	
	// ============= GET Data ============================
	
	function get_siswa($awal=0)
    {
		$this->db->select('*');
		$this->db->from('data_siswa AS s');
		$this->db->join('data_kelas AS k', 's.kode_kelas=k.kode_kelas');
    	$this->db->order_by('s.status_siswa', 'desc');
		$this->db->order_by('s.kode_kelas', 'asc');
		$this->db->order_by('s.nama_lengkap', 'asc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_siswa($id_siswa=0)
    {
    	$this->db->where('id_siswa', $id_siswa);
		
		$data = $this->db->get('data_siswa');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_siswa_kelas($kode_kelas=0)
    {
    	$this->db->where('kode_kelas', $kode_kelas);
		$this->db->order_by('nama_lengkap', 'asc');
		
		$data = $this->db->get('data_siswa');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_user($awal=0)
    {
    	$this->db->order_by('username', 'asc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('db_user');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_user($id_user=0)
    {
    	$this->db->where('id_user', $id_user);
		
		$data = $this->db->get('db_user');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_album($awal=0)
    {
    	$this->db->order_by('kode_album', 'asc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('galeri_album');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_album($kode_album=0)
    {
    	$this->db->where('kode_album', $kode_album);
		
		$data = $this->db->get('galeri_album');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_foto($awal=0)
    {
    	$this->db->order_by('id_foto', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('galeri_foto');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_foto($id_foto=0)
    {
    	$this->db->where('id_foto', $id_foto);
		
		$data = $this->db->get('galeri_foto');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_tokoh($awal=0)
    {
    	$this->db->order_by('id_tokoh', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('dir_tokoh');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_tokoh($id_tokoh=0)
    {
    	$this->db->where('id_tokoh', $id_tokoh);
		
		$data = $this->db->get('dir_tokoh');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_sejarah($awal=0)
    {
    	$this->db->order_by('id_sejarah', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('dir_sejarah');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_sejarah($id_sejarah=0)
    {
    	$this->db->where('id_sejarah', $id_sejarah);
		
		$data = $this->db->get('dir_sejarah');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jabatan($order_by='level_jabatan', $order='asc')
    {
    	$this->db->order_by($order_by, $order);
		
		$data = $this->db->get('data_jabatan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_jabatan($kode_jabatan=0)
    {
    	$this->db->where('kode_jabatan', $kode_jabatan);
		
		$data = $this->db->get('data_jabatan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_pengajar()
    {
		$this->db->where('mengajar', 1);
		$this->db->where('aktif', 1);
    	$this->db->order_by('nama_panggilan', 'asc');
		
		$data = $this->db->get('data_karyawan');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_kelas_aktif()
    {
		$tahun=date("Y");
		$thn1 = substr(intval($tahun), -2);
		$thn2 = $thn1-1;
		$thn3 = $thn2-1;
		$thn4 = $thn3-1;
		$this->db->where('status_kelas', 1);
		//$this->db->or_where('kode_kelas', 'TKJ');
		$this->db->like('kode_kelas', $thn1, 'after');
		$this->db->or_like('kode_kelas', $thn2, 'after');
		$this->db->or_like('kode_kelas', $thn3, 'after');
		$this->db->or_like('kode_kelas', $thn4, 'after');
		$this->db->or_like('kode_kelas', $thn4, 'after');
		$this->db->or_like('kode_kelas', 'TK', 'after');
    	$this->db->order_by('kode_kelas', 'desc');
		
		$data = $this->db->get('data_kelas');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jadwal()
    {
    	$this->db->order_by('hari', 'asc');
		$this->db->order_by('jam_mulai', 'asc');
		$this->db->order_by('kode_kelas', 'asc');
		
		$data = $this->db->get('jadwal_pelajaran');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_pendaftar($awal=0, $order_by='id_pendaftar', $order='desc')
    {
		
    	$this->db->order_by($order_by, $order);
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('pendaftaran_pendaftar');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_pendaftar_tahun($tahun=2018, $order_by='nama_lengkap', $order_by2='nisn')
    {
		$this->db->select('*');
		$this->db->from('pendaftaran_pendaftar');
		$this->db->where('tahun_daftar', $tahun);
		$this->db->order_by($order_by,'ASC');
    	$this->db->order_by($order_by2, 'ASC');
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_pendaftar_where($where='syarat_lengkap', $where_data=1, $awal=0, $order_by='id_pendaftar', $order='desc')
    {
		$this->db->where($where, $where_data);
    	$this->db->order_by($order_by, $order);
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('pendaftaran_pendaftar');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_pendaftar($id_pendaftar=0)
    {
    	$this->db->where('id_pendaftar', $id_pendaftar);
		
		$data = $this->db->get('pendaftaran_pendaftar');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_cari_pendaftar($nama='a', $tahun_daftar='2018')
    {
		$this->db->where('tahun_daftar', $tahun_daftar);
    	$this->db->like('nama_lengkap', $nama);
		$this->db->limit(20, 0);
		
		$data = $this->db->get('pendaftaran_pendaftar');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_statistik_jurusan($tahun_daftar='2018')
    {
		// peminat berdasarkan jurusan
		$data = $this->db->query('SELECT jurusan_minat, count(id_pendaftar) AS jumlah_pendaftar FROM pendaftaran_pendaftar WHERE tahun_daftar='.$tahun_daftar.' GROUP BY jurusan_minat');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_statistik_sekolah($tahun_daftar='2018')
    {
		// peminat berdasarkan jurusan
		$data = $this->db->query('SELECT sekolah_asal, count(id_pendaftar) AS jumlah_pendaftar FROM pendaftaran_pendaftar WHERE tahun_daftar='.$tahun_daftar.' GROUP BY sekolah_asal');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_cari_sekolah($nama_sekolah='a')
    {
		$this->db->select('nama_sekolah');
		$this->db->from('pendaftaran_pendaftar');
    	$this->db->like('nama_sekolah', $nama_sekolah);
		$this->db->group_by('nama_sekolah');
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_sekolah_asal($tahun_daftar='2018')
    {
		// peminat berdasarkan jurusan
		$data = $this->db->query('SELECT nama_sekolah, count(id_pendaftar) AS jumlah_pendaftar, sum(diterima) AS jumlah_diterima FROM pendaftaran_pendaftar WHERE tahun_daftar='.$tahun_daftar.' GROUP BY nama_sekolah');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_random_soal($kategori=0, $jumlah_soal=1)
	{
		$this->db->where('kode_kategori_soal', $kategori);
		$this->db->order_by('id_soal', 'RANDOM');
		$this->db->limit($jumlah_soal, 0);
		
		$data = $this->db->get('ujian_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_ujian_data($awal=0)
    {
    	$this->db->order_by('id_ujian', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('ujian_data');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_ujian($id_ujian=0)
    {
    	$this->db->where('id_ujian', $id_ujian);
		
		$data = $this->db->get('ujian_data');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_peserta_ujian($awal=0)
    {
    	$this->db->order_by('id_sesi', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('ujian_peserta');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_peserta_ujian2($id_ujian=0, $awal=0)
    {
		$this->db->where('id_ujian', $id_ujian);
    	$this->db->order_by('selesai', 'asc');
		$this->db->order_by('skor_akhir', 'desc');
		$this->db->order_by('sisa_waktu', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('ujian_peserta');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_peserta_ujian_semua($id_ujian=0)
    {
		$this->db->select('*');
		$this->db->from('ujian_peserta AS p');
		$this->db->join('data_siswa AS s','p.id_siswa=s.id_siswa');
		$this->db->join('data_kelas AS k','s.kode_kelas=k.kode_kelas');
		$this->db->where('p.id_ujian', $id_ujian);
    	$this->db->order_by('s.kode_kelas', 'asc');
    	$this->db->order_by('s.nama_lengkap', 'asc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_belum_selesai()
    {
    	$this->db->where('selesai', 0);
		
		$data = $this->db->get('ujian_peserta');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function unblock_peserta_ujian()
	{
		//$this->db->where('selesai', 0);
		$skrg = date("Y-m-d H:i:s");
		
		$data = $this->db->query("UPDATE ujian_peserta SET update_terakhir='$skrg',blokir=0 WHERE blokir=1");
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function get_ujian_aktif()
    {
    	$this->db->where('aktif', 1);
		
		$data = $this->db->get('ujian_data');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_peserta($id_sesi=0)
    {
    	$this->db->where('id_sesi', $id_sesi);
		
		$data = $this->db->get('ujian_peserta');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_kategori_soal($awal=0)
    {
    	$this->db->order_by('kode_kategori_soal', 'asc');
		
		$data = $this->db->get('ujian_kategori_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_kategori_soal($kode_kategori_soal=0)
    {
    	$this->db->where('kode_kategori_soal', $kode_kategori_soal);
		
		$data = $this->db->get('ujian_kategori_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_soal_ujian($awal=0)
    {
    	$this->db->order_by('id_soal', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('ujian_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_soal_kategori($kode_kategori='a', $awal=0)
    {
		$this->db->where('kode_kategori_soal', $kode_kategori);
    	$this->db->order_by('id_soal', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('ujian_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function cari_soal($cari='a')
    {
		$this->db->select('*');
		$this->db->from('ujian_soal AS s');
		$this->db->join('ujian_kategori_soal AS k', 's.kode_kategori_soal=k.kode_kategori_soal');
    	$this->db->like('s.pertanyaan',$cari, 'both');
		$this->db->limit(20, 0);
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_soal($id_soal=0)
    {
    	$this->db->where('id_soal', $id_soal);
		
		$data = $this->db->get('ujian_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jawaban_soal($id_soal=0)
    {
    	$this->db->where('id_soal', $id_soal);
		
		$data = $this->db->get('ujian_jawaban_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	// Untuk pengecekan
	function get_jawaban_sesi($id_sesi=0)
    {
    	$this->db->where('id_sesi', $id_sesi);
		
		$data = $this->db->get('ujian_jawaban_siswa');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_jawaban_benar($id_soal=0, $pilihan=0)
    {
    	$this->db->where('id_soal', $id_soal);
		$this->db->where('pilihan', $pilihan);
		$this->db->where('benar', 1);
		
		$data = $this->db->get('ujian_jawaban_soal');
		if($data->num_rows() > 0)
		{
			return TRUE;
		}
		
		return FALSE;
    }
	// end pengecekan
	
	function cari_siswa($cari='a')
    {
		$this->db->select('*');
		$this->db->from('data_siswa AS s');
		$this->db->join('data_kelas AS k', 's.kode_kelas=k.kode_kelas');
    	$this->db->like('s.nama_lengkap',$cari, 'both');
		$this->db->or_like('s.nisn',$cari, 'both');
		$this->db->limit(20, 0);
		
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function cek_siswa($nisn=0)
	{
		$this->db->where('nisn', $nisn);
		
		$data = $this->db->get('data_siswa');
		if($data->num_rows() > 0)
		{
			foreach($data->result() AS $dta)
			{
				return $dta->id_siswa;
			}
		}
		
		return FALSE;
	}
	
	function get_sinkron_siswa()
	{
		$this->dbe =  $this->load->database('erapor', TRUE); // DB erapor
		
		$this->dbe->select('*');
		$this->dbe->from('data_siswas AS s');
		$this->dbe->join('data_rombels AS r','s.data_rombel_id=r.id');
		
		$data = $this->dbe->get();
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	
	// ================================ Cek Disini ===============
	
	function cek_kategori_soal($kode_kategori_soal=0)
    {
    	$this->db->where('kode_kategori_soal', 'kode_kategori_soal');
		
		
		$data = $this->db->get('ujian_kategori_soal');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_lisensi($awal=0)
    {
    	$this->db->order_by('id_lisensi', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get('lisensi');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_semua_lisensi()
    {
    	$this->db->order_by('id_lisensi', 'desc');
		
		$data = $this->db->get('lisensi');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_data_lisensi($id_lisensi=0)
    {
    	$this->db->where('id_lisensi', $id_lisensi);
		
		$data = $this->db->get('lisensi');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	// End Select
	
	
	
	
	
	
	
	// Sitemap
	function get_sitemap_berita($awal=0, $limit=100)
	{
		//$this->db->cache_on();
		
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit, $awal);
		$data = $this->db->get('data_berita');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
	
		return FALSE;
	}
	
	function get_sitemap_laman($awal=0)
	{
		//$this->db->cache_on();
		
		$this->db->order_by('nama_laman', 'asc');
		$data = $this->db->get('data_laman');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
	
		return FALSE;
	}
	
	function get_sitemap_gambar($awal=0, $limit=100)
	{
		//$this->db->cache_on();
		
		$this->db->order_by('id_foto', 'desc');
		$this->db->limit($limit, $awal);
		$data = $this->db->get('galeri_foto');
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
	
		return FALSE;
	}
}

/* End of file Model_master.php */
/* Location: ./application/models/Model_master.php */