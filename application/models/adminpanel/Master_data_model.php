<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_data_model extends CI_Model {

    public function doupload($field) {


        $curentpath = FCPATH;

        $uploadpath = $this->input->post("uploadpath", TRUE);

        $filename = $_FILES[$field]['name'];

        //  $path = str_replace("allianceadmin", $uploadpath, $curentpath);
        $path = $curentpath . $uploadpath;

        $field_name = $field;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docs|mp3|wav|ogg|mp4';

        $config['max_size'] = '99999999900000000';


        $config['file_name'] = time() . $filename;


        if (!is_dir($config['upload_path']))
            die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        //echo 'dd';
        //print_r($config);
        $this->load->library('upload', $config);

        $this->upload->initialize($config);
        $uploadfile = $this->upload->do_upload($field_name);

        $field_name;

        if (!$uploadfile) {

            echo 'error';
        } else {

            return array('upload_data' => $this->upload->data());
        }
    }

    function category_name_exists($vCategoryName)
    {
        $this->db->from('tbl_categories');
        $this->db->where('vCategoryName',$vCategoryName);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function category_name($vCategoryName)
    {
        $this->db->select('id');
        $this->db->from('tbl_categories');
        $this->db->where('vCategoryName',$vCategoryName);
        $query = $this->db->get(); 
           return $query->result();
    }


    function subcategory_name_exists($vSubcategoryName,$id)
    {
        $this->db->from('tbl_sub_categories');
        $this->db->where('vSubcategoryName',$vSubcategoryName);
        if($id!=0){
            
          $this->db->where('id !=',$id);  
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function subcategory_name($vSubcategoryName)
    {
        $this->db->select('id');
        $this->db->from('tbl_sub_categories');
        $this->db->where('vSubcategoryName',$vSubcategoryName);
        $query = $this->db->get();
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
    

    function district_name_exists($vDistrictName)
    {
        $this->db->from('tbl_districts');
        $this->db->where('vDistrictName',$vDistrictName);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function district_name($vDistrictName)
    {
        $this->db->select('id');
        $this->db->from('tbl_districts');
        $this->db->where('vDistrictName',$vDistrictName);
        $query = $this->db->get();
        return $query->result();
    }

    function secretariat_name_exists($vDivSecretariatName)
    {
        $this->db->from('tbl_divisional_secretariat');
        $this->db->where('vDivSecretariatName',$vDivSecretariatName);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function grade_exists($iGrade)
    {
        $this->db->from('tbl_grades');
        $this->db->where('iGrade',$iGrade);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

}

?>
