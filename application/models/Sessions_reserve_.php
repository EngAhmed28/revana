<?php

class Sessions_reserve extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public  function record_count(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->where('session_reserve_confirm',1);
        return $this->db->count_all_results();

    }

    public  function  insert()
    {

        $data['sessions_id_fk']=$this->input->post('sessions_id_fk');
        $data['sessions_reserve_name']=$this->input->post('sessions_reserve_name');
        $data['sessions_reserve_email']=$this->input->post('sessions_reserve_email');
        $data['sessions_reserve_phone']=$this->input->post('sessions_reserve_phone');
        $data['sessions_reserve_address']=$this->input->post('sessions_reserve_address');
        $data['sessions_reserve_work']=$this->input->post('sessions_reserve_work');
        $data['sessions_reserve_work_at']=$this->input->post('sessions_reserve_work_at');
        $data['sessions_reserve_notes']=$this->input->post('sessions_reserve_notes');
        $data['nationality']=$this->input->post('nationality');
        $data['number']=$this->input->post('number');
        $data['gender']=$this->input->post('gender');

        $data['session_reserve_confirm']=1;

        $this->db->insert('sessions_reserve',$data);

   

    }


/////////////web//////////////////
    public  function  inserted()
    {

        $data['sessions_id_fk']=$this->input->post('sessions_id_fk');
        $data['sessions_reserve_name']=$this->input->post('sessions_reserve_name');
        $data['sessions_reserve_email']=$this->input->post('sessions_reserve_email');
        $data['sessions_reserve_phone']=$this->input->post('sessions_reserve_phone');
        $data['sessions_reserve_address']=$this->input->post('sessions_reserve_address');
        $data['sessions_reserve_work']=$this->input->post('sessions_reserve_work');
        $data['sessions_reserve_work_at']=$this->input->post('sessions_reserve_work_at');
        $data['sessions_reserve_notes']=$this->input->post('sessions_reserve_notes');
        $data['nationality']=$this->input->post('nationality');
        $data['number']=$this->input->post('number');
        $data['gender']=$this->input->post('gender');

        $data['session_reserve_confirm']=0;

        $this->db->insert('sessions_reserve',$data);

    }
///////////selecting data//////////////////

public function report(){

    $this->db->select('*');
    $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

    $this->db->where('sessions_reserve_id_pk !="NULL"');

    $q = $this->db->get('sessions_reserve');

    return $q->result();

}


