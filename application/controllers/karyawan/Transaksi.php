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
        $this->cekLogin('karyawan');
    }
	public function index()
	{
        $this->load->database();
        $data['transaksi'] = $this->db->get('transaksi')->result();
		echo $this->view('karyawan/transaksi/index', $data);
	}
	public function hapus()
	{
        if($this->input->post()){
            $data = $this->input->post();
            $sisa = $this->db->select('stok')->where('id_produk', $data['id_produk'])->get('produk')->row();
            $this->db->where('id_produk', $data['id_produk'])->update('produk',['stok'=> $sisa->stok + $data['jumlah_beli']]);
            $this->db->where('id_tmp', $data['id_tmp'])->delete('beli_tmp');
        }
        redirect('karyawan/transaksi/tambah');
	}
	public function tambah()
	{
        if(!isset($_SESSION['id_transaksi'])){
            $_SESSION['id_transaksi'] = microtime(TRUE)*10000;
            $_SESSION['produk_beli'] = [];
            $_SESSION['nama_pemesan'] = null;
        }
		if($this->input->post()){
			$data = $this->input->post();
            $_SESSION['nama_pemesan'] = $data['nama_pemesan'];
            $sisa = $this->db->select('stok')->where('id_produk', $data['id_produk'])->get('produk')->row();
            if(($sisa->stok - $data['jumlah_beli']) < 0){
                //Pesan error stok kurang 
            }else{
                ///Tambah produk yang dibeli ke beli_tmp
                $this->db->insert('beli_tmp', ['id_transaksi'=> $_SESSION['id_transaksi'],'id_produk'=> $data['id_produk'], 'jumlah_beli' => $data['jumlah_beli']]);
                //Pengurangan stok barang
                $this->db->where('id_produk', $data['id_produk'])->update('produk',['stok'=> $sisa->stok - $data['jumlah_beli']]);
            }
		}else{
			$data['produk'] = $this->db->get('produk')->result();
		}
        $data['produk_beli'] = $this->db->query("select a.nama_produk,a.harga,a.stok,a.status_produk,b.* from produk a inner join beli_tmp b on a.id_produk = b.id_produk where b.id_transaksi = '".$_SESSION['id_transaksi']."'")->result();
        $data['produk'] = $this->db->where('stok <>', 0)->get('produk')->result();
        echo $this->view('karyawan/transaksi/tambah', $data);
    }
    public function reset(){
        $this->db->where('id_transaksi', $_SESSION['id_transaksi'])->delete('beli_tmp');
        $_SESSION['id_transaksi'] = microtime(TRUE)*10000;
        $_SESSION['produk_beli'] = [];
        $_SESSION['nama_pemesan'] = null;
        redirect('karyawan/transaksi/tambah');
    }
    public function simpan(){
        $produk = $this->db->query("select a.nama_produk,a.harga,b.* from produk a inner join beli_tmp b on a.id_produk = b.id_produk where b.id_transaksi = '".$_SESSION['id_transaksi']."'")->result();
        if(!empty($produk)){
            $this->db->insert('transaksi', ['id_transaksi'=> $_SESSION['id_transaksi'], 'nama_pemesan'=> $_SESSION['nama_pemesan']]);
            foreach($produk as $p){
                $this->db->insert('detail_transaksi', ['id_transaksi'=> $p->id_transaksi,'id_produk'=> $p->id_produk, 'jumlah_beli' => $p->jumlah_beli]);
            }
            $this->reset();
        }else{
            redirect('transaksi');
        }
    }
	public function detail($id)
	{
		$data['detail'] = $this->db->where('id_transaksi', $id)->get('transaksi')->row();
        $data['produk_beli'] = $this->db->query("select a.nama_produk,a.harga,a.stok,a.status_produk,b.* from produk a inner join detail_transaksi b on a.id_produk = b.id_produk where b.id_transaksi = '".$id."'")->result();
		echo $this->view('karyawan/transaksi/detail', $data);
	}
    public function faktur($id)
    {
        $data['detail'] = $this->db->where('id_transaksi', $id)->get('transaksi')->row();
        $data['produk_beli'] = $this->db->query("select a.nama_produk,a.harga,a.stok,a.status_produk,b.* from produk a inner join detail_transaksi b on a.id_produk = b.id_produk where b.id_transaksi = '".$id."'")->result();
        $html = $this->view('karyawan/transaksi/faktur', $data);
        $mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
    public function simpancetak()
    {
        $id = $_SESSION['id_transaksi'];
        $produk = $this->db->query("select a.nama_produk,a.harga,b.* from produk a inner join beli_tmp b on a.id_produk = b.id_produk where b.id_transaksi = '".$id."'")->result();
        $this->db->insert('transaksi', ['id_transaksi'=> $_SESSION['id_transaksi'], 'nama_pemesan'=> $_SESSION['nama_pemesan']]);
        foreach($produk as $p){
            $this->db->insert('detail_transaksi', ['id_transaksi'=> $p->id_transaksi,'id_produk'=> $p->id_produk, 'jumlah_beli' => $p->jumlah_beli]);
        }
        $this->db->where('id_transaksi', $_SESSION['id_transaksi'])->delete('beli_tmp');
        $_SESSION['id_transaksi'] = microtime(TRUE)*10000;
        $_SESSION['produk_beli'] = [];
        $_SESSION['nama_pemesan'] = null;
        $this->faktur($id);
    }
}
