<?php 

class views_models extends CI_Model {
    
    // Get data Barang
    function getDetail($id) 
    {
        return $this->db->get_where('barang',array('id'=>$id))->result_array()[0];
    }

}