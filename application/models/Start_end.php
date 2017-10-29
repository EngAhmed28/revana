<?php

class Start_end extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("start_end_course");

    }

    public  function  insert($students,$start_date,$end_date){
        
        $z = rand();
        //$z1 = rand();
        
        for($x = 0 ; $x < count($students) ; $x++)
        {
            $data['course_id']=$this->input->post('course_id');
            $data['trainer_id']=$this->input->post('trainer_id');
            $data['student_id']=$students[$x]->sessions_reserve_id_pk;
            $data['start_date']=strtotime($start_date);
            $data['end_date']=strtotime($end_date);
            $data['hijri_start_date'] = $this->input->post('start_date');
            $data['hijri_end_date'] = $this->input->post('end_date');
            $data['group_id'] = strtotime(date("Y/m/d")) + $z;
            //$data['certificate_id'] = $z1 + $x;
            
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s'] = time();
            
            $this->db->insert('start_end_course',$data);
            
            $dd['confirm'] = 2;
            $dd['start_end_id'] = $data['group_id'];
            $this->db->where('id', $students[$x]->id);
            $this->db->update('course_confirm',$dd);
        }
    }
    
   /* public  function  insert1(){
        
        $z = rand();
        
        if($this->input->post('check')){
            $check = $this->input->post('check');
            for($x = 0 ; $x < count($this->input->post('check')) ; $x++)
            {
                $data['course_id']=$this->input->post('course_id');
                $data['trainer_id']=$this->input->post('trainer_id');
                $data['student_id']=$check[$x];
                $data['start_date']=strtotime($this->input->post('start_date'));
                $data['end_date']=strtotime($this->input->post('end_date'));
                $data['group_id'] = strtotime(date("Y/m/d")) + $z;
                
                $data['date'] = strtotime(date("Y/m/d"));
                $data['date_s'] = time();
                
                $this->db->insert('start_end_course',$data); 
                
                $dd['confirm'] = 2;
                $dd['start_end_id'] = $data['group_id'];
                $this->db->where(array('student_id'=> $check[$x],'course_id'=>$this->input->post('course_id')));
                $this->db->update('course_confirm',$dd);                               
            }
        }
        
    }*/
    
    public function select_course(){
        /*$this->db->select('*');
        $this->db->group_by('sessions_id_fk'); 
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');
        $this->db->where('session_reserve_confirm','1');
        $this->db->from('sessions_reserve');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
        $this->db->select('*');
        $this->db->group_by('course_id'); 
        $this->db->join('sessions','sessions.sessions_id_pk=course_confirm.course_id','right');
        $this->db->where('confirm','1');
        $this->db->from('course_confirm');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function students($id){
        /*$this->db->select('*'); 
        $array = array('session_reserve_confirm'=>1, 'sessions_id_fk'=>$id);
        $this->db->where($array);
        $this->db->from('sessions_reserve');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
        $this->db->select('*'); 
        $this->db->join('sessions_reserve','sessions_reserve.sessions_reserve_id_pk=course_confirm.student_id','right');
        $array = array('confirm'=>1, 'course_id'=>$id);
        $this->db->where($array);
        $this->db->from('course_confirm');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select(){
        $this->db->select('start_end_course.*,sessions.sessions_name');
        $this->db->group_by('start_end_course.course_id');
        $this->db->join('sessions','sessions.sessions_id_pk=start_end_course.course_id','right');
        $this->db->order_by('start_end_course.id','DESC');
        $query = $this->db->get_where('start_end_course', array('id!='=>'NULL'));
        return $query->result();
    }
    /////////////////
    
    
    /////delete/////
    public function delete($group_id){
        
       /* $data = '';
        
        $this->db->select('*'); 
        $this->db->order_by('id','DESC');
        $array = array('group_id'=>$group_id);
        $this->db->where($array);
        $this->db->from('start_end_course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        
        for($aa = 0 ; $aa < count($data) ; $aa++)
        {
            $confirm['confirm'] = 1;
            $this->db->where('sessions_reserve_id_pk', $data[$aa]->student_id);
            $this->db->update('course_confirm',$confirm);
        }*/
        $confirm['confirm'] = 1;
        $confirm['start_end_id'] = 0;
        $this->db->where('start_end_id', $group_id);
        $this->db->update('course_confirm',$confirm);
        
        $this->db->where('group_id',$group_id);
        $this->db->delete('start_end_course');
    }