public function selected(){

    $this->db->select('*');
    $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

    $this->db->where('session_reserve_confirm','1');

    $q = $this->db->get('sessions_reserve');

    return $q->result();

}



    public function select(){
        $this->db->select('*');

        $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','right');

        $this->db->join('sessions_reserve','sessions_reserve.sessions_reserve_id_pk=course_confirm.student_id','left');

        $this->db->where('confirm','1');

        $q = $this->db->get('course_confirm');

        /*$this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

        $this->db->where('session_reserve_confirm','1');

        $q = $this->db->get('sessions_reserve');*/

        return $q->result();
    }

    /////////////////
    /////delete/////

    public function delete_reserve($id){
        $this->db->where('sessions_reserve_id_pk',$id);
        $this->db->delete('sessions_reserve');
        }
    ////////////////////
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('sessions_reserve', array('sessions_reserve_id_pk'=>$id));
        return $h->row_array();
    }

    public function search($id){
        $h = $this->db->get_where('sessions_reserve', array('number'=>$id));
        return $h->row_array();
    }


    public function update($id){

        //$h = $this->db->get_where('sessions_reserve', array('sessions_reserve_id_pk'=>$id));
        //$query = $h->row_array();  'sessions_id_fk'=>$this->input->post('sessions_id_fk'),

        $data = array(


            'sessions_reserve_name'=>$this->input->post('sessions_reserve_name'),
            'sessions_reserve_email'=>$this->input->post('sessions_reserve_email'),
            'sessions_reserve_phone'=>$this->input->post('sessions_reserve_phone'),
            'sessions_reserve_address'=>$this->input->post('sessions_reserve_address'),
            'sessions_reserve_work'=>$this->input->post('sessions_reserve_work'),
            'sessions_reserve_work_at'=>$this->input->post('sessions_reserve_work_at'),
            'sessions_reserve_notes'=>$this->input->post('sessions_reserve_notes'),
            'nationality'=>$this->input->post('nationality'),
            'number'=>$this->input->post('number'),
            'gender'=>$this->input->post('gender')

        );
        /*
        $rr = array(
                'student_id' => $id,
                'course_id' => $this->input->post('sessions_id_fk'),
                'confirm' => 1,
                'date' => strtotime(date("Y/m/d")),
                'date_s' => time()
                );
        $array = array('student_id'=>$id,'course_id'=>$query['sessions_id_fk'],'confirm'=>1);

        $this->db->where($array);

        $this->db->update('course_confirm',$rr);*/



        $this->db->where('sessions_reserve_id_pk', $id);

        if($this->db->update('sessions_reserve',$data)) {
            return true;
        }else{
            return false;
        }
           }

    public  function getallrequest(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','left');
        $this->db->where('session_reserve_confirm','0');
        $this->db->order_by('sessions_id_pk','DESC');
        $query = $this->db->get();
        return $query->result();

    }
    public  function confirm($id){
        $sessions_reserve['session_reserve_confirm']=1;
        $this->db->where('sessions_reserve_id_pk', $id);
        $this->db->update('sessions_reserve',$sessions_reserve);
        $sessions['reserve_confirm']=1;
        $this->db->where('sessions_id_pk', $id);
        $this->db->update('sessions',$sessions);

    }

    public function sessions_report(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');
        $query = $this->db->get();
        return $query->result();
    }

    public function R_reservers(){
            $this->db->select('sessions_reserve.gender,sessions_reserve.sessions_reserve_name,sessions_reserve.sessions_reserve_id_pk');

            $query = $this->db->get('sessions_reserve');

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;

                    $this->db->select('sessions.sessions_name');
                    $this->db->join('sessions','sessions.sessions_id_pk=start_end_course.course_id','left');
                    $this->db->where(array("student_id"=>$row->sessions_reserve_id_pk));
                    $query2 = $this->db->get('start_end_course');
                    if ($query2->num_rows() > 0) {
                        foreach ($query2->result() as $row2) {
                            $data2[$row->sessions_reserve_id_pk][] = $row2;
                        }
                    }
                }
            }

        return array($data, $data2);
    }
    //====================================== 25-5-2017  =================================================
    public function slect_resevation($statem,$grouby){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        foreach($statem as $key=>$value){
            $this->db->where($key,$statem[$key]);
        }
        $this->db->group_by($grouby);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//---------------------------------------------------------
    public function all_sessions(){
        $this->db->select('*');
        $this->db->from('sessions');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->sessions_id_pk] = $row;
            }
            return $data;
        }
        return false;

    }
//------------------------------------------------------
    public function update_reservation($type,$id){

        $sessions['session_reserve_confirm']=$type;
        $this->db->where('sessions_reserve_id_pk',$id);
        $this->db->update('sessions_reserve',$sessions);

    }
//---------------------------------------------------
    public  function  insert_web()
    {

        $data['sessions_reserve_name']=$this->input->post('sessions_reserve_name');
        $data['number']=$this->input->post('number');
        $data['place_of_number']=$this->input->post('place_of_number');
        $data['sessions_reserve_phone']=$this->input->post('sessions_reserve_phone');
        $data['sessions_reserve_qualification']=$this->input->post('sessions_reserve_qualification');
        $data['sessions_reserve_barth_place']=$this->input->post('sessions_reserve_barth_place');
        $data['sessions_id_fk']=$this->input->post('sessions_id_fk');
        $data['session_reserve_confirm']=0;
        $this->db->insert('sessions_reserve',$data);
    }


}
