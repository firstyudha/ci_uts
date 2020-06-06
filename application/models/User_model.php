<?php
class User_model extends CI_Model{
	function __construct(){
		parent:: __construct();
	}
	
	function insert($data){
		$this->db->insert('user',$data);
    }
    
    function all(){
        $query = $this->db->query("SELECT * FROM user")->result();
        return $query;
    }

    function all_with_search($keyword){
        $query = $this->db->query("SELECT * FROM user
                                    WHERE username LIKE '%".$keyword."%'
                                    OR user_id LIKE '%".$keyword."%'
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