<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

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
    }
	public function index()
	{
        if(isset($_SESSION['username'])){
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
            }
        }else{
            if($this->input->post()){
                $data = $this->input->post();
                $login = $this->db->where(array('username' => $data['username'],'password' => md5($data['password'])))->get('users')->row();
                if(!empty($login)){
                    $_SESSION['username'] = $login->username;
                    $_SESSION['jenis_user'] = $login->jenis_user;
                    if($login->jenis_user == "admin") redirect("admin");
                    else if($login->jenis_user == "karyawan") redirect("karyawan/transaksi");
                    else if($login->jenis_user == "pimpinan") redirect("pimpinan/laporan");
                    else redirect ("/");
                }else redirect ("/");
            }else{
                echo $this->view('login');
            }
        }
	}
    public function out(){
        unset($_SESSION['username']);
        unset($_SESSION['jenis_user']);
        redirect("/");
    }

}
