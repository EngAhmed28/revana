<?php

class Videos extends CI_Model
 {

    //===============================================================
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("Videos");

    }

    public  function  insert($max,$id,$type){

         $x=1;
        for ($a=0;$a<$max;$a++){

            $data['course_id_fk']=$id;
            $data['title']=$this->input->post('title'.$x);
            $v_link = $this->input->post('vid'.$x);
            $d = explode('v=',$v_link);
            $data['vid']=$d[1];
            //var_dump($this->input->post('vid'.$x));
            $data['type']=$type;
            $this->db->insert('videos',$data);
            $x++;
        }

    }
   //===========================================
    public function get_vid($id){
        $this->db->select("*");
        $this->db->from("videos");
        $this->db->where('course_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //=======================================delete

    public function delete_video($id){
        $this->db->where('id',$id);
        $this->db->delete('videos');
    }
    //==================================================

    public function select_videos_web()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->group_by('course_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `videos` WHERE `course_id_fk`='.$row->course_id_fk.' order by `id` desc limit 1 ');
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[]=$arr;
            }
            return $data;
        }
        return false;
    }

    //=====================================================
    public function get_videos()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `videos` WHERE `course_id_fk`='.$row->course_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->course_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
 }