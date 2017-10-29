<?php

class Contact_web extends CI_Controller
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
    public  function intPart($float)
    {
        if ($float < -0.0000001)
            return ceil($float - 0.0000001);
        else
            return floor($float + 0.0000001);
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    //--------------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }

    ////////////////////end of excel library option
    public function index(){
        $this->load->model('Contact');
        if($this->input->post('send')){
            $this->Contact->insert();
            $this->message('success','تم ارسال ');
            redirect('contact_web','refresh');
        }

        $data['subview'] = 'web/contact';
        $this->load->view('index1', $data);
    }
}