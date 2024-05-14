<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cdo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->sqlsvr = $this->load->database("sqlsvr44", TRUE);
    }

    public function index()
    {
        // echo "tes";
        $data["judul"] = "List DO";
        $data["show"] = "index";

        $data["bars"] = $this->db->get('pos_barang')->result();
        $data["custs"] = $this->db->get('pos_customer')->result();
        $this->load->view('kasir/VOpenDo', $data);
    }

    public function detailDo($id)
    {
        // echo "tes";
        $data["judul"] = "Detail DO";

        $data["do"] = $this->db->get_where('do_tm_do', ["id" => $id])->result()[0];


        $sql = "
                SELECT * FROM do_trx_do where id 
        ";


        // $data["trxs"] =  $this->db->query($sql)->result();



        $data["trxdos"] = $this->db->get('do_trx_do')->result();
        $this->load->view('kasir/VdetailDo', $data);
    }


    public function doTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bars = $this->input->post("bars");
            $cust = $this->input->post("cust");


            $this->db->select_max('no_notado');
            $query = $this->db->get('do_tm_do');
            $result = $query->row();
            $max_id = $result->no_notado;
            // echo ($max_id + 1);
            // return;
            // $cust 
            // print_r($cust);
            // // echo $cust["nama"];

            // // $resp[""] = 
            // return;
            foreach ($bars as $key => $bar) {
                $data_insert = [
                    "idcust" => $cust["id"],
                    "namacust" => $cust["nama"],
                    "alamat" => $cust["alamat"],
                    "notelp" => $cust["notelp"],

                    "idbar" => $bar["idbar"],
                    "namabar" => $bar["namabar"],
                    "qty" => $bar["qty"],
                    "harga_jual" => $bar["harga_jual"],
                    "harga_beli" => $bar["harga_beli"],
                    "tglinp" => date("Ymd"),
                    "userinp" => $_SESSION["username"],
                    "no_notado" => ($max_id + 1)

                ];


                $this->db->insert('do_tm_do', $data_insert);
            }


            // $ret = $this->db->affected_rows();


            // Contoh pemrosesan (misalnya, mengirimkan data kembali ke JavaScript dalam format JSON)
            $response = array('status' => 'sukses', 'pesan' => "Data berhasil Diinsert");
            echo json_encode($response);
        } else {
            // Tangani kasus lain jika diperlukan
            echo "Permintaan tidak valid";
        }
    }

    public function allDo()
    {
        // echo "tes";
        $data["judul"] = "List DO";
        $data["show"] = "index";

        $data["dos"] = $this->db->get('do_tm_do')->result();
        $this->load->view('kasir/VallDo', $data);
    }

    public function ambilDo()
    {

        // print_r($this->input->post());
        // return;
        $data = $this->input->post();
        if ($data["jum_minta"] <= $data["qty_sisah"]) {
            // echo "ok";

            $data_insert = [

                "iddo" => $data["id"],
                "kodebar" => $data["namabar"],
                "namabar" => $data["namabar"],
                "qty_sisah_sebelum" => $data["qty_sisah"],
                "qty_minta" => $data["jum_minta"],
                "qty_sisah_sekarang" => ($data["qty_sisah"] - $data["jum_minta"]),
                // "harga" => $data["harga"],
                "tglinp" => date('Ymd'),
                "userinput" => $_SESSION["username"]

            ];
            $ret = $this->db->insert('do_trx_do', $data_insert);


            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    TRansaksi DO Sudah Berhasil
                                </div>'
                );
                redirect("kasir/Cdo/detailDo/" . $data["id"]);
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data GAGAL ditambah, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("kasir/detailDo");
                // return;
            }
        }
        // return;
        // // echo "tes";
        // $data["judul"] = "List DO";
        // $data["show"] = "index";

        // $data["dos"] = $this->db->get('do_tm_do')->result();
        // $this->load->view('kasir/VallDo', $data);
    }
}
