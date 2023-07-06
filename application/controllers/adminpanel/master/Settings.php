<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Settings extends CI_Controller {

    private $table_name = "tbl_purches_limit";
    private $page_id = "50";
    private $redirect_path = "adminpanel/master/settings";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->model('adminpanel/common_model');
        set_title("Settings Management");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['cSaveStatus']= 'E';
        $data['edit_data'] = $this->common_model->get_edit_data('1','tbl_purches_limit');
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/settings_view', $data);
        $this->load->view('adminpanel/footer_view');
    }
    
    public function update_settings($data = '') {
        $save_status = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        if ($save_status === 'E') {
            if ($this->common_model->update_saved_data('tbl_purches_limit')) {
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/master/settings');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/master/settings');
            }
        } else{
            redirect(base_url() . 'adminpanel/master/settings');
        }
    }

    



   
}

?>
