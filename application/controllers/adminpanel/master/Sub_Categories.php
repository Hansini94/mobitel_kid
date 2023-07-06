<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-12-2022
 * author : Hansini
 */

Class Sub_Categories extends CI_Controller {

    private $table_name = "tbl_sub_categories";
    private $page_id = "8";
    private $redirect_path = "adminpanel/master/sub_categories";

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
        $data['category'] = $this->common_model->get_category_list();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/sub_categories_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_data($data = '') {
        $cSaveStatus = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);
        $vSubcategoryName = $this->input->post('vSubcategoryName', TRUE);        
        $oldSubcategory =  $this->input->post('oldSubcategory', TRUE);
        $iCategoryId =  $this->input->post('iCategoryId', TRUE);
        
        $category = $this->Master_data_model->selected_category($iCategoryId);
        $categoryName = $category[0]->vCategoryName;
        $categoryNameR = str_replace( ' ', '_', $categoryName);

        if ($this->Master_data_model->subcategory_name_exists($vSubcategoryName,$id)) {
            $this->session->set_flashdata('message_error', 'Name Already Exist!');
            redirect(base_url() . 'adminpanel/master/sub_categories');
        }       
        if ($cSaveStatus === 'E') {
            if ($this->Master_data_model->subcategory_name_exists($vSubcategoryName,$id)) {
                $this->session->set_flashdata('message_error', 'Name Already Exist!');
                redirect(base_url() . 'adminpanel/master/sub_categories');
            }else {
                if ($this->common_model->update_saved_data($this->table_name)) {
                    //$tDes = "saved data has been updated";
                    //$this->common_model->add_log($tDes);
                    if($vSubcategoryName !== $oldSubcategory)
                    {   
                        $oldSubcategoryR = str_replace( ' ', '_', $oldSubcategory);
                        $vSubcategoryNameR = str_replace( ' ', '_', $vSubcategoryName);                        
                        rename(FCPATH.'/uploading_videos/'.$categoryNameR.'/'.$oldSubcategoryR, FCPATH.'/uploading_videos/'.$categoryNameR.'/'.$vSubcategoryNameR);
                        rename(FCPATH.'/uploading_images/'.$categoryNameR.'/'.$oldSubcategoryR, FCPATH.'/uploading_images/'.$categoryNameR.'/'.$vSubcategoryNameR);
                    }
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/sub_categories');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/sub_categories');
                }
            }
        } else {
            if ($this->Master_data_model->subcategory_name_exists($vSubcategoryName,'0')) {
                $this->session->set_flashdata('message_error', 'Name Already Exist!');
                redirect(base_url() . 'adminpanel/master/sub_categories');
            }else {
                if ($this->common_model->save_data($this->table_name)) {
                    //$tDes = "saved data has been updated";
                    //$this->common_model->add_log($tDes);
                    $vSubcategoryNameR = str_replace( ' ', '_', $vSubcategoryName);
                    mkdir('./uploading_videos/'.$categoryNameR.'/'. $vSubcategoryNameR, 0777, TRUE);
                    mkdir('./uploading_images/'.$categoryNameR.'/'. $vSubcategoryNameR, 0777, TRUE);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/sub_categories');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/sub_categories');
                }
            }
        }        
    }
	
	public function edit() {
        $data['cSaveStatus']= 'E';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
		$recId = $this->uri->segment(5);
		$data['edit_data'] = $this->common_model->get_edit_data($recId, $this->table_name);
        $data['category'] = $this->common_model->get_category_list();
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/sub_categories_view', $data);
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
