<?php

class Fields extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();

    }

    public  function record_count(){
        return $this->db->count_all("fields");

    }

    public  function  insert()
    {
        $data['title'] = $this->input->post('title');
        $this->db->insert('fields',$data);
    }

    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('fields');
        $this->db->order_by('id','DESC');
        $this->db->limit($limit);
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
        $this->db->delete('fields');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('fields', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id){
        $update = array(
            'title'=>$this->input->post('title') ,

        );
        $this->db->where('id', $id);
        if($this->db->update('fields',$update)) {
            return true;
        }else{
            return false;
        }
    }





}