<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Model extends CI_Model {

    public function add_per($data){
        return $this->db->insert('tbl_personal_info',$data);
    }


    public function get_per($data){
        return $this->db->select('`per_id`,`per_fullname`, `per_dob`, `per_website`, `per_location`, `per_github`, `per_fb`, `per_tw`')
                        ->from('tbl_personal_info')
                        ->where('per_user_id',$data)
                        ->get()
                        ->row_array();
    }

    public function update_per($data = [], $where = []){
        return $this->db->update('tbl_personal_info',$data, $where);
    }


    public function delete_per($where){
        return $this->db->delete('tbl_personal_info',$where);
    }
}

/* End of file Person_Model.php */
