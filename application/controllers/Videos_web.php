<?php
class Videos_web extends CI_Controller
{

    public $header ;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','text','permission','form','cookie'));
        $this->load->library('pagination');
        $this->load->model('Course');
        $this->all_courses_drop = $this->Course->get_all_courses();

        //----------------------------//
        $this->load->model('Home_web');
        $this->customers = $this->Home_web->select_customers();
        $this->footer = $this->Home_web->select_footer();
        $this->load->model('Course');
        $this->all_courses_drop = $this->Course->get_all_courses();
        $this->load->model('Us');
        $this->about_us= $this->Us->select('', 1);
        //----------------------------//

    }
    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    ////////////////////end of excel library option

        public function index(){
            $data['title'] ='موقع كورسات بلاحدود';
            $data['subview'] = '';
            $this->load->view('web/videos', $data);

    }


    public function all_videos($id){
        $this->load->model('Videos');
        $this->load->model('Sessions');
        $data['get_courses'] = $this->Sessions->select_where($id);
        $data['get_videos'] = $this->Videos->get_videos();
        $this->load->view('web/videos', $data);

    }








}

