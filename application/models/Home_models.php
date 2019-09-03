<?php 

class home_models extends CI_Model {
    
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

    // Get search barang
    function searchBarang($input)
    {
        $this->db->like('nama_barang',$input,'both');
        return $this->db->get('barang')->result_array();
    }

    // Get Kategori
    function kategoriBarang($input)
    {
        $this->db->where('kategori_barang',$input);
        return $this->db->get('barang')->result_array();
    }

}