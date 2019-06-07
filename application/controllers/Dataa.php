<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_main','model_main', TRUE);
		$this->load->config('config_master');
	}
	
	public function index()
	{
		echo "No Image Available";
	}
		
	public function data_pendaftar()
	{
		$data[] = array("nama_sekolah" => "SMK M 2 Banjarsari");
		$jumlah_pendaftar = $this->model_main->hitung_data('id_pendaftar','pendaftaran_pendaftar');
		
		$data[] =  array("jumlah_pendaftar" => $jumlah_pendaftar);
		echo json_encode($data);
		
		//$this->output->cache(5);
	}
	
	public function list_pendaftar()
	{
		//$data[] = EMPTY;
		
		$awal = $this->uri->segment(3);
		$awal = intval($awal);
		$pendftar = $this->model_main->get_pendaftar($awal);
		
		if($pendftar !== FALSE)
		{
			foreach($pendftar AS $dft)
			{
				$data[] = array("id_pendaftar" => $dft->id_pendaftar, "nama_lengkap" => $dft->nama_lengkap, "jurusan_minat" => $dft->jurusan_minat, "nama_sekolah" => $dft->nama_sekolah);
			}
		}
		
		echo json_encode($data);
	}
	
	public function cari_pendaftar()
	{
		$cari = $this->uri->segment(3);
		$pendftar = $this->model_main->get_cari_pendaftar($cari);
		
		if($pendftar !== FALSE)
		{
			foreach($pendftar AS $dft)
			{
				$data[] = array("id_pendaftar" => $dft->id_pendaftar, "nama_lengkap" => $dft->nama_lengkap, "jurusan_minat" => $dft->jurusan_minat, "nama_sekolah" => $dft->nama_sekolah);
			}
			
		}else{
			$data = Null;
		}
		
		echo json_encode($data);
	}
	
	public function detail_pendaftar()
	{
		$id_pendaftar = $this->uri->segment(3);
		
		$pendaftar = $this->model_main->get_detail_pendaftar($id_pendaftar);
		
		echo json_encode($pendaftar);
	}
}

/* End of file Sitemap.php */
/* Location: ./application/controllers/Sitemap.php */