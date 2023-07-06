<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* date : 12-12-2022
 * author : Hansini
 */

Class Submissions extends CI_Controller {

    private $table_name = "tbl_submissions";
    private $page_id = "11";
    private $redirect_path = "adminpanel/submission/submissions";

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('common_library');
        $this->load->helper('flexigrid');
        $this->load->helper('ckeditor');
        $this->load->model('adminpanel/common_model');
        $this->load->model('adminpanel/Master_data_model');
        $this->load->model('adminpanel/Submission_model');
        set_title("Submissions");
        $user_privilages = $this->common_model->get_page_detail($this->page_id);
        $this->session->set_userdata('u_privilages', $user_privilages);
    }

    public function index() {
        $data['cSaveStatus']= 'A';
        $data['list_data'] = $this->common_model->get_all_data_list($this->table_name);
        $data['category'] = $this->common_model->get_category_list();
        $data['sub_category'] = $this->common_model->get_sub_category_list();
        $data['district'] = $this->common_model->get_district_list();
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/submission/submissions_view', $data);
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

    
    public function search_data(){
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $category_id = $this->input->post('category_id');
        $sub_category_id = $this->input->post('sub_category_id');
        $district_id = $this->input->post('district_id');             
        
        $dateYear = date('Y');$dateMonth = date('m');$dateDay = date('d');$dateHour = date('H');$dateMin = date('i');
        $folderName = $dateYear."_".$dateMonth."_".$dateDay."_".$dateHour."_".$dateMin;
        $path = 'zip_files/'.$folderName;  
        // $newPath = 'zip_files/'.$folderName.'/'; 

        //  var_dump($district_id);exit();
        $data['cSaveStatus']= 'A';
        $data['category'] = $this->common_model->get_category_list();
        $data['sub_category'] = $this->common_model->get_sub_category_list();
        $data['district'] = $this->common_model->get_district_list();
        
        $data['list_data'] = $this->Submission_model->search_details($from_date,$to_date,$category_id,$sub_category_id,$district_id);
        // var_dump($data['list_data']);
        foreach($data['list_data'] as $list)
        {
            // var_dump($list->vImage); exit();
            $category = $this->Submission_model->selected_category($list->iCategoryId);
            $categoryName = $category[0]->vCategoryName;
            $categoryNameR = str_replace( ' ', '_', $categoryName);        
            
            $subcategory = $this->Submission_model->selected_subcategory($list->iSubCategoryId);
            $subcategoryName = $subcategory[0]->vSubcategoryName;
            $subcategoryNameR = str_replace( ' ', '_', $subcategoryName); 

            if($list->vImage !== NULL)
            {
                $oldPath_image = 'uploading_images/'.$categoryNameR.'/'.$subcategoryNameR;
            }
            if($list->vVideo !== NULL)
            {
                $oldPath_video = 'uploading_videos/'.$categoryNameR.'/'.$subcategoryNameR;
            }
                                              
            if(file_exists($path)) 
            {                                
                // copy($oldPath.$list->vImage,'zip_files/'.$folderName.'/');
                // $dir = opendir($path);         
                // if (is_file($oldPath . '/' . $list->vImage)) {
                    copy($oldPath_image . '/' . $list->vImage,'zip_files/'.$folderName. '/' . $list->vImage);
                    copy($oldPath_video . '/' . $list->vVideo,'zip_files/'.$folderName. '/' . $list->vVideo);
                // }
                // else {
                    // recurse_copy($oldPath . '/' . $list->vImage,'zip_files/'.$folderName. '/' . $list->vImage);
                // }
                    // copy($oldPath.$list->vImage,'zip_files/'.$folderName.'/'.$list->vImage);
                // closedir($dir);
            }     
            else{
                mkdir('zip_files/'.$folderName, 0777, TRUE);               
                // copy($oldPath.$list->vImage,'zip_files/'.$folderName.'/');
                // $dir = opendir($path);         
                // if (is_file($oldPath . '/' . $list->vImage)) {
                    copy($oldPath_image . '/' . $list->vImage,'zip_files/'.$folderName. '/' . $list->vImage);
                    copy($oldPath_video . '/' . $list->vVideo,'zip_files/'.$folderName. '/' . $list->vVideo);
                // }
                // else {
                    // recurse_copy($oldPath . '/' . $list->vImage,'zip_files/'.$folderName. '/' . $list->vImage);
                    
                // }
                // closedir($dir);
            }
        }  
        $targetPath = $path;
        $this->load->library('zip');
        if (file_exists($targetPath)){ // check target directory
            $this->zip->read_dir($targetPath,False); // read target directory
            if(!$this->zip->archive($targetPath.'.zip')){ // zip target directory
                echo "failed";
            }else{
                $data['file_path'] = $targetPath.'.zip';
                
            }
        }
            
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/submission/submissions_view', $data);
        $this->load->view('adminpanel/footer_view');
        
    }


}

?>
