<?php
class Offers extends CI_Controller
{

    public $header ;

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
    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

   
   
    
    ////////////////////end of excel library option

        public function index(){
  $this->load->model('Offer');
            $data['all_offers']=$this->Offer->select();  
            $data['metakeyword'] = 'عروض موقع بلا حدود ';
            $data['metadiscription'] = 'عروض موقع بلا حدود';
            $data['title'] ='عروض موقع بلا حدود';
            $data['subview'] = 'web/offers';
            $this->load->view('index1', $data);

    }
  //_-----------------------------------------------  
public function offer_details($id){
      $this->load->model('Offer');
            $data['one_offer']=$this->Offer->getById($id);  
            $data['metakeyword'] = 'تفاصيل عروض موقع بلا حدود ';
            $data['metadiscription'] = 'تفاصيل عروض موقع بلا حدود ';
            $data['title'] ='تفاصيل عروض موقع بلا حدود ';
            $data['subview'] = 'web/offer_details';
            $this->load->view('index1', $data);
    
}







}

