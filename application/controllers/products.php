<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model');
	}

	public function index()
	{	
		$this->data['title'] = 'Products';

		$this->data['products'] = $this->Products_model->get_all();
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view('products', $this->data);
	}
	
	/*public function get_product($id)
	{	
		$link = $_SERVER['PHP_SELF'];
		$link_array = explode('/',$link);
		$product_id = end($link_array);

		$this->data['product'] = $this->Products_model->get_product($product_id);
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view('product_detail', $this->data);
	}*/
	
}