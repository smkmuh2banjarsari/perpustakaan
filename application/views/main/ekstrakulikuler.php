<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');


$judul_laman = "Ektrakulikuler";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$page = $this->uri->segment(3);

$data_ekstra = "";
$nama_ekstra = "";
$map_dir = "<a href='$main_url'>Home</a> &#187; Ektrakulikuler ";

switch($page)
{
	case "hizbul-wathan":
		$nama_ekstra = "Hizbul Wathan";
		$judul_laman = "Hizbul Wathan";
		$map_dir .= "&#187; Hizbul Wathan ";
		
		$data_ekstra = "
			<p>
				Hizbul Wathan merupakan gerakan Kepanduan asli Muhammadiyah. Berdiri tahun 1336 H/1918 M dengan nama  Javaansche Padvinderi Organisatie dan mulai secara resmi menggunakan nama Hizbul Wathan pada tahun 1920 M. Hizbul wathan memiliki slogan Fastabiqul Khairot atau dalam bahasa Indonesia berarti berlomba-lomba dalam kebaikan. 
			</p>
			<p>
				Pada tahun 1943 Hizbul wathan pernah dihentikan sementara karena gerakan kepanduan saat itu digunakan untuk kepentingan penjajah Jepang dan bangkit kembali setelah kemerdekaan Indonesia. Pada tahun 1961, Hizbul Wathan pernah dilebur bersama semua gerakan kepanduan menjadi kepanduan Pramuka sebelum akhirnya tahun 1999 Hizbul Wathan memisahkan diri dan dibangkitkan kembali dengan nama Hizbul Wathan. 
			</p>
			
			<p>
				Saat ini Hizbul wathan merupakan gerakan kepanduan resmi SMK Muhammadiyah 2 Banjarsari.
			</p>
			
			<div class='section' style='height:20px;margin:0;padding:0;'>
			</div>
			<div class='flexslider carousel'>
				<ul class='slides'>
					<li>
					  <img src='$assets_url/org/hw-1.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/hw-2.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/hw-3.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/hw-4.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/hw-5.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/hw-6.jpg' />
					</li>
				</ul>
			</div>
			
			<div class='cl'></div>
		";
	;
	break;
	
	case "ipm":
		$nama_ekstra = "Ikatan Pelajar Muhammadiyah (IPM)";
		$judul_laman = "Ikatan Pelajar Muhammadiyah";
		$map_dir .= "&#187; Ikatan Pelajar Muhammadiyah";
		
		$data_ekstra = "
			<p>
				Ikatan Pelajar Muhammadiyah atau sering disingkat IPM merupakan Organisasi Otonom yang berada pada persyarikatan Muhammadiyah. IPM bisa disebut juga Organisasi Intra Sekolah atau biasa yang di sebut OSIS pada sekolah negeri, tetapi jika di sekolah Muhammadiyah IPM ini lah sebagai Organisasi Siswa Intra Sekolah. 
			</p>
			
			<b>Tujuan Ikatan Pelajar Muhammadiyah</b>
			
			<p>
			'TERBENTUKNYA PELAJAR MUSLIM YANG BERILMU, BERAKHLAQ MULIA, DAN TERAMPIL DALAM RANGKA MENEGAKKAN DAN MENJUNJUNG TINGGI NILAI-NILAI AJARAN ISLAM SEHINGGA TERWUJUDNYA MASYARAKAT ISLAM YANG SEBENAR-BENARNYA'
			</p>
			
			<b>Semboyan Ikatan Pelajar Muhammadiyah</b>
			<p>
			Semboyan IPM ada dalam Al-Quran surat Al-qalam ayat 1 yang berbunyi 'Nuun Walqalami Wamaa Yasturuun' yang artinya 'Nuun, Demi Pena dan Apa yang Dituliskannya' itulah semboyan IPM sebagai organisasi pelajar.
			</p>
			
			<b>Jaringan Ikatan Pelajar Muhammadiyah</b>
			<p>
				Susunan organisasi IPM dibuat secara berjenjang dari tingkat Pimpinan Pusat, Pimpinan Wilayah, Pimpinan Daerah, Pimpinan Cabang, dan tingkat Ranting. Pimpinan Pusat adalah kesatuan wilayah-wilayah dalam ruang lingkup nasional. Pimpinan Wilayah adalah kesatuan daerah-daerah dalam tingkat propinsi atau daerah tingkat I. Pimpinan Daerah adalah kesatuan cabang-cabang dalam tingkat kabupaten/kotamadia atau daerah tingkat II. Sedangkan Pimpinan Cabang adalah kesatuan ranting-ranting dalam satu kecamatan. Pimpinan Ranting adalah kesatuan anggota-anggota dalam satu sekolah, desa/kelurahan atau tempat lainnya. Saat ini, Ikatan Pelajar Muhammadiyah telah menjangkau seluruh wilayah Indonesia.
			</p>
		";
	;
	break;
	
	case "tapak-suci":
		$nama_ekstra = "Tapak Suci Putera Muhammadiyah";
		$judul_laman = "Tapak Suci";
		$map_dir .= "&#187; Tapak Suci ";
		
		$data_ekstra = "
			<p>Perguruan Seni Beladiri Indonesia Tapak Suci Putera Muhammadiyah atau disingkat Tapak Suci, adalah sebuah aliran, perguruan, dan organisasi pencak silat yang merupakan anggota IPSI (Ikatan Pencak Silat Indonesia). Tapak Suci termasuk dalam 10 Perguruan Historis IPSI, yaitu perguruan yang menunjang tumbuh dan berkembangnya IPSI sebagai organisasi. Tapak Suci berasas Islam, bersumber pada Al Qur'an dan As-Sunnah, berjiwa persaudaraan, berada di bawah naungan Persyarikatan Muhammadiyah sebagai organisasi otonom yang ke-11. Tapak Suci berdiri pada tanggal 10 Rabiul Awal 1383 H, atau bertepatan dengan tanggal 31 Juli 1963 di Kauman, Yogyakarta. Tapak Suci memiliki motto 'Dengan Iman dan Akhlak saya menjadi kuat, tanpa Iman dan Akhlak saya menjadi lemah'. Organisasi Tapak Suci berkiprah sebagai organisasi pencak silat, berinduk kepada Ikatan Pencak Silat Indonesia, dan dalam bidang dakwah pergerakan Tapak Suci merupakan pencetak kader dari Muhammadiyah. Pimpinan Pusat Tapak Suci Putera Muhammadiyah berkedudukan di Kauman, Yogyakarta, dan memiliki kantor perwakilan di ibukota negara. <br />
			Tapak suci mempunyai ketua umum Muhammad Afnan Hadikusumo.
			</p>
			
			<b>Aliran Tapak Suci</b>
			<p>
			Aliran Tapak Suci adalah keilmuan pencak silat yang berlandaskan Al Islam, bersih dari syirik dan menyesatkan, dengan sikap mental dan gerak langkah yang merupakan tindak tanduk kesucian dan mengutamakan Iman dan Akhlak, serta berakar pada aliran Banjaran-Kauman, yang kemudian dikembangkan dengan metodis dan dinamis.
			</p>
			
			<b>Perguruan Tapak Suci</b>
			<p>
			Perguruan Tapak Suci adalah perguruan yang merupakan peleburan sekaligus kelanjutan dari tiga paguron yang pernah ada sebelumnya, yaitu: Kasegu, Seranoman (baca : Sironoman), dan Kauman, berlandaskan Al Islam dan berjiwa ajaran KH. Ahmad Dahlan, membina pencak silat yang berwatak serta berkepribadian Indonesia, melestarikan budaya bangsa yang luhur dan bermoral, serta mengabdikan perguruan untuk perjuangan agama, bangsa, dan negara.
			</p>
			
			<b>Sejarah Tapak Suci</b>
			<p>
			Sebelum kelahiran Tapak Suci <br />
			Tahun 1872, di Banjarnegara lahir seorang putera dari KH. Syuhada, yang kemudian diberi nama Ibrahim. Ibrahim kecil memiliki karakter yang berani dan tangguh sehingga disegani oleh kawan-kawannya. Ibrahim belajar pencak dan kelak menginjak usia remaja telah menunjukkan ketangkasan pencak silat. Setelah menjadi buronan Belanda, Ibrahim berkelana hingga sampai ke Betawi, dan selanjutnya ke Tanah Suci. Sekembalinya dari Tanah Suci, menikah dengan puteri KH. Ali. Ibrahim kemudian mendirikan Pondok Pesantren Binorong di Banjarnegara. Sepulang dari ibadah haji, Ibrahim masih menjadi buronan Belanda, sehingga kemudian berganti nama menjadi KH.Busyro Syuhada. Pondok Pesantren Binorong, berkembang pesat, di antara santri-santrinya antara lain Achyat adik misan Ibrahim, M. Yasin (adik kandung), dan Soedirman, yang kelak menjadi Jenderal Besar.
			<br />
			Tahun 1921 dalam konferensi Pemuda Muhammadiyah di Yogyakarta, KH. Busyro bertemu pertama kali dengan dua kakak beradik; A.Dimyati dan M.Wahib. Diawali dengan adu kaweruh antara M.Wahib dengan Achyat (kelak berganti nama menjadi H. Burhan), selanjutnya kedua kakak beradik ini mengangkat KH. Busyro sebagai Guru.
			<br />
			KH. Busyro Syuhada kemudian pindah dan menetap di Yogyakarta sehingga aliran Pencak Silat Banjaran, yang pada awalnya dikembangkan melalui Pondok Pesantren Binorong kemudian dikembangkan di Kauman, Yogyakarta. Atas restu Pendekar Besar KH. Busyro, A. Dimyati dan M.Wahib diizinkan untuk membuka perguruan dan menerima murid. Tahun 1925 dibukalah Perguruan Pencak Silat di Kauman, terkenal dengan nama Cikauman. Perguruan Cikauman, dipimpin langsung oleh Pendekar Besar M. Wahib dan Pendekar Besar A. Dimyati.
			Tersebutlah M. Syamsuddin, murid Cikauman yang dinyatakan berhasil dan lulus, diizinkan untuk menerima murid dan mendirikan Perguruan Seranoman. Perguruan Seranoman berletak di kauman sebelah utara, melahirkan seorang Pendekar Muda M. Zahid yang mempunyai seorang murid andalan bernama Moh. Barrie Irsyad.
			<br />
			Pendekar Moh. Barrie Irsyad, sebagai murid angkatan ke-6 yang telah dinyatakan lulus dalam menjalani penggemblengan oleh Pendekar M. Zahid, M. Syamsuddin, M. Wahib dan A. Dimyati. Kemudian mendirikan Perguruan KASEGU. Kasegu, merupakan senjata khas yang berlafal Muhammad yang diciptakan oleh Pendekar Moh. Barrie Irsyad.
			</p>
			
			<b>Kelahiran Tapak Suci</b>
			<p>
			Atas desakan murid-murid Perguruan Kasegu kepada Pendekar Moh. Barrie Irsyad untuk mendirikan satu perguruan yang mengabungkan perguruan yang sejalur (Cikauman, Seranoman dan Kesegu). Perguruan Tapak Suci berdiri pada tanggal 31 Juli 1963 di Kauman, Yogyakarta. Ketua Umum pertama Tapak Suci adalah Djarnawi Hadikusumo. 
			<br />
			Setelah berdiri Tapak Suci menerima permintaan untuk membuka cabang di daerah-daerah. Secara otomatis TAPAK SUCI menjadi wadah silaturahmi para pendekar yang berada di lingkungan Muhammadiyah. Pada tahun 1964, ketika itu Pimpinan Pusat Muhammadiyah diketuai oleh KH Ahmad Badawi, Tapak Suci diterima menjadi organisasi otonom Muhammadiyah. Nama perguruan menjadi Tapak Suci Putera Muhammadiyah, disingkat Tapak Suci.
			<br />
			Keluarga I Tapak Suci berdiri di Jawa Timur, lalu disusul di Sumatera Selatan, Jakarta, dan Sumatra Barat. Kini Tapak Suci telah menyebar ke Singapura, Belanda, Jerman, Austria, dan Mesir.
			</p>
			
			<div class='section' style='height:20px;margin:0;padding:0;'>
			</div>
			<div class='flexslider carousel'>
				<ul class='slides'>
					<li>
					  <img src='$assets_url/org/tapak-suci1.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/tapak-suci2.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/tapak-suci3.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/tapak-suci4.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/tapak-suci5.jpg' />
					</li>
				</ul>
			</div>
			<div class='cl'></div>
		";
	;
	break;
	
	case "pks":
		$nama_ekstra = "Patroli Keamanan Sekolah";
		$map_dir .= "&#187; PKS ";
		
		$data_ekstra = "
			<p>
				Patroli Keamanan Sekolah atau dapat disingkat PKS adalah salah satu jenis kegiatan ekstrakurikuler yang umum ditemui di sekolah-sekolah di Indonesia yang dibentuk 5 Mei 1965. <br />
				Saat ini PKS merupakan salah satu Organisasi yang ada di SMK Muhammadiyah 2 Banjarsari.
			</p>
			
			<b>Tugas</b>
			<p>
				Tugas PKS adalah mengatur lalu lintas di lingkungan sekolah dan lingkungan sekitar sekolah, terutama pada saat menyeberangkan siswa-siswi yang akan menuju ke sekolah maupun yang akan meninggalkan sekolah. PKS juga dapat bertugas di tempat-tempat lain yang sedang melaksanakan kegiatan sekolah, umpamanya pada saat kegiatan Porseni, menyambut perayaan hari-hari besar dan kegiatan lainnya. Walaupun semata-mata PKS bertugas untuk kawan-kawan sesekolahnya, dibenarkan juga kalau mereka melaksanakan tugasnya terhadap pemakai jalan lain, seperti menyeberangkan siswa-siswi dari sekolah lain. Orang lanjut usia atau siapa saja yang ada di tempat itu dan memerlukan pertolongan, bahkan anggota PKS pun bisa membantu tugas para Polisi yang ada di jalan.
			</p>
			
			<div class='section' style='height:20px;margin:0;padding:0;'>
			</div>
			<div class='flexslider carousel'>
				<ul class='slides'>
					<li>
					  <img src='$assets_url/org/pks-1.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/pks-2.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/pks-3.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/pks-4.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/pks-5.jpg' />
					</li>
				</ul>
			</div>
			<div class='cl'></div>
		";
	;
	break;
	
	case "paskibra":
		$nama_ekstra = "Paskibra";
		$map_dir .= "&#187; Paskibra ";
		
		$data_ekstra = "
			Paskibra
		";
	;
	break;
	
	case "marching-band":
		$nama_ekstra = "Marching Band";
		$map_dir .= "&#187; Marching Band ";
		
		$data_ekstra = "
			<p>
				Marching band atau Drum Band adalah sekelompok barisan orang yang memainkan satu atau beberapa lagu dengan menggunakan sejumlah kombinasi alat musik (tiup, perkusi, dan sejumlah instrumen pit) secara bersama-sama. Penampilan drumben merupakan kombinasi dari permainan musik (tiup, dan perkusi) serta aksi baris-berbaris dari pemainnya. Umumnya, penampilan Drumben dipimpin oleh satu atau dua orang Komandan Lapangan dan dilakukan baik di lapangan terbuka maupun lapangan tertutup dalam barisan yang membentuk formasi dengan pola yang senantiasa berubah-ubah sesuai dengan alur koreografi terhadap lagu yang dimainkan, dan diiringi pula dengan aksi tarian yang dilakukan oleh sejumlah pemain bendera.
			</p>
			
			<p>
				Drumband umumnya dikategorikan menurut fungsi, jumlah anggota, komposisi dan jenis peralatan yang digunakan, serta gaya atau corak penampilannya. Penampilan drumben pada mulanya adalah sebagai pengiring parade perayaan ataupun festival yang dilakukan di lapangan terbuka dalam bentuk barisan dengan pola yang tetap dan kaku, serta memainkan lagu-lagu mars. Dinamika keseimbangan penampilan diperoleh melalui atraksi individual yang dilakukan oleh mayoret, ataupun beberapa personel pemain instrumen. Namun saat ini permainan musik drumben dapat dilakukan baik di lapangan terbuka ataupun tertutup sebagai sebagai pengisi acara dalam suatu perayaan, ataupun kejuaraan.
			</p>
			
			<p>
				Saat ini Drumben merupakan salah satu organisasi yang ada pada SMK Muhammadiyah 2 Banjarsari.
			</p>
			
			<div class='section' style='height:20px;margin:0;padding:0;'>
			</div>
			<div class='flexslider carousel'>
				<ul class='slides'>
					<li>
					  <img src='$assets_url/org/marching-band1.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/marching-band2.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/marching-band3.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/marching-band4.jpg' />
					</li>
					<li>
					  <img src='$assets_url/org/marching-band5.jpg' />
					</li>
				</ul>
			</div>
			<div class='cl'></div>
		";
	;
	break;
	
	case "calung":
		$nama_ekstra = "Calung";
		$map_dir .= "&#187; Calung ";
		
		$data_ekstra = "
			Ektrakulikuler Calung
		";
	;
	break;
	
	case "sepak-bola":
		$nama_ekstra = "Sepakbola";
		$map_dir .= "&#187; Sepakbola ";
		
		$data_ekstra = "
			Sepakbola
		";
	;
	break;
	
	case "futsal":
		$nama_ekstra = "Futsal";
		$map_dir .= "&#187; Futsal ";
		
		$data_ekstra = "
			Ektrakulikuler Futsal
		";
	;
	break;
	
	case "pam":
		$nama_ekstra = "Pecinta Alam Muhammadiyah (PAM)";
		$map_dir .= "&#187; Pecinta Alam Muhammadiyah ";
		
		$data_ekstra = "
			Ektrakulikuler Pecinta Alam Muhammadiyah (PAM)
		";
	;
	break;
	
	case "kokam":
		$nama_ekstra = "Komando Keamanan Muhammadiyah (KOKAM)";
		$map_dir .= "&#187; Komando Keamanan Muhammadiyah ";
		
		$data_ekstra = "
			Ektrakulikuler Komando Keamanan Muhammadiyah (KOKAM)
		";
	;
	break;
	
	default:
		$data_ekstra = "
			Ektrakulikuler yang berada pada $judul_situs meliputi : <br /><br />
			<a href='$main_url/ekstrakulikuler/hizbul-wathan'>Hizbul Wathan</a> <br />
			<a href='$main_url/ekstrakulikuler/ipm'>Ikatan Pelajar Muhammadiyah</a> <br />
			<a href='$main_url/ekstrakulikuler/tapak-suci'>Tapak Suci Putera Muhammadiyah</a> <br />
			<a href='$main_url/ekstrakulikuler/pks'>Patroli Keamanan Sekolah</a> <br />
			<a href='$main_url/ekstrakulikuler/paskibra'>Paskibra</a> <br />
			<a href='$main_url/ekstrakulikuler/marching-band'>Marching Band</a> <br />
			<a href='$main_url/ekstrakulikuler/calung'>Calung</a> <br />
			<a href='$main_url/ekstrakulikuler/sepak-bola'>Sepakbola</a> <br />
			<a href='$main_url/ekstrakulikuler/futsal'>Futsal</a> <br />
			<a href='$main_url/ekstrakulikuler/pam'>Pecinta Alam Muhammadiyah</a> <br />
			<a href='$main_url/ekstrakulikuler/kokam'>Komando Keamanan Muhammadiyah</a> <br />
		";
	;
	break;
}






$page_content = "
	<aside class='f_widget ab_widget'>
		<h3>$nama_ekstra</h3>
		
		$data_ekstra
	</aside>
	
";


require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
