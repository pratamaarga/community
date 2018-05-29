<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {


    //Tambah Data
        function add_user(){
        $this->ajax_checking();

        $postData = $this->input->post();
        $insert = $this->admin_model->insert_user($postData);
        if($insert['status'] == 'success')
        
        $this->session->set_flashdata('success', 'User'.$postData['email'].' has been successfully created!');

        echo json_encode($insert);
         }

    // load to frame (template admin)
    public function index() {
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('user/posting');
        $this->load->view('frame/footer_view');
    }


}

/* End of file */
