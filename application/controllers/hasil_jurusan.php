<?php
class Hasil_jurusan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('siswa_model','siswa');
        $this->userauth->restrict();
    }

    public function index()
    {
        $data = array(
            'title' => 'Hasil Penjurusan Siswa',
            'subtitle' => 'Data Siswa',
            'msg' => $this->flash->display('success',true)
        );
        $this->template->load('main_template','page/hasil_jurusan_view',$data);
    }

    public function get()
    {
        echo $this->siswa->dataajax_hasil_jurusan();
    }
}
