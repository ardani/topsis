<?php
class NilaiSiswa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('siswa_model','siswa');
        $this->load->model('kriteria_model','kriteria');
        $this->load->model('siswanilai_model','nilaisiswa');
        $this->userauth->access_only(1);
    }

    public function index()
    {
        $data = array(
            'title' => 'Nilai Siswa',
            'subtitle' => 'Data Siswa',
            'msg' => $this->flash->display('success',true),
            'siswas' => $this->siswa->get(),
            'kriterias' => $this->kriteria->get()
        );
        $this->template->load('main_template','page/siswa_nilai_view',$data);
    }

    public function get()
    {
        echo $this->nilaisiswa->dataajax();
    }

    public function save()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $data['nilai'] = json_encode($data['nilai']);
        $msg = $this->nilaisiswa->save($data);

        $this->flash->success($msg);
        redirect('nilaisiswa');
    }

    public function edit()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->nilaisiswa->detail($id);
        echo json_encode($result);
    }
    public function delete()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->nilaisiswa->delete($id);
    }

}
