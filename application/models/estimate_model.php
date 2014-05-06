<?php

    class Estimate_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function add_estimate()
        {
            $this->load->helper('url');
            
            $data = array(
                'feature'       =>      $this->input->post('yf_feature'),
                'dev_hours'     =>      $this->input->post('yf_dev_hours'),
                'test_hours'    =>      $this->input->post('yf_test_hours'),
                'comments'      =>      $this->input->post('yf_comments'),
                'project_id'    =>      $this->input->post('yf_project'),
            );
            
            $this->db->insert('estimates',$data);
			redirect('/estimate/add/');
        }
        
        public function get_estimates($project_id)
        {
            if(!$project_id)
            {
                $query      =       $this->db->get('estimates');
                return $query->result_array();
            }
            $query          =       $this->db->get_where('estimates', array('project_id' => $project_id));
            return $query->result_array();
            
        }
		
		public function get_total_project_estimate($project_id)
        {
            $this->db->select_sum('dev_hours');
            $this->db->select_sum('test_hours');
			$query = $this->db->get_where('estimates', array('project_id' => $project_id));
            
            return $query->result_array();
            
        }
		
    }
    
    

?>