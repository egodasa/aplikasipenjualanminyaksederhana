<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function index()
    {
        $data['produk'] = $this->db->query("select a.*, b.jenis from produk a inner join jenis_produk b on a.id_jenis_produk = b.id_jenis_produk")->result();
		$html = $this->view('laporan', $data);
        $mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}
