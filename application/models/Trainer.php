<?php

class Trainer extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("trainers");

    }

    public  function  insert($file,$file2){
        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['img']= $file;
        $data['pdf'] = $file2;
        $data['suspend'] = 1;
        $data['address'] = $this->input->post('address');
        $data['cv'] = $this->input->post('cv');
        $data['date_s']=time();
        $data['date'] = strtotime(date("m/d/Y"));



        $this->db->insert('trainers',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('trainers');

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

///////update/////////
    public function getById($id){
        $h = $this->db->get_where('trainers', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id,$file,$file2){

        $update = array(

            'name'=>$this->input->post('name') ,

            'email'=>$this->input->post('email') ,

              'phone'=>$this->input->post('phone') ,
          'address'=>$this->input->post('address') ,
          'cv'=>$this->input->post('cv')

        );

        if($file != ''){

            $update['img']=$file ;

        }


        if($file2 != ''){

            $update['pdf']=$file2 ;

        }

        $this->db->where('id', $id);

        if($this->db->update('trainers',$update)) {

            return true;

        }else{

            return false;

        }

    }

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

        if($this->db->update('trainers',$update)) {

            return true;

        }else{

            return false;

        }

    }



        public function delete($id){

        $this->db->where('id',$id);

        $this->db->delete('trainers');



    }
   public function select_web(){

        $this->db->select('*');

        $this->db->from('trainers');

        $this->db->where('suspend', 1);

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
    //==============================================================ahmed============================25-5

    public  function  insert_openions($file){

        $data['trainer_id']=$this->input->post('trainer_id');
        $data['trainer_openion']=$this->input->post('trainer_openion');
        $data['trainer_logo']= $file;
        $data['publisher_openion'] = $_SESSION['user_username'];
        $data['date_openion'] = strtotime(date("m/d/Y"));
        $data['date_s_openion']=time();
        $this->db->insert('trainers_openions',$data);
    }
//------------------------------------
    public function avilable_trainers(){
        $this->db->select('*');
        $this->db->from('trainers');
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
//--------------------------------------
    public function select_openions($limit){
        $this->db->select('*');
        $this->db->from('trainers_openions');
        $this->db->join('trainers', 'trainers_openions.trainer_id = trainers.id', 'left');
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
        $update = array('trainer_openion'=>$this->input->post('trainer_openion') );
         $update['trainer_id']=$this->input->post('trainer_id');
        if($file != ''){
            $update['trainer_logo']=$file ;
        }
        $this->db->where('id_openion', $id);
        if($this->db->update('trainers_openions',$update)) {
            return true;
        }else{
            return false;
        }
    }
//-------------------------------------------
    public function getById_openions($id){
        $h = $this->db->get_where('trainers_openions', array('id_openion'=>$id));
        return $h->row_array();
    }

    //-----------------------------------------------delete----------------------------------------//
    public function delete_openions($id){
        $this->db->where('id_openion',$id);
        $this->db->delete('trainers_openions');
    }



}