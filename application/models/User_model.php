<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }



    public function paid(){
        $this->db->set('ischeck','1');
        $this->db->where('user_name',$this->session->userdata('name'));
        $this->db->where('ischeck','0');
        $this->db->update('cart');
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
        $this->db->where('user_name',$this->session->userdata('name'));
        $this->db->where('ischeck','0');
        $query = $this->db->get();

        return $query->result();

    }


    public function checkadd($total){

        $this->db->set('user_name',$this->session->userdata('name'));
        $this->db->set('total_balance',$total);
        $this->db->set('ispaid','1');
        date_default_timezone_set("America/New_York");
        $this->db->set('date',date("Y-m-d h:i:sa"));
        $this->db->insert('checkout');
    }

    public function getCheckId(){

        $this->db->select('*');
        $this->db->from('checkout');
        $this->db->where('user_name',$this->session->userdata('name'));
        $this->db->order_by('date','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistory(){
        $this->db->select('*');
        $this->db->from('history');
        $this->db->where('User_name',$this->session->userdata('name'));
        $query = $this->db->get();
        return $query->result();
    }

    public function addHistory($id){
        $this->db->set('Checkout_id',$id);
        $this->db->set('User_name',$this->session->userdata('name'));
        $ses = $this->session->userdata('tarndata');
        $this->db->set('total_balance',$ses['amount']);
        date_default_timezone_set("America/New_York");
        $this->db->set('time',date("Y-m-d h:i:sa"));
        
        $this->db->insert('history');
    }

    public function getproduct($str){
        $this->db->select('*');
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
    public function gpu_in($data){
        $t = $this->db->insert('gpu',$data);
        //echo $t;
        return $t;
    }
    public function psu_in($data){
        $t = $this->db->insert('psu',$data);
        //echo $t;
        return $t;
    }
    public function ram_in($data){
        $t = $this->db->insert('ram',$data);
        //echo $t;
        return $t;
    }
    public function hdd_in($data){
        $t = $this->db->insert('hdd',$data);
        //echo $t;
        return $t;
    }
    public function ssd_in($data){
        $t = $this->db->insert('ssd',$data);
        //echo $t;
        return $t;
    }
    public function mboard_in($data){
        $t = $this->db->insert('motherboard',$data);
        //echo $t;
        return $t;
    }
    public function casing_in($data){
        $t = $this->db->insert('casing',$data);
        //echo $t;
        return $t;
    }
}
?>