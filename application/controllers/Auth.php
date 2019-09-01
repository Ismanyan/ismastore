<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_models');
    }
    
    // Method daftar
    public function daftar()
    {   
        $data['title'] = "Daftar | Ismastore";

        // Validasi input data
        $this->form_validation->set_rules('name','Nama','required');
		$this->form_validation->set_rules('phone','No Hp','required|numeric');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pass','Password','required|min_length[8]');
		$this->form_validation->set_rules('passcon','Konfirmasi Password','required|matches[pass]');
        
        // Proses pengecekan data
        if($this->form_validation->run() == false){
            $this->load->view('auth/daftar.php',$data);
        }else {
            // Input Data
            $input['name'] = $this->input->post('name');
            $input['phone'] = $this->input->post('phone');
            $input['email'] = $this->input->post('email');
            $input['pass'] = $this->input->post('pass');
            $input['passcon'] = $this->input->post('passcon');
            
            $checkEmail = $this->auth_models->checkEmail($input['email']);

            if ($checkEmail === 0) {
                // Send to databse
                $this->auth_models->addMember($input);
                $data['status'] = true;
            } else {
                $data['err'] = true;
            }
            
            // Redirect to daftar page
            $this->load->view('auth/daftar.php',$data);
        }
    }

    // Method daftar
    public function login()
    {
        // Validasi input data
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('pass','Password','required');
        
		// Proses pengecekan data
        if($this->form_validation->run() == false){
            $data['title'] = "Login | Ismastore";
            $this->load->view('auth/login.php',$data);
        }else {
            // Input Data
            $input['email'] = $this->input->post('email');
            $input['pass'] = $this->input->post('pass');

            // Send to databse
            $check = $this->auth_models->login_validator($input);
            
            // Redirect to daftar page
            redirect(base_url());
        }
    }

    public function logout()
    {
        // Remove session
        $this->session->unset_userdata('logged_in');
       
        // Redirect to daftar page
        redirect(base_url('user'));
    }
}