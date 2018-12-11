<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Excel 
{
	
	function __construct()
	{
		
	}

	public static function Header_format__($colorHeader = null, $boldStyle = null, $range, $spreadsheet){

      if($colorHeader == null){
      	$colorHeader = 'c2cec5';
      }

     if($boldStyle == null){
     	$boldStyle = true;
      }

			    $styleArray = [
			    'font' => [
			        'bold' => $boldStyle,
			    ],
			    'alignment' => [
			        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
			    ],
			    'borders' => [
			     /*   'top' => [
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			        ],*/
			    ],
			    'fill' => [
			        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
			        'rotation' => 90,
			        'startColor' => [
			            'argb' => $colorHeader,
			        ],
			        
			    ],
			];

        $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);
	}

	public static function borders__($spreadsheet, $color, $range){
           $styleArray = [
			    'borders' => [
			     'outline' => [
				            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				            'color' => ['argb' => $color],
				        ],
			    ],
			];

        $spreadsheet->getActiveSheet()->getStyle($range)->applyFromArray($styleArray);
	}


	public static function Create_Excel__($typeFont = null, $Size = null){
		if($typeFont == null){
			$typeFont ="Arial";
		}

		if($Size == null){
			$Size = 11;
		}

		     $spreadsheet = new Spreadsheet();
             $sheet = $spreadsheet->getActiveSheet();
		     $spreadsheet->getDefaultStyle()
		    ->getFont()
		    ->setName($typeFont)
		    ->setSize($Size);

		    return $spreadsheet;
	}

	public static function Values_Header__($spreadsheet, $index, $ArrayColumnas, $ArrayTitulo){
		    for ($i=0; $i <count($ArrayColumnas) ; $i++) { 
		    	 $spreadsheet->setActiveSheetIndex(0)->setCellValue($ArrayColumnas[$i]  , $ArrayTitulo[$i]  );
		    }
	}

	public static function ColumnDimension_AutoSize__($autoSize,$ArrayColumnas, $spreadsheet){     
          for ($i=0; $i <count($ArrayColumnas) ; $i++) { 
          	$spreadsheet->getActiveSheet()->getColumnDimension($ArrayColumnas[$i])->setAutoSize($autoSize);
          }
	}

	public static function save__($spreadsheet, $filename =null){
        if($filename == null || $filename == ""){
        	$filename= "Default-excel-report";
        }
		$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file 
	}

}

