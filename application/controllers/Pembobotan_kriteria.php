<?php

class Pembobotan_kriteria extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('kriteria_model','kriteria');
        $this->userauth->access_only(1);
    }

    public function index()
    {
        $data = array(
            'title' => 'Proses Pembobotan Kriteria',
            'subtitle' => 'Data kriteria',
            'msg' => $this->flash->display('success', TRUE),
            'kriterias' => $this->kriteria->get(),
            'options' => array(1,3,5,7,9)
        );
        $this->template->load('main_template','page/pembobotan_kriteria_view',$data);
    }

    public function matrik()
    {
        $post = $this->input->post('kriteria');
        $kriteria = $this->kriteria->get();

        foreach($kriteria->result() as $col) {
            foreach($kriteria->result() as $row) {
                $post[$col->kode_kriteria][$row->kode_kriteria] =
                    1/$post[$row->kode_kriteria][$col->kode_kriteria];
            }
        }

        $data = array(
            'title' => 'Perhitungan AHP',
            'subtitle' => 'Data kriteria',
            'msg' => $this->flash->display('success', TRUE),
            'kriterias' => $this->kriteria->get(),
            'post' => $post
        );

        $this->template->load('main_template','page/pembobotan_kriteria_matrik_view',$data);
    }

    public function save_bobot()
    {
        $post = $this->input->post('bobot');
        foreach ($post as $key => $val) {
            $data = array(
                "bobot" => $val
            );
            $this->db->where('kode_kriteria',$key);
            $this->db->update('kriteria',$data);
        }
        $this->flash->success("Bobot Berhasil Disimpan");
        redirect('kriteria');
    }
}