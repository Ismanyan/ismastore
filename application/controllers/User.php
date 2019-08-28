<?php 

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // Check if not login
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url('home/login'));
        }
        $this->load->model('user_models');
    }

    // Logged home
    public function index()
    {
        // DATA PAGE INDEX
        $data['title'] = "Home | Ismastore";
        $data['kategori'] = $this->user_models->getKategori();
        $data['barang'] = $this->user_models->getBarang();
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
        
        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('home/index.php',$data);
        $this->load->view('layouts/footer.php');
    }

    // Direct wa
    public function chat($barang)
    {   
        redirect('https://wa.me/6289630080545?text=Hai%20'.$barang.'%20ini%20ready%20gk%20');
    }


    public function manage()
    {
        $data['title'] = "Home | Ismastore";
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));

        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('manage/index.php',$data);
        $this->load->view('layouts/footer.php');
    }
}