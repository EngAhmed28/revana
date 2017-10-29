<?php

class Offers_reg extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("register");

    }
    //==================================================================
    //===========================================offer_reserve==============================
    public  function  insert_offer_web($num)
    {$data['offers_id_fk']=$num;


        $data['offers_reserve_name']=$this->input->post('offers_reserve_name');
        $data['number']=$this->input->post('number');
        $data['place_of_number']=$this->input->post('place_of_number');
        $data['offers_reserve_phone']=$this->input->post('offers_reserve_phone');
        $data['offers_reserve_qualification']=$this->input->post('offers_reserve_qualification');
        $data['offers_reserve_barth_place']=$this->input->post('offers_reserve_barth_place');
        $this->db->insert('offers_reserve',$data);
    }



    public  function  insert_course_web($num)
    {
        $data['courses_id_fk']=$num;
        $data['courses_reserve_name']=$this->input->post('courses_reserve_name');
        $data['number']=$this->input->post('number');
        $data['place_of_number']=$this->input->post('place_of_number');
        $data['courses_reserve_phone']=$this->input->post('courses_reserve_phone');
        $data['courses_reserve_qualification']=$this->input->post('courses_reserve_qualification');
        $data['courses_reserve_barth_place']=$this->input->post('courses_reserve_barth_place');
        $this->db->insert('courses_reserve',$data);
    }





    //================================================================
    public function select($approv){
        $this->db->select('*');
        $this->db->from('offers_reserve');
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


    //=========================================================
    public function select_($approv){
        $this->db->select('*');
        $this->db->from('courses_reserve');
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
        if($this->db->update('offers_reserve',$update)) {
            return true;
        }else{
            return false;
        }
    }

    //=======================================================
    public function suspend_($type,$id){
        $update['approved'] = $type;
        $this->db->where('id', $id);
        if($this->db->update('courses_reserve',$update)) {
            return true;
        }else{
            return false;
        }
    }

 }