<?php
class News extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("news");
    }

//-----------------------------------------------insert------------------------------------//
    public  function  insert(){
        $data['news_title']=$this->input->post('title');
        $data['news_content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('news',$data);
    }
    public function insert_album($file,$f_id) {
        $a = 0;
        foreach($file as $record):
            if($record !=''){
                $val['img']=$record;
            }else{
                $val['img']="Null";
            }

            $val['id_fk']=$f_id;
            $a++;
            $this->db->insert('albums',$val);
        endforeach;
    }
//----------------------------------------------------select_last---------------------------------------//
    public function select_last(){
        $this->db->select('*');
        $this->db->from('news');
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
//----------------------------------------------------------select_all------------------------------------//
    public function select_all(){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
//--------------------------------------------getdetails---------------------------------//
    public function  getdetails(){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->group_by('id_fk');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `albums` WHERE `id_fk` = '.$row->id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->img;
                }
                $data[$row->id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
//------------------------------------------delete id------------------------------//
     public function delete($id){
$this->db->where('id',$id);
$this->db->delete('news');
$this->db->where('id_fk',$id);
$this->db->delete('albums');
}
    public function delete_photo($id){
        $this->db->where('id',$id);
        $this->db->delete('albums');
    }
//------------------------------------------------ getimg-----------------------------------//
    public function getById($id){
        $h = $this->db->get_where('news', array('id'=>$id));
        return $h->row_array();
    }
    public function getimg($id){
        $this->db->select("*");
        $this->db->from("albums");
        $this->db->where('id_fk', $id);
        $query = $this->db->get();
        return $query->result();
    }
    //----------------------------------------------------------update------------------------------//
    public function update($id,$file){
        $h = $this->db->get_where('news', array('id'=>$id));
        $row = $h->row_array();
        $a = 0;
        if(!empty($file)):
        foreach($file as $record):
            $a++;
            $val['img']=$record;
            $val['id_fk']=$row['id'];
            $this->db->insert('albums',$val);
        endforeach;
            endif;
        $data['news_title']=$this->input->post('title');
        $data['news_content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->where('id', $id);
        if($this->db->update('news',$data)) {
            return true;
        }else{
            return false;
        }
    }
//----------------------------------start-------------------------



    public function select_last_news($limit){
    $this->db->select('*');
    $this->db->from('albums');
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
  //-----------------------------------------


public function select_news_web()
{
    $this->db->select('*');
    $this->db->from('news');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $query2 =$this->db->query('SELECT * FROM `news` WHERE `main_depart`='.$row->main_depart);
            $arr=array();
            foreach ($query2->result() as  $row2) {
                $arr[] =$row2;
            }
            $data[$row->main_depart]=$arr;
        }
        return $data;
    }
    return false;
}
 //------------------------------------------------ahmed----------------------------------------
    public function select_news($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //========================================
    public function select_other_news($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id !=',$id);
        $this->db->order_by('id','desc');
        $this->db->limit(5);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //====================================================
    public function select_album_web(){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `albums` WHERE `id_fk`='.$row->id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id_fk]=$arr;

            }
            return $data;
        }
        return false;
    }



}