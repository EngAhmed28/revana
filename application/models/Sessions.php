<?php

class Sessions extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public  function record_count(){
        return $this->db->count_all("sessions");

    }
    
    public  function  insert($file)
    {

        $data['course_id_fk']=$this->input->post('course_id_fk');
        $data['sessions_name']=$this->input->post('sessions_name');
        $data['sessions_cost']=$this->input->post('sessions_cost');
        $data['sessions_time']=$this->input->post('sessions_time');
        $data['sessions_word']=$this->input->post('sessions_word');
        $data['sessions_details']=$this->input->post('sessions_details');
        $data['sessions_goals']=$this->input->post('sessions_goals');
        $data['sessions_img']=$file;
        $data['sessions_for']=$this->input->post('sessions_for');
        $data['reserve_confirm']=0;



        $this->db->insert('sessions',$data);

    }
///////////selecting data//////////////////
public function select_coutses(){}




//-----------------------------------------
    public function select(){
        $this->db->select('*');
         
           
        $this->db->join('course','course.course_id_pk=sessions.course_id_fk','left');
         

        $q = $this->db->get('sessions');

        return $q->result();
    }
    
    public function select_where($course_id){
        $this->db->select('*');
        
        $this->db->where('course_id_fk',$course_id);
        $this->db->order_by('sessions_id_pk','DESC');

        $q = $this->db->get('sessions');

        return $q->result();
    }

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('sessions_id_pk',$id);
        $this->db->delete('sessions');

    }
    ////////////////////
///////update/////////
    public function getById($id){
        $this->db->select('*');

        $this->db->join('course','course.course_id_pk=sessions.course_id_fk','right');

        $h = $this->db->get_where('sessions', array('sessions_id_pk'=>$id));
        return $h->row_array();
    }


    public function update($id,$file){
        $data = array(

            'course_id_fk'=>$this->input->post('course_id_fk'),
            'sessions_name'=>$this->input->post('sessions_name'),
            'sessions_cost'=>$this->input->post('sessions_cost'),
            'sessions_time'=>$this->input->post('sessions_time'),
            'sessions_word'=>$this->input->post('sessions_word'),
            'sessions_details'=>$this->input->post('sessions_details'),
            'sessions_goals'=>$this->input->post('sessions_goals'),
            'sessions_for'=>$this->input->post('sessions_for'),
        );


        if($file != ''){
            $data['sessions_img']=$file ;
        }

        $this->db->where('sessions_id_pk', $id);

        if($this->db->update('sessions',$data)) {
            return true;
        }else{
            return false;
        }


    }
}