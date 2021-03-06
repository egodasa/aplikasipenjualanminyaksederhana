<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('admin');
    }
	public function index()
	{
        $data['produk'] = $this->db->query("select a.*, b.jenis from produk a inner join jenis_produk b on a.id_jenis_produk = b.id_jenis_produk")->result();
		echo $this->view('admin/produk/index', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id_produk', $id)->delete('produk');
		redirect('admin/produk');
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('produk', $data);
			redirect('admin/produk');
		}else{
			$data['jenis_produk'] = $this->db->get('jenis_produk')->result();
			echo $this->view('admin/produk/tambah', $data);
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
            $produk = array(
                'nama_produk'   => $data['nama_produk'],
                'id_jenis_produk'   => $data['id_jenis_produk'],
                'stok'   => $data['stok'] + $data['stok_lama'],
                'harga'   => $data['harga']
            );
            $this->db->insert('produksi', array('id_produk' => $id, 'jumlah' => $data['stok']));
			$this->db->where('id_produk', $id)->update('produk', $produk);
			redirect('admin/produk');
		}else{
			$data['detail'] = $this->db->where('id_produk', $id)->get('produk')->row();
			$data['jenis_produk'] = $this->db->get('jenis_produk')->result();
			echo $this->view('admin/produk/edit', $data);
		}
	}
}
