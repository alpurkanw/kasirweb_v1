<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cpiutang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function list()
    {
        $data["judul"] = "Seluruh Piutang";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["piutangs"] = $this->db->get_where('pos_mas_piutang', ["jns_hutang_piutang" => 2])->result(); 
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/Vpiutang', $data);
    }


    public function showList()
    {
        $data["judul"] = "Laporan Pembelian";
        $st_piutang = $this->input->post("piutang");


        $data["page"] = "showdata";
       
        if($st_piutang == 1){
            $data["status_p"] = "Lunas";
            $data["piutangs"] = $this->db->get_where('pos_mas_piutang', ["jns_hutang_piutang" => 2, "st_piutang_hutang" => $st_piutang ])->result(); 

        }else if($st_piutang == 2){
            $data["status_p"] = "Belum Lunas";
            $data["piutangs"] = $this->db->get_where('pos_mas_piutang', ["jns_hutang_piutang" => 2, "st_piutang_hutang" => $st_piutang ])->result(); 
        }else{
            $data["status_p"] = "Semua Piutang";
            $data["piutangs"] = $this->db->get_where('pos_mas_piutang', ["jns_hutang_piutang" => 2 ])->result(); 
        }
        
       

        
        $this->load->view('owner/Vpiutang', $data);
    }


    public function DetailPerPiutang()
    {
        $no_nota_p = $this->input->get("no_nota_p");
        $data["judul"] = "Detail Piutang ";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        $data["ptgs"] = $this->db->get_where('pos_mas_piutang', ["no_nota" => $no_nota_p])->row_array();
        $data["ptg_bayars"] = $this->db->get_where('pos_trans_bayar_hutang_piutang', ["id_hutang_piutang" => $no_nota_p])->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/Vpiutang_detail', $data);
    }    
    public function lapTrxPiutang()
    {
        $data["judul"] = "Laporan Pemnbayaran Piutang ";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        //  // $userin = $_SESSION["id"];
        //  $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        //  $tgl2 = str_replace("-", "", $this->input->post("tgl2"));


        // $this->db->select('*');
        // $this->db->from('pos_trans_bayar_hutang_piutang');
        // $this->db->where('tgl_bayar BETWEEN '.$tgl1.' AND '.$tgl2);
        // $data["ptg_bayars"] = $this->db->get();


        // $data["ptg_bayars"] = $this->db->get_where('pos_trans_bayar_hutang_piutang', ["tgl_bayar" => $no_nota_p])->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/vLapTrxPiutang', $data);
    }

    public function lapTrxPiutangShowList()
    {
        $data["judul"] = "Laporan Pemnbayaran Piutang ";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "showdata";

        //  // $userin = $_SESSION["id"];
         $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
         $tgl2 = str_replace("-", "", $this->input->post("tgl2"));


        $this->db->select('*');
        $this->db->from('pos_trans_bayar_hutang_piutang');
        $this->db->where('jenis', 2);
        $this->db->where('tgl_bayar BETWEEN '.$tgl1.' AND '.$tgl2);
        $data["ptg_bayars"] = $this->db->get()->result();
        $data["tgl1_ori"] = $this->input->post("tgl1");
        $data["tgl2_ori"] = $this->input->post("tgl2");

        // print_r($data["ptg_bayars"]);
        
        // $data["ptg_bayars"] = $this->db->get_where('pos_trans_bayar_hutang_piutang', ["tgl_bayar" => $no_nota_p])->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/vLapTrxPiutang', $data);
    }
    // public function perUserReq()
    // {
    //     $data["judul"] = "Laporan Perlokasi";

    //     // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
    //     // print_r($lokasi);
    //     // return;

    //     $data["page"] = "showdata";
    //     // $userlok = $_SESSION["lokid"];

    //     // $userin = $_SESSION["id"];
    //     $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
    //     $tgl2 = str_replace("-", "", $this->input->post("tgl2"));
    //     $id_kasir = $this->input->post("id_kasir");
    //     $sql = "
    //             SELECT trx.id_nota,   
    //             trx.nama_barang,   
    //             trx.harga_jual,   
    //             trx.jum_bar,   
    //             trx.tot_potongan,   
    //             trx.tot_bayar,   
    //             trx.tot_kembalian,   
    //             trx.jenis_tran,   
    //             trx.total_harga,   
    //             trx.tanggal_nota,   
    //             trx.tot_sblm_pot,   
    //             trx.id_user,
    //             trx.nama_user,
    //             trx.id_cust,
    //             trx.nama_cust,   
    //             trx.kode_barang,   
    //             trx.harga_beli  
    //             FROM trans_jual trx 
    //             WHERE  ( trx.tanggal_nota >= $tgl1  AND trx.tanggal_nota <= $tgl2 )  AND 
    //             id_user = $id_kasir
    //     ";
    //     // // echo $sql;
    //     // // return;
    //     $data["trxs"] =  $this->db->query($sql)->result();

    //     $data["tgl1_ori"] = $this->input->post("tgl1");
    //     $data["tgl2_ori"] = $this->input->post("tgl2");
    //     $data["tgl1"] = $tgl1;
    //     $data["tgl2"] = $tgl2;

    //     $data["id_kasir"] = $id_kasir;

    //     $this->load->view('owner/VlapPenjPerUser', $data);
    // }
}
    
    /* End of file Login.php */
