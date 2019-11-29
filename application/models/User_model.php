<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }



    public function paid($key){
        if($key=="check"){
            $this->db->set('ischeck','1');
            $this->db->where('user_name',$this->session->userdata('user'));
            $this->db->where('ischeck','0');
            $this->db->update('cart');
        }else if($key=='list'){
            $this->session->set_userdata('build_table','');
            $this->db->set('ischeck','1');
            $this->db->where('user_name',$this->session->userdata('user'));
            $this->db->where('id',$this->session->userdata('build_table'));
            $this->db->where('ischeck','0');
            $this->db->update('build');
        }
    }
    
    public function registration($data){

        $this->db->set('user_name',$data['user_name']);
        $this->db->set('name',$data['name']);
        $this->db->set('email',$data['email']);
        $this->db->set('password',$data['password']);

        $this->db->insert('admin_user');

    }

    public function getData($str)
    {
        $this->db->select('*');
        $this->db->from($str);
        $query = $this->db->get();
        return $query->result();
    }     
    public function getpro($str){
        $this->db->select('*');
        $this->db->from($str);
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    public function cart_delete($id){
        $this->db->where('ID',$id);
        $this->db->delete('cart');
    }

    public function product_delete($url,$id){
        $this->db->where('ID',$id);
        $this->db->delete($url);
    }

    public function delete($str){

        $this->db->set($str,'');
        $this->db->where('user_name',$_SESSION['user']);
        $this->db->where('id',$_SESSION['build_table']);
        $this->db->update('build');

        

    }

    public function adCart($data){

        // $this->db->select('*');
        // $this->db->from($url);
        // $this->db->where('ID',$id);
        // $temp = $this->db->get();
        // $t = $this->User_model->getproductsingle($url,$id);
        
        return $this->db->insert('cart',$data);
    }


    public function getCart(){

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('user_name',$this->session->userdata('user'));
        $this->db->where('ischeck','0');
        $query = $this->db->get();

        return $query->result();

    }


    public function checkadd($total){

        $this->db->set('user_name',$this->session->userdata('user'));
        $this->db->set('total_balance',$total);
        $this->db->set('ispaid','1');
        $ses = $this->session->userdata('tarndata');
        $this->db->set('date',$ses['time']);
        $this->db->insert('checkout');
    }

    public function getCheckId(){

        $this->db->select('*');
        $this->db->from('checkout');
        $this->db->where('user_name',$this->session->userdata('user'));
        $this->db->order_by('date','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistory(){
        $this->db->select('*');
        $this->db->from('history');
        $this->db->where('User_name',$this->session->userdata('user'));
        $query = $this->db->get();
        return $query->result();
    }

    public function addHistory($id){
        $this->db->set('Checkout_id',$id);
        $this->db->set('User_name',$this->session->userdata('user'));
        $ses = $this->session->userdata('tarndata');
        $this->db->set('total_balance',$ses['amount']);
        $this->db->set('time',$ses['time']);
        
        $this->db->insert('history');
    }

    public function getproduct($str){
        

        switch($str){
            case 'cpu':
                
                if($this->session->flashdata('edit')){
                    $this->db->select('*');
                    $this->db->where('user_name',$_SESSION['user']);
                    $this->db->where('id',$_SESSION['build_table']);
                    $this->db->from('build');
                    $q1 = $this->db->get();
                    $t1 = $q1->result();

                    if($t1[0]->motherboard!=null){
                        $this->db->select('m.socket as m_s');
                        $this->db->where('b.user_name',$_SESSION['user']);
                        $this->db->where('b.id',$_SESSION['build_table']);
                        $this->db->from('build as b');
                        $this->db->join('motherboard as m' , 'm.id=b.motherboard');
                        $q2 = $this->db->get();
                        $t2 = $q2->result();
                        $this->db->select('*');
                        $this->db->where('socket',$t2[0]->m_s);
                    }
                }
            break;
            case 'motherboard':
                if($this->session->flashdata('edit')){
                    $this->db->select('*');
                    $this->db->where('user_name',$_SESSION['user']);
                    $this->db->where('id',$_SESSION['build_table']);
                    $this->db->from('build');
                    $q1 = $this->db->get();
                    $t1 = $q1->result();

                    if($t1[0]->cpu!=null){
                        $this->db->select('c.socket as c_s');
                        $this->db->where('b.user_name',$_SESSION['user']);
                        $this->db->where('b.id',$_SESSION['build_table']);
                        $this->db->from('build as b');
                        $this->db->join('cpu as c' , 'c.id=b.cpu');
                        $q2 = $this->db->get();
                        $t2 = $q2->result();
                        $this->db->select('*');
                        $this->db->where('socket',$t2[0]->c_s);
                    }
                }
            break;
            case 'ram':
                if($this->session->flashdata('edit')){
                    $this->db->select('*');
                    $this->db->where('user_name',$_SESSION['user']);
                    $this->db->where('id',$_SESSION['build_table']);
                    $this->db->from('build');
                    $q1 = $this->db->get();
                    $t1 = $q1->result();

                    if($t1[0]->motherboard!=null){
                        $this->db->select('m.bus as max');
                        $this->db->select('m.min_bus as min');
                        $this->db->where('b.user_name',$_SESSION['user']);
                        $this->db->where('b.id',$_SESSION['build_table']);
                        $this->db->from('build as b');
                        $this->db->join('motherboard as m' , 'm.id=b.motherboard');
                        $q2 = $this->db->get();
                        $t2 = $q2->result();
                        $this->db->select('*');
                        echo $t2[0]->max . " " . $t2[0]->min;
                        $this->db->where('bus<=',$t2[0]->max);
                        $this->db->where('bus>=',$t2[0]->min);
                    }
                }
            break;
            case 'gpu':
                if(isset($_SESSION['pci_slot'])){
                    $this->db->where('pci_slot',$_SESSION['pci_slot']);
                }
            break;
        }

        $this->db->from($str);
        $query = $this->db->get();
        return $query->result();
    }

    public function getproductsingle($str,$id){
        $this->db->select('*');
        $this->db->from($str);
        $this->db->where('ID',$id);
        $query = $this->db->get();
        return $query->result();
    }


    public function createTable(){

        $this->db->set('user_name',$this->session->userdata('user'));
        $this->db->set('id',$this->session->userdata('build_table'));
        $this->db->set('ischeck','0');
        $this->db->insert('build');

    }

    public function updateTable($id,$str){
        $this->db->set($str,$id);
        $this->db->where('user_name',$this->session->userdata('user'));
        $this->db->where('id',$this->session->userdata('build_table'));
        $this->db->where('ischeck','0');
        $this->db->update('build');
    }

    public function getTable(){
        $this->db->select('*');
        $this->db->from('build');
        $this->db->where('user_name',$this->session->userdata('user'));
        $this->db->where('id',$this->session->userdata('build_table'));
        $this->db->where('ischeck','0');
        $query = $this->db->get();
        return $query->result();
    }

    public function getReviews($id,$type){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->where('type',$type);
        $this->db->from('review');
        $q = $this->db->get();
        return $q->result();
    }

    public function addReview($id,$type,$body,$rating){
        $data = array(
            'id' => $id,
            'type' => $type,
            'user_name' => $this->session->userdata('name'),
            'body' => $body,
            'rating' => $rating
        );

        $this->db->insert('review',$data);
    }













    public function getgpu()
    {
        $this->db->select('*');
        $this->db->from('gpu');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getcpu()
    {
        $this->db->select('*');
        $this->db->from('cpu');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getpsu()
    {
        $this->db->select('*');
        $this->db->from('psu');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getram()
    {
        $this->db->select('*');
        $this->db->from('ram');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getssd()
    {
        $this->db->select('*');
        $this->db->from('ssd');
        $query = $this->db->get();
        return $query->result();
    }
    public function gethdd()
    {
        $this->db->select('*');
        $this->db->from('hdd');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getmboard()
    {
        $this->db->select('*');
        $this->db->from('motherboard');
        $query = $this->db->get();
        return $query->result();
    } 
    public function getcasing()
    {
        $this->db->select('*');
        $this->db->from('casing');
        $query = $this->db->get();
        return $query->result();
    } 


    public function cpu_in($data){
        $t = $this->db->insert('cpu',$data);
        //echo $t;
        return $t;
    }
    public function cpu_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('cpu',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function gpu_in($data){
        $t = $this->db->insert('gpu',$data);
        //echo $t;
        return $t;
    }
    public function gpu_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('gpu',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function psu_in($data){
        $t = $this->db->insert('psu',$data);
        //echo $t;
        return $t;
    }
    public function psu_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('psu',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function ram_in($data){
        $t = $this->db->insert('ram',$data);
        //echo $t;
        return $t;
    }
    public function ram_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('ram',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function hdd_in($data){
        $t = $this->db->insert('hdd',$data);
        //echo $t;
        return $t;
    }
    public function hdd_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('hdd',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function ssd_in($data){
        $t = $this->db->insert('ssd',$data);
        //echo $t;
        return $t;
    }
    public function ssd_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('ssd',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function mboard_in($data){
        $t = $this->db->insert('motherboard',$data);
        //echo $t;
        return $t;
    }
    public function mboard_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('motherboard',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }
    public function casing_in($data){
        $t = $this->db->insert('casing',$data);
        //echo $t;
        return $t;
    }
    public function casing_update($data){
        $id = $this->session->userdata('p_id');
        $this->db->where('id',$id);
        $t = $this->db->update('casing',$data);
        if(isset($_SESSION['p_id'])){
            unset($_SESSION['p_id']);
        }
        //echo $t;
        return $t;
    }



    //insert into user table
	function insert_record($data)
    {
		return $this->db->insert('admin_user', $data);
    }
    
    public function get_hash_value($email){
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->from('admin_user');
        $q = $this->db->get();
        return $q->result();
    }
    
    function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $email);
        $this->db->update('admin_user', $data);
    }
    
	//send verification email to user's email id
	function sendEmail($to_email)
	{
		$from_email = 'robi@mrrobi.tech';
		$subject = 'Verify Your Email Address';
		$message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://mrrobi.tech/welcome/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
		
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.mrrobi.tech'; //smtp host name
		$config['smtp_port'] = '465'; //smtp port number
		$config['smtp_user'] = $from_email;
		$config['smtp_pass'] = 'joya171023&love'; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);
		
		//send mail
		$this->email->from($from_email, 'Beta PC');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}
	
	//activate user account
	function verifyEmailID($key)
	{
		$data = array('status' => 1);
		$this->db->where('md5(email)', $key);
		return $this->db->update('admin_user', $data);
    }
    


}
?>