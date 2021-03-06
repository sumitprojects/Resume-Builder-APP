<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience_Model extends CI_Model {

    public function add_exp($data){
        return $this->db->insert('tbl_eduex',$data);
    }


    public function get_exp($data){
        return $this->db->select('`eduex_id`, `eduex_name`, `eduex_start_date`, `eduex_end_date`, `eduex_title`, `eduex_desc`')
                        ->from('tbl_eduex')
                        ->where('eduex_type','EX')
                        ->where('eduex_user_id',$data)
                        ->get()
                        ->result_array();
    }

    public function get_current($data){
        return $this->db->select('`eduex_id`, `eduex_name`, `eduex_start_date`, `eduex_end_date`, `eduex_title`, `eduex_desc`')
                        ->from('tbl_eduex')
                        ->where('eduex_type','EX')
                        ->where('eduex_user_id',$data)
                        ->where('eduex_end_date IS NULL',NULL,true)
                        ->get()
                        ->result_array();
    }

    public function update_exp($data = [], $where = []){
        return $this->db->update('tbl_eduex',$data, $where);
    }


    public function delete_exp($where){
        return $this->db->delete('tbl_eduex',$where);
    }
}

/* End of file Experience_Model.php */
