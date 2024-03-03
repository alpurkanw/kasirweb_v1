<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cstok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->library('form_validation');
        // $this->sqlsvr = $this->load->database("sqlsvr44", TRUE);
    }

    public function hargaModal($id = "")
    {
        $data["judul"] = "List Barang";
        $data["page"] = "hargaModal";
        $kategori = $this->input->post("kategori");
        $sedia = $this->input->post("sedia");

        // echo  $sedia . $kategori;
        // return;

        // echo "tes";
        if ($id == "1") {


            $sql = "";
            if ($sedia == "semua") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang  ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Semua";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori' ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Semua";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "ready") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok > 0  ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Ready";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok > 0  ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Ready";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "dikit") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok > 0  and jum_stok <= lmt_min ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Sedikit";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok > 0 and jum_stok <= lmt_min  ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Sedikit";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "habis") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok = 0   ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Kosong";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok = 0   ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Kosong";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
        } else {
            $data["bars"] = [];
        }

        $data["kategs"] = $this->db->get('pos_kategori_bar')->result();
        // echo count($data["bars"]);
        $this->load->view('owner/Vstok', $data);
    }

    public function hargaJual($id = "")
    {
        $data["judul"] = "List Barang";
        $data["page"] = "hargaJual";
        $kategori = $this->input->post("kategori");
        $sedia = $this->input->post("sedia");

        // echo  $sedia . $kategori;
        // return;

        // echo "tes";
        if ($id == "1") {


            $sql = "";
            if ($sedia == "semua") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang  ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Semua";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori' ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Semua";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "ready") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok > 0  ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Ready";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok > 0  ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Ready";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "dikit") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok > 0  and jum_stok <= lmt_min ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Sedikit";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok > 0 and jum_stok <= lmt_min  ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Sedikit";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
            if ($sedia == "habis") {
                if ($kategori == "semua") {
                    $sql = "select * from pos_barang where jum_stok = 0   ";
                    $data["kategori"] = "Semua Kategori";
                    $data["jum_stok"] = "Kosong";
                } else {
                    $sql = "select * from pos_barang  where kategori = '$kategori'  and jum_stok = 0   ";
                    $data["kategori"] = $kategori;
                    $data["jum_stok"] = "Kosong";
                }
                $data["bars"] =  $this->db->query($sql)->result();
            }
        } else {
            $data["bars"] = [];
        }

        $data["kategs"] = $this->db->get('pos_kategori_bar')->result();
        // echo count($data["bars"]);
        $this->load->view('owner/Vstok', $data);
    }

    public function reqBar()
    {
        // echo "tes";
        $data["judul"] = "List Barang";
        $data["show"] = "form_tambah";

        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/Vkateg', $data);
    }
}
