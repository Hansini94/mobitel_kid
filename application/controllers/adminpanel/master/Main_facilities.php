<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



Class Main_facilities extends CI_Controller {

    private $table_name = "tbl_main_facilities";
    private $page_id = "16";
    private $redirect_path = "adminpanel/master/main_facilities/add_main_facilities";

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_inbackendsession') != "1") {
            redirect('adminpanel/login');
        }
        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->model('adminpanel/common_model');
        set_title("Features");
    }

    public function add_main_facilities($data = '') {


        if (empty($data))
            $data['saveStatus'] = 'A';
        /*
         * 0 - display name
         * 1 - width
         * 2 - sortable
         * 3 - align
         * 4 - searchable (2 -> yes and default, 1 -> yes, 0 -> no.)
         * 5 - hide colum 0
         */


        $colModel['id'] = array('ID', 40, TRUE, 'center', 0, 0);
        $colModel['number'] = array('No', 40, FALSE, 'center', 0);
        $colModel['vFacilityName'] = array('Facility Name', 134, TRUE, 'left', 1);
        $colModel['iOrder'] = array('Order', 120, TRUE, 'left', 1);
        $colModel['edit'] = array('Edit', 40, FALSE, 'center', 0);
        $colModel['status'] = array('Status', 40, FALSE, 'center', 0);
        $colModel['delete'] = array('Delete', 40, FALSE, 'center', 0);


        /*
         * Aditional Parameters
         */
        $gridParams = array(
            'width' => 753,
            'height' => 400,
            'rp' => 15,
            'rpOptions' => '[10,15,20,25,40]',
            'pagestat' => 'Displaying: {from} to {to} of {total} items.',
            'blockOpacity' => 0.5,
            'title' => 'Features List',
            'usepager' => true,
            'useRp' => true,
            'showTableToggleBtn' => true,
        );

        /*
         * 0 - display name
         * 1 - bclass
         * 2 - onpress
         */


        //Build js
        //View helpers/flexigrid_helper.php for more information about the params on this function
        $grid_js = build_grid_js('flex1', site_url("adminpanel/master/ajaxFlexiGrid/get_main_facility_list"), $colModel, 'id', 'asc', $gridParams);

        $data['js_grid'] = $grid_js;


        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);



        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/main_facility_view', $data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_main_facility() {

        $save_status = $this->input->post('cSaveStatus', TRUE);

        if ($this->common_library->check_privilege('p_edit')) {
            //$this->load->model('adminpanel/master_data_model');            

            $this->form_validation->set_rules('vFacilityName', 'facility name', 'trim|required');
            $this->form_validation->set_rules('iOrder', 'order', 'trim|required');
            $this->form_validation->set_rules('cEnable', 'status', 'trim|required');


            if ($this->form_validation->run()) {
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
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect($this->uri->uri_string());
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    $this->add_main_facilities();
                }
            }
        } else {
            $this->session->set_flashdata('message_restricted', 'You do not have permission..');
            redirect(base_url() . $this->redirect_path);
        }
    }

    public function update_main_facility() {
        if ($this->common_library->check_privilege('p_edit')) {

            $data = $this->common_library->flexigrid_update_user($this->table_name);

            $this->add_main_facilities($data);
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
