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
        'foto_barang'	=>  $input['file'],
        'harga_barang'	=>  $input['harga_barang'],
        'rating_barang'	=>  0,
        'jumlah_beli'	=>  0,
        'created-at'	=>  NULL
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

    // Delete deletecart
    function deletecart($id)
    {
        $this->db->delete('cart', array('id_cart' => $id));
    }

    // Add to cart
    function addcart($id)
    {
        $query = array( 
        'id_cart'	=>  NULL,
        'id_user' => $this->session->userdata('id_user'),
        'id_barang' =>  $id, 
        'jumlah' =>  1, 
        'created_at'	=>  NULL
        );
        $this->db->insert('cart', $query);
    }

    // Get cart by id
    function getCart($id)
    {
        $this->db->join('barang','barang.id = cart.id_barang','inner');
        $this->db->where(array('id_user' => $id));
        return $this->db->get('cart')->result_array();
    }

    // Get address of user
    function getAddressUser($id)
    {
        $query = $this->db->get_where('alamat',array('id_user'=>$id));
        
        if ($query->num_rows() === 0) {
            return 0;
        } else {
            return $query;
        }
    }

    // get provinsi
    function getProv()
    {
        return $this->db->get('provinsi')->result_array();
    }

    // Get kota
    function getKota()
    {
        return $this->db->get('kota')->result_array();
    }

    // add address user
    function addAdress($input)
    {
        $data = [
            'id_alamat' => null,
            'id_provinsi' => $input['id_provinsi'],
            'id_kota' => $input['id_kota'],
            'kecamatan' => $input['kecamatan'],
            'kode_pos' => $input['zipkode'],
            'alamat' => $input['alamat'],
            'nama_penerima' => $input['nama_penerima'],
            'id_user' => $this->session->userdata('id_user')
        ];

        $this->db->insert('alamat',$data);
    }

    // checkout function
    public function checkout($input)
    {
        $data = [
            'id_order' => null,
            'id_user' => $this->session->userdata('id_user'),
            'id_alamat' => $input['id_alamat'],
            'harga' => $input['harga'],
            'status' => 0
        ];

        $this->db->insert('order_list',$data);

        $this->db->delete('cart',array('id_user'=>$this->session->userdata('id_user')));
    }

    // Get order_list where status = 0
    function getPendingOrder()
    {

        $this->db->join('alamat','alamat.id_alamat = order_list.id_alamat','inner');
        $this->db->where(array('id_user' => $this->session->userdata('id_user'),'status' => 0));
        return $this->db->get_where('order_list');
    }
}