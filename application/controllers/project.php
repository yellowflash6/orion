<?php

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->helper('url');
    }
    
    public function index()
    {   
        $data['projects'] = $this->project_model->get_projects();
        $this->load->view('templates/yf_header');
        $this->load->view('project/index',$data);
        $this->load->view('templates/yf_footer');
    }
    
    public function add()
    {
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('templates/yf_header');
        $this->load->view('project/new');
		$this->load->view('templates/yf_footer');
    }
    
    public function add_project()
    {
        $this->project_model->add_project();
    }
}

?>