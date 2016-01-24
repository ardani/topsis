<?php

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->userauth->restrict();
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'subtitle' => '-'
        );
        $user = $this->session->userdata('role');
        $page = "";
        if( $user == 2)
            $page = "_kepsek";
        $this->template->load('main_template','page/dashboard'.$page,$data);
    }
}
