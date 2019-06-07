<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		
		// load library dan helper
		$this->load->library(array('upload', 'image_lib','parser','encryption','user_agent','session','pagination'));
		$this->load->model('Model_main','model_main', TRUE); // Load Model Main
		$this->load->config('config_master');
		
		function pesan($pesan, $url)
		{
			echo "
				<script type='text/javascript'>
					alert('$pesan');
					window.location.href='$url';
				</script>
				<noscript>
					<center>
						$pesan <br />
						<a href='$url'>Lanjutkan &gt;&gt;</a>
					</center>
				</noscript>
			";
		}
	}
	
	public function index()
	{
		$this->load->view('main/index');
	}
	
	public function error404()
	{
		$this->load->view('errors/error_404');
		$this->output->cache(60);
	}
	
	public function error500()
	{
		echo "5XX INTERNAL SERVER ERROR";
	}
	
	
	public function periksa()
	{
		if((! $this->agent->is_browser()) && (! $this->agent->is_mobile()))
		{
			exit(0);
		}
		
		$this->encryption->initialize(array('cipher' => 'aes-256','mode' => 'ctr'));
		
		$main_url = $this->config->item('main_url');
		$admin_url = $this->config->item('admin_url');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$captcha = strtolower($this->input->post('captcha'));
		$scapthca = '';
		
		if(isset ($_SESSION['captcha']))
		{
			$scapthca = $_SESSION['captcha'];
		}
		
		if($captcha != $scapthca)
		{
			pesan('Capptcha Tidak Cocok!', $main_url.'/masuk');
			exit(0);
		}
		
		if(! empty($username) && ! empty($password))
		{
			$login = $this->model_master->get_login(array('username' => $username, 'password' => md5($password)));
			
			if($login !== FALSE)
			{
				foreach($login AS $dlog)
				{
					$_SESSION['uid'] = $this->encryption->encrypt($dlog->id_user);
					$_SESSION['level'] = $this->encryption->encrypt($dlog->level_user);
					$_SESSION['uname'] = $dlog->nama_user;
					
					$this->input->set_cookie('uname', $dlog->nama_user, 10000, '', '/', '', FALSE);
					
					$agent = $this->agent->browser().' '.$this->agent->version().' on '.$this->agent->platform();
					$dtalog = array('id_log' => '', 'id_user' => $dlog->id_user, 'alamat_ip' => $this->input->ip_address(), 'tanggal_log' => date("Y-m-d H:i:s"), 'user_agent' => $agent);
					// Store log data
					$this->model_master->set_log($dtalog);
					
					redirect($admin_url, 'refresh');
				}
			}else{
				pesan('Username dan password tidak cocok!', $main_url.'/masuk');
			}
			
		}else{
			pesan('Error!', $main_url.'/masuk');
		}
		
		redirect($main_url.'/masuk', 'refresh');
	}
	
	public function masuk()
	{
		$this->load->view('main/login');
	}
	
	public function kontak()
	{
		$this->load->view('main/kontak');
	}
	
	public function pencarian()
	{
		$this->load->view('main/pencarian');
	}
	public function laman()
	{
		$this->load->view('main/laman');
	}
}
