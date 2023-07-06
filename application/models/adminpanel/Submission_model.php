<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Submission_model extends CI_Model {   

    public function search_details($from_date, $to_date, $category_id, $sub_category_id, $district_id){        
        
        $this->db->select('*');
        $this->db->from('tbl_submissions');        
        if(!empty($from_date)) {
            if(!empty($from_date) && !empty($to_date))
            {
                $this->db->where('upload_datetime','>=', $from_date);
                $this->db->where('upload_datetime','<=', $to_date);
            }
            else{
                $this->db->like('upload_datetime', $from_date);
            }
            
            // $this->db-
        }
        if(!empty($category_id)) {
            $this->db->like('iCategoryId', $category_id);
        }
        if(!empty($sub_category_id)) {
            $this->db->like('iSubCategoryId', $sub_category_id);
        }
        if(!empty($district_id)) {
            $this->db->like('iDistrictId', $district_id);
        }
        $query = $this->db->get();
        // echo $this->db->last_query();exit();
        // die("text");
        return $query->result();
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
}

?>
