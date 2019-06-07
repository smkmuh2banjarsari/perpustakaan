<?php 

$searchTerm = $this->input->get('term');

$data = array();

$swicth = $this->uri->segment(3);

switch($swicth)
{
	case "sekolah":
		$cari = $this->model_master->get_cari_sekolah($searchTerm);
		
		if($cari)
		{
			foreach($cari AS $cri)
			{
				$data[] = $cri->nama_sekolah;
			}
		}
	;
	break;
	
	default:
		$data[] = "No Available";
	break;
}


echo json_encode($data);
