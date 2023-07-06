<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Home extends CI_Controller {

    function _remap($method, $params = array()) {
        $method_exists = method_exists($this, $method);
        $methodToCall = $method_exists ? $method : 'index';
        $this->$methodToCall($method_exists ? $params : $method);
    }

    public function index() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data['category'] = $this->Home_Page_model->get_category_list();
        $data['sub_category'] = $this->Home_Page_model->get_sub_category_list();
        $data['district'] = $this->Home_Page_model->get_district_list();            

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/home_english_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);
       
    }
    
    public function sinhala() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data['category'] = $this->Home_Page_model->get_category_list();
        $data['sub_category'] = $this->Home_Page_model->get_sub_category_list();
        $data['district'] = $this->Home_Page_model->get_district_list();            

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/home_sinhala_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);
       
    }

    public function tamil() {

        $this->load->model('frontend_model/Home_Page_model');

        $data = array();
        $data_header = array();

        $data['category'] = $this->Home_Page_model->get_category_list();
        $data['sub_category'] = $this->Home_Page_model->get_sub_category_list();
        $data['district'] = $this->Home_Page_model->get_district_list();            

        $this->load->view('frontendview/header_view',$data_header);
		$this->load->view('frontendview/home_tamil_view',$data);
		$this->load->view('frontendview/footer_view',$data_header);
       
    }

    function get_sub_categories(){
        $category_id = $this->input->post('cat_id',TRUE);

        $this->db->select('id,vSubcategoryName');
        $this->db->from('tbl_sub_categories');
        $this->db->where('iCategoryId', $category_id);
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $records = $this->db->get('');
     
        $output = null; 
        foreach ($records->result() as $row)
         {
             $output .= "<option value='".$row->id."'>".$row->vSubcategoryName."</option>";
         }
     
         echo $output;
    }
    
    function get_sub_sin_categories(){
        $category_id = $this->input->post('cat_id',TRUE);

        $this->db->select('id,vSubcategoryNameSin');
        $this->db->from('tbl_sub_categories');
        $this->db->where('iCategoryId', $category_id);
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $records = $this->db->get('');
     
        $output = null; 
        foreach ($records->result() as $row)
         {
             $output .= "<option value='".$row->id."'>".$row->vSubcategoryNameSin."</option>";
         }
     
         echo $output;
    }
    
    function get_sub_tam_categories(){
        $category_id = $this->input->post('cat_id',TRUE);

        $this->db->select('id,vSubcategoryNameTam');
        $this->db->from('tbl_sub_categories');
        $this->db->where('iCategoryId', $category_id);
        $this->db->where('cEnable', 'Y');
        $this->db->order_by("iOrder", "ASC");
        $records = $this->db->get('');
     
        $output = null; 
        foreach ($records->result() as $row)
         {
             $output .= "<option value='".$row->id."'>".$row->vSubcategoryNameTam."</option>";
         }
     
         echo $output;
    }

         
    public function save_submission() {
        // die("test");
        $this->load->model('frontend_model/Home_Page_model');

        $tFullName = $this->input->post('tFullName', TRUE);            
        $vEmail = $this->input->post('vEmail', TRUE); 
        $iCategoryId = $this->input->post('iCategoryId', TRUE);  
        $iSubCategoryId = $this->input->post('iSubCategoryId', TRUE);
        $iDistrictId = $this->input->post('iDistrictId', TRUE); 
        // $formFile_video = $this->input->post('formFile_video', TRUE); 
        // $formFile_img = $this->input->post('formFile_img', TRUE);  
        $vVideo=NULL; $vImage=NULL;
        $row = $this->Home_Page_model->referenceNo();
        if($row){
            $idPostfix = (int)substr($row->vReferenceNo,3)+1;
            $nextId = 'REF'.STR_PAD((string)$idPostfix,5,"0",STR_PAD_LEFT);
        }
        else{
            $nextId = 'REF00001';
        }
        if (!empty($_FILES['vVideo']['name'])) {
            $new_video_name = $nextId.time().$_FILES["vVideo"]['name'];
            $vVideo = $new_video_name;
        }
        if (!empty($_FILES['vImage']['name'])) {
            $new_img_name = $nextId.time().$_FILES["vImage"]['name'];
            $vImage = $new_img_name;
        }
        
        
        $upload_datetime = date("Y-m-d h:i:s");
        
        $data = array(
            'vReferenceNo'=> $nextId,
            'tFullName' => $tFullName,
            'vEmail' => $vEmail,
            'iCategoryId' => $iCategoryId,
            'iSubCategoryId' => $iSubCategoryId,
            'iDistrictId' => $iDistrictId,
            'vVideo' => $vVideo,   
            'vImage' => $vImage,
            'upload_datetime' => $upload_datetime
        );       
        
        
        
        $category = $this->Home_Page_model->selected_category($iCategoryId);
        $categoryName = $category[0]->vCategoryName;
        $categoryNameR = str_replace( ' ', '_', $categoryName);       
        
        $subcategory = $this->Home_Page_model->selected_subcategory($iSubCategoryId);
        $subcategoryName = $subcategory[0]->vSubcategoryName;
        $subcategoryNameR = str_replace( ' ', '_', $subcategoryName);

        $image = $_FILES['vImage']['name'];
        $video = $_FILES['vVideo']['name'];
        
        // if (isset($_POST['g-recaptcha-response'])) 
        //     $captcha = $_POST['g-recaptcha-response'];
            
        // if(isset($_POST['Response'])){
        //     $captcha = $_POST['Response'];
        // }
       
        // if (!$captcha) {
        //     $this->session->set_flashdata('message_error', ' Please check the captcha. ');
        //     redirect(base_url() . 'submission');
        //     exit();
        // } 
        // else 
        // {
        //     $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeA75cjAAAAAHNCV4vu68BlYRHlP0hkHeomQ3CT&response=".$captcha));
            // var_dump($image);  exit(); 
            // if ($response->success != false) {
                if(!empty($_FILES['vVideo']['name']) && ($_FILES['vVideo']['size']) < 52428800)
                {
                    if(!empty($_FILES['vImage']['name']) && ($_FILES['vImage']['size']) < 2097152)
                    {
                    
                        if ($this->Home_Page_model->multisave($data,$categoryNameR,$subcategoryNameR,$image,$video,$vVideo,$vImage)) {  
                        
                            echo json_encode($nextId);
                        } else {                    
                            $this->session->set_flashdata('message_error', 'Save fail!');
                            redirect(base_url() . 'submission');
                        }
                    }
                }                
            // } 
            // else 
            // {
            //     $this->session->set_flashdata('message_warning', 'You are a Spammer');
            //     redirect(base_url() . 'submission');
            //     exit();
            // }
        // }
    }

    
}

?>
