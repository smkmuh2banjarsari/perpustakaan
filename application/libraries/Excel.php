<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require(APPPATH.'libraries/office/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;
// End load library phpspreadsheet

class Excel  {

	public function nilai_ujian($data, $filename="a", $stream=true, $papersize = 'A4', $orientation = 'portrait')
	{
		// Create new Spreadsheet object
		$spreadsheet = IOFactory::load('./media/template/usbn.xlsx'); //new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Dadan Setia')
		->setLastModifiedBy('Auto')
		->setTitle($filename)
		->setSubject('Hasil Nilai Ujian')
		->setDescription('Hasil Data Ujian')
		->setKeywords('ujian openxml php')
		->setCategory('Ujian');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('C2', str_replace("ujian_","",$filename))
		;
		
		$i=5; 
		foreach($data as $pst) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, ($i-4))
			->setCellValue('B'.$i, $pst->nama_lengkap)
			->setCellValue('C'.$i, $pst->nisn)
			->setCellValue('D'.$i, $pst->nama_kelas)
			->setCellValue('E'.$i, $pst->platform)
			->setCellValue('F'.$i, $pst->jumlah_diblokir)
			->setCellValue('G'.$i, $pst->skor_akhir)
			->setCellValue('H'.$i, NULL)
			;
			$i++;
		}
		
		

		//$spreadsheet->getStyle('A5:H'.$i)->applyFromArray($styleArray);
		
		/*default

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('B1', 'Daftar Nilai')
		->setCellValue('C1', $filename)
		->setCellValue('A3', 'NO')
		->setCellValue('B3', 'NISN')
		->setCellValue('C3', 'NAMA')
		->setCellValue('D3', 'KELAS')
		->setCellValue('E3', 'PLATFORM')
		->setCellValue('F3', 'DIBLOKIR')
		->setCellValue('G3', 'SKOR')
		->setCellValue('H3', 'NILAI')
		;

		// Miscellaneous glyphs, UTF-8
		$i=4; 
		foreach($data as $pst) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, ($i-3))
			->setCellValue('B'.$i, $pst->nisn)
			->setCellValue('C'.$i, $pst->nama_lengkap)
			->setCellValue('D'.$i, $pst->nama_kelas)
			->setCellValue('E'.$i, $pst->platform)
			->setCellValue('F'.$i, $pst->jumlah_diblokir)
			->setCellValue('G'.$i, $pst->skor_akhir);
			$i++;
		}
		
		*/

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Nilai Ujian');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function data_pendaftar($data, $filename="a", $stream=true, $papersize = 'A4', $orientation = 'portrait')
	{
		// Create new Spreadsheet object
		$spreadsheet = IOFactory::load('./media/template/psb.xlsx');

		
		// Set document properties
		$spreadsheet->getProperties()->setCreator('Dadan Setia')
		->setLastModifiedBy('Auto')
		->setTitle("Pendaftaran Tahun ".$filename)
		->setSubject('Data Pendaftar')
		->setDescription('Data Pendaftar')
		->setKeywords('data pendaftar php')
		->setCategory('daftar');

		// Add some data
		$thn_ajaran = $filename.'/'.(intval($filename)+1);
		
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('C2', $thn_ajaran)
		;

		// Miscellaneous glyphs, UTF-8
		$i=5; 
		$b_awal = "A".$i; //border awal
		$b_akhir = "B".$i; // Border Akhir
		
		foreach($data as $pst) {
			
			// custom data
			$jk = "L";
			if($pst->jenis_kelamin == FALSE)
			{
				$jk = "P";
			}
			
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, ($i-4))
			->setCellValue('B'.$i, $pst->nama_lengkap)
			->setCellValue('C'.$i, $pst->nisn)
			->setCellValue('D'.$i, $pst->nik)
			->setCellValue('E'.$i, $pst->jurusan_minat)
			->setCellValue('F'.$i, $jk)
			->setCellValue('G'.$i, $pst->tempat_lahir)
			->setCellValue('H'.$i, date("d-m-Y", strtotime($pst->tanggal_lahir)))
			;
			
			$b_akhir = "AK".$i;
			
			$i++;
		}
		
		
		$styleArray = array(
			'font' => [
				'bold' => false,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => 'FF000000'],
				],
			],
			
		);
		
		$spreadsheet->getActiveSheet()->getStyle($b_awal.':'.$b_akhir)->getNumberFormat()->setFormatCodePhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$spreadsheet->getActiveSheet()->getStyle($b_awal.':'.$b_akhir)->applyFromArray($styleArray)->getAlignment()->setWrapText(true);
		unset($styleArray);
		
		//$spreadsheet->getActiveSheet()->toArray(null, true, true, true);

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Data Pendaftar');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		
		

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="psb_'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function presensi_kelas($data, $filename="a", $stream=true, $papersize = 'A4', $orientation = 'portrait')
	{
		// Create new Spreadsheet object
		$spreadsheet = IOFactory::load('./media/template/presensi.xlsx'); //new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Dadan Setia')
		->setLastModifiedBy('Auto')
		->setTitle($filename)
		->setSubject('Hasil Nilai Ujian')
		->setDescription('Hasil Data Ujian')
		->setKeywords('ujian openxml php')
		->setCategory('Ujian');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('D2', $filename)
		;
		
		$i=5; 
		foreach($data as $pst) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, ($i-4))
			->setCellValue('B'.$i, $pst->nis)
			->setCellValue('C'.$i, $pst->nisn)
			->setCellValue('D'.$i, $pst->nama_lengkap)
			->setCellValue('E'.$i, NULL)
			;
			$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Presensi Kelas');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="presensi_'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function get_siswa()
	{
		$arr_file = explode('.', './siswa.xlsx');
		$extension = end($arr_file);

		if('csv' == $extension) {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}

		$spreadsheet = $reader->load('./siswa.xlsx');
		 
		$sheetData = $spreadsheet->getActiveSheet()->toArray();
		
		return($sheetData);
	}
}
