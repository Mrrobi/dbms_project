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
        $this->load->library('session','sslcommerz');
        $this->load->model('User_model');
        //$this->load->helper('file');
        $this->load->helper('url','sslc');
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
        //echo $randomString;
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
						'role' => $user->role,
						'build_table' => ''
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


	public function product_edit($url,$id){
		$this->session->set_userdata('p_id',$id);
		switch($url){
			case 'cpu':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_cpu','refresh');
			break;
			case 'gpu':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_gpu','refresh');
			break;
			case 'psu':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_psu','refresh');
			break;
			case 'ram':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_ram','refresh');
			break;
			case 'ssd':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_ssd','refresh');
			break;
			case 'hdd':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_hdd','refresh');
			break;
			case 'casing':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_casing','refresh');
			break;
			case 'motherboard':
				$this->session->set_userdata('edit',true);
				redirect(base_url().'welcome/ad_mboard','refresh');
			break;
		}
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

	//checkout Adding data

	public function checkadd($total,$key){

		
		$this->User_model->checkadd($total);
		$this->User_model->paid($key);
		$check_id = $this->User_model->getCheckId();
		$id;
		foreach($check_id as $i) $id = $i->Checkout_id;
		$this->User_model->addHistory($id);

		redirect(base_url()."history","refresh");

	}

	//CheckOut pay absolute ---******
	public function checkPay($price){
		$data['baseurl'] = $this->config->item('base_url');
		$data['price'] = $price;
		$this->load->view('pay',$data);
	}


	//History page for user


	public function history(){
		//$this->User_model->paid();
		$data['baseurl'] = $this->config->item('base_url');
		$data['cart'] = $this->User_model->getCart();
		$data['pagename'] = "User History";
		$data['header'] = $this->load->view('user/header', $data, TRUE);
		$data['footer'] = $this->load->view('user/footer', $data, TRUE);
		$data['histories'] = $this->User_model->getHistory();
		$this->load->view('user/history',$data);

	}



	//Pc builder page

	public function pcbuilder(){

		if($this->session->userdata('build_table')!=''){
			$data['baseurl'] = $this->config->item('base_url');
			$data['cart'] = $this->User_model->getCart();
			$data['pagename'] = "Build PC";
			$data['header'] = $this->load->view('pc_builder/header', $data, TRUE);
			$data['footer'] = $this->load->view('pc_builder/footer', $data, TRUE);

			$data['build'] = $this->User_model->getTable();
			$temp = $this->User_model->getTable();

			foreach($temp as $t){

				$data['cpu'] = $this->User_model->getproductsingle('cpu',$t->cpu);
				$data['gpu'] = $this->User_model->getproductsingle('gpu',$t->gpu);
				$data['ram'] = $this->User_model->getproductsingle('ram',$t->ram);
				$data['psu'] = $this->User_model->getproductsingle('psu',$t->psu);
				$data['ssd'] = $this->User_model->getproductsingle('ssd',$t->ssd);
				$data['hdd'] = $this->User_model->getproductsingle('hdd',$t->hdd);
				$data['motherboard'] = $this->User_model->getproductsingle('motherboard',$t->motherboard);
				$data['casing'] = $this->User_model->getproductsingle('casing',$t->casing);

			}

			$this->load->view('pc_builder/builder',$data);
		}else{
			redirect(base_url()."pc_build","refresh");
		}

	}


	//Pc Builder intiating***---****
	public function pc_built(){
		$session = $this->session->userdata('logged_in');
	    
	    if($session)
			{
				If($this->session->userdata('build_table')==''){
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = 'Table_';
				for ($i = 0; $i < 7; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				$this->session->set_userdata('build_table',$randomString);
				$this->User_model->createTable();
				redirect(base_url()."pcbuilder","refresh");
				}else{
					redirect(base_url()."pcbuilder","refresh");
				}
				
			}else{
			$this->session->set_userdata('build_table','');
			redirect(base_url()."logSign","refresh");
		    }
	}

	public function updateTable($id,$str){
		
		$this->User_model->updateTable($id,$str);
		redirect(base_url()."pcbuilder","refresh");

	}

	public function select($str){
		$data['baseurl'] = $this->config->item('base_url');
		$this->session->set_flashdata('edit',true);
		$data['products'] = $this->User_model->getproduct($str);
		$data['cart'] = $this->User_model->getCart();
		$data['pagename'] = $str;
		$data['header'] = $this->load->view('pc_builder/header', $data, TRUE);
		$data['footer'] = $this->load->view('pc_builder/footer', $data, TRUE);
		$this->load->view('pc_builder/select',$data);
	}

	public function delete($str){

		$this->User_model->delete($str);

		redirect(base_url()."pcbuilder","refresh");

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
		if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
	    
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->cpu_update($data);
			}else{
				$test = $this->User_model->cpu_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->gpu_update($data);
			}else{
				$test = $this->User_model->gpu_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->psu_update($data);
			}else{
				$test = $this->User_model->psu_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->ram_update($data);
			}else{
				$test = $this->User_model->ram_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->ssd_update($data);
			}else{
				$test = $this->User_model->ssd_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->hdd_update($data);
			}else{
				$test = $this->User_model->hdd_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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


			$config['upload_path']   = './uploads/motherboard/'; 
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->mboard_update($data);
			}else{
				$test = $this->User_model->mboard_in($data);
			}

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
	    if(!$this->session->userdata('edit')){
			if(isset($_SESSION['p_id'])){
				unset($_SESSION['p_id']);
			}
		}
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
			
			if($this->session->userdata('p_id')){
				if(isset($_SESSION['edit'])){
					unset($_SESSION['edit']);
				}
				$test = $this->User_model->casing_update($data);
			}else{
				$test = $this->User_model->casing_in($data);
			}

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

	//---------------------------------------SSL COMmerz-------------------------------------------------//

	public function requestssl($amount,$key)
	{
		// if($this->input->get_post('submit'))
		// {
			// $full_name = $this->input->post('fname');
			// $email = $this->input->post('email');
			// $phone = $this->input->post('phone');
			// $amount = $this->input->post('amount');
			// $country = $this->input->post('country');
			// $address = $this->input->post('address');
			// $street = $this->input->post('street');
			// $state = $this->input->post('state');
			// $city = $this->input->post('city');
			// $postcode =	$this->input->post('postcode');

			$post_data = array();
			$post_data['store_id'] = SSLCZ_STORE_ID;
			$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
			$post_data['total_amount'] = $amount;
			$post_data['currency'] = "BDT";
			$post_data['tran_id'] = uniqid()."_sslc";
			$post_data['success_url'] = base_url()."validate/".$key;
			$post_data['fail_url'] = base_url()."fail";
			$post_data['cancel_url'] = base_url()."cancel";
			# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

			# EMI INFO
			# $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
			# $post_data['emi_max_inst_option'] = "9";
			# $post_data['emi_selected_inst'] = "9";

			# CUSTOMER INFORMATION
			$post_data['cus_name'] = $this->session->userdata('name');
			$post_data['cus_email'] = $this->session->userdata('email');
			$post_data['cus_add1'] = "xyz";
			$post_data['cus_add2'] = "";
			$post_data['cus_city'] = "";
			$post_data['cus_state'] = "";
			$post_data['cus_postcode'] = "1000";
			$post_data['cus_country'] = "";
			$post_data['cus_phone'] = "";
			$post_data['cus_fax'] = "";

			# SHIPMENT INFORMATION
			$post_data['ship_name'] = "Store Test";
			$post_data['ship_add1 '] = "Dhaka";
			$post_data['ship_add2'] = "Dhaka";
			$post_data['ship_city'] = "Dhaka";
			$post_data['ship_state'] = "Dhaka";
			$post_data['ship_postcode'] = "1000";
			$post_data['ship_country'] = "Bangladesh";

			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "ref001";
			$post_data['value_b '] = "ref002";
			$post_data['value_c'] = "ref003";
			$post_data['value_d'] = "ref004";

			# CART PARAMETERS
			$post_data['cart'] = json_encode(array(
			    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
			    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
			    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
			    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")    
			));
			$post_data['product_amount'] = "100";
			$post_data['vat'] = "5";
			$post_data['discount_amount'] = "5";
			$post_data['convenience_fee'] = "3";

			$this->load->library('session');

			$session = array(
				'tran_id' => $post_data['tran_id'],
				'amount' => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set_userdata('tarndata', $session);


			// $this->load->library('sslcommerz');
			//echo "<pre>";
			//print_r($post_data);
			if($this->sslcommerz->RequestToSSLC($post_data, false))
			{
				//echo "Pending";
				/***************************************
				# Change your database status to Pending.
				****************************************/
			}
		// }
	}

	public function validateresponse($key)
	{
		// $this->load->library('sslcommerz');
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		$sesdata = $this->session->userdata('tarndata');

		if(($sesdata['tran_id'] == $_POST['tran_id']) && ($sesdata['amount'] == $_POST['amount']) && ($sesdata['currency'] == $_POST['currency']))
		{
			if($this->sslcommerz->ValidateResponse($_POST['amount'], $_POST['currency'], $_POST))
			{
				if($database_order_status == 'Pending')
				{
					/*****************************************************************************
					# Change your database status to Processing & You can redirect to success page from here
					******************************************************************************/
					//echo "Transaction Successful<br>";
					//echo "Processing";
					//echo "<pre>";
					//print_r($_POST);exit;

					$session = array(
						'tran_id' => $_POST['tran_id'],
						'amount' => $_POST['amount'],
						'currency' => $_POST['currency'],
						'time' => $_POST['tran_date']
					);
					$this->session->set_userdata('tarndata', $session);
					redirect(base_url()."checkadd/".$_POST['amount']."/".$key,"refresh");
				}
				else
				{
					/******************************************************************
					# Just redirect to your success page status already changed by IPN.
					******************************************************************/
					redirect(base_url()."checkadd/".$_POST['amount']."/".$key,"refresh");
					//echo "Just redirect to your success page";
				}
			}
		}
	}
	public function fail()
	{
		$database_order_status = 'FAILED'; // Check this from your database here Pending is dummy data,
		if($database_order_status == 'FAILED')
		{
			/*****************************************************************************
			# Change your database status to FAILED & You can redirect to failed page from here
			******************************************************************************/
			echo "<pre>";
			print_r($_POST);
			echo "Transaction Faild";
		}
		else
		{
			/******************************************************************
			# Just redirect to your success page status already changed by IPN.
			******************************************************************/
			echo "Just redirect to your failed page";
		}	
	}
	public function cancel()
	{
		$database_order_status = 'CANCELLED'; // Check this from your database here Pending is dummy data,
		if($database_order_status == 'CANCELLED')
		{
			/*****************************************************************************
			# Change your database status to CANCELLED & You can redirect to cancelled page from here
			******************************************************************************/
			echo "<pre>";
			print_r($_POST);
			echo "Transaction Canceled";
		}
		else
		{
			/******************************************************************
			# Just redirect to your cancelled page status already changed by IPN.
			******************************************************************/
			echo "Just redirect to your failed page";
		}
	}

	public function ipn()
	{
		// $this->load->library('sslcommerz');
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		$store_passwd = SSLCZ_STORE_PASSWD;
		if($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST))
		{
			if(($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'Processing'.
					******************************************************************************/
				}
			}
			elseif($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
					******************************************************************************/
				}
			}
			elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS') 
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'CANCELLED'.
					******************************************************************************/
				}
			}
			else
			{
				if($database_order_status == 'Pending')
				{
					echo "Order status not ".$ipn['gateway_return']['status'];
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
					******************************************************************************/
				}
			}
			echo "<pre>";
			print_r($ipn);
		}
	}
	//---------------------------------------ssl commerz--------------------------------------------------//
}


	
