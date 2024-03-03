<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapPenj extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function detailIndex()
    {
        $data["judul"] = "Lapaoran Penjualan Detail";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlapPenjDetail', $data);
    }
    public function perNotaIndex()
    {
        $data["judul"] = "Lapaoran Penjualan Per Nota";
        // $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('owner/VlapPenjPerNota', $data);
    }


    public function detailReq()
    {
        $data["judul"] = "Laporan Penjualan Detail";

        // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

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
                trx.id_cust,
                trx.nama_cust,   
                trx.kode_barang,   
                trx.harga_beli  
                FROM trans_jual trx 
                WHERE ( ( trx.tanggal_nota >= $tgl1 ) AND  
                ( trx.tanggal_nota <= $tgl2 ) ) 
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
        $this->load->view('owner/VlapPenjDetail', $data);
    }
    public function perNotaReq()
    {
        $data["judul"] = "Laporan Penjualan PerNota";

        // $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

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
                trx.id_cust,
                trx.nama_cust,   
                trx.kode_barang,   
                trx.harga_beli  
                FROM trans_jual trx 

                WHERE ( ( trx.tanggal_nota >= $tgl1 ) AND  
                ( trx.tanggal_nota <= $tgl2 ) ) group by trx.id_nota
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
        $this->load->view('owner/VlapPenjPerNota', $data);
    }
    public function pernotaDetail($id)
    {

        // $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        // $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

        $sql = "
                SELECT *
                FROM trans_jual 
                WHERE id_nota = $id
        ";
        // echo $sql;
        // return;
        $nota =  $this->db->query($sql)->result_array();

        $sql_cust = "
        SELECT * 
        FROM pos_customer  

        WHERE id = " . $nota[0]["id_cust"];

        $cust =  $this->db->query($sql_cust)->result_array();

        // echo $rows;
        // echo $nota[0]["id_cust"];
        // print_r($cust);
        if (count($cust) == 0) {
            $cust[0]["id"] = "";
            $cust[0]["nama"] = "";
            $cust[0]["alamat"] = "";
            $cust[0]["nohp"] = "";
        }
        echo '<div class="card card-info shadow small">
                <div class="card-header">
                    <h3 class="card-title">Detail Nota</h3>
                </div>
                <div class="card-body ">
                    <div class="row border-1">
                        <div class="col">
                            <table class="text-sm ml-1">
                                <tr>
                                    <td>No Nota</td>
                                    <td>:</td>
                                    <td class="id_nota">' . $nota[0]["id_nota"] . '</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Nota</td>
                                    <td>:</td>
                                    <td class="tgl_nota">' . $nota[0]["tanggal_nota"] . '</td>
                                </tr>
                                <tr>
                                    <td>Jam Transaksi</td>
                                    <td>:</td>
                                    <td class="jam_nota">' . $nota[0]["jam_nota"] . '</td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td>:</td>
                                    <td class="user_nama">' . $nota[0]["nama_user"] . '</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col ">
                            <table class="w-100 text-center">
                                <tr>
                                    <td class="h5 text-bold ">Nota Penjualan</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col text-right pr-3">
                            <table class="w-100  ">
                                <tr>
                                    <td>' . NAMA_TOKO . ' </td>
                                </tr>
                                <tr>
                                    <td>' . ALAMAT_TOKO . '</td>
                                </tr>
                                <tr>
                                    <td class="id_namaCustomer">' . $cust[0]["id"] . '|' . $cust[0]["nama"] . '</td>
                                </tr>
                                <tr>
                                    <td class="alamat_customer">' . $cust[0]["alamat"] . ' | ' . $cust[0]["nohp"] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>';

        echo '
        
                    
                
            <table class="table table-head-fixed table-bordered  my-2 nota_list">
                    <thead>
                        <tr class="m-1 p-1 ">
                            <th class="m-1 p-1 ">No Urut</th>
                            <th class="m-1 p-1">Kode-Nama Barang</th>
                            <th class=" m-1 p-1 text-center">Qty</th>
                            <th class="text-right m-1 p-1">Harga Jual</th>
                            <th class="text-right m-1 p-1">Subtotal</th>
                        </tr>
                    </thead>
                <tbody>';
        $no = 1;
        foreach ($nota as $key => $val) {
            echo  '
                            <tr class="m-0 p-0 ">
                                <td class="m-0 p-0 text-center">' . $no . '</td>
                                <td class="m-0 p-0">' . $val["kode_barang"] . "-" . $val["nama_barang"] . '</td>
                                <td class="m-0 p-0 text-center">' . $val["jum_bar"] . '</td>
                                <td class="m-0 p-0 text-right">' . number_format($val["harga_jual"])  . '</td>
                                <td class="m-0 p-0 text-right">' . number_format(intval($val["harga_jual"]) * intval($val["jum_bar"])) . '</td>
                            </tr>
                            ';
            $no++;
        }
        echo '               </tbody>
                    </table>
            ';
        echo '
                        <div class="row ">
                            <div class="col">
                                <table class="ml-1">
                                    <tr>
                                        <td>Keterangan : </td>
                                    </tr>
                                    <tr>
                                        <td><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Barang Diterima Tanggal:.......... </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-7 text-right">
                                <table class="w-100 ">
                                    <tr>
                                        <td>
                                            <table class=" w-100  text-sm">
                                                <tr>

                                                    <td>kembalian</td>
                                                    <td>Rp</td>
                                                    <td class="tot_kembalian">' . number_format($nota[0]["tot_bayar"] -  $nota[0]["total_harga"]) . '</td>
                                                    <td>Total</td>
                                                    <td>Rp</td>
                                                    <td class="tot_tagihan">' . number_format($nota[0]["total_harga"]) . '</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>

                                                    <td>Potongan</td>
                                                    <td>Rp </td>
                                                    <td class="tot_potngan">' . number_format($nota[0]["tot_potongan"]) . '</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                    <td>Bayar</td>
                                                    <td>Rp</td>
                                                    <td class="tot_bayar">' . number_format($nota[0]["tot_bayar"]) . '</td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <table class="w-100 text-sm ml-1 " >
                                    <tr>
                                        <td>
                                            -
                                        </td>
                                        <td>
                                            Barang tersebut telah dikirim dalam keadaan baik dan cukup
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            -
                                        </td>
                                        <td>
                                            Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan tanpa persetujuan kami
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Barang Diterima Tanggal : </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-6 text-center">
                                <table class=" w-100  text-sm">
                                    <tr>
                                        <td>
                                            Penerima
                                            <br><br> (___________) <br>
                                            Nama Jelas
                                        </td>
                                        <td>

                                            Disetujui
                                            <br><br> (___________) <br>
                                            Nama Jelas
                                        </td>
                                        <td>

                                            Pengirim
                                            <br><br> (___________) <br>
                                            Nama Jelas
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                ';


        // echo $card;
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
