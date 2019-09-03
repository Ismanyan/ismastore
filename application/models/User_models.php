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

    // delete barang
    function deleteBarang($id)
    {
        $this->db->delete('barang', array('id' => $id));
    }

    // add wishlist
    function addwishlist($barang,$id)
    {
        $query = array( 
        'id'	=>  NULL,
        'id_barang' =>  $id, 
        'nama_barang' =>  $barang, 
        'id_user' => $this->session->userdata('id_user'),
        'created_at'	=>  NULL
        );
        $this->db->insert('wishlist', $query);
    }

    // add Barang
    function addBarang($input)
    {
        $query = array( 
        'id'	=>  NULL,
        'kategori_barang' =>  $input['kategori_barang'], 
        'nama_barang' =>  $input['nama_barang'], 
        'desc_barang' => $input['harga_barang'],
        'foto_barang'	=>  '-',
        'harga_barang'	=>  $input['harga_barang'],
        'rating_barang'	=>  NULL,
        'jumlah_beli'	=>  NULL,
        'created-at'	=>  NULL,
        'id_toko'	=>  NULL,
        'nama_toko'	=>  NULL 
    );
        $this->db->insert('barang', $query);
    }

    // Get Wishlist
    function getWishlist($id)
    {
        
        return $this->db->get_where('wishlist',array('id_user' => $id))->result_array();   
    }

    // Delete wishlist
    function deletewishlist($id)
    {
        $this->db->delete('wishlist', array('id' => $id));
    }

    // Add to cart
    function addcart($barang,$id)
    {
        $query = array( 
        'id'	=>  NULL,
        'id_user' => $this->session->userdata('id_user'),
        'id_barang' =>  $id, 
        'nama_barang' =>  $barang,
        'jumlah' =>  1, 
        'created_at'	=>  NULL
        );
        $this->db->insert('cart', $query);
    }

    // Get cart by id
    function getCart($id)
    {
        return $this->db->get_where('cart',array('id_user' => $id))->result_array();
    }
}