<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Userauth_model extends CI_Model
{
    var $CI = NULL;

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->CI = &get_instance();
    }

    public function login_user($username, $pass)
    {
        $log_user = $this->CI->db->query("SELECT * FROM user
        WHERE user_id = '$username' AND password ='$pass'");
        if ($log_user->num_rows() == 1) {
            foreach ($log_user->result() as $row) {
                $id = $row->user_id;
                switch ($row->role){
                    case "1":
                        $nama = $row->nama;
                    break;
                    case "2":
                        $nama = $row->nama;
                    break;
                }
                $nama = $nama;
                $user_access = $row->role;
            }

            $user_ses = array('userid' => $id, 'nama' => $nama, 'role' => $user_access);
            $this->CI->session->set_userdata($user_ses);
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('login');
    }

    public function is_logged_in()
    {
        if ($this->CI->session->userdata('userid') == '') {
            return false;
        }
        return true;
    }

    public function access_only($user_access){
        if ($this->CI->session->userdata('role') != $user_access) {
            redirect('main');
        }
    }

    public function restrict()
    {
        if ($this->is_logged_in() == false) {
            redirect('login');
        }
    }

    public function gotomenu()
    {
        redirect('main');
    }

    public function getdatauser()
    {
        $data = array('userid' => $this->session->userdata("userid"),
          'name' => $this->session->userdata("name"),
          'role' => $this->session->userdata("role"));
        return $data;
    }
}