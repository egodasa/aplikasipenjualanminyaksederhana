<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('karyawan');
    }
	public function index()
	{
        $data['produk'] = $this->db->query("select a.*, b.jenis from produk a inner join jenis_produk b on a.id_jenis_produk = b.id_jenis_produk")->result();
		echo $this->view('karyawan/produk/index', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id_produk', $id)->delete('produk');
		redirect('karyawan/produk');
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('produk', $data);
			redirect('karyawan/produk');
		}else{
			$data['jenis_produk'] = $this->db->get('jenis_produk')->result();
			echo $this->view('karyawan/produk/tambah', $data);
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->where('id_produk', $id)->update('produk', $data);
			redirect('karyawan/produk');
		}else{
			$data['detail'] = $this->db->where('id_produk', $id)->get('produk')->row();
			$data['jenis_produk'] = $this->db->get('jenis_produk')->result();
			echo $this->view('karyawan/produk/edit', $data);
		}
	}
}
