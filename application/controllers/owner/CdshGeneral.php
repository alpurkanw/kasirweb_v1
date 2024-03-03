<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CdshGeneral extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }

    public function index()
    {
        $data["judul"] = "Dashboard Penjualan";

        $sql = "";
        $today = date('Ymd');
        $ret = "";


        // query omset per user
        $sql = "select sum(total_jual) as grand_total, id_user,nama_user from (
            SELECT 
            (trx.jum_bar * trx.harga_jual ) as total_jual, id_user,nama_user
            FROM trans_jual trx 
            WHERE  trx.tanggal_nota  = $today ) AA group by id_user,nama_user order by grand_total desc
        ";
        // echo $sql;
        // return;
        $data["omset_perUser"] = (count($this->db->query($sql)->result())) ? $this->db->query($sql)->result() : 0;



        $sql_trx_jual_beli = "
        select sum(subtotal_jual) total_jual, sum(subtotal_beli) total_beli from (
            SELECT 
                     harga_jual,
                                harga_beli,   
                     jum_bar,   
                     (harga_jual * jum_bar) as subtotal_jual,
                                (harga_beli * jum_bar) as subtotal_beli
                FROM  trans_jual 
               WHERE  trans_jual.tanggal_nota = $today     
            ) YY
        ";

        $sql_potongan = "
            select sum(tot_potongan) total_pot from (
            SELECT 
                     tot_potongan
                FROM  trans_jual 
               WHERE  trans_jual.tanggal_nota = $today   and tot_potongan > 0  
            GROUP BY id_nota
            ) YY
        ";

        $sql_pendapatan_lain = "
        SELECT (SELECT   sum(nominal ) pendapatan
        FROM pos_biaya_lain  
        WHERE ( tgl_input = $today   AND kat = 1 )) as pendapatan, 
        (SELECT   sum(nominal ) pendapatan
        FROM pos_biaya_lain  
        WHERE ( tgl_input = $today  AND kat = 2 )) as pengeluaran   

        ";
        $sql_trx_by_jenistran = "
            select sum(subtotal_jual) total_jual, sum(subtotal_beli) total_beli, jenis_tran from (
            SELECT 
                     harga_jual,
                                harga_beli,   
                     jum_bar,   
                     (harga_jual * jum_bar) as subtotal_jual,
                                (harga_beli * jum_bar) as subtotal_beli, jenis_tran
                FROM  trans_jual 
               WHERE  trans_jual.tanggal_nota = $today     
            ) YY GROUP BY jenis_tran
        ";

        $ret_trx_by_jenistran = $this->db->query($sql_trx_by_jenistran)->result();

        $data["trx_jual_beli"] =  !is_null($this->db->query($sql_trx_jual_beli)->row_array()) ? $this->db->query($sql_trx_jual_beli)->row_array() : 0;
        $data["tot_potongan"] =   !is_null($this->db->query($sql_potongan)->row_array())  ? $this->db->query($sql_potongan)->row_array() : 0;
        $data["trx_lain"] = !is_null($this->db->query($sql_pendapatan_lain)->row_array()) ? $this->db->query($sql_pendapatan_lain)->row_array() : 0;
        $data["trx_by_jenistran"] = !is_null($ret_trx_by_jenistran) ? $ret_trx_by_jenistran : 0;


        $query_total_piutang = "
        SELECT sum(sisa) as tot_piutang FROM `pos_mas_piutang` where jns_hutang_piutang = 2 AND st_piutang_hutang = 2;
        ";
        $data["ret_total_piutang"]  = $this->db->query($query_total_piutang)->result();
        
        $query_total_piutang_today = "
        SELECT sum(sisa) as tot_piutang FROM `pos_mas_piutang` where jns_hutang_piutang = 2 AND st_piutang_hutang = 2 
        and tgl_inp = $today ;
        ";
        $data["piutang_today"]  = $this->db->query($query_total_piutang_today)->result(); 
        
        $query_trx_piutang_today = "
        SELECT sum(nom_bayar) as tot_bayar FROM `pos_trans_bayar_hutang_piutang` where jenis = 2 
        AND tgl_bayar = $today;
        ";
        $data["trx_piutang_today"]  = $this->db->query($query_trx_piutang_today)->result();


        $this->load->view('owner/VdshGeneral', $data);
    }
}
    
    /* End of file Login.php */
