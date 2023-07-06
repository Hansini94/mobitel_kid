<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Device_Report extends CI_Controller {

    private $table_name = "tbl_devices";
    private $page_id = "22";
    private $redirect_path = "adminpanel/reports/Device_Report";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->helper('url');
        $this->load->model('adminpanel/common_model');
        $this->load->model('adminpanel/device_model');
        $this->load->model('adminpanel/Admin_model');
        set_title("Reports");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index(){

        $data['cSaveStatus']= 'A';
        $status = $this->device_model->getStatus();
        $data['status'] = $status;
  
                 // load view
            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/reports/device_report_view', $data);
            $this->load->view('adminpanel/footer_view');

  
      }

      public function deviceList(){

        // POST data
        $postData = $this->input->post();
  
        // Get data
        $data = $this->device_model->getDevicesList($postData);
  
        echo json_encode($data);
     }

}
?>
