<?php 

class auth_models extends CI_Model {
    
    function checkEmail($email)
    {
        $query = $this->db->get_where('users',array('email' => $email));
        if ($query->num_rows() === 0) {
            return 0;
        } else {
            return 1;
        }
    }

    // add new member
    function addMember($input) 
    {
        $query = array( 
        'id'	=>  NULL,
        'nama'	=>  $input['name'] , 
        'phone'=>  $input['phone'], 
        'email'	=>  $input['email'],
        'password'	=> password_hash($input['pass'], PASSWORD_DEFAULT),
        'role_id' => 2,
        'created_at'	=>  NULL
        );
        $this->db->insert('users', $query);
    }

    // Login System
    function login_validator($input)
    {   
        $query = $this->db->get_where('users',array('email' => $input['email']));
        if ($query->num_rows() == 0) {
            echo "<script>
                    alert('Email tidak terdaftar!');
                    document.location.href='".base_url('home/login')."';
                </script>";
            exit;
        } else {
            $pass = $query->result_array()[0]['password'];
            if(password_verify($input['pass'],$pass))
            {
                $newdata = array(
                        'id_user' => $query->result_array()[0]['id'],
                        'logged_in' => TRUE,
                        'role' => $query->result_array()[0]['role_id']
                );
                $this->session->set_userdata($newdata);
            } else {
                echo "<script>
                         alert('Password Salah !');
                         document.location.href='".base_url('home/login')."';
                      </script>";
                exit;
            }
        }
    }
}