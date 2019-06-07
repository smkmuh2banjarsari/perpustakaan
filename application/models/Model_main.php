<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {
	
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
	
	function get_login_siswa($data)
	{
		$this->db->select('*');
		$login = $this->db->get_where('data_siswa', $data);
		
		if($login->num_rows() > 0)
		{
			return $login->result();
		}
		
		return FALSE;
	}
	
	function get_karyawan_aktif()
	{
		$this->db->select('*');
		$this->db->from('data_karyawan AS k');
		$this->db->join('data_jabatan AS j','k.kode_jabatan=j.kode_jabatan');
		$this->db->where('k.id_karyawan >', 1);
		$this->db->where('k.aktif', 1);
		$this->db->order_by('j.level_jabatan','asc');
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_data_karyawan($id_karyawan=0)
	{
		$this->db->select('*');
		$this->db->from('data_karyawan AS k');
		$this->db->join('data_jabatan AS j','k.kode_jabatan=j.kode_jabatan');
		$this->db->where('k.id_karyawan', $id_karyawan);
		//$this->db->where('k.aktif', 1);
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_karyawan($awal=0)
	{
		$this->db->select('*');
		$this->db->from('data_karyawan AS k');
		$this->db->join('data_jabatan AS j','k.kode_jabatan=j.kode_jabatan');
		$this->db->where('k.id_karyawan >', 1);
		$this->db->order_by('k.aktif', 'desc');
		$this->db->order_by('j.level_jabatan','asc');
		$this->db->order_by('k.nama_lengkap','asc');
		$this->db->limit(50, $awal);
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	public function set_pendaftar($data)
	{
		$this->db->insert('pendaftaran_pendaftar',$data);
		
    	if($this->db->affected_rows() > 0)
    	{
    		return $this->db->insert_id();
    	}
    	return FALSE;
	}
	
	function get_pendaftar($awal=0)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran_pendaftar AS p');
		$this->db->order_by('p.id_pendaftar', 'desc');
		$this->db->limit(20, $awal);
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_detail_pendaftar($id_pendaftar=0)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran_pendaftar AS p');
		$this->db->where('p.id_pendaftar', $id_pendaftar);
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
	function get_cari_pendaftar($nama='a')
    {
		$thn_skrg = date("Y");
		
		$this->db->where('tahun_daftar', $thn_skrg);
    	$this->db->like('nama_lengkap', $nama,'both');
		$this->db->limit(20, 0);
		
		$data = $this->db->get('pendaftaran_pendaftar');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
    }
	
	function get_sitemap_berita($awal=0)
	{
		$this->db->select('*');
		$this->db->from('berita_berita AS b');
		$this->db->order_by('b.id_berita', 'desc');
		$this->db->limit(100, $awal);
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		
		return FALSE;
	}
	
}

/* End of file Model_main.php */
/* Location: ./application/models/Model_main.php */