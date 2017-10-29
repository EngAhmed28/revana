<?php

class Logan extends CI_Model
{

    public function __construct()


    {

        parent:: __construct();


    }


    public  function record_count(){


        return $this->db->count_all("comp_slogans");

    }





    public  function  insert($file){

        $data['depart_id_fk']=$this->input->post('depart_id_fk');

        $data['title']=$this->input->post('title');
        $data['img']= $file;
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->insert('comp_slogans',$data);


    }



//-------------------------------------------------select-------------------

    public function select_web(){


        $this->db->select('*');


        $this->db->from('comp_slogans');

        $this->db->where('depart_id_fk!=','0');

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


    //-----------------------------------------------delete----------------------------------------//


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('comp_slogans');
    }


//---------------------------------------------------update-------------------------------------//


    public function getById($id){
        $h = $this->db->get_where('comp_slogans', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id,$file){


        $update = array(

        'depart_id_fk'=>$this->input->post('depart_id_fk') ,
            'title'=>$this->input->post('title') ,


            'content'=>$this->input->post('content') ,


            'date' => strtotime(date("Y-m-d")),


            'date_s' => time()



        );


        if($file != ''){


            $update['img']=$file ;


        }


        $this->db->where('id', $id);


        if($this->db->update('comp_slogans',$update)) {


            return true;


        }else{


            return false;


        }


    }





    //------------------------------------------------------------------------------------//


}