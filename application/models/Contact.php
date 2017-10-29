<?php
class Contact extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("contact");
    }
    public  function  insert(){
        $data['first_name']=$this->input->post('first_name');
        $data['second_name']=$this->input->post('second_name');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['active'] = 0;
        $this->db->insert('contact',$data);
    }
    public  function  insert_get(){
        $data['first_name']=$this->input->post('first_name');
        $data['second_name']=$this->input->post('second_name');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['active'] = 0;
        $data['type']=1;
        $this->db->insert('contact',$data);
    }
    public function select($limit,$start){
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('contact');
    }
    /////////////////////////
    public  function getallinbox(){
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("active",0);
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getmessagebyid($id){
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("id",$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function readmessagebyid($id){
        $data['active']=1;
        $this->db->where("id",$id);
        if($this->db->update("contact",$data)){
            return true;
        }else{
            return false;
        }
    }
}