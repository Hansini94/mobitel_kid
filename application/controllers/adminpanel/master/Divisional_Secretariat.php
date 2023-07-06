<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-01-2022
 * author : Hansini
 */

Class Divisional_Secretariat extends CI_Controller {

    private $table_name = "tbl_divisional_secretariat";
    private $page_id = "16";
    private $redirect_path = "adminpanel/master/divisional_secretariat";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->model('adminpanel/common_model');
        $this->load->model('adminpanel/Master_data_model');
        set_title("Master Data");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['cSaveStatus']= 'A';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
        $data['districts'] = $this->common_model->get_district_list();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/divisional_secretariat_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_data($data = '') {
        $cSaveStatus = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        $vDivSecretariatName = $this->input->post('vDivSecretariatName', TRUE);        
        
        if ($cSaveStatus === 'E') {
            if ($this->common_model->update_saved_data($this->table_name)) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/master/divisional_secretariat');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/master/divisional_secretariat');
            }
        } else {
            if ($this->Master_data_model->secretariat_name_exists($vDivSecretariatName,'0')) {
                $this->session->set_flashdata('message_error', 'Name Already Exist!');
                redirect(base_url() . 'adminpanel/master/divisional_secretariat');
            }else {
                if ($this->common_model->save_data($this->table_name)) {
                    //$tDes = "saved data has been updated";
                    //$this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/divisional_secretariat');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/divisional_secretariat');
                }
            }
        }        
    }
	
	public function edit() {
        $data['cSaveStatus']= 'E';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
        $data['districts'] = $this->common_model->get_district_list();
		$recId = $this->uri->segment(5);
		$data['edit_data'] = $this->common_model->get_edit_data($recId, $this->table_name);
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/divisional_secretariat_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function change_status() {

        $this->common_library->check_privilege('p_edit');
        if ($this->common_library->check_privilege('p_edit')) {
            $this->common_library->flexigrid_change_status($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function delete_record() {
        $this->common_library->check_privilege('p_edit');
        if ($this->common_library->check_privilege('p_delete')) {
            $this->common_library->flexigrid_delete_record($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }   

}

?>
