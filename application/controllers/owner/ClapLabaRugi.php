<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapLabaRugi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function lrIndex()
    {
        $data["judul"] = "Lapaoran Laba-Rugi";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlabaRugi', $data);
    }


    public function lrReg()
    {
        $data["judul"] = "Laporan Laba Rugi";

        // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

        $sql_trx_jual_beli = "
        select sum(subtotal_jual) total_jual, sum(subtotal_beli) total_beli from (
            SELECT 
                     harga_jual,
                                harga_beli,   
                     jum_bar,   
                     (harga_jual * jum_bar) as subtotal_jual,
                                (harga_beli * jum_bar) as subtotal_beli
                FROM  trans_jual 
               WHERE ( ( trans_jual.tanggal_nota >= $tgl1 ) AND  
                     ( trans_jual.tanggal_nota <= $tgl2 ) )    
            ) YY
        ";

        $sql_potongan = "
            select sum(tot_potongan) total_pot from (
            SELECT 
                     tot_potongan
                FROM  trans_jual 
               WHERE  ( trans_jual.tanggal_nota BETWEEN $tgl1  AND  $tgl2 )   and tot_potongan > 0  
            GROUP BY id_nota
            ) YY
        ";
        $sql_pendapatan_lain = "
            SELECT (SELECT 
                    sum(nominal ) pendapatan
            FROM pos_biaya_lain  
            WHERE ( tgl_input BETWEEN $tgl1  AND  
            $tgl2 ) AND kat = 1 ) as pendapatan, (SELECT 
                    sum(nominal ) pendapatan
            FROM pos_biaya_lain  
            WHERE ( tgl_input BETWEEN $tgl1  AND  
            $tgl2 ) AND kat = 2 ) as pengeluaran   

        ";
        // // echo $sql;
        // // return;
        $data["tgl1_ori"] = $this->input->post("tgl1");
        $data["tgl2_ori"] = $this->input->post("tgl2");
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;

        $data["trx_jual_beli"] =  $this->db->query($sql_trx_jual_beli)->row_array();
        $data["tot_potongan"] =  $this->db->query($sql_potongan)->row_array();
        $data["trx_lain"] =  $this->db->query($sql_pendapatan_lain)->row_array();
        // print_r($data["trx_lain"]);
        // return;
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlabaRugi', $data);
    }
}
    
    /* End of file Login.php */




// // <!-- total potongan -->
