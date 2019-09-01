<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

    function __construct(){
		parent::__construct();		
        $this->load->model('home_models');
        $this->load->model('views_models');    
	}

    // Home Page
	public function produk($id)
	{	
        // Check if already logged
        if ($this->session->userdata('logged_in'))
        { 
            $this->load->model('user_models');
            $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
        }

        // Data for this page
        $data['title'] = "View | Ismastore";
        $data['kategori'] = $this->home_models->getKategori();
        $data['barang'] = $this->views_models->getDetail($id);

        // Load view page
        $this->load->view('layouts/header.php',$data);
        $this->load->view('home/view.php',$data);
        $this->load->view('layouts/footer.php');
    }
	
}
