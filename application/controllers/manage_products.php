<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Products_model');
		$this->load->library('form_validation');
		$this->load->model('users_model');
		$this->load->library('session');
		
		// Load Pagination library//////////////////////////
		$this->load->library('pagination');
		// Load model
		$this->load->model('Main_model');
		/////////////////////////////////////////////////////

	}

	public function index($rowno=0)
	{
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			
		$user = $this->session->userdata('user');
		extract($user);
		$_SESSION['id'] = $id;
		$_SESSION['auth'] = $auth;
		
		////pagination//////////////////////////////////////////////////////////
    // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search"=>$search_text));
    }else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }
    // Row per page
    $rowperpage = 15;
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    // All records count
    $allcount = $this->Main_model->getrecordCount2($search_text);
    // Get records
				if($_SESSION['auth']==1)
				{ 
    $users_record = $this->Main_model->getData2($rowno,$rowperpage,$search_text);
				}else{
    $users_record = $this->Main_model->getData3($rowno,$rowperpage,$search_text);
				}
    // Pagination Configuration
    $config['base_url'] = base_url().'index.php/manage';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    // Initialize
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;
			///pagination////////////////////////////////////////////////////////////////////////
			
			
		if($_SESSION['auth']==1)
		{ 
		  $this->data['products'] = $this->Products_model->get_all(); 
		}else{
			 $this->data['products'] = $this->Products_model->get_single();
		}
		
		$data['title'] = 'Product Management';
		$data['message'] = $this->session->flashdata('message');
		
			$this->load->view('header');
			$this->load->view('manage_products', $data); 
			$this->load->view('footer');
		}
		else{
			$this->load->view('register_form');
		}
		
	}
	
	public function product_detail($id)
	{	
		$link = $_SERVER['PHP_SELF'];
		$link_array = explode('/',$link);
		$product_id = end($link_array);

		$this->data['product'] = $this->Products_model->get_product($product_id);
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view('product_detail', $this->data);
}
	
	function add_product() {
		$this->load->helper('url', 'form');
		 $config['upload_path'] = 'images/products/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;

			$this->load->library('upload', $config);
			$this->load->helper(array('form', 'url'));
			
		$user = $this->session->userdata('user');
		extract($user);
		$_SESSION['id'] = $id;
						
		$this->data['title'] = 'Add Product';

		//validate form input
		$this->form_validation->set_rules('name', 'Product name', 'required|xss_clean');
		$this->form_validation->set_rules('color', 'Color', 'required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'required|xss_clean');

		if ($this->form_validation->run() == true)
		{		
			$data = array(
				'name'				=> $this->input->post('name'),
				'color'		=> $this->input->post('color'),
				'status'		=> $this->input->post('status'),
				'price' 			=> $this->input->post('price'),
				'picture'  			=> $this->input->post('picture'),
				'user_id'  			=> $_SESSION['id']
			);
			
			//////////upload////////////////////
			$insertid = $this->Products_model->insert_product($data);
			if($insertid){
			    mkdir(base_url().'images/products/'.$insertid);
    			if (!empty($_FILES)) {
    			   $response = $this->Products_model->upload_images('profile_img','images/products/'.$insertid.'/');
										if($response['type']!='error'){
												$data = array('picture'=>$response['file']);												
												$this->Products_model->update_product($insertid, $data);
												$this->session->set_flashdata('message', "<p>Product added successfully.</p>");
												redirect(base_url().'index.php/manage');
											}	
    			} 
    			redirect(base_url().'index.php/product/add/');
			}
		
			////////////////////////////////////////////////////////////////////////////////////
		
		}else{
			//display the add product form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

			$this->data['name'] = array(
				'name'  	=> 'name',
				'id'    	=> 'name',
				'type'  	=> 'text',
				'class'		=> 'form-control',
				'value' 	=> $this->form_validation->set_value('name'),
			);			
			$this->data['status'] = array(
				'name'  	=> 'status',
				'id'    	=> 'status',
				'type'  	=> 'text',
				'class'		=> 'form-control',
				'value' 	=> $this->form_validation->set_value('status'),
			);	
			$this->data['color'] = array(
				'name'  	=> 'color',
				'id'    	=> 'color',
				'type'  	=> 'text',
				'class'		=> 'form-control',
				'value' 	=> $this->form_validation->set_value('color'),
			);	
			$this->data['price'] = array(
				'name'  	=> 'price',
				'id'    	=> 'price',
				'type'  	=> 'text',
				'class'		=> 'form-control',
				'value' 	=> $this->form_validation->set_value('price'),
			);
						
			$this->load->view('header');
			$this->load->view('add_product', $this->data);
			$this->load->view('footer');
		}
	}

	function edit_product($product_id) {
		
		$this->load->helper('url', 'form');
		 $config['upload_path'] = 'images/products/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;

			$this->load->library('upload', $config);
			$this->load->helper(array('form', 'url'));
			
		$product = $this->Products_model->get_product($product_id);

		$this->data['title'] = 'Edit Product';
	
		//validate form input
		$this->form_validation->set_rules('name', 'Product name', 'required|xss_clean');
		$this->form_validation->set_rules('color', 'Color', 'required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'required|xss_clean');
	
		if (isset($_POST) && !empty($_POST))
		{		
			$data = array(
				'name'					=> $this->input->post('name'),
				'status'			=> $this->input->post('status'),
				'color'			=> $this->input->post('color'),
				'price' 				=> $this->input->post('price'),
			);

			if ($this->form_validation->run() === true)
			{
				
				if (!empty($_FILES)) {
    			   $response = $this->Products_model->upload_images('profile_img','images/products/'.$insertid.'/');
										if($response['type']!='error'){
												$data = array('picture'=>$response['file']);												
												$this->Products_model->update_product($product_id, $data);
												$this->session->set_flashdata('message', "<p>Product updated successfully.</p>");
												redirect(base_url().'index.php/manage');
											}	
    			} 
				
				redirect(base_url().'index.php/product/edit/'.$product_id);
			}			
		}

		$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
		
		$this->data['product'] = $product;
		
		//display the edit product form
		$this->data['name'] = array(
			'name'  	=> 'name',
			'id'    	=> 'name',
			'type'  	=> 'text',
				'class'		=> 'form-control',
			'value' 	=> $this->form_validation->set_value('name', $product['name']),
		);
		
		$this->data['status'] = array(
			'name'  	=> 'status',
			'id'    	=> 'status',
			'type'  	=> 'text',
				'class'		=> 'form-control',
			'value' 	=> $this->form_validation->set_value('status', $product['status']),
		);
		
		$this->data['color'] = array(
			'name'  	=> 'color',
			'id'    	=> 'color',
			'type'  	=> 'text',
				'class'		=> 'form-control',
			'value' 	=> $this->form_validation->set_value('color', $product['color']),
		);
		
		$this->data['price'] = array(
			'name'  	=> 'price',
			'id'    	=> 'price',
			'type'  	=> 'text',
				'class'		=> 'form-control',
			'value' 	=> $this->form_validation->set_value('price', $product['price']),
		);
	
		$this->data['picture'] =  $product['picture'];

		$this->load->view('header');
		$this->load->view('edit_product', $this->data);
		$this->load->view('footer');
	}	
	
	function delete_product($product_id) {
		$this->Products_model->del_product($product_id);
		
		$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');
		
		redirect('manage');
	}
	
	
	
}