<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		//$this->load->helper(array('url','cookie','language','security','text'));
		//$this->load->library(array('parser','session','user_agent','pagination','encrypt'));
		
		$this->load->model('Model_master','model_master', TRUE); // Load Model Master
		$this->load->library(array('upload', 'image_lib','parser','encryption','user_agent','session','pagination'));
		$this->load->dbutil(); // Load the DB utility class
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
		$this->load->view('admin/admin');
	}
	
	public function admin()
	{
		$this->load->view('admin/admin');
	}
	
	public function user()
	{
		$this->load->view('admin/user');
	}
	
	public function tentang()
	{
		$this->load->view('admin/tentang');
		//$this->output->cache(5);
	}
	
	public function disclaimer()
	{
		$this->load->view('admin/disclaimer');
		//$this->output->cache(5);
	}
	
	public function donasi()
	{
		$this->load->view('admin/donasi');
		//$this->output->cache(5);
	}
	
	public function logx()
	{
		if((! $this->agent->is_browser()) && (! $this->agent->is_mobile()))
		{
			die('INTERNAL SERVER ERROR');
			exit;
		}
		
		$main_url = base_url('dadan');
		
		$sess_uid = '';
		$level = '';
		
		if(isset ($_SESSION['uid']))
		{
			$sess_uid = $_SESSION['uid'];
		}
		if(isset ($_SESSION['level']))
		{
			$level = $_SESSION['level'];
		}
		
		if(! empty($sess_uid) && !empty ($level))
		{
			redirect($main_url.'/ruang', 'level');
			exit(0);
		}
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$recaptcha_response = $this->input->post('g-recaptcha-response');
		$captcha_secret = $this->sec_key;
		
		$response = TRUE; //file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$captcha_secret&response=$recaptcha_response&remoteip=".$_SERVER['REMOTE_ADDR']);
		
		$response = json_decode($response);
		
		/*
		* periksa captcha
		if(!empty($username) && !empty($password) && ($response->success))
		
		if (! $response->success)
		{
			pesan('Bot Detected!', $main_url);
			die ("Bot Detected!");
			exit;
		}
		*/
		
		
		if(!empty($username) && !empty($password) )
		{
			$password = sha1($password);
			$login = $this->model_master->get_login(array('username' => $username, 'password' => $password));
				
			if($login !== FALSE)
			{
				foreach($login AS $dlog)
				{
					$uid = $this->encrypt->encode($dlog->id_user);
					$uname = $this->encrypt->encode($dlog->nama_user);
					$_SESSION['uid'] = $dlog->id_user;
					$_SESSION['level'] = $dlog->level_user;
						
					$this->input->set_cookie('sess_id', $uid, 10000, '', '/', '', FALSE);
					$this->input->set_cookie('uname', $uname, 10000, '', '/', '', FALSE);
						
					redirect($main_url.'/ruang', 'refresh');
				}
			}else{
				pesan('Username dan password tidak cocok!', $main_url.'/rhs');
			}
				
		}else{
			pesan('Pemeriksaan gagal!', $main_url.'/rhs');
		}
	}
	
	public function test(){
		$this->load->view('welcome_message');
	}
	
	public function logout()
	{
		$main_url = $this->config->item('main_url');
		
		unset($_SESSION['uid']);
		unset($_SESSION['level']);
		unset($_SESSION['uname']);
		delete_cookie('uname');
		
		redirect($main_url, 'refresh');
	}
	
	
	
	
	
}

/* End of file Room.php */
/* Location: ./application/controllers/Room.php */
