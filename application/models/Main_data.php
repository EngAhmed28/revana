<?php

class Main_data extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("main_company_data");

    }

    public  function  insert($file){
        $data['comp_name'] = $this->input->post('comp_name');
        $data['comp_logo'] = $file;
        $data['comp_address'] = $this->input->post('comp_address');
        $data['comp_facebook'] = $this->input->post('comp_facebook');
        $data['comp_twitter'] = $this->input->post('comp_twitter');
        $data['comp_instagram'] = $this->input->post('comp_instagram');
        $data['comp_youtube'] = $this->input->post('comp_youtube');

        for ($p = 1 ; $p <= $_POST['tele_info'] ; $p++)
        {
            $phone[]=$_POST['phone'.$p];
        }

        for ($e = 1 ; $e <= $_POST['email_info'] ; $e++)
        {
            $email[]=$_POST['email'.$e];
        }
        $data['tele_info']  = serialize($phone);
        $data['email_info'] = serialize($email);
        
        $this->db->insert('main_company_data',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('main_company_data');
       // $this->db->where('type',$type);
        $this->db->order_by('id','DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('main_company_data', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){


        for ($p = 0 ; $p < $_POST['count_phone'] ; $p++)
            $phone[] = $_POST['phone_old'.$p.''];

        for ($e = 0 ; $e < $_POST['count_mail'] ; $e++)
            $email[] = $_POST['email_old'.$e.''];

        if($_POST['tele_info'] != ''){
            for($p = 1 ; $p <= $_POST['tele_info'] ; $p++)
                $phone[] = $_POST['phone'.$p];
        }

        if($_POST['email_info'] != ''){
            for( $x = 0 ; $x < $_POST['email_info'] ; $x++)
                $email[] = $_POST['email'.$x];
        }

        $I['tele_info'] = serialize($phone);
        $I['email_info'] = serialize($email);
        
        $update = array(
            'comp_name'             => $this->input->post('comp_name') ,
            'comp_address'          => $this->input->post('comp_address') ,
            'comp_facebook'         => $this->input->post('comp_facebook') ,
            'comp_twitter'          => $this->input->post('comp_twitter') ,
            'comp_instagram'          => $this->input->post('comp_instagram') ,
            'comp_youtube'          => $this->input->post('comp_youtube') ,
            'tele_info'        => $I['tele_info'],
            'email_info'       => $I['email_info'],

        );
        if($file != ''){
            $update['comp_logo']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('main_company_data',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete($from,$id,$index){
        $h = $this->db->get_where('main_company_data', array('id'=>$id));
        $row = $h->row_array();
        
        $unserial = unserialize($row[$from]);
        unset($unserial[$index]); 
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update[''.$from.'']=$unserial;
        if($this->db->update('main_company_data',$update)) {
            return true;
        }
    }
 public function select_last(){
        $this->db->select('*');
        $this->db->from('main_company_data');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }  
 }// end 
 