<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



Class User_type extends CI_Controller {

    private $table_name = "tbl_user_type";

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_inbackendsession') != "1") {
            redirect('adminpanel/login');
        }
        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        set_title("User Type");
    }

    public function add_user_type($data = '') {
        
        if (empty($data)) {
            $data=array();
            $data['saveStatus'] = 'A';
        }
            

        /* $colModel['id'] = array('ID', 40, TRUE, 'center', 2,);
          $colModel['vAccTypeName'] = array('Account Type', 120, TRUE, 'left', 1);
          $colModel['vAccDescription'] = array('Description', 307, TRUE, 'left', 1);
          $colModel['dSaveDate'] = array('Date', 80, TRUE, 'left', 1);
          $colModel['edit'] = array('Edit', 40, FALSE, 'center', 0);
          $colModel['status'] = array('Status', 40, FALSE, 'center', 0);
          $colModel['delete'] = array('Delete', 40, FALSE, 'center', 0);


          $gridParams = array(
          'width' => 753,
          'height' => 400,
          'rp' => 15,
          'rpOptions' => '[10,15,20,25,40]',
          'pagestat' => 'Displaying: {from} to {to} of {total} items.',
          'blockOpacity' => 0.5,
          'title' => 'Users Type List',
          'usepager' => true,
          'useRp' => true,
          'showTableToggleBtn' => true,
          );

          //Build js
          //View helpers/flexigrid_helper.php for more information about the params on this function
          $grid_js = build_grid_js('flex1', site_url("adminpanel/master/ajaxFlexiGrid/get_user_type"), $colModel, 'id', 'asc', $gridParams);

          $data['js_grid'] = $grid_js; */

        $this->load->model('adminpanel/admin_model');
        $data['gr_records'] = $this->admin_model->form_names();
        $data['list_data'] = $this->admin_model->get_user_types();
        

        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/user_type_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_user_type() {
        $save_status = $this->input->post('cSaveStatus', TRUE);

        if ($save_status === 'E')
            $this->form_validation->set_rules('vAccTypeName', 'account type', 'required|trim|max_length[50]');
        else
            $this->form_validation->set_rules('vAccTypeName', 'account type', 'required|trim|is_unique[tbl_user_type.vAccTypeName]|max_length[50]');

        $this->form_validation->set_rules('vAccDescription', 'description', 'trim');

        $this->form_validation->set_message('is_unique', 'Account type you entered is already exists.');

        if ($this->form_validation->run()) {
            $this->load->model('adminpanel/admin_model');
            $this->load->model('adminpanel/common_model');


            if ($save_status === 'E') {
                if ($this->admin_model->save_user_type($save_status)) {
                    $tDes = "saved data has been updated";
                    $this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');

                    redirect(base_url() . 'adminpanel/master/user_type/add_user_type');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/user_type/add_user_type');
                }
            } else {
                if ($this->admin_model->save_user_type($save_status)) {
                    $tDes = "Data has been saved";
                    $this->common_model->add_log($tDes);
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/user_type/add_user_type');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/user_type/add_user_type');
                }
            }
        } else {
            if ($save_status === 'E') {
                $this->session->set_flashdata('message_error', 'Save fail!');
                redirect($this->uri->uri_string());
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
                $this->add_user_type();
            }
        }
    }

    public function update_user() {
        $this->load->model('adminpanel/admin_model');
        $data = $this->common_library->flexigrid_update_user($this->table_name);
        $user_type_id = $this->uri->segment(5);
        $data['selected_records'] = $this->admin_model->privilage_form_names($user_type_id);

        $this->add_user_type($data);
    }

    public function change_status() {
        $redirect_path = "adminpanel/master/user_type/add_user_type";
        $this->common_library->flexigrid_change_status($redirect_path, $this->table_name);
    }

    public function delete_record() {
        $this->load->model('adminpanel/admin_model');
        $this->admin_model->delete_privilages();

        $redirect_path = "adminpanel/master/user_type/add_user_type";
        //$this->common_library->flexigrid_delete_record($redirect_path, $this->table_name);
        redirect(base_url() . $redirect_path);
    }

}

?>
