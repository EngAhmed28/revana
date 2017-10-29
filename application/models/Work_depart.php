
<?php
class Work_depart extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
  
public function work_main_dep($id){
        
        $this->db->select('*');
        $this->db->from('allworks');
        $this->db->order_by('id','DESC');
        $this->db->where('main_depart',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                 $query2 =$this->db->query('SELECT * FROM `albums` WHERE `dep_id_fk` = '.$row->id);
            
        
                 $sub_data=array();
                 foreach ($query2->result() as  $row2) {
                    $sub_data[]=$row2;
                 }
               
                $data[$row->id] = $sub_data;
            }
            return $data;
        }
        return false;    
}  
//---------------------------------------------------
public function all_img($id){
     $this->db->select('*');
        $this->db->from('allworks');
        $this->db->order_by('id','DESC');
        $this->db->where('main_depart',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                 $query2 =$this->db->query('SELECT * FROM `albums` WHERE `dep_id_fk` = '.$row->id);
            
        
               //  $sub_data=array();
                 foreach ($query2->result() as  $row2) {
                    $sub_data[$row2->id]=$row2->img;
                 }
               
                $data= $sub_data;
            }
            return $data;
        }
        return false;  
    
}  
  
}//END CLASS 