<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Admin->users-user
 * date : 27-10-2014
 * author : Thushara
 * Please use a new model for any new modifications. Don't edit the common_library class and common_model class.
 */

Class Meta_tags extends CI_Controller {

//echo "ff";exit();
    private $table_name = "tbl_meta_tags";
    private $page_id = "15";
    private $redirect_path = "adminpanel/meta/meta_tags/view";

    public function __construct() {
        parent::__construct();
		
        if ($this->session->userdata('is_logged_inbackendsession') != "1") {
            redirect('adminpanel/login');
        }
		
        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->model('adminpanel/common_model');
        set_title("Meta Tags");

        $this->load->model('adminpanel/common_model');
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function view($data = "") {	
        if (empty($data)) {
            $data=array();
            $data['saveStatus'] = 'A';
        }
        $data['meta_list'] = $this->common_model->get_all_data_multi_where('tbl_meta_tags', $field = array(), $value = array(), 'iOrder', 'asc');

        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/meta/meta_tags_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_meta_tags() {

        $save_status = $this->input->post('cSaveStatus', TRUE);
        $id = $this->input->post('id', TRUE);

        if ($this->common_library->check_privilege('p_edit')) {
            $this->load->model('adminpanel/common_model');
            if ($save_status === 'E') {
                if ($this->common_model->update_saved_data($this->table_name)) {
                    $tDes = "saved about_company (" . $id . ") has been updated";
                    $this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Updated successfully.');

                    redirect(base_url() . 'adminpanel/meta/meta_tags/edit/' . $id . '');
                } else {
                    $this->session->set_flashdata('message_error', 'Update fail!');
                    redirect(base_url() . 'adminpanel/meta/meta_tags/edit/' . $id . '');
                }
            } else {
                if ($this->common_model->save_data($this->table_name)) {
                    $tDes = "about_company has been saved";
                    $this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . $this->redirect_path);
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . $this->redirect_path);
                }
            }
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission..');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function edit() {
        if ($this->common_library->check_privilege('p_edit')) {
            /* $id=$this->security->xss_clean($this->uri->segment(5));
              $this->load->model('adminpanel/our_pharmacists_model');

              $data = $this->our_pharmacists_model->get_store_detail($id);
              $data['saveStatus'] = 'E'; */
            $data = $this->common_library->flexigrid_update_user($this->table_name);
            $this->view($data);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission..');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function change_status() {
        if ($this->common_library->check_privilege('p_edit')) {

            $this->common_library->flexigrid_change_status($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function delete_record() {
        if ($this->common_library->check_privilege('p_delete')) {
            $this->common_library->flexigrid_delete_record($this->redirect_path, $this->table_name);
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission.');
            redirect(base_url() . $this->redirect_path);
        }
    }

}

?>
