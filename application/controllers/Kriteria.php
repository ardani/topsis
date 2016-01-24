<?php
class Kriteria extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('kriteria_model','kriteria');
        $this->userauth->access_only(1);
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data kriteria',
            'subtitle' => 'Manage Data kriteria',
            'msg' => $this->flash->display('success', TRUE)
        );
        $this->template->load('main_template','page/kriteria_view',$data);
    }

    public function get()
    {
        echo $this->kriteria->dataajax();
    }

    public function edit()
    {
        methodpage();
        $id = $this->input->post('id');
        $data = $this->kriteria->detail($id);
        echo json_encode($data);
    }

    public function delete()
    {
        methodpage();
        $id = $this->input->post('id');
        echo $this->kriteria->delete($id);
    }

    public function save()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $msg = $this->kriteria->save($data);
        $this->flash->success($msg);
        redirect('kriteria');
    }
}
