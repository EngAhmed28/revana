<?php

class Course_confirm extends CI_Model
 {
    public function __construct()
    {
        parent::__construct();
    }
    
    public  function  courses()
    {   
        $this->db->select('*');
    
        $q = $this->db->get('sessions');
    
        return $q->result();
    }
    
    
    public  function  insert($student_id)
    {   
        $rr['student_id'] = $student_id;
        $rr['course_id'] = $this->input->post('sessions_id_fk');
        $rr['confirm'] = 1;
        $rr['date'] = strtotime(date("Y/m/d"));
        $rr['date_s'] = time();
        $this->db->insert('course_confirm',$rr);

    }

    public function select_all(){

    $this->db->select('*');
    
    $this->db->join('sessions_reserve','course_confirm.student_id=sessions_reserve.sessions_reserve_id_pk','right');
    
    $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','left');

    $this->db->where('confirm','1');

    $q = $this->db->get('course_confirm');

    return $q->result();

    }
    
    public function select_count(){

    $this->db->select('course_confirm.course_id,COUNT(*),sessions.sessions_name');
    
    $this->db->group_by(array("course_id"));
    
    $this->db->join('sessions_reserve','course_confirm.student_id=sessions_reserve.sessions_reserve_id_pk','right');
    
    $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','left');

    $this->db->where('confirm','1');
    
    $this->db->where("date BETWEEN ".strtotime($this->input->post('date_from'))." AND ".strtotime($this->input->post('date_to'))." ");

    $q = $this->db->get('course_confirm');
    
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $this->db->select('COUNT(sessions_reserve.gender),sessions.sessions_name');
    
            $this->db->group_by(array("sessions_reserve.gender","course_id"));
            
            $this->db->join('sessions_reserve','course_confirm.student_id=sessions_reserve.sessions_reserve_id_pk','right');
            
            $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','left');
        
            $this->db->where(array("confirm"=>1,'gender'=>1,'course_id'=>$row->course_id));
            
            $this->db->where("date BETWEEN ".strtotime($this->input->post('date_from'))." AND ".strtotime($this->input->post('date_to'))." ");
        
            $q1 = $this->db->get('course_confirm');
            
            if ($q1->num_rows() > 0) {
                foreach ($q1->result() as $row1) {
                    $data[$row->sessions_name][1] = $row1;
                }
            }
            
            $this->db->select('COUNT(sessions_reserve.gender),sessions.sessions_name');
    
            $this->db->group_by(array("sessions_reserve.gender","course_id"));
            
            $this->db->join('sessions_reserve','course_confirm.student_id=sessions_reserve.sessions_reserve_id_pk','right');
            
            $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','left');
        
            $this->db->where(array("confirm"=>1,'gender'=>2,'course_id'=>$row->course_id));
            
            $this->db->where("date BETWEEN ".strtotime($this->input->post('date_from'))." AND ".strtotime($this->input->post('date_to'))." ");
        
            $q2 = $this->db->get('course_confirm');
            
            if ($q2->num_rows() > 0) {
                foreach ($q2->result() as $row2) {
                    $data[$row->sessions_name][2] = $row2;
                }
            }
            
            
        }
    }
    
    return $data;

    }
    
    public function select_count2(){
        
        $this->db->select('trainers.name,trainers.id');
        $q = $this->db->get('trainers');
        
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $this->db->select('sessions.sessions_name,COUNT(*),start_end_course.course_id,start_end_course.trainer_id');
                $this->db->group_by(array("course_id"));
                $this->db->join('sessions','sessions.sessions_id_pk=start_end_course.course_id','left');
                $this->db->where(array('trainer_id'=>$row->id));
                $q1 = $this->db->get('start_end_course');
                if ($q1->num_rows() > 0) {
                    foreach ($q1 ->result() as $row1) {
                        $this->db->select('COUNT(*) AS cou');
                        $this->db->join('sessions_reserve','sessions_reserve.sessions_reserve_id_pk=start_end_course.student_id','left');
                        $this->db->where(array('course_id'=>$row1->course_id,'trainer_id'=>$row1->trainer_id,'gender'=>1));
                        $q2 = $this->db->get('start_end_course');
                        if ($q2->num_rows() > 0) {
                            foreach ($q2 ->result() as $row2) {
                                $data[$row->name][$row1->sessions_name][1] = $row2;
                            }
                        }
                        
                        $this->db->select('COUNT(*) AS cou');
                        $this->db->join('sessions_reserve','sessions_reserve.sessions_reserve_id_pk=start_end_course.student_id','left');
                        $this->db->where(array('course_id'=>$row1->course_id,'trainer_id'=>$row1->trainer_id,'gender'=>2));
                        $q3 = $this->db->get('start_end_course');
                        if ($q3->num_rows() > 0) {
                            foreach ($q3 ->result() as $row3) {
                                $data[$row->name][$row1->sessions_name][2] = $row3;
                            }
                        }
                    }
                }
            }
        }
    return $data;

    }
    
    public function select_where($session_id){
        
        $query =  $this->db->query( 'SELECT sessions_reserve.*

                    FROM sessions_reserve

                    LEFT JOIN course_confirm ON course_confirm.student_id = sessions_reserve.sessions_reserve_id_pk

                    WHERE course_confirm.course_id='.$session_id.'

                    AND course_confirm.confirm=1');
            
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    if($row->gender == 1)
                        $data[1][] = $row;
                    else
                        $data[2][] = $row;
                }
                return $data;
            }
            
        

    }
    
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('course_confirm');

    }
    
     public function getById($id){
        $h = $this->db->get_where('course_confirm', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id){
        $data = array(

            'course_id'=>$this->input->post('sessions_id_fk'),
            'date' => strtotime(date("Y/m/d")),
            'date_s' => time()  
        );

        $this->db->where('id', $id);

        if($this->db->update('course_confirm',$data)) {
            return true;
        }else{
            return false;
        }


    }


 }
