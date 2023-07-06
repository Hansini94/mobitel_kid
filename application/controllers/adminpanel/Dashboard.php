<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Dashboard extends CI_Controller {

   
    public function __construct() {
        parent::__construct();

		set_title("Dashboard");
        
    }

    public function index() {
		
		
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/dashboard_view');
        $this->load->view('adminpanel/footer_view');
    }
	
	

}

?>
