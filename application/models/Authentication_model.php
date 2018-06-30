<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // model valiasi login
    function validate_login($postData){
        $this->db->select('*');
        $this->db->where('email', $postData['email']);
        $this->db->where('password', md5($postData['password']));
        $this->db->where('status', 1);
        $this->db->from('user');
        $query=$this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }

    // model fungsi change password
    function change_password($postData){
        // load to model (admin_model)
        $this->load->model('admin_model');
        $validate = false;

        $oldData = $this->admin_model->get_user_by_id($this->session->userdata('user_id'));

        if($oldData[0]['password'] == md5($postData['currentPassword']))
            $validate = true;

        if($validate){
            $data = array(
                'password' => md5($postData['newPassword']),
            );
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user', $data);

            $module = "Change Password";
            $activity = "change its own password";
            $this->admin_model->insert_log($activity, $module);
            return array('status' => 'success', 'message' => '');
        }else{
            return array('status' => 'invalid', 'message' => '');
        }

    }


    //============================== API Android Model =====================================
    //================================= Cek User ===================================

    // cek User
    public function cek_user($email, $password){

        $this->db->where("email", trim($email));
        $this->db->where("password", trim(md5($password)));

        return $this->db->get("user")->num_rows();

    }

    // ============================= Get User ================================
    // cek get user
    public function get_user($email, $password){

        $this->db->where("email", trim($email));
        $this->db->where("password", trim(md5($password)));

        return $this->db->get("user")->row();

    }

    // ============================== Total User =============================
    // Model Total User
    public function model_total_user(){

        return $this->db->get("user")->num_rows();

    }

    // ============================== Total Postingan ========================
    // total postingan 
    public function model_total_posting(){

        return $this->db->get("posting")->num_rows();
    }

    // ============================= Registration =============================
    // regist
    public function new_user($email, $password){

            $this->db->insert("manulaend",$data);
        }
    


// Penutup
}

/* End of file  */
