<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapPemb extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function Index()
    {
        $data["judul"] = "Lapaoran Pembelian";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlapPemb', $data);
    }


    public function Req()
    {
        $data["judul"] = "Laporan Pembelian";

        // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

        $sql = "
                SELECT 
                id_nota,
                tgl_beli,
                kode_barang,   
                nama_barang,   
                harga_beli,   
                jum_beli  
                FROM trans_beli 
                WHERE tgl_beli >= $tgl1  AND  
                tgl_beli <= $tgl2  
        ";
        // // echo $sql;
        // // return;
        $data["tgl1_ori"] = $this->input->post("tgl1");
        $data["tgl2_ori"] = $this->input->post("tgl2");
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;

        $data["trxs"] =  $this->db->query($sql)->result();
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlapPemb', $data);
    }


    public function perUserIndex()
    {
        $data["judul"] = "Lapaoran Penjualan Detail";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        $data["karys"] = $this->db->get_where('pos_karyawan', ["jabatan" => 3])->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlapPenjPerUser', $data);
    }

    public function perUserReq()
    {
        $data["judul"] = "Laporan Perlokasi";

        // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));
        $id_kasir = $this->input->post("id_kasir");
        $sql = "
                SELECT trx.id_nota,   
                trx.nama_barang,   
                trx.harga_jual,   
                trx.jum_bar,   
                trx.tot_potongan,   
                trx.tot_bayar,   
                trx.tot_kembalian,   
                trx.jenis_tran,   
                trx.total_harga,   
                trx.tanggal_nota,   
                trx.tot_sblm_pot,   
                trx.id_user,
                trx.nama_user,
                trx.id_cust,
                trx.nama_cust,   
                trx.kode_barang,   
                trx.harga_beli  
                FROM trans_jual trx 
                WHERE  ( trx.tanggal_nota >= $tgl1  AND trx.tanggal_nota <= $tgl2 )  AND 
                id_user = $id_kasir
        ";
        // // echo $sql;
        // // return;
        $data["trxs"] =  $this->db->query($sql)->result();

        $data["tgl1_ori"] = $this->input->post("tgl1");
        $data["tgl2_ori"] = $this->input->post("tgl2");
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;

        $data["id_kasir"] = $id_kasir;

        $this->load->view('owner/VlapPenjPerUser', $data);
    }
}
    
    /* End of file Login.php */
