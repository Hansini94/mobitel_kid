<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-12-2022
 * author : Hansini
 */

Class Grades extends CI_Controller {

    private $table_name = "tbl_grades";
    private $page_id = "17";
    private $redirect_path = "adminpanel/master/grades";

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
        // $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
        $data['list_data'] = $this->common_model->get_grade_list();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/grades_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_data($data = '') {
        $cSaveStatus = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        $iGrade = $this->input->post('iGrade', TRUE);        
        
        if ($cSaveStatus === 'E') {
            if ($this->common_model->update_saved_data($this->table_name)) {
                //$tDes = "saved data has been updated";
                //$this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/master/grades');
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect(base_url() . 'adminpanel/master/grades');
            }
        } else {
            if ($this->Master_data_model->grade_exists($iGrade,'0')) {
                $this->session->set_flashdata('message_error', 'Name Already Exist!');
                redirect(base_url() . 'adminpanel/master/grades');
            }else {
                if ($this->common_model->save_data($this->table_name)) {
                    //$tDes = "saved data has been updated";
                    //$this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/grades');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/grades');
                }
            }
        }        
    }
	
	public function edit() {
        $data['cSaveStatus']= 'E';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
		$recId = $this->uri->segment(5);
		$data['edit_data'] = $this->common_model->get_edit_data($recId, $this->table_name);
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/grades_view', $data);
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
