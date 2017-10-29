<?php

class Register extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("register");

    }

    //============================================
    public  function  insert($gender){
        $data['user_name']=$this->input->post('user_name');
        $data['password']=$this->input->post('password');
        $data['first_name']=$this->input->post('first_name');
        $data['last_name']=$this->input->post('last_name');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['city']=$this->input->post('city');
        $data['country']=$this->input->post('country');
        $data['id_number']=$this->input->post('id_number');
        $data['gender']= $gender;
        $data['program_name']=$this->input->post('program');
        $data['time']=$this->input->post('time');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->insert('register',$data);
    }
    //================================================================
    public function select($type,$approv){
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('gender',$type);
        $this->db->where('approved',$approv);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
     //================================================================
    public function suspend($type,$id){
        $update['approved'] = $type;
        $this->db->where('id', $id);
        if($this->db->update('register',$update)) {
            return true;
        }else{
            return false;
        }
    }
 }