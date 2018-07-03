<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

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
	function __construct()
    {
        parent::__construct();
        $this->cekLogin('admin');
    }
	public function index()
	{
        $this->load->database();
        $data['transaksi'] = $this->db->get('transaksi')->result();
		echo $this->view('admin/transaksi/index', $data);
	}
	
	public function detail($id)
	{
		$data['detail'] = $this->db->where('id_transaksi', $id)->get('transaksi')->row();
        $data['produk_beli'] = $this->db->query("select a.nama_produk,a.harga,a.stok,a.status_produk,b.* from produk a inner join detail_transaksi b on a.id_produk = b.id_produk where b.id_transaksi = '".$id."'")->result();
		echo $this->view('admin/transaksi/detail', $data);
		
	}
   
   
}
