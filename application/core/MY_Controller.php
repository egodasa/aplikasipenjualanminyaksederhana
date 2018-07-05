<?php
use Philo\Blade\Blade; // Register blade template engine

class MY_Controller extends CI_Controller {
	protected $views = 'application/views'; //Lokasi views
	protected $cache = 'application/cache'; //lokasi cache views
	protected $blade;
	
    function __construct()
    {
        parent::__construct();
        $this->blade = new Blade($this->views, $this->cache);  //buat objek blade
		//setlocale(LC_TIME,'id_ID');
    }
    public function view($name, $data = []){
		return $this->blade->view()->make($name, $data)->render();
	}
    public function cekLogin($jenis)
    {
        if(!isset($_SESSION['username'])){
            redirect('login');
        }else{
            if($_SESSION['jenis_user'] != $jenis){
                switch($_SESSION['jenis_user']){
                    case "admin": 
                        redirect("admin");
                        break;
                    case "karyawan": 
                        redirect("karyawan/transaksi");
                        break;
                    case "pimpinan": 
                        redirect("pimpinan/laporan");
                        break;
                    default : redirect('login'); 
                }
            }
        }
    }
	public function angkaKeBulan($angka)
	{
		switch($angka){
			case 1 : return "Januari";
				break;
			case 2 : return "Februari";
				break;
			case 3 : return "Maret";
				break;
			case 4 : return "April";
				break;
			case 5 : return "Mei";
				break;
			case 6 : return "Juni";
				break;
			case 7 : return "Juli";
				break;
			case 8 : return "Agustus";
				break;
			case 9 : return "September";
				break;
			case 10 : return "Oktober";
				break;
			case 11 : return "November";
				break;
			case 12 : return "Desember";
				break;
		}
	}
}
