<?php

class Customer extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert($file){

        $data['name']=$this->input->post('name');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_username'];
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->insert('customers',$data);
    }
//-------------------------------------------------select-------------------
    public function select($limit){
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->limit($limit);
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
    //-----------------------------------------------delete----------------------------------------//
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('customers');
    }
//---------------------------------------------------update-------------------------------------//
    public function getById($id){
        $h = $this->db->get_where('customers', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        $update = array('name'=>$this->input->post('name') );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('customers',$update)) {
            return true;
        }else{
            return false;
        }
    }

//------------------------------------------------------------------------------------------------------------------------
 public  function  insert_openions($file){
        
        $data['customer_id']=$this->input->post('customer_id');
        $data['customer_openion']=$this->input->post('customer_openion');
        $data['customer_logo']= $file;
        $data['publisher_openion'] = $_SESSION['user_username'];
        $data['date_openion'] = strtotime(date("m/d/Y"));
        $data['date_s_openion']=time();
        $this->db->insert('customers_openions',$data);
    }
//------------------------------------
public function avilable_customers(){
       $this->db->select('*');
        $this->db->from('customers');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `customers_openions` WHERE `customer_id`='.$row->id); 
                if ($query2->num_rows() > 0) {
                    continue;
                }
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}
//--------------------------------------
 public function select_openions($limit){
        $this->db->select('*');
        $this->db->from('customers_openions');
         $this->db->join('customers', 'customers_openions.customer_id = customers.id', 'left'); 
        $this->db->limit($limit);
        $this->db->order_by('id_openion','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//------------------------------------
    public function update_openions($id,$file){
        $update = array('customer_openion'=>$this->input->post('customer_openion') );
        if($file != ''){
            $update['customer_logo']=$file ;
        }
        $this->db->where('id_openion', $id);
        if($this->db->update('customers_openions',$update)) {
            return true;
        }else{
            return false;
        }
    }
//-------------------------------------------
   public function getById_openions($id){
        $h = $this->db->get_where('customers_openions', array('id_openion'=>$id));
        return $h->row_array();
    }

  //-----------------------------------------------delete----------------------------------------//
    public function delete_openions($id){
        $this->db->where('id_openion',$id);
        $this->db->delete('customers_openions');
    }


}// END CLASS 