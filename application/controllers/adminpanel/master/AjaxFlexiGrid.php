<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxFlexiGrid extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('flexigrid');

        $this->load->model('adminpanel/ajax_flxi_model');
        $in = (serialize($_POST));
        log_message('debug', "Ajax module Post -" . $in);
    }

    function get_user_data() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_backend_user";
        $valid_fields = array('id', 'vFirstName', 'vLastName', 'vEmail', 'vUserName', 'vContactNo', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);



        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));


        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $row->vFirstName,
                $row->vLastName,
                $row->vEmail,
                $row->vUserName,
                $row->vContactNo,
                '<a href=\'' . base_url('adminpanel/master/user/update_user/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/user/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/user/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_sector_list() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_company_sector";
        $valid_fields = array('id', 'vCompanysector', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);



        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));


        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $row->vCompanysector,
                '<a href=\'' . base_url('adminpanel/master/areaofservicetwo/add_areaofservicetwo/new/' . $row->id . '') . '\'>Area of Service</a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_areaofservice_list() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_company_type";
        $valid_fields = array('id', 'iSector_id', 'vCompanytype', 'cEnable');
        $sectorid = $this->security->xss_clean($this->uri->segment(5));
        $this->flexigrid->validate_post('id', 'asc', $valid_fields);



        $records = $this->ajax_flxi_model->get_grid_data_where($table_name, $valid_fields, 'iSector_id', $sectorid);

        $this->output->set_header($this->config->item('json_header'));


        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $row->vCompanytype,
                '<a href=\'' . base_url('adminpanel/master/areaofservicetwo/update_areaofservicetwo/' . $row->id . '/' . $sectorid . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/areaofservicetwo/change_status/' . $row->id . '/' . $sectorid . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/areaofservicetwo/delete_record/' . $row->id . '/' . $sectorid . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_user_type() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_user_type";
        $valid_fields = array('id', 'vAccTypeName', 'vAccDescription', 'dSaveDate', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);



        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));

        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $row->vAccTypeName,
                $row->vAccDescription,
                date("Y-m-d", strtotime($row->dSaveDate)),
                '<a href=\'' . base_url('adminpanel/master/user_type/update_user/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/user_type/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/user_type/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_faq() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_faq";
        $valid_fields = array('id', 'vQuestion', 'vAnswer', 'iOrder', 'cEnable', 'iType');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";



            $record_items[] = array($row->id,
                $row->id,
                $row->iType,
                $row->vQuestion,
                $row->iOrder,
                '<a href=\'' . base_url('adminpanel/faq/faq/update_faq/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/faq/faq/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/faq/faq/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_home_content_img() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_home_content";
        $valid_fields = array('id', 'vTitle1', 'vColor1', 'vTitle2', 'vColor2', 'fImage', 'cEnable');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";



            $record_items[] = array($row->id,
                $row->id,
                $row->vTitle1,
                $row->vTitle2,
                $row->fImage,
                '<a href=\'' . base_url('adminpanel/home/hcontent/update_hcontent/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/home/hcontent/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/home/hcontent/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_generalaccount() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_frontend_user";
        $valid_fields = array('id', 'vName', 'vLastName', 'vTele', 'vEmail', 'cEnable');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_where($table_name, $valid_fields, 'iUserType', 3);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";


            $record_items[] = array($row->id,
                $row->id,
                $row->vName,
                $row->vLastName,
                $row->vEmail,
                $row->vTele,
                '<a href=\'' . base_url('adminpanel/useraccount/generalaccount/update_generalaccount/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/generalaccount/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/generalaccount/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    ##
    ##

    function get_Reported_user_List() {
        $valid_fields = array('tbl_report_user.id', 'tbl_report_user.vCommentername', 'tbl_report_user.vReason', 'tbl_report_user.cEnable', 'tbl_frontend_user.vName');
        $this->flexigrid->validate_post('tbl_report_user.id', 'desc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_join_reporteduser($valid_fields);


        $this->output->set_header($this->config->item('json_header'));


        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";


            $record_items[] = array($row->id,
                $row->id,
                $row->vCommentername,
                $row->vReason,
                $row->vName,
                '<a href=\'' . base_url('adminpanel/useraccount/reportedusers/update_reportedusers/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/reportedusers/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/reportedusers/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_employeeaccount() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_frontend_user";
        $valid_fields = array('id', 'vName', 'vLastName', 'vTele', 'vEmail', 'cEnable');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_where($table_name, $valid_fields, 'iUserType', 2);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";


            $record_items[] = array($row->id,
                $row->id,
                $row->vName,
                $row->vLastName,
                $row->vEmail,
                $row->vTele,
                '<a href=\'' . base_url('adminpanel/useraccount/employeeaccount/update_employeeaccount/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/employeeaccount/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/useraccount/employeeaccount/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_activecompany() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_frontend_user";
        $valid_fields = array('id', 'vName', 'iCompanyreff', 'vCompanyreg', 'vFeedbacktype', 'cEnable');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_where_active($table_name, $valid_fields, 'iUserType', 1);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            if ($row->vFeedbacktype === 'G')
                $vFeedbacktype = "General";
            else
                $vFeedbacktype = "Employee";

            if ($row->iCompanyreff === '' || $row->iCompanyreff === '0')
                $iCompanyreff = "--";
            else
                $iCompanyreff = $row->iCompanyreff;


            $record_items[] = array($row->id,
                $row->id,
                $row->vName,
                $row->vCompanyreg,
                $vFeedbacktype,
                $iCompanyreff,
                '<a href=\'' . base_url('adminpanel/company/activecompany/update_activecompany/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/company/activecompany/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/company/activecompany/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
                    //'<a href=\'' . base_url('adminpanel/company/activecompany/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_pendingcompany() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_frontend_user";
        $valid_fields = array('id', 'vName', 'vCompanyreg', 'vFeedbacktype', 'cEnable', 'iCompanyreff');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_where_pending($table_name, $valid_fields, 'iUserType', 1);


        $this->output->set_header($this->config->item('json_header'));

        $this->load->model('adminpanel/master_data_model');
        $record_items = array();

        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            if ($row->vFeedbacktype === 'G')
                $vFeedbacktype = "General";
            else
                $vFeedbacktype = "Employee";

            if ($row->iCompanyreff === '' || $row->iCompanyreff === '0')
                $iCompanyreff = "--";
            else
                $iCompanyreff = $row->iCompanyreff;


            $record_items[] = array($row->id,
                $row->id,
                $row->vName,
                $row->vCompanyreg,
                $vFeedbacktype,
                $iCompanyreff,
                '<a href=\'' . base_url('adminpanel/company/pendingcompany/update_pendingcompany/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/company/pendingcompany/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/company/pendingcompany/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
                    // '<a href=\'' . base_url('adminpanel/company/pendingcompany/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_property_list() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_hotels";
        $valid_fields = array('id', 'vPropertyName', 'vLoacation', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));
        $no = 1;
        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";



            $record_items[] = array($row->id,
                $row->id,
                $no++,
                $row->vPropertyName,
                $row->vLoacation,
                '<a href=\'' . base_url('adminpanel/master/property/update_property/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/property_feature/add_feature_property/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/add.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/propery_room_type/add_room_property_test/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/add.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/property_image_gall/add_room_property_test') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/add.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/property/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/property/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_main_facility_list() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_main_facilities";
        $valid_fields = array('id', 'vFacilityName', 'iOrder', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));
        $no = 1;
        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $no++,
                $row->vFacilityName,
                $row->iOrder,
                '<a href=\'' . base_url('adminpanel/master/main_facilities/update_main_facility/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/main_facilities/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/main_facilities/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_sub_facility_list() {
        $this->load->model('adminpanel/master_data_model');
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_sub_facilities";
        $valid_fields = array('id', 'iMainFacilityID', 'vSubFacilityName', 'iOrder', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));
        $no = 1;
        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $feature = $this->master_data_model->get_feature_flexi($row->iMainFacilityID);

            $record_items[] = array($row->id,
                $row->id,
                $no++,
                $feature,
                $row->vSubFacilityName,
                $row->iOrder,
                '<a href=\'' . base_url('adminpanel/master/sub_facility/update_sub_facility/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/sub_facility/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/sub_facility/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function get_room_list() {
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_room_type";
        $valid_fields = array('id', 'vRoomTypeName', 'iOrder', 'cEnable');

        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data($table_name, $valid_fields);

        $this->output->set_header($this->config->item('json_header'));
        $no = 1;
        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $record_items[] = array($row->id,
                $row->id,
                $no++,
                $row->vRoomTypeName,
                $row->iOrder,
                '<a href=\'' . base_url('adminpanel/master/room/update_room/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/room/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/room/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

    function room_property_list() {
        $iPropertyID = $_GET['iPropertyID'];
        //List of all fields that can be sortable. This is Optional.
        //This prevents that a user sorts by a column that we dont want him to access, or that doesnt exist, preventing errors.
        $table_name = "tbl_link_property_room_type";
        $valid_fields = array('id', 'iRoomTypeID', 'iMaxAdult', 'iMaxChildren', 'iNoOfRooms', 'fPrice', 'cEnable');

        $this->load->model('adminpanel/master_data_model');


        $this->flexigrid->validate_post('id', 'asc', $valid_fields);

        $records = $this->ajax_flxi_model->get_grid_data_where($table_name, $valid_fields, 'iPropertyID', $iPropertyID);

        $this->output->set_header($this->config->item('json_header'));
        $no = 1;
        $record_items = array();
        foreach ($records['records']->result() as $row) {
            if ($row->cEnable === 'Y')
                $stats_png = $this->config->item('base_url') . "public/images/accept.png";
            else
                $stats_png = $this->config->item('base_url') . "public/images/close.png";

            $vRoomTypeName = $this->master_data_model->get_room_type_flexi($row->iRoomTypeID);
            $price = number_format($row->fPrice, 2);

            $record_items[] = array($row->id,
                $row->id,
                $no++,
                $vRoomTypeName,
                $row->iMaxAdult,
                $row->iMaxChildren,
                $row->iNoOfRooms,
                $price,
                '<a href=\'' . base_url('adminpanel/master/propery_room_type/update_room_property/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/edit.png\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/propery_room_type/change_status/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $stats_png . '\'></a> ',
                '<a href=\'' . base_url('adminpanel/master/propery_room_type/delete_record/' . $row->id . '') . '\'><img border=\'0\' src=\'' . $this->config->item('base_url') . 'public/images/close.png\'></a> '
            );
        }
        //Print please
        $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
    }

}

?>