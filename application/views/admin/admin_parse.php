<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(! isset($judul_situs))
{
	$judul_situs = "admin";

}
if(! isset($nama_situs))
{
	$nama_situs = "Edukasi";
}
if(! isset($main_url))
{
	$main_url = $this->config->item('main_url');
}
if(! isset($admin_url))
{
	$admin_url = $this->config->item('admin_url');
}
if(! isset($map_dir))
{
	$map_dir = "";
}
if(! isset($page_content))
{
	$page_content = "Data Tidak Tersedia";
}

$menu_kiri = "
	<b>Konfigurasi</b>
					<br />
					<a href='$admin_url/konfigurasi'>Konfigurasi Umum</a> <br />
					<a href='$admin_url/backup'>Backup Data</a><br />
					<a href='$admin_url/user'>Pengguna</a><br />
					<br />
					<b>Master Data</b>
					<br />
					<a href='$admin_url/jabatan'>Data Jabatan</a> <br />
					<a href='$admin_url/karyawan'>Data Karyawan</a><br />
					<a href='$admin_url/jurusan'>Data Jurusan</a><br />
					<a href='$admin_url/kelas'>Data Kelas</a><br />
					<a href='$admin_url/siswa'>Data Siswa</a><br />
					<a href='$admin_url/mapel'>Data Mapel</a><br />
					<a href='$admin_url/jadwal_pelajaran'>Jadwal Pelajaran</a><br />
					<br />
					<b>Pendaftaran Siswa</b>
					<br />
					<a href='$admin_url/pendaftar'>Data Pendaftar</a> <br />
					<a href='$admin_url/pendaftar_online'>Pendaftar Online</a> <br />
					<br />
					<b>Ujian</b>
					<br />
					<a href='$admin_url/peserta_ujian'>Peserta Ujian</a> <br />
					<a href='$admin_url/ujian_data'>Data Ujian</a> <br />
					<a href='$admin_url/kategori_soal'>Kategori Soal</a> <br />
					<a href='$admin_url/soal_ujian'>Soal Ujian</a> <br />
					<br />
					
					<b>Inventaris</b>
					<br />
					<a href='$admin_url/kategori_barang'>Kategori Barang</a> <br />
					<a href='$admin_url/barang'>Data Barang</a> <br />
					<a href='$admin_url/inventaris_peminjaman'>Peminjaman Barang</a> <br />
					<a href='$admin_url/inventaris_pengembalian'>Pengembalian Barang</a> <br />
					<br />
					<b>Muhammadiyah</b>
					<br />
					<a href='$admin_url/muh_tokoh'>Tokoh Muhammadiyah</a> <br />
					<a href='$admin_url/muh_sejarah'>Sejarah Muhammadiyah</a> <br />
					<br />
					<b>Galeri</b>
					<br />
					<a href='$admin_url/galeri_album'>Album</a> <br />
					<a href='$admin_url/galeri_foto'>Foto-foto</a> <br />
					<br />
					<b>Perpustakaan</b>
					<br />
					<a href='$admin_url/penerbit'>Penerbit</a> <br />
					<a href='$admin_url/pengarang'>Pengarang</a> <br />
					<a href='$admin_url/member'>Member</a> <br />
					<a href='$admin_url/pinjam_buku'>Peminjaman</a> <br />
					<a href='$admin_url/pengembalian_buku'>Pengembalian</a> <br />
					<br />
					<b>SPP dan Keuangan</b>
					<br />
					<a href='$admin_url/'>Data SPP</a> <br />
					<br />
					<b>BKK</b>
					<br />
					<a href='$admin_url/'>Data Perusahaan</a> <br />
					<a href='$admin_url/'>Data Rekrutmen</a> <br />
					<a href='$admin_url/'>Data Peserta</a> <br />
";


$data = array(
	'base_url' => base_url(),
	'judul_situs' => $judul_situs,
	'nama_situs' => $nama_situs, 
	'main_url' => $main_url,
	'admin_url' => $admin_url, 
	'map_dir' => $map_dir,
	'menu_kiri' => $menu_kiri, 
	'page_content' => $page_content,
	'tahun_sekarang' => date("Y")
);

$this->parser->parse('admin/template_admin', $data);
