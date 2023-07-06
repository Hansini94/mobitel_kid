<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-12-2022
 * author : Hansini
 */

Class Terms_conditions extends CI_Controller {

    private $table_name = "tbl_terms_conditions";
    private $page_id = "10";
    private $redirect_path = "adminpanel/terms_conditions/terms_conditions";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->model('adminpanel/common_model');
        set_title("Terms & Conditions");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['ckeditor_tContent_eng'] = array(
            //ID of the textarea that will be replaced
            'id' => 'tContent_eng',
            'path' => 'assets/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200px', //Setting a custom height
            ),            
        );

        $data['ckeditor_tContent_sin'] = array(
            //ID of the textarea that will be replaced
            'id' => 'tContent_sin',
            'path' => 'assets/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200px', //Setting a custom height
            ),            
        );

        $data['ckeditor_tContent_tam'] = array(
            //ID of the textarea that will be replaced
            'id' => 'tContent_tam',
            'path' => 'assets/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200px', //Setting a custom height
            ),            
        );

        $data['cSaveStatus']= 'E';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/terms_conditions/terms_conditions_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_terms($data = '') {
        $cSaveStatus = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        $tContent_eng = $this->input->post('tContent_eng', TRUE);
        $tContent_sin = $this->input->post('tContent_sin', TRUE);
        $tContent_tam = $this->input->post('tContent_tam', TRUE);
        if ($cSaveStatus === 'E') {
            if ($this->common_model->update_saved_data($this->table_name)) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/terms_conditions/terms_conditions');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/terms_conditions/terms_conditions');
            }
        } else {
            if ($this->common_model->save_data($this->table_name)) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/terms_conditions/terms_conditions');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/terms_conditions/terms_conditions');
            }
        }
    }   

}

?>
