<?php

class Estimate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('estimate_model');
		$this->load->helper('url');
    }
    
    public function index()
    {
		$this->view();
    }
    
    public function view($project_id=null)
    {
        $data['estimates'] = $this->estimate_model->get_estimates($project_id);
		$this->load->view('templates/yf_header');
        $this->load->view('estimate/index',$data);
		$this->load->view('templates/yf_footer');
    }
    
    
    public function add()
    {
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('templates/yf_header');
        $this->load->view('estimate/new');
		$this->load->view('templates/yf_footer');
    }
    
    public function add_estimate()
    {
        $this->estimate_model->add_estimate();
    }
	
	public function export_estimate($project_id=null)
	{
		$project_estimates = $this->estimate_model->get_estimates($project_id);
		//var_dump($project_estimates);
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Estimate');
		$numrows = 1;
		/*
		 * Set of Column fields to be shown in Estimate. These are Table Columns of estimates table.
		 */
		$arr_fields = array('feature', 'dev_hours', 'test_hours', 'comments');
		
		foreach($project_estimates as $row => $columns) 
		{
			$numcols 	= 	0;
			$str_output = 	'';
		    foreach($columns as $column => $data) 
		    {
		    	if(in_array($column, $arr_fields))
				{
					/*
					 * Write Column Headers only if the current index is first index of $project_estimates array (Resultset).
					 * Write Estimate data in the next row.
					 */
					if ($row == 0)
					{
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($numcols, $numrows, $column);
			        	$this->excel->getActiveSheet()->setCellValueByColumnAndRow($numcols, $numrows + 1, $data);
					}
					else 
					{
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($numcols, $numrows, $data);
					}
					$numcols++;
				}
		    }
			$numrows++;
			if($row == 0)
			{
				$numrows++;
			}
		}

		/*
		 * Applying Formula for Sum of Dev and Test Estimates.
		 */		
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $numrows, 'Total Dev Hours');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $numrows, '=SUM(B1:B'.($numrows-1).')');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $numrows+1, 'Total Test Hours');
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $numrows+1, '=SUM(C1:C'.($numrows-1).')');
		
		$filename='estimate.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}


?>