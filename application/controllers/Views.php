<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

    function __construct(){
		parent::__construct();		
        $this->load->model('home_models');
        $this->load->model('views_models');
	}

    // Home Page
	public function index($id)
	{	
        $data['title'] = "View | Ismastore";
        $data['kategori'] = $this->home_models->getKategori();
        $data['barang'] = $this->views_models->getDetail($id);
        $this->load->view('layouts/header.php',$data);
        $this->load->view('home/view.php',$data);
        $this->load->view('layouts/footer.php');
    }
    
    public function test($a)
    {
        echo $a;
        exit;
    }
	
}
