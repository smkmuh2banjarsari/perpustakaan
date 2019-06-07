<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(! isset($judul_laman))
{
	$judul_laman = "Halaman Utama";
}
if(! isset($judul_situs))
{
	$judul_situs = "Sekolah";
}
if(! isset($main_url))
{
	$main_url = base_url('main');
}
if(! isset($admin_url))
{
	$admin_url = base_url('master');
}
if(! isset($map_dir))
{
	$map_dir = "";
}
if(! isset($deskripsi_situs))
{
	$deskripsi_situs = "Sekolah";
}
if(! isset($keyword_situs))
{
	$keyword_situs = "";
}
if(! isset($page_content))
{
	$page_content = "Data Tidak Tersedia";
}
if(! isset($head_content))
{
	$head_content = "";
}
if(! isset($amp_url))
{
	$amp_url = str_replace(".sch.id",".sch.id/amp",base_url());
}


$data = array(
	'base_url' => base_url(),
	'judul_laman' => $judul_laman,
	'judul_situs' => $judul_situs,
	'main_url' => $main_url,
	'deskripsi_situs' => $deskripsi_situs,
	'keyword_situs' => $keyword_situs,
	'current_url' => current_url(),
	'amp_url' => $amp_url,
	'head_content' => $head_content, 
	'map_dir' => $map_dir,
	'page_content' => $page_content,
	'tahun_sekarang' => date("Y")
);

$this->parser->parse('main/template_main', $data);
