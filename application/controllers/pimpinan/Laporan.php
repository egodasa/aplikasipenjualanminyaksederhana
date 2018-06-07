<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

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
        $this->cekLogin('pimpinan');
        $this->db->query("set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
    }
	public function index()
	{
			
		$data['transaksi'] = $this->db->get('transaksi')->result();
			
		echo $this->view('pimpinan/laporan/index', $data);
	}
	public function harian()
	{
		$data['hari'] = date('d');
		if($this->input->get('hari')){
			$data['hari'] = $this->input->get('hari');
		}
		$data['daftar_hari'] = $this->db->query("select day(tgl_pembelian) as hari from transaksi where year(tgl_pembelian) = year(now()) and month(tgl_pembelian) = month(now()) group by day(tgl_pembelian)")->result();
		$data['transaksi'] = $this->db->query("select b.nama_produk,sum(a.jumlah_beli) as jumlah_beli, b.harga, sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where day(c.tgl_pembelian) = ".$data['hari']." and month(c.tgl_pembelian) = month(now()) and year(c.tgl_pembelian) = year(now()) group by a.id_produk;")->result();
		echo $this->view('pimpinan/laporan/harian', $data);
	}
	
	public function bulanan()
	{
		$data['bulan'] = date('m');
		if($this->input->get('bulan')){
			$data['bulan'] = $this->input->get('bulan');
		}
		$data['daftar_bulan'] = $this->db->query("select month(tgl_pembelian) as bulan, monthname(tgl_pembelian) as nm_bulan from transaksi where year(tgl_pembelian) = year(now()) group by month(tgl_pembelian)")->result();
		$data['transaksi'] = $this->db->query("select day(c.tgl_pembelian) as tgl_pembelian,sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where month(c.tgl_pembelian) = ".$data['bulan']." and year(c.tgl_pembelian) = year(now()) group by c.id_transaksi;")->result();
		echo $this->view('pimpinan/laporan/bulanan', $data);
	}
	
	public function tahunan()
	{
		$data['tahun'] = date('Y');
		if($this->input->get('tahun')){
			$data['tahun'] = $this->input->get('tahun');
		}
		$data['daftar_tahun'] = $this->db->query("select year(tgl_pembelian) as tahun from transaksi where year(tgl_pembelian) = year(now()) group by year(tgl_pembelian)")->result();
		$data['transaksi'] = $this->db->query("select monthname(c.tgl_pembelian) as tgl_pembelian,sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where year(c.tgl_pembelian) = ".$data['tahun']." group by monthname(c.id_transaksi)")->result();
		echo $this->view('pimpinan/laporan/tahunan', $data);		
		
	}
	public function produksi()
	{
		$data['produksi'] = $this->db->query("select a.nama_produk,b.jumlah from produk a join produksi b on a.id_produk = b.id_produk where month(waktu) between month(now()) - 3 and month(now())")->result();
		echo $this->view('pimpinan/laporan/produksi', $data);	
	}
	
	public function stok()
	{
		$data['produk'] = $this->db->query("select nama_produk,stok from produk")->result();
		echo $this->view('pimpinan/laporan/stok', $data);
	}
	
	public function detail($id)
	{
		$data['detail'] = $this->db->where('id_transaksi', $id)->get('transaksi')->row();
        $data['produk_beli'] = $this->db->query("select a.nama_produk,a.harga,a.stok,a.status_produk,b.* from produk a inner join detail_transaksi b on a.id_produk = b.id_produk where b.id_transaksi = '".$id."'")->result();
		echo $this->view('pimpinan/laporan/detail', $data);
	}
	public function cetak($waktu)
	{
		switch($waktu){
			case "harian":
			$data['hari'] = date('d');
			if($this->input->get('hari')){
				$data['hari'] = $this->input->get('hari');
			}
				$data['transaksi'] = $this->db->query("select b.nama_produk,sum(a.jumlah_beli) as jumlah_beli, b.harga, sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where day(c.tgl_pembelian) = ".$data['hari']." group by a.id_produk;")->result();
				$html= $this->view('pimpinan/cetak/harian', $data);
			break;
			case "bulanan":
			$data['bulan'] = date('m');
			if($this->input->get('bulan')){
				$data['bulan'] = $this->input->get('bulan');
			}
			$data['nm_bulan'] = $this->angkaKeBulan($data['bulan']);
				$data['transaksi'] = $this->db->query("select day(c.tgl_pembelian) as tgl_pembelian,sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where month(c.tgl_pembelian) = ".$data['bulan']." and year(c.tgl_pembelian) = year(now()) group by c.id_transaksi;")->result();
				$html= $this->view('pimpinan/cetak/bulanan', $data);
			break;
			case "tahunan":
			$data['tahun'] = date('Y');
			if($this->input->get('tahun')){
				$data['tahun'] = $this->input->get('tahun');
			}
                $data['transaksi'] = $this->db->query("select monthname(c.tgl_pembelian) as tgl_pembelian,sum(a.jumlah_beli*b.harga) as total from detail_transaksi a join produk b on a.id_produk = b.id_produk right join transaksi c on a.id_transaksi = c.id_transaksi where year(c.tgl_pembelian) = ".$data['tahun']." group by monthname(c.id_transaksi)")->result();
				$html= $this->view('pimpinan/cetak/tahunan', $data);
			break;
			case "produksi":
				$data['produksi'] = $this->db->query("select a.nama_produk,b.jumlah from produk a join produksi b on a.id_produk = b.id_produk where month(waktu) between month(now()) - 3 and month(now())")->result();
				$html= $this->view('pimpinan/cetak/produksi', $data);	
			break;
			case "stok" :
				$data['stok'] = $this->db->query("select nama_produk,stok from produk")->result();
				$html = $this->view('pimpinan/cetak/stok', $data);
			break;
		}
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
