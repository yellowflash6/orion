<?php

    class Project_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_project()
        {
            $this->load->helper('url');
            
            $data = array(
                'name'       =>      $this->input->post('yf_name'),
            );
            
            $this->db->insert('projects',$data);
			redirect('/project/add/');
        }
        
        public function get_projects()
        {
            //$query           =     $this->db->get('projects');
            $this->db->select('projects.id as id');
            $this->db->select('projects.name as name');
            $this->db->select('projects.status as status');
            $this->db->select_sum('estimates.dev_hours','dev_hours');
            $this->db->select_sum('estimates.test_hours','test_hours');
            $this->db->from('projects');
            $this->db->join('estimates', 'projects.id = estimates.project_id', 'inner');
            $this->db->group_by('projects.id');
            $query = $this->db->get();
            return $query->result_array();
        }
        
    }
    
    

?>