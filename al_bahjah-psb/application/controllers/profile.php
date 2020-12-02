<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class profile extends CI_Controller {
//     public function __construct()
//     {
//         parent::__construct();
//         $this->load->model('sekolahModel');
//     }
    
//     public function getDataProfile($id){

//         $sekolah = $this->sekolahModel->getSekolahById($id);

//         $res = array(
//             "id" => $sekolah['id'],
//             "nama_lengkap" => $sekolah['nama_lengkap'],
//             "singkatan" => $sekolah['singkatan'],
//             "alamat" => $sekolah['alamat'],
//             "telepon" => $sekolah['telepon'],
//             "email" => $sekolah['email']
//         );

//         echo json_encode($res);

//     }
//     public function simpanDataProfile(){
//         $sekolah = $_POST;

//         $status = $this->sekolahModel->updateSekolah($sekolah);

//         if($status){
//             $status=1; 
//             //closed session
//             $this->session->unset_userdata('sekolah_id');
//         }
//         else {
//             $status=0;
//         }
        

//         $res = array(
//             "sekolah" => $sekolah,
//             "status"=> $status
//         );

//         echo json_encode($res);
//     }

//     public function simpanIDSekolahSession(){
//         $id = $_POST['id'];
//         $this->session->set_userdata('sekolah_id', $id);

//         $newId = $this->session->userdata('sekolah_id');

//         echo $newId;
//     }

//     public function getProfilePage()
//     {
//         $this->load->view('profile');
//     }


// }
