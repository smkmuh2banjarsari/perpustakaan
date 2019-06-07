<!DOCTYPE html>

<html lang="id_ID">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=no" />
		<meta name="description" content="Halaman administrasi" />
		<meta name="keywords" content="sekolah, edukasi, pendidikan" />
		<meta name="author" content="Dadan Setia" />
		<meta name="robots" content="noindex, nofollow" />
		
		<title>{judul_situs} | {nama_situs}</title>
		
		<link href="{base_url}favicon.ico" rel="icon" type="image/x-icon" />
		
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/webicons.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/jquery-ui.theme.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/foundation-icons.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/foundation.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/jquery.timepicker.css" />
		<link rel="stylesheet" type="text/css" href="{base_url}assets/css/style.edukasi.css" />
		
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/jquery-3.3.1.min.js">
		</script>
		<script type="text/javascript" type="text/javascript" src="{base_url}assets/js/foundation.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/jquery-ui.min.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/jquery.timepicker.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/tinymce/tinymce.min.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/hichart/highcharts.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/hichart/highcharts-3d.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/hichart/modules/exporting.js">
		</script>
		<script type="text/javascript" src="{base_url}assets/js/foundation.js">
		</script>
		
		<script type="text/javascript">
			
			var urlimg = "{base_url}assets/images";
			ib = {};
			var editor = new tinymce.Editor(
                'textnode',
                {
                    theme: "advanced",
                    plugins : "autolink,lists,spellchecker,pagebreak,table,advlink,inlinepopups,insertdatetime,preview,searchreplace,contextmenu,paste",
                    //content_css: cssfile,
                    // Theme options
                    theme_advanced_buttons1 : "newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,link,unlink",
                // Changed iespell to Nanospell for button ...
                    theme_advanced_buttons2 : "insertdate,inserttime,preview,|,forecolor,backcolor,|,visualaid,|,sub,sup,|,tablecontrols,|,spellchecker,|,del,ins,|,blockquote,pagebreak",
                    theme_advanced_buttons3 : "",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : false,
                    theme_advanced_resizing_use_cookie : false,
                    // Skin options
                    skin : "o2k7",
                    skin_variant : "silver"
                }               
        );
        editor.render();
        setTimeout(function(){editor.focus();}, 1000);
         
    // Load the text into the editor window ...
	
        try {
            editor.setContent(unescape(tmpdata));
        }
        catch(ex){
            editor.onInit.add(function(){
                this.setContent(this.getContent() + tmpdata);                                
            });
        }
			/*
			tinyMCE.init({
				//mode : "textareas",
				mode : "specific_textareas",
				editor_selector : "konten",
				language: 'id',
				menubar: true,
				theme : "modern",
				width: "100%",
				height : "480",
				plugins : "advlist autolink lists link image charmap print hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template paste textcolor colorpicker textpattern imagetools",
				
				toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
				toolbar2: "print  media | forecolor backcolor emoticons | code",
				image_advtab: true,
				templates: [
					{title: 'Test template 1', content: 'Test 1'},
					{title: 'Test template 2', content: 'Test 2'}
				]
			});*/
			
			$(document).ready(
				function(){
					
					if ($(window).scrollTop() == 0) {
						$("#keAtas").fadeOut(1000);
					}
					
					$(window).scroll(function() {
						if ($(this).scrollTop() != 0) {
								$("#keAtas").fadeIn();
								
						} else {
								$("#keAtas").fadeOut();
						}
					});
					
					$("#keAtas").click(function(event) {
						event.preventDefault();
						$("html,body").animate({scrollTop: 0},2000);
					});
					
					$(".reset").bind("click", function() {
					  $("input[type=text], textarea").val("");
					});
					
					$("#nama_sekolah" ).autocomplete({
						source: '{base_url}master/data/sekolah'
					});
					
					
					var tahun_ini = new Date().getFullYear();
					var tahun_min = tahun_ini - 80;
					var tahun_max = tahun_ini + 3;
					var tahun_lahir = tahun_ini - 10;
					
					$("#tanggal_lahir" ).datepicker({
						monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
						dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sa" ],
						yearRange: tahun_min+":"+tahun_lahir,
						defaultDate: tahun_lahir+"-01-01",
						changeYear: true,
						dateFormat: "yy-mm-dd"
					});
					$("#tanggal_masuk" ).datepicker({
						monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
						dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sa" ],
						yearRange: tahun_min+":"+tahun_max,
						changeYear: true,
						dateFormat: "yy-mm-dd"
					});
					$("#tanggal_berhenti" ).datepicker({
						monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
						dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sa" ],
						yearRange: tahun_min+":"+tahun_max,
						changeYear: true,
						dateFormat: "yy-mm-dd"
					});
					$('.pilih_jam').timepicker({
						timeFormat: 'hh:mm',
						interval: 5,
						minTime: '07:00',
						maxTime: '04:00pm',
						defaultTime: '',
						startTime: '07:00',
						dynamic: false,
						dropdown: true,
						scrollbar: true
					});
					$('#tambah_jawaban').click(function(){
						$('#jawaban').append('<tr><td>#</td><td><textarea name="jawaban[]"></textarea><input type="file" name="gambar_jawaban[]" multiple="multiple" /></td><td><input type="radio" name="benar[]" value="1" /></td><td><input type="number" name="skor[]" value="0" /></td></tr>');
					})
					;
				}
			);
			
		</script>
		
	</head>
	<body>
		<div id="container" class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="large-12 cell">
					<h1>{nama_situs}</h1>
				</div>
			</div>
			<div class="grid-x grid-padding-x">
				
				<div class="large-4 medium-4 cell">
					<a href="{admin_url}">Dashboard</a>
					<br /><br />
					{menu_kiri}
					<br />
					<b>Keluar Sistem</b>
					<br />
					<a href="{base_url}room/logout">Logout</a> <br />
						{elapsed_time}
				</div>
				<div class="large-8 medium-8 cell" style="background:#ffffff">
					<div class="large-12">
						{map_dir}
					</div>
					<div class="linebrown"></div>
					
					{page_content} 
					
					<!--<h5>Here’s your basic grid:</h5>
					 Grid Example

					<div class="grid-x grid-padding-x">
					<div class="large-12 cell">
					  <div class="primary callout">
						<p><strong>This is a twelve cell section in a grid-x.</strong> Each of these includes a div.callout element so you can see where the cell are - it's not required at all for the grid.</p>
					  </div>
					</div>
					</div>
					<div class="grid-x grid-padding-x">
					<div class="large-6 medium-6 cell">
					  <div class="primary callout">
						<p>Six cell</p>
					  </div>
					</div>
					<div class="large-6 medium-6 cell">
					  <div class="primary callout">
						<p>Six cell</p>
					  </div>
					</div>
					</div>
					<div class="grid-x grid-padding-x">
					<div class="large-4 medium-4 small-4 cell">
					  <div class="primary callout">
						<p>Four cell</p>
					  </div>
					</div>
					<div class="large-4 medium-4 small-4 cell">
					  <div class="primary callout">
						<p>Four cell</p>
					  </div>
					</div>
					<div class="large-4 medium-4 small-4 cell">
					  <div class="primary callout">
						<p>Four cell</p>
					  </div>
					</div>
					</div>

					<hr>

					<h5>We bet you’ll need a form somewhere:</h5>
					<form>
					<div class="grid-x grid-padding-x">
					  <div class="large-12 cell">
						<label>Input Label</label>
						<input type="text" placeholder="large-12.cell">
					  </div>
					</div>
					<div class="grid-x grid-padding-x">
					  <div class="large-4 medium-4 cell">
						<label>Input Label</label>
						<input type="text" placeholder="large-4.cell">
					  </div>
					  <div class="large-4 medium-4 cell">
						<label>Input Label</label>
						<input type="text" placeholder="large-4.cell">
					  </div>
					  <div class="large-4 medium-4 cell">
						<div class="grid-x">
						  <label>Input Label</label>
						  <div class="input-group">
							<input type="text" placeholder="small-9.cell" class="input-group-field">
							<span class="input-group-label">.com</span>
						  </div>
						</div>
					  </div>
					</div>
					<div class="grid-x grid-padding-x">
					  <div class="large-12 cell">
						<label>Select Box</label>
						<select>
						  <option value="husker">Husker</option>
						  <option value="starbuck">Starbuck</option>
						  <option value="hotdog">Hot Dog</option>
						  <option value="apollo">Apollo</option>
						</select>
					  </div>
					</div>
					<div class="grid-x grid-padding-x">
					  <div class="large-6 medium-6 cell">
						<label>Choose Your Favorite</label>
						<input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Radio 1</label>
						<input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Radio 2</label>
					  </div>
					  <div class="large-6 medium-6 cell">
						<label>Check these out</label>
						<input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
						<input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
					  </div>
					</div>
					<div class="grid-x grid-padding-x">
					  <div class="large-12 cell">
						<label>Textarea Label</label>
						<textarea placeholder="small-12.cell"></textarea>
					  </div>
					</div>
					</form>
					 -->
				</div>
			</div>
			<div id="footer" class="grid-x grid-padding-x">
				<div class="large-12 cell" style="text-align:center;">
					&copy; {tahun_sekarang} Dadan Setia
				</div>
			</div>
		</div>
		
		<div id="keAtas" style="display: none">
			<a href="#atas"><img alt="atas" src="{base_url}assets/images/keatas.png" /></a>
		</div>
		
		<!-- End Content -->
	
	</body>
</html>