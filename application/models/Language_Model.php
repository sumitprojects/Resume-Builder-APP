<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_Model extends CI_Model {

    public function add_lang($data){
        return $this->db->insert('tbl_languages',$data);
    }


    public function get_lang($data){
        return $this->db->select('`lang_id`, `lang_name`, `lang_level`')
                        ->from('tbl_languages')
                        ->where('lang_user_id',$data)
                        ->get()
                        ->result_array();
    }

    public function update_lang($data = [], $where = []){
        return $this->db->update('tbl_languages',$data, $where);
    }


    public function delete_lang($where){
        return $this->db->delete('tbl_languages',$where);
    }
}

/* End of file Language_Model.php */
