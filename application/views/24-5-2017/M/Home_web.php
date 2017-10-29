<?php

class Home_web extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert()
    {
        $data['new_id'] = $this->uri->segment(3);

        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['message'] = $this->input->post('message');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->insert('comment',$data);
    }

    public function select_comment($id){

        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('new_id',$id);
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

    public function select_comment_web($id){

        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('suspend',1);
        $this->db->where('new_id',$id);

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
    public function select_customers(){
        $this->db->select('*');
        $this->db->from('customers');
       // $this->db->limit($limit);
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
    public function select_news($limit){
        $this->db->select('news.*,albums.img');
        $this->db->from('news');
        $this->db->join('albums', 'albums.id_fk = news.id');
        $this->db->group_by('news.id');
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

    public function select_news_img($id){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->order_by('id','DESC');
        $this->db->where('id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_details($id){
        $this->db->select('news.*,albums.img');
        $this->db->from('news');
        $this->db->join('albums', 'albums.id_fk = news.id');
        $this->db->where('news.id',$id);
        $this->db->group_by('news.id');
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

    public function select_footer(){
        $this->db->select('*');
        $this->db->from('main_company_data');
        // $this->db->limit($limit);
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


    public function suspend_urgent($id,$types)
    {
        if($types == 'danger')
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
        if($this->db->update('comment',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    

}