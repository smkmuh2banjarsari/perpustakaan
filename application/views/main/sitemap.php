<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$base_url = base_url();
$sitemap_url = base_url('sitemap');
$hiburan_url = base_url('hiburan');
$main_url = base_url('main');

$last_mod = date("Y-m-d");
$month_mod = date("Y-m")."-01";

// Load Database
$this->load->model('Model_master','model_master',TRUE);

$map_url = $this->uri->segment(1);
$map_url = str_replace('.xml','',$map_url);
$map_url2 = explode("-", $map_url);

echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(count($map_url2) > 1)
{
	// Percobaan mencari nilai awal
	if(count($map_url2) > 2)
	{
		$awal = intval($map_url2[2]);
	}
	
	// Mulai mengidentifikasi
	if(isset ($map_url2[1]) && ($map_url2[1] == 'laman'))
	{
		echo '
			<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
				<url>
					<loc>'.$base_url.'</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.5</priority>
				</url>
				<url>
					<loc>'.$base_url.'main/berita.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.2</priority>
				</url>
				<url>
					<loc>'.$base_url.'kontak</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>monthly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$base_url.'kebijakan-privasi</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>monthly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$base_url.'ppdb</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>monthly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/sekolah/sejarah.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				
				<url>
					<loc>'.$main_url.'/sekolah/profil.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/sekolah/visi-misi.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/sekolah/struktur-organisasi.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/team</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/prodi/tkro.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/prodi/tkj.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/hizbul-wathan.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/ipm.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/tapak-suci.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/pks.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/marching-band.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/calung.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/paskibra.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/sepak-bola.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/futsal.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/pam.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
				<url>
					<loc>'.$main_url.'/ekstrakulikuler/kokam.html</loc>
					<lastmod>'.$last_mod.'</lastmod>
					<changefreq>weekly</changefreq>
					<priority>0.1</priority>
				</url>
			</urlset>
		';
	}
	
	if(isset ($map_url2[1]) && ($map_url2[1] == 'berita'))
	{
		// Sitemap Berita
		if(count($map_url2) > 2)
		{
			$berita = $this->model_main->get_sitemap_berita($awal);
			
			echo '
				<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
			';
			
			if($berita !== FALSE)
			{
				foreach($berita AS $brt)
				{
					$url_judul = url_title($brt->judul_berita, '-', TRUE);
					$url_berita = $main_url.'/berita/baca/'.$brt->id_berita.'/'.$url_judul.".html";
					
					echo '
					<url>
						<loc>'.$url_berita.'</loc>
						<lastmod>'.$last_mod.'</lastmod>
						<changefreq>weekly</changefreq>
						<priority>0.2</priority>
					</url>
					';
				}
			}			
			echo '	
				</urlset>';
		}else{
			$hitung_berita = $this->model_main->hitung_data('id_berita','berita_berita');
			$max_data = floor($hitung_berita/100);
			
			echo '
				<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
				
				';
				for($i=$max_data;$i>=0;$i--)
				{
				$ix = $i*100;
				echo '
					<sitemap>
						<loc>'.$sitemap_url.'-berita-'.$ix.'.xml</loc>
						<lastmod>'.$last_mod.'</lastmod>
					</sitemap>
				';
				}
			echo '
				</sitemapindex>';
		}
		
	}
	
	if(isset ($map_url2[1]) && ($map_url2[1] == 'galeri'))
	{
		// sitemap Galeri
		if(count($map_url2) > 2)
		{
			$galeri = $this->model_main->get_sitemap_galeri($awal);
			
			echo '
				<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
			';
			
			if($galeri !== FALSE)
			{
				foreach($galeri AS $gal)
				{
					$url_judul = url_title($gal->judul_post, '-', TRUE);
					$url_galeri = $main_url.'/galeri/detail/'.$gal->id_galeri.'/'.$url_judul.".html";
					
					echo '
					<url>
						<loc>'.$url_galeri.'</loc>
						<lastmod>'.$last_mod.'</lastmod>
						<changefreq>weekly</changefreq>
						<priority>0.2</priority>
					</url>
					';
				}
			}			
			echo '	
				</urlset>';
		}else{
			$hitung_galeri = $this->model_main->hitung_data('id_galeri','galeri_galeri');
			$max_data = floor($hitung_galeri/1000);
			
			echo '
				<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
				
				';
				for($i=$max_data;$i>=0;$i--)
				{
				$ix = $i*1000;
				echo '
					<sitemap>
						<loc>'.$sitemap_url.'-galeri-'.$ix.'.xml</loc>
						<lastmod>'.$last_mod.'</lastmod>
					</sitemap>
				';
				}
			echo '
				</sitemapindex>';
		}
		
	}
	
}else{
	echo '
		<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
			<sitemap>
				<loc>'.$sitemap_url.'-laman.xml</loc>
				<lastmod>'.$month_mod.'</lastmod>
			</sitemap>
			<sitemap>
				<loc>'.$sitemap_url.'-berita.xml</loc>
				<lastmod>'.$last_mod.'</lastmod>
			</sitemap>
		</sitemapindex>
	';
}

/* End File */