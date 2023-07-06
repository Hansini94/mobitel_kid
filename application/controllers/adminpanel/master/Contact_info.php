<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Contact_info extends CI_Controller {

    private $table_name = "tbl_contact_info";
    private $page_id = "51";
    private $redirect_path = "adminpanel/master/Contact_info";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->model('adminpanel/common_model');
        set_title("Contact Information");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['cSaveStatus']= 'E';
        $data['edit_data'] = $this->common_model->get_edit_data('1','tbl_contact_info');
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/contact_info_view', $data);
        $this->load->view('adminpanel/footer_view');
    }
    
    public function update_info($data = '') {
        $save_status = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        if ($save_status === 'E') {
            if ($this->common_model->update_saved_data('tbl_contact_info')) {
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/master/contact_info');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/master/contact_info');
            }
        } else{
            redirect(base_url() . 'adminpanel/master/contact_info');
        }
    }

    



   
}

?>
