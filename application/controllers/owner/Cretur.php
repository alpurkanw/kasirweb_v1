<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cretur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->library('MyGlobal');
    }

    public function retPenjIndex()
    {
        $data["judul"] = "Retur Penjualan";
        $data["show"] = "index";

        // $data["brgs"] = $this->db->get_where('tbl_barang', ["idlok" => $userlok])->result();

        $this->load->view('owner/Vretur', $data);
    }

    // owner/ClapPenj/pernotaDetail/" + idnota

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
    public function cekNota($id)
    {
        $noNota = $id;

        //         cek di transaksi pembayaran piutang 
        $qceknotapenjualan = "select count(*) jum from trans_jual where id_nota = '$noNota'
          ";
        $cekNotaPenj =  $this->db->query($qceknotapenjualan)->result_object();

        if ($cekNotaPenj[0]->jum == '0') {
            $pesan = '<div class="card  card-info">
                <div class="card-header "></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="text-danger font-weight-bold">Peringatan !!!</h2>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col text-center">
                            <p>Nota Penjualan :</p>
                            <h4 class="font-weight-bold">' . $noNota . '
                            <br>
                            TIDAK DITEMUKAN
                            </h4>
                            <br>
                            <a href="' . base_url("owner/Cretur/retPenjIndex") . '" class="btn btn-secondary">Kembali</a>

                        </div>
                    </div>
                </div>
                <div class="card-footer "></div>
            </div>';

            echo $pesan;
            return;

            // return;
        }



        //         cek di transaksi pembayaran piutang 
        $qceknotadiTrxPembPiutang = "
        SELECT count(*) jumlah FROM `pos_mas_piutang` where jns_hutang_piutang = 2 
        and st_piutang_hutang = 2
        and  no_nota = $noNota
    	 ";

        // echo $qceknotadiTrxPembPiutang;
        $jumlahTrxPembNota =  $this->db->query($qceknotadiTrxPembPiutang)->result_object();
        // echo $jumlahTrxPembNota[0]->jumlah;

        // echo $jumlahTrxPembNota[0]->jumlah;
        // return;

        if ($jumlahTrxPembNota[0]->jumlah == 0) {
            // $this->load->controller('ClapPenj');
            // <a href="' . base_url("owner/Cretur/prosesPembatalanPenj/$noNota") . '" class="btn btn-info btn_prosesBatal"
            echo '<div class="row mb-2">
                        <div class="col">
                        <a href="#" class="btn btn-info btn_prosesBatal" data-idnota = "' . $noNota . '"
                            onclick="return confirm(\'Anda Yakin akan membatalkan penjualan ini ?\')"  >Proses Batal Penjualan</a>        
                            <a href="' . base_url("owner/Cretur/retPenjIndex") . '" class="btn btn-secondary">Kembali</a>        
                        </div>
                    </div>
                    ';
            $this->pernotaDetail($noNota);
        } else {
            $pesan = '<div class="card  card-info">
                        <div class="card-header "></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <h2 class="text-danger font-weight-bold">Peringatan !!!</h2>
                                </div>
                            </div>
                            
                            <br>
                            <div class="row">
                                <div class="col text-center">
                                    <p>Nota Penjualan :</p>
                                    <h4 class="font-weight-bold">' . $noNota . '
                                    <br>
                                    Tidak bisa dibatalkan
                                    </h4>
                                    <br>
                                    <p>Karena sudah terdapat transaksi pembayaran piutangnya <br>
                                        silahkan batalkan terlebih dahulu seluruh pembayaran piutang terlebih dahulu.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer "></div>
                    </div>';

            echo $pesan;
        }
    }

    public function prosesPembatalanPenj($id_nota)
    {
        // select * from trans_jual where id_nota = $id_nota
        $tglnow = date('Ymd His');
        $idUser = $_SESSION["id_kar"];

        // kembalikan stok 
        $dataPenj =  $this->db->query("select * from trans_jual where id_nota = '$id_nota'")->result_object();
        foreach ($dataPenj as $key => $val) {
            $this->db->query("
                update pos_barang set jum_stok = jum_stok + $val->jum_bar
                where id = $val->kode_barang 
            ");
        }

        // insert ke tabel log pembataalan
        $insertBatalJual = "
                    insert into trans_jual_batal(
                        idbatal,
                        id_nota,
                        no_urut,
                        kode_barang,
                        nama_barang,
                        harga_beli,
                        harga_jual,
                        jum_bar,
                        tanggal_nota,
                        jam_nota,
                        tot_potongan,
                        tot_bayar,
                        tot_kembalian,
                        id_cust,
                        nama_cust,
                        id_user,
                        nama_user,
                        username,
                        id_sales,
                        nama_sales,
                        ket,
                        tipe_kepemilikan,
                        jenis_tran,
                        total_harga,
                        tot_sblm_pot,
                        f1,
                        f2,
                        tgl_batal,
                        userbatal

                    )
                    select 
                            '',
                            id_nota,
                            no_urut,
                            kode_barang,
                            nama_barang,
                            harga_beli,
                            harga_jual,
                            jum_bar,
                            tanggal_nota,
                            jam_nota,
                            tot_potongan,
                            tot_bayar,
                            tot_kembalian,
                            id_cust,
                            nama_cust,
                            id_user,
                            nama_user,
                            username,
                            id_sales,
                            nama_sales,
                            ket,
                            tipe_kepemilikan,
                            jenis_tran,
                            total_harga,
                            tot_sblm_pot,
                            f1,
                            f2,
                            '$tglnow',
                            $idUser
                    from trans_jual where id_nota = $id_nota 
        ";

        // echo 
        $this->db->query($insertBatalJual);
        // jika sukses masukan ke log ... delete penjualannya
        $ret = $this->db->affected_rows();
        if ($ret > 0) {

            $this->db->query("
                delete from trans_jual where id_nota = $id_nota 
            ");

            $retn = $this->db->affected_rows();
            if ($retn > 0) {
                $pesan = '<div class="card  card-info">
                        <div class="card-header "></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <h2 class="text-success font-weight-bold">PEMBATALAN SUKSES !!!</h2>
                                </div>
                            </div>
                            
                            <br>
                            <div class="row">
                                <div class="col text-center">
                                    <p>Nota Penjualan :</p>
                                    <h4 class="font-weight-bold">' . $id_nota . '
                                    <br>
                                    Sudah dibatalkan
                                    </h4>
                                    <br>
                                    <a href="' . base_url("owner/Cretur/retPenjIndex") . '" class="btn btn-secondary">Kembali</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer "></div>
                    </div>';

                echo $pesan;
            }
        } else {
            $pesan = '<div class="alert alert-danger py-1" role="alert">
                        Insert ke laporan pembatalan GAGAL  ' . $this->db->error()["message"] . '
                    </div>';

            echo $pesan;
        }
    }
}
    
    /* End of file Login.php */
