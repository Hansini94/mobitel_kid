<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_Page_model extends CI_Model {
   
    public function get_category_list(){
        $this->db->from('tbl_categories');
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function get_sub_category_list(){
        $this->db->from('tbl_sub_categories');
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_district_list(){
        $this->db->from('tbl_districts');
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_grades_list(){
        $this->db->from('tbl_grades');
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_terms_conditions() 
    {
        $this->db->select('*');
        $this->db->from('tbl_terms_conditions');       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
       
    }

    function selected_category($id)
    {
        $this->db->select('vCategoryName');
        $this->db->from('tbl_categories');
        $this->db->where('id',$id);
        $query = $this->db->get(); 
        return $query->result();
    }

    function selected_subcategory($id)
    {
        $this->db->select('vSubcategoryName');
        $this->db->from('tbl_sub_categories');
        $this->db->where('id',$id);
        $query = $this->db->get(); 
        return $query->result();
    }

    function referenceNo()
	{
        $this->db->select('vReferenceNo');
        $this->db->from('tbl_submissions');
        $query = $this->db->get();
        return $query->last_row();
		// $this->db->query($query);
	}

    function multisave($data,$categoryNameR,$subcategoryNameR,$image,$video,$vVideo,$vImage)
	{
        $query = $this->db->insert('tbl_submissions', $data);  
        // echo $this->db->last_query();exit();      

        if ($image > 0) {
            $field = 'vImage';
            $config['upload_path'] = './uploading_images/'.$categoryNameR.'/'.$subcategoryNameR; 
            $config['file_name'] = $vImage; 
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 2097152;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($field)) {
                $error = array('error' => $this->upload->display_errors());
            } 
            else {
                // $data = array('image_metadata' => $this->upload->data());
            }
        }

        if ($video > 0) {                        
            $field = 'vVideo';
            $config['upload_path'] = './uploading_videos/'.$categoryNameR.'/'.$subcategoryNameR.'/';
            $config['file_name'] = $vVideo; 
            $config['allowed_types'] = 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv';
            $config['max_size'] = 52428800;
                                    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($field)) {
                $error = array('error' => $this->upload->display_errors());
                // var_dump($error);
            } 
            else {
                // var_dump("done");
                // $data = array('image_metadata' => $this->upload->data());
            }
        }

        if ($query) {
            // die("test");
            return true;
        } else {
            // die("dd");
            return false;
        }
		// $this->db->query($query);
	}  

}

?>