<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyGlobal
{
    // protected $CI;

    // public function __construct()
    // {
    //     $this->CI = &get_instance();
    //     $this->CI->load->database(); // Memuat library database CodeIgniter
    // }

    // public function getDataFromDatabase($table, $where = array())
    // {
    //     if (!empty($where)) {
    //         $this->CI->db->where($where);
    //     }

    //     $query = $this->CI->db->get($table);
    //     return $query->result();
    // }





    public function tes($id)
    {
        $sql = "
                SELECT *
                FROM trans_jual 
                WHERE id_nota = $id
        ";
        echo $id . "tes";
        // echo $sql;
        // return;
        $nota =  $this->db->query($sql)->result_array();
        print_r($nota);
    }

    // public function nota($id)
    // {

    //     $ins = get_instance();

    //     $sql = "
    //             SELECT *
    //             FROM trans_jual 
    //             WHERE id_nota = $id
    //     ";
    //     // echo $sql;
    //     // return;
    //     $nota =  $this->db->query($sql)->result_array();

    //     $sql_cust = "
    //     SELECT * 
    //     FROM pos_customer  

    //     WHERE id = " . $nota[0]["id_cust"];

    //     $cust =  $this->db->query($sql_cust)->result_array();

    //     // echo $rows;
    //     // echo $nota[0]["id_cust"];
    //     // print_r($cust);
    //     if (count($cust) == 0) {
    //         $cust[0]["id"] = "";
    //         $cust[0]["nama"] = "";
    //         $cust[0]["alamat"] = "";
    //         $cust[0]["nohp"] = "";
    //     }
    //     echo '<div class="card card-info shadow small">
    //             <div class="card-header">
    //                 <h3 class="card-title">Detail Nota</h3>
    //             </div>
    //             <div class="card-body ">
    //                 <div class="row border-1">
    //                     <div class="col">
    //                         <table class="text-sm ml-1">
    //                             <tr>
    //                                 <td>No Nota</td>
    //                                 <td>:</td>
    //                                 <td class="id_nota">' . $nota[0]["id_nota"] . '</td>
    //                             </tr>
    //                             <tr>
    //                                 <td>Tanggal Nota</td>
    //                                 <td>:</td>
    //                                 <td class="tgl_nota">' . $nota[0]["tanggal_nota"] . '</td>
    //                             </tr>
    //                             <tr>
    //                                 <td>Jam Transaksi</td>
    //                                 <td>:</td>
    //                                 <td class="jam_nota">' . $nota[0]["jam_nota"] . '</td>
    //                             </tr>
    //                             <tr>
    //                                 <td>User</td>
    //                                 <td>:</td>
    //                                 <td class="user_nama">' . $nota[0]["nama_user"] . '</td>
    //                             </tr>
    //                         </table>
    //                     </div>
    //                     <div class="col ">
    //                         <table class="w-100 text-center">
    //                             <tr>
    //                                 <td class="h5 text-bold ">Nota Penjualan</td>
    //                             </tr>
    //                         </table>
    //                     </div>
    //                     <div class="col text-right pr-3">
    //                         <table class="w-100  ">
    //                             <tr>
    //                                 <td>' . NAMA_TOKO . ' </td>
    //                             </tr>
    //                             <tr>
    //                                 <td>' . ALAMAT_TOKO . '</td>
    //                             </tr>
    //                             <tr>
    //                                 <td class="id_namaCustomer">' . $cust[0]["id"] . '|' . $cust[0]["nama"] . '</td>
    //                             </tr>
    //                             <tr>
    //                                 <td class="alamat_customer">' . $cust[0]["alamat"] . ' | ' . $cust[0]["nohp"] . '</td>
    //                             </tr>
    //                         </table>
    //                     </div>
    //                 </div>';

    //     echo '



    //         <table class="table table-head-fixed table-bordered  my-2 nota_list">
    //                 <thead>
    //                     <tr class="m-1 p-1 ">
    //                         <th class="m-1 p-1 ">No Urut</th>
    //                         <th class="m-1 p-1">Kode-Nama Barang</th>
    //                         <th class=" m-1 p-1 text-center">Qty</th>
    //                         <th class="text-right m-1 p-1">Harga Jual</th>
    //                         <th class="text-right m-1 p-1">Subtotal</th>
    //                     </tr>
    //                 </thead>
    //             <tbody>';
    //     $no = 1;
    //     foreach ($nota as $key => $val) {
    //         echo  '
    //                         <tr class="m-0 p-0 ">
    //                             <td class="m-0 p-0 text-center">' . $no . '</td>
    //                             <td class="m-0 p-0">' . $val["nama_barang"] . '</td>
    //                             <td class="m-0 p-0 text-center">' . $val["jum_bar"] . '</td>
    //                             <td class="m-0 p-0 text-right">' . number_format($val["harga_jual"])  . '</td>
    //                             <td class="m-0 p-0 text-right">' . number_format(intval($val["harga_jual"]) * intval($val["jum_bar"])) . '</td>
    //                         </tr>
    //                         ';
    //         $no++;
    //     }
    //     echo '               </tbody>
    //                 </table>
    //         ';
    //     echo '
    //                     <div class="row ">
    //                         <div class="col">
    //                             <table class="ml-1">
    //                                 <tr>
    //                                     <td>Keterangan : </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td><br>
    //                                     </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Barang Diterima Tanggal:.......... </td>
    //                                 </tr>

    //                             </table>
    //                         </div>

    //                         <div class="col-7 text-right">
    //                             <table class="w-100 ">
    //                                 <tr>
    //                                     <td>
    //                                         <table class=" w-100  text-sm">
    //                                             <tr>

    //                                                 <td>kembalian</td>
    //                                                 <td>Rp</td>
    //                                                 <td class="tot_kembalian">' . number_format($nota[0]["tot_bayar"] -  $nota[0]["total_harga"]) . '</td>
    //                                                 <td>Total</td>
    //                                                 <td>Rp</td>
    //                                                 <td class="tot_tagihan">' . number_format($nota[0]["total_harga"]) . '</td>
    //                                             </tr>
    //                                             <tr>
    //                                                 <td></td>
    //                                                 <td> </td>
    //                                                 <td></td>

    //                                                 <td>Potongan</td>
    //                                                 <td>Rp </td>
    //                                                 <td class="tot_potngan">' . number_format($nota[0]["tot_potongan"]) . '</td>
    //                                             </tr>
    //                                             <tr>
    //                                                 <td></td>
    //                                                 <td> </td>
    //                                                 <td></td>
    //                                                 <td>Bayar</td>
    //                                                 <td>Rp</td>
    //                                                 <td class="tot_bayar">' . number_format($nota[0]["tot_bayar"]) . '</td>
    //                                             </tr>

    //                                         </table>
    //                                     </td>
    //                                 </tr>
    //                             </table>

    //                         </div>
    //                     </div>
    //                     <div class="row ">
    //                         <div class="col">
    //                             <table class="w-100 text-sm ml-1 " >
    //                                 <tr>
    //                                     <td>
    //                                         -
    //                                     </td>
    //                                     <td>
    //                                         Barang tersebut telah dikirim dalam keadaan baik dan cukup
    //                                     </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>
    //                                         -
    //                                     </td>
    //                                     <td>
    //                                         Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan tanpa persetujuan kami
    //                                     </td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td></td>
    //                                     <td>Barang Diterima Tanggal : </td>
    //                                 </tr>

    //                             </table>
    //                         </div>

    //                         <div class="col-6 text-center">
    //                             <table class=" w-100  text-sm">
    //                                 <tr>
    //                                     <td>
    //                                         Penerima
    //                                         <br><br> (___________) <br>
    //                                         Nama Jelas
    //                                     </td>
    //                                     <td>

    //                                         Disetujui
    //                                         <br><br> (___________) <br>
    //                                         Nama Jelas
    //                                     </td>
    //                                     <td>

    //                                         Pengirim
    //                                         <br><br> (___________) <br>
    //                                         Nama Jelas
    //                                     </td>
    //                                 </tr>

    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //             ';


    //     // echo $card;
    // }
}
