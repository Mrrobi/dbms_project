<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        //$this->load->helper('file');
        $this->load->helper('url');
        // $this->load->library('email');
        //$this->load->helper('url_helper');
	}

	//Home Page Controller
	public function index()
	{
		$data['baseurl'] = $this->config->item('base_url');
		
		$data['cpu'] = $this->User_model->getpro('cpu');
		$data['gpu'] = $this->User_model->getpro('gpu');
		$data['psu'] = $this->User_model->getpro('psu');
		$data['ram'] = $this->User_model->getpro('ram');
		$data['hdd'] = $this->User_model->getpro('hdd');
		$data['ssd'] = $this->User_model->getpro('ssd');
		$data['mboard'] = $this->User_model->getpro('motherboard');
		$data['casing'] = $this->User_model->getpro('casing');
		$data['cart'] = $this->User_model->getCart();
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('home',$data);
	}

	//Login Page Contoller
	public function logSign()
	{
		$data['baseurl'] = $this->config->item('base_url');
		 $data['header'] = $this->load->view('login/header', $data, TRUE);
		// $data['products'] = $this->User_model->getproduct();
		//$data['footer'] = $this->load->view('login/footer', $data, TRUE);
		$this->load->view('login/login',$data);
	}



	//Register Page Controlll

	public function regi()
	{

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 7; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
        echo $randomString;
		$data = array(
			'user_name'=>  $randomString,
			'name'=> $this->input->POST('name'),
			'email'=> $this->input->POST('email'),
			'password'=> $this->input->POST('pass')
		);
		$this->User_model->registration($data);
		redirect(base_url().logSign);
	}

	//Logout and flush session data....
	public function ses_clear(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	//Login Authentication Controller....

	public function auth(){

		$log = array(
			'email' =>$this->input->POST('email'),
			'pass' => $this->input->POST('pass')
		);

		$data = $this->User_model->getData('admin_user');

		foreach ($data as $user) {
			if($user->email === $log['email']){
				if($user->password=== $log['pass']){
					//Session push
					$newdata = array(
						'name'  => $user->user_name,
						'email'     => $user->email,
						'logged_in' => TRUE,
						'role' => $user->role
					);
	 
	 				$this->session->set_userdata($newdata);
					if($user->role == '1'){
						redirect(base_url() . 'ad');
					}else{
						redirect(base_url());
					}
				}
				else{
					echo "error";
				}
			}else{
				echo "error";
			}
		}
	}




	//Product page 

	public function product($str)
	{
		$data['baseurl'] = $this->config->item('base_url');
		
		$data['products'] = $this->User_model->getproduct($str);
		$data['cart'] = $this->User_model->getCart();
		$data['pagename'] = $str;
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('product',$data);
	}


	//Product page single product
	public function product_page($str,$id){
		$data['baseurl'] = $this->config->item('base_url');
		
		$data['products'] = $this->User_model->getproductsingle($str,$id);
		$data['cart'] = $this->User_model->getCart();
		$data['pagename'] = $str;
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('product_page',$data);

	}

	//Product Delete controll
	public function product_delete($url,$id){
		$this->User_model->product_delete($url,$id);
		redirect(base_url() . $this->session->userdata('prev'),'refresh');
	}

	//Add to Cart Controll

	public function adCart($str,$id){

		if($this->session->userdata("logged_in")==true){
			$temp = $this->User_model->getproductsingle($str,$id);
			//$this->session->set_userdata('prev',$_SERVER['HTTP_REFERER']);
			foreach($temp as $p){

				$data = array(
					'user_name' => $this->session->userdata('name'),
					'item_id' => $p->ID,
					'item_name' => $p->name,
					'item_price' => $p->price,
					'type' => $str,
					'isCheck' => '0'
				);

			}
			$temp = $this->User_model->adCart($data);

			if($temp){
				$this->session->set_flashdata('response',"Added To Cart");
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}else{
				$this->session->set_flashdata('response',"Cant Add Cart");
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}
		}else{
			$this->session->set_flashdata('response',"Please Login First");
			redirect($_SERVER['HTTP_REFERER'],'refresh');
		}

	}

	//Cart Delete delete controll
	public function cart_delete($id){
		$this->User_model->cart_delete($id);
		
		redirect($this->session->userdata('prev'));

	}

	//Checkout

	public function checkout(){
		$data['baseurl'] = $this->config->item('base_url');
		$data['cart'] = $this->User_model->getCart();
		//$data['pagename'] = $str;
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('checkout',$data);
	}





	//----------------------------------------------------------------------------------------------------------------

	//Admin Dashboard Controlll

	public function admin(){

		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
		$data['cart'] = $this->User_model->getCart();
		$data['cpu'] = $this->User_model->getcpu();
		$data['gpu'] = $this->User_model->getgpu();
		$data['psu'] = $this->User_model->getpsu();
		$data['ram'] = $this->User_model->getram();
		$data['hdd'] = $this->User_model->gethdd();
		$data['ssd'] = $this->User_model->getssd();
		$data['mboard'] = $this->User_model->getmboard();
		$data['casing'] = $this->User_model->getcasing();
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/body', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }

	}


	public function ad_cpu(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/cpu', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}


	public function cpu_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['gen'] = $this->input->post('gen');
			$data['socket'] = $this->input->post('socket');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/cpu/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'cpu');
			$this->cpu->initialize($config);	
			if ( ! $this->cpu->do_upload('path')) {
				$error = array('error' => $this->cpu->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->cpu->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->cpu_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/cpu",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}

	public function ad_gpu(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/gpu', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}


	public function gpu_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['ddr'] = $this->input->post('ddr');
			$data['pci_slot'] = $this->input->post('pci_slot');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config = array();
			$config['upload_path']   = './uploads/gpu/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'gpu');
			$this->gpu->initialize($config);
			//$this->upload->initialize($config);	
			if ( ! $this->gpu->do_upload('path')) {
				$error = array('error' => $this->gpu->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->gpu->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->gpu_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/gpu",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}



	public function ad_psu(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/psu', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}


	public function psu_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['power'] = $this->input->post('power');
			//$data['socket'] = $this->input->post('socket');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			//$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/psu/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'psu');
			$this->psu->initialize($config);	
			if ( ! $this->psu->do_upload('path')) {
				$error = array('error' => $this->psu->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->psu->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->psu_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/psu",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}



	public function ad_ram(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/ram', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}


	public function ram_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['bus'] = $this->input->post('bus');
			$data['storage'] = $this->input->post('storage');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/ram/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'ram');
			$this->ram->initialize($config);	
			if ( ! $this->ram->do_upload('path')) {
				$error = array('error' => $this->ram->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->ram->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->ram_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/ram",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}




	public function ad_ssd(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/ssd', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}

	public function ssd_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['storage'] = $this->input->post('storage');
			$data['tech'] = $this->input->post('tech');
			$data['size'] = $this->input->post('size');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/ssd/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'ssd');
			$this->ssd->initialize($config);	
			if ( ! $this->ssd->do_upload('path')) {
				$error = array('error' => $this->ssd->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->ssd->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->ssd_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/ssd",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}
	

	public function ad_hdd(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/hdd', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}


	public function hdd_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['storage'] = $this->input->post('storage');
			//$data['socket'] = $this->input->post('socket');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/hdd/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'hdd');
			$this->hdd->initialize($config);	
			if ( ! $this->hdd->do_upload('path')) {
				$error = array('error' => $this->hdd->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->hdd->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->hdd_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/hdd",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}


	public function ad_mboard(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/mboard', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}

	public function mboard_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			$data['bus'] = $this->input->post('bus');
			$data['socket'] = $this->input->post('socket');
			$data['min_bus'] = $this->input->post('min_bus');
			$data['form_factor'] = $this->input->post('form_factor');
			$data['pci_slot'] = $this->input->post('pci_slot');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			//$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/mboard/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'mboard');
			$this->mboard->initialize($config);
			if ( ! $this->mboard->do_upload('path')) {
				$error = array('error' => $this->mboard->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->mboard->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->mboard_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/mboard",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}


	public function ad_casing(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
        
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/casing', $data);
	    } 
	    else {
            redirect(base_url(), 'refresh');
        }
	}

	public function casing_insert(){


		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
			$data['name'] = $this->input->post('name');
			//$data['form_factor'] = $this->input->post('form_factor');
			//$data['socket'] = $this->input->post('socket');
			//$data['min_bus'] = $this->input->post('min_bus');
			$data['form_factor'] = $this->input->post('form_factor');
			//$data['pci_slot'] = $this->input->post('pci_slot');
			$data['brand'] = $this->input->post('brand');
			$data['price'] = $this->input->post('price');
			$data['quantity'] = $this->input->post('quantity');
			//$data['performance'] = $this->input->post('performance');
			$data['details'] = $this->input->post('details');


			$config['upload_path']   = './uploads/casing/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1000; 
			$config['max_width']     = 4096; 
			$config['max_height']    = 4096;  
			$this->load->library('upload',$config, 'casing');
			$this->casing->initialize($config);
			if ( ! $this->casing->do_upload('path')) {
				$error = array('error' => $this->casing->display_errors()); 
				// foreach($error as $e){
				// 	echo $e;
				// }
				//$this->load->view('upload_form', $error); 
			}
				
			else { 
				$upload = array('upload_data' => $this->casing->data());
				 
				//$this->load->view('upload_success', $data); 
			} 

			$data['path'] = $upload['upload_data']['file_name'];
			

			//echo $data;


			//$data['project'] = $this->User_model->getProject($data['session']['username']);
			//$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
			//$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
			
			$test = $this->User_model->casing_in($data);

			if($test){
				$this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect(base_url()."ad/casing",'refresh');
			}

			} 
			else {
				redirect(base_url(), 'refresh');
        }

	}

	// admin panel show all

	public function showall($str)
	{
		$session = $this->session->userdata('logged_in');
	    
	    if($session){
	      
		$data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('apply/header', $data, TRUE);
        $data['footer'] = $this->load->view('apply/footer', $data, TRUE);
		$data['pagename'] = $str;
		$data['products'] = $this->User_model->getdata($str);
		$data['cart'] = $this->User_model->getCart();
		// $data['gpu'] = $this->User_model->getgpu();
		// $data['psu'] = $this->User_model->getpsu();
		// $data['ram'] = $this->User_model->getram();
		// $data['hdd'] = $this->User_model->gethdd();
		// $data['ssd'] = $this->User_model->getssd();
		// $data['mboard'] = $this->User_model->getmboard();
		// $data['casing'] = $this->User_model->getcasing();
        //$data['project'] = $this->User_model->getProject($data['session']['username']);
        //$data['proDetails'] = $this->User_model->getProjectDetails($data['session']['username']);
        //$data['Team'] = $this->User_model->getTeamMembers($data['session']['username']);
        
        $this->load->view('apply/showall', $data);
	    } 
	    else {
            redirect(baseurl(), 'refresh');
        }
	}

}


	
