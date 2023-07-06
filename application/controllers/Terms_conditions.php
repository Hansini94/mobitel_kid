<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Terms_conditions extends CI_Controller {

    function _remap($method, $params = array()) {
        $method_exists = method_exists($this, $method);
        $methodToCall = $method_exists ? $method : 'index';
        $this->$methodToCall($method_exists ? $params : $method);
    }

    public function index() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data_header['meta'] = 2;
        
        $data['terms'] = $this->Home_Page_model->get_terms_conditions();        

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/terms_conditions_eng_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);

       
    }

    public function sinhala() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data_header['meta'] = 2;
        
        $data['terms'] = $this->Home_Page_model->get_terms_conditions();        

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/terms_conditions_sin_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);

       
    }

    public function tamil() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data_header['meta'] = 2;
        
        $data['terms'] = $this->Home_Page_model->get_terms_conditions();        

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/terms_conditions_tam_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);

       
    }



    
}

?>
