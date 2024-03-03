<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CdshPenj extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }

    public function index()
    {
        $data["judul"] = "Dashboard Penjualan";

        if ($this->input->post("tgl1") == "") {
            $tgl1 = date("Ymd");
            $tgl2 = date("Ymd");
        } else {
            $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
            $tgl2 = str_replace("-", "", $this->input->post("tgl2"));
        }
        $today = date("Ymd");
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;


        $sql = "select sum(total_jual) as grand_total, id_user,nama_user from (
            SELECT 
            (trx.jum_bar * trx.harga_jual ) as total_jual, id_user,nama_user
            FROM trans_jual trx 
            WHERE  trx.tanggal_nota between  $tgl1  AND  $tgl2 ) AA group by id_user,nama_user order by grand_total desc
        ";
        // echo $sql;
        // return;
        $data["omset_perUser"] = (count($this->db->query($sql)->result())) ? $this->db->query($sql)->result() : 0;


        // $sql = "SELECT tanggal_nota,  sum(tot_potongan) as nompot from (
        //     select  tanggal_nota, tot_potongan from trans_jual where tot_potongan <> 0 and  trans_jual.tanggal_nota BETWEEN $tgl1 and $tgl2 GROUP BY id_nota,tanggal_nota
        //     ) tabel 
        // ";
        // // echo $sql;
        // // return;
        // $data["tot_potongan"] = ($this->db->query($sql)->result()[0]->nompot) ? $this->db->query($sql)->result()[0]->nompot : 0;



        // $sql = "
        // SELECT left(tanggal_nota,6) as thnbln, count( DISTINCT id_nota) as jumnota, sum(tot_beli) as totbeli, sum(tot_jual) as totjual, (sum(tot_jual) - sum(tot_beli)) as margin, ((sum(tot_jual) - sum(tot_beli)) / count( DISTINCT id_nota) ) margin_pernota from (
        //     select tanggal_nota, jum_bar, id_nota, harga_beli, harga_jual, (jum_bar * harga_beli) as tot_beli, (jum_bar * harga_jual) as tot_jual from trans_jual where left(tanggal_nota,4) = " . substr($tgl1, 0, 4) . " 
        //     ) as tabelA GROUP BY left(tanggal_nota,6)
        // ";
        // // echo $sql;
        // // return;
        // $data["omsetPer_M_in_Y"] =  $this->db->query($sql)->result();


        // $sql = "
        //         SELECT tanggal_nota, count( DISTINCT id_nota) as jumnota, sum(tot_beli) as totbeli, sum(tot_jual) as totjual, (sum(tot_jual) - sum(tot_beli)) as margin, ((sum(tot_jual) - sum(tot_beli)) / count( DISTINCT id_nota) ) margin_pernota from (
        //     select tanggal_nota, id_nota, jum_bar, harga_beli, harga_jual, (jum_bar * harga_beli) as tot_beli, (jum_bar * harga_jual) as tot_jual from trans_jual where left(trans_jual.tanggal_nota,6) = " . substr($tgl1, 0, 6) . "  
        //     ) as tabelA GROUP BY tanggal_nota
        //         ";
        // // echo $sql;
        // // return;
        // $data["omsetPer_D_in_M"] =  $this->db->query($sql)->result();

        $this->load->view('owner/VdshPenj', $data);
    }
}
    
    /* End of file Login.php */
