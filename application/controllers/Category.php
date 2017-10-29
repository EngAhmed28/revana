<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function index()
	{
		$this->load->view('home');
	}
	Public function get_main_depart()
	{
		$query=   $this->db->get_where('departments', array('depart_from_id_fk' => 0));
        $result= $query->result();
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->name;
			$json[]=$data;
		}
		echo json_encode($json);
	}
	Public function get_branch()
	{
		$query=   $this->db->get_where('departments', array('depart_from_id_fk' => $_POST['id']));
		$result= $query->result();
		$data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->name;
			$json[]=$data;
		}
		echo json_encode($json);
	}
		Public function get_branch2()
	{
		$query=   $this->db->get_where('departments', array('depart_from_id_fk' => $_POST['id']));
		$result= $query->result();
		$data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->name;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	//----------------------------------------------------------------------gh------------
	Public function get_main_depart_()
	{
		$query=   $this->db->get_where('departments', array('depart_from_id_fk' => 0));
		$result= $query->result();
		$data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->name;
			$json[]=$data;
		}
		echo json_encode($json);
	}
}
