<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class user extends CI_Controller {


    public function construct(){
        parent::__Construct();
        
        $this->load->model('user_model');
    }


    // =============================== Test posting ================================
    // test Posting
    public function test_posting(){

        $q= $this->user_model->get_posting();

        echo json_encode($q);
    }

    // =================================== Posting ===============================
    // Add Posting
    public function add_posting(){

        $posting = $this->input->post("nama_textfield");
        $gambar = "filename.jpg";
        $data = array(
            'post_id'   => "" ,
            'posting'   => $posting ,
            'waktu'     => "",
            'id_user'   => $this->session->userdata('nama_session'),
            'urlgambar' => $gambar 

        );

             // Load To User Model
             $this->user_model->insert_posting($data);
             $this->load->view('frame/header_view');
             $this->load->view('frame/sidebar_nav_view');
             $this->load->view('user/add_posting', $data);
             $this->load->view('frame/footer_view');
    }

    // ================================== Delete Posting ===============================
    // delete 
    public function delete_posting($id){

        $data = array(

                "user_id"=>$id

                );
        
        $this->user_model->delete_posting($data);
        
        // echo "Data Berhasil dihapus";

    }

    // ================================= Cek Email ========================================

    public function cek_email($email){
        $this->db->where("email",trim($email));
        $query=$this->db->get("manulaend");
        return $query->num_rows();
    }

  





// Penutup
}