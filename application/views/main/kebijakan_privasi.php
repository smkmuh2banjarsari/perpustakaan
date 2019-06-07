<?php

$main_site = $this->config->item('main_site');
$main_url = $this->config->item('main_url');
$admin_url = $this->config->item('admin_url');
$ujian_url = $this->config->item('ujian_url');
$assets_url = $this->config->item('assets_url');
$media_url = $this->config->item('media_url');

$base_url = base_url();


$judul_laman = "Kebijakan dan Privasi";
$judul_situs = $this->model_main->get_config_data('nama_situs');
$deskripsi_situs = $this->model_main->get_config_data('deskripsi_situs');
$keyword_situs = $this->model_main->get_config_data('keyword_situs');

$map_dir = "Kebijakan dan Privasi SMK Muhammadiyah 2 Banjarsari";

$page_content = "
		<h1>Kebijakan dan Privasi</h1>
		<p>
			Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang kebijakan privasi kami, jangan ragu untuk menghubungi kami melalui <a href='$main_url/kontak'>$main_url/kontak</a> atau email <a href='mailto:sekolah@smkm2banjarsari.sch.id'>sekolah@smkm2banjarsari.sch.id</a>.
			<br />
			Kami menganggap privasi pengunjung sangat penting. Dokumen kebijakan privasi ini menjelaskan secara rinci jenis informasi pribadi yang dikumpulkan dan dicatat oleh <a href='$base_url'>$base_url</a> dan bagaimana kami menggunakannya.
		</p>
		
		<b>Apa itu cookie?</b>
		<p>Cookie adalah file teks kecil yang tersimpan di peralatan terminal (komputer atau perangkat seluler) Anda ketika mengunjungi situs web tertentu. Di Philips kami dapat menggunakan teknik serupa, seperti piksel, web beacon, sidik jari perangkat, dll. Untuk konsistensi, gabungan semua teknik ini selanjutnya akan disebut sebagai 'cookie'.</p>
		
		<b>File Log</b>
		<p>
			Seperti banyak situs Web lainnya, <a href='$base_url'>$base_url</a> memanfaatkan file log. File-file ini hanya mencatat pengunjung ke situs - biasanya prosedur standar untuk perusahaan hosting dan bagian dari analisis layanan hosting. Informasi di dalam file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), cap tanggal/waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Informasi ini digunakan untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di sekitar situs, dan mengumpulkan informasi demografis. Alamat IP, dan informasi lain semacam itu tidak ditautkan ke informasi apa pun yang dapat diidentifikasi secara pribadi.
		</p>
		
		<b>Cookie dan Beacon Web</b>
		<p>
			<a href='$base_url'>$base_url</a> menggunakan cookie untuk menyimpan informasi tentang preferensi pengunjung, untuk merekam informasi spesifik pengguna pada halaman mana yang diakses atau dikunjungi oleh pengunjung situs, dan untuk mempersonalisasi atau menyesuaikan konten halaman web kami berdasarkan jenis browser pengunjung atau lainnya informasi yang dikirim pengunjung melalui browser mereka.
		</p>
		
		<b>DoubleClick DART Cookie</b>
		<ul>
			<li>
				Google, sebagai vendor pihak ketiga, menggunakan cookie untuk menayangkan iklan di $base_url.
			</li>
			<li>
				Penggunaan cookie DART oleh Google memungkinkannya untuk menayangkan iklan kepada pengunjung situs kami berdasarkan kunjungan mereka ke $base_url dan situs lain di Internet.
			</li>
			<li>
				Pengguna dapat membatalkan penggunaan cookie DART dengan mengunjungi iklan Google dan kebijakan privasi jaringan konten di URL berikut - <a href='http://www.google.com/privacy_ads.html' target='_blank'>http://www.google.com/privacy_ads.html</a>
			</li>
		</ul>
		
		<b>Mitra Iklan Kami</b>
		<p>
			Beberapa mitra periklanan kami mungkin menggunakan cookie dan suar web di situs kami. Mitra iklan kami meliputi <br />
			* Google
			<br />
			Sementara masing-masing mitra periklanan ini memiliki Kebijakan Privasi sendiri untuk situs mereka, sumber daya yang diperbarui dan hyperlink dikelola di sini: Kebijakan Privasi.
			Anda dapat berkonsultasi daftar ini untuk menemukan kebijakan privasi untuk masing-masing mitra periklanan dari www.smkm2banjarsari.sch.id.

		</p>
		<p>
			Server iklan pihak ketiga atau jaringan iklan ini menggunakan teknologi dalam iklan dan tautan masing-masing yang muncul di www.smkm2banjarsari.sch.id dan yang dikirim langsung ke browser Anda. Mereka secara otomatis menerima alamat IP Anda ketika ini terjadi. Teknologi lain (seperti cookie, JavaScript, atau Web Beacon) juga dapat digunakan oleh jaringan iklan pihak ketiga situs kami untuk mengukur efektivitas kampanye iklan mereka dan / atau untuk mempersonalisasi konten iklan yang Anda lihat di situs.
		</p>
		<p>
			Kami TIDAK memiliki akses ke atau kontrol atas cookie ini yang digunakan oleh pengiklan pihak ketiga.
		</p>
		
		<b>Kebijakan Privasi Pihak Ketiga</b>
		<p>
			Anda harus berkonsultasi dengan kebijakan privasi masing-masing dari server iklan pihak ketiga ini untuk informasi lebih rinci tentang praktik mereka serta untuk instruksi tentang cara menyisih dari praktik tertentu. Kebijakan privasi www.smkm2banjarsari.sch.id tidak berlaku untuk, dan kami tidak dapat mengontrol aktivitas dari, pengiklan atau situs web lainnya. Anda dapat menemukan daftar komprehensif kebijakan privasi ini dan tautannya di sini: Tautan Kebijakan Privasi.
		</p>
		<p>
			Jika Anda ingin menonaktifkan cookie, Anda dapat melakukannya melalui opsi peramban individual. Informasi lebih rinci tentang manajemen cookie dengan browser web tertentu dapat ditemukan di situs web masing-masing browser.
		</p>
		
		<b>Informasi Anak</b>
		<p>
			Kami percaya penting untuk memberikan perlindungan tambahan untuk anak-anak online. Kami mendorong orang tua dan wali untuk menghabiskan waktu online dengan anak-anak mereka untuk mengamati, berpartisipasi dalam dan / atau memantau dan membimbing aktivitas online mereka. www.smkm2banjarsari.sch.id tidak dengan sengaja mengumpulkan informasi yang dapat diidentifikasi secara pribadi dari anak-anak di bawah usia 13 tahun. Jika orang tua atau wali percaya bahwa www.smkm2banjarsari.sch.id memiliki dalam database-nya informasi yang dapat diidentifikasi secara pribadi dari seorang anak di bawah pada usia 13, silakan hubungi kami segera (menggunakan kontak di paragraf pertama) dan kami akan melakukan upaya terbaik kami untuk segera menghapus informasi tersebut dari catatan kami.
		</p>
		
		<b>Hanya Kebijakan Privasi Online</b>
		<p>
			Kebijakan privasi ini hanya berlaku untuk aktivitas online kami dan berlaku untuk pengunjung situs web kami dan mengenai informasi yang dibagikan dan / atau dikumpulkan di sana. Kebijakan ini tidak berlaku untuk informasi apa pun yang dikumpulkan secara offline atau melalui saluran selain dari situs web ini.
		</p>
		
		<b>Persetujuan</b>
		<p>
			Dengan menggunakan situs web kami, Anda berarti menyetujui kebijakan privasi kami dan menyetujui persyaratannya.
			<br />
			Diperbaharui: Sabtu, 29 Desember, 2018.
			<br />
			Jika kami memperbarui, mengubah atau membuat perubahan apa pun pada kebijakan privasi kami akan menampilkannya pada halaman ini.
		</p>
		
";

require_once APPPATH."views/main/template_parse.php";

/* End of file index.php */
/* Location: ./application/views/main/index.php */
