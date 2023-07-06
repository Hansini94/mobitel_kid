<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Home extends CI_Controller {

    private $table_name = "tbl_home";
    private $page_id = "2";
    private $redirect_path = "adminpanel/home";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->model('adminpanel/common_model');
        $this->load->model('adminpanel/home_model');
        set_title("Home");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['saveStatus']= 'E';
        $data['home_data'] = $this->home_model->get_home_content();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/home_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function change_status() {

        $this->common_library->check_privilege('p_edit');
        $this->load->model('adminpanel/hotel_model');
        if ($this->common_library->check_privilege('p_edit')) {
            $this->hotel_model->chnge_status_hotel($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function delete_record() {
        $this->common_library->check_privilege('p_edit');
        if ($this->common_library->check_privilege('p_delete')) {
            $this->load->model('adminpanel/hotel_model');
            $this->hotel_model->delete_hotel($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }

   

    public function save_home($data = '') {
        $save_status = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        if ($save_status === 'E') {
            if ($this->common_model->update_saved_data('tbl_home')) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/home');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/home');
            }
        } else {
            if ($this->common_model->save_data('tbl_home')) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/home');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/home');
            }
        }
    }

}

?>
