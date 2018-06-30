<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        // load to authentication model
        $this->load->model("authentication_model");
    }

    // index controller login
    public function index() {
    
        if($this->session->userdata('logged_in')) {
            redirect(base_url("dashboard"));
        }else {
            $data = array('alert' => false);

            // load to view login
            $this->load->view('login',$data);
        }
    }

    // Ajax checking
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    // fungtion Login
    public function login(){
        $postData = $this->input->post();
        $validate = $this->authentication_model->validate_login($postData);
        if ($validate){
            $newdata = array(
                'email'=> $validate[0]->email,
                'name' => $validate[0]->name,
                'role' => $validate[0]->role,
                'user_id' => $validate[0]->user_id,
                'logged_in' => TRUE,
              
            );
            $this->session->set_userdata($newdata);
            redirect(base_url("dashboard")); 
        }
        else{
            $data = array('alert' => true);
            // load to view login
            $this->load->view('login',$data);
        }
     
    }
    
    // function controller Chage pass
    function change_password(){
        $this->ajax_checking();

        $postData = $this->input->post();
        $update = $this->authentication_model->change_password($postData);
        if($update['status'] == 'success')
            // notif
            $this->session->set_flashdata('success', 'Your password has been successfully changed!');

        echo json_encode($update);
    }

    // function controller logout
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    // ==============================================================
    // Aunth APi

    // auth login
    // public function api_login(){

    //     $countUser = $this->Authentication_model->cek_user($username, $password);
    //     $takeUser = $this->Authentication_model->get_user($username, $password);

    //     if($contUser>0){
    //                                                             // nama Field
    //         $this->session->set_userdata("sess_email", $takeUser->email);
    //         $this->session->set_userdata("sess_id", $takeUser->user_id);
    //         $this->session->set_userdata("sess_role_id", $takeUser->role);
    //         $this->session->set_userdata("sess_logged", "logged");

    //     $data["message"]="Ok";
    //     $data["respone"]="200";
    //     $data["email_resp"]= $this->session->userdata("sess_email");
    //     $data["id_reps"]= $this->session->userdata("sess_id");

    //     }
    //     else{

    //         $data['message']= "failed";
    //         $data['respon']= "404";
    //         $data['email_resp']= $this->session->userdata("sess_email");
    //         $data["id_reps"]= $this->session->userdata("sess_id");

    //     }

    //     echo "json_encode($data)";

    // }



}

/* End of file */
