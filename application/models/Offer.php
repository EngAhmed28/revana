<?php

class Offer extends CI_Model
 {

    //===============================================================
    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert($file){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['adventage']=$this->input->post('adventage');
        $data['price']=$this->input->post('price');
        $data['hours_number']=$this->input->post('hours_number');
        $data['img']= $file;
        
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
    
        $this->db->insert('offers',$data);
    }
    
    
   
   
    public function select(){
        $this->db->select('*');
        $this->db->from('offers');
       // $this->db->where('type',$type);
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
    
    
    /*********************************************/
     
        public function getById($id){
        $h = $this->db->get_where('offers', array('id'=>$id));
        return $h->row_array();
    }
    
    
        public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('offers');

    }
    
    
    /**************************************/
      public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array( 'suspend' => 1);
        }else{
            $update = array('suspend' => 0);
        }

        $this->db->where('id', $id);
        if($this->db->update('offers',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    

    public function update($id,$file){
        $update = array(
            'title'=>$this->input->post('title') ,
            'content'=>$this->input->post('content') ,
            'adventage'=>$this->input->post('adventage') ,
            'publisher' => $_SESSION['user_id'],
              'price'=>$this->input->post('price') ,
                'hours_number'=>$this->input->post('hours_number') ,
            
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('offers',$update)) {
            return true;
        }else{
            return false;
        }
    }
     
    
  /*****************************************/  
    
/*
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

    /////////////////
    /////delete/////

///////update/////////


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
    }*/

 }