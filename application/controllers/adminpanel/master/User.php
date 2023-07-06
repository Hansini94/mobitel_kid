<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



Class User extends CI_Controller {

    private $table_name = "tbl_backend_user";
    private $page_id = "5";
    private $redirect_path = "adminpanel/master/user/add_user";

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_inbackendsession') != "1") {
            redirect('adminpanel/login');
        }
        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        set_title("User");
    }

    public function add_user($data = '') {

        
        if (empty($data)) {
            $data=array();
            $data['saveStatus'] = 'A';
        }
            
        $this->load->model('adminpanel/common_model');
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);

        $uType = $this->session->userdata('iUserTypebackendsession');
        if ($uType != 1) {
            $where = 'where id!=1';
        }else {$where='';}
        $sql_user_type = "SELECT tbl_user_type.vAccTypeName,tbl_user_type.id FROM tbl_user_type $where ORDER BY tbl_user_type.vAccTypeName ASC";
        $data['iUserTypeArr'] = $this->common_model->populate_drop_down($sql_user_type);
        //$data['iUserType'] = "echo";
        //echo $this->session->userdata('u_privilages');
        $this->load->model('adminpanel/admin_model');
        $data['list_data'] = $this->admin_model->get_user_detail();
        $data['category'] = $this->common_model->get_all_category_list();
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/add_user', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_user() {
        $save_status = $this->input->post('cSaveStatus', TRUE);

        if ($this->common_library->check_privilege('p_edit')) {
            if ($save_status === 'E')
                $this->form_validation->set_rules('vUserName', 'user name', 'required|trim|xss_clean');
            else
                $this->form_validation->set_rules('vUserName', 'user name', 'required|trim|is_unique[tbl_backend_user.vUserName]|xss_clean');

            $this->form_validation->set_rules('vEmail', 'email address', 'required|trim|valid_email|xss_clean');
            $this->form_validation->set_rules('iUserType', 'user type', 'required');
            $this->form_validation->set_rules('pPassword', 'password', 'required|trim|min_length[6]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('cPassword', 'confirm password', 'required|trim|matches[pPassword]|xss_clean');
            $this->form_validation->set_rules('vFirstName', 'first name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('vLastName', 'last name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('vContactNo', 'contact number', 'trim|xss_clean');

            $this->form_validation->set_message('is_unique', 'User name you entered is already exists.');
            //insert size checkboxes into database.
               // String

            if ($this->form_validation->run()) {
                $this->load->model('adminpanel/common_model');
                if ($save_status === 'E') {
                    if ($this->common_model->update_saved_data($this->table_name)) {
                        $tDes = "saved data has been updated";
                        $this->common_model->add_log($tDes);
                        $this->session->set_flashdata('message_saved', 'Saved successfully.');

                        redirect(base_url() . $this->redirect_path);
                    } else {
                        $this->session->set_flashdata('message_error', 'Save fail!');
                        redirect(base_url() . $this->redirect_path);
                    }
                } else {
                    if ($this->common_model->save_data($this->table_name)) {
                        $tDes = "Data has been saved";
                        $this->common_model->add_log($tDes);
                        $this->session->set_flashdata('message_saved', 'Saved successfully.');
                        redirect(base_url() . $this->redirect_path);
                    } else {
                        $this->session->set_flashdata('message_error', 'Save fail!');
                        redirect(base_url() . $this->redirect_path);
                    }
                }
            } else {
                if ($save_status === 'E') {

                    //echo "kk"; exit();
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect($this->uri->uri_string());
                } else {
                    //echo "k11111111k"; exit();
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    $this->add_user();
                }
            }
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission..');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function update_user() {
        if ($this->common_library->check_privilege('p_edit')) {
            $data = $this->common_library->flexigrid_update_user($this->table_name);
            $this->add_user($data);
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
