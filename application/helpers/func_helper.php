<?php

function cek_akses()
{
    $ins = get_instance();

    if (!$ins->session->userdata('username')) {
        redirect('auth/blocked');
        return;
    } else {
        $segment1 = $ins->uri->segment(1);
        $jabatan = $ins->session->userdata('jabatan');

        if ($segment1 == "owner") {
            if ($jabatan !== "1") {
                redirect('auth/blocked');
                return;
            }
        }
        if ($segment1 == "karyw") {
            if ($jabatan !== "4") {
                redirect('auth/blocked');
                return;
            }
        }
        // if ($segment1 == "appv") {
        //     if ($jabatan !== "2") {
        //         redirect('auth/blocked');
        //         return;
        //     }
        // }
        // if ($segment1 == "pic") {
        //     if ($jabatan !== "3") {
        //         redirect('auth/blocked');
        //         return;
        //     }
        // }
    }
}

// function approval($dt)
// {

//     $ins = get_instance();
//     // echo "approval" . $id;

//     $ins->db->where(['id' => $dt["id"]]);
//     $ins->db->update('mst_warga', ['st_app' => 1]);

//     // $data["judul"] = "List Warga";
//     if ($ins->db->affected_rows() == 1) {

//         $ins->session->set_flashdata(
//             'pesan',
//             '<div class="alert alert-success py-1" role="alert">
//                         Success Approved.
//                     </div>'
//         );
//         redirect(base_url($dt["direct"]));
//         return;

//         // redirect('C_daftar');
//         // return;
//     } else {
//         redirect(base_url($dt["direct"]));
//         return;
//     }
// }


// function reject($dt)
// {


//     $ins = get_instance();
//     // echo "approval" . $id;

//     $ins->db->where(['id' => $dt["id"]]);
//     $ins->db->update('mst_warga', ['st_app' => 0]);

//     // $data["judul"] = "List Warga";
//     if ($ins->db->affected_rows() == 1) {

//         $ins->session->set_flashdata(
//             'pesan',
//             '<div class="alert alert-danger py-1" role="alert">
//                     Succes Rejected!.
//                 </div>'
//         );
//         redirect(base_url($dt["direct"]));
//         return;

//         // redirect('C_daftar');
//         // return;
//     } else {
//         redirect(base_url($dt["direct"]));
//         return;
//     }
// }

// function histori($list)
// {


//     return '
//     ' . $list . '
        
//     ';
// }
