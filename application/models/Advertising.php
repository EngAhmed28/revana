<?php

class Advertising extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("advertising");

    }

    public  function  insert($file){
        $data['image'] = $file;
         $data['view_id'] = $this->input->post('view');
         $data['from'] = strtotime($this->input->post('from'));
         $data['to'] = strtotime($this->input->post('to'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
     

        
        $this->db->insert('advertising',$data);
    }
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('advertising');
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
      public function select_adver(){
          /*
        $this->db->select('*');
        $this->db->from('advertising');
        $this->db->order_by('id','DESC');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
          
          
             $query = $this->db->query('SELECT * FROM `advertising` order by id desc');
  if($query->num_rows()){
              foreach ($query->result() as $row) {

                  $data[] = $row;

              }
              return $data;

          }
          return false;
          
    }
        

    /////////////////
       /////////////////
       public function select_adver_left(){
           $time=  time();

   // $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =2 AND '.$time.' BETWEEN `from` AND `to` order by id desc');
     
 $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =2  order by id desc');
         
     
             if($query->num_rows()){
            foreach ($query->result() as $row)
            {
               
                 $data[]=$row;
                
            }
            return $data;
             }
             return FALSE;
          
          
    }
    ///////////////////////////////////
           public function select_adver_right(){
           $time=  time();
             $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =1 AND '.$time.' BETWEEN `from` AND `to` order by id desc');
           if($query->num_rows()){
            foreach ($query->result() as $row)
            {
               
                 $data[]=$row;
                
            }
            return $data;
                  }
             return FALSE;
          
          
    }
    /////////////////////////
               public function select_adver_leftup(){
           $time=  time();

             $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =5 AND '.$time.' BETWEEN `from` AND `to` order by id desc limit 1');
           if($query->num_rows()){
            foreach ($query->result() as $row)
            {
               
                 $data[]=$row;
                
            }
            return $data;
            
           }
             return FALSE;
          
    }
        /////////////////////////
               public function select_adver_leftdown(){
           $time=  time();
             $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =6 AND '.$time.' BETWEEN `from` AND `to` order by id desc limit 1');
           if($query->num_rows()){
            foreach ($query->result() as $row)
            {
               
                 $data[]=$row;
                
            }
            return $data;
                }
             return FALSE;
          
          
    }
            /////////////////////////
    public function select_adver_up(){
        $time=  time();

        $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` =3 AND '.$time.' BETWEEN `from` AND `to` order by id desc limit 1');
        if($query->num_rows()){
            foreach ($query->result() as $row)
            {

                $data[]=$row;

            }
            return $data;
        }
        return FALSE;


    }
    //////////////////////////
    public function select_adver_inside(){
        $time=  time();

        $query = $this->db->query('SELECT * FROM `advertising` WHERE `view_id` = 4 AND '.$time.' BETWEEN `from` AND `to` order by id desc limit 1');
        if($query->num_rows()){
            foreach ($query->result() as $row)
            {

                $data[]=$row;

            }
            return $data;
        }
        return FALSE;


    }
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('advertising');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('advertising', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){

        $update = array(
            'view_id' => $this->input->post('view'),
            'from' => strtotime($this->input->post('from')),
            'to' => strtotime($this->input->post('to')),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
        );
        
        
    if($file != ''){
            $update['image']=$file ;
        }    
        
        $this->db->where('id', $id);
        if($this->db->update('advertising',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    ///////////////////////////////
    public  function record_count2(){
        $this->db->select('*');
        $this->db->from('advertising');
        $this->db->group_by('view_id');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

              $query2 = $this->db->query("SELECT * FROM `advertising` WHERE `view_id`=".$row->view_id);
                $sub_data=array();
                        foreach ($query2->result() as $row2) {
                            $sub_data[$row2->id] =  $row2;
                           
                        }
                 $data[$row->view_id] =$sub_data;
        
  
               
         }
            return $data;
        }
        return false;
     }
     public function all_images() {
         
         $this->db->select('*');
        $this->db->from('advertising');
        $this->db->group_by('view_id');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
$data[$row->id]= $row;
            }
         return $data;
        }
        return flase;
     }

 }