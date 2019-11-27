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
            $this->db->where('user_name',$this->session->userdata('name'));
            $this->db->where('ischeck','0');
            $this->db->update('cart');
        }else if($key=='list'){
            $this->session->set_userdata('build_table','');
            $this->db->set('ischeck','1');
            $this->db->where('user_name',$this->session->userdata('name'));
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
        $ses = $this->session->userdata('tarndata');
        $this->db->set('date',$ses['time']);
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
        $this->db->set('time',$ses['time']);
        
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


    public function createTable(){

        $this->db->set('user_name',$this->session->userdata('name'));
        $this->db->set('id',$this->session->userdata('build_table'));
        $this->db->set('ischeck','0');
        $this->db->insert('build');

    }

    public function updateTable($id,$str){
        $this->db->set($str,$id);
        $this->db->where('user_name',$this->session->userdata('name'));
        $this->db->where('id',$this->session->userdata('build_table'));
        $this->db->where('ischeck','0');
        $this->db->update('build');
    }

    public function getTable(){
        $this->db->select('*');
        $this->db->from('build');
        $this->db->where('user_name',$this->session->userdata('name'));
        $this->db->where('id',$this->session->userdata('build_table'));
        $this->db->where('ischeck','0');
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
}
?>