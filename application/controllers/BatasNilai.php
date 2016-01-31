<?php
class BatasNilai extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('batasnilai_model','batasnilai');
        $this->load->model('kriteria_model','kriteria');
        $this->userauth->access_only(1);
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Batas Nilai',
            'subtitle' => 'Manage Data Batas Nilai',
            'kriterias' => $this->kriteria->get(),
            'variable' => array('Sangat Kurang (SK)', 'Kurang  (K)', 'Cukup (C)',
                'Baik  (B)','Sangat Baik (SB)'),
            'msg' => $this->flash->display('success', TRUE)
        );
        $this->template->load('main_template','page/batasnilai_view',$data);
    }

    public function get()
    {
        echo $this->batasnilai->dataajax();
    }

    public function edit()
    {
        methodpage();
        $id = $this->input->post('id');
        $data = $this->batasnilai->detail($id);
        echo json_encode($data);
    }

    public function delete()
    {
        methodpage();
        $id = $this->input->post('id');
        echo $this->batasnilai->delete($id);
    }

    public function save()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $msg = $this->batasnilai->save($data);
        $this->flash->success($msg);
        redirect('batasnilai');
    }
}
