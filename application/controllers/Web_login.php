<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_login extends CI_Controller
{
/*public function  __construct(){
    parent::__construct(); Web_login
}*/
 function  index(){
     if($this->session->has_userdata('is_loggedin')==1){
             redirect('web');
     }
    
    $this->load->view('web/home');
 }
 //------------------------------------------------------
    public  function check_login(){
        $this->load->model('Users');
        $userdata=$this->Users->check_regester_data();
        if($userdata !=''){
            $userdata['is_loggedin']=true;
            $this->session->set_userdata($userdata);
              redirect('Web');
        }else{
           $_SESSION['message']= '<script>alert("خطأ فى ادخال البيانات");</script>';
            redirect('Web');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('Web','refresh');
    }

}