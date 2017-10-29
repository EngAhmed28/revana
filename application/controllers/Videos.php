<?php
class Videos extends CI_Controller
{

    public $header ;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','text','permission','form','cookie'));
        $this->load->library('pagination');

        $this->load->model('Course');
        $this->all_courses_drop = $this->Course->get_all_courses();


   


    }
    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

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
    private function thumb($data)

    {

        $config['image_library'] = 'gd2';

        $config['source_image'] =$data['full_path'];

        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];

        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker']='';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

    }
    private  function upload_image($file_name){

        $config['upload_path'] = 'uploads/images';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';

        $config['max_size']    = '1024*8';

        $config['encrypt_name']=true;

        $this->load->library('upload',$config);

        if(! $this->upload->do_upload($file_name)){

            return  false;

        }else{

            $datafile = $this->upload->data();

            $this->thumb($datafile);

            return  $datafile['file_name'];



        }


    }
    //////////////////////////////////
    private  function upload_file($file_name){

        $config['upload_path'] = 'uploads/files';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size']    = '1024*8';

        $config['overwrite'] = true;
        $this->load->library('upload',$config);

        if(! $this->upload->do_upload($file_name)){

            return  false;

        }else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

     private function pagnate($method,$recordcount,$per_page,$segment){
        $config = array();
        $config["base_url"] = base_url() . "Web/".$method;
        $config["total_rows"] = $recordcount;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $segment;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination" >';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<li class="disabled"><a href="#">«</a></li>';
        $config['last_link'] = '<li><a href="#">»</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $config;
    }

    ////////////////////end of excel library option

        public function index(){

            $data['title'] ='موقع كورسات بلاحدود';
            $data['subview'] = '';
            $this->load->view('web/videos', $data);

    }








}

