<?php

$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$media_url = $this->config->item('media_url');
$judul_situs = "Masuk Ke Sistem";


$capval = array(
        'word'          => '',
        'img_path'      => './media/captcha/',
        'img_url'       => $media_url.'/captcha/',
        'font_path'     => './system/fonts/texb.ttf',
        'img_width'     => '260',
        'img_height'    => '50',
        'expiration'    => 300,
        'word_length'   => 8,
        'font_size'     => 24,
        'img_id'        => 'Imageid',
        'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
		
        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        )
);

$captcha = create_captcha($capval);
if(isset ($_SESSION['captcha']))
{
	$_SESSION['captcha'] = '';
}
$_SESSION['captcha'] = strtolower($captcha['word']);



$map_dir = "
	<a href='$main_url'>Home</a>
	&gt;
	<b>Login</b>
";

$page_content = '
	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form action="'.$admin_url.'/periksa" method="post" name="fl" id="f_loginx">
			<div class="panel panel-default top150">
				<div class="panel-heading"><h4 style="margin: 5px"><i class="glyphicon glyphicon-user"></i> Silakan login</h4></div>
				<div class="panel-body">
					<div id="konfirmasi"></div>
					<div class="input-group">
						<span class="input-group-addon">@</span>
						<input type="text" id="username" name="username" autofocus="" value="" placeholder="Username" class="form-control">
					</div> <!-- /field -->
					
					<div class="input-group top15">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" id="password" name="password" value="" placeholder="Password" class="form-control">
					</div> <!-- /password -->
					
					<div class="input-group top15">
						'.$captcha['image'].'
					</div> <!-- /captcha -->
					
					
					<div class="input-group">
						Ketik Huruf Diatas
						<br />
						<input type="text" name="captcha" />
						<br />
					</div>
						
					<div class="login-actions">
						<button class="button btn btn-dafault btn-large col-lg-12 top15">Login</button>
					</div> <!-- .actions -->
				</div>
			</div> <!-- /login-fields -->
			
		</form>
		</div>
		<div class="col-md-4"></div>
	</div>
	
	
';

require_once APPPATH."views/admin/template_parse.php";

/* End of file login.php */
/* Location: ./application/views/masuk/login.php */
