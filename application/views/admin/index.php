<?php

$this->encryption->initialize(array('cipher' => 'aes-256','mode' => 'ctr'));

$ujian_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');

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

if(! empty($sess_uid) && !empty ($level) && ($level > 0))
{
	if($level == 1)
	{
		redirect($admin_url, 'refresh');
		exit(0);
	}
	
	if($level == 2)
	{
		redirect($ujian_url, 'refresh');
		exit(0);
	}
	
}

redirect($admin_url.'/masuk', 'refresh');

/* End of file index.php */
/* Location: ./application/views/master/index.php */
?>