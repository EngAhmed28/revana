<?php

class Room extends CI_Controller
{
       public $CI = NULL;
           public function __construct()
    {
       parent::__construct();
        $this->load->helper(array('url','text','permission','form','cookie'));
        $this->load->library('pagination');
        $this->load->model('Advertising');
        $this->left = $this->Advertising->select_adver_left();
        $this->load->model('Home_web');
        $this->customers = $this->Home_web->select_customers();
        $this->footer = $this->Home_web->select_footer();
                $this->load->model('Course');
        $this->all_courses_drop = $this->Course->get_all_courses();
              $this->load->model('Us');
        $this->about_us= $this->Us->select('', 1);

    }
           public function index(){
        /*$this->load->model('Contact');
        if($this->input->post('send')){
            $this->Contact->insert();
            $this->message('success','تم ارسال ');
            redirect('contact_web','refresh');
        }*/

        $data['subview'] = 'web/room';
        $this->load->view('index1', $data);
    }
    
}
?>