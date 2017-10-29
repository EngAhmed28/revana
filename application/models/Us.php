<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 5/23/2017
 * Time: 01:10 م
 */
class Us extends CI_Model
{


    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("about");

    }

    public  function  insert($type){
        $data['content']=$this->input->post('content');
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        $data['type'] = $type;

        $this->db->insert('about',$data);
    }

   /* public  function  insert_important($type){

         $data['content']=$this->input->post('content');
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        $data['type'] = $type;

        //  $this->db->set('content', null);

        $this->db->insert('about',$data);
    }*/
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$type){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('type',$type);
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
        $this->db->delete('about');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('about', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id){
        $update = array(
            'content'=>$this->input->post('content') ,
            'publisher' => $_SESSION['user_id'],
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );

        $this->db->where('id', $id);
        if($this->db->update('about',$update)) {
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
        if($this->db->update('about',$update)) {
            return true;
        }else{
            return false;
        }
    }

    ///////////////////

    public function select_web($type){
        $this->db->select('*');
        $this->db->from('about');
        $array = array('type' => $type, 'suspend' => 1);
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


}