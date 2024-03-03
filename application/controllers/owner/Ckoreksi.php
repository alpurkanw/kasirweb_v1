<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ckoreksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->model('m_jns_tag', 'mtag');

    }

    public function index()
    {
        $data["judul"] = "List Barang";
        $data["show"] = "index";
        // $userlok = $_SESSION["lokid"];


        // print_r($data["brgs"]);
        // return;

        // $data["brgs"] = $this->db->get_where('tbl_barang', ["idlok" => $userlok])->result();

        $this->load->view('owner/Vkoreksi', $data);
    }
    public function indexLap()
    {
        $data["judul"] = "Laporan Koreksi";
        $data["page"] = "index";
        // $userlok = $_SESSION["lokid"];


        $this->load->view('owner/VlapKoreksi', $data);
    }

    public function lapKoreksi()
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

        $sql = "
        select * from pos_trans_koreksi_jum_bar where tgl_ubah between $tgl1 and $tgl2 
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
        $this->load->view('owner/VlapKoreksi', $data);
    }

    public function proses_koreksi()
    {
        $idbar = $this->input->post('kode_barang');
        $jum_awal = $this->input->post('jum_stok');
        $jum_koreksi = $this->input->post('jumlah_koreksi');
        $jum_akhir = $jum_awal + ($jum_koreksi);

        $ret = $this->db->query("update pos_barang set jum_stok = $jum_akhir where id = $idbar ");
        // echo $ret;
        // return;
        if ($ret > 0) {
            $data_insert = [
                'kode_bar' => $idbar,
                'jum_awal' => $jum_awal,
                'jum_koreksi' => $jum_koreksi,
                'jum_akhir' => $jum_akhir,
                'tgl_ubah' => date('Ymd'),
                'jam_ubah' => date('His'),
                'user_id' => $_SESSION["id_kar"],
                'nama' => $_SESSION["username"]
            ];
            $ret = $this->db->insert('pos_trans_koreksi_jum_bar', $data_insert);


            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                                Data berhasil Di koreksi 
                            </div>'
            );
            redirect("owner/Ckoreksi");
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                                Data  GAGAL Koreksi, error: ' . $this->db->error()["message"] . '
                            </div>'
            );
            redirect("owner/Ckoreksi");
            // return;
        }
    }
    public function getData()
    {


        $columns = array(
            0 => 'id',
            1 => 'nama',
            2 => 'no_hp',
            3 => 'id',
        );

        $mysqli = $this->db;
        $querycount = $mysqli->query("SELECT count(id) as jumlah FROM pos_barang");
        $datacount = $querycount->result_array();
        $totalData = $datacount[0]['jumlah'];
        $totalFiltered = $totalData;

        // $fp = fopen('request.log', 'a');
        // fwrite($fp, print_r($totalFiltered, TRUE));
        // fclose($fp);

        $limit = (isset($_POST['length'])) ? $_POST['length'] : 10;
        $start = (isset($_POST['start'])) ? $_POST['start'] : 0;
        $order = $columns[$_POST['order']['0']['column']];
        $dir = (isset($_POST['order']['0']['dir'])) ? $_POST['order']['0']['dir'] : "asc";

        $searchkey2 = (is_null($_POST['search']['value'])) ? "" : $_POST['search']['value'];
        // $searchkey = ($_POST['search']['value'] !== "") ? $_POST['search']['value'] : "";


        if (($searchkey2 == "")) {
            $sql = "select * from pos_barang order by $order $dir
            LIMIT $limit
            OFFSET $start";
            $query = $mysqli->query($sql);
        } else {
            $search = $_POST['search']['value'];
            $sql = "select * from pos_barang  WHERE namabar LIKE '%$search%'
            
            order by $order $dir
            LIMIT $limit
            OFFSET $start";
            $query = $mysqli->query($sql);

            // $tes = 2;
            $datacount = $query->num_rows();
            $totalFiltered = $datacount;
        }


        // return;

        $data = array();
        if (!empty($query)) {
            $no = $start + 1;
            foreach ($query->result_array() as $key => $val) {
                $nestedData['no'] = $no;
                $nestedData['namabar'] = $val['namabar'];
                $nestedData['harga_beli'] = $val['harga_beli'];
                $nestedData['harga_jual'] = $val['harga_jual'];
                $nestedData['harga_jual'] = $val['harga_jual'];

                $data[] = $nestedData;
                $no++;
            }
        }


        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function getData2()
    {

        $keyword = $this->input->POST('keyw');
        $sql = "SELECT *  FROM pos_barang where 
        namabar like '%" . $keyword . "%' or kategori like '%" . $keyword . "%'  or id  like '%" . $keyword . "%' ";

        $data = $this->db->query($sql)->result_array();
        // $datacount = $querycount->result_array();

        // print_r($sql);
        echo json_encode($data);
    }
}
    
    /* End of file Login.php */
