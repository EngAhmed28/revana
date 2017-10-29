<?php

class Slider_model extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("slider");

    }
//----------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value)  ){
            $val='بلاحدود';
            return $val;
        }else{
            return $post_value;
        }
    }

//----------------------------------------------------
    public  function  insert($file){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));    
        $data['img']= $file;
        $this->db->insert('slider',$data);
    }


    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->order_by('id','DESC');
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
        $this->db->delete('slider');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('slider', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        $update = array(
            'title'=>$this->chek_Null($this->input->post('title')) ,
            'content' =>$this->chek_Null($this->input->post('content'))
          
        );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('slider',$update)) {
            return true;
        }else{
            return false;
        }
    }
 //-----------------------------------------------------
public function get_image_name($id){
      $h = $this->db->get_where("slider", array('id'=>$id));
        $arr=$h->row_array();
        return $arr['img'];
}
//----------------------------------------------------
public function delete_img($id){
    
        $img_name=$this->get_image_name($id);
         unlink("uploads/images/".$img_name);
        $this->db->where("id",$id);
        $this->db->delete("slider");
}
//--------------------------------------------------
}// END CLASS