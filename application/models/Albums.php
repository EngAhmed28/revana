<?php

class Albums extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("albums_img");

    }

    public  function  insert($file){
        $data['title']=$this->input->post('title');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;

        $this->db->insert('albums_img',$data);
    }


    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('albums_img');
       // $this->db->where('type',$type);
        $this->db->order_by('id','DESC');
        //$this->db->limit($limit);
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
        $this->db->delete('albums_img');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('albums_img', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        $update = array(
            'title'=>$this->input->post('title') ,
            'publisher' => $_SESSION['user_id'],
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('albums_img',$update)) {
            return true;
        }else{
            return false;
        }
    }

    /////////////////////// Suspend

    public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('albums_img',$update)) {
            return true;
        }else{
            return false;
        }
    }

    ///////////////////

    public function select_web($limit){
        $this->db->select('*');
        $this->db->from('albums_img');
        $this->db->limit($limit);
        $array = array('suspend' => 1);
        $this->db->where($array);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
	
	
	
	    public function select_other_photos($type,$id){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->where('id_fk ',$type);
        $this->db->where('id !=',$id);
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