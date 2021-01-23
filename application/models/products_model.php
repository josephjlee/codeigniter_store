<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	function get_all() {
		$this->db->select('*'); 
		$this->db->from('users');
		$this->db->join('products', 'products.user_id = users.id');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_single() {
		$this->db->select('*'); 
		$this->db->from('users');
		$this->db->join('products', 'products.user_id = users.id');
		$this->db->where('users.id', $_SESSION['id']);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_product($product_id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('products', 'products.user_id = users.id');
		$this->db->where('products.id', $product_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	
	public function insert_product($data)
	{
		$this->db->insert('products', $data);
		
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;
	}

	public function update_product($product_id, $data)
	{
		$this->db->where('id', $product_id);
		$this->db->update('products', $data);
	}
	
	public function del_product($product_id)
	{
		$this->db->where('id', $product_id);
		$this->db->delete('products');
	}
	
//////////////////////////////////////////////////////////////////////////
 function upload_images($field_name,$folder=NULL){
				$config['upload_path'] = base_url().$folder;	
				$config['allowed_types'] = 'png|jpg|jpeg|pdf|gif';	

				//$config['max_size']	= '100000';	
				//$config['max_width']  = '10240';	
				//$config['max_height']  = '7680';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload($field_name))
				{
							$message = $this->upload->display_errors();	
							return array('type'=>'error','msg'=>$message); 
    }	
				else		
				{			
			$data = array('upload_data' => $this->upload->data());	
			return array('type'=>'ok','file'=>$data['upload_data']['file_name']);	
			}		
		}
////////////////////////////////////////////////////////////////////////////



}