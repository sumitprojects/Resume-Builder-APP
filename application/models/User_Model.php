<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function add_user($data){
        return $this->db->insert('tbl_user',$data);
    }


    public function get_user($data){
        return $this->db->select('`user_id`, `user_email`, `user_profile_pic`, `user_mobile`')
                        ->from('tbl_user')
                        ->where('user_email',$data['user_email'])
                        ->where('user_password',$data['user_password'])
                        ->limit(1)
                        ->get()
                        ->row_array();
    }

    public function get_user_by( $data ){
        return $this->db->select('user_email,user_profile_pic,user_mobile')
                        ->from('tbl_user')
                        ->where('user_id',$data)
                        ->limit(1)
                        ->get()
                        ->row_array();
    }

    public function update_user($data = [], $where = []){
        return $this->db->update('tbl_user',$data,$where);
    }


    public function delete_user($where){
        return $this->db->delete('tbl_user',$where);
    }
}

/* End of file User_Model.php */