///////update/////////
    public function getById($group_id){
        $this->db->select('start_end_course.*,sessions.sessions_name,sessions.sessions_id_pk,sessions_reserve.sessions_reserve_name,sessions_reserve.gender,sessions_reserve.sessions_reserve_phone,sessions_reserve.sessions_reserve_id_pk'); 
        $this->db->join('sessions','sessions.sessions_id_pk=start_end_course.course_id','right');
        $this->db->join('sessions_reserve','start_end_course.student_id=sessions_reserve.sessions_reserve_id_pk','left');
        $query = $this->db->get_where('start_end_course', array('group_id'=>$group_id));
        return $query->result();
        
    }
    
    
    
    public function students_update($group_id){
        $this->db->select('*'); 
        $array = array('group_id'=>$group_id);
        $this->db->where($array);
        $this->db->from('start_end_course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    
    
    public function update($group_id,$start_date,$end_date){
        $update['trainer_id']=$this->input->post('trainer_id');
        /*$update['start_date'] = strtotime($this->input->post('start_date'));
        $update['end_date'] = strtotime($this->input->post('end_date'));*/
        $update['start_date']=strtotime($start_date);
        $update['end_date']=strtotime($end_date);
        $update['hijri_start_date'] = $this->input->post('start_date');
        $update['hijri_end_date'] = $this->input->post('end_date');
        
        $this->db->where('group_id', $group_id);
        if($this->db->update('start_end_course',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function update_certification($group_id){
        $data['id'] = $this->students_update($group_id);
        for($x = 0 ; $x < count($data['id']) ; $x++)
        {
            $update['certificate_id']=$this->input->post('cer'.$data['id'][$x]->id.'');
            $this->db->where('id', $data['id'][$x]->id);
            $this->db->update('start_end_course',$update);
        }
    }
    
    
    
        public function getdata($group_id){
      
        $this->db->select('start_end_course.*,sessions.*,sessions_reserve.*'); 
        $this->db->join('sessions','sessions.sessions_id_pk=start_end_course.course_id','right');
        $this->db->join('sessions_reserve','start_end_course.student_id=sessions_reserve.sessions_reserve_id_pk','left');
        $query = $this->db->get_where('start_end_course', array('certificate_id'=>$group_id));
        return $query->result();
        
    }
    
     public function select_trainers(){
        
        $this->db->select('*'); 
        $this->db->order_by('course_id_pk','DESC');
        $this->db->from('course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $this->db->select('*'); 
                $this->db->order_by('sessions_id_pk','DESC');
                $this->db->where('course_id_fk',$row->course_id_pk);
                $this->db->from('sessions');
                $query2 = $this->db->get();
                
                foreach ($query2->result() as $row2) {
                    $data2 = array();
                    $data[$row->course_name][] = $row2;
                    $this->db->select('*');
                    $this->db->group_by(array("trainer_id", "course_id"));  
                    $this->db->where('course_id',$row2->sessions_id_pk);
                    $this->db->from('start_end_course');
                    $query3 = $this->db->get();
                    if ($query3->num_rows() > 0) {
                    foreach ($query3->result() as $row3) {
                        $data2[$row2->sessions_id_pk][] = $row3;
                        }
                        $count = count($data2[$row2->sessions_id_pk]);
                        $data[$row->course_name][] = $count;
                    }
                    else
                        $data[$row->course_name][] = 0;
                    }
            }
        }
       
        return $data;
        
        
    }
    
  

 }