<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
		parent::__construct();		
        $this->load->model('home_models');
        
        // Check if already logged
        if ($this->session->userdata('logged_in'))
        { 
            redirect(base_url('user'));
        }
	}

    // Home Page
	public function index()
	{	
        // DATA PAGE INDEX
        $data['kategori'] = $this->home_models->getKategori();
        $data['barang'] = $this->home_models->getBarang();
        $data['title'] = "Home | Ismastore";
        $this->load->view('layouts/header.php',$data);
        $this->load->view('home/index.php',$data);
        $this->load->view('layouts/footer.php');
    }
    
    // Login Page
	public function login()
	{
        $data['title'] = "Login | Ismastore";
        $this->load->view('auth/login.php',$data);
    }
    
    // Daftar Page
	public function daftar()
	{
        $data['title'] = "Daftar | Ismastore";
        $this->load->view('auth/daftar.php',$data);
	}
	
}
