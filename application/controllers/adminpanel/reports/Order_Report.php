<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Order_Report extends CI_Controller {

    private $table_name = "tbl_order";
    private $page_id = "23";
    private $redirect_path = "adminpanel/reports/Order_Report";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->helper('url');
        $this->load->model('adminpanel/common_model');
        $this->load->model('adminpanel/order_model');
        $this->load->model('adminpanel/device_model');
        $this->load->model('adminpanel/Admin_model');
        set_title("Reports");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        
        $data['cSaveStatus']= 'A';
        $status = $this->order_model->getStatus();
        $data['status'] = $status;
  
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/reports/order_report_view', $data);
        $this->load->view('adminpanel/footer_view');
    }
	
	public function orderList(){

        // POST data
        $postData = $this->input->post();
  
        // Get data
        $data = $this->order_model->getOrdersList($postData);
  
        echo json_encode($data);
     }
    
}

?>
