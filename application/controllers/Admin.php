<?php

class Admin extends CI_Controller{

  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('access') !== 'admin'){
        $this->session->set_flashdata('msg','Hanya Admin yang Memiliki Akses!');
        redirect('login');
    }else{
        $this->load->model(['book_model','user_model','transaction_model']);
    }
  }

  function get_ajax() {
    $list = $this->book_model->get_datatables();
    $data = array();
    $no = @$_POST['start'];
    foreach ($list as $item) {
        $no++;
        $row = array();
        $row[] = $item->book_id;
        $row[] = $item->book_title;
        $row[] = $item->author;
        $row[] = $item->publisher;
        $row[] = $item->book_category;
        $row[] = $item->price;
        $row[] = '<a href="'.site_url('admin/book_edit/'.$item->book_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i> Update</a>
               <a href="'.site_url('admin/book_delete/'.$item->book_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
        $data[] = $row;
    }
    $output = array(
                "draw" => @$_POST['draw'],
                "recordsTotal" => $this->book_model->count_all(),
                "recordsFiltered" => $this->book_model->count_filtered(),
                "data" => $data,
            );
    // output to json format
    echo json_encode($output);
}

  //PAGE HOME

  function index(){
    $this->load->view('admin/v_header');
    $this->load->view('admin/v_admin_home');
    $this->load->view('admin/v_footer');
  }

  //BOOK

  function book(){

    $keyword=htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);

    if(isset($keyword)){
      $book = $this->book_model->all_with_search($keyword);
      $data['book'] = $book;
      $data['keyword'] = $keyword;

      $this->load->view('admin/v_header');
      $this->load->view('admin/v_admin_book',$data);
      $this->load->view('admin/v_footer');
    }else{
      $book = $this->book_model->all();
      $data['book'] = $book;
      $data['keyword'] = '';

      $this->load->view('admin/v_header');
      $this->load->view('admin/v_admin_book',$data);
      $this->load->view('admin/v_footer');

    }


    
  }

  function book_insert(){
    $book_id = htmlspecialchars($this->input->post('book_id',TRUE),ENT_QUOTES);
    $book_title = htmlspecialchars($this->input->post('book_title',TRUE),ENT_QUOTES);
    $author = htmlspecialchars($this->input->post('author',TRUE),ENT_QUOTES);
    $publisher = htmlspecialchars($this->input->post('publisher',TRUE),ENT_QUOTES);
    $book_category = htmlspecialchars($this->input->post('book_category',TRUE),ENT_QUOTES);
    $price = htmlspecialchars($this->input->post('price',TRUE),ENT_QUOTES);
    
    $data = array(
      'book_id' => $book_id,
      'book_title' => $book_title,
      'author' => $author,
      'publisher' => $publisher,
      'book_category' => $book_category,
      'price' => $price,
    );

    $this->book_model->insert($data);
    $this->session->set_flashdata('msg','Data Inserted!');
    redirect ('admin/book');
  }

  function book_delete($id){
    $where = array('book_id' => $id);
    $this->book_model->delete_data($where,'book');
    redirect('admin/book');
  }

  function book_edit($id){
    $where = array('book_id' => $id);
    $data['book'] = $this->book_model->edit_data($where,'book')->result();

    $this->load->view('admin/v_header');
    $this->load->view('admin/v_edit_book',$data);
    $this->load->view('admin/v_footer');
  }

  function book_update(){
  
      $book_id = htmlspecialchars($this->input->post('book_id',TRUE),ENT_QUOTES);
      $book_title = htmlspecialchars($this->input->post('book_title',TRUE),ENT_QUOTES);
      $author = htmlspecialchars($this->input->post('author',TRUE),ENT_QUOTES);
      $publisher = htmlspecialchars($this->input->post('publisher',TRUE),ENT_QUOTES);
      $book_category = htmlspecialchars($this->input->post('book_category',TRUE),ENT_QUOTES);
      $price = htmlspecialchars($this->input->post('price',TRUE),ENT_QUOTES);
  
      $where['book_id'] = $book_id;
      
      $data = array(
          'book_id' => $book_id,
          'book_title' => $book_title,
          'author' => $author,
          'publisher' => $publisher,
          'book_category' => $book_category,
          'price' => $price
      );
  
      $this->book_model->update_data($where,$data,'book');
      redirect('admin/book');
  
  }

  //USER
  function user(){

    $keyword=htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);

    if(isset($keyword)){
      $user = $this->user_model->all_with_search($keyword);
      $data['user'] = $user;
      $data['keyword'] = $keyword;

      $this->load->view('admin/v_header');
      $this->load->view('admin/v_admin_user',$data);
      $this->load->view('admin/v_footer');
    }else{
      $user = $this->user_model->all();
      $data['user'] = $user;
      $data['keyword'] = '';

      $this->load->view('admin/v_header');
      $this->load->view('admin/v_admin_user',$data);
      $this->load->view('admin/v_footer');

    }


    
  }

  function user_insert(){
    $user_id = htmlspecialchars($this->input->post('user_id',TRUE),ENT_QUOTES);
    $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
    $password = md5($this->input->post('password'));
    $user_type = htmlspecialchars($this->input->post('user_type',TRUE),ENT_QUOTES);
    
    $data = array(
      'user_id' => $user_id,
      'username' => $username,
      'password' => $password,
      'user_type' => $user_type
    );

    $this->user_model->insert($data);
    $this->session->set_flashdata('msg','Data Inserted!');
    redirect ('admin/user');
  }

  function user_delete($id){
    $where = array('user_id' => $id);
    $this->user_model->delete_data($where,'user');
    redirect('admin/user');
  }

  function user_edit($id){
    $where = array('user_id' => $id);
    $data['user'] = $this->user_model->edit_data($where,'user')->result();

    $this->load->view('admin/v_header');
    $this->load->view('admin/v_edit_user',$data);
    $this->load->view('admin/v_footer');
  }

  function user_update(){
  
      $user_id = htmlspecialchars($this->input->post('user_id',TRUE),ENT_QUOTES);
      $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
  
      $where['user_id'] = $user_id;
      
      $data = array(
          'user_id' => $user_id,
          'username' => $username
      );
  
      $this->user_model->update_data($where,$data,'user');
      redirect('admin/user');
  
  }

    //transaction
    function transaction(){

        $keyword=htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);
    
        if(isset($keyword)){
          $transaction = $this->transaction_model->all_with_search($keyword);
          $data['transaction'] = $transaction;
          $data['keyword'] = $keyword;

          $data['book'] = $this->book_model->all();
    
          $this->load->view('admin/v_header');
          $this->load->view('admin/v_admin_transaction',$data);
          $this->load->view('admin/v_footer');
        }else{
          $transaction = $this->transaction_model->all();
          $data['transaction'] = $transaction;
          $data['keyword'] = '';

          $data['book'] = $this->book_model->all();
    
          $this->load->view('admin/v_header');
          $this->load->view('admin/v_admin_transaction',$data);
          $this->load->view('admin/v_footer');
    
        }
    
    
        
    }
    
      function transaction_insert(){
        $transaction_id = htmlspecialchars($this->input->post('transaction_id',TRUE),ENT_QUOTES);
        $date = htmlspecialchars($this->input->post('date',TRUE),ENT_QUOTES);
        $book_id = htmlspecialchars($this->input->post('book_id',TRUE),ENT_QUOTES);
        $quantity = htmlspecialchars($this->input->post('quantity',TRUE),ENT_QUOTES);
        $price = htmlspecialchars($this->input->post('price',TRUE),ENT_QUOTES);
        
        $total_price = $quantity*$price;
        
        $data = array(
          'transaction_id' => $transaction_id,
          'date' => $date,
          'book_id' => $book_id,
          'quantity' => $quantity,
          'price' => $price,
          'total_price' => $total_price
        );
    
        $this->transaction_model->insert($data);
        $this->session->set_flashdata('msg','Data Inserted!');
        redirect ('admin/transaction');
      }
    
      function transaction_delete($id){
        $where = array('transaction_id' => $id);
        $this->transaction_model->delete_data($where,'sale');
        redirect('admin/transaction');
      }
    
      function transaction_edit($id){
        $where = array('transaction_id' => $id);
        $data['transaction'] = $this->transaction_model->edit_data($where,'sale')->result();
        
        $data['book'] = $this->book_model->all();


        $this->load->view('admin/v_header');
        $this->load->view('admin/v_edit_transaction',$data);
        $this->load->view('admin/v_footer');
      }
    
      function transaction_update(){

        $transaction_id = htmlspecialchars($this->input->post('transaction_id',TRUE),ENT_QUOTES);
        $date = htmlspecialchars($this->input->post('date',TRUE),ENT_QUOTES);
        $book_id = htmlspecialchars($this->input->post('book_id',TRUE),ENT_QUOTES);
        $quantity = htmlspecialchars($this->input->post('quantity',TRUE),ENT_QUOTES);
        $price = htmlspecialchars($this->input->post('price',TRUE),ENT_QUOTES);
        
        $total_price = $quantity*$price;
        
        $data = array(
          'transaction_id' => $transaction_id,
          'date' => $date,
          'book_id' => $book_id,
          'quantity' => $quantity,
          'price' => $price,
          'total_price' => $total_price
        );
      
          
      
          $where['transaction_id'] = $transaction_id;
      
          $this->transaction_model->update_data($where,$data,'sale');
          redirect('admin/transaction');
      
      }

  
}

?>