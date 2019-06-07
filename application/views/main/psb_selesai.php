<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Depan";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$capval = array(
        'word'          => '',
        'img_path'      => './media/captcha/',
        'img_url'       => $media_url.'/captcha/',
        'font_path'     => '/system/fonts/texb.ttf',
        'img_width'     => '300',
        'img_height'    => '60',
        'expiration'    => 300,
        'word_length'   => 8,
        'font_size'     => 24,
        'img_id'        => 'Imageid',
        'pool'          => '2356789ABCDEFGHIJKMNPRSTUVWXYZ',
		
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


$page_content = $captcha['image'];


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
