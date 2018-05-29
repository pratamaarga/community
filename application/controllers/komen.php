<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {


    // load to frame (template admin)
    public function index() {
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('user/komen');
        $this->load->view('frame/footer_view');
    }


}

/* End of file */
