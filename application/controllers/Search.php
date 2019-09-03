<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // Check if not login
        if ($this->session->userdata('logged_in'))
        { 
            $this->load->model('user_models');        
        }
    }

    // search query
    public function q()
    {
        $this->load->model('home_models');

        
        $input['keywoard'] = $this->input->post('keywoard',true);
        $data['title'] = "Search | Ismastore";
        $data['kategori'] = $this->home_models->getKategori();
        $data['barang'] = $this->home_models->searchBarang($input['keywoard']);
        
        // Check if login
        if ($this->session->userdata('logged_in'))
        { 
            $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
            $this->load->view('layouts/header',$data);
        } else {
            $this->load->view('layouts/header',$data);
        }
        $this->load->view('home/search',$data);
        $this->load->view('layouts/footer');
    }

    // Kategori query
    public function kategori($key)
    {
        $this->load->model('home_models');
        
        $input['keywoard'] = $key;
        $data['title'] = "Search | Ismastore";
        $data['kategori'] = $this->home_models->getKategori();
        $data['barang'] = $this->home_models->kategoriBarang($input['keywoard']);
        
        // Check if login
        if ($this->session->userdata('logged_in'))
        { 
            $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
            $this->load->view('layouts/header',$data);
        } else {
            $this->load->view('layouts/header',$data);
        }
        $this->load->view('home/search',$data);
        $this->load->view('layouts/footer');
    }
}