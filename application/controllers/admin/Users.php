<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
	public function index()
	{
        $data['nama'] = $this->db->get('users')->result();
		echo $this->view('users/index', $data);
	}
   public function hapus($id)
   {
   		$this->db->where('id', $id)->delete('users');
   		redirect('admin/users');
   }
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
            $data['password'] = md5($data['password']);
			$this->db->insert('users', $data);
			redirect('admin/users');
		}else{
			echo $this->view('users/tambah');
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
            $data['password'] = md5($data['password']);
			$this->db->where('id', $id)->update('users', $data);
			redirect('admin/users');
		}else{
			$data['detail'] = $this->db->where('id', $id)->get('users')->row();
			echo $this->view('users/edit', $data);
		}
	}
}
