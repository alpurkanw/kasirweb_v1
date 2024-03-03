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
        $data["judul"] = "Home | Kasir";
        $this->load->view('kasir/Vhome', $data);
    }

    // public function cariBar()
    // {
    //     $data["judul"] = "Cari Barang";
    //     $data["result"] = "hasicari";
    //     $keyw = $this->input->post("keywordnya");
    //     // $data["brgs"] = $this->brg->cari_or($data["keywordnya"])->result();
    //     $sql = "SELECT id,   
    //             namabar,   
    //             jum_stok,   
    //             satuan,   
    //             lmt_min,   
    //             harga_jual,   
    //             harga_beli,   
    //             hrgjualbawah,   
    //             hrgjualatas  
    //         FROM pos_barang   
    //             WHERE  ( ( id like '%" . $keyw . "%' ) or          
    //             ( namabar like '%" . $keyw . "%' ) or          
    //             ( id like '%" . $keyw . "%' ) ) 
    //             GROUP BY id";
    //     $data["keywordnya"] = $keyw;
    //     // print_r($data["brgs"]);
    //     // return;
    //     $data["brgs"] =  $this->db->query($sql)->result();
    //     $this->load->view('karyw/Vhome', $data);
    // }

    // public function cariBarOpenF()
    // {
    //     $data["judul"] = "Cari Barang";
    //     $data["result"] = "hasicari";
    //     $keyw = $this->input->post("keywordnya");
    //     // $data["brgs"] = $this->brg->cari_or($data["keywordnya"])->result();
    //     $sql = "SELECT id,   
    //             namabar,   
    //             jum_stok,   
    //             satuan,   
    //             lmt_min,   
    //             harga_jual,   
    //             harga_beli,   
    //             hrgjualbawah,   
    //             hrgjualatas  
    //         FROM pos_barang   
    //             WHERE  ( ( id like '%" . $keyw . "%' ) or          
    //             ( namabar like '%" . $keyw . "%' ) or          
    //             ( id like '%" . $keyw . "%' ) ) 
    //             GROUP BY id";
    //     $data["keywordnya"] = $keyw;
    //     // print_r($data["brgs"]);
    //     // return;
    //     $data["brgs"] =  $this->db->query($sql)->result();
    //     $this->load->view('karyw/Vhome', $data);
    // }
}
    
    /* End of file Login.php */
