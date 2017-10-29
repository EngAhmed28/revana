<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 08/01/17
 * Time: 11:32 ص
 */
class Course extends CI_Model
{
        public function __construct()
        {
            parent::__construct();
        }
        
        
        public  function record_count(){
        return $this->db->count_all("course");

    }
    
    public  function  insert($file)
    {

        $data['course_code']=$this->input->post('course_code');
        $data['course_name']=$this->input->post('course_name');
        $data['course_details']=$this->input->post('course_details');
        $data['course_img']=$file;


        $this->db->insert('course',$data);

    }
///////////selecting data//////////////////

    public function select(){
        $q = $this->db->get('course');
     
        return $q->result();
    }

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('course_id_pk',$id);
        $this->db->delete('course');

    }
    ////////////////////
///////update/////////
    public function getById($id){
 // $h = $this->db->order_by('id','desc');
        $h = $this->db->get_where('course', array('course_id_pk'=>$id));
 
        return $h->row_array();
    }


    public function update($id,$file){
        $data = array(

            'course_code'=>$this->input->post('course_code'),
            'course_name'=>$this->input->post('course_name'),
            'course_details'=>$this->input->post('course_details'),

        );


        if($file != ''){
            $data['course_img']=$file ;
        }

        $this->db->where('course_id_pk', $id);

        if($this->db->update('course',$data)) {
            return true;
        }else{
            return false;
        }


    }
    
    
    
    
        public function get_all_courses(){
        $this->db->select('*');
        $this->db->from('course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}