<?php

class User extends CI_Controller{

  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('access') !== 'user'){
        $this->session->set_flashdata('msg','Hanya Admin yang Memiliki Akses!');
        redirect('login');
    }else{
        $this->load->model(['book_model']);
    }
  }

  function index(){
    $this->load->view('user/v_header');
    $this->load->view('user/v_user_home');
    $this->load->view('user/v_footer');
  }

  function book(){

    $keyword=htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);

    if(isset($keyword)){
      $book = $this->book_model->all_with_search($keyword);
      $data['book'] = $book;
      $data['keyword'] = $keyword;

      $this->load->view('user/v_header');
      $this->load->view('user/v_user_book',$data);
      $this->load->view('user/v_footer');
    }else{
      $book = $this->book_model->all();
      $data['book'] = $book;
      $data['keyword'] = '';

      $this->load->view('user/v_header');
      $this->load->view('user/v_user_book',$data);
      $this->load->view('user/v_footer');

    }


    
  }

}