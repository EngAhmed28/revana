<?php

class Abouts extends CI_Model
 {

    //===============================================================
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("diffrent_tables");

    }

    public  function  insert($file,$type){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        $data['type'] = $type;

        $this->db->insert('diffrent_tables',$data);
    }

    public  function  insert_important($file,$type){
        $content = $this->input->post('content');

        $data['title']=$this->input->post('title');
        //  $data['content']=$this->input->post('content');
        $data['content'] = (!empty($content)) ? $content : NULL;

        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        $data['type'] = $type;

        //  $this->db->set('content', null);

        $this->db->insert('diffrent_tables',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$type){
        $this->db->select('*');
        $this->db->from('diffrent_tables');
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
        $this->db->delete('diffrent_tables');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('diffrent_tables', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        $update = array(
            'title'=>$this->input->post('title') ,
            'content'=>$this->input->post('content') ,
            'publisher' => $_SESSION['user_id'],
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('diffrent_tables',$update)) {
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
        if($this->db->update('diffrent_tables',$update)) {
            return true;
        }else{
            return false;
        }
    }

    ///////////////////

    public function select_web($type){
        $this->db->select('*');
        $this->db->from('diffrent_tables');
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

    //============================================
    public function get_about($type){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('type',$type);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
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