<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_flxi_model extends CI_Model {

    /**
     * Instanciar o CI
     */
    public function __construct() {
        parent::__construct();
        //$this->CI =& get_instance();
    }

    public function get_grid_data($table_name, $valid_fields) {
        //Build contents query

        $fNames = implode(",", $valid_fields);
        $this->db->select($fNames)->from($table_name);
        $this->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();
        //echo $this->db->last_query();
        // exit();
        //Build count query

        $this->db->select('count(id) as record_count')->from($table_name);
        //$this->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        // Get Record Count
        $return['record_count'] = $row->record_count;
        //echo $this->db->last_query();
        //Return all
        return $return;
    }

    public function get_grid_data_where($table_name, $valid_fields, $field, $value) {
        //Build contents query

        $fNames = implode(",", $valid_fields);
        $this->db->select($fNames)->from($table_name)->where('' . $field . '', $value);
        $this->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();
        // echo $this->db->last_query();
        // exit();
        //Build count query

        $this->db->select('count(id) as record_count')->from($table_name)->where('' . $field . '', $value);
        //$this->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        // Get Record Count
        $return['record_count'] = $row->record_count;
        //echo $this->db->last_query();
        //Return all
        return $return;
    }

    public function get_grid_data_where_active($table_name, $valid_fields, $field, $value) {
        //Build contents query

        $fNames = implode(",", $valid_fields);
        $this->db->select($fNames)->from($table_name)->where('' . $field . '', $value)->where('cEnable', 'Y');
        $this->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();
        // echo $this->db->last_query();
        //  exit();
        //Build count query

        $this->db->select('count(id) as record_count')->from($table_name)->where('' . $field . '', $value)->where('cEnable', 'Y');
        //$this->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        // Get Record Count
        $return['record_count'] = $row->record_count;
        //echo $this->db->last_query();
        //Return all
        return $return;
    }

    public function get_grid_data_where_pending($table_name, $valid_fields, $field, $value) {
        //Build contents query

        $fNames = implode(",", $valid_fields);
        $this->db->select($fNames)->from($table_name)->where('' . $field . '', $value)->where('cEnable', 'N');
        $this->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();
        // echo $this->db->last_query();
        //  exit();
        //Build count query

        $this->db->select('count(id) as record_count')->from($table_name)->where('' . $field . '', $value)->where('cEnable', 'N');
        //$this->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        // Get Record Count
        $return['record_count'] = $row->record_count;
        //echo $this->db->last_query();
        //Return all
        return $return;
    }

    public function get_grid_data_join_reporteduser($valid_fields) {

        $this->db->select($valid_fields);
        $this->db->from('tbl_report_user');
        $this->db->join('tbl_frontend_user', 'tbl_frontend_user.id = tbl_report_user.iUserid');

        $this->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();
        // echo $this->db->last_query();

        $this->db->select('count(tbl_report_user.id) as record_count');
        $this->db->from('tbl_report_user');
        $this->db->join('tbl_frontend_user', 'tbl_frontend_user.id = tbl_report_user.iUserid');

        $record_count = $this->db->get();
        $row = $record_count->row();

        // Get Record Count
        $return['record_count'] = $row->record_count;


        //Return all
        return $return;
    }

}

?>