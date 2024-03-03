<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }

    public function index()
    {
        $data["judul"] = "Home";
        $data["tes"] = 0;
        // $this->load->view("owner/Tmp_navbar_top", $data);
        // $this->load->view("owner/Tmp_side_menu", $data);
        // $this->load->view('owner/Vhome', $data);
        // $this->load->view("owner/Tmp_navbar_top", $data);
        // $this->load->view("owner/Tmp_side_menu", $data);
        $this->load->view('owner/Vhome', $data);
    }

    public function cariBarang()
    {
        $data["judul"] = "Cari Barang";

        $this->load->view('karyw/Vhome', $data);
    }
}
    
    /* End of file Login.php */
