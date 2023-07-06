<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * This library class used for view data from flexigrid edit ,change status and delete from flexigrid.
 * date : 27-10-2014
 * author : Thushara
 */

Class Common_library {

    public function __construct() {
        $this->ci = & get_instance();        
        $this->ci->load->model('adminpanel/common_model');
        log_message('debug', "Common Class Initialized");
    }

    public function flexigrid_change_status($redirect_path, $tbl_name) {

        $userID = $this->ci->security->xss_clean($this->ci->uri->segment(6));
       
        $this->ci->common_model->chge_status($userID, $tbl_name);
        $this->ci->session->set_flashdata('message', 'Status changed!');
        
        $tDes = "Status has been changed";
        $this->ci->common_model->add_log($tDes);

        redirect(base_url() . $redirect_path);
    }
	public function flexigrid_update_record($tbl_name) {

        $userID = $this->ci->security->xss_clean($this->ci->uri->segment(5));
        $data = array();

        $data = $this->ci->common_model->get_edit_data($userID, $tbl_name);
        $data['saveStatus'] = 'E';

        return $data;
    }

    public function flexigrid_update_user($tbl_name) {

        $userID = $this->ci->security->xss_clean($this->ci->uri->segment(5));
        $data = array();

        $data = $this->ci->common_model->get_edit_data($userID, $tbl_name);
        $data['saveStatus'] = 'E';

        return $data;
    }

    public function flexigrid_delete_record($redirect_path, $tbl_name) {
        $userID = $this->ci->security->xss_clean($this->ci->uri->segment(6));
//echo 'dd111111111'; exit();
        $this->ci->common_model->del_records($userID, $tbl_name);
        $this->ci->session->set_flashdata('message', 'Data successfully deleted!');
        
        $tDes = "Record has been deleteed";
        $this->ci->common_model->add_log($tDes);
        
        redirect(base_url() . $redirect_path);
    }
    
    public function check_privilege($p_type){
       $u_privilages = $this->ci->session->userdata('u_privilages');
	   
       $arr_u_privilages = explode(",", $u_privilages);
       
       if($p_type==="p_view"){
           if($arr_u_privilages[0]==="1"){
               return TRUE;
           }
           else{
               return FALSE;
           }
       }
       if($p_type==="p_edit"){
		  
           if($arr_u_privilages[1]==="2"){
               return TRUE;
           }
           else{
               return FALSE;
           }
       }
       if($p_type==="p_delete"){
           if($arr_u_privilages[2]==="3"){
               return TRUE;
           }
           else{
               return FALSE;
           }
       }
       
    }

}

?>
