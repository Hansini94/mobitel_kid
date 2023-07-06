<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function form_names() {
        //return $query = $this->db->get('tbl_dyn_menu');
		$this->db->where('tbl_dyn_menu.show_menu', 1);
        $this->db->order_by("fOrder", "ASC");
        $result = $this->db->get('tbl_dyn_menu');
        
        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
    }

    public function get_user_types() {

        
        $this->db->order_by("vAccTypeName", "ASC");
        $result = $this->db->get('tbl_user_type');

        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
    }

   

    public function get_user_detail() {


        $this->db->select('tbl_backend_user.id,tbl_backend_user.vFirstName,tbl_backend_user.vUserName,tbl_backend_user.vLastName,tbl_backend_user.cEnable,tbl_backend_user.vContactNo,tbl_backend_user.vEmail,tbl_backend_user.iUserType');
        $this->db->from('tbl_backend_user');
        $this->db->join('tbl_user_type', 'tbl_backend_user.iUserType = tbl_user_type.id');
        $this->db->order_by("tbl_backend_user.vFirstName", "ASC");
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
    }
public function get_branch_detail() {


        $this->db->select('*');
        $this->db->from('tbl_city');
        $this->db->order_by("iOrder", "ASC");
        $this->db->where('cEnable', 'Y');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
    }

    public function save_user_type($save_status) {

        $data = array(
            'vAccTypeName' => $this->input->post('vAccTypeName', TRUE),
            'vAccDescription' => $this->input->post('vAccDescription', TRUE),
            'dSaveDate' => date('Y-m-d H:i:s'),
            'cEnable' => 'Y'
        );
        $rowCount = $this->input->post('rowCount');

        if ($save_status === 'A') {
            $this->db->trans_start();
            $this->db->insert('tbl_user_type', $data);
            $insert_id = $this->db->insert_id();

            for ($i = 0; $i < count($rowCount); $i++) {
                $data_t = array();
                $data_t['iUserTypeID'] = $insert_id;
                $data_t['iFormID'] = $rowCount[$i];
                $viewChck = "view" . $rowCount[$i];
                if ($this->input->post($viewChck, TRUE) == 1) {
                    $viewVal = "1";
                } else {
                    $viewVal = "0";
                }
                $editChck = "edit" . $rowCount[$i];
                if ($this->input->post($editChck, TRUE) == 2) {
                    $editVal = "2";
                } else {
                    $editVal = "0";
                }
                $deleteChck = "delete" . $rowCount[$i];
                if ($this->input->post($deleteChck, TRUE) == 3) {
                    $deleteVal = "3";
                } else {
                    $deleteVal = "0";
                }
                $data_t['vPrivilages'] = $viewVal . "," . $editVal . "," . $deleteVal;

                $query = $this->db->insert('tbl_privilage', $data_t);
            }

            $this->db->trans_complete();
        } else {
            $user_type_id = $this->input->post('id');

            $this->db->trans_start();
            $this->db->where('id', $user_type_id);
            $this->db->update('tbl_user_type', $data);
            $this->db->where('iUserTypeID', $user_type_id);
            $this->db->delete('tbl_privilage');

            for ($i = 0; $i < count($rowCount); $i++) {
                $data_t = array();
                $data_t['iUserTypeID'] = $user_type_id;
                $data_t['iFormID'] = $rowCount[$i];
                $viewChck = "view" . $rowCount[$i];
                if ($this->input->post($viewChck, TRUE) == 1) {
                    $viewVal = "1";
                } else {
                    $viewVal = "0";
                }
                $editChck = "edit" . $rowCount[$i];
                if ($this->input->post($editChck, TRUE) == 2) {
                    $editVal = "2";
                } else {
                    $editVal = "0";
                }
                $deleteChck = "delete" . $rowCount[$i];
                if ($this->input->post($deleteChck, TRUE) == 3) {
                    $deleteVal = "3";
                } else {
                    $deleteVal = "0";
                }
                $data_t['vPrivilages'] = $viewVal . "," . $editVal . "," . $deleteVal;

                $query = $this->db->insert('tbl_privilage', $data_t);
            }

            $this->db->trans_complete();
        }




        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function privilage_form_names($user_type_id) {
        if ($user_type_id != '') {
            $this->db->select('iFormID,vPrivilages', false);
            $this->db->where('iUserTypeID', $user_type_id);
            $res = $this->db->get('tbl_privilage');
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $row) {
                    $data[] = $row;
                }
            } else {
                $data = '';
            }
            return $data;
        }
    }

    public function delete_privilages() {
        $iUserTypeID = $this->uri->segment(5);

        $this->db->trans_start();
        $this->db->where('id', $iUserTypeID);
        $this->db->delete('tbl_user_type');

        $this->db->where('iUserTypeID', $iUserTypeID);
        $this->db->delete('tbl_privilage');

        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message', 'Data delete faild.');
            return false;
        } else {
            $this->session->set_flashdata('message', 'Data successfully deleted.');
            $tDes = "Record has been deleteed";
            $this->load->model('adminpanel/common_model');
            $this->common_model->add_log($tDes);
            return true;
        }
    }

    public function get_specific_details($table_name,$field,$order,$col,$val) {

        $this->db->from($table_name);
        $this->db->where($col, $val);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
    //   echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_all_details($table_name,$field,$order) {

        $this->db->from($table_name);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

}

?>
