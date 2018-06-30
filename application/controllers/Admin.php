<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if($this->session->userdata('role') != 'admin'){
            redirect(base_url());
        }

        // Load to Model
        $this->load->model('admin_model');
    }
    
    // Ajax Checking
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    // ===================== User List

    public function user_list(){

        $data = array(
            'formTitle' => 'User Management',
            'title' => 'User Management',
            'users' => $this->admin_model->get_user_list(),
        );

        // Load to View
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('admin/user_list', $data);

    }
   
    // ======================= Delete
    
    function deactivate_user($email,$id){
        $this->ajax_checking();

        $update = $this->admin_model->deactivate_user($email,$id);
        if($update['status'] == 'success')
            $this->session->set_flashdata('success', 'User '.$email.' has been successfully deleted!');

        echo json_encode($update);
    }

    // ======================= Reset Password
    function reset_user_password($email,$id){
        $this->ajax_checking();

        $update = $this->admin_model->reset_user_password($email,$id);
        if($update['status'] == 'success')
            $this->session->set_flashdata('success', 'User '.$email.'`s password has been successfully reset!');

        echo json_encode($update);
    }

    // ========================== Acticity log
    function activity_log(){
        $data = array(
            'formTitle' => 'Activity Log',
            'title' => 'Activity Log',
        );
        // load to view
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('admin/activity_log', $data);

    }

    // ============================= get activity log
    function get_activity_log(){
        $this->ajax_checking();

        echo json_encode( $this->admin_model->get_activity_log() );
    }

    // ============================= Dasboard 
    function dashboard(){

        $data["total_user"] = $this->Authentication_model->model_total_user();
        echo json_encode($data);
        
        //$this->load->view("v_dashboard");
    }



}

/* End of file */
