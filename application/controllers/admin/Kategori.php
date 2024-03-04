<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data["judul"] = "List Kategori";
        $data["show"] = "index";

        $data["bars"] = $this->db->get('pos_kategori_bar')->result();
        $this->load->view('admin/vKategori', $data);
    }
    public function addBar($act = null)
    {
        // print_r($act);
        // return;
        if (is_null($act)) {


            // echo "tes";
            $data["judul"] = "Form Tambah";
            $data["show"] = "ftambah";

            // $data["loks"] = $this->db->get('tbl_lok')->result();
            // $data["users"] = $this->db->get('tbl_user')->result();
            $this->load->view('admin/vFormTambah', $data);
        }
    }


    public function addUserProc()
    {


        $this->form_validation->set_rules('usernm', 'Username', 'required|trim|is_unique[tbl_user.usernm]');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tbl_user.nip]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('level', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data_insert = [
                'usernm' => htmlspecialchars($this->input->post('usernm')),
                'nip' => htmlspecialchars($this->input->post('nip')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                //pass = nip
                'pass' => password_hash(htmlspecialchars($this->input->post('nip')), PASSWORD_DEFAULT),
                'notelp' => htmlspecialchars($this->input->post('notelp')),
                'jk' => htmlspecialchars($this->input->post('jk')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'level' => htmlspecialchars($this->input->post('level')),
                'sts_app' => 1,
                'upd_usr' => $_SESSION["id"],
                'upd_date' => date("Ymd")
            ];
            $ret = $this->db->insert('tbl_user', $data_insert);
            // print_r($ret);
            // return;
            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    Data Ruangan berhasil ditambah
                                </div>'
                );
                redirect("admin/Cuser");
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data Ruangan GAGAL ditambah, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("admin/Cuser");
                // return;
            }
        } else {
            // print_r($ret);
            // return;

            // redirect("admin/Cuser/Ftambah");
            // return;
            $this->Ftambah();
        }
    }

    public function Fupdate($id)
    {
        // echo "tes";
        $data["judul"] = "List User";
        $data["show"] = "Fupdate";

        $data["loks"] = $this->db->get('tbl_lok')->result();
        $data["user"] = $this->db->get_where('tbl_user', ["id" => $id])->result();
        $this->load->view('admin/Vuser', $data);
    }


    public function delUser($id)
    {
        // echo $id;
        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        // $this->load->view('admin/Vlokasi', $data);

        $ret = $this->db->delete('tbl_user', array('id' => $id));
        if ($ret > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Data User berhasil Dihapus
                        </div>'
            );
            // redirect('appv/Cuser');
            redirect("admin/Cuser");
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL Dihapus, error: ' . $this->db->error()["message"] . '
                        </div>'
            );
            redirect("admin/Cuser");
        }
    }


    public function updUserProc()
    {

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('level', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('lokid', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('sts_app', 'Status', 'required|trim');



        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nip' => htmlspecialchars($this->input->post('nip')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'notelp' => htmlspecialchars($this->input->post('notelp')),
                'jk' => htmlspecialchars($this->input->post('jk')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'level' => htmlspecialchars($this->input->post('level')),
                'lokid' => htmlspecialchars($this->input->post('lokid')),
                'sts_app' => htmlspecialchars($this->input->post('sts_app')),
                'upd_usr' => $_SESSION["id"],
                'upd_date' => date("Ymd")
            ];
            $where = [
                "id" => htmlspecialchars($this->input->post('id'))
            ];
            $this->db->where($where);
            $ret = $this->db->update('tbl_user', $data_update);
            // print_r($ret);
            // return;
            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    Data Ruangan berhasil Update
                                </div>'
                );
                redirect("admin/Cuser");
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data Ruangan GAGAL Update, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("admin/Cuser");
                // return;
            }
        } else {
            // print_r($ret);
            // return;

            // redirect("admin/Cuser/Ftambah");
            // return;
            $this->Fupdate($this->input->post('id'));
        }
    }
}
