<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

	public function index()
	{
		$this->load->view('login/v_login');
    }
    
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_user = $this->login_model->auth_user($username,$password);
 
        if($cek_user->num_rows() > 0){ 
            
            $data = $cek_user->row_array();
            $access = $data['user_type'];

            if($access == 'admin'){

                $this->session->set_userdata([
                    'masuk' => TRUE,
                    'username' => $username,
                    'access' => "admin"
                ]);
                
                redirect('admin');

            }else if($access == 'user'){

                $this->session->set_userdata([
                    'masuk' => TRUE,
                    'username' => $username,
                    'access' => "user"
                ]);
                
                redirect('user');

            }else{
                $this->session->set_flashdata('msg','Username atau Password Salah!');
                redirect('login');

            }
 
        }else{
            $this->session->set_flashdata('msg','Username atau Password Salah!');
            redirect('login');
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
