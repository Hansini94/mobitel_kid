<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-12-2022
 * author : Hansini
 */

Class Categories extends CI_Controller {

    private $table_name = "tbl_categories";
    private $page_id = "7";
    private $redirect_path = "adminpanel/master/categories";

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
        $data['list_data'] = $this->common_model->get_category_list();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/categories_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

 public function save_data($data = '') {
        $cSaveStatus = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        $vCategoryName = $this->input->post('vCategoryName', TRUE);   
        $oldCategory =  $this->input->post('oldCategory', TRUE);   
        if ($cSaveStatus === 'E') {
            $data_image['vCategoryName'] = $_POST['vCategoryName'];
            $data_image['iOrder'] = $_POST['iOrder'];
            $data_image['cEnable'] = 'Y';
        
            if($this->db->update('tbl_categories', $data_image, "id = $id"))
            {
                if($vCategoryName !== $oldCategory)
                {   
                    $oldCategoryR = str_replace( ' ', '_', $oldCategory);
                    $vCategoryNameR = str_replace( ' ', '_', $vCategoryName);
                    rename(FCPATH.'/uploading_videos/'.$oldCategoryR, FCPATH.'/uploading_videos/'.$vCategoryNameR);
                    rename(FCPATH.'/uploading_images/'.$oldCategoryR, FCPATH.'/uploading_images/'.$vCategoryNameR);
                }
                $this->session->set_flashdata('message_saved', 'Saved successfully.');
                redirect(base_url() . 'adminpanel/master/categories');
            }         
            else{
                $this->session->set_flashdata('message_error', 'Edit fail!');
                redirect(base_url() . 'adminpanel/master/categories');
            }            
        }
        else {
            if ($this->Master_data_model->category_name_exists($vCategoryName)) {
                    $this->session->set_flashdata('message_error', 'Name Already Exist!');
                    redirect(base_url() . 'adminpanel/master/categories');
            }else{
                $data_image['vCategoryName'] = $_POST['vCategoryName'];
                $data_image['iOrder'] = $_POST['iOrder'];
                $data_image['cEnable'] = 'Y';

                if($this->db->insert('tbl_categories', $data_image))
                {        
                    $vCategoryNameR = str_replace( ' ', '_', $vCategoryName);
                    mkdir('./uploading_videos/' . $vCategoryNameR, 0777, TRUE);
                    mkdir('./uploading_images/' . $vCategoryNameR, 0777, TRUE);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/categories');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/categories');
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
        $this->load->view('adminpanel/masterdata/categories_view', $data);
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
