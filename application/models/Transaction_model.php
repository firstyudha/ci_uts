<?php
class Transaction_model extends CI_Model{
	function __construct(){
		parent:: __construct();
	}
	
	function insert($data){
		$this->db->insert('sale',$data);
    }
    
    function all(){
        $query = $this->db->query("SELECT * FROM sale")->result();
        return $query;
    }

    function all_with_search($keyword){
        $query = $this->db->query("SELECT * FROM sale
                                    WHERE transaction_id LIKE '%".$keyword."%'
                                    OR book_id LIKE '%".$keyword."%'
                                ")->result();
        return $query;
    }

    function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}
?>