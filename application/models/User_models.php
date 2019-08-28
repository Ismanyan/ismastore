<?php 

class user_models extends CI_Model {
    
    // Get data Barang
    function getBarang() 
    {
        return $this->db->get('barang')->result_array();
    }

    // Get Kategori
    function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    // User detail
    function getUserInfo($id)
    {
        return $this->db->get_where('users',array('id' => $id))->result_array()[0];
    }
}