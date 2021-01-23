<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {	
	
	function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		// load form and url helpers
		$this->load->helper(array('form', 'url'));
		// load form_validation library
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// Load Pagination library//////////////////////////
    $this->load->library('pagination');
    // Load model
    $this->load->model('Main_model');
				/////////////////////////////////////////////////////
	}	
	
	public function index(){										
		//$this->load->library('session');
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			$this->load->view('header');
			redirect('user/home', $data);
			$this->load->view('footer');
		}
		else{
			$this->load->view('register_form');
		}
		
	}
	 


	public function register(){
        $output = array('error' => false);
 
		/* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
 
        if ($this->form_validation->run() == FALSE) { 
        	$output['error'] = true;
            $output['message'] = validation_errors();
        } 
        else { 
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['password'];
            $user['fname'] = $_POST['fname'];
 
            $query = $this->users_model->register($user);
 
            if($query){
            	$output['message'] = 'User registered successfully';
            }
            else{
             $output['error'] = true;
            	$output['message'] = 'User registered successfully';
            }
        }
 
        echo json_encode($output);
	}
	
	
 
	public function login(){
		//load session library
		//$this->load->library('session');
 
		$output = array('error' => false);
 
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		$data = $this->users_model->login($email, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			$output['message'] = 'Logging in. Please wait...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User not found';
		}
 
		echo json_encode($output); 
	}
 
		 
	public function home($rowno=0){
			
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
    $rowperpage = 10;
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    // All records count
    $allcount = $this->Main_model->getrecordCount($search_text);
    // Get records
    $users_record = $this->Main_model->getData($rowno,$rowperpage,$search_text);
    // Pagination Configuration
    $config['base_url'] = base_url().'index.php/user/home';
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
		
		//load session library
		//$this->load->library('session');
		
		$users = $this->users_model->getAllUsers();
		$data['total_users'] = count($users);
		
		$products = $this->users_model->get_all_products();
		$data['total_products'] = count($products);
													
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			
		   	$this->load->view('header');
						$this->load->view('home',$data);
			   $this->load->view('footer');

		}
		else{
			redirect('/');
		}
 
	}
 
	public function logout(){
		//load session library
		//$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}
 
	
	

		
		
}