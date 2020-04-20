<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  ======================================= 
 *  Author     : Web Preparations Team
 *  License    : Protected 
 *  Email      : admin@webpreparations.com 
 * 
 *  ======================================= 
 */
  require_once APPPATH . "/third_party/excel/Classes/PHPExcel.php";
class Excel extends PHPExcel {
	// public $header;
    // public $footer;
    public $output;
    public $import_err;
    public $json_data;
    public $json_path;
    

    public function __construct() {
        parent::__construct();
        $obj = new PHPExcel();
    }

    // public function _header($value='')
    // {
    //  $this->header=
    // }
    // public function _footer($value='')
    // {
    //  # code...
    // }
    public function export($data='')
    {       
        $obj->setActiveSheetIndex(0);
        $col= 0;
        $count=0;
        foreach ($data['cols'] as $k) {
            $obj->getActiveSheet()->setCellValueByColumnAndRow($col,1,$k);
            $col++;
        }
        $start_row = 2;
        foreach ($data['rows'] as $val) {       
            $a=(array)$val;
            $x=array_keys($a);                      
            if(is_object($val))
            {                               
                foreach($val as $cell)
                {                         
                    $obj->getActiveSheet()->setCellValueByColumnAndRow($count,$start_row,$cell);
                    $count++; 
                }
                $start_row++;
                $count=0;                

            }
                        
        }

        ob_end_clean();
        $obj_writer = PHPExcel_IOFactory::createWriter($obj,'Excel2007');
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$data['filename'].'.xlsx"');
        $obj_writer->save('php://output');  
    }

    public function import($file='',$add_rows='')
    {
         $flag = 0;
        $inputFileType = PHPExcel_IOFactory::identify($file);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($file);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        foreach ($cell_collection as $cell)
        {  
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();    
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();      
                
            if ($row == 1) {
                $header[$column] = $data_value;
            } 
        }
        
        $result=$this->check_colomn_name($header);
       
        if (empty($result)) {
            $save_data=[];
            $row_data=$this->get_json();
            foreach ($allDataInSheet as $value) {
            $empty=FALSE;
            $d=0;
            $temp=0;
                $flag++;
                if($flag!==1){
                    foreach ($value as $id => $v) {
                        $d++;
                        if ($v =='' || $v === NULL) {                   
                            $temp++;
                        }                       
                    }                   
                    if($d!==$temp)
                    {                       
                        foreach ($row_data->database as $k => $val) {

                            $save_data[$val]=$this->set_value($value[$k]);                          
                        }
                        if (!empty($add_rows)) {
                        $save_data +=$add_rows; 
                        }                                      
                        $output[]=$save_data;
                        }
                    
                }
            } 
            $this->set_output($output);
            return TRUE;

        }
        else
        {
            $this->import_err="Please Enter Valid Salary Excel Sheet..! <br> Name of missmatch or wrong column-".implode(",  ", $result)."<br> Your File are Not uploaded .!";
            return FALSE; 
        }

    }
    public function import_error()
    {
        return $this->import_err;
    }
    public function check_colomn_name($value)
    {       
        $cols=(array)$this->get_json()->excel;
        $result = array_diff_assoc(array_map('strtolower',array_map('trim',$cols)), array_map('strtolower', array_map('trim',$value)));      
        return $result;
    }
     public function set_json($path='')
    {
        $this->json_path=$path;

    }
    public function get_json($path='')
    {
        // $json = file_get_contents("assets/salary.json");
        $json = file_get_contents($this->json_path);
        $result  = json_decode($json);
        return $result;

    }
    public function set_output($value='')
    {
        $this->output=$value;
    }
    public function get_output($value='')
    {
        return $this->output;
    }
    private function set_value($value='')
    {
        $val=clean_string($value);
        if (is_numeric($val)) {
            return $val=(int)$val;
        }
        else
        {
            return $val=(string)$val;
        }
    }
   
}
?>