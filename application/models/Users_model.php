<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
						
		public function getAllUsers(){
			$query = $this->db->get('users');
			return $query->result(); 
		}
		
		public function c_count($sess)
		{
			$query = $this->db->query("SELECT COUNT(products.id) as count_id FROM products	WHERE user_id = '$sess'");
			return $query->row();
		}

		function get_all_products() {
		$query = $this->db->get('products');
		return $query->result();
	}

		public function register($user){
			return $this->db->insert('users', $user);
		}
 
		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
		
		
 
	}
?>