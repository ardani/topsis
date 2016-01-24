<?php

class Login extends CI_Controller {

    function __contruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'msg' => $this->flash->display('error', TRUE)
        );
        $this->load->view('login',$data);
    }

    public function dologin()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $login = $this->userauth->login_user($data['user_id'],md5($data['password']));
        if($login){
            redirect('main');
        }else{
            $this->flash->error('username dan password salah');
            redirect("login");
        }
    }

    public function dologout(){
        $this->userauth->logout();
    }
}
