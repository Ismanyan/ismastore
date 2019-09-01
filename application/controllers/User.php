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

    // Direct chat wa
    public function chat($barang)
    {   
        redirect('https://wa.me/6289630080545?text=Hai%20'.$barang.'%20ini%20ready%20gk%20');
    }

    // Manage page 
    public function manage()
    {
        // Data for this page
        $data['title'] = "Manage | Ismastore";
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
        $data['barang'] = $this->user_models->getBarang();
        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('manage/index.php',$data);
        $this->load->view('layouts/footer.php');
    }

    // delete barang method 
    public function delete($id)
    {
        $this->user_models->deleteBarang($id);
        redirect(base_url('user/manage'));
    }

    // View my Profile
    public function profile()
    {
        // Data for this page
        $data['title'] = "Profile | Ismastore";
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
        
        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('user/profile.php',$data);
        $this->load->view('layouts/footer.php');
    }

    // Add wishlist
    public function addwishlist($barang,$id)
    {   
        $this->user_models->addwishlist($barang,$id);
        echo "<script>
                alert('Wishlist berhasil di tambahkan');
                document.location.href='".base_url('views/produk/'.$id)."';
            </script>";
    }

    // Wishlist page
    public function wishlist()
    {
        // Data for this page
        $data['title'] = "Wishlist | Ismastore";
        $data['wishlist'] = $this->user_models->getWishlist($this->session->userdata('id_user'));
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
    
        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('user/wishlist.php',$data);
        $this->load->view('layouts/footer.php');
    }

    // Delete wishlist
    public function deletewishlist($id)
    {
        $this->user_models->deletewishlist($id);
        redirect(base_url('user/wishlist'));
    }

    // Page cart
    public function cart()
    {
        // Data for this page
        $data['title'] = "Wishlist | Ismastore";
        $data['user_info'] = $this->user_models->getUserInfo($this->session->userdata('id_user'));
        $data['cart'] = $this->user_models->getCart($this->session->userdata('id_user'));
        
        // Load Views
        $this->load->view('layouts/header.php',$data);
        $this->load->view('user/cart.php',$data);
        $this->load->view('layouts/footer.php');
    }

    public function addcart($barang,$id)
    {
        $this->user_models->addcart($barang,$id);
        echo "<script>
                alert('Berhasil di tambahkan ke keranjang');
                document.location.href='".base_url('views/produk/'.$id)."';
            </script>";
    }
}