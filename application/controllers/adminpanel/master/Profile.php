<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



Class Profile extends CI_Controller {

    private $table_name = "tbl_backend_user";
    private $page_id = "10";
    private $redirect_path = "adminpanel/master/profile/update_profile";

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_inbackendsession') != "1") {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        set_title("profile");
    }

    public function edit_profile($data = '') {


        if (empty($data))
            $data['saveStatus'] = 'A';





        $this->load->model('adminpanel/common_model');
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);

        $sql_user_type = "SELECT tbl_user_type.vAccTypeName,tbl_user_type.id FROM tbl_user_type ORDER BY tbl_user_type.vAccTypeName ASC";
        $data['iUserTypeArr'] = $this->common_model->populate_drop_down($sql_user_type);
        //$data['iUserType'] = "echo";
        //echo $this->session->userdata('u_privilages');
        $this->load->model('adminpanel/admin_model');
        $data['list_data'] = $this->admin_model->get_user_detail();


        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/view_profile', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_profile() {
        $save_status = 'E';
        //$uUserID = $this->session->userdata('s_userID_leave');
        $uUserID = $this->session->userdata('userbackendsession');
        //$this->form_validation->set_rules('pPasswordold', 'old password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pPassword', 'new password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('cPassword', 'confirm password', 'required|trim|matches[pPassword]|xss_clean');



        if ($this->form_validation->run()) {
            $this->load->model('adminpanel/common_model');
            if ($save_status === 'E') {
                if ($this->common_model->update_password_data($this->table_name)) {
                    $tDes = "saved data has been updated";
                    $this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');

                    redirect(base_url() . $this->redirect_path . '/' . $uUserID . '');
                } else {
                    $this->session->set_flashdata('message_error', 'Incorrect Password !!!');
                    redirect(base_url() . $this->redirect_path . '/' . $uUserID . '');
                }
            } else {
                
            }
        } else {
            if ($save_status === 'E') {

                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect($this->uri->uri_string());
            } else {
                
            }
        }
    }

    public function update_profile() {
        // if ($this->common_library->check_privilege('p_edit')) {
        $data = $this->common_library->flexigrid_update_user($this->table_name);
        $this->edit_profile($data);
        /* } else {
          $this->session->set_flashdata('message_restricted', 'You do not have permission..');
          redirect(base_url() . $this->redirect_path);
          } */
    }

}

?>
