<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Main_model extends CI_Model {

  public function __construct() {
    parent::__construct(); 
  }

  // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('users');

    if($search != ''){
      $this->db->like('fname', $search);
      $this->db->or_like('email', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }
		
		public function getData2($rowno,$rowperpage,$search="") {
 
    //$this->db->select('*');
    //$this->db->from('products');
				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->join('products', 'products.user_id = users.id');		

    if($search != ''){
      $this->db->like('name', $search);
      $this->db->or_like('price', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

		public function getData3($rowno,$rowperpage,$search="") {
 				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->join('products', 'products.user_id = users.id');		
				$this->db->where('users.id', $_SESSION['id']);


    if($search != ''){
      $this->db->like('name', $search);
      $this->db->or_like('price', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('users');
 
    if($search != ''){
      $this->db->like('fname', $search);
      $this->db->or_like('email', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
		
		public function getrecordCount2($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('products');
 
    if($search != ''){
      $this->db->like('name', $search);
      $this->db->or_like('price', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
		

}