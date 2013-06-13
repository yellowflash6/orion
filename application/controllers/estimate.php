<?php

class Estimate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('estimate_model');
    }
    
    public function index()
    {
	$this->view();
    }
    
    public function view($project_id=null)
    {
	$this->load->helper('url');
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
}


?>