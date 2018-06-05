<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisproduk extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->database();
        $data['jenis'] = $this->db->get('jenis_produk')->result();
		echo $this->view('jenis/index', $data);
	}
    public function hapus($id)
	{
		$this->db->where('id_jenis_produk', $id)->delete('jenis_produk');
		redirect('admin/jenisproduk');
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('jenis_produk', $data);
			redirect('admin/jenisproduk');
		}else{
			echo $this->view('jenis/tambah');
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->where('id_jenis_produk', $id)->update('jenis_produk', $data);
			redirect('admin/jenisproduk');
		}else{
			$data['detail'] = $this->db->where('id_jenis_produk', $id)->get('jenis_produk')->row();
			echo $this->view('jenis/edit', $data);
		}
	}
}
